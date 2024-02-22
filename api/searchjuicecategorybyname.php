<?php
require('../middleware/ConnectToDatabase.php');
// search by food  name
if (isset($_REQUEST['juicecategoryname'])) {

    $coffeecategoryname = $_REQUEST['juicecategoryname'];

    $sql_query = "select * from juicecategories where juicecategoryname like '%$coffeecategoryname%'";

    $resCoffeeCategory = mysqli_query($connection, $sql_query);

    $length = mysqli_num_rows($resCoffeeCategory);

    if ($length == 0) {
        echo "<h6 style=\"padding-left:90px;padding-top:30px\">No Item Found</h6>";
    } else {

        while ($CoffeeCategory = mysqli_fetch_array($resCoffeeCategory)) { ?>


            <div class="DataLists" id="parent<?php echo $CoffeeCategory['id']; ?>">

                <div class="DataList">
                    <li><?php echo $CoffeeCategory['juicecategoryname']; ?></li>

                    <li id="menuIcons<?php echo $CoffeeCategory['id']; ?>" onclick='enableOptions("<?php echo $CoffeeCategory['id']; ?>")'><i class="fa-solid fa-bars cursor_icon"></i></li>


                </div>




                <div class="DropDown" id="dropdownmenu<?php echo $CoffeeCategory['id']; ?>" style="display:none;">
                    <li class="Update" onclick='updateJuiceCategory("<?php echo $CoffeeCategory['id']; ?>")'>
                        <i class="fa-solid fa-pen-to-square"></i>Update
                    </li>

                    <li class="delete" data-toggle="modal" data-target="#exampleModal" onclick='deleteJuiceCategory("<?php echo $CoffeeCategory['id']; ?>")'>
                        <i class="fa-solid fa-trash"></i>Delete
                    </li>
                </div>



            </div>
<?php
        }
    }
}

// search by coffee category id

if (isset($_REQUEST['juicecategoryid'])) {

    $coffeecategories = $_REQUEST['juicecategoryid'];

    $sql_query = "select * from juicecategories where id=$coffeecategories";

    $resCoffeeCategory = mysqli_query($connection, $sql_query);


    $length = mysqli_num_rows($resCoffeeCategory);

    if ($length == 0) {
        echo "<script>sessionStorage.removeItem('updatejuiceitemid')</script>";
        header('Location: /sd-canteen/admin/managejuicecategory.php');
    } else {
        $coffeecategoryname = "";
        while ($CoffeeCategory = mysqli_fetch_array($resCoffeeCategory)) {
            $coffeecategoryname = $CoffeeCategory['juicecategoryname'];
        }
        echo $coffeecategoryname;
    }
}
?>