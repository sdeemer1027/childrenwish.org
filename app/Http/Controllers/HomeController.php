<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Child;
use App\Models\Wish;
use App\Models\Guardian;
use Spatie\Permission\Models\Role;
use App\Models\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $user = Auth::user();
    $role = $user->getRoleNames()->first();

    return view('home', ['role' => $role]);
    //    return view('home');
    }


public function welcomindex()
    {
 //       $donorCount = Donor::count();


         // Get the 'donor' role
        $donorRole = Role::where('name', 'donor')->first();

        if ($donorRole) {
            // Count users with the 'donor' role
            $donorCount = $donorRole->users()->count();
        } else {
            $donorCount = 0; // Handle case where 'donor' role is not found
        }

        $childCount = Child::count();
        $wishCount = Wish::count();
        $guardianCount = Guardian::count();

        return view('welcome', compact( 'donorCount', 'guardianCount' ,'childCount', 'wishCount'));
    }



}
