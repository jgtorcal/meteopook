<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prueba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('update_id');
            $table->bigInteger('message_id');
            $table->bigInteger('from_id');
            $table->string('from_username');
            $table->bigInteger('chat_id');
            $table->string('command')->nullable();
            $table->string('text')->nullable();
            $table->string('pruebafield')->nullable();
            
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
        Schema::dropIfExists('prueba');
    }
}
