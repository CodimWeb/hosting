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
//DB::listen(function($query) {
//    var_dump($query->sql, $query->bindings);
//});

//ADMIN

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin/hostings', 'AdminController@getHostingList');

Route::get('/admin/hosting/add', 'AdminController@addHosting');

Route::get('/admin/hosting/{id}', 'AdminController@getHosting');

Route::post('/admin/hosting/create', 'AdminController@createHosting')->name('admin.hosting.create');

Route::get('/admin/hostings/delete/{id}', 'AdminController@deleteHosting');

Route::get('/admin/comments', 'AdminController@getComments');

Route::get('/admin/comments/add/{id}', 'AdminController@addComments');

Route::get('/admin/comments/delete/{id}', 'AdminController@deleteComments');

Route::get('/admin/articles', 'AdminController@getArticles');

Route::get('/admin/articles/add', 'AdminController@addArticles');

Route::post('/admin/article/create', 'AdminController@createArticle')->name('admin.article.create');;

Route::get('/admin/articles/delete/{id}', 'AdminController@deleteArticle');



// что б открыть регистрацию закоментировать этот роут
Route::get('/register', function () {
    return redirect('/');
});

Route::get('/password/reset', function () {
    return redirect('/');
});

Route::get('/', function () {
    return redirect('/home');
});


//SITE
Route::get('/home/{type?}', 'IndexController@getHostingList');

Route::get('/hosting/{id}', 'HostingController@getHosting');

Route::post('/send-comment', 'HostingController@sendComment');

Route::get('/articles', 'ArticleController@getArticles');

Route::get('/article/{id}', 'ArticleController@getArticle');

Route::get('/reviews', 'ReviewsController@getHosting');





