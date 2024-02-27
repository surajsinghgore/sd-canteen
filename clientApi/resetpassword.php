<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['change_password'])) {

        $password = strip_tags($_REQUEST['password']);
        $confirmpassword = strip_tags($_REQUEST['confirmpassword']);
        $email = strip_tags($_REQUEST['email']);
        $otp = $_REQUEST['otp'];

        //    Email
        if (strlen($email) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Email Id';
            $toast_status = 'true';
            return;
        }
        //    password
        if (strlen($password) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Password';
            $toast_status = 'true';
            return;
        }


        //    confirmpassword
        if (strlen($confirmpassword) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Confirm Password';
            $toast_status = 'true';
            return;
        }


        //    confirmpassword
        if ($password != $confirmpassword) {
            $error_status = "warn";
            $error_message = 'Password and Confirm Password Not Match';
            $toast_status = 'true';
            return;
        }

      
        if ((strlen($otp) < 6) or (strlen($otp) > 6)) {

            $error_status = "warn";
            $error_message = 'Enter 6 Digit OTP';
            $toast_status = 'true';
            return;
        }



        require('./middleware/ConnectToDatabase.php');
        $ForgetPasswordDataQuery = mysqli_query($connection, "SELECT * FROM forgetpassword where email='$email'");
        $ClientDataQuery = mysqli_query($connection, "SELECT * FROM clientdata where email='$email'");
        $ForgetPasswordDataCount = mysqli_num_rows($ForgetPasswordDataQuery);
        $ForgetPasswordData = mysqli_fetch_assoc($ForgetPasswordDataQuery);
        $ClientData = mysqli_fetch_assoc($ClientDataQuery);

        // if not record in forget password table
        if ($ForgetPasswordDataCount == 0) {

            $error_status = "warn";
            $error_message = 'Please Try Again';
            $toast_status = 'true';
            return;
        }

        // match OTP
        if ($otp == $ForgetPasswordData['otp']) {

            // check weather old password not entered
            if (password_verify($password, $ClientData['password'])) {
                $error_status = "warn";
                $error_message = 'New Password not same as old password';
                $toast_status = 'true';
    
                return;

            }
else{

$fullname=$ClientData['fullname'];

            // change password
            $encodePassword = password_hash($password, PASSWORD_BCRYPT);



            $query3 = "update clientdata set password='$encodePassword' where email like '$email'";

            $res = mysqli_query($connection, $query3);
            if ($res) {
                // delete record from forget password table
                $query4 = "delete from forgetpassword where email like '$email'";
                $resAfterDelete = mysqli_query($connection, $query4);
                // delete sessions
                session_start();
                unset($_SESSION["forgetPasswordEmail"]);


                // send mail to notifying
                $to = "$email";
                $subject = "Password Changed for Your SD CANTEEN Account";
                $message = "<html>
                <head>
                    <title>Password Changed for Your SD CANTEEN Account</title>
                </head>
                
                <body>
                <div>
                        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
                        </div>
                    
                        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
                       
                        <div style='text-align:center'><h4>Hi, $fullname</h4></div>
                        <div style='color:rgb(104, 104, 104);text-align:center;font-size:4vw'>
                       Welcome to SD CANTEEN!
                        </div>
                       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.3vw'>Your SD CANTEEN account password has been successfully recovered.</div>
                       
                       <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Note:</b> Please contact the Help Center if you did not make this request.</div>
                       <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
                       <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
                       <div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>If you did not make this request, you can safely ignore this message.</div> 
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
                    header("Location: /sd-canteen/login.php");

                }

        
                
            }

        }
        } else {

            $error_status = "warn";
            $error_message = 'Wrong OTP';
            $toast_status = 'true';

            return;
        }
    }
}
