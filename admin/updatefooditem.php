<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css">
<link rel="stylesheet" href="../styles/admin/ShowFoodItem.css?v=3">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script>
    window.document.title = "SD CANTEEN | Update Drink Item";
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
            <?php $AdminTopHeaderTitle = "Update Food Item Page";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewfoodItem.php";
            $pathNavigationParent = "Foods";
            $pathNavigationChild = "update food item";
            require('../components/PathNavigation.php'); ?>







            <div class="display_List">
                <div class="top">
                    <div class="deatils">
                        <h1>All Food Items</h1>
                        <p>Details of all Food</p>
                    </div>
                    <div class="search">
                        <input type="search" name="name" placeholder="Search By Food Name..." id="foodNameSearch" onkeyup="searchByName()" />
                        <select name="category" id="foodCategoryName" onchange="searchByCategory()">
                            <option value="no">Search By Category ..</option>

                                 <!-- load category name -->
                                 <?php

require('../middleware/ConnectToDatabase.php');
$sql_query = "select * from foodcategories";
$resFoodItem = mysqli_query($connection, $sql_query);

$length = mysqli_num_rows($resFoodItem);

if ($length == 0) {
    echo "<h6>No Item Found</h6>";
} else {
    while ($dataSearch = mysqli_fetch_array($resFoodItem)) {
        echo "<option>";
        echo $dataSearch['foodcategoryname'];
        echo "</option>";
    }
}
?>


                        </select>
                    </div>
                </div>

                <div class="card_container" id="resultData">
                    <div class="cards">
                        <li class="Image_Section">Item Photo</li>
                        <li class="Item_Name" style="margin-left:6%;">Food Name</li>
                        <li class="Item_Price" style="margin-left:3%;">Price</li>
                        <li class="Item_Price" style="width: 20%;text-align:right">Category</li>
                        <li class="Item_Category" style="text-align:center;padding-left:5%">Action</li>
                    </div>





                    <?php
                    // connection established
                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $sql_query = "select * from fooditems";
                    $resFoodItem = mysqli_query($connection, $sql_query);

                    $length = mysqli_num_rows($resFoodItem);


                    if ($length == 0) {
                        echo "<h1 class='noItemFound' style='font-size:23px;padding-left:15px;padding-top:14px;padding-bottom:50px'>No Item Available</h1>";
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



                            if ($FoodItemAllDataInAdmin['normalprice'] > 0) {

                                echo " <li class=\"Item_Price_Normal\"><p><b>Normal Size: </b>";

                                echo $FoodItemAllDataInAdmin['normalprice'];

                                echo "</p></li>";
                            } else {
                                echo " <li class=\"Item_Price\">";
                                if ($FoodItemAllDataInAdmin['smallprice'] > 0) {
                                    echo " <p><b>Small Size: </b>";

                                    echo $FoodItemAllDataInAdmin['smallprice'];

                                    echo "</p>";
                                }

                                if ($FoodItemAllDataInAdmin['mediumprice'] > 0) {

                                    echo " <p><b>Medium Size: </b>";

                                    echo $FoodItemAllDataInAdmin['mediumprice'];

                                    echo "</p>";
                                }

                                if ($FoodItemAllDataInAdmin['largeprice'] > 0) {
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




                            echo " <li class='Item_Qty' >";


                            echo "<p
                               class='updateBtn'
                              title='Click To Update'
                              
                              onclick=\"updateItem(";
                            echo $FoodItemAllDataInAdmin['id'];
                            echo ")\";
                            >";
                            echo "<i class='fa-regular fa-pen-to-square'></i>
                            </p>";

                            echo "</li>";




                            echo "</div>";
                        }
                    }


                    ?>






                </div>
            </div>










       



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                function updateItem(id) {
                 
                    sessionStorage.setItem('updateFoodItemId', id);
window.location.href="http://localhost/sd-canteen/admin/updatefooditemForm.php"
                }

               


                // search with category
                function searchByCategory() {
                    let categorySelect = document.getElementById('foodCategoryName').value;
                    if (categorySelect == "no") {
                        window.location.reload();
                    } else {


                        $.ajax({
                            type: "POST", //type of method
                            url: "http://localhost/sd-canteen/api/searchFoodItemByCategory.php", //your page
                            data: {
                                category: categorySelect,
                                updatepage: "updatepage"
                            }, // passing the values
                            success: function(res) {
                                document.getElementById('resultData').innerHTML = res;
                            }
                        });
                    }

                }

                // search with name
                function searchByName() {
                    let searchInput = document.getElementById('foodNameSearch').value;

                    $.ajax({
                        type: "POST", //type of method
                        url: "http://localhost/sd-canteen/api/searchFoodItemByName.php", //your page
                        data: {
                            foodname: searchInput,
                            updatepage: "updatepage"
                        }, // passing the values
                        success: function(res) {
                            document.getElementById('resultData').innerHTML = res;
                        }
                    });

                }
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>