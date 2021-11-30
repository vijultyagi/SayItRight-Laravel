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
        
        <form id="loginform" method="post" action='/login'>
            @csrf
            
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="uname_l" required="required" id="uname_l" maxlength="15"/>
            <input type="password" placeholder="Password" name="pass_l" required="required" id="pass_l" maxlength="20"/>
            <button class="btn btn-primary btn-block btn-large" name="btnsignin" id="btnsignin" type="submit">Sign in</button>
            <div class="buttonHolder">
                <a href="../register" id="btnregister" class="link">Don't have an account with us? Register</a>
            </div>
        </form>
    </div>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>

