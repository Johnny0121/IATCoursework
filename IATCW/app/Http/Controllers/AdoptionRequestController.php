<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdoptionRequest;
use App\User;
use App\Animal;
use Illuminate\Support\Facades\Auth;
use DB;

class AdoptionRequestController extends Controller
{
    public function __construct(){
      // FIX
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::guard('admin')->check()){
        $adoptionrequests = AdoptionRequest::all()->toArray();
      } else {
        $adoptionrequests = AdoptionRequest::where('userid', Auth::id())->get();
      }
        return view('adoptionrequests.index', compact('adoptionrequests'));
    }

    /**
      * Display all adoptionrequests (if any) made by given user
      */
    public function showUserRequests($id){
      $adoptionrequests = AdoptionRequest::where('userid', $id)->get();
      return view('adoptionrequests.index', compact('adoptionrequests'));
    }

    /**
     * Display a listing of adoption requests for a certain id
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdoptionRequestsById($id){
      $adoptionrequests = AdoptionRequest::where('id', $id)->get();
      return view('adoptionrequests.index', compact('adoptionrequests'));
    }

    /**
      * Show the form for creating an adoption request with pre-filled data in some form elements
      *
      */
    public function makeadoptionrequest($id){
         $animal = Animal::find($id);
         return view('adoptionrequests.create', compact('animal'));
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
        // Check authentication
        if(!(Auth::guard('admin')->check() || Auth::guard('web'))){
          return redirect()->back()->with('denied', 'You do not have permissions to perform this action');
        }

        // Form validation
        $this->validate(request(), [
          'userid' => 'required|numeric',
          'animalid' => 'required|numeric',
        ]);

        // Create new adoptionrequest object
        $adoptionrequest = new AdoptionRequest;
        $adoptionrequest->userid = $request->input('userid');
        $adoptionrequest->animalid = $request->input('animalid');
        $adoptionrequest->description = $request->input('description');
        $adoptionrequest->created_at = now();
        $adoptionrequest->updated_at = now();

        // Store adoptionrequest object
        $adoptionrequest->save();
        // Redirect
        return back()->with('success', 'Adoption request successfully created. Your request is now waiting for consideration. Best of luck!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adoptionrequest = AdoptionRequest::find($id);
        return view('adoptionrequests.show', compact('adoptionrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adoptionrequest = AdoptionRequest::find($id);
        return view('adoptionrequests.edit', compact('adoptionrequest'));
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
        $adoptionrequest = AdoptionRequest::find($id);

        // Form validation
        $this->validate(request(), [
          'state' => 'required',
          'userid' => 'required',
          'animalid' => 'required',
        ]);

        // Update props
        $adoptionrequest->state = $request->input('state');
        $adoptionrequest->description = $request->input('description');
        $adoptionrequest->updated_at = now();
        // Save adoption request
        $adoptionrequest->save();

        // Redirect
        return redirect(route('admin.dashboard'))->with('success', 'Adoption Request has successfully been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adoptionrequest = AdoptionRequest::find($id);
        $adoptionrequest->delete();

        return redirect(route('adoptionrequests.index'))->with('success', 'Successfully deleted adoption request');
    }

    /**
      * Approve a specific request
      *
      * @param int $id ID of AdoptionRequest
      */
    public function approveAdoptionRequest($id){
        $adoptionrequest = AdoptionRequest::find($id);
        $adoptionrequest->state = 'approved';
        $adoptionrequest->save();

        return redirect(route('admin.dashboard'))->with('success', 'Successfully changed status of adoption request');
    }

    /**
      * Reject a specific request
      */
    public function rejectAdoptionRequest($id){
        $adoptionrequest = AdoptionRequest::find($id);
        $adoptionrequest->state = 'rejected';
        $adoptionrequest->save();

        return redirect(route('admin.dashboard'))->with('success', 'Successfully changed status of adoption request');
    }

    /**
      * Display a list of animals and adoptions (if any)
      */
    public function showAdoptions(){
      // Set up query - join 3 tables where adoption_requests is connecting entity (return empty cells also)
      $query = "SELECT a.id AS animalid, a.name, a.animal, a.availability, ar.state, u.id AS userid, u.forename, u.surname
      FROM adoption_requests AS ar
      LEFT JOIN users AS u ON ar.userid = u.id
      RIGHT JOIN animals AS a ON ar.animalid = a.id
      WHERE ar.state = 'approved'";

      $data = DB::select($query);
      // var_dump($data);
      return view('adoptionrequests.adoption', compact('data'));
    }
}
