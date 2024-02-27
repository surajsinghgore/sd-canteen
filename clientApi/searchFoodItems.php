<?php

require('../middleware/ConnectToDatabase.php');
// page load 
if (isset($_REQUEST['loadPage'])) {
    $food_item_count = "select * from fooditems where active='on'";
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
   <a href=""><h1><?php echo $allFoodData['foodname'];?></h1></a>
<h3>Qty: <span>1</span></h3>

<h6>Category: <span><?php echo $allFoodData['category'];?></span></h6>

<!-- <h6>Category: <span>No</span></h6> -->
<div class="price1">
   <h4>₹ <?php echo $allFoodData['normalprice'];?></h4>
 </div>
<!-- sizes -->
 <div class="sizes">
 <div class="dropBtn">
 <div class="span">normal price</div>
 <div class="arrow">

 <svg stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 14l-4-4h8z"></path></g></svg>


 


 <!-- <svg stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10l4 4H8z"></path></g></svg> -->



 </div>
 
 </div>

  <div class="listPopUp" id="listPopUp">
<!-- pop up category -->
 <div><li>normal price</li></div>
 <div><li>normal price</li></div>
 <div><li>normal price</li></div>
 
 

 </div>

   </div>
   <div class="btnSection">

<!-- if add to cart then removve -->
<!-- <button>Remove Item</button> -->

<!-- add to cart -->
<button >Add To Cart</button>

<!-- buy now button -->
<button class="buy" >Buy Now</button>
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