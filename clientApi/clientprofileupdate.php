<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['client_profile_update'])) {

        if (isset($_FILES['ClientProfile']['name'])) {
            if (strlen($_FILES['ClientProfile']['name']) == 0) {
                $error_status = "warn";
                $error_message = 'Please Enter Client Image';
                $toast_status = 'true';
                return;
            }


            // verify client login
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!$_SESSION['activeClientId']) {

                $error_status = "error";
                $error_message = 'Please Login with Client credentials';
                $toast_status = 'true';

                header("Refresh: 5;url=http://localhost/sd-canteen/login.php");
            }

            if (($_FILES['ClientProfile']['type'] == "image/png") || ($_FILES['ClientProfile']['type'] == "image/jpg") || ($_FILES['ClientProfile']['type'] == "image/jpeg") || ($_FILES['ClientProfile']['type'] == "image/webp")) {





                // file size limit check

                $sizeInMb = $_FILES['ClientProfile']['size'] / (1024 * 1024);
                if ($sizeInMb > 5) {
                    $error_status = "error";
                    $error_message = 'Please Upload Image Less Than 5 Mb';
                    $toast_status = 'true';
                    return;
                } else {


                    $OriginalFileName = $_FILES['ClientProfile']['name'];
                    //! file name temporary 
                    $tmp_name =  $_FILES['ClientProfile']['tmp_name'];

                    // ! file destination
                    $location = "./images/ClientImages/";
                    // ! generate unique name for files
                    $newLocationName = $location . time() . "-" . rand(1000, 9999) . "-" . $OriginalFileName;



                    $clientId = $_SESSION['activeClientId'];


                    require('./middleware/ConnectToDatabase.php');
                    $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where id =$clientId");
                    $rows = mysqli_num_rows($resultGet);
                    if ($rows == 0) {
                        $error_status = "error";
                        $error_message = "Client Not Found";
                        $toast_status = 'true';
                        header('Location: /sd-canteen/login.php');

                        return;
                    } else {


                        $DataFromDB = mysqli_fetch_assoc($resultGet);
                      $oldClientImage= $DataFromDB['profileimage'];

                      if (unlink($oldClientImage)) {
                    }
                        if (move_uploaded_file($tmp_name, $newLocationName)) {
                            $query = "update clientdata set profileimage='$newLocationName' where id=$clientId";
                            $result = mysqli_query($connection, $query);
                            if ($result) {
                                $error_status = "success";
                                $error_message = "Profile Successfully Uploaded";
                                $toast_status = 'true';
                                header('Location: /sd-canteen/clientpanel.php');
                            }
                        } else {

                            $error_status = "warn";
                            $error_message = 'Please try again';
                            $toast_status = 'true';
                            return;
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
    } else {



        $error_status = "error";
        $error_message = 'Only PNG, JPG, JPEG,WEBP Images are Allowed To upload';
        $toast_status = 'true';
        return;
    }
}
