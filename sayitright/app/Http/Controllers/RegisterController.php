<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


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
        $email = $request->input('email');
        Mail::to($email)->send(new Subscribe($email));
        
        return redirect('/login');
    }
}
