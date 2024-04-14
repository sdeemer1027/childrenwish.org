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
use App\Models\WishCategory;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
  //      $this->middleware('auth');
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

//dd($role);

if($role == 'guardian')
{


 $guardian = Guardian::with('user', 'children.wishes')->where('user_id','=', $user->id)->get();

//dd($guardian);

 return view('homeguardian',  compact('guardian','role')); 
}
    else { 
        return view('home', ['role' => $role]);
}

//}


   

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



public function publicwish(){

 $wishes = Wish::with('child')
  ->orderBy('expiration_date', 'asc')->where('fulfilled',0)
  ->paginate(24); //->get();
$category = WishCategory::all();


//$expirationDate = Carbon::parse($wish->expiration_date);
//$wishes = [];

     return view('publicwishes', compact('wishes','category'));
}
public function getWishesByCategory($catis)
    {
        $category = WishCategory::all();
        // Fetch wishes based on the category
        $wishes = Wish::whereHas('category', function ($query) use ($catis) {
            $query->where('id', $catis);
        })
         ->orderBy('expiration_date', 'asc')->where('fulfilled',0)
        ->paginate(24); //->get();

return view('publicwishes', compact('wishes','category'));
        // You can modify this to return a view with the wishes data
 //       return response()->json(['wishes' => $wishes]);
    }

}
