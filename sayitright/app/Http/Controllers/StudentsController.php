<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\StudentCourse;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $studentCourses = StudentCourse::join('Courses', 'StudentCourse.CourseId', '=', 'Courses.Id')
            ->select('Courses.Name', 'Courses.Description', 'Courses.Days', 'Courses.Timings')
            ->get();


        // $studentCourses = DB::table('StudentCourse')
        //     ->join('Courses', 'StudentCourse.CourseId', '=', 'Courses.Id')
        //     ->select('Courses.Name', 'Courses.Description', 'Courses.Days', 'Courses.Timings')
        //     ->get();

        dd($studentCourses);

        //return view('student.index');
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
