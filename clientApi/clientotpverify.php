<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_otp_verify'])) {

        // validate Data
        $email = strip_tags($_REQUEST['email']);
        $otp = $_REQUEST['otp'];



        //    Email
        if (strlen($email) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Email Id';
            $toast_status = 'true';
            header('Location: /sd-canteen/signup.php');

            return;
        }



        // check 10 digit mobile number
        if ((strlen($otp) < 6) or (strlen($otp) > 6)) {

            $error_status = "warn";
            $error_message = 'Enter 6 Digit OTP';
            $toast_status = 'true';
            return;
        }

        // data gets

        require('./middleware/ConnectToDatabase.php');


        $clientTempRes = mysqli_query($connection, "SELECT * FROM clientregistertemp where email='$email'");
        $ClientTempResRow = mysqli_num_rows($clientTempRes);
        if ($ClientTempResRow > 0) {
            // data load
            while ($dataRes = mysqli_fetch_array($clientTempRes)) {

                // otp successfully
                if ($otp == $dataRes['otp']) {
                    $fullname = $dataRes['fullname'];
                    $email = $dataRes['email'];
                    $age = $dataRes['age'];
                    $mobile = $dataRes['mobile'];
                    $gender = $dataRes['gender'];
                    $fulladdress = $dataRes['fulladdress'];
                    $password = $dataRes['password'];

                    $sql_query = "insert into clientdata(fullname,age,email,mobile,gender,fulladdress,profileimage,password) values('$fullname',$age,'$email',$mobile,'$gender','$fulladdress','','$password')";


                    $res = mysqli_query($connection, $sql_query);

                    if ($res) {

                        session_start();
                        // delete temporary data 
                        $sql_query2 = "delete from clientregistertemp where email like '$email'";
                        $res2 = mysqli_query($connection, $sql_query2);

                        unset($_SESSION["client_email_AccountTemp"]);
                        $error_status = "success";
                        $error_message = 'Successful';
                        $toast_status = 'true';

                        header('Location: http://localhost/sd-canteen/login.php');
                        return;
                    }
                }
                // otp wrong
                else {

                    $error_status = "warn";
                    $error_message = 'Wrong OTP';
                    $toast_status = 'true';

                    return;
                }
            }
        }
    }
}
