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
  <li><span class="heading">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M192 128l128 128-128 128z"></path></svg> All</span>
  <span class="length"><?php echo $FoodItemsCount?></span></li>
<?php

    while ($allCategoryData = mysqli_fetch_array($resAllCategory)) { ?>


 <li><span class="heading">
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




?>
