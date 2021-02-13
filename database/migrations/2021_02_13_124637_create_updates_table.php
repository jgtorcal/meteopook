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

            $table->unsignedBigInteger('update_id');
            $table->string('message_id');
            $table->string('from_id');
            $table->string('from_username');
            $table->string('chat_id');
            $table->string('text')->nullable();
            
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
