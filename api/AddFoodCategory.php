<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['add_food_category'])) {
        // validate Data
        $foodcategoryname = strip_tags($_REQUEST['foodcategoryname']);



        // empty food name
        if (strlen($foodcategoryname) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Food Category Name';
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
        $resultGet = mysqli_query($connection, "SELECT * FROM foodcategories where foodcategoryname  ='$foodcategoryname'");
        $rows = mysqli_num_rows($resultGet);

        // duplicate data entry 
        if ($rows > 0) {
            $error_status = "error";
            $error_message = "Food Category Already Exits ";
            $toast_status = 'true';
            return;
        } else {

            $sql_query = "insert into foodcategories(foodcategoryname) values('$foodcategoryname')";
            $res = mysqli_query($connection, $sql_query);
            if ($res) {



                $error_status = "success";
                $error_message = "$foodcategoryname Successfully Added";
                $toast_status = 'true';
                header('Location:  /sd-canteen/admin/ManageFoodCategory.php');
            }
        }
        // send data
        // require('../middleware/ConnectToDatabase.php');
    }
}
