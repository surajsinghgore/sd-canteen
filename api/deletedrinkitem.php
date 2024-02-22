<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $foodId = intval($_REQUEST['foodID']);
  
    if (empty($foodId)) {

        $error_status = "warn";
        $error_message = "Please provide Drink Id";
        $toast_status = 'true';
        return;
    }

    if (isset($foodId)) {

        // established connection
        require('../middleware/ConnectToDatabase.php');
        $resultGet = mysqli_query($connection, "SELECT * FROM drinkitems where id=$foodId");
        $foodItemFind = mysqli_num_rows($resultGet);
        $FoodItemToDeleteData = mysqli_fetch_assoc($resultGet);

        // food not found 
        if ($foodItemFind == 0) {
            $error_status = "error";
            $error_message = "Drink Item with this Id Not Found";
            $toast_status = 'true';
            return;
        } else {

            // delete food item
            $imagepath = $FoodItemToDeleteData['imagepath'];

            if (unlink($imagepath)) {
                $sql_query = "delete from drinkitems where id=$foodId";
                $deleteFoodRess = mysqli_query($connection, $sql_query);
                if ($deleteFoodRess) {
                    $error_status = "success";
                    $error_message = "Drink Item Successfully deleted";
                    $toast_status = 'true';
                    header('Location: /sd-canteen/admin/deletedrinkitem.php');
                }
            }
        }
    }
}
