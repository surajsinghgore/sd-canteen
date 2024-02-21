<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['update_food_item'])) {
        $FoodId = $_REQUEST['FoodId'];
        $FoodName = strip_tags($_REQUEST['FoodName']);
        $FoodQty = intval($_REQUEST['FoodQty']);
        $FoodCategory = $_REQUEST['FoodCategory'];
        $normalPrice = intval($_REQUEST['normalPrice']);
        $smallPrice = intval($_REQUEST['smallPrice']);
        $mediumPrice = intval($_REQUEST['mediumPrice']);
        $largePrice = intval($_REQUEST['largePrice']);
        $description = strip_tags($_REQUEST['description']);


        // validate inputs
        if (!isset($FoodId)) {
            $error_status = "warn";
            $error_message = 'Please Provide Food ID';
            $toast_status = 'true';

            header('Location: /sd-canteen/admin/updatefooditem.php');
            return;
        }
        // empty food name
        if (strlen($FoodName) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Food Name';
            $toast_status = 'true';
            return;
        }
        if ($FoodQty > 1) {
            $error_status = "warn";
            $error_message = 'Please Enter Oty to 1 Only';
            $toast_status = 'true';
            return;
        }
        if ($FoodCategory == "no") {
            $error_status = "warn";
            $error_message = 'Please Select Food Category';
            $toast_status = 'true';
            return;
        }


        // check weather atleast one size provide
        if (($normalPrice == 0) &&  (($mediumPrice == 0) && ($smallPrice == 0) && ($largePrice == 0))) {
            $error_status = "warn";
            $error_message = 'Please Enter Normal Price  Or Different Size Price ';
            $toast_status = 'true';
            return;
        }
        // price check weather all sizes not selected

        if ($normalPrice > 0) {
            if (($mediumPrice > 0) || ($smallPrice > 0) || ($largePrice > 0)) {
                $error_status = "warn";
                $error_message = 'Please Enter Only Normal Price or Different Size Price';
                $toast_status = 'true';
                return;
            }
        }

        if (strlen($description) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Food Description';
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
        // order status set
        $orderStatus = "";
        if (isset($_REQUEST['orderStatus'])) {
            $orderStatus = "on";
        } else {
            $orderStatus = "off";
        }


        //! if file not enter means photo not update
        if (strlen($_FILES['FoodImage']['name']) == 0) {

            // check weather name is not duplicate
            // established connection
            require('../middleware/ConnectToDatabase.php');
            $resultGet = mysqli_query($connection, "SELECT * FROM fooditems where id =$FoodId");
            $rows = mysqli_num_rows($resultGet);
            // find item from db
            if ($rows == 0) {
                $error_status = "error";
                $error_message = "Food Not Found";
                $toast_status = 'true';
                header('Location: /sd-canteen/admin/updatefooditem.php');

                return;
            }
            // item finds
            else {
                $DataFromDB = mysqli_fetch_assoc($resultGet);
                // same name of same table
                if ($FoodName == $DataFromDB['foodname']) {


                    $sql_query = "update fooditems set category='$FoodCategory',qty=$FoodQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description' where id=$FoodId";
                    $result = mysqli_query($connection, $sql_query);

                    if ($result) {

                        $error_status = "success";
                        $error_message = "$FoodName Successfully Updated";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/admin/updatefooditem.php');
                    }
                }
                // name also change request
                else {
                    // checking weather any exiting not have same name
                    $res = mysqli_query($connection, "SELECT * FROM fooditems where foodname like '$FoodName'");
                    $rowCheck = mysqli_num_rows($res);
                    if ($rowCheck > 0) {
                        $error_status = "error";
                        $error_message = "Food Item with this Name Already Exits";
                        $toast_status = 'true';
                        return;
                    } else {
                        $sql_query = "update fooditems set foodname='$FoodName',category='$FoodCategory',qty=$FoodQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description' where id=$FoodId";
                        $result = mysqli_query($connection, $sql_query);

                        if ($result) {

                            $error_status = "success";
                            $error_message = "$FoodName Successfully Updated";
                            $toast_status = 'true';
                            header('Location: /sd-canteen/admin/updatefooditem.php');
                        }
                    }
                }
            }
        }
        // photo also change
        else {
            // checking file
            if (($_FILES['FoodImage']['type'] == "image/png") || ($_FILES['FoodImage']['type'] == "image/jpg") || ($_FILES['FoodImage']['type'] == "image/jpeg") || ($_FILES['FoodImage']['type'] == "image/webp")) {
                // size check
                $sizeInMb = $_FILES['FoodImage']['size'] / (1024 * 1024);
                if ($sizeInMb > 5) {
                    $error_status = "error";
                    $error_message = 'Please Upload Image Less Than 5 Mb';
                    $toast_status = 'true';
                    return;
                }
                // image ready to update
                else {


                    $OriginalFileName = $_FILES['FoodImage']['name'];
                    //! file name temporary 
                    $tmp_name =  $_FILES['FoodImage']['tmp_name'];

                    // ! file destination
                    $location = "../images/FoodImages/";
                    // ! generate unique name for files
                    $newLocationName = $location . time() . "-" . rand(1000, 9999) . "-" . $OriginalFileName;





                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $resultGet = mysqli_query($connection, "SELECT * FROM fooditems where id =$FoodId");
                    $rows = mysqli_num_rows($resultGet);
                    if ($rows == 0) {
                        $error_status = "error";
                        $error_message = "Food Not Found";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/admin/updatefooditem.php');

                        return;
                    } else {


                        $DataFromDB = mysqli_fetch_assoc($resultGet);
                        $oldImagePath = $DataFromDB['imagepath'];

                        // same name of same table
                        if ($FoodName == $DataFromDB['foodname']) {

                            if (unlink($oldImagePath)) {
                            }
                            if (move_uploaded_file($tmp_name, $newLocationName)) {
                            }
                            $sql_query = "update fooditems set category='$FoodCategory',qty=$FoodQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description',imagepath='$newLocationName' where id=$FoodId";
                            $result = mysqli_query($connection, $sql_query);

                            if ($result) {

                                $error_status = "success";
                                $error_message = "$FoodName Successfully Updated";
                                $toast_status = 'true';
                                header('Location: /sd-canteen/admin/updatefooditem.php');
                            }
                        }
                        // name also change request
                        else {
                            // checking weather any exiting not have same name
                            $res = mysqli_query($connection, "SELECT * FROM fooditems where foodname like '$FoodName'");
                            $rowCheck = mysqli_num_rows($res);
                            if ($rowCheck > 0) {
                                $error_status = "error";
                                $error_message = "Food Item with this Name Already Exits";
                                $toast_status = 'true';
                                return;
                            } else {
                                if (unlink($oldImagePath)) {
                                }
                                if (move_uploaded_file($tmp_name, $newLocationName)) {
                                }
                                $sql_query = "update fooditems set foodname='$FoodName',category='$FoodCategory',qty=$FoodQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description',imagepath='$newLocationName' where id=$FoodId";
                                $result = mysqli_query($connection, $sql_query);

                                if ($result) {

                                    $error_status = "success";
                                    $error_message = "$FoodName Successfully Updated";
                                    $toast_status = 'true';
                                    header('Location: /sd-canteen/admin/updatefooditem.php');
                                }
                            }
                        }
                    }
                }
            } else {

                $error_status = "error";
                $error_message = 'Only PNG, JPG, JPEG,WEBP Images are Allowed To upload';
                $toast_status = 'true';
                return;
            }
        }
    }
}
