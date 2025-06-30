
📋 Pré-requisitos
    instalar:
        php
        laravel
        composer
        node
        git
        7zip

🔧 Instalação
    Abra um terminal no seu ambiente php e execute os comandos:

        git clone "https://github.com/evandrorsouza/teste-laravel.git"

    Abra um terminal na pasta do projeto e execute:

        composer install

        cp .env.example .env

    Configure seu banco de dados mysql no .env:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nome_do_seu_banco
        DB_USERNAME=root
        DB_PASSWORD=senha_seu_banco

    Execute eses comandos:

        php artisan key:generate

        php artisan migrate

    Verifique se os dados ja estão populados no seu banco, caso não estejam execute o comando:
        php artisan db:seed

    Então execute:

        php artisan serve

⚙️ Credenciais para os testes:

    Perfil Admin:
        Login: admin1@teste.com
        Senha: 12345678
    
    Perfis Comums:
        Login: comum@teste.com
        Senha: 12345678

        Login: comum2@teste.com
        Senha: 12345678