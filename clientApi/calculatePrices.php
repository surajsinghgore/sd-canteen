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

    // means drink item
    if($_REQUEST['category']=="DrinkItem"){

        $foodId=$_REQUEST['id'];
        $currentSize=$_REQUEST['size'];
        $food_item_count = "select * from drinkitems where id=$foodId";
        $res_food_item_count = mysqli_query($connection, $food_item_count);
        $FoodItemsCount = mysqli_num_rows($res_food_item_count);

  while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { 


    // check weather size is available or not

    
$foodId=$allFoodData['id'];
$foodname=$allFoodData['drinkname'];
$category=$allFoodData['category'];
$image=$allFoodData['imagepath'];
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

$data="{\"id\":$foodId,\"itemName\":\"$foodname\",\"image\":\"$image\",\"qty\":\"1\",\"size\":\"$currentSize\",\"price\":$price,\"total\":$price,\"category\":\"$category\",\"itemMainCategory\":\"drink\",\"qtyBook\":1}";

echo $data;


            }
        

    }

    //means coffee item

    if($_REQUEST['category']=="CoffeeItem"){

        $foodId=$_REQUEST['id'];
        $currentSize=$_REQUEST['size'];
        $food_item_count = "select * from coffeeitems where id=$foodId";
        $res_food_item_count = mysqli_query($connection, $food_item_count);
        $FoodItemsCount = mysqli_num_rows($res_food_item_count);
   
  while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { 
$foodId=$allFoodData['id'];
$foodname=$allFoodData['coffeename'];
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

$data="{\"id\":$foodId,\"itemName\":\"$foodname\",\"image\":\"$image\",\"qty\":\"1\",\"size\":\"$currentSize\",\"price\":$price,\"total\":$price,\"category\":\"$category\",\"itemMainCategory\":\"coffee\",\"qtyBook\":1}";

echo $data;


            
        }

    }

    // means juice
    if($_REQUEST['category']=="JuiceItem"){

        $foodId=$_REQUEST['id'];
        $currentSize=$_REQUEST['size'];
        $food_item_count = "select * from juiceitems where id=$foodId";
        $res_food_item_count = mysqli_query($connection, $food_item_count);
        $FoodItemsCount = mysqli_num_rows($res_food_item_count);
   
  while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { 
$foodId=$allFoodData['id'];
$foodname=$allFoodData['juicename'];
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

$data="{\"id\":$foodId,\"itemName\":\"$foodname\",\"image\":\"$image\",\"qty\":\"1\",\"size\":\"$currentSize\",\"price\":$price,\"total\":$price,\"category\":\"$category\",\"itemMainCategory\":\"juice\",\"qtyBook\":1}";

echo $data;


            }
        

    }
}


?>