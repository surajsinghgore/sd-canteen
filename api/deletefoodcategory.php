<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $foodId = intval($_REQUEST['foodcategoryid']);

    if (empty($foodId)) {

        $error_status = "warn";
        $error_message = "Please provide Food Category Id";
        $toast_status = 'true';
        return;
    }

    if (isset($foodId)) {

        // established connection
        require('../middleware/ConnectToDatabase.php');
        $resultGet = mysqli_query($connection, "SELECT * FROM foodcategories where id=$foodId");
        $foodItemFind = mysqli_num_rows($resultGet);
        $FoodItemToDeleteData = mysqli_fetch_assoc($resultGet);

        // food category not found 
        if ($foodItemFind == 0) {
            $error_status = "error";
            $error_message = "Food Category with this Id Not Found";
            $toast_status = 'true';
            return;
        } else {




            $sql_query = "delete from foodcategories where id=$foodId";
            $deleteFoodRess = mysqli_query($connection, $sql_query);
            if ($deleteFoodRess) {
                $error_status = "success";
                $error_message = "Food Category Successfully deleted";
                $toast_status = 'true';
                header('Location: /sd-canteen/admin/ManageFoodCategory.php');
            }
        }
    }
}
