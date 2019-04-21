<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Animal;

class ImageController extends Controller
{

    public function __construct(){
      $this->middleware('auth:admin,web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Form validation
        $this->validate(request(), [
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

          $image = new Image;
          $image->animalid = $request->input('animalid');
          $image->image = $fileNameToStore;
          $image->created_at = now();
          $image->updated_at = now();

          // Save image
          $image->save();

          return redirect()->action('ImageController@show', $image->animalid)->with('success', 'Successfully added new image for animal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $animal = Animal::find($id)->toArray();
      $images = Image::where('animalid', $id)->get()->toArray();
      $animalimages = array_combine(['animal', 'images'], [$animal, $images]);

      return view('animals.images.show', compact('animalimages'));
    }

    /**
      * Display all images for a specific animal
      * @param int $id ID of animal
      */
    public function showAnimalImages($id){
        $animal = Animal::find($id)->toArray();
        $images = Image::where('animalid', $id)->get()->toArray();
        $animalimages = array_combine(['animal', 'images'], [$animal, $images]);

        return view('animals.images.show', compact('animalimages'));
    }

    /**
      * Delete an image record
      * @param int $id ID of image to delete
      */
    public function removeImage($id){
        $image = Image::find($id);
        $animalid = $image['animalid'];
        $image->delete();
        return redirect(action('ImageController@show', $animalid))->with('success', 'Successfully removed image from animal');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id ID of image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      // $img = Image::find($id);
      // return var_dump($img);
        // $image = Image::find($id)->toArray();
        // $animalid = $image['animalid'];
        // $image->destroy();
        //return redirect(action('ImageController@show', $animalid))->with('success', 'Successfully removed image from animal');
    }

    /**
      * Show the form for adding a new image for a specific animal
      * @param int $id ID of animal to add new image to
      */
    public function addNewImage($id){
      $animal = Animal::find($id);
      return view('animals.images.create', compact('animal'));
    }
}
