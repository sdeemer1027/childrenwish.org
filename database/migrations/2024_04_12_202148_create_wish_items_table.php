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
        Schema::create('wish_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wish_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('value', 10, 2); // Adjust precision and scale as needed
            $table->text('description')->nullable();
            $table->boolean('fulfilled')->default(false);
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
        Schema::dropIfExists('wish_items');
    }
};
