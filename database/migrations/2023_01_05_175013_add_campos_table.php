<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saidas_produtos', function (Blueprint $table) {
            //
            $table->string('unidade_medida',10)->after('produto_id');
            $table->decimal('valor',5,2)->after('quantidade');
            $table->decimal('subtotal',5,2)->after('valor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saidas_produtos', function (Blueprint $table) {
            //
        });
    }
}
