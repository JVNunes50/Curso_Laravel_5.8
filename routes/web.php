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

use Illuminate\Http\Request;

// Parâmetros das rotas
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

Route::get('/produtos', function() {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "<ol>";
})  -> name('meusProdutos');

// ------------------
// Redirecionando requisições

Route::redirect('todosProdutos1', 'produtos', 301);

Route::get('todosProdutos2', function() {
    return redirect() -> route('meusProdutos');
});

// ------------------
// Métodos HTTP

// É usado para enviar dados para criar um novo recurso. Por exemplo, ao preencher um formulário de cadastro e clicar em "Enviar", você está fazendo uma requisição POST com seus dados para criar um novo usuário.
Route::post('/requisicoes', function(Request $request) {
    return 'Hello POST';
});

// É usado para excluir um recurso específico.
Route::delete('/requisicoes', function(Request $request) {
    return 'Hello DELETE';
});

// É usado para atualizar um recurso existente de forma completa. Ao usar PUT, você envia o recurso inteiro, substituindo completamente a versão antiga pela nova que você enviou.
Route::put('/requisicoes', function(Request $request) {
    return 'Hello PUT';
});

// É usado para atualizar parcialmente um recurso existente. Diferente do PUT, o PATCH envia apenas as alterações que você deseja fazer, sem a necessidade de enviar o recurso completo.
Route::patch('/requisicoes', function(Request $request) {
    return 'Hello PATCH';
});

Route::options('/requisicoes', function(Request $request) {
    return 'Hello OPTIONS';
});

// É usado para solicitar dados de um recurso. É como pedir para ver uma página ou obter informações. 
Route::get('/requisicoes', function(Request $request) {
    return 'Hello GET';
});