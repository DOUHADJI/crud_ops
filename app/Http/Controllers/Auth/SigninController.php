<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{




    public function create()
    {
        return view("auth.signin");
    }


    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" => now(),
        ]);
        return redirect()->route("auth.login");
    }
}
