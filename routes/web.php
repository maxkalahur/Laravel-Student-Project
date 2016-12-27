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

Route::group(['prefix'=>'account', 'as'=>'account::'], function () {
   Route::get('/', 'AccountController@index');
   Route::resource('articles', 'ArticleController');
   Route::resource('news', 'NewsController');
});
Route::group(['prefix'=>'article', 'as'=>'article::'], function () {
    Route::get('/{slug}', 'ShowRecordsController@showArticle')->name('view');
    Route::post('/{id}', 'CommentController@articleComment')->name('Comment');

});
Route::group(['prefix'=>'news', 'as'=>'news::'], function () {
    Route::get('/{slug}', 'ShowRecordsController@showNews')->name('view');
    Route::post('/{id}', 'CommentController@newsComment')->name('Comment');
});



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
