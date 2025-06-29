<!DOCTYPE html>
<html>
<head>
    <title>Menu Principal</title>
</head>
<body>
    <h1>Menu Principal</h1>

    <ul>
        @if(Auth::user()->tipo === 'admin')
            <li><a href="{{ route('permissoes') }}">Gestão de Permissões</a></li>
            <li><a href="{{ route('usuarios') }}">Gestão de Usuários</a></li>
        @endif

        @if(Auth::user()->tipo === 'comum')
            <li><a href="{{ route('produtos') }}">Gestão de Produtos</a></li>
            <li><a href="{{ route('categorias') }}">Gestão de Categorias</a></li>
            <li><a href="{{ route('marcas') }}">Gestão de Marcas</a></li>
        @endif
    </ul>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Sair</button>
    </form>
</body>
</html>
