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
        <h1>Contact Us</h1>
            <form id="contactform" method="post" action="">
            <input type="text" id="fn" name="first" placeholder="First Name" required="required" maxlength="15"/>
            <input type="text" id="ln" name="last" placeholder="Last Name" required="required" maxlength="15"/>
            <input type="number" id="phone" name="phone" placeholder="Phone No." required="required"/>
            <input type="text" id="email" name="email" placeholder="Email" required="required" maxlength="20"/>
            <textarea rows="4" id="query" cols="50" name="query" placeholder="Query" required="required" ></textarea>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="contactSubmit" id="contactSubmit">Submit</button>
            </form>
    </div>
    <div class="chat-icon">
         <a href="../chat/"><img src="../images/chat.png" alt="Brand Logo" style="float: right; position: absolute; right: 30px; bottom: 30px;"></a>
    </div>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>
</html>