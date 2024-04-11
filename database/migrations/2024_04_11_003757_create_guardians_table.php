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
        
Schema::create('guardians', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Add user_id column
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Define foreign key
        $table->string('name');
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
        Schema::dropIfExists('guardians');
    }
};
