<?php

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

// Parâmetros opcionais
Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return "Ola!";
});

Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "Ola! Seja bem-vindo, $nome $sobrenome!";
});
// ------------------

// Parâmetros opcionais
Route::get('/seunome/{nome?}', function ($nome=null) {
    if (isset($nome))
        return "Ola! Seja bem-vindo, $nome!";
    else
        echo "Nome não informado!";
});

// ------------------

// Parâmetros com regras
Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n){
    for($i=0; $i<$n; $i++){
        return "Ola! Seja bem-vindo, $nome!";
    }
})  -> where('nome', '[A-Za-z]+') 
    -> where('n', '[0-9]+');

// ------------------

// Agrupamento de rotas
Route::prefix('/app') -> group(function() {

    Route::get('/', function () {
        return view('app');
    }) -> name('app'); // Nomeando rotas

    Route::get('/profile', function () {
        return view('profile');
    }) -> name('appProfile'); // Nomeando rotas

    Route::get('/user', function () {
        return view('user');
    }) -> name('appUser'); // Nomeando rotas
});