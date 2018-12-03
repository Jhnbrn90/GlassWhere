<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function store(Request $request)
    {
        $request->validate([
          'name'  => 'required',
        ]);

        $user = User::firstOrCreate(['name' => $request->name]);

        Auth::login($user);

        return redirect('/start');
    }
}
