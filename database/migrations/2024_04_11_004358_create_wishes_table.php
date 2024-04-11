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
       Schema::create('wishes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('child_id');
        $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
        $table->text('description');
        $table->boolean('fulfilled')->default(false);
        // Add other fields as needed
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
        Schema::dropIfExists('wishes');
    }
};
