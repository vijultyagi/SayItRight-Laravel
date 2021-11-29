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
</body>

<?php
include "../DB/DbConnection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// SendQuery($conn);
if(array_key_exists('contactSubmit', $_POST)) {
    SendQuery($conn);
}

function SendQuery($conn)
{
    $first =  $_POST['first'];
    $last = $_POST['last'];
    $phone =  $_POST['phone'];
    $email = $_POST['email'];
    $query = $_POST['query'];
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;                   
    $mail->isSMTP();                        
    $mail->Host       = 'smtp.gmail.com';   
    $mail->SMTPAuth   = true;               
    $mail->Username   = 'concierge.user.4321@gmail.com';
    $mail->Password   = 'ypeaxecfjbxrdkok';         
    $mail->SMTPSecure = 'tls';              
    $mail->Port       = 587;                
    $mail->setFrom('concierge.user.4321@gmail.com', 'SayItRight');
    $mail->addAddress($email);           
    $mail->isHTML(true);                                  
    $mail->Subject = 'SayItRight Query Acknowledgement';
    $mail->Body    = 'We have received your query and we will reach out to you as soon as possible!';
    $mail->AltBody = 'We have received your query and we will reach out to you as soon as possible!';
    $mail->send();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>
</html>