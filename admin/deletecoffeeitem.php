<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css">
<link rel="stylesheet" href="../styles/admin/ShowFoodItem.css?v=3">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script>
    window.document.title = "SD CANTEEN | Delete Coffee Item";
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>

<body>




    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this coffee item ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No </button>
                    <button type="button" class="btn btn-primary" onclick="deleteFoodItem()">Yes Delete


                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Delete Coffee Item Page";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewcoffeeItem.php";
            $pathNavigationParent = "Foods";
            $pathNavigationChild = "Delete Coffee item";
            require('../components/PathNavigation.php'); ?>







            <div class="display_List">
                <div class="top">
                    <div class="deatils">
                        <h1>All Coffee Items</h1>
                        <p>Details of all Coffee</p>
                    </div>
                    <div class="search">
                        <input type="search" name="name" placeholder="Search By Coffee Name..." id="foodNameSearch" onkeyup="searchByName()" />
                        <select name="category" id="foodCategoryName" onchange="searchByCategory()">
                            <option value="no">Search By Category ..</option>

                              <!-- load category name -->
                              <?php

require('../middleware/ConnectToDatabase.php');
$sql_query = "select * from coffeecategories";
$resFoodItem = mysqli_query($connection, $sql_query);

$length = mysqli_num_rows($resFoodItem);

if ($length == 0) {
    echo "<h6>No Item Found</h6>";
} else {
    while ($dataSearch = mysqli_fetch_array($resFoodItem)) {
        echo "<option>";
        echo $dataSearch['coffeecategoryname'];
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
                        <li class="Item_Name" style="margin-left:6%;">Coffee Name</li>
                        <li class="Item_Price" style="margin-left:3%;">Price</li>
                        <li class="Item_Price" style="width: 20%;text-align:right">Category</li>
                        <li class="Item_Category" style="text-align:center;padding-left:5%">Action</li>
                    </div>





                    <?php
                    // connection established
                    // established connection
                    require('../middleware/ConnectToDatabase.php');
                    $sql_query = "select * from coffeeitems";
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
                            echo $FoodItemAllDataInAdmin['coffeename'];
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
                              title='Click To Delete'
                              data-toggle=\"modal\" data-target=\"#exampleModal\"

                              onclick=\"deleteItem(";
                            echo $FoodItemAllDataInAdmin['id'];
                            echo ")\";
                            >";
                            echo "<i class='fa-solid fa-trash'></i>
                            </p>";

                            echo "</li>";




                            echo "</div>";
                        }
                    }


                    ?>






                </div>
            </div>










            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                function deleteItem(id) {
                    sessionStorage.setItem('deleteCoffeeItemId', id);

                }

                function deleteFoodItem() {

                 
                    if (sessionStorage.getItem('deleteCoffeeItemId')) {
                        let foodId = sessionStorage.getItem('deleteCoffeeItemId');
                        $.ajax({
                            type: "POST", //type of method
                            url: "http://localhost/sd-canteen/api/deletecoffeeitem.php", //your page
                            data: {
                                foodID: foodId

                            }, // passing the values
                            success: function(res) {
                                window.location.reload();
                                sessionStorage.removeItem('deleteCoffeeItemId')
                            }
                        });


                    } else {


                        alert('please try again')
                    }
                }


                // search with category
                function searchByCategory() {
                    let categorySelect = document.getElementById('foodCategoryName').value;
                    if (categorySelect == "no") {
                        window.location.reload();
                    } else {


                        $.ajax({
                            type: "POST", //type of method
                            url: "http://localhost/sd-canteen/api/searchCoffeeItemByCategory.php", //your page
                            data: {
                                category: categorySelect,
                                deletepage: "deletepage"
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
                        url: "http://localhost/sd-canteen/api/searchCoffeeItemByName.php", //your page
                        data: {
                            foodname: searchInput,
                            deletepage: "deletepage"
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