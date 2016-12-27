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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix'=>'account', 'as'=>'account::', 'middleware'=>'auth'], function () {
   Route::get('/', 'AccountController@index');
   Route::resource('articles', 'ArticleController');
   Route::resource('news', 'NewsController');
});
Route::group(['prefix'=>'article', 'as'=>'article::', 'middleware'=>'auth'], function () {
    Route::get('/{slug}', 'ShowRecordsController@showArticle')->name('view');
    Route::post('/{id}', 'CommentController@articleComment')->name('Comment');

});
Route::group(['prefix'=>'news', 'as'=>'news::', 'middleware'=>'auth'], function () {
    Route::get('/{slug}', 'ShowRecordsController@showNews')->name('view');
    Route::post('/{id}', 'CommentController@newsComment')->name('Comment');
});
Route::get('/file/{name}', 'CommentController@downloadFiles')->name('download');



Route::get('/search', 'SearchController@search')->name('search');

Route::group(['prefix' =>'admin','as' => 'admin::', 'middleware' => ['checkAdmin','auth']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');

    Route::resource('article', 'Admin\ArticleController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
    Route::resource('news', 'Admin\NewsController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
    Route::resource('user', 'Admin\UserController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
    Route::resource('comment', 'Admin\CommentController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);


});
