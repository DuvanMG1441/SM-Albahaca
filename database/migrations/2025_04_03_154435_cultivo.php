<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cultivo', function (Blueprint $table) {
            $table->id('Id_cultivo');
            $table->unsignedBigInteger('Id_usuario');
            $table->string('Descripcion');
            $table->date('Fecha_inicio');
            $table->date('Fecha_Final')->nullable();
            $table->string('Estado');
            $table->foreign('Id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cultivos');
    }
};
