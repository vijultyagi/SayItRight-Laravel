<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $assignments = DB::table('Assignment')
            ->select('Topic', 'Description', 'DueDate', 'Points')
            ->get();
        
        $courses = DB::table('Courses')
        ->select('Name', 'Description', 'Days', 'Timings')
        ->get();

        return view('professor.index', ['assignments' => $assignments], ['courses' => $courses]);
    }

    public function store(Request $request)
    {
        $user = Assignment::create([
            'Topic' => $request->input('topic'),
            'Description' => $request->input('description'),
            'DueDate' => $request->input('duedate'),
            'Points' => $request->input('points'),
            'CourseId' => $request->input('courseId'),
        ]);

        return redirect('/professor');
    }
}
