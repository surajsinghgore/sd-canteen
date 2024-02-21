<?php
require('../middleware/ConnectToDatabase.php');
// delete food item page
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
                    <li class="Update"><i>
                            <FaRegEdit />
                        </i>Update</li>
                    <li class="delete"><i>
                            <AiOutlineDelete />
                        </i> Delete</li>
                </div>
            </div>
<?php
        }
    }
}


?>