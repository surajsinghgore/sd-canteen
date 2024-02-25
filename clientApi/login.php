<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_login'])) {
        $username = $_REQUEST['username'];
        $ipAddress = $_REQUEST['ipAddress'];
        $password = $_REQUEST['password'];


        if ((is_null($username)) || (is_null($password))) {

            $error_status = "warn";
            $error_message = 'Please Fill All the Fields Properly';
            $toast_status = 'true';
            return;
        }


        //   connection
        require('./middleware/ConnectToDatabase.php');


        // enter is mobile number
        if (is_numeric($username)) {


            $mobile = (int) $username;
            $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where mobile=$mobile");
            $rows = mysqli_num_rows($resultGet);
            $data = mysqli_fetch_assoc($resultGet);

            // data find
            date_default_timezone_set("Asia/Calcutta");
            $currentDate = date("d-m-Y");
            $currentTime = date("h:i:s A");
            if ($rows > 0) {
                // verify password
                // success
                if (password_verify($password, $data['password'])) {
                    session_start();
                    $_SESSION['activeClientId'] = $data['id'];
                    $_SESSION['activeClientEmail'] = $data['email'];
                    $_SESSION['activeClientMobile'] = $data['mobile'];
                    $_SESSION['activeClientFullname'] = $data['fullname'];
                    $error_status = "success";
                    $error_message = 'successfully login';
                    $toast_status = 'true';




                    $to = $data['email'];
                    $subject = "Login Notification";
                    $message = "
<html>
    <head>
        <title>Account Login on SD CANTEEN</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>
    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>

    <div style='text-align:left;margin-left:1vw'><h4>Dear " . $data['fullname'] . " ,</h4></div>

    <div style='text-align:left;font-size:3.5vw,margin-left:5vw'>
    We hope this message finds you well. We wanted to inform you about recent activity on your account.
    </div>
    <div style='text-align:left;font-size:3.5vw,margin-left:5vw'>
    We noticed that a login was made to your account on <b>" . $currentDate . "  
    </b> at <b>" . $currentTime . "</b> from the following IP address: <b>" . $ipAddress . "</b>. <br>
    If this login was authorized by you, please disregard this message.
    </div>



    
   <div style='text-align:left;margin-top:3%;margin-bottom:2%;margin-left:1vw'>If you did not initiate this login or if you have any concerns about the security of your account, please take immediate action by following these steps:</div>










   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Change Your Password:</b> We recommend changing your password immediately. Choose a strong, unique password that you haven't used elsewhere</div>

   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Review Account Activity:</b>Check your account settings and recent activity log to ensure no unauthorized changes have been made.</div>

   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Contact Support:</b> If you suspect any unauthorized access or need further assistance, please don't hesitate to contact our support team. We're here to help.</div>



   <div style='text-align:left;margin-top:3%;margin-bottom:2%;margin-left:1vw'>Remember to keep your account information confidential and avoid sharing your password with anyone. Additionally, enabling two-factor authentication can add an extra layer of security to your account.</div>


   <div style='text-align:left;margin-left:5vw'><h4>
   Thank you for your attention to this matter. Your security is our top priority.
</h4></div>
   <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>

   <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>



    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
     
        

    
    </body>
</html>
";
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                    $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";


                    $result = mail($to, $subject, $message, $headers);
                    if ($result == true) {
                        header('Location: /sd-canteen/index.php');
                    }


                    // send email to inform somebody login

                    return;
                }
                // incorrect
                else {
                    $error_status = "warn";
                    $error_message = 'Password is not correct';
                    $toast_status = 'true';
                    return;
                }
            }
            // user not exits
            else {

                $error_status = "warn";
                $error_message = 'user not exits with this mobile number';
                $toast_status = 'true';
                return;
            }
        }




        //email id
        else {
            
          
            $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where email='$username'");
            $rows = mysqli_num_rows($resultGet);
            $data = mysqli_fetch_assoc($resultGet);

            // data find
            date_default_timezone_set("Asia/Calcutta");
            $currentDate = date("d-m-Y");
            $currentTime = date("h:i:s A");
            if ($rows > 0) {
                // verify password
                // success
                if (password_verify($password, $data['password'])) {
                    session_start();
                    $_SESSION['activeClientId'] = $data['id'];
                    $_SESSION['activeClientEmail'] = $data['email'];
                    $_SESSION['activeClientMobile'] = $data['mobile'];
                    $_SESSION['activeClientFullname'] = $data['fullname'];
                    $error_status = "success";
                    $error_message = 'successfully login';
                    $toast_status = 'true';




                    $to = $data['email'];
                    $subject = "Login Notification";
                    $message = "
<html>
    <head>
        <title>Account Login on SD CANTEEN</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>
    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>

    <div style='text-align:left;margin-left:1vw'><h4>Dear " . $data['fullname'] . " ,</h4></div>

    <div style='text-align:left;font-size:3.5vw,margin-left:5vw'>
    We hope this message finds you well. We wanted to inform you about recent activity on your account.
    </div>
    <div style='text-align:left;font-size:3.5vw,margin-left:5vw'>
    We noticed that a login was made to your account on <b>" . $currentDate . "  
    </b> at <b>" . $currentTime . "</b> from the following IP address: <b>" . $ipAddress . "</b>. <br>
    If this login was authorized by you, please disregard this message.
    </div>



    
   <div style='text-align:left;margin-top:3%;margin-bottom:2%;margin-left:1vw'>If you did not initiate this login or if you have any concerns about the security of your account, please take immediate action by following these steps:</div>










   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Change Your Password:</b> We recommend changing your password immediately. Choose a strong, unique password that you haven't used elsewhere</div>

   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Review Account Activity:</b>Check your account settings and recent activity log to ensure no unauthorized changes have been made.</div>

   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Contact Support:</b> If you suspect any unauthorized access or need further assistance, please don't hesitate to contact our support team. We're here to help.</div>



   <div style='text-align:left;margin-top:3%;margin-bottom:2%;margin-left:1vw'>Remember to keep your account information confidential and avoid sharing your password with anyone. Additionally, enabling two-factor authentication can add an extra layer of security to your account.</div>


   <div style='text-align:left;margin-left:5vw'><h4>
   Thank you for your attention to this matter. Your security is our top priority.
</h4></div>
   <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>

   <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>



    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
     
        

    
    </body>
</html>
";
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                    $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";


                    $result = mail($to, $subject, $message, $headers);
                    if ($result == true) {
                        header('Location: /sd-canteen/index.php');
                    }


                    // send email to inform somebody login

                    return;
                }
                // incorrect
                else {
                    $error_status = "warn";
                    $error_message = 'Password is not correct';
                    $toast_status = 'true';
                    return;
                }
            }
            // user not exits
            else {

                $error_status = "warn";
                $error_message = 'user not exits with this email Id';
                $toast_status = 'true';
                return;
            }
        }
    }
}
