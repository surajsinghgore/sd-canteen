<?php

require('../middleware/ConnectToDatabase.php');

if (isset($_REQUEST['id'])&&isset($_REQUEST['category'])) {
    require('../middleware/ConnectToDatabase.php');

// means food item request
    if($_REQUEST['category']=="FoodItem"){

        $foodId=$_REQUEST['id'];
        $currentSize=$_REQUEST['size'];
        $food_item_count = "select * from fooditems where id=$foodId";
        $res_food_item_count = mysqli_query($connection, $food_item_count);
        $FoodItemsCount = mysqli_num_rows($res_food_item_count);
        if($FoodItemsCount>0){
  while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { 
$foodId=$allFoodData['id'];
$foodname=$allFoodData['foodname'];
$category=$allFoodData['category'];
$image=$allFoodData['imagepath'];
$normalprice=$allFoodData['normalprice'];
$normalprice=$allFoodData['normalprice'];
$price=0;
if($currentSize=="small size"){
    $price=$allFoodData['smallprice'];
}
if($currentSize=="normal size"){

    $price=$allFoodData['normalprice'];
}
if($currentSize=="medium size"){

    $price=$allFoodData['mediumprice'];
}
if($currentSize=="large size"){

    $price=$allFoodData['largeprice'];
}

$data="{\"id\":$foodId,\"itemName\":\"$foodname\",\"image\":\"$image\",\"qty\":\"1\",\"size\":\"$currentSize\",\"price\":$price,\"total\":$price,\"category\":\"$category\",\"itemMainCategory\":\"food\",\"qtyBook\":1}";

echo $data;


            }
        }

    }
}


?>