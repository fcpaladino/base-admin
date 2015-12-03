<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPapelPermissaoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->integer('id_permissao')->unsigned();
            $table->foreign('id_permissao')->references('id')->on('permissao')->onDelete('cascade');
            $table->integer('id_papel')->unsigned();
            $table->foreign('id_papel')->references('id')->on('papel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('papel_permissao');
    }
}
