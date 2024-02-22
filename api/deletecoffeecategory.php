<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $foodId = intval($_REQUEST['coffeecategoryid']);

    if (empty($foodId)) {

        $error_status = "warn";
        $error_message = "Please provide Coffee Category Id";
        $toast_status = 'true';
        return;
    }

    if (isset($foodId)) {

        // established connection
        require('../middleware/ConnectToDatabase.php');
        $resultGet = mysqli_query($connection, "SELECT * FROM coffeecategories where id=$foodId");
        $foodItemFind = mysqli_num_rows($resultGet);
        $FoodItemToDeleteData = mysqli_fetch_assoc($resultGet);

        // food category not found 
        if ($foodItemFind == 0) {
            $error_status = "error";
            $error_message = "Coffee Category with this Id Not Found";
            $toast_status = 'true';
            return;
        } else {




            $sql_query = "delete from coffeecategories where id=$foodId";
            $deleteFoodRess = mysqli_query($connection, $sql_query);
            if ($deleteFoodRess) {
                $error_status = "success";
                $error_message = "Coffee Category Successfully deleted";
                $toast_status = 'true';
                header('Location: /sd-canteen/admin/ManageCoffeeCategory.php');
            }
        }
    }
}
