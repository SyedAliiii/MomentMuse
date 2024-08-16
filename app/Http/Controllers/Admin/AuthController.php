<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login()
    {
        if (session()->get('user_role') === 'admin' && session()->has('admin')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('Admin.Login');
    }
    
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.email' => 'The email must be a valid email address.',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session()->put('user_role', 'admin');
            session()->put('admin', $admin->id); // Store the admin ID or any relevant identifier
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials provided.']);
        }
    }
    public function logout(Request $request)
    {
        session()->forget('user_role');
        session()->forget('admin');

        Auth::logout();

        // Redirect the user to the login page
        return redirect()->route('index');
    }
}
