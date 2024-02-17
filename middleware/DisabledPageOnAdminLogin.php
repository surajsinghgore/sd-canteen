<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['admin_login_status'])) {
    if ($_SESSION['admin_login_status'] == "true") {
        echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/admin.php'},1000)</script>";
    }
}
