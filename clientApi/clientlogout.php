<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_logout_click'])) {

        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION['activeClientId']);
        unset($_SESSION['activeClientEmail']);
        unset($_SESSION['activeClientMobile']);
        unset($_SESSION['activeClientFullname']);
        $error_status = "success";
        $error_message = 'Logout Success';
        $toast_status = 'true';
        echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/login.php'},2000)</script>";
    }
}
