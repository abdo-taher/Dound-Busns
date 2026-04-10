<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Club\Branch;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Club  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'img',
        'is_active',
        'end_time',
        'start_time',
        'country_id',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'club_categories')->withPivot('duration')
            ->withTimestamps();
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    public function typeCategories()
    {
        return $this->hasMany(TypeCategory::class);
    }

    public function isBookingTimeValid($bookingStartTime, $bookingEndTime)
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);

        $bookingStart = Carbon::parse($bookingStartTime);
        $bookingEnd = Carbon::parse($bookingEndTime);

        return $bookingStart->between($startTime, $endTime) && $bookingEnd->between($startTime, $endTime);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function paymentsFromAdmin()
    {
        return $this->hasMany(AdminToClubPayment::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function supports()
    {
        return $this->morphMany(Support::class, 'owner');
    }
    public function subscriptions()
    {
        return $this->morphMany(SubscriptionPackage::class, 'subscribable');
    }


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Assuming that a country has many clubs and one currency.
    public function currency()
    {
        return $this->belongsTo(Country::class, 'country_id')->with('currency');
    }



}
