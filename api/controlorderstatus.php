<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['on_off_click'])) {
        if (!isset($_SESSION)) {
            session_start();
        }


        // off btn 
        if (!isset($_POST['orderStatus'])) {
            // established connection
            require('../middleware/ConnectToDatabase.php');
            $sql_query = "update orderonoffstatus set status=\"true\" where id=1";
            $res = mysqli_query($connection, $sql_query);

            // return 1 if true
            if ($res) {

                $error_status = "success";
                $error_message = 'ORDER IS ON NOW';

                $toast_status = 'true';


                // echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/admin.php'},2000)</script>";
            }
        }
        // on btn
        else {
            // established connection
            require('../middleware/ConnectToDatabase.php');
            $sql_query = "update orderonoffstatus set status=\"false\" where id=1";
            $res = mysqli_query($connection, $sql_query);
            // return 1 if true
            if ($res) {

                $error_status = "error";
                $error_message = 'ORDER IS OFF NOW';
                $toast_status = 'true';



                // echo "<script>setTimeout(()=>{window.location.href='http://localhost/sd-canteen/admin/admin.php'},2000)</script>";
            }
        }
    }
}
