<?php

require('../middleware/ConnectToDatabase.php');
$foodname = $_REQUEST['foodname'];
$array = array();
$sql_query = "select * from fooditems where foodname like '%$foodname%'";
$resFoodItem = mysqli_query($connection, $sql_query);

$length = mysqli_num_rows($resFoodItem);

if ($length == 0) {
    echo "<h6>No Item Found</h6>";

} else {
    while ($dataSearch = mysqli_fetch_array($resFoodItem)) {?>
  <div class="dataCard" id="resultData">
  <li class="Image_Section">
        <img src="<?php echo $dataSearch['imagepath']?>"  alt="item.Image"  >
    </li>

    <li class="Item_Name">
<p><?php echo $dataSearch['foodname'] ?></p></li>





<li class="<?php if($dataSearch['normalprice'] > 0){
    echo "Item_Price_Normal";
}else{

 echo "Item_Price"; 

}
    ?>">

<!-- data -->
<?php if($dataSearch['normalprice'] > 0){
  echo "<p><b>Normal Size: </b>";
  echo $dataSearch['normalprice'];
  echo "</p>";

}else{

    if ($dataSearch['smallprice'] > 0) {
        echo " <p><b>Small Size: </b>";
    
        echo $dataSearch['smallprice'];
    
        echo "</p>";
    }
    
    if ($dataSearch['mediumprice'] > 0) {
    
        echo " <p><b>Medium Size: </b>";
    
        echo $dataSearch['mediumprice'];
    
        echo "</p>";
    }
    
    if ($dataSearch['largeprice'] > 0) {
        echo " <p><b>Large Size: </b>";
    
        echo $dataSearch['largeprice'];
    
        echo "</p>";
    }

}
    ?>

</li>








<li class="Item_Category">
<p><?php echo $dataSearch['category'] ?></p></li>

<li class='Item_Qty'>
<form method='POST' action="">
<input type='text' name="foodID" value="<?php echo $dataSearch['id'];?>" style='display:none'>
<p class='updateBtn' title='Click To Delete'>
<button name="delete_food_item"><i class='fa-solid fa-trash'></i></button> 
</p>
</form>
</li>


                           
                            
   </div>

      <?php
    }



}

?>
