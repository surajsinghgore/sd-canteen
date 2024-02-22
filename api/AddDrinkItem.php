<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['SendDrinkItem'])) {
        // validate Data

        $DrinkName = strip_tags($_REQUEST['DrinkName']);
        $DrinkQty = intval($_REQUEST['DrinkQty']);
        $DrinkCategory = $_REQUEST['DrinkCategory'];
        $normalPrice = intval($_REQUEST['normalPrice']);
        $smallPrice = intval($_REQUEST['smallPrice']);
        $mediumPrice = intval($_REQUEST['mediumPrice']);
        $largePrice = intval($_REQUEST['largePrice']);
        $description = strip_tags($_REQUEST['description']);




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
            $error_message = 'Please Select Coffee Category';
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
        if (strlen($_FILES['DrinkImage']['name']) == 0) {
            $error_status = "warn";
            $error_message = 'Please Enter Drink Image';
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

        // order status -->ON-->On else OFF
        if (isset($_REQUEST['orderStatus'])) {


            // ! file name gets
            if (($_FILES['DrinkImage']['type'] == "image/png") || ($_FILES['DrinkImage']['type'] == "image/jpg") || ($_FILES['DrinkImage']['type'] == "image/jpeg") || ($_FILES['DrinkImage']['type'] == "image/webp")) {


                // file size limit check

                $sizeInMb = $_FILES['DrinkImage']['size'] / (1024 * 1024);
                if ($sizeInMb > 5) {
                    $error_status = "error";
                    $error_message = 'Please Upload Image Less Than 5 Mb';
                    $toast_status = 'true';
                    return;
                } else {


                    // checking weather food name is already exits or not
                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $resultGet = mysqli_query($connection, "SELECT * FROM drinkitems where drinkname ='$DrinkName'");
                    $rows = mysqli_num_rows($resultGet);

                    // duplicate data entry 
                    if ($rows > 0) {
                        $error_status = "error";
                        $error_message = "Drink Item with this Name Already Exits";
                        $toast_status = 'true';
                        return;
                    } else {
                        $OriginalFileName = $_FILES['DrinkImage']['name'];
                        //! file name temporary 
                        $tmp_name =  $_FILES['DrinkImage']['tmp_name'];

                        // ! file destination
                        $location = "../images/DrinkImages/";
                        // ! generate unique name for files
                        $newLocationName = $location . time() . "-" . rand(1000, 9999) . "-" . $OriginalFileName;
                        if (move_uploaded_file($tmp_name, $newLocationName)) {


                            $sql_query = "insert into drinkitems(drinkname,qty,category,active,normalprice,smallprice,mediumprice,largeprice,description,imagepath) values('$DrinkName',$DrinkQty,'$DrinkCategory','on',$normalPrice,$smallPrice,$mediumPrice,$largePrice,'$description','$newLocationName')";

                            $res = mysqli_query($connection, $sql_query);
                            if ($res) {

                                $error_status = "success";
                                $error_message = "$DrinkName Successfully Added";
                                $toast_status = 'true';
                                header('Location: /sd-canteen/admin/viewdrinkItem.php');
                            }
                            // failed to send
                            else {

                                if (unlink($newLocationName)) {
                                    $error_status = "error";
                                    $error_message = "Please Try Again";
                                    $toast_status = 'true';
                                    return;
                                }
                            }
                        } else {

                            if (unlink($newLocationName)) {
                                $error_status = "error";
                                $error_message = "Please Try Again";
                                $toast_status = 'true';
                                return;
                            } else {

                                $error_status = "error";
                                $error_message = "Please Try Again";
                                $toast_status = 'true';
                                return;
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

        // order off
        else {

            // ! file name gets
            if (($_FILES['DrinkImage']['type'] == "image/png") || ($_FILES['DrinkImage']['type'] == "image/jpg") || ($_FILES['DrinkImage']['type'] == "image/jpeg") || ($_FILES['DrinkImage']['type'] == "image/webp")) {


                // file size limit check

                $sizeInMb = $_FILES['DrinkImage']['size'] / (1024 * 1024);
                if ($sizeInMb > 5) {
                    $error_status = "error";
                    $error_message = 'Please Upload Image Less Than 5 Mb';
                    $toast_status = 'true';
                    return;
                } else {


                    // checking weather food name is already exits or not
                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $resultGet = mysqli_query($connection, "SELECT * FROM drinkitems where drinkname ='$DrinkName'");
                    $rows = mysqli_num_rows($resultGet);

                    // duplicate data entry 
                    if ($rows > 0) {
                        $error_status = "error";
                        $error_message = "Drink Item with this Name Already Exits";
                        $toast_status = 'true';
                        return;
                    } else {
                        $OriginalFileName = $_FILES['DrinkImage']['name'];
                        //! file name temporary 
                        $tmp_name =  $_FILES['DrinkImage']['tmp_name'];

                        // ! file destination
                        $location = "../images/DrinkImages/";
                        // ! generate unique name for files
                        $newLocationName = $location . time() . "-" . rand(1000, 9999) . "-" . $OriginalFileName;
                        if (move_uploaded_file($tmp_name, $newLocationName)) {


                            $sql_query = "insert into drinkitems(drinkname,qty,category,active,normalprice,smallprice,mediumprice,largeprice,description,imagepath) values('$DrinkName',$DrinkQty,'$DrinkCategory','off',$normalPrice,$smallPrice,$mediumPrice,$largePrice,'$description','$newLocationName')";

                            $res = mysqli_query($connection, $sql_query);
                            if ($res) {

                                $error_status = "success";
                                $error_message = "$DrinkName Successfully Added";
                                $toast_status = 'true';
                                header('Location: /sd-canteen/admin/viewdrinkItem.php');
                            }
                            // failed to send
                            else {

                                if (unlink($newLocationName)) {
                                    $error_status = "error";
                                    $error_message = "Please Try Again";
                                    $toast_status = 'true';
                                    return;
                                }
                            }
                        } else {

                            if (unlink($newLocationName)) {
                                $error_status = "error";
                                $error_message = "Please Try Again";
                                $toast_status = 'true';
                                return;
                            } else {

                                $error_status = "error";
                                $error_message = "Please Try Again";
                                $toast_status = 'true';
                                return;
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
