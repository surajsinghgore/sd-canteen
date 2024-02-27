<?php

require('../middleware/ConnectToDatabase.php');
// page load 
if (isset($_REQUEST['loadPage'])) {
    $food_item_count = "select * from coffeeitems where active='on'";
    $res_food_item_count = mysqli_query($connection, $food_item_count);
    $FoodItemsCount = mysqli_num_rows($res_food_item_count);


    
if($FoodItemsCount>0){

    while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { ?>

<div class="card" loading="lazy">
   <div class="FoodImg">
  <a href="">
    <img src="<?php 
    $modifiedString = substr($allFoodData['imagepath'], 1);
    echo $modifiedString;?>"  alt="<?php 
    $modifiedString = substr($allFoodData['imagepath'], 1);
    echo $modifiedString;?>"></a>
   </div>
   <div class="deatils">
   <a href=""><h1><?php echo $allFoodData['coffeename'];?></h1></a>
<h3>Qty: <span>1</span></h3>

<h6>Category: <span><?php echo $allFoodData['category'];?></span></h6>

<div class="price1" id="price<?php echo $allFoodData['id']?>">
   <h4>₹ 
    
   <?php 
if($allFoodData['smallprice']!=0){
    
echo $allFoodData['smallprice'];
        
}

        else{

            echo $allFoodData['normalprice'];
        }
?>

</h4>
 </div>
<!-- sizes -->
 <div class="sizes">
 <div class="dropBtn" onclick='showPopUpMenu("<?php echo $allFoodData['id'];?>")'>
 <div class="span" id="currentSizeSelect<?php echo $allFoodData['id'];?>">
    <?php if($allFoodData['smallprice']!=0){
        ?>
 small size
        
        <?php }

        else{

 ?>

normal size
            <?php
        }
?>
 


</div>
 <div class="arrow">

 <svg stroke="currentColor" id="arrowDownArrow<?php echo $allFoodData['id'];?>" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 14l-4-4h8z"></path></g></svg>


 


 <svg id="arrowUpArrow<?php echo $allFoodData['id'];?>"  stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10l4 4H8z"></path></g></svg>



 </div>
 
 </div>

  <div class="listPopUp" id="listPopUp<?php echo $allFoodData['id'];?>">
<!-- pop up category -->

<?php if($allFoodData['normalprice']!=0){
?>
<div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['normalprice'];?>","normal")'><li>normal size</li></div>
<?php
}
if($allFoodData['smallprice']!=0){

    ?>
    <div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['smallprice'];?>","small")'><li>small size</li></div>
    <?php
}
if($allFoodData['mediumprice']!=0){
    ?>
    <div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['mediumprice'];?>","medium")'><li>medium size</li></div>
    <?php

}

if($allFoodData['largeprice']!=0){
    ?>
    <div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['largeprice'];?>","large")'><li>large size</li></div>
    <?php

}
?>
 

 
 

 </div>

   </div>
   <div class="btnSection">

<!-- if add to cart then removve -->
<button id="removeToCartBtn<?php echo $allFoodData['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")'
>Remove Item</button>

<!-- add to cart -->
<button onclick='addToCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")' id="addToCartBtn<?php echo $allFoodData['id'];?>">Add To Cart</button>

<!-- buy now button -->
<button class="buy" onclick='addToCartAndBuy("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")'>Buy Now</button>
</div>

</div>

</div>



<?php
    }
}
else{
echo "<h1 class=\"match\" style='margin-top:40px'>No Item Found</h1>";

}
}

// search by item name

else if(isset($_REQUEST['itemName'])){
$itemName=$_REQUEST['itemName'];
$food_item_count = "select * from coffeeitems where active='on' and coffeename like '%$itemName%'";
$res_food_item_count = mysqli_query($connection, $food_item_count);
$FoodItemsCount = mysqli_num_rows($res_food_item_count);



if($FoodItemsCount>0){

while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { ?>


<div class="card" loading="lazy">
<div class="FoodImg">
<a href="">
<img src="<?php 
$modifiedString = substr($allFoodData['imagepath'], 1);
echo $modifiedString;?>"  alt="<?php 
$modifiedString = substr($allFoodData['imagepath'], 1);
echo $modifiedString;?>"></a>
</div>
<div class="deatils">
<a href=""><h1><?php echo $allFoodData['coffeename'];?></h1></a>
<h3>Qty: <span>1</span></h3>

<h6>Category: <span><?php echo $allFoodData['category'];?></span></h6>

<div class="price1" id="price<?php echo $allFoodData['id']?>">
<h4>₹ 

<?php 
if($allFoodData['smallprice']!=0){

echo $allFoodData['smallprice'];
    
}

    else{

        echo $allFoodData['normalprice'];
    }
?>

</h4>
</div>
<!-- sizes -->
<div class="sizes">
<div class="dropBtn" onclick='showPopUpMenu("<?php echo $allFoodData['id'];?>")'>
<div class="span" id="currentSizeSelect<?php echo $allFoodData['id'];?>">
<?php if($allFoodData['smallprice']!=0){
    ?>
small size
    
    <?php }

    else{

?>

normal size
        <?php
    }
?>



</div>
<div class="arrow">

<svg stroke="currentColor" id="arrowDownArrow<?php echo $allFoodData['id'];?>" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 14l-4-4h8z"></path></g></svg>





<svg id="arrowUpArrow<?php echo $allFoodData['id'];?>"  stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10l4 4H8z"></path></g></svg>



</div>

</div>

<div class="listPopUp" id="listPopUp<?php echo $allFoodData['id'];?>">
<!-- pop up category -->

<?php if($allFoodData['normalprice']!=0){
?>
<div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['normalprice'];?>","normal")'><li>normal size</li></div>
<?php
}
if($allFoodData['smallprice']!=0){

?>
<div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['smallprice'];?>","small")'><li>small size</li></div>
<?php
}
if($allFoodData['mediumprice']!=0){
?>
<div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['mediumprice'];?>","medium")'><li>medium size</li></div>
<?php

}

if($allFoodData['largeprice']!=0){
?>
<div onclick='changeSize("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['largeprice'];?>","large")'><li>large size</li></div>
<?php

}
?>





</div>

</div>
<div class="btnSection">

<!-- if add to cart then removve -->
<button id="removeToCartBtn<?php echo $allFoodData['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")'
>Remove Item</button>

<!-- add to cart -->
<button onclick='addToCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")' id="addToCartBtn<?php echo $allFoodData['id'];?>">Add To Cart</button>

<!-- buy now button -->
<button class="buy" onclick='addToCartAndBuy("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['coffeename'];?>")'>Buy Now</button>
</div>

</div>

</div>


<?php
}
}
else{
echo "<h1 class=\"match\" style='margin-top:40px'>No Item Found</h1>";

}
}
?>