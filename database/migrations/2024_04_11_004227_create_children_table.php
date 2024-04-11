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
       Schema::create('children', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('guardian_id'); // Add guardian_id column
        $table->foreign('guardian_id')->references('id')->on('guardians')->onDelete('cascade'); // Define foreign key
        $table->string('name');
        $table->integer('age');
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
        Schema::dropIfExists('children');
    }
};
