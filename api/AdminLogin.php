<?php
$adminSecret = null;
$adminPassword = null;
$warning_error = 'false';

// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $adminSecret = $_REQUEST['secret'];
    $adminPassword = $_REQUEST['password'];
    // check empty username field
    if (strlen($adminPassword) == 0) {
        $GLOBALS['progress_status'] = "bg-warning";
        $warning_error = 'true';
        $GLOBALS['title'] = "WARNING";
        $GLOBALS['status'] = "alert-warning";
        $GLOBALS['message'] = "Please Enter Secret ID";
    }
    // check empty password field
    else if (strlen($adminPassword) == 0) {
        $GLOBALS['progress_status'] = "bg-warning";
        $warning_error = 'true';
        $GLOBALS['title'] = "WARNING";
        $GLOBALS['status'] = "alert-warning";
        $GLOBALS['message'] = "Please Enter Admin Password";
    }
    // validating
    else {
        $env = parse_ini_file('../.env');
        // check correct user name
        if ($env["ADMIN_SECRET_ID"] == $adminSecret) {
            // checking password
            if ($env["ADMIN_PASSWORD"] == $adminPassword) {
                // ! success
                $warning_error = 'true';
                $GLOBALS['title'] = "SUCCESS";
                $GLOBALS['progress_status'] = "bg-success";
                $GLOBALS['status'] = "alert-success";
                $GLOBALS['message'] = "successfully login";
            }
            // password is wrong
            else {
                $warning_error = 'true';
                $GLOBALS['title'] = "WARNING";
                $GLOBALS['progress_status'] = "bg-warning";
                $GLOBALS['status'] = "alert-warning";
                $GLOBALS['message'] = "ADMIN PASSWORD IS INCORRECT";
            }
        }
        // secret is wrong
        else {
            $warning_error = 'true';
            $GLOBALS['progress_status'] = "bg-warning";
            $GLOBALS['title'] = "WARNING";
            $GLOBALS['status'] = "alert-warning";
            $GLOBALS['message'] = "SECRET ID IS INCORRECT";
        }



        // check correct admin password



    }
}
