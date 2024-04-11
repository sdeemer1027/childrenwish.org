<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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



  $admin =  Role::create(['name' => 'admin']);
  // Assign the admin role to the user
        $user->assignRole($admin);

         $donor =  Role::create(['name' => 'donor']);
         $gaurdian = Role::create(['name' => 'gaurdian']);

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

$user = User::create([
            'username' => 'Gaurdian',
            'name' => 'Steve donor',
            'email' => 'gaurdian@steven.news',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Hollywood',
            'state' => 'FL',
            'zip' => '33020',
            'lat' => 0.0,
            'lng' => 0.0,
            'birth_date' =>'1964-10-27'
        ]);
 $user->assignRole($gaurdian);
    }
}
