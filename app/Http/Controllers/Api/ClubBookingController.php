<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Club;
use App\Models\Booking;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Currency;
use App\Models\PromoCode;
use App\Models\PaymentLog;
use App\Models\ClubCategory;
use App\Models\TypeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ClubBookingController extends Controller
{
    public function user_booking(Request $request)
    {
        // Ensure the user is authenticated
        $user = auth()->user();

        // Fetch bookings including the related country and currency
        $bookings = $user->bookings()->with('club.country.currency')->get();

        // Map the bookings to adjust prices based on currency exchange rate
        $bookings = $bookings->map(function ($booking) {
            $club = $booking->club;
            $currency = $club ? $club->country->currency : null; // Access currency through country

            $price = $booking->price;
            if ($currency && $currency->exchange_rate) {
                $price = $price * $currency->exchange_rate; // Convert price based on exchange rate
            }

            return [
                'id' => $booking->id,
                'status' => $booking->status,
                'price' => $price,
                'currency' => $currency ? [
                    'name' => $currency->name,
                    'code' => $currency->code,
                    'symbol' => $currency->symbol,
                    'exchange_rate' => $currency->exchange_rate,
                ] : null,
            ];
        });

        return response()->json(['bookings' => $bookings]);
    }



    public function generateTimeSlots(Request $request)
    {
        $request->validate([
            'club_id' => 'required|exists:clubs,id',
            'category_id' => 'required|exists:categories,id',
            'type_category_id' => 'required|exists:type_categories,id',
            'booking_date' => 'required|date',
        ]);

        $clubId = $request->club_id;
        $categoryId = $request->category_id;
        $typeCategoryId = $request->type_category_id;
        $bookingDate = $request->booking_date;

        // Fetch club and type category details
        $club = Club::findOrFail($clubId);
        $typeCategory = TypeCategory::findOrFail($typeCategoryId);

        // Initialize start and end times from club details
        $startTime = Carbon::createFromFormat('H:i:s', $club->start_time);
        $endTime = Carbon::createFromFormat('H:i:s', $club->end_time);

        // Initialize slots array to store available time slots
        $slots = [];
        $slotDuration = ClubCategory::where("category_id", $categoryId)->where("club_id", $clubId)->first()->duration; // Slot duration in minutes

        // Loop through time slots between club's start and end time
        while ($startTime->lt($endTime)) {
            $slotEndTime = (clone $startTime)->addMinutes($slotDuration);

            // Check if the slot is already booked
            $isBooked = Booking::where('club_id', $clubId)
                ->where('booking_date', $bookingDate)
                ->where('category_id', $categoryId)
                ->where('type_category_id', $typeCategoryId)
                ->where(function ($query) use ($startTime, $slotEndTime) {
                    $query->where(function ($q) use ($startTime, $slotEndTime) {
                        $q->where('start_time', '<', $slotEndTime)
                            ->where('end_time', '>', $startTime);
                    });
                })
                ->count();

            // If slot is not fully booked, add to available slots
            if ($isBooked < $typeCategory->number) {
                $slots[] = [
                    'start_time' => $startTime->format('H:i:s'),
                    'end_time' => $slotEndTime->format('H:i:s'),
                ];
            }

            // Move to the next slot
            $startTime->addMinutes($slotDuration);
        }

        return response()->json($slots);
    }



    public function category()
    {
        $category = Category::all();
        $category = $category->map(function ($item) {
            return [
                "id" => $item->id,
                "name" => $item->name,
                "desc" => $item->desc,
                "image" => url("storage/" . $item->image),
            ];
        });
        return sendResponse(200, "successfull", $category);
    }

    public function category_club($categoryId)
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized: User not authenticated'
            ], 401);
        }

        // Get clubs that match the user's city and the given category ID
        $clubs = Club::where('city_id', $user->city_id)
            ->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->get();

        // Map the clubs to the desired format
        $clubs = $clubs->map(function ($item) {
            return [
                "id" => $item->id,
                "name" => $item->name,
                "desc" => $item->desc,
                "image" => url("storage/" . $item->image),
                "location" => $item->location,
                "city" => $item->city ? $item->city->name : null,
                "country" => $item->country ? $item->country->name : null,
                "currency" => $item->country && $item->country->currency ? [
                    'name' => $item->country->currency->name,
                    'code' => $item->country->currency->code,
                    'symbol' => $item->country->currency->symbol,
                    'exchange_rate' => $item->country->currency->exchange_rate,
                ] : null,
            ];
        });

        // Return the response
        return response()->json([
            'status' => 200,
            'message' => 'successful',
            'clubs' => $clubs
        ]);
    }



    public function category_type($clubId, $category)
    {
        // Fetch the club and its associated country with currency
        $club = Club::with('country.currency')->find($clubId);

        if (!$club) {
            return response()->json([
                'status' => 404,
                'message' => 'Club not found'
            ], 404);
        }

        // Get the currency related to the club's country
        $clubCurrency = $club->country ? $club->country->currency : null;

        if (!$clubCurrency) {
            return response()->json([
                'status' => 400,
                'message' => 'Currency not found for the club\'s country'
            ], 400);
        }

        // Fetch type categories based on category ID and club ID
        $typeCategories = TypeCategory::where('category_id', $category)
            ->where('club_id', $clubId)
            ->get();

        // Convert prices based on the club's currency
        $typeCategories = $typeCategories->map(function ($item) use ($clubCurrency) {
            $sarCurrency = Currency::where('code', 'SAR')->first();
            $sarExchangeRate = $sarCurrency ? (float) $sarCurrency->exchange_rate : 3.75;

            // Convert the price to USD first, then to the club's currency
            $priceInUSD = (float) $item->price / $sarExchangeRate;
            $priceInClubCurrency = $priceInUSD * (float) $clubCurrency->exchange_rate;

            return [
                "id" => $item->id,
                "name" => $item->name,
                'code' => $item->code,
                'size' => $item->size,
                'type' => $item->type,
                "image" => url("storage/" . $item->image),
                "grass_type" => $item->grass_type,
                "price" => number_format($priceInClubCurrency, 2),
                "currency" => [
                    "name" => $clubCurrency->name,
                    "code" => $clubCurrency->code,
                    "symbol" => $clubCurrency->symbol,
                    "exchange_rate" => $clubCurrency->exchange_rate
                ]
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'successful',
            'type_categories' => $typeCategories
        ]);
    }










    public function bookTimeSlot(Request $request, $clubId)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type_category_id' => 'required|exists:type_categories,id',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'booking_date' => 'required|date',
            'promo_code' => 'nullable|string',
        ]);

        $typeCategoryId = $request->type_category_id;
        $bookingDate = $request->booking_date;
        $startTime = $request->start_time;
        $endTime = $request->end_time;

        $typeCategory = TypeCategory::findOrFail($typeCategoryId);
        $club = Club::findOrFail($clubId);

        if (!$club->isBookingTimeValid($startTime, $endTime)) {
            return response()->json(['message' => 'The club is closed during the requested time.'], 400);
        }

        $isBooked = Booking::where('club_id', $clubId)
            ->where('booking_date', $bookingDate)
            ->where('is_active', true)
            ->where('category_id', $request->category_id)
            ->where('type_category_id', $typeCategoryId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime]);
            })
            ->count();

        if ($isBooked >= $typeCategory->number) {
            return response()->json(['message' => 'This time slot is already booked.'], 409);
        }

        $hours = Carbon::parse($startTime)->diffInHours(Carbon::parse($endTime));

        $booking = Booking::create([
            'club_id' => $clubId,
            'user_id' => auth()->user()->id,
            'price' => $hours * $typeCategory->price,
            'type_category_id' => $typeCategoryId,
            'category_id' => $request->category_id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'is_active' => false,
            'booking_date' => $bookingDate,
        ]);

        if ($request->has('promo_code')) {
            $promoCode = PromoCode::where('code', $request->input('promo_code'))->first();

            if ($promoCode) {
                $discountApplied = $booking->applyPromoCode($promoCode);

                if ($discountApplied) {
                    $booking->save();
                    return booking($clubId, 'booking', $booking->price, "visa", $booking->id);
                } else {
                    return response()->json(['message' => 'Promo code is not applicable or invalid!'], 400);
                }
            } else {
                return response()->json(['message' => 'Promo code is invalid!'], 400);
            }
        }

        return booking($clubId, 'booking', $hours * $typeCategory->price, "visa", $booking->id);
    }



    public function handlePayment(Request $request)
    {
        $request->validate([
            'paymentLog_id' => 'required|exists:payment_logs,id',
            'booking_id' => 'required|exists:bookings,id',
            'payment_status' => 'required|in:success,failure',
        ]);
        $paymentLog_id = $request->paymentLog_id;
        $payment_status = $request->payment_status;
        $booking_id = $request->booking_id;

        if ($request->payment_status == 'success') {
            $paymentLog = PaymentLog::find($paymentLog_id);
            $paymentLog->update(['status' => true]);
            $owner = $paymentLog->owner;
            if ($owner->subscriptions->isNotEmpty()) {
                $owner->update([
                    "balance" => $owner->balance + $paymentLog->amount
                ]);
            } else {
                $tax = 1 - (Setting::first()->tax / 100);
                $owner->update([
                    "balance" => $owner->balance + ($paymentLog->amount * $tax)
                ]);
            }
            $booking_id = Booking::find($booking_id)->update(['is_active' => true]);

            $qrCode = QrCode::format('png')->size(200)->generate(Booking::find($booking_id)->code);

            // Determine the storage path to save the image
            $storagePath = storage_path('app/public/qr_codes'); // Customize the path as needed

            // Create the subdirectory (if it doesn't exist)
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            // Generate a unique filename for the image
            $filename = uniqid() . '.png';

            // Save the image to the storage path
            file_put_contents($storagePath . '/' . $filename, $qrCode);

            // Save the image path in the database
            return response()->json([
                'message' => 'Payment successful. Subscription is now active.',
                "qr_code" => url('storage/qr_codes/' . $filename),
            ]);
        } else {

            $paymentLog = PaymentLog::find($paymentLog_id)->delete();
            $booking_id = Booking::find($booking_id)->delete();
            return response()->json(['message' => 'Payment failed. Subscription has been cancelled.']);
        }
    }

    public function validateQrCode(Request $request)
    {
        $qrCode = $request->input('qr_code');

        // Assuming the QR code contains the booking ID
        $booking = Booking::where('code', $qrCode)->first();

        if ($booking && $booking->status == "pending" && $this->isValidDate($booking->start_date, $booking->end_date)) {
            $booking->status = "active";
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Booking activated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid QR code']);
    }

    private function isValidDate($startDate, $endDate)
    {
        $now = now();
        return $now->between($startDate, $endDate);
    }


    public function refund(Request $request, $bookingId)
    {
        $validator = Validator::make($request->all(), [
            'reason' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Check if the booking is eligible for a refund (e.g., check booking status, dates, etc.)

        $refund = $booking->refund()->create([
            'user_id' => auth()->user()->id,
            'club_id' => $booking->club_id,
            'reason' => $request->reason,
        ]);


        return response()->json(['message' => 'Refund processed successfully', 'refund' => $refund], 201);
    }
    public function top_five_clubs()
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized: User not authenticated'
            ], 401);
        }

        // Get top five clubs in the user's city, ordered by bookings count
        $clubs = Club::where('city_id', $user->city_id)
            ->withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->limit(5)
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'successfull',
            'clubs' => ClubResource::collection($clubs)
        ]);
    }


    // Visitor
    public function top_five_clubs_visitor()
    {
        // Get top five clubs in the user's city, ordered by bookings count
        $clubs = Club::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->limit(5)
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'successfull',
            'clubs' => ClubResource::collection($clubs)
        ]);
    }
}
