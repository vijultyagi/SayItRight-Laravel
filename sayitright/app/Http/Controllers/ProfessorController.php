<?php

namespace App\Http\Controllers;
use App\Models\Assignment;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return view('professor.index');
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
