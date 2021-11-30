<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;


class AdvisorController extends Controller
{
    public function index()
    {

        $professors = DB::table('Users')
        ->select('Name', 'PhoneNo', 'Email', 'Address')
        ->where('UserType', '=', 2)
        ->get();

        $courses = DB::table('Courses')
        ->select('Name', 'Description', 'Days', 'Timings')
        ->get();

        return view('advisor.index', ['professors' => $professors], ['courses' => $courses]);
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