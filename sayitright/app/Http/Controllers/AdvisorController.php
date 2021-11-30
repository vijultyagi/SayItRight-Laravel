<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class AdvisorController extends Controller
{
    public function index()
    {
        return view('advisor.index');
    }

    public function store(Request $request)
    {
        $user = Course::create([
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'Days' => $request->input('days'),
            'Timings' => $request->input('timings'),
        ]);

        return redirect('/advisor');
    }
}