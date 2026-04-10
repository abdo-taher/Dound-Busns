<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CategoryProductController;
use App\Http\Controllers\Dashboard\ChampionshipController;
use App\Http\Controllers\Dashboard\ClubController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\OfferController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\PartenerController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\PromoCodeController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\ReviewsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SupportController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VendorController;
use App\Http\Controllers\Website\SubscriptionController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');
Route::middleware('localization')->group(function () {
    // Route::get('/', function () {
    //     return view('website.index');
    // });
    Route::get('/index', function () {
        return view('website.index');
    })->name("index");
    Route::get('/contant', function () {
        return view('website.contant');
    })->name("contant");
    Route::get('/partener/website', function () {
        return view('website.partener');
    })->name("website.partener");
    Route::get('/host', function () {
        return view('website.host');
    })->name("host");

    // Route::get('/subscription', function () {
    //     return view('website.subscription');
    // })->name("subscription");
    Route::get("subscription", [SubscriptionController::class,"index"])->name("subscription.index");
    Route::get("subscription/club/{id}",[ SubscriptionController::class,"subscription_club"])->name("subscription.club");
    Route::get("subscription/vendor/{id}",[ SubscriptionController::class,"subscription_vendor"])->name("subscription.vendor");
    Route::post("subscription/club/{id}",[ SubscriptionController::class,"club_store"])->name("subscription.club.store");
    Route::post("subscription/vendor/{id}",[ SubscriptionController::class,"vendor_store"])->name("subscription.vendor.store");


///////////////////////////  dashboard admin   ///////////////////////////////////////////////////////////

    Route::get('/', [AuthController::class, 'create'])->name("login");
    // Route::get('admin/dashboard/login', [AuthController::class, 'create'])->name("login");
    Route::post('admin/dashboard/login', [AuthController::class, 'login'])->name("admin.login");
    Route::get('logout', [AuthController::class, 'logout'])->name("logout");
    Route::middleware([ "admin", "auth:admin"])->group(function () {

        Route::get('/dashboard',[HomeController::class,'dashboard'])->name("dashboard.index");

        Route::resource("users", UserController::class);
        Route::post('/users/deleteSelected', [UserController::class,'deleteSelected'])->name('users.deleteSelected');
        Route::get('export/users', [UserController::class,'export'])->name('users.export');
        Route::post('import/users', [UserController::class,'import'])->name('users.import');
        Route::post('toggle-activation/users', [UserController::class, 'toggleActivation'])->name('users.toggleActivation');

        Route::resource("admins", AdminController::class);
        Route::post('/admins/deleteSelected', [AdminController::class,'deleteSelected'])->name('admins.deleteSelected');
        Route::get('export/admins', [AdminController::class,'export'])->name('admins.export');
        Route::post('import/admins', [AdminController::class,'import'])->name('admins.import');
        Route::post('toggle-activation/admins', [AdminController::class, 'toggleActivation'])->name('admins.toggleActivation');


        Route::resource("clubs", ClubController::class);
        Route::post('/clubs/deleteSelected', [ClubController::class,'deleteSelected'])->name('clubs.deleteSelected');
        Route::post('/clubs/pay/{id}', [ClubController::class,'pay'])->name('clubs.pay');
        Route::get('export/clubs', [ClubController::class,'export'])->name('clubs.export');
        Route::post('import/clubs', [ClubController::class,'import'])->name('clubs.import');
        Route::post('toggle-activation/clubs', [ClubController::class, 'toggleActivation'])->name('clubs.toggleActivation');


        Route::resource("vendors", VendorController::class);
        Route::post('/vendors/deleteSelected', [VendorController::class,'deleteSelected'])->name('vendors.deleteSelected');
        Route::post('/vendors/pay/{id}', [VendorController::class,'pay'])->name('vendors.pay');
        Route::get('export/vendors', [VendorController::class,'export'])->name('vendors.export');
        Route::post('import/vendors', [VendorController::class,'import'])->name('vendors.import');
        Route::post('toggle-activation/vendors', [VendorController::class, 'toggleActivation'])->name('vendors.toggleActivation');

        Route::resource("packages", PackageController::class);
        Route::post('/packages/deleteSelected', [PackageController::class,'deleteSelected'])->name('packages.deleteSelected');

        Route::resource("sliders", SliderController::class);
        Route::post('/sliders/deleteSelected', [SliderController::class,'deleteSelected'])->name('sliders.deleteSelected');

        Route::resource("categories", CategoryController::class);
        Route::post('/categories/deleteSelected', [CategoryController::class,'deleteSelected'])->name('categories.deleteSelected');

        Route::resource("category_products", CategoryProductController::class);
        Route::post('/category_products/deleteSelected', [CategoryProductController::class,'deleteSelected'])->name('category_products.deleteSelected');

        Route::resource("products", ProductController::class);
        Route::post('dropzone',[ProductController::class, 'dropzone'])->name('dropzone.files');
        Route::post('/products/deleteSelected', [ProductController::class,'deleteSelected'])->name('products.deleteSelected');
        Route::post('toggle-activation/products', [ProductController::class, 'toggleActivation'])->name('products.toggleActivation');

        Route::get('/offers/products', [OfferController::class,'offer_on_product'])->name('offers.products');
        Route::resource("offers", OfferController::class);
        Route::post('/offers/deleteSelected', [OfferController::class,'deleteSelected'])->name('offers.deleteSelected');
        Route::post('/offers/products', [OfferController::class,'store_offer_on_product'])->name('offers.products.store');
        Route::post('toggle-activation/offers', [OfferController::class, 'toggleActivation'])->name('products.toggleActivation');


        Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
        Route::get('/orders/order_admins', [OrderController::class, 'order_admins'])->name('orders.order_admins');
        Route::get('/orders/{id}', [OrderController::class,'show'])->name('orders.show');
        Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::put('/items/{id}/status', [OrderController::class, 'updateItemStatus'])->name('orders.items.status');

        Route::get('/payment/pay', [PaymentController::class,'AdminToClubPayment'])->name('payment.pay');
        Route::get('/payment/pay/vendor', [PaymentController::class,'AdminToVendorPayment'])->name('payment.pay_vendor');
        Route::resource("payment", PaymentController::class);

        Route::resource("support", SupportController::class);
        Route::post('/support/deleteSelected', [SupportController::class,'deleteSelected'])->name('support.deleteSelected');


        Route::resource("reviews", ReviewsController::class);
        Route::post('/reviews/deleteSelected', [ReviewsController::class,'deleteSelected'])->name('reviews.deleteSelected');

        Route::resource("settings", SettingController::class);
        Route::get('/settings-website', [SettingController::class,'setting'])->name('settings-website');
        Route::post('/settings-website', [SettingController::class,'update_setting'])->name('settings-website.store');

        Route::get('/reports/booking', [ReportController::class,'booking'])->name('reports.booking');
        Route::get('/reports/booking/{id}', [ReportController::class,'show_book'])->name('reports.show_book');
        Route::get('/reports/order', [ReportController::class,'order'])->name('reports.order');
        Route::get('/order/filter', [ReportController::class,'orderFilter'])->name('order.filter');

        Route::resource("posts", PostController::class);
        Route::post('/posts/deleteSelected', [PostController::class,'deleteSelected'])->name('posts.deleteSelected');

        Route::resource("contacts", ContactsController::class);
        Route::resource("championship", ChampionshipController::class);
        Route::resource("partener", PartenerController::class);



        Route::resource("promo_codes", PromoCodeController::class);
        Route::post('/promo_codes/deleteSelected', [PromoCodeController::class,'deleteSelected'])->name('promo_codes.deleteSelected');
        Route::post('toggle-activation/promo_codes', [PromoCodeController::class, 'toggleActivation'])->name('promo_codes.toggleActivation');

    });

});
require __DIR__ . '/maintenance.php';
require __DIR__ . '/club.php';
require __DIR__ . '/vendor.php';
