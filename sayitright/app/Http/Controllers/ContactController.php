<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //email code
        dd($first);
        //return redirect('/contact-us');
    }
}
