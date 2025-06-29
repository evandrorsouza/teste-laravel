<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            min-width: 300px;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 0.5rem;
            background-color: #6366f1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4f46e5;
        }

        .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <h2 style="text-align:center; margin-bottom: 1rem;">Login</h2>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
        <input type="password" name="password" placeholder="Senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
