<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

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
      $animals = Animal::where('availability', 1)->get();
      return view('users.index', compact('animals'));
    }
}
