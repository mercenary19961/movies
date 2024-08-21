<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }  
    
    public function registration(): View
    {
        return view('auth.registration');
    }
    
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Store the user's name in the session
            Session::put('user_name', $user->name);
    
            if ($user->role_id == 2) {
                return redirect()->route('dashboard')
                    ->withSuccess('You have Successfully logged in as Admin');
            } else {
                return redirect()->route('welcome')
                    ->withSuccess('You have Successfully logged in as User');
            }
        }
    
        return redirect("login")->withError('Oops! You have entered invalid credentials');
    }
    
    
    public function dashboard()
    {
        return view('dashboard');
    }
    
    
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id']
        ]);
    }
    
    public function logout()
    {
        session()->forget('user_name'); // Clear the user's name from session
        Auth::logout();
        return Redirect('/');
    }
    
}
