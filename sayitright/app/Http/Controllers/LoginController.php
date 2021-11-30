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

    public function create()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'Name' => $request->input('name'),
            'PhoneNo' => $request->input('phone'),
            'Email' => $request->input('email'),
            'Address' => $request->input('address'),
            //'NameRecordingPath' => $request->input('NameRecordingPath'),
            'UserName' => $request->input('uname_r'),
            'Password' => $request->input('pass_r'),
            'UserType' => $request->input('userType')
        ]);

        //$user->save();
        return redirect('/login');
    }

    // function AuthenticateUser()
    // {
    //     $pass_l = $_POST['pass_l'];

        
    //     $sql_query = "Select UserType from Users where UserName='".$uname_l."' and Password='".$pass_l."'";
    //     $result = mysqli_query($conn,$sql_query);
    //     $row = mysqli_fetch_array($result);

    //     $type = $row['UserType'];

    //     if($type){
    //         //$_SESSION['uname'] = $uname_l;
    //         switch ($type) {
    //             case 1:
    //                 header('Location: ../student/index.php');
    //                 break;
    //             case 2:
    //                 header('Location: ../professor/index.php');
    //                 break;
    //             case 3:
    //                 header('Location: ../advisor/index.php');
    //                 break;
    //             case 4:
    //                 header('Location: ../super-admin/index.php');
    //                 break;
    //         }
    //     }
    //     else{
    //         echo '<script>alert("Invalid username/password")</script>';
    //     }
    // }
}
