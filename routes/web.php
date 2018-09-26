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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//...........Normal User
Route::group(['prefix'=>'admin', 'middleware'=>['is_login']], function() {
    Route::resource('product', 'Admin\Product\ProductsController');

    //............password change
    Route::get('setting/change-pass', 'Admin\Setting\SettingsController@setting')->name('setting');
    Route::put('change-pass', 'Admin\Setting\SettingsController@changePass')->name('changePass');
});

//...........Admin
Route::group(['prefix'=>'admin', 'middleware'=>['is_login', 'is_admin']], function() {
  Route::resource('sliderimage', 'Admin\SliderImage\SliderImagesController');
  Route::resource('article', 'Admin\Article\ArticlesController');
  Route::resource('category', 'Admin\Category\CategoriesController');

  //.............user register area
  Route::resource('user', 'Admin\User\UsersController');

  Route::get('admin/{id}', 'Admin\User\UsersController@admin')->name('admin');
  Route::get('regular/{id}', 'Admin\User\UsersController@regular')->name('regular');
});

//...........Public Area
Route::get('', 'PublicController@index')->name('public.products');
Route::get('product/{slug}', 'PublicController@show')->name('public.product.show');
Route::get('category/{slug}', 'PublicController@categoryWise')->name('public.product.categoryWise');
