<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Usuários</title>
</head>
<body>
    <h1>Gestão de Usuários</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <h3>Novo Usuário</h3>
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <select name="tipo" required>
            <option value="comum">comum</option>
            <option value="admin">admin</option>
        </select>
        
        <h4>Permissões</h4>
        <label for="gestao_produtos">Gestão de Produtos</label>
        <input type="checkbox" name="gestao_produtos" value="1">
        
        <label for="gestao_categorias">Gestão de Categorias</label>
        <input type="checkbox" name="gestao_categorias" value="1">
        
        <label for="gestao_marcas">Gestão de Marcas</label>
        <input type="checkbox" name="gestao_marcas" value="1">
        
        <button type="submit">Criar</button>
    </form>

    <hr>

    <h3>Lista de Usuários</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Gestão de Produtos</th>
                <th>Gestão de Categorias</th>
                <th>Gestão de Marcas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->tipo }}</td>
                    <td>{{ $usuario->gestao_produtos ? 'Sim' : 'Não' }}</td>
                    <td>{{ $usuario->gestao_categorias ? 'Sim' : 'Não' }}</td>
                    <td>{{ $usuario->gestao_marcas ? 'Sim' : 'Não' }}</td>
                    <td>
                        <form method="POST" action="{{ route('usuarios.destroy', $usuario) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('menu') }}">Voltar</a>

</body>
</html>
