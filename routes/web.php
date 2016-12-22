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

Route::group(['prefix'=>'home', 'as'=>'home::'], function () {
    Route::get('/', 'AccountController@index');
   Route::resource('articles', 'ArticleController');
   Route::resource('news', 'NewController');
});
Route::get('/article/{id}', 'ShowRecordsController@showArticle');
Route::get('/new/{id}', 'ShowRecordsController@showNew');
Route::get('/new', 'CommentController@newComment');
Route::get('/article', 'CommentController@articleComment');

Route::get('/admin', 'AdminController@index')->middleware('checkAdmin');

Route::group(['prefix' =>'admin','as' => 'admin::', 'middleware' => ['checkAdmin','auth']], function () {
    Route::get('/', 'Admin\AdminController@index');

    Route::resource('article', 'Admin\ArticleController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
        'names' => [
            'index' => 'article.index',
            'create' => 'article.create',
            'store' => 'article.store',
            'edit' => 'article.edit',
            'update' => 'article.update',
            'destroy' => 'article.destroy',
        ]
    ]);
    Route::resource('news', 'Admin\NewsController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
        'names' => [
            'index' => 'news.index',
            'create' => 'news.create',
            'store' => 'news.store',
            'edit' => 'news.edit',
            'update' => 'news.update',
            'destroy' => 'news.destroy',
        ]
    ]);


});
