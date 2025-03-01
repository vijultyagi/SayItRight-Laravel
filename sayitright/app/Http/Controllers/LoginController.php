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

    public function store(Request $request)
    {
        $username = $request->input('uname_l');
        $password = $request->input('pass_l');

        $user = User::where([['UserName', '=', $username],['Password', '=', $password]])->get();

        if(count($user)>0)
        {
            $studentId = $user[0]['Id'];

            //Login session
            //$request->session()->put('studentId',$studentId);

            $userType = $user[0]['UserType'];
            
            switch($userType) {
                            case 1:
                                return redirect('/student');
                                break;
                            case 2:
                                return redirect('/professor');
                                break;
                            case 3:
                                return redirect('/advisor');
                                break;
                            case 4:
                                return redirect('/admin');
                                break;
                        }
        }
        else
        {
            return redirect('/login');
        }
    }
}
