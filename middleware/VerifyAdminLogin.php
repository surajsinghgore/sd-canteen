<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['admin_login_status'])) {
    if ($_SESSION['admin_login_status'] != "true") {
        $error_status = "error";
        $error_message = 'Please Login with admin credentials';
        $toast_status = 'true';
        echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/AdminLogin.php'},2000)</script>";
    }
}
// not login with admin credentials
else {
    $error_status = "error";
    $error_message = 'Please Login with admin credentials';
    $toast_status = 'true';
    echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/AdminLogin.php'},2000)</script>";
}
?>