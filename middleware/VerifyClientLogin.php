<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['activeClientId'])) {



}
// not login with client credentials
else {
    $error_status = "error";
    $error_message = 'Please Login with client credentials';
    $toast_status = 'true';
    echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/login.php'},2000)</script>";
}
?>