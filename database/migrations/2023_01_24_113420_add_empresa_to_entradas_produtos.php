<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaToEntradasProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entradas_produtos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('empresa_id')->nullable()->after('data'); //foreing vem da própria tabela equipamentos
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entradas_produtos', function (Blueprint $table) {
            //
        });
    }
}
