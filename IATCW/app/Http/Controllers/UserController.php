<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Animal;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('availability', '1')->get();
        return view('users.index', compact('animals'));
    }

    /**
      * Display a listing of the resource with available animals passed
      */
    public function indexAvailable(){
      $animals = Animal::where('availability', 1);
      return view('users.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $this->validate(request(), [
          'forename' => 'required|max:255',
          'surname' => 'required|max:255',
          'telephone' => 'required|min:10',
          'gender' => 'required',
        ]);

        // Update user record
        $user = User::find($id);
        $user->forename = $request->input('forename');
        $user->surname = $request->input('surname');
        $user->telephone = $request->input('telephone');
        $user->gender = $request->input('gender');
        $user->save();

        // Redirect
        if(Auth::guard('admin')->check()){
          return back()->with('success', 'Succesfully updated user details.');
        }

        return redirect(route('users.index'))->with('success', 'Succesfully updated user details.');

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
