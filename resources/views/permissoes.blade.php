<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Permissões</title>
</head>
<body>
    <h1>Gestão de Permissões</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('permissoes.atualizar') }}" method="POST">
        @csrf
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo Atual</th>
                    <th>Gestão de Produtos</th>
                    <th>Gestão de Categorias</th>
                    <th>Gestão de Marcas</th>
                    <th>Alterar para</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->tipo }}</td>
                        <td>
                            <select name="gestao_produtos[{{ $usuario->id }}]">
                                <option value="1" {{ $usuario->gestao_produtos == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ $usuario->gestao_produtos == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </td>
                        <td>
                            <select name="gestao_categorias[{{ $usuario->id }}]">
                                <option value="1" {{ $usuario->gestao_categorias == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ $usuario->gestao_categorias == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </td>
                        <td>
                            <select name="gestao_marcas[{{ $usuario->id }}]">
                                <option value="1" {{ $usuario->gestao_marcas == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ $usuario->gestao_marcas == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </td>
                        <td>
                            <select name="tipo[{{ $usuario->id }}]">
                                <option value="admin" {{ $usuario->tipo === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="comum" {{ $usuario->tipo === 'comum' ? 'selected' : '' }}>comum</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Atualizar Permissões</button>
    </form>

    <a href="{{ route('menu') }}">Voltar</a>

</body>
</html>
