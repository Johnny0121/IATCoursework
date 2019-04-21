<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Image;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
        // $this->middleware('web', ['except' => ['edit', 'destroy', 'update', 'create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all()->toArray();
        return view('animals.index', compact('animals'));
    }

    /**
      * Display a listing of available animals
      */
    public function showAvailableAnimals(){
      $animals = Animal::where('availability', '1')->get();
      return view('animals.index', compact('animals'));
    }

    /**
      * Display a listing of animals by type
      */
    public function filterByType(Request $request){
      // Form validation
      // $this->validate(request(), [
      //   'animal' => 'required'
      // ]);
      // $type = $request->input('animal');
      // if(Auth::guard('admin')->check()){
      //   $animals = Animal::where('animal', $type)->get();
      // } else {
      //   $animals = Animal::where('availability', '1')->where('animal', $type)->get();
      // }
      // return view('animals.index', compact('animals'));

      if(Auth::guard('admin')->check()){
          $animals = Animal::where('animal', $request->input('animal'))->get();
      } else {
          $animals = Animal::where('availability', '1')->where('animal', $request->input('animal'))->get();
      }

      return view('animals.index', compact('animals'));
    }

    /**
      * Return a list of animals depending on user type
      * If admin, return all
      * If user, return all available
      */
    public function getAnimalsFromUserType(){
      if(Auth::guard('admin')->check()){
        return Animal::all();
      }

      // Else user guard
      return Animal::where('availability', '1')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $animal = $this->validate(request(), [
          'name' => 'required',
          'animal' => 'required',
          'type' => 'required',
          'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        // Handle uploading of image
        if($request->hasFile('image')){
          // File name with extension
          $fileNameWithExt = $request->file('image')->getClientOriginalName();
          // File name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          // Extension name
          $extension = $request->file('image')->getClientOriginalExtension();
          // Get filename to store
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;

          // Upload image
          $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
          $fileNameToStore = 'noimage.jpg';
        }

        // Create animal object
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->animal = $request->input('animal');
        $animal->type = $request->input('type');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->microchipped = $request->input('microchipped');
        $animal->vaccinated = $request->input('vaccinated');
        $animal->description = $request->input('description');
        $animal->availability = $request->input('availability');
        $animal->image = $fileNameToStore;
        $animal->created_at = now();
        $animal->updated_at = now();

        // Save animal object
        $animal->save();

        // Redirect back
        return back()->with('success', 'Animal has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animals.edit', compact('animal'));
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
        $animal = Animal::find($id);
        // Form validation
        $this->validate(request(), [
          'name' => 'required',
          'animal' => 'required',
          'type' => 'required',
          'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        // Handle uploading of image
        if($request->hasFile('image')){
          // File name with extension
          $fileNameWithExt = $request->file('image')->getClientOriginalName();
          // File name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          // Extension name
          $extension = $request->file('image')->getClientOriginalExtension();
          // Get filename to store
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;

          // Upload image
          $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
          $fileNameToStore = "noimage.jpg";
        }

        // Updated animal object props
        $animal->name = $request->input('name');
        $animal->animal = $request->input('animal');
        $animal->type = $request->input('type');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->microchipped = $request->input('microchipped');
        $animal->vaccinated = $request->input('vaccinated');
        $animal->image = $fileNameToStore;
        $animal->description = $request->input('description');
        $animal->availability = $request->input('availability');
        $animal->updated_at = now();
        //$animal->image = $fileNameToStore;

        // Save animal object
        $animal->save();

        // Redirect back
        return back()->with('success', 'Animal has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect(route('animals.index'))->with('success', 'Animal has successfully been deleted.');
    }
}
