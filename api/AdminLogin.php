<?php
session_start();
$adminSecret = null;
$adminPassword = null;
$toast_status = 'false';

// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $adminSecret = $_REQUEST['secret'];
    $adminPassword = $_REQUEST['password'];

    // check empty username field
    if (empty($adminSecret)) {
        $error_status = "warn";
        $error_message = 'Please Provide Secret ID';
        $toast_status = 'true';
    }

    // check empty password field
    else if (empty($adminPassword)) {
        $error_status = "warn";
        $error_message = 'Please Provide Admin Password';
        $toast_status = 'true';
    }
    // validating
    else {
        $env = parse_ini_file('../.env');
        // check correct user name
        if ($env["ADMIN_SECRET_ID"] == $adminSecret) {
            // checking password
            if ($env["ADMIN_PASSWORD"] == $adminPassword) {


                // ! success
                $_SESSION['admin_login_status'] = "true";
                $error_status = "success";
                $error_message = 'Admin Login Successfully';
                $toast_status = 'true';
            }
            // password is wrong
            else {

                $error_status = "warn";
                $error_message = 'Invalid Password';
                $toast_status = 'true';
            }
        }
        // secret is wrong
        else {

            $error_status = "warn";
            $error_message = 'Invalid secret ID';
            $toast_status = 'true';
        }
    }
}
