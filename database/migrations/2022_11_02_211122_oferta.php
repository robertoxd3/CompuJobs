<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('cargo');
            $table->integer('anios_experiencia');
            $table->integer('rango_salarial');
            $table->string('descripcion');
            $table->string('estudios');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::down('oferta');
    }
};
