<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2 style="text-align:center; margin-bottom: 1rem;">Login</h2>

        <input type="email" name="email" placeholder="E-mail" required autofocus>
        <input type="password" name="password" placeholder="Senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
