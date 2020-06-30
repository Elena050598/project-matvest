<?php
Auth::routes();
//книги
Route::resource('books', 'BookController');
//каталоги
Route::resource('catalogs', 'CatalogController');
//главная
Route::get('/', 'UserController@index')
    ->name('index');
//анкета
Route::get('/profile', 'UserController@indexProfile');
Route::post('/profile', 'UserController@create_user');
Route::get('/check', 'UserController@check');
//приветствие после регистрации
Route::get('/home', 'HomeController@index')
    ->name('home');
//статьи
Route::get('/art', 'ArticleController@index')
    ->name('list_articles');
Route::group(['prefix' => 'articles'], function () {
    Route::get('/drafts', 'ArticleController@drafts')
        ->name('list_drafts')
        ->middleware('auth');
    Route::get('/create', 'ArticleController@create')
        ->name('create_article')
        ->middleware('can:create-article');
    Route::post('/create', 'ArticleController@store')
        ->name('store_article')
        ->middleware('can:create-article');
    Route::get('/edit/{article}', 'ArticleController@edit')
        ->name('edit_article')
        ->middleware('can:update-article,article');
    Route::post('/edit/{article}', 'ArticleController@update')
        ->name('update_article')
        ->middleware('can:update-article,article');
    // using get to simplify
    Route::get('/publish/{article}', 'ArticleController@publish')
        ->name('publish_article')
        ->middleware('can:publish-article');
    Route::delete('/{id}', 'ArticleController@destroy')
        ->name('articles.destroy');
    Route::delete('/drafts/{id}', 'ArticleController@delete')
        ->name('drafts.delete');
});
Route::get('/articles/{id}/file/{filenum}', 'ArticleController@destroyFile')
    ->name('destroyFile');
// Форма обратной связи
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');
Route::get('contact/success', 'ContactFormController@store');
//список редколегии
Route::get('/redkol', 'SostavController@indexRedkol');
//список умо
Route::get('/umo', 'SostavController@indexUMO');
//страница редактирования для админа
Route::get('/redactor', 'RedactorController@create');
Route::post('/redactor', 'RedactorController@store')
    ->name('redactor');
//таблица пользователей
Route::get('users', 'AdminController@index')
    ->name('users.show');
Route::post('users/{user}', 'AdminController@store')
    ->name('users.store');
Route::delete('/{id},{name}', 'AdminController@destroy')
    ->name('profile.destroy');
//инфа для авторов
Route::get('/infa', 'RedactorController@index');
//образец написания статьи
Route::get('/redactor/{id}/file/{filenum}', 'RedactorController@destroyFile')
    ->name('destroyModel');