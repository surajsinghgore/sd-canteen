<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=1">
<link rel="stylesheet" href="../styles/admin/ItemCategory.css?v=13">
<script>
    window.document.title = "SD CANTEEN | Manage Coffee Category";
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
                    Are you sure to delete this coffee category ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No </button>
                    <button type="button" class="btn btn-primary" onclick="deleteCoffeeCategoryFromDB()">Yes Delete


                    </button>
                </div>
            </div>
        </div>
    </div>


    <?php

    if (isset($toast_status)) {

        if ($toast_status == 'true') {
            require('../components/Toast.php');
        }
    }

    ?>
    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "manage Coffee Category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewcoffeeItem.php";
            $pathNavigationParent = "Coffee";
            $pathNavigationChild = "Manage Coffee Category";
            require('../components/PathNavigation.php'); ?>





            <div class="ListView">
                <div class="addCategory">
                    <a href="/sd-canteen/admin/addcoffeecategory.php">
                        <button>
                            <i class="fa-solid fa-plus"></i>
                            Add New Coffee Category
                        </button>
                    </a>
                </div>
                <div class="Subtop">
                    <div class="showData">
                        Show Data
                        <input type="number" name="sort" id="totalcategorysize" readonly />
                    </div>
                    <div class="searchBar">
                        <input type="search" name="searchdata" id="coffeeCategoryNameSearch" onkeyup="searchByName()" placeholder="Search ..." />
                    </div>
                </div>
                <div class="ListData">
                    <div class="Heading">
                        <li>Coffee Categories Name</li>
                        <li>Action</li>
                    </div>




                    <!-- fetching food category data -->
                    <div class="mainData" id="mainData">


                        <?php
                        //  established connection
                        require('../middleware/ConnectToDatabase.php');
                        $sql_query = "select * from coffeecategories";
                        $resFoodCategory = mysqli_query($connection, $sql_query);
                        $length = mysqli_num_rows($resFoodCategory);
                        if ($length == 0) {
                            echo "<h5 class='noItemFound'>No Coffee Category Found</h5>";
                        } else {
                            while ($FoodCategory = mysqli_fetch_array($resFoodCategory)) { ?>
                                <div class="DataLists" id="parent<?php echo $FoodCategory['id']; ?>">

                                    <div class="DataList">
                                        <li><?php echo $FoodCategory['coffeecategoryname']; ?></li>

                                        <li id="menuIcons<?php echo $FoodCategory['id']; ?>" onclick='enableOptions("<?php echo $FoodCategory['id']; ?>")'><i class="fa-solid fa-bars cursor_icon"></i></li>


                                    </div>

                                    <div class="DropDown" id="dropdownmenu<?php echo $FoodCategory['id']; ?>" style="display:none;">
                                        <li class="Update" onclick='updateFoodCategory("<?php echo $FoodCategory['id']; ?>")'>
                                            <i class="fa-solid fa-pen-to-square"></i>Update
                                        </li>

                                        <li class="delete" data-toggle="modal" data-target="#exampleModal" onclick='deleteFoodCategory("<?php echo $FoodCategory['id']; ?>")'>
                                            <i class="fa-solid fa-trash"></i>Delete
                                        </li>
                                    </div>
                                </div>

                        <?php
                            }
                        }

                        ?>
                    </div>










                </div>
            </div>

        </div>

    </div>


    <script>
        document.getElementById('totalcategorysize').value = document.getElementsByClassName('DataLists').length;


        // update food category
        function updateFoodCategory(id) {

            sessionStorage.setItem('updatecoffeeitemid', id);
            window.location.href = "http://localhost/sd-canteen/admin/updatefoodcategory.php";
        }

        // enable dropdown menu btn
        function enableOptions(id) {
            let dropdownmenu = 'dropdownmenu' + id;
            let menuIcon = 'menuIcons' + id;

            if (document.getElementById(dropdownmenu).style.display == "block") {
                document.getElementById(dropdownmenu).style.display = "none";
                document.getElementById(menuIcon).innerHTML = "<i class='fa-solid fa-bars cursor_icon'></i>";

            } else {

                document.getElementById(dropdownmenu).style.display = "block";

                document.getElementById(menuIcon).innerHTML = "<i class='fa-regular fa-rectangle-xmark'></i>";

            }



        }



        function searchByName() {

            let searchInput = document.getElementById('coffeeCategoryNameSearch').value;

            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/searchcoffeecategorybyname.php", //your page
                data: {
                    coffeecategoryname: searchInput,

                }, // passing the values
                success: function(res) {
                    document.getElementById('mainData').innerHTML = res;
                    document.getElementById('totalcategorysize').value = document.getElementsByClassName('DataLists').length;
                }
            });



        }

        // delete food category

        function deleteFoodCategory(id) {
            sessionStorage.setItem('updatecoffeeitemid', id);
        }


        // delete food item api
        const deleteCoffeeCategoryFromDB = () => {
            let foodId = sessionStorage.getItem('updatecoffeeitemid');
            $.ajax({
                type: "POST",
                url: "http://localhost/sd-canteen/api/deletefoodcategory.php",
                data: {
                    foodcategoryid: foodId

                }, // passing the values
                success: function(res) {
                    sessionStorage.removeItem('updatecoffeeitemid');
                    window.location.reload();
                }
            });
        }
    </script>

    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>