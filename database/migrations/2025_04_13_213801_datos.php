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
    Schema::create('datos', function (Blueprint $table) {
        $table->id('Id_dato');
        $table->unsignedInteger('Id_cultivo');
        $table->float('humedad');
        $table->float('ph');
        $table->float('temperatura');
        $table->time('hora');
        $table->timestamps();

        $table->foreign('Id_cultivo')->references('Id_cultivo')->on('cultivo')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos');
    }
};
