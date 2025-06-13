<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    private $clientes = [
        ['id' => 1, 'nome' => 'Joao'],
        ['id' => 2, 'nome' => 'Pedro'],
        ['id' => 3, 'nome' => 'Thiago'],
        ['id' => 4, 'nome' => 'Jesus']
    ];

    public function __construct() {
        $clientes = session('clientes');
        if (!isset($clientes))
            session(['clientes'=>$this->clientes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // Lista de clientes usando a views

        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));

        // Lista de clientes
        /*
        echo "<ol>";
        foreach($this->clientes as $c){
            echo "<li>" . $c['nome'] . "</li>";
        }
        echo "<ol>";
        */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // Formulário de Criação
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Salvar Novo Cliente
    {
        $clientes = session('clientes'); // Pega a lista atual da sessão.
        $id = end($clientes)['id'] + 1; // Pega o ID do último cliente e soma 1 para criar um novo ID.
        $nome = $request->nome; // Pega o nome enviado pelo formulário.
        $dados = ['id'=>$id, 'nome'=>$nome]; // Cria um array com os dados do novo cliente.
        $clientes[] = $dados; // Adiciona o novo cliente à lista.
        session(['clientes'=>$clientes]); // Salva a lista atualizada de volta na sessão.
        return redirect()->route('clientes.index');
        /*    
        $clientes = $this->clientes;
        return view('clientes.index', compact(['clientes']));
        */ 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes [$index];
        return view('clientes.info', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // Formulário de Edição
    {
        $clientes = session('clientes');  // Pega a lista da sessão.
        $index = $this->getIndex($id, $clientes); // Encontra a posição (índice) do cliente no array.
        $cliente = $clientes [$index]; // Pega os dados desse cliente.
        return view('clientes.edit', compact('cliente')); // Envia o cliente para a view de edição.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // Atualizar Cliente
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes); // Acha o cliente a ser atualizado.
        $clientes [$index]['nome'] = $request->nome; // Atualiza o nome com o que veio do formulário.
        session(['clientes'=>$clientes]); // Salva a lista modificada na sessão.
        return redirect()->route('clientes.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Apagar Cliente
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes); // Acha o índice do cliente a ser apagado.
        array_splice($clientes, $index, 1); // Remove o cliente do array.
        session(['clientes'=>$clientes]); // Salva a lista (agora sem o cliente) na sessão.
        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes) // Função Auxiliar
    {
        $ids = array_column($clientes, 'id'); // Cria um array contendo apenas os IDs de todos os clientes.
        $index = array_search($id, $ids); // Procura o '$id' recebido nesse array de IDs e retorna sua posição.
        return $index;
    }
}
