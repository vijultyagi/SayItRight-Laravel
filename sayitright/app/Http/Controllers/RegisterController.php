<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'Name' => $request->input('name'),
            'PhoneNo' => $request->input('phone'),
            'Email' => $request->input('email'),
            'Address' => $request->input('address'),
            //'NameRecordingPath' => $request->input('NameRecordingPath'),
            'UserName' => $request->input('uname_r'),
            'Password' => $request->input('pass_r'),
            'UserType' => $request->input('userType')
        ]);

        return redirect('/login');
    }
}
