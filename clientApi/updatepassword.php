<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['change_current_password'])) {

        $oldPassword = strip_tags($_REQUEST['currentpassword']);
        $password = strip_tags($_REQUEST['newpassword']);
        $confirmpassword = strip_tags($_REQUEST['newconfirmpassword']);
       



       

        //    password
        if (strlen($oldPassword) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Current Password';
            $toast_status = 'true';
            return;
        }
        if (strlen($password) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter New Password';
            $toast_status = 'true';
            return;
        }


        //    confirmpassword
        if (strlen($confirmpassword) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter New Confirm Password';
            $toast_status = 'true';
            return;
        }


        //    confirmpassword
        if ($password != $confirmpassword) {
            $error_status = "warn";
            $error_message = 'Password and confirm Password fields don\'t match';
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
$clientId=$_SESSION['activeClientId'];


        require('./middleware/ConnectToDatabase.php');
        $fetchDataQuery = mysqli_query($connection, "SELECT * FROM clientdata where id=$clientId");

        $DataCount = mysqli_num_rows($fetchDataQuery);
        $ClientData = mysqli_fetch_assoc($fetchDataQuery);
$email=$ClientData['email'];
$fullname=$ClientData['fullname'];
        // if not record in forget password table
        if ($DataCount == 0) {

            $error_status = "warn";
            $error_message = 'Please Try Again';
            $toast_status = 'true';
            header("Refresh: 5;url=http://localhost/sd-canteen/login.php");
            return;
        }
else{


    // match current password is correct or not
    if (password_verify($oldPassword, $ClientData['password'])) {

// check weather new password is not as same password\
// new password is same as old password
if (password_verify($password, $ClientData['password'])) {
    $error_status = "warn";
    $error_message = 'Please enter new password not current password';
    $toast_status = 'true';
    return;
}
else{
// encode new password
    $encodePassword = password_hash($password, PASSWORD_BCRYPT);
// new password change
    $query="update clientdata set password='$encodePassword' where id=$clientId";

  $result = mysqli_query($connection, $query);
if($result){


// send mail about password changed

$to = $email;
$subject = "Password changed for Your SD CANTEEN Account";
$message = "
<html>
    <head>
        <title>Password changed for Your SD CANTEEN Account</title>
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
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3vw'>Your Sd Canteen Account Password Changed.</div>
       
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
      $error_status = "success";
      $error_message = 'Update Successful';
      $toast_status = 'true';
      header('Location: /sd-canteen/clientpanel.php');
  }


}
}


    }else{
        $error_status = "warn";
        $error_message = 'Current Password is not correct';
        $toast_status = 'true';
        return;
    }
   

}
      
    }
}
