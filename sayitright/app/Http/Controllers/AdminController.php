<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $professors = DB::table('Users')
        ->select('Name', 'PhoneNo', 'Email', 'Address')
        ->where('UserType', '=', 2)
        ->get();

        $advisors = DB::table('Users')
        ->select('Name', 'PhoneNo', 'Email', 'Address')
        ->where('UserType', '=', 3)
        ->get();

        return view('admin.index', ['professors' => $professors], ['advisors' => $advisors]);
    }
}
