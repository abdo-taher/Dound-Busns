<?php

use App\Http\Controllers\ClubDashboard\AuthController;
use App\Http\Controllers\ClubDashboard\BookingController;
use App\Http\Controllers\ClubDashboard\BranchesController;
use App\Http\Controllers\ClubDashboard\HomeController;
use App\Http\Controllers\ClubDashboard\OfferController;
use App\Http\Controllers\ClubDashboard\PaymentController;
use App\Http\Controllers\ClubDashboard\PromoCodeController;
use App\Http\Controllers\ClubDashboard\ReportController;
use App\Http\Controllers\ClubDashboard\SettingController;
use App\Http\Controllers\ClubDashboard\SupportController;
use App\Http\Controllers\ClubDashboard\TypeCategoryController;
use App\Http\Controllers\ClubDashboard\WalletController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'club', 'as' => 'club.','middleware'=>['localization']], function () {
///////////////////////////  dashboard Club   ///////////////////////////////////////////////////////////
    Route::get('/', function () {
        return redirect()->to('club/dashboard');
    });
    Route::get('login', [AuthController::class, 'create'])->name("login");
    Route::post('dashboard/login', [AuthController::class, 'login'])->name("login");
    Route::get('logout', [AuthController::class, 'logout'])->name("logout");
    Route::middleware(["club"])->group(function () {

        // Route::get('/dashboard', function () {
        //     return view('club-dashboard.index');
        // })->name("dashboard.index");
        Route::get('/dashboard',[HomeController::class,'dashboard'])->name("dashboard.index");

        Route::resource("settings", SettingController::class);

        Route::resource('bookings', BookingController::class);
        Route::get('bookings/{id}/show', [BookingController::class,'show_book'])->name('bookings.show_book');
        Route::get('bookings/refunds/get', [BookingController::class,'refunds'])->name('bookings.refunds');
        Route::get('/bookings/available/time', [BookingController::class,'available'])->name('bookings.available');
        Route::post('/bookings/deleteSelected', [BookingController::class,'deleteSelected'])->name('bookings.deleteSelected');
        Route::put('/bookings/updateStatus/{id}', [BookingController::class,'updateStatus'])->name('bookings.updateStatus');
        Route::put('/bookings/refundStatus/{id}', [BookingController::class,'refundStatus'])->name('bookings.refundStatus');

        Route::resource("promo_codes", PromoCodeController::class);
        Route::post('/promo_codes/deleteSelected', [PromoCodeController::class,'deleteSelected'])->name('promo_codes.deleteSelected');
        Route::post('toggle-activation/promo_codes', [PromoCodeController::class, 'toggleActivation'])->name('promo_codes.toggleActivation');

        Route::resource("type_category", TypeCategoryController::class);
        Route::post('/type_category/deleteSelected', [TypeCategoryController::class,'deleteSelected'])->name('type_category.deleteSelected');


        Route::resource("branches", BranchesController::class);
        Route::post('/branches/deleteSelected', [BranchesController::class,'deleteSelected'])->name('branches.deleteSelected');

        Route::resource("payment_logs", PaymentController::class);
        Route::get('/payment/pay', [PaymentController::class,'AdminToClubPayment'])->name('payment.pay');

        Route::resource("wallets", WalletController::class);

        Route::get('/reports/booking', [ReportController::class,'booking'])->name('reports.booking');
        Route::get('/reports/places', [ReportController::class,'places'])->name('reports.places');
        Route::get('/reports/booking/{id}', [ReportController::class,'show_book'])->name('reports.show_book');

        Route::resource("supports", SupportController::class);
    });



});
