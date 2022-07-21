<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Usuarios;
use App\Models\Carros;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'as' => Usuarios::class], function () use ($router) {
    $router->post('usuarios', ['uses' => 'UsuariosController@store', 'middleware' => 'ValidateDataMiddleware']); //Uma rota no sistema que permita cadastrar um usuário na tabela criada
    
    $router->get('usuarioCarros/{id}', ['uses' => 'UsuariosController@getUserWithCars']); //Uma rota no sistema que retorne um usuário com todos os seus carros por um id informado na rota
    
    $router->get('usuariosCarros', ['uses' => 'UsuariosController@getUsersWithCars']); //Uma rota no sistema que retorne todos os usuários com todos os carros relacionados do sistema

    $router->get('usuarios',  ['uses' => 'UsuariosController@getList']); // todos os usuários cadastrados no sistema

    $router->get('usuarios/{id}', ['uses' => 'UsuariosController@get']); // um usuário por id

    $router->delete('usuarios/{id}', ['uses' => 'UsuariosController@deleteUsuarioERelacionamentoComCarro']); // Uma rota no sistema que permita deletar um usuário na tabela de usuários recebendo um id de usuário

    $router->put('usuarios/{id}', ['uses' => 'UsuariosController@update', 'middleware' => 'ValidateDataMiddleware']); //Uma rota no sistema que receba um id de um usuário e permita atualizar seu email e senha


});

$router->group(['prefix' => 'api', 'as' => Carros::class], function () use ($router) {

    $router->post('carros', ['uses' => 'CarrosController@store', 'middleware' => 'ValidateDataMiddleware']); //Uma rota no sistema que permita cadastrar um carro na tabela criada
    
    $router->get('carros/{id}', ['uses' => 'CarrosController@get']);//Uma rota no sistema que retorne um carro por um id informado na rota

    $router->get('carros',  ['uses' => 'CarrosController@getList']);//Uma rota no sistema que retorne todos os carros do sistema

    $router->put('carros/{id}', ['uses' => 'CarrosController@update', 'middleware' => 'ValidateDataMiddleware']);//Uma rota no sistema que receba um id de um carro e permita atualizar o carro

    $router->delete('carros/{id}', ['uses' => 'CarrosController@destroy']);//Uma rota no sistema que permita deletar um carro na tabela de carros recebendo um id de carro

    $router->get('associarUsuario/{usuarioId}/carro/{carroId}', ['uses' => 'CarrosController@associarUsuarioCarro']);//Uma rota no sistema que associa um usuário com um carro

    $router->get('desassociarUsuario/{carroId}', ['uses' => 'CarrosController@desassociarUsuarioCarro']);//Uma rota que desassocia um usuário de um carro

});
