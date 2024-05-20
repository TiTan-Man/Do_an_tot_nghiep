<?php

use Illuminate\Support\Facades\Route;

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

/**
 * For check roles (permission access) for each route (function_code),
 * required each route have to a name which used to the
 * check in middleware permission and this is defined in Module, Function Management
 * @author: ThangNH
 * @created_at: 2021/10/01
 */

Route::namespace('FrontEnd')->group(function () {

  Route::get('/login', 'LoginController@index')->name('frontend.login');
  Route::post('/login', 'LoginController@login')->name('frontend.login.post');

  Route::get('/register', 'LoginController@register')->name('frontend.register');
  Route::post('/register-post', 'UsersController@register')->name('frontend.register.post');

  Route::get('auth/google', 'LoginController@redirectToGoogle')->name('login.google');
  Route::get('auth/google/callback', 'LoginController@handleGoogleCallback');

  Route::get('auth/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
  Route::get('auth/facebook/callback', 'LoginController@handleFacebookCallback');

  Route::get('/', 'HomeController@index')->name('frontend.home');
  Route::get('search', 'CmsController@search')->name('frontend.search.index');

  // CMS
  Route::get('dich-vu/{alias?}', 'CmsController@serviceCategory')->name('frontend.cms.service_category');
  Route::get('dich-vu/{alias_category}/{alias_detail}', 'CmsController@service')->name('frontend.cms.service');



  Route::get('xem-them-bai-viet', 'CmsController@viewMore')->name('frontend.cms.view_more');
  Route::get('tin-tuc/{alias?}', 'CmsController@postCategory')->name('frontend.cms.post_category');
  Route::get('chi-tiet/{alias_detail}', 'CmsController@post')->name('frontend.cms.post');
  Route::get('tag/{alias_category?}', 'CmsController@cmstag')->name('frontend.cms.tag');

  Route::post('tim-kiem', 'CmsController@productSearch')->name('frontend.cms.product_search');
  Route::get('san-pham/{alias}', 'CmsController@productCategory')->name('frontend.cms.product_category');
  Route::get('chi-tiet-sp/{alias_detail}', 'CmsController@product')->name('frontend.cms.product');
  Route::get('/products/filter', 'CmsController@filterByPrice')->name('products.filter');
  // Bài viết giới thiệu
  Route::get('gioi-thieu/{alias}', 'CmsController@postIntroduction')->name('frontend.cms.post_introduction');

  // Booking
  Route::post('booking', 'BookingController@store')->name('frontend.booking.store');
  // Contact
  Route::get('lien-he', 'ContactController@index')->name('frontend.contact');
  Route::post('contact', 'ContactController@store')->name('frontend.contact.store');
  // Order
  Route::post('order-service', 'OrderController@storeOrderService')->name('frontend.order.store.service');
  // Cart
  Route::get('add-to-cart', 'OrderController@addToCart')->name('frontend.order.add_to_cart');
  Route::get('gio-hang', 'OrderController@cart')->name('frontend.order.cart');
  Route::get('update-cart', 'OrderController@updateCart')->name('frontend.order.cart.update');
  Route::get('remove-from-cart', 'OrderController@removeCart')->name('frontend.order.cart.remove');
  Route::get('check-voucher', 'OrderController@checkVoucher')->name('frontend.order.cart.check');
  Route::post('order-product', 'OrderController@storeOrderProduct')->name('frontend.order.store.product');

  // Theo dõi đơn hàng
  Route::get('order-tracking', 'OrderController@orderTracking')->name('frontend.order.tracking');

  Route::get('/{alias}', 'PageController@index')->name('frontend.page');

  Route::group(['prefix' => 'user', 'middleware' => ['auth:web']], function () {

    Route::get('profile', 'UsersController@index')->name('frontend.user.index');
    Route::post('update_profile', 'UsersController@update')->name('frontend.user.update');
    Route::post('comment', 'CommentController@store')->name('frontend.comment.store');
    Route::post('addnew', 'CmsController@addnew')->name('frontend.post.addnew');
    Route::get('/logout', 'LoginController@logout')->name('frontend.logout');
    
  });

  Route::get('/route-cache', function () {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
  });
  Route::get('/clear-cache', function () {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
  });
  Route::get('/clear-session', function () {
    Session::flush();
    return "Session đã được xóa.";
});
});
