<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\StudentCourse;
use App\Models\Assignment;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $studentCourses = DB::table('StudentCourses as s')->select(
            'c.Name as name',
            'c.Description as desc',
            'c.Days',
            'c.Timings',
        )
            ->leftjoin('Courses as c', 'c.Id', '=', 's.CourseId')
            ->get();

        $assignments = DB::table('Assignment')
        ->select('Topic', 'Description', 'DueDate', 'Points')
        ->get();

        return view('student.index', ['studentCourses' => $studentCourses], ['assignments' => $assignments]);
    }

    public function store(Request $request)
    {
        $user = StudentCourse::create([
            'CourseId' => $request->input('course'),
            'ProfessorId' => $request->input('professor'),
            'StudentId' => $request->input(''),
        ]);

        return redirect('/student');
    }
}
