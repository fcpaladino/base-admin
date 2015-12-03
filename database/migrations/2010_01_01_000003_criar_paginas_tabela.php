<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPaginasTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function(Blueprint $table){
            $table->increments('id')->nullable();

            $table->string('slug')->nullable();
            $table->text('seo_titulo')->nullable();
            $table->text('seo_descricao')->nullable();
            $table->text('seo_palavra_chave')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paginas');
    }
}
