<!-- include add to food API -->
<?php require('../api/deletefooditem.php'); ?>


<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css">
<link rel="stylesheet" href="../styles/admin/ShowFoodItem.css?v=2">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script>
    window.document.title = "SD CANTEEN | Delete Food Item";
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>

<body>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="cursor:pointer"> <i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this food item ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>





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



                            // delete
                            // echo " <li class='Item_Qty' >";
                            // echo "<form method='POST' action=\"\">";
                            // echo "<input type='text' name=\"foodID\" value=\"";
                            // echo $FoodItemAllDataInAdmin['id'];
                            // echo "\" style=\"display:none\">";
                            // echo "<p
                            //    class='updateBtn'
                            //   title='Click To Delete'
                            // >";
                            // echo "<button name=\"delete_food_item\"><i class='fa-solid fa-trash'></i>
                            // </button> </p>";
                            // echo "</form>";
                            // echo "</li>";



                            echo "<li class='Item_Qty' ><p
                               class='updateBtn'
                              title='Click To Delete'
                              data-toggle='modal' data-target='#exampleModal'
                            ><i class='fa-solid fa-trash'></i></p></li>";

                            echo "</div>";
                        }
                    }


                    ?>






                </div>
            </div>










            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>