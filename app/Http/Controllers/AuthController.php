<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        $data= $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            // Create the user
        $user = new User();
        $user->name= $request->name;
        $user->number= $request->number;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();

        
        Auth::login($user);
        return redirect('/login')->with('success', 'Registration successful! You are now logged in.');

    }
  
    public  function showinForm(){   
        return view('login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful!'); 
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    //logout
     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
     }
}
