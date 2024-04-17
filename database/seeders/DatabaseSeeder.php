<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Child;
use Illuminate\Support\Arr;
use App\Models\Wish;
use App\Models\WishCategory;
use Faker\Factory as Faker;
use Carbon\Carbon;
//use DateTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {




         $admin =  Role::create(['name' => 'admin']);
         $donor =  Role::create(['name' => 'donor']);
         $guardian = Role::create(['name' => 'guardian']);
         $tester =  Role::create(['name' => 'tester']);



         $user = User::create([
            'username' => 'Dr.Steve',
            'name' => 'Steve Deemer',
            'email' => 'dr.steve@steven.news',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Hollywood',
            'state' => 'FL',
            'zip' => '33020',
            'lat' => 0.0,
            'lng' => 0.0,
            'birth_date' =>'1964-10-27'
        ]);
          $user->assignRole($admin);


         $user = User::create([
            'username' => 'Donor',
            'name' => 'Steve donor',
            'email' => 'donor@steven.news',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Hollywood',
            'state' => 'FL',
            'zip' => '33020',
            'lat' => 0.0,
            'lng' => 0.0,
            'birth_date' =>'1964-10-27'
        ]);
         $user->assignRole($donor);
         $user->assignRole($tester);


         $user = User::create([
            'username' => 'Guardian',
            'name' => 'Steve Gaurdian',
            'email' => 'guardian@steven.news',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Hollywood',
            'state' => 'FL',
            'zip' => '33020',
            'lat' => 0.0,
            'lng' => 0.0,
            'birth_date' =>'1964-10-27'
        ]);
    // Create the corresponding guardian record
         $user->assignRole($guardian);
         $guardian = Guardian::create([
            'user_id' => $user->id,
            'name'=> $user->name,
            // Other guardian attributes
          ]);






//lets create 50 tester/donors
$faker = Faker::create();     
        foreach (range(1, 50) as $index) {
            $fname= $faker->firstName; 
            $lname= $faker->lastName;

            $user = User::create([
               'username' => $faker->username,
               'name' => $fname . ' ' . $lname,
               'email' => $faker->unique()->safeEmail,
               'password' => bcrypt('password'), // Replace with a secure password
               'phone' => $faker->numerify('(###) ###-####'), // USA-based phone number format
               'fname' => $fname,
               'lname' => $lname,
                // Add other fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $user->assignRole($donor);
            $user->assignRole($tester);
        }

    




     $testguardian = Role::create(['name' => 'testguardian']);
 

//this will create 100 testuser/guardians 
    $faker = Faker::create();     
        foreach (range(1, 100) as $index) {
            $usernew = User::create([
               'username' => $faker->username,
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'password' => bcrypt('password'), // Replace with a secure password
               'phone' => $faker->numerify('(###) ###-####'), // USA-based phone number format
                // Add other fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);                              
            $usernew->assignRole('guardian');
//            $usernew->assignRole($testguardian);
              $usernew->assignRole($tester);
            $guardian = Guardian::create([
            'user_id' => $usernew->id,
            'name'=> $usernew->name,
            // Other guardian attributes
            ]);

            $numberOfChildren = rand(1, 3);
            // Create the specified number of children
            for ($i = 0; $i < $numberOfChildren; $i++) {
                $faker = \Faker\Factory::create();
$theage = rand(3, 17); // Random age between 3 to 17
// Get the current date
//$expires = Carbon::now()->addWeeks(2)->format('Y-m-d');
//$currentDate = Carbon::now()->addWeeks(2)->format('Y-m-d'); //new DateTime();

// Subtract the random age from the current year
//$currentDate->modify("-{$theage} years");

// Format the birth date
//$birth_date = $currentDate->format('Y-m-d');
$birth_date = Carbon::now()->subYears($theage)->format('Y-m-d');

                Child::create([
                    'guardian_id' => $guardian->id,
                    'name' => $faker->firstName,
                    'age' => $theage, 
                    'birth_date' => $birth_date,
                ]);
            }

        }









 // Get all children
        $children = Child::all();

        // Define wish items
        $wishItems = [
            ['name' => 'Crayons', 'value' => 5.99, 'catergory_id' => 4,'description' => 'A varity of colors for your everyday coloring needs'],
            ['name' => 'Coloring Book', 'value' => 10.99,  'catergory_id' => 4,'description' => 'A fun coloring book for kids'],
            ['name' => 'Bicycle', 'value' => 150.00,  'catergory_id' => 6, 'description' => 'A brand new bicycle for outdoor adventures'],
            ['name' => 'Desk', 'value' => 350.00,  'catergory_id' => 2, 'description' => 'A Desk for your all time learning adventures'],

            ['name' => 'Clothes', 'value' => 150, 'catergory_id' => 5,'description' => 'every child needs new clothes for a child to get a new pair of sox or shirt might be a gift they rather not have but to a foster child it is the difference from a frown to a Smile'],
            ['name' => 'Blankets', 'value' => 24.99,  'catergory_id' => 5,'description' => 'A Blanket might seem like a gag gift to a child but to a foster child in need of the cover to let them know tomorrow can be better is a gift we can sleep on '],
            ['name' => 'Pillows', 'value' => 10.99,  'catergory_id' => 5, 'description' => 'Pillows are the comfort of dreams lets help the children dream a little dream and bring hope to a bigger tomorrow'],
            ['name' => 'Jeans to Shirts', 'value' => 250.00,  'catergory_id' => 5, 'description' => 'making a child dress for the future can bring joy to everyone whom see them.'],




            // Add more wish items as needed
        ];

       
        foreach ($children as $child) {
            // Randomly determine the number of wish items (1 or 2) for each child
            $numWishItems = rand(1, 2);

            // Shuffle the $wishItems array to randomize the selection
            shuffle($wishItems);

            // Take a slice of the shuffled array to get the random wish items for this child
            $randomWishItems = array_slice($wishItems, 0, $numWishItems);

            foreach ($randomWishItems as $wishItemData) {

$expires = Carbon::now()->addWeeks(2)->format('Y-m-d');
$value = $wishItemData['value'];
$increasePercent = 0.10; // 10% increase
$increasedValue = $value * (1 + $increasePercent);

                Wish::create([
                    'child_id' => $child->id,
                    'name' => $wishItemData['name'],
                    'value' => $increasedValue,
                    'category_id' => $wishItemData['catergory_id'],
                    'description'  => $wishItemData['description'],
                    'expiration_date' =>  $expires,
                    'originalvalue' => $wishItemData['value'],
                ]);
        
                // Break the loop if the maximum number of wishes per child is reached
                if (--$numWishItems <= 0) {
                    break;
                }
            }
        }




    }
}
