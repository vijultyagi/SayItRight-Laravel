<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $first = $request->input('first');
        $last = $request->input('last');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $query = $request->input('query');
        Mail::to($email)->send(new Subscribe($email));
        return new JsonResponse(
            [
                'success' => true, 
                'message' => "Thank you for subscribing to our email, please check your inbox"
            ], 
            200
        );
    }
}
