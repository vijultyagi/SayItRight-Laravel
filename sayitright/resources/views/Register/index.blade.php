<!DOCTYPE html>
<html lang="en">
<head>
    <title>Say it Right</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>
<body>
    <div id="nav-placeholder"></div>
    <div class="login">
        
        <form id="registerform" method="post" action='/register'>
            @csrf

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
            
            <input type="text" placeholder="Username" required="required" name="uname_r" id="uname_r" maxlength="15"/>
            <input type="password" placeholder="Password" required="required" name="pass_r" id="pass_r" maxlength="20"/>
            <input type="password" placeholder="Re-enter Password" required="required" name="repass" id="repass" maxlength="20"/>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btnreg" id="btnreg">Register</button>
            <div class="buttonHolder">
                <a id="btnlogin" class="link">Already have an account? Login</a>
            </div>
        </form>
    </div>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>

