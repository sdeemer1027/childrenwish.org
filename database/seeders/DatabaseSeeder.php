<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Child;

use Faker\Factory as Faker;



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
                Child::create([
                    'guardian_id' => $guardian->id,
                    'name' => $faker->name,
                    'age' => rand(3, 17), // Random age between 3 to 17
                ]);
            }






        }























    }
}
