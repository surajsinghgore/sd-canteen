<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_register'])) {

        // validate Data
        $fullname = strip_tags($_REQUEST['fullname']);
        $age = intval($_REQUEST['age']);
        $email = strip_tags($_REQUEST['email']);
        $mobile = intval($_REQUEST['mobile']);
        $gender = strip_tags($_REQUEST['gender']);
        $address = strip_tags($_REQUEST['address']);
        $password = strip_tags($_REQUEST['password']);
        $confirmpassword = strip_tags($_REQUEST['confirmpassword']);


        //    fullname
        if (strlen($fullname) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Full Name';
            $toast_status = 'true';
            return;
        }

        //    Email
        if (strlen($email) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Email Id';
            $toast_status = 'true';
            return;
        }

        //    gender
        if ($gender == "no") {
            $error_status = "warn";
            $error_message = 'Please select gender';
            $toast_status = 'true';
            return;
        }

        //    gender
        if (strlen($gender) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Gender';
            $toast_status = 'true';
            return;
        }

        //    address
        if (strlen($address) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Address';
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



        // check 10 digit mobile number
        $mobileDigit = (string) $mobile;
        if ((strlen($mobileDigit) < 10)) {

            $error_status = "warn";
            $error_message = 'Mobile Number Must Contain 10 Digit';
            $toast_status = 'true';
            return;
        }


        // check password size
        if ((strlen($fullname) < 3)) {

            $error_status = "warn";
            $error_message = 'Full name must contain 3 digits';
            $toast_status = 'true';
            return;
        }
        // check password size
        if ((strlen($password) < 5)) {

            $error_status = "warn";
            $error_message = 'Password must contain 5 digits';
            $toast_status = 'true';
            return;
        }



        // split email account
        $parts = explode("@", $email);


        if ((strcmp($parts[1], "gmail.com") == 0) or (strcmp($parts[1], "outlook.com") == 0) or (strcmp($parts[1], "yahoo.com") == 0) or (strcmp($parts[1], "ggdsd.ac.in.com") == 0)) {

            require('./middleware/ConnectToDatabase.php');






            // check weather email id already used or not
            $emailIdRes = mysqli_query($connection, "SELECT * FROM clientdata where email   ='$email '");
            $EmailIdResRow = mysqli_num_rows($emailIdRes);

            if ($EmailIdResRow > 0) {
                $error_status = "error";
                $error_message = "This Email Id Already Exits ";
                $toast_status = 'true';
                return;
            }

            // check weather mobile number already used or not
            $mobileNumberRes = mysqli_query($connection, "SELECT * FROM clientdata where mobile=$mobile");
            $MobileNumberResRow = mysqli_num_rows($mobileNumberRes);
            if ($MobileNumberResRow > 0) {
                $error_status = "error";
                $error_message = "This Mobile Number Already Exits ";
                $toast_status = 'true';
                return;
            }




            // its time to check weather client not exits in client temp data
            $clientTempRes = mysqli_query($connection, "SELECT * FROM clientregistertemp where email='$email'");
            $ClientTempResRow = mysqli_num_rows($clientTempRes);


            // 6 digit otp generate
            $SixDigitOtp = sprintf("%06d", mt_rand(1, 999999));
            $encodePassword = password_hash($password, PASSWORD_BCRYPT);



            // already exits in client temporary data table 
            // update record
            if ($ClientTempResRow > 0) {



                $to = "$email";
                $subject = "Finish creating your account on SD CANTEEN";
                $message = "
                <html>
                    <head>
                        <title>Finish creating your account on SD CANTEEN</title>
                    </head>
              
                    <body>
                        <div>
                        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
                        </div>
                    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
              
                    <div style='text-align:center'><h4>Hi , $fullname</h4></div>
              
                    <div style='color:rgb(104, 104, 104);text-align:center;font-size:3.5vw'>
                   Welcome to SD CANTEEN
                    </div>
              
                   <div style='text-align:center;margin-top:3%;margin-bottom:2%'>Your 6 Digit Otp is : </div>
              
                   <div style='border:2px dotted rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:10%;margin-bottom:10%;font-size:3.8vw'>$SixDigitOtp</div>
              
                   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Note:</b> The OTP will expire in 10 minutes and can only be used once.</div>
              
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


                    $sql_query = "update clientregistertemp set fullname='$fullname',age=$age,email='$email',mobile=$mobile,gender='$gender',fulladdress='$address',password='$encodePassword',verifystatus='false',otp=$SixDigitOtp where email like '$email'";

                    $res = mysqli_query($connection, $sql_query);
                    if ($res) {
                        session_start();

                        $_SESSION['client_email_AccountTemp'] = $email;
                        $error_status = "success";
                        $error_message = "$email account created successfully";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/clientotpverify.php');
                        $error_status = "success";
                        $error_message = 'Successful';
                        $toast_status = 'true';
                    }
                } 
                else {


                    echo "Sorry, unable to send mail...";
                }

                $sql_query = "update fooditems set category='$FoodCategory',qty=$FoodQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description' where id=$FoodId";
                $result = mysqli_query($connection, $sql_query);

                $error_status = "success";
                $error_message = 'Update Successful';
                $toast_status = 'true';
            }



            // new entry in client temp database
            else {


                $to = "$email";
                $subject = "Finish creating your account on SD CANTEEN";
                $message = "
                <html>
                    <head>
                        <title>Finish creating your account on SD CANTEEN</title>
                    </head>
              
                    <body>
                        <div>
                        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
                        </div>
                    <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
              
                    <div style='text-align:center'><h4>Hi , $fullname</h4></div>
              
                    <div style='color:rgb(104, 104, 104);text-align:center;font-size:3.5vw'>
                   Welcome to SD CANTEEN
                    </div>
              
                   <div style='text-align:center;margin-top:3%;margin-bottom:2%'>Your 6 Digit Otp is : </div>
              
                   <div style='border:2px dotted rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:10%;margin-bottom:10%;font-size:3.8vw'>$SixDigitOtp</div>
              
                   <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Note:</b> The OTP will expire in 10 minutes and can only be used once.</div>
              
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


                    $sql_query = "insert into clientregistertemp(fullname,age,email,mobile,gender,fulladdress,password,verifystatus,otp) values('$fullname',$age,'$email',$mobile,'$gender','$address','$encodePassword','false',$SixDigitOtp)";

                    $res = mysqli_query($connection, $sql_query);
                    if ($res) {
                        session_start();

                        $_SESSION['client_email_AccountTemp'] = $email;
                        $error_status = "success";
                        $error_message = "$email account created successfully";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/clientotpverify.php');
                        $error_status = "success";
                        $error_message = 'Successful';
                        $toast_status = 'true';
                    }
                } else {


                    echo "Sorry, unable to send mail...";
                }
            }

            // 
            // check weather user email already register or not
        
        }

        // not valid email id
        else {
            $error_status = "warn";
            $error_message = 'Email Id Must be from Google,outlook or yahoo allowed';
            $toast_status = 'true';
        }
    }
}
