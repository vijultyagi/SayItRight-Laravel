<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../assets/style/style.css">
<head>
    <title>Say it Right</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>
<body>
    <div id="nav-placeholder"></div>
    <div class="login">
        
        <form id="loginform" method="post" action="">
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="uname_l" required="required" id="uname_l" maxlength="15"/>
            <input type="password" placeholder="Password" name="pass_l" required="required" id="pass_l" maxlength="20"/>
            <button class="btn btn-primary btn-block btn-large" name="btnsignin" id="btnsignin" type="submit">Sign in</button>
            <div class="buttonHolder">
                <button id="btnregister" class="link">Don't have an account with us? Register</button>
            </div>
        </form>
        <form id="registerform" method="post" action="" style="display:none;">
            <h1>Register</h1>
            <input type="text" placeholder="Name" required="required" name="name" id="name" maxlength="15"/>
            <select name="userType" id="userType" required="required">
                <option value="">-- Select User Type --</option>
                <option value="1">Student</option>
                <option value="2">Professor</option>
                <option value="3">Advisor</option>
            </select>
            <input type="number" id="phone" name="phone" placeholder="Phone No." required="required"/>
            <input type="text" id="email" name="email" placeholder="Email" required="required" maxlength="20"/>
            <input type="text" id="address" name="address" placeholder="Address" required="required" maxlength="50"/>
            <input type="file" name="fileToUpload" id="fileToUpload"/>
            <input type="text" placeholder="Username" required="required" name="uname_r" id="uname_r" maxlength="15"/>
            <input type="password" placeholder="Password" required="required" name="pass_r" id="pass_r" maxlength="20"/>
            <input type="password" placeholder="Re-enter Password" required="required" name="repass" id="repass" maxlength="20"/>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btnreg" id="btnreg">Register</button>
            <div class="buttonHolder">
                <button id="btnlogin" class="link">Already have an account? Login</button>
            </div>
        </form>
    </div>
</body>

<?php
include "../DB/DbConnection.php";

if(array_key_exists('btnsignin', $_POST)) {
    AuthenticateUser($conn);
}
else if(array_key_exists('btnreg', $_POST)) {
    RegisterUser($conn);
}

function AuthenticateUser($conn)
{
    $uname_l =  $_POST['uname_l'];
    $pass_l = $_POST['pass_l'];

    $sql_query = "Select UserType from Users where UserName='".$uname_l."' and Password='".$pass_l."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $type = $row['UserType'];

    if($type){
        //$_SESSION['uname'] = $uname_l;
        switch ($type) {
            case 1:
                header('Location: ../student/index.php');
                break;
            case 2:
                header('Location: ../professor/index.php');
                break;
            case 3:
                header('Location: ../advisor/index.php');
                break;
            case 4:
                header('Location: ../super-admin/index.php');
                break;
        }
    }
    else{
        echo '<script>alert("Invalid username/password")</script>';
    }
}

function RegisterUser($conn)
{
    $uname_r =  $_POST['uname_r'];
    $pass_r = $_POST['pass_r'];
    $name =  $_POST['name'];
    $repass = $_POST['repass'];
    $phone =  (int)$_POST['phone'];
    $email = $_POST['email'];
    $address =  $_POST['address'];
    $userType = (int)$_POST['userType'];
    
    $sql_query = "Insert into Users(Name, PhoneNo, Email, Address, UserName, Password, UserType) Values('$name', $phone, '$email', '$address', '$uname_r', '$pass_r', $userType)";
    $result = mysqli_query($conn,$sql_query);
    if($result)
    {
        echo '<script>alert("Registered successfully")</script>';
    }
    else{
        echo '<script>alert("Something went wrong")</script>';
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/index.js"></script>
<script src="../assets/js/login.js"></script>

