<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
      return view('auth.adminlogin');
    }

    public function login(Request $request){
      // Validate form data
      $this->validate(request(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      // Attempt to log the user in
      if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
        // If successful, redirect to admin page
        return redirect()->intended(route('admin.dashboard'));
        // return redirect()->intended($this->redirectPath());
      }

      // If unsuccessful, redirect back to login with form data
       return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
