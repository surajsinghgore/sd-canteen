<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['logout_click'])) {

        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION['admin_login_status']);
        $error_status = "success";
        $error_message = 'Logout Success';
        $toast_status = 'true';
        echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/AdminLogin.php'},2000)</script>";
    }
}
