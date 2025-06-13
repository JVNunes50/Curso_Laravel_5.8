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
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
        $id = count($clientes) + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $clientes[] = $dados;
        session(['clientes'=>$clientes]);
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
        $cliente = $clientes [$id - 1];
        return view('clientes.info', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $cliente = $clientes [$id - 1];
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $clientes [$id - 1]['nome'] = $request->nome;
        session(['clientes'=>$clientes]);
        return redirect()->route('clientes.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        array_splice($clientes, $index, 1);
        session(['clientes'=>$clientes]);
        return redirect()->route('clientes.index');
    }
}
