@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')

<div class="options">
    <ul>
        <li><a class="warning {{ request('opcao') == 1 ? 'selected' : '' }}" href="{{ Route('opcoes', 1) }}">Warning</a></li>
        <li><a class="info {{ request('opcao') == 2 ? 'selected' : '' }}" href="{{ Route('opcoes', 2) }}">Info</a></li>
        <li><a class="success {{ request('opcao') == 3 ? 'selected' : '' }}" href="{{ Route('opcoes', 3) }}">Success</a></li>
        <li><a class="error {{ request('opcao') == 4 ? 'selected' : '' }}" href="{{ Route('opcoes', 4) }}">Error</a></li>
    </ul>
</div>


@if (isset($opcao))
    @switch($opcao)
        @case(1)
            @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'warning'])
                <p><strong>Warning</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @case(2)
            @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'info'])
                <p><strong>Info</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @case(3)
            @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'success'])
                <p><strong>Success</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @case(4)
            @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'error'])
                <p><strong>Error</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @default
    @endswitch
@endif
@endsection