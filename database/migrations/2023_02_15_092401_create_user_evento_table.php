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
        Schema::create('user_evento', function (Blueprint $table) {

            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('evento_id')->constrained('eventos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('numEntradas');
            $table->enum('estado', ['recibida', 'confirmada','cancelada']);
            $table->primary(['user_id', 'evento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_evento');
    }
};
