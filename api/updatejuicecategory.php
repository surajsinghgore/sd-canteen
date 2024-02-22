<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_juice_category'])) {

        // if id gets
        if (isset($_REQUEST['update_juice_category'])) {
            // validate Data
            $juicecategoryname = strip_tags($_REQUEST['juicecategoryupdatename']);
            $updatejuiceitemid = intval($_REQUEST['juicecategoryid']);


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
            $resultGet = mysqli_query($connection, "SELECT * FROM juicecategories where id=$updatejuiceitemid");
            $rows = mysqli_num_rows($resultGet);
            $data = mysqli_fetch_assoc($resultGet);


            $LoadFoodName = $data['juicecategoryname'];

            // duplicate data entry 
            if ($LoadFoodName == $juicecategoryname) {
                $error_status = "warn";
                $error_message = "Please Update Category Name";
                $toast_status = 'true';
                return;
            } else {
                // check weather any other name not exits with new name
                $res = mysqli_query($connection, "SELECT * FROM juicecategories where juicecategoryname   like '$juicecategoryname'");
                $totalResult = mysqli_num_rows($res);
                $checkData = mysqli_fetch_assoc($res);

                // unique name 
                if ($totalResult == 0) {
                    $sql_query = "update juicecategories set juicecategoryname='$juicecategoryname' where id=$updatejuiceitemid";
                    $resOutput = mysqli_query($connection, $sql_query);
                    // return 1 if true
                    if ($resOutput) {
                        $error_status = "success";
                        $error_message = "$juicecategoryname successfully Updated";
                        $toast_status = 'true';
                        header('Location:/sd-canteen/admin/ManageJuiceCategory.php');
                        return;
                    }
                } else {
                    $parentId = $checkData["id"];
                    // means record find of current category
                    if ($parentId == $updatejuiceitemid) {
                        $sql_query = "update juicecategories set juicecategoryname='$juicecategoryname' where id=$updatejuiceitemid";
                        $resOutput = mysqli_query($connection, $sql_query);
                        // return 1 if true
                        if ($resOutput) {
                            $error_status = "success";
                            $error_message = "$juicecategoryname successfully Updated";
                            $toast_status = 'true';
                            header('Location:/sd-canteen/admin/ManageJuiceCategory.php');
                            return;
                        }
                    }
                    // duplicate entry
                    else {

                        $error_status = "error";
                        $error_message = "$juicecategoryname Category Already Exits ";
                        $toast_status = 'true';
                        return;
                    }
                }
            }
        }

        // id not gets
        else {

            header('Location:/sd-canteen/admin/ManageJuiceCategory.php');
            return;
        }
    }
}
