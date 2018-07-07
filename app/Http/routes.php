<?php

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

$app->get('/', function () use ($app) {
    //return $app->version();
    return "<center><h1>Servidor 1</h1><br>Clientes</center>";
});
$app->get('/users', 'UsuariosController@index');
$app->get('/usuarios/{usuarios}', 'UsuariosController@getUsuario');
$app->post('/usuarios', 'UsuariosController@createUsuario');

$app->get('/clientes', 'ClientesController@index');
$app->get('/clientes/users', 'ClientesController@users');
$app->post('/clientes/users', 'ClientesController@createUser');
$app->get('/clientes/{clientes}', 'ClientesController@getCliente');
$app->get('/clientes/users/{users}', 'ClientesController@getClientes');
$app->post('/clientes', 'ClientesController@createCliente');
$app->put('/clientes/{clientes}', 'ClientesController@updateCliente');
$app->delete('/clientes/{clientes}', 'ClientesController@destroyCliente');