<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateUpdatesTable extends Migration
{ 
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('update_id')->nullable();;
            $table->string('message_id')->nullable();
            $table->string('from_id')->nullable();;
            $table->string('from_username')->nullable();;
            $table->string('chat_id')->nullable();;
            $table->string('text')->nullable();;
            
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
        Schema::dropIfExists('updates');
    }
}
