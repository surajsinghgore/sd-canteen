<!-- include add to food API -->
<?php require('../api/AddFoodItem.php'); ?>



<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css">
<link rel="stylesheet" href="../styles/admin/ShowFoodItem.css?v=7">

<script>
    window.document.title = "SD CANTEEN | Delete Food Item";
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>

<body>


    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Delete Food Item Page";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/admin.php";
            $pathNavigationParent = "Admin";
            $pathNavigationChild = "Delete food item";
            require('../components/PathNavigation.php'); ?>







            <div class="display_List">
                <div class="top">
                    <div class="deatils">
                        <h1>All Food Items</h1>
                        <p>Details of all Food</p>
                    </div>
                    <div class="search">
                        <input type="search" name="name" placeholder="Search By Food Name..." id="foodNameSearchs" />
                        <select name="category" id="dropDown">
                            <option value="">Search By Category ..</option>

                            <option>
                                burger
                            </option>
                            

                        </select>
                    </div>
                </div>

                <div class="card_container">
                    <div class="cards">
                        <li class="Image_Section">Item Photo</li>
                        <li class="Item_Name">Food Name</li>
                        <li class="Item_Price">Price</li>
                        <li class="Item_Price">Category</li>
                        <li class="Item_Category">Action</li>
                    </div>





                    <?php
                    // connection established
                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $sql_query = "select * from fooditems";
                    $resFoodItem = mysqli_query($connection, $sql_query);

                    $length = mysqli_num_rows($resFoodItem);


                    if ($length == 0) {
                        echo "<h1 class='noItemFound'>No Item Available</h1>";
                    } else {
                        // row wise printing
                        while ($FoodItemAllDataInAdmin = mysqli_fetch_array($resFoodItem)) {

                            echo "<div class=\"dataCard\" key=\"index\">";
                            // image load
                            echo "<li class=\"Image_Section\">
        <img src=\"", $FoodItemAllDataInAdmin['imagepath'], "\" alt=\"item.Image\"  />
    </li>";
                            // food name
                            echo " <li class=\"Item_Name\">
<p>";
echo $FoodItemAllDataInAdmin['foodname'];
echo "</p></li>";
                            // food price
         
                            

                            if($FoodItemAllDataInAdmin['normalprice']>0){

                                echo " <li class=\"Item_Price_Normal\"><p><b>Normal Size: </b>";
                              
                                echo $FoodItemAllDataInAdmin['normalprice'];
                            
                                echo "</p></li>";
                            }
else{
echo " <li class=\"Item_Price\">";
    if($FoodItemAllDataInAdmin['smallprice']>0){
        echo " <p><b>Small Size: </b>";
                              
        echo $FoodItemAllDataInAdmin['smallprice'];
    
        echo "</p>";
    }

    if($FoodItemAllDataInAdmin['mediumprice']>0){

        echo " <p><b>Medium Size: </b>";
                              
        echo $FoodItemAllDataInAdmin['mediumprice'];
    
        echo "</p>";
    }

    if($FoodItemAllDataInAdmin['largeprice']>0){
        echo " <p><b>Large Size: </b>";
                              
        echo $FoodItemAllDataInAdmin['largeprice'];
    
        echo "</p>";

    }
    echo "</li>";  
}




                            
                           
        

      


                            //  category 

                            echo " <li class=\"Item_Category\">
                            <p>";
                            echo $FoodItemAllDataInAdmin['category'];
                            echo "</p></li>";
                            


                            // delete
                           echo " <li class='Item_Qty'>
                            <p
                               class='updateBtn'
                              title='Click To Delete'
                            >";
                            echo "
                            <i class='fa-solid fa-trash'></i>
                            </p>
                          </li>";
                            echo "</div>";
                        }
                    }


                    ?>






                </div>
            </div>


        </div>


</body>

</html>