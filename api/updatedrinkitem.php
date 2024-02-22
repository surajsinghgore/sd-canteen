<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['update_drink_item'])) {
        $DrinkId = $_REQUEST['FoodId'];
        $DrinkName = strip_tags($_REQUEST['DrinkName']);
        $DrinkQty = intval($_REQUEST['DrinkQty']);
        $DrinkCategory = $_REQUEST['DrinkCategory'];
        $normalPrice = intval($_REQUEST['normalPrice']);
        $smallPrice = intval($_REQUEST['smallPrice']);
        $mediumPrice = intval($_REQUEST['mediumPrice']);
        $largePrice = intval($_REQUEST['largePrice']);
        $description = strip_tags($_REQUEST['description']);


        // validate inputs
        if (!isset($DrinkId)) {
            $error_status = "warn";
            $error_message = 'Please Provide Drink ID';
            $toast_status = 'true';

            header('Location: /sd-canteen/admin/updatedrinkitem.php');
            return;
        }
        // empty food name
        if (strlen($DrinkName) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Drink Name';
            $toast_status = 'true';
            return;
        }
        if ($DrinkQty > 1) {
            $error_status = "warn";
            $error_message = 'Please Enter Oty to 1 Only';
            $toast_status = 'true';
            return;
        }
        if ($DrinkCategory == "no") {
            $error_status = "warn";
            $error_message = 'Please Select Drink Category';
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
            $error_message = 'Please Enter Drink Description';
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
        if (strlen($_FILES['DrinkImage']['name']) == 0) {

            // check weather name is not duplicate
            // established connection
            require('../middleware/ConnectToDatabase.php');
            $resultGet = mysqli_query($connection, "SELECT * FROM drinkitems where id =$DrinkId");
            $rows = mysqli_num_rows($resultGet);
            // find item from db
            if ($rows == 0) {
                $error_status = "error";
                $error_message = "Drink Not Found";
                $toast_status = 'true';
                header('Location: /sd-canteen/admin/updatedrinkitem.php');

                return;
            }
            // item finds
            else {
                $DataFromDB = mysqli_fetch_assoc($resultGet);
                // same name of same table
                if ($DrinkName == $DataFromDB['drinkname']) {


                    $sql_query = "update drinkitems set category='$DrinkCategory',qty=$DrinkQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description' where id=$DrinkId";
                    $result = mysqli_query($connection, $sql_query);

                    if ($result) {

                        $error_status = "success";
                        $error_message = "$DrinkName Successfully Updated";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/admin/updatedrinkitem.php');
                    }
                }
                // name also change request
                else {
                    // checking weather any exiting not have same name
                    $res = mysqli_query($connection, "SELECT * FROM drinkitems where drinkname like '$DrinkName'");
                    $rowCheck = mysqli_num_rows($res);
                    if ($rowCheck > 0) {
                        $error_status = "error";
                        $error_message = "Drink Item with this Name Already Exits";
                        $toast_status = 'true';
                        return;
                    } else {
                        $sql_query = "update drinkitems set drinkname='$DrinkName',category='$DrinkCategory',qty=$DrinkQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description' where id=$DrinkId";
                        $result = mysqli_query($connection, $sql_query);

                        if ($result) {

                            $error_status = "success";
                            $error_message = "$DrinkName Successfully Updated";
                            $toast_status = 'true';
                            header('Location: /sd-canteen/admin/updatedrinkitem.php');
                        }
                    }
                }
            }
        }
        // photo also change
        else {
            // checking file
            if (($_FILES['DrinkImage']['type'] == "image/png") || ($_FILES['DrinkImage']['type'] == "image/jpg") || ($_FILES['DrinkImage']['type'] == "image/jpeg") || ($_FILES['DrinkImage']['type'] == "image/webp")) {
                // size check
                $sizeInMb = $_FILES['DrinkImage']['size'] / (1024 * 1024);
                if ($sizeInMb > 5) {
                    $error_status = "error";
                    $error_message = 'Please Upload Image Less Than 5 Mb';
                    $toast_status = 'true';
                    return;
                }
                // image ready to update
                else {


                    $OriginalFileName = $_FILES['DrinkImage']['name'];
                    //! file name temporary 
                    $tmp_name =  $_FILES['DrinkImage']['tmp_name'];

                    // ! file destination
                    $location = "../images/DrinkImages/";
                    // ! generate unique name for files
                    $newLocationName = $location . time() . "-" . rand(1000, 9999) . "-" . $OriginalFileName;





                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $resultGet = mysqli_query($connection, "SELECT * FROM drinkitems where id =$DrinkId");
                    $rows = mysqli_num_rows($resultGet);
                    if ($rows == 0) {
                        $error_status = "error";
                        $error_message = "Drink Not Found";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/admin/updatedrinkitem.php');

                        return;
                    } else {


                        $DataFromDB = mysqli_fetch_assoc($resultGet);
                        $oldImagePath = $DataFromDB['imagepath'];

                        // same name of same table
                        if ($DrinkName == $DataFromDB['drinkname']) {

                            if (unlink($oldImagePath)) {
                            }
                            if (move_uploaded_file($tmp_name, $newLocationName)) {
                            }
                            $sql_query = "update drinkitems set category='$DrinkCategory',qty=$DrinkQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description',imagepath='$newLocationName' where id=$DrinkId";
                            $result = mysqli_query($connection, $sql_query);

                            if ($result) {

                                $error_status = "success";
                                $error_message = "$DrinkName Successfully Updated";
                                $toast_status = 'true';
                                header('Location: /sd-canteen/admin/updatedrinkitem.php');
                            }
                        }
                        // name also change request
                        else {
                            // checking weather any exiting not have same name
                            $res = mysqli_query($connection, "SELECT * FROM drinkitems where drinkname like '$DrinkName'");
                            $rowCheck = mysqli_num_rows($res);
                            if ($rowCheck > 0) {
                                $error_status = "error";
                                $error_message = "Drink Item with this Name Already Exits";
                                $toast_status = 'true';
                                return;
                            } else {
                                if (unlink($oldImagePath)) {
                                }
                                if (move_uploaded_file($tmp_name, $newLocationName)) {
                                }
                                $sql_query = "update drinkitems set drinkname='$DrinkName',category='$DrinkCategory',qty=$DrinkQty,active='$orderStatus',normalprice=$normalPrice,smallprice=$smallPrice,mediumprice=$mediumPrice,largeprice=$largePrice,description='$description',imagepath='$newLocationName' where id=$DrinkId";
                                $result = mysqli_query($connection, $sql_query);

                                if ($result) {

                                    $error_status = "success";
                                    $error_message = "$DrinkName Successfully Updated";
                                    $toast_status = 'true';
                                    header('Location: /sd-canteen/admin/updatedrinkitem.php');
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
