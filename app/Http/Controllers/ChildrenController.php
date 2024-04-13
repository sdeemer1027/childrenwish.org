<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Child;
use App\Models\Guardian;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $children = Child::with('guardian')->get();


       // return view('admin.children.index', compact('children')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $user = Auth::user();    
          $guardianID = Guardian::where('user_id','=',$user->id)->first();

        return view('addChild',compact('guardianID'));

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
            'guardian_id' => 'integer|min:1', // Assuming 'guardians' is the guardians table name
            'name' => 'required|string|max:255',
            'age' => 'required|string|min:1',
            'birth_date'  => 'string|min:1',
            'type' => 'string|min:1',
            'illness' => 'string|min:1',
        ]);

        // Create and store the child
        Child::create([
            'guardian_id' => $validatedData['guardian_id'],
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'birth_date' => $validatedData['birth_date'],
            'type' => $validatedData['type'],
            'illness' => $validatedData['illness'],

        ]);

        return redirect()->route('home')->with('success', 'Child added successfully.');
  

$guardianid = $request->guardian_id;
$name = $request->name;
$age = $request->age;



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
    public function edit($child_id)
    {
        $child = Child::findOrFail($child_id);
        return view('children.edit', compact('child'));
    }   




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $child_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:3|max:17',
            'type' => 'string|max:255',
            'illness' => 'string|max:255',
            // Add other validation rules as needed
        ]);

        $child = Child::findOrFail($child_id);
        $child->update($validatedData);

        return redirect()->route('home')->with('success', 'Child updated successfully');
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
