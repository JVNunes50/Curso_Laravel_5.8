@extends('layouts.principal')

@section('titulo', 'Clientes - Informação')

@section('conteudo')

<h3>Informação do Cliente</h3>

<p>ID: {{$cliente['id']}}</p>
<p>Nome: {{$cliente['nome']}}</p>
<br>

<a href="{{ route('clientes.index') }}">Voltar</a>

@endsection