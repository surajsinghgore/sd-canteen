<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css">
<link rel="stylesheet" href="../styles/admin/ShowFoodItem.css?v=14">

<script>
    window.document.title = "SD CANTEEN | Show Food Item";
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
            <?php $AdminTopHeaderTitle = "View Food Item Page";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewfoodItem.php";
            $pathNavigationParent = "Foods";
            $pathNavigationChild = "View food item";
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
                        <li class="Item_Name">Food Name</li>
                        <li class="Item_Price">Price</li>
                        <li class="Item_Qty">Qty</li>
                        <li class="Item_Visibilty">Visibility</li>
                        <li class="Item_Category">Category</li>
                    </div>




                    <!-- food item gets -->
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

                            echo "<div class=\"dataCard\" >";
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




                            // qty

                            echo " <li class=\"Item_Qty\">
                            <p>";
                            echo $FoodItemAllDataInAdmin['qty'];
                            echo "</p></li>";






                            // visibility
                            if ($FoodItemAllDataInAdmin['active'] == "on") {
                                echo " <li class=\"Item_Visibilty\">

    <div class=\"ON\">on</div>
</li>";
                            } else {
                                echo " <li class=\"Item_Visibilty\">

    <div class=\"OFF\">off</div>
</li>";
                            }




                            //  category 

                            echo " <li class=\"Item_Category\">
                            <p>";
                            echo $FoodItemAllDataInAdmin['category'];
                            echo "</p></li>";


                            echo "</div>";
                        }
                    }


                    ?>






                </div>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
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
                            category: categorySelect
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
                        foodname: searchInput
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