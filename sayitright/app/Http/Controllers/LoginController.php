<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        // if(array_key_exists('btnsignin', $_POST)) {
        //     AuthenticateUser();
        // }
        // else if(array_key_exists('btnreg', $_POST)) {
        //     RegisterUser();
        // }
        //$uname_l =  $_POST['uname_l'];

        //$input = Input::only('uname_l','pass_l','password');
        // $users = DB::select("Select * from Users");
        //dd($uname_l);
        return view('login.index');
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
