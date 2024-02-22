<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['add_juice_category'])) {
        // validate Data
        $juicecategoryname = strip_tags($_REQUEST['juicecategoryname']);



        // empty food name
        if (strlen($juicecategoryname) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Juice Category Name';
            $toast_status = 'true';
            return;
        }




        // verify admin login
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['admin_login_status'] != "true") {

            $error_status = "error";
            $error_message = 'Please Login with admin credentials';
            $toast_status = 'true';

            header("Refresh: 5;url=http://localhost/sd-canteen/admin/AdminLogin.php");
        }


        // check weather food category is already exits or not

        require('../middleware/ConnectToDatabase.php');
        $resultGet = mysqli_query($connection, "SELECT * FROM juicecategories where juicecategoryname  ='$juicecategoryname'");
        $rows = mysqli_num_rows($resultGet);

        // duplicate data entry 
        if ($rows > 0) {
            $error_status = "error";
            $error_message = "Juice Category Already Exits ";
            $toast_status = 'true';
            return;
        } else {

            $sql_query = "insert into juicecategories(juicecategoryname) values('$juicecategoryname')";
            $res = mysqli_query($connection, $sql_query);
            if ($res) {



                $error_status = "success";
                $error_message = "$juicecategoryname Successfully Added";
                $toast_status = 'true';
                header('Location:  /sd-canteen/admin/ManageJuiceCategory.php');
            }
        }
    }
}
