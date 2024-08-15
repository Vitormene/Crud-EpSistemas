<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('descricao', 255);
            $table->integer('tipo');
            $table->string('observacoes', 255);
            $table->boolean('ativo');
            $table->string('whatsapp', 15)->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('conversion_origin', 255)->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
