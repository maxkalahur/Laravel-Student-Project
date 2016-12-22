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
    Route::resource('user', 'Admin\UserController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
        'names' => [
            'index' => 'user.index',
            'create' => 'user.create',
            'store' => 'user.store',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy',
        ]
    ]);
    Route::resource('comment', 'Admin\CommentController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
        'names' => [
            'index' => 'comment.index',
            'create' => 'comment.create',
            'store' => 'comment.store',
            'edit' => 'comment.edit',
            'update' => 'comment.update',
            'destroy' => 'comment.destroy',
        ]
    ]);

});
