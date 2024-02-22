<?php
require('../middleware/ConnectToDatabase.php');
// search by food  name
if (isset($_REQUEST['foodcategoryname'])) {

    $foodcategoryname = $_REQUEST['foodcategoryname'];

    $sql_query = "select * from foodcategories where foodcategoryname like '%$foodcategoryname%'";

    $resFoodCategory = mysqli_query($connection, $sql_query);


    $length = mysqli_num_rows($resFoodCategory);

    if ($length == 0) {
        echo "<h6>No Item Found</h6>";
    } else {

        while ($FoodCategory = mysqli_fetch_array($resFoodCategory)) { ?>


            <div class="DataLists" id="parent<?php echo $FoodCategory['id']; ?>">

                <div class="DataList">
                    <li><?php echo $FoodCategory['foodcategoryname']; ?></li>

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
}

// search by food category id

if (isset($_REQUEST['foodcategoryid'])) {

    $foodcategoryid = $_REQUEST['foodcategoryid'];

    $sql_query = "select * from foodcategories where id=$foodcategoryid";

    $resFoodCategory = mysqli_query($connection, $sql_query);


    $length = mysqli_num_rows($resFoodCategory);

    if ($length == 0) {
        echo "<script>sessionStorage.removeItem('updatefooditemid')</script>";
        header('Location: /sd-canteen/admin/ManageFoodCategory.php');

    } else {
$foodcategoryname="";
        while ($FoodCategory = mysqli_fetch_array($resFoodCategory)) { 
                     $foodcategoryname=$FoodCategory['foodcategoryname']; 
        }
        echo $foodcategoryname;
    }
}
?>