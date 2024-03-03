<?php

require('../middleware/ConnectToDatabase.php');
// page load 
if (isset($_REQUEST['loadPage'])) {

    $sql_query = "select * from foodcategories";
    $food_item_count = "select * from fooditems where active='on'";
    $resAllCategory = mysqli_query($connection, $sql_query);
    $res_food_item_count = mysqli_query($connection, $food_item_count);
    $AllCategoryLen = mysqli_num_rows($resAllCategory);
    $FoodItemsCount = mysqli_num_rows($res_food_item_count);

if($AllCategoryLen>0){

?>
  <li onclick="pageLoadData()"><span class="heading">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M192 128l128 128-128 128z"></path></svg> All</span>
  <span class="length"><?php echo $FoodItemsCount?></span></li>
<?php

    while ($allCategoryData = mysqli_fetch_array($resAllCategory)) { ?>


 <li  onclick='loadParticularCategory("<?php echo $allCategoryData['foodcategoryname'];?>")'><span class="heading">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M192 128l128 128-128 128z"></path></svg>  
    <?php echo $allCategoryData['foodcategoryname'];?></span>

    <!-- count food in category -->
    <span class="length"> <?php 
    $countLength = "select * from fooditems where category='".$allCategoryData['foodcategoryname']."' and active='on'";
    $resLengthCategory = mysqli_query($connection, $countLength);
    $itemsOfCategoryLen = mysqli_num_rows($resLengthCategory);
echo $itemsOfCategoryLen;
    ?>  </span></li>

<?php
    }
}
   

}

// load food data with category

else if(isset($_REQUEST['category'])){
$category=$_REQUEST['category'];
$food_item_count = "select * from fooditems where active='on' and category like '$category'";
$res_food_item_count = mysqli_query($connection, $food_item_count);
$FoodItemsCount = mysqli_num_rows($res_food_item_count);



if($FoodItemsCount>0){

    while ($allFoodData = mysqli_fetch_array($res_food_item_count)) { ?>
    
    
    <div class="card" loading="lazy">
    <div class="FoodImg">
    <a href="/sd-canteen/items.php?itemname=<?php echo $allFoodData['foodname'];?>">
    <img src="<?php 
    $modifiedString = substr($allFoodData['imagepath'], 1);
    echo $modifiedString;?>"  alt="<?php 
    $modifiedString = substr($allFoodData['imagepath'], 1);
    echo $modifiedString;?>"></a>
    </div>
    <div class="deatils">
    <a href="/sd-canteen/items.php?itemname=<?php echo $allFoodData['foodname'];?>"><h1><?php echo $allFoodData['foodname'];?></h1></a>
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
    onclick='removeFromCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['foodname'];?>")'
    >Remove Item</button>
    
    <!-- add to cart -->
    <button onclick='addToCart("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['foodname'];?>")' id="addToCartBtn<?php echo $allFoodData['id'];?>">Add To Cart</button>
    
    <!-- buy now button -->
    <button class="buy" onclick='addToCartAndBuy("<?php echo $allFoodData['id'];?>","<?php echo $allFoodData['foodname'];?>")'>Buy Now</button>
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
