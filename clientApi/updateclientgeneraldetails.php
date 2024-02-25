<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['update_client_details'])) {

        // validate Data
        $fullname = strip_tags($_REQUEST['fullname']);
        $age = intval($_REQUEST['age']);
        $email = strip_tags($_REQUEST['email']);
        $mobile = intval($_REQUEST['mobile']);
        $gender = strip_tags($_REQUEST['gender']);
        $fulladdress = strip_tags($_REQUEST['fulladdress']);
        $address=ltrim($fulladdress,'');



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

        if (($age < 0) || ($age > 200)) {
            $error_status = "warn";
            $error_message = 'Enter age is Not valid';
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


        // check 10 digit mobile number
        $mobileDigit = (string) $mobile;
        if ((strlen($mobileDigit) < 10)) {

            $error_status = "warn";
            $error_message = 'Mobile Number Must Contain 10 Digit';
            $toast_status = 'true';
            return;
        }




        // split email account
        $parts = explode("@", $email);


        if ((strcmp($parts[1], "gmail.com") == 0) or (strcmp($parts[1], "outlook.com") == 0) or (strcmp($parts[1], "yahoo.com") == 0) or (strcmp($parts[1], "ggdsd.ac.in.com") == 0)) {



            // verify client login
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!$_SESSION['activeClientId']) {

                $error_status = "error";
                $error_message = 'Please Login with Client credentials';
                $toast_status = 'true';

                header("Location: /sd-canteen/login.php");
            }


            $clientId = $_SESSION['activeClientId'];
            $clientActiveEmail = $_SESSION['activeClientEmail'];
            $activeClientMobile = $_SESSION['activeClientMobile'];



            require('./middleware/ConnectToDatabase.php');

            // if email not change than
         
            if ($clientActiveEmail == $email) {

                // check weather mobile change or not
                // means mobile number also not changed
                if ($activeClientMobile == $mobile) {

                    $query = "update clientdata set fullname='$fullname',age=$age,gender='$gender',fulladdress='$address' where id=$clientId";
                    $result = mysqli_query($connection, $query);
                    if ($result) {


                        $_SESSION['activeClientFullname'] = $fullname;
                        $error_status = "success";
                        $error_message = 'Details updated';
                        $toast_status = 'true';
                        header('Location: /sd-canteen/clientpanel.php');
                    }
                }
                // means mobile also changed
                else {

//   check weather mobile number is taken by any other user or not

$resCheck = mysqli_query($connection, "select*from clientdata where mobile=$mobile");
$resCount1=mysqli_num_rows($resCheck);
// means mobile number already registered
if ($resCount1 > 0) {
    $error_status = "warn";
    $error_message = "This Mobile Number is already Exits";
    $toast_status = 'true';
    return;

}
// new number
else{

    $query = "update clientdata set fullname='$fullname',age=$age,gender='$gender',fulladdress='$address',mobile=$mobile where id=$clientId";
    $result = mysqli_query($connection, $query);
    if ($result) {


        $_SESSION['activeClientFullname'] = $fullname;
        $error_status = "success";
        $_SESSION['activeClientMobile'] = $mobile;

        $error_message = 'Details updated';
        $toast_status = 'true';
        header('Location: /sd-canteen/clientpanel.php');

}

                    }
                }
            }



            //! means email also changed
            else {

// check weather email id is used or not

$resCheck = mysqli_query($connection, "select*from clientdata where email='$email'");
$resCount1=mysqli_num_rows($resCheck);
// means mobile number already registered
if ($resCount1 > 0) {
    $error_status = "warn";
    $error_message = "This Email Id is already Exits";
    $toast_status = 'true';
    return;

}

// means new email account
else{

    if($activeClientMobile==$mobile){
        $query1 = "update clientdata set email='$email',fullname='$fullname',age=$age,gender='$gender',fulladdress='$address',mobile=$mobile where id=$clientId";
        $result1 = mysqli_query($connection, $query1);
        if ($result1) {
            $_SESSION['activeClientFullname'] = $fullname;
            $error_status = "success";
            $_SESSION['activeClientMobile'] = $mobile;
            $_SESSION['activeClientEmail'] = $email;
            $error_message = 'Details updated';
            $toast_status = 'true';
            header('Location: /sd-canteen/clientpanel.php');
        }
    }
else{

    $resCheck1 = mysqli_query($connection, "select*from clientdata where mobile=$mobile");
    $resCount11=mysqli_num_rows($resCheck1);
// means mobile number already registered
if ($resCount11 > 0) {
    $error_status = "warn";
    $error_message = "This Mobile Number is already Exits";
    $toast_status = 'true';
    return;

}
// new number
else{

    $query1 = "update clientdata set email='$email',fullname='$fullname',age=$age,gender='$gender',fulladdress='$address',mobile=$mobile where id=$clientId";
    $result1 = mysqli_query($connection, $query1);
    if ($result1) {
        $_SESSION['activeClientFullname'] = $fullname;
        $error_status = "success";
        $_SESSION['activeClientMobile'] = $mobile;
        $_SESSION['activeClientEmail'] = $email;
        $error_message = 'Details updated';
        $toast_status = 'true';
        header('Location: /sd-canteen/clientpanel.php');

}

                    }
}

}

            }

        }

        // not valid email id
        else {
            $error_status = "warn";
            $error_message = 'Email Id Must be from Google,outlook or yahoo allowed';
            $toast_status = 'true';
            return;
        }
    }
}
