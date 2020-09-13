<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});


Auth::routes();

// for login
// Route::post('/login/custom', 'auth\LoginController@login');

// route for homepage of user
Route::get('/','IndexController@index');

// apply for artist
Route::get('/apply', 'IndexController@applyForArtist');

// route to submit the form of applier
Route::match(['get', 'post'],'/applySubmit', 'IndexController@apply')->name('applySubmit');

// route for about page
Route::get('/about', 'Customer\AboutController@index');

// route to list category
Route::get('/categoryListing/{id}', 'Customer\CategoryListController@index');

// route for single painting
Route::get('/single/{id}', 'Customer\SinglePaintController@index');

// Route::get('/single/{$id}', 'Customer\SinglePaintingController@index');

// route for contact page
Route::resource('contact', 'Customer\ContactController');

// search paintings
Route::get('/searchPainting', 'Customer\CategoryListController@searchPaintings' );

// Route::get('/home', 'HomeController@index')->name('home');

// route for customer register page
Route::get('/registerCustomer', 'Customer\CustomerController@registerIndex');

// route to confirm account
Route::get('confirm/{code}', 'Customer\CustomerController@confirmEmail');

// route for registering customer
Route::match(['get', 'post'], '/registerUser', 'Customer\CustomerController@registerUser');

// route for customer login page
Route::get('/loginCustomer','Customer\CustomerController@loginPage');

// route for customer login
Route::match(['get', 'post'], '/loginCus', 'Customer\CustomerController@login');

// route for customer logout
Route::get('/userLogout', 'Customer\CustomerController@logoutCus');

// route for listing our ongoing exhibitions
Route::get('/ongoingExhibition', 'IndexController@currentExhibition');

// route for listing future exhibition details
Route::get('/comingExhibition', 'IndexController@futureExhibition');

// route for terms and conditions
Route::get('/terms', 'IndexController@terms');

// route for privacy and policy
Route::get('/privacy', 'IndexController@privacy');

// routes after customer login
Route::group(['middleware'=>['customerLogin']],function(){

    // route for car page
    Route::get('/cart','Customer\CartController@index');

    // route for add to cart
    Route::match(['get', 'post'],'/addToCart','Customer\CartController@addToCart');

    // route to delete the items from cart
    Route::get('/cart/deleteCartItem/{id}', 'Customer\CartController@deleteCart');

    // route to checkout page
    Route::get('/checkout', 'Customer\CheckoutController@checkout');

    // Route to submit checkout
    Route::post('/submit_check', 'Customer\CheckoutController@proceedCheckout');

    // view the list of items customer wants to order
    Route::match(['get', 'post'], '/order', 'Customer\CheckoutController@order');

    // route for placing order
    Route::post('/place_order', 'Customer\OrderController@placeOrder');

    // route to track your own order
    Route::get('/myOrders', 'Customer\OrderController@trackOrder');

    // route to track the detail of ordered product
    Route::get('/orderProductDetail/{id}', 'Customer\OrderController@detailOfOrderPro');

    // show thankyou page after ordering through cash on delivery
    Route::get('/thanksForOrder', 'Customer\OrderController@thanksPage');

    // route to make payment through paypal
    Route::get('/paypal', 'Customer\OrderController@PayPal');

});


// make auth registration false
Auth::routes(['register'=>false]);


// login for backend
Route::get('/back','AdminController@login');


// routes after admin login
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    // for listing customers only
    Route::get('user/list', 'Admin\UsersController@list')->name('user.list');

    // delete customer
    Route::get('user/customerDelete/{id}', 'Admin\UsersController@customerDelete')->name('user.customerDelete');

    // route for users
    Route::resource('user', 'Admin\UsersController');

    // route for roles
    Route::resource('role', 'Admin\RolesController');

    // route for permission components
    Route::resource('permission_component', 'Admin\PermissionComponentsController');

    // route for permissions
    Route::resource('permission', 'Admin\PermissionController');

    // route for category
    Route::resource('category', 'Admin\CategoryController');

    // route for paintings
    Route::resource('painting', 'Admin\PaintingController');

    // route for exhibition
    Route::resource('exhibition', 'Admin\ExhibitionController');

    // route to view the requests of artists
    Route::get('viewRequest', 'Admin\ArtistController@viewRequest')->name('viewRequest');

    // route to delete the artist request
    Route::post('requestDelete/{id}', 'Admin\ArtistController@requestDelete')->name('requestDelete');

    // route for offer component
    Route::resource('offer_component', 'Admin\OfferComponentController');

    // route for offers
    Route::resource('offers', 'Admin\OfferController');

    // route for enquiries
    Route::resource('enquiry', 'Admin\EnquiryController');

    // route to view the details of user order
    Route::get('order/listOrder/{id}', 'Admin\OrderController@listOrder')->name('order.listOrder');

    // route to update the status of order
    Route::post('order/updateOrderStatus', 'Admin\OrderController@updateOrderStatus')->name('order.updateOrderStatus');

    // route to view the invoice detail of order
    Route::get('order/invoiceOrder/{id}', 'Admin\OrderController@invoiceOrder')->name('order.invoiceOrder');

    // route to view order
    Route::resource('order', 'Admin\OrderController');

});

Route::match(['get', 'post'], '/logoutb', 'AdminController@logout');




