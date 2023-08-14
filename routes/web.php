<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;

use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;

use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;

// use App\Http\Livewire\Admin\AdminHomeSliderComponent;
// use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
// use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;

// use App\Http\Livewire\Admin\AdminHomeCategoryComponent;

// use App\Http\Livewire\Admin\AdminSaleComponent;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\ThankyouComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\AboutUsComponent;

use App\Http\Livewire\ShippingCostComponent;
use App\Http\Livewire\DeliveryCostComponent;
use App\Http\Livewire\AddressComponent;
use App\Http\Livewire\AddAddressComponent;

use App\Http\Livewire\EditAddressComponent;

use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;

use App\Http\Livewire\User\UserAddPaymentReceiptComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/mail', function () {
    return view('mails/order-mail');
});

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');
// Route::get('/ship/{weight_total}', [CartComponent::class, 'shippingCost'])->name('product.cart');

// Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
// Route::post('check-out', [ShippingCostComponent::class, 'check_out'])->name('check.out');
Route::post('check-out', [DeliveryCostComponent::class, 'check_out'])->name('check.out');

Route::post('place-order', [CheckoutComponent::class, 'placeOrder'])->name('place.order');
Route::post('add-address', [AddAddressComponent::class, 'addAddress'])->name('add.address');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/address', AddressComponent::class)->name('address');
Route::get('/address/add',AddAddressComponent::class)->name('addaddress') ;
// Route::get('/address/edit/{id}',EditAddressComponent::class)->name('editaddress');

Route::get('/about-us', AboutUsComponent::class);
Route::get('/contact-us', ContactUsComponent::class);

// no-use:
Route::get('/shipping/{weight_total}',ShippingCostComponent::class)->name('shipping');

Route::get('/ship',ShippingCostComponent::class)->name('ship');
Route::get('/delivery',DeliveryCostComponent::class)->name('delivery');
// Route::post('/ship',ShippingCostComponent::class)->name('ship');
Route::post('/choose-address',[AddressComponent::class, 'choose_address'])->name('choose.address');

// Route::get('province', [ShippingCostComponent::class, 'get_province'])->name('province');
// Route::get('city/{id}', [ShippingCostComponent::class, 'get_city'])->name('city');
Route::get('origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', [ShippingCostComponent::class, 'get_ongkir'])->name('shipping.cost');

Route::get('province', [AddAddressComponent::class, 'get_province'])->name('province');
Route::get('city/{id}', [AddAddressComponent::class, 'get_city'])->name('city');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// For user or customer
Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders',UserOrderComponent::class)->name('user.orders');
    Route::get('user/orders_status/{status}', [AdminOrderComponent::class, 'orderFilter'])->name('user.order.status');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
    // Route::get('/user/payment/add',UserAddPaymentReceiptComponent::class)->name('user.addpayment');
    Route::get('/user/payment/add/{order_id}',UserAddPaymentReceiptComponent::class)->name('user.addreceipt');
});

// For admin
Route::middleware([
    'auth:sanctum',
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory') ;
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');

    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('admin/orders_status/{status}', [AdminOrderComponent::class, 'orderFilter'])->name('order.status');
    // Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    // Route::get('/admin/orders_detail',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    // Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    // Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    // Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    // Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    // Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

});
