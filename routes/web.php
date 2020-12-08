<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('user', 'UserController');
    Route::resource('section', 'SectionController');
    Route::resource('category', 'CategoryController');
    Route::resource('brand', 'BrandController');
    Route::resource('product', 'ProductController');
    Route::post('thumbnail/destroy', 'ThumbnailController@destroy')->name('thumbnail.destroy');
    Route::post('getcategories', 'AdminController@getCategories')->name('ajaxload.cats');
    Route::get('categoriesJsonData', 'AdminController@getCategoriesJsonData')->name('ajax.categoryJsonData');
    Route::get('extras', 'AdminController@loadExtras')->name('product.extras');
    Route::post('getsubcategories', 'AdminController@getSubCategories')->name('ajaxload.subcats');
    Route::post('getbrands', 'AdminController@getBrands')->name('ajaxload.brands');
    Route::post('section/changestatus', 'SectionController@changeStatus')->name('section.changestatus');
    Route::post('category/changestatus', 'CategoryController@changeStatus')->name('category.changestatus');
    Route::post('users/changestatus', 'UserController@changeStatus')->name('user.changestatus');
    Route::post('product/changestatus', 'ProductController@changeStatus')->name('product.changestatus');
    Route::get('deleteimg', 'AdminController@deleteImage')->name('delete.image');
    Route::get('profile', 'AdminController@viewProfile')->name('profile');
    Route::get('setting/', 'AdminController@setting')->name('setting');
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
});

Route::get('/login/{provider}', 'Auth\SocialController@redirect')->where('provider', 'facebook|google');
Route::get('/login/{provider}/callback', 'Auth\SocialController@callback')->where('provider', 'facebook|google');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
