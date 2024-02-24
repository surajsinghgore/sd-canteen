<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_profile_upload'])) {
        $username = $_REQUEST['username'];
        $ipAddress = $_REQUEST['ipAddress'];
        $password = $_REQUEST['password'];


        if ((is_null($username)) || (is_null($password))) {

            $error_status = "warn";
            $error_message = 'Please Fill All the Fields Properly';
            $toast_status = 'true';
            return;
        }


    }
}
