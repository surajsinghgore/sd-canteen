<?php
session_start();

// checking 
if (isset($_SESSION['admin_login_status'])) {
    if ($_SESSION['admin_login_status'] == "true") {
    } else {
        unset($_SESSION['admin_login_status']);
        header("Location: http://localhost/sd-canteen/admin/AdminLogin.php");
    }
}
// not login with admin credentials
else {

    header("Location: http://localhost/sd-canteen/admin/AdminLogin.php");
}
