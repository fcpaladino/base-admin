<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarConfiguracaoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracao', function(Blueprint $table){
            $table->increments('id')->nullable();

            $table->string('nome_site')->nullable();
            $table->string('titulo_site')->nullable();
            $table->text('descricao')->nullable();
            $table->longText('palavra_chave')->nullable();

            $table->string('smtp_servidor')->nullable();
            $table->string('smtp_porta')->nullable();
            $table->string('smtp_seguranca')->nullable();
            $table->string('smtp_email_resposta')->nullable();
            $table->string('smtp_usuario')->nullable();
            $table->string('smtp_senha')->nullable();

            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_google_plus')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_skype')->nullable();

            $table->text('google_analytics')->nullable();
            $table->text('google_tag_manager')->nullable();
            $table->text('analises_outros')->nullable();

            $table->string('contato_email')->nullable();
            $table->string('contato_emailcopia')->nullable();
            $table->string('contato_emailcopiaoculta')->nullable();

            $table->string('orcamento_email')->nullable();
            $table->string('orcamento_emailcopia')->nullable();
            $table->string('orcamento_emailcopiaoculta')->nullable();

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
        Schema::drop('configuracao');
    }
}
