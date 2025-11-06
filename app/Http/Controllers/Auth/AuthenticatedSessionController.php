<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash};
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request) {
        try
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required|string|min:6',
            ]);

            $user = User::where('email', $request->email)->orWhere('phone', $request->email)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Invalid credentials.'],
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'authToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'message' => "Login successful!"
            ]);

        } catch (\Throwable $th) {

            logger($th->getMessage());
            return response()->json([
                'status' => false,
                'message' => "Failed to login!",
                'exception' => $th->getMessage()
            ]);

        }

    }
    public function register(Request $request) {

        $request->validate([
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => "{$request->first_name} {$request->last_name}",
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => "Registration completed! Login to continue",
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);

    }

    public function store(LoginRequest $request)
    {
        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }   
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->boolean('remember')) === false){
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
         
        }
        Auth::guard('admin')->login($user);
        // $request->authenticate();
        // $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }


    public function logout(Request $request){
        logger($request->user()->currentAccessToken());
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => "Logged-out successfully!"
        ]);
    }
}
