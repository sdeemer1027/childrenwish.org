<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Child;
use App\Models\WishItem;
use Illuminate\Support\Arr;


class WishItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
public function run()
    {
        // Get all children
        $children = Child::all();

        // Define wish items
        $wishItems = [
            ['name' => 'Crayons', 'value' => 5.99, 'description' => 'A varity of colors for your everyday coloring needs'],
            ['name' => 'Coloring Book', 'value' => 10.99, 'description' => 'A fun coloring book for kids'],
            ['name' => 'Bicycle', 'value' => 150.00, 'description' => 'A brand new bicycle for outdoor adventures'],
            ['name' => 'Desk', 'value' => 350.00, 'description' => 'A Desk for your all time learning adventures'],
            // Add more wish items as needed
        ];

        foreach ($children as $child) {
            $randomWishItems = Arr::random($wishItems, rand(1, 2)); // Randomly choose 1 or 2 wish items

            foreach ($randomWishItems as $wishItemData) {
                $child->wishItems()->create($wishItemData);
            }
        }
    }


}
