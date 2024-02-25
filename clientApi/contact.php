<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['user_contact_message'])) {

        $message = strip_tags($_REQUEST['Message']);

        if (strlen($message) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Message ';
            $toast_status = 'true';
            return;
        }

          // verify client login
          if (!isset($_SESSION)) {
            session_start();
        }
        if (!$_SESSION['activeClientId']) {

            $error_status = "error";
            $error_message = 'Please Login with Client credentials';
            $toast_status = 'true';

            header("Refresh: 5;url=http://localhost/sd-canteen/login.php");
        }

else{


    $activeClientId=$_SESSION['activeClientId'];
    $activeClientMobile=$_SESSION['activeClientMobile'];
    $activeClientFullname=$_SESSION['activeClientFullname'];
    $activeClientEmail=$_SESSION['activeClientEmail'];


   $to = 'surajthakurrs45@gmail.com';
                    $subject = "Contact Message";
                    $message = "
<html>
    <head>
        <title>User wanted to contact you</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>

        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>

        <div style='text-align:center'><h4>Hi , Admin</h4></div>
          
        
        <div style='text-align:center;margin-top:3%;margin-bottom:0%'>User Id In DB : </div>
        <div style='border:2px solid rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:2%;margin-bottom:2%;font-size:3.8vw'>$activeClientId</div>

        <div style='text-align:center;margin-top:3%;margin-bottom:0%'>User Name : </div>
        <div style='border:2px solid rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:2%;margin-bottom:2%;font-size:3.8vw'>$activeClientFullname</div>
       

        <div style='text-align:center;margin-top:3%;margin-bottom:0%'>User Email : </div>
        <div style='border:2px solid rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:2%;margin-bottom:2%;font-size:3.8vw'>$activeClientEmail</div>


        <div style='text-align:center;margin-top:3%;margin-bottom:0%;padding-bottom:3%'>User Mobile : </div>
        <div style='border:2px solid rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:2%;margin-bottom:2%;font-size:3.8vw'>$activeClientMobile</div>


        <div style='text-align:center;margin-top:3%;margin-bottom:0%'>User Message : </div>
        <div style='border:2px solid rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:2%;margin-bottom:2%;font-size:3.8vw'>$message</div>
       

        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
                     
        ";
   // Always set content-type when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
   $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";


   $result = mail($to, $subject, $message, $headers);
   if ($result == true) {
       header('Location: /sd-canteen/');
   }



}
    }

}