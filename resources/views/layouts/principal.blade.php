<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>
<body>
    <div class="row">
        <div class="col1">
            <div class="menu">
                <ul>
                    <li><a class="active" href="{{ route('clientes.index') }}"></a>Clientes</li>
                    <li><a href=""></a>Produtos</li>
                    <li><a href=""></a>Departamento</li>
                </ul>
            </div>
        </div>
        <div class="cal2">
            @yield('conteudo')
        </div>
    </div>
</body>
</html>