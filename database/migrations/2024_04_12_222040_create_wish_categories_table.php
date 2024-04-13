<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\WishCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::create('wish_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });



        WishCategory::create(['name' => 'Health']);
        WishCategory::create(['name' => 'Education']);
        WishCategory::create(['name' => 'Entertainment']);
        WishCategory::create(['name' => 'Arts & Music']);
        WishCategory::create(['name' => 'Clothing']);
        WishCategory::create(['name' => 'Just For Fun']);
        WishCategory::create(['name' => 'Other']);




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_categories');
    }
};
