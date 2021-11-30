<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    // public function create()
    // {
    //     return view('login.register');
    // }

    public function store(Request $request)
    {
        $username = $request->input('uname_l');
        $password = $request->input('pass_l');

        $user = User::where([['UserName', '=', $username],['Password', '=', $password]])->get();

        if(count($user)>0)
        {
            $userType = $user[0]['UserType'];

            switch($userType) {
                            case 1:
                                return redirect('/student/index');
                                break;
                            case 2:
                                return redirect('/professor/index');
                                break;
                            case 3:
                                return redirect('/advisor/index');
                                break;
                            case 4:
                                return redirect('/admin/index');
                                break;
                        }
        }
        else{
            dd('error');
        }
    }
}
