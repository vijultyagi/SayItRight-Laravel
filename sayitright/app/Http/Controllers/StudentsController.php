<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\StudentCourse;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        // $studentCourses = StudentCourse::join('Courses', 'StudentCourse.CourseId', '=', 'Courses.Id')
        //     ->select('Courses.Name', 'Courses.Description', 'Courses.Days', 'Courses.Timings')
        //     ->get();

            $studentCourses = DB::table('StudentCourses as s')->select(
                'c.Name as name',
                'c.Description as desc',
                'c.Days',
                'c.Timings',
            )
                ->leftjoin('Courses as c', 'c.Id', '=', 's.CourseId')
                ->get();
        // $studentCourses = DB::table('StudentCourse')
        //     ->join('Courses', 'StudentCourse.CourseId', '=', 'Courses.Id')
        //     ->select('Courses.Name', 'Courses.Description', 'Courses.Days', 'Courses.Timings')
        //     ->get();

        //dd($studentCourses[0]->name);

        return view('student.index', ['studentCourses' => $studentCourses]);
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
