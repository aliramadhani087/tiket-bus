<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check the role of the authenticated user
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/ticket');
        } elseif ($user->role === 'customer') {
            return redirect()->intended('/customer/transaction');
        }
    }

    return back()->with('msgError', 'Login Gagal');
}

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/'); // Atau rute lain yang sesuai
    }
}