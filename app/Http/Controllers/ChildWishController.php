<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wish;
use App\Models\WishCategory;

class ChildWishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $user = Auth::user();
    $role = $user->getRoleNames()->first();

    //    return view('admin.wishes.index', ['role' => $role]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($child_id)
    {

        $categories = WishCategory::all();
        // Use $child_id here to fetch any necessary data or perform actions
        // For example, you can pass $child_id to the view if needed
        return view('createWish', ['child_id' => $child_id , 'categories' => $categories ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


 $validatedData = $request->validate([
            'child_id' => 'integer|min:1', // Assuming 'guardians' is the guardians table name
            'description' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
             'value' => 'required|string|max:255',
             'category_id' => 'integer|min:1',
             'expiration_date' =>'required|date_format:Y-m-d',

        ]);
$value = $validatedData['value'];
$increasePercent = 0.10; // 10% increase
$increasedValue = $value * (1 + $increasePercent);

        // Create and store the child
        Wish::create([
           'child_id' => $validatedData['child_id'],
           'description' => $validatedData['description'],
           'name' => $validatedData['name'],
           'value' => $increasedValue,  
           'category_id' => $validatedData['category_id'],
           'expiration_date' =>  $validatedData['expiration_date'],
           'originalvalue' => $value,

        ]);

//          'value' => $validatedData['value'],
        return redirect()->route('home')->with('success', 'Wish  added successfully.'); 


            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
public function editwish($wish_id)
    {
        $wish = Wish::findOrFail($wish_id);

         $categories = WishCategory::all();

//dd($wish_id,$wish);

        return view('wish.edit', compact('wish','categories','wish_id'));
    }   




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatewish(Request $request, $wish_id)
    {
        
 $validatedData = $request->validate([
            'child_id' => 'integer|min:1', // Assuming 'guardians' is the guardians table name
            'description' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
             'value' => 'required|string|max:255',
             'category_id' => 'integer|min:1',
             'expiration_date' =>'required|date_format:Y-m-d',

        ]);
$value = $validatedData['value'];
$increasePercent = 0.10; // 10% increase
$validatedData['value'] = $value * (1 + $increasePercent);

         $wish = Wish::findOrFail($wish_id);

        $wish->update($validatedData);

        return redirect()->route('home')->with('success', 'Wish updated successfully');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
