<?php

/**
 * FRONTEND ROUTES
 */

Route::get('/', array('as' =>'index', 'uses' => 'Frontend\FrontendIndexController@index'));


/**
 * BACKEND ROUTES
 */
Route::group(['prefix' => 'admin'], function () {


    Route::get('/', function () {
        return \Redirect::route('login');
    });

    Route::get('login', array('as' =>'login', 'uses' => 'Backend\Auth\AuthController@index'));
    Route::post('login', array('as' =>'login', 'uses' => 'Backend\Auth\AuthController@login'));
    Route::get('logout', array('as' =>'logout', 'uses' => 'Backend\Auth\AuthController@logout'));

    // Tradução jquery
    Route::get('translate', function(){
        return trans('admin');
    });

    Route::group(['middleware' => 'auth'], function (){


        // Selecione o idioma
        Route::get('/lang/{lang}', ['as' => 'language.select', 'uses' => 'Backend\BackendBaseController@language']);


        Route::resource('home', 'Backend\BackendHomeController');

        Route::resource('configuracao', 'Backend\BackendConfiguracaoController');

        Route::resource('paginas', 'Backend\BackendPaginasController');
        Route::get('listPagina', [ 'as' => 'listPagina', 'uses' => 'Backend\BackendPaginasController@listingAjax']);


        Route::resource('usuario', 'Backend\BackendUsuarioController');
        Route::get('listUsuario', [ 'as' => 'listUsuario', 'uses' => 'Backend\BackendUsuarioController@listingAjax']);

        Route::get('usuario/ativar/{id}', [ 'as' => 'usuario/ativar', 'uses' => 'Backend\BackendUsuarioController@ativar']);
        Route::get('usuario/desativar/{id}', [ 'as' => 'usuario/desativar', 'uses' => 'Backend\BackendUsuarioController@desativar']);


    });

});

Route::get('403', function () {
    $sidebar = Config::get('website.fronted.sidebar');
    $data = [
        "sidebar" => $sidebar
    ];
    return view('errors.403', $data);
});