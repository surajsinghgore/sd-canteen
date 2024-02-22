<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_drink_category'])) {

        // if id gets
        if (isset($_REQUEST['update_drink_category'])) {
            // validate Data
            $drinkcategoryname = strip_tags($_REQUEST['drinkcategoryupdatename']);
            $updatedrinkitemid = intval($_REQUEST['drinkcategoryid']);


            // empty food name
            if (strlen($drinkcategoryname) == 0) {
                $error_status = "warn";
                $error_message = 'Please Enter Drink Category Name';
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
            $resultGet = mysqli_query($connection, "SELECT * FROM drinkcategories where id=$updatedrinkitemid");
            $rows = mysqli_num_rows($resultGet);
            $data = mysqli_fetch_assoc($resultGet);


            $LoadFoodName = $data['drinkcategoryname'];

            // duplicate data entry 
            if ($LoadFoodName == $drinkcategoryname) {
                $error_status = "warn";
                $error_message = "Please Update Category Name";
                $toast_status = 'true';
                return;
            } else {
                // check weather any other name not exits with new name
                $res = mysqli_query($connection, "SELECT * FROM drinkcategories where drinkcategoryname   like '$drinkcategoryname'");
                $totalResult = mysqli_num_rows($res);
                $checkData = mysqli_fetch_assoc($res);

                // unique name 
                if ($totalResult == 0) {
                    $sql_query = "update drinkcategories set drinkcategoryname='$drinkcategoryname' where id=$updatedrinkitemid";
                    $resOutput = mysqli_query($connection, $sql_query);
                    // return 1 if true
                    if ($resOutput) {
                        $error_status = "success";
                        $error_message = "$drinkcategoryname successfully Updated";
                        $toast_status = 'true';
                        header('Location:/sd-canteen/admin/ManagedrinkCategory.php');
                        return;
                    }
                } else {
                    $parentId = $checkData["id"];
                    // means record find of current category
                    if ($parentId == $updatedrinkitemid) {
                        $sql_query = "update drinkcategories set drinkcategoryname='$drinkcategoryname' where id=$updatedrinkitemid";
                        $resOutput = mysqli_query($connection, $sql_query);
                        // return 1 if true
                        if ($resOutput) {
                            $error_status = "success";
                            $error_message = "$drinkcategoryname successfully Updated";
                            $toast_status = 'true';
                            header('Location:/sd-canteen/admin/ManageDrinkCategory.php');
                            return;
                        }
                    }
                    // duplicate entry
                    else {

                        $error_status = "error";
                        $error_message = "$drinkcategoryname Category Already Exits ";
                        $toast_status = 'true';
                        return;
                    }
                }
            }
        }

        // id not gets
        else {

            header('Location:/sd-canteen/admin/ManagedrinkCategory.php');
            return;
        }
    }
}
