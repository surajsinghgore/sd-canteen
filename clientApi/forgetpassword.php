<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['forget_password'])) {
        $email = $_REQUEST['email'];

        if (strlen($email) == 0) {


            $error_status = "warn";
            $error_message = 'Please Enter Email Id';
            $toast_status = 'true';
            return;
        }




        //   connection
        require('./middleware/ConnectToDatabase.php');
        $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where email like '$email'");
        $rows = mysqli_num_rows($resultGet);
        $data = mysqli_fetch_assoc($resultGet);
        if ($rows > 0) {

            $userId=$data['id'];
            $fullname=$data['fullname'];
            $SixDigitOtp = sprintf("%06d", mt_rand(1, 999999));


// send email

$to = "$email";
$subject = "Reset password for your SD canteen account";
$message = "<html>
<head>
    <title>reset password for your SD canteen account</title>
</head>

<body>
<div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>
       
        
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
        <div style='text-align:center'><h4>Hi , $fullname</h4></div>
        <div style='color:rgb(104, 104, 104);text-align:center;font-size:3vw'>
       Welcome to SD CANTEEN
        </div>
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.5vw'>Your 6-digit OTP for resetting the password  : </div>
       <div style='border:2px dotted rgb(255, 98, 0);padding:1% 3% 1% 3%;font-size:6vw;text-align:center;color:red;margin-top:10%;margin-bottom:10%'>$SixDigitOtp</div>
       <div style='font-size:2.5vw;color:#4f4f4f;margin-top:4%'><b>Note:</b> The OTP will expire in 10 minutes and can only be used once.</div>
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

// check weather data exits in forget password table  or not


$resultGet = mysqli_query($connection, "SELECT * FROM forgetpassword where email like '$email'");
$DataCount = mysqli_num_rows($resultGet);
$data = mysqli_fetch_assoc($resultGet);

// already exits
if($DataCount>0){
$query1="update forgetpassword set otp=$SixDigitOtp where email='$email'";
$result = mysqli_query($connection, $query1);
if($result){
    header("Location: /sd-canteen/resetpassword.php");


}
}
// new data
else{

    $query2="insert into forgetpassword(email,userid,otp) values('$email',$userId,$SixDigitOtp)";
    $result = mysqli_query($connection, $query2);
    if($result){
        session_start();
        $_SESSION['forgetPasswordEmail'] = "$email";
header("Location: /sd-canteen/resetpassword.php");
    }

}
}
// mail failed
else{

    
}


        } else {

            $error_status = "warn";
            $error_message = 'user not exits with this Email Id';
            $toast_status = 'true';
            return;
        }
       




    }
}
