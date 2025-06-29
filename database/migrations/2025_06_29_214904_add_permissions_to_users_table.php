<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('gestao_produtos')->default(0); // Permissão para gestão de produtos
            $table->tinyInteger('gestao_categorias')->default(0); // Permissão para gestão de categorias
            $table->tinyInteger('gestao_marcas')->default(0); // Permissão para gestão de marcas
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gestao_produtos');
            $table->dropColumn('gestao_categorias');
            $table->dropColumn('gestao_marcas');
        });
    }
};
