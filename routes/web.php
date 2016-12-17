    <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'WelcomeController@index');
Auth::routes();
Route::get('/test', 'UsersController@index');
Route::get('/home', 'HomeController@index')->name('account');
Route::resource('/home/articles', 'ArticleController');
Route::resource('/home/news', 'NewController');
Route::get('/admin', 'AdminController@index')->middleware('checkAdmin');