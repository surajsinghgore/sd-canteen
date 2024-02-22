<?php

require('../middleware/ConnectToDatabase.php');
// delete food item page
if (isset($_REQUEST['deletepage'])) {
    $foodname = $_REQUEST['foodname'];

    $sql_query = "select * from fooditems where foodname like '%$foodname%'";
    $resFoodItem = mysqli_query($connection, $sql_query);

    $length = mysqli_num_rows($resFoodItem);

    if ($length == 0) {
        echo "<h6>No Item Found</h6>";
    } else {
        while ($dataSearch = mysqli_fetch_array($resFoodItem)) { ?>
            <div class="dataCard" id="resultData">
                <li class="Image_Section">
                    <img src="<?php echo $dataSearch['imagepath'] ?>" alt="item.Image">
                </li>

                <li class="Item_Name">
                    <p><?php echo $dataSearch['foodname'] ?></p>
                </li>





                <li class="<?php if ($dataSearch['normalprice'] > 0) {
                                echo "Item_Price_Normal";
                            } else {

                                echo "Item_Price";
                            }
                            ?>">

                    <!-- data -->
                    <?php if ($dataSearch['normalprice'] > 0) {
                        echo "<p><b>Normal Size: </b>";
                        echo $dataSearch['normalprice'];
                        echo "</p>";
                    } else {

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
                    <p><?php echo $dataSearch['category'] ?></p>
                </li>

                <li class='Item_Qty'>


                    <p class='updateBtn' title='Click To Delete' data-toggle="modal" data-target="#exampleModal" onclick="deleteItem('<?php echo $dataSearch['id']; ?>')"><i class='fa-solid fa-trash'></i>
                    </p>
                </li>

                <!--  -->


            </div>

        <?php
        }
    }
}
// search by Id
else if (isset($_REQUEST['foodId'])) {
    $FoodId = $_REQUEST['foodId'];


    $sql_query = "select * from fooditems where id=$FoodId";

    $resFoodData = mysqli_query($connection, $sql_query);


    $length = mysqli_num_rows($resFoodData);

    if ($length == 0) {
        echo "<script>sessionStorage.removeItem('updatefooditemid')</script>";
        header('Location: /sd-canteen/admin/ManageFoodCategory.php');
    } else {
        $data = "";
        while ($FoodData = mysqli_fetch_array($resFoodData)) {
            $foodname = $FoodData['foodname'];
            $qty = $FoodData['qty'];
            $category = $FoodData['category'];
            $active = $FoodData['active'];
            $normalprice = $FoodData['normalprice'];
            $smallprice = $FoodData['smallprice'];
            $mediumprice = $FoodData['mediumprice'];
            $largeprice = $FoodData['largeprice'];
            $description = trim(str_replace(PHP_EOL, ' ', $FoodData['description']));;
            $imagepath = $FoodData['imagepath'];


            $data = "{\"foodname\":\"$foodname\",\"qty\":$qty,\"category\":\"$category\",\"active\":\"$active\",\"normalprice\":$normalprice,\"smallprice\":$smallprice,\"mediumprice\":$mediumprice,\"largeprice\":$largeprice,\"description\":\"$description\",\"imagepath\":\"$imagepath\"}";
            echo $data;
        }
    }

    // update Page data
} else if (isset($_REQUEST['updatepage'])) {

    $foodname = $_REQUEST['foodname'];

    $sql_query = "select * from fooditems where foodname like '%$foodname%'";
    $resFoodItem = mysqli_query($connection, $sql_query);

    $length = mysqli_num_rows($resFoodItem);

    if ($length == 0) {
        echo "<h6>No Item Found</h6>";
    } else {
        while ($dataSearch = mysqli_fetch_array($resFoodItem)) { ?>
            <div class="dataCard" id="resultData">
                <li class="Image_Section">
                    <img src="<?php echo $dataSearch['imagepath'] ?>" alt="item.Image">
                </li>

                <li class="Item_Name">
                    <p><?php echo $dataSearch['foodname'] ?></p>
                </li>





                <li class="<?php if ($dataSearch['normalprice'] > 0) {
                                echo "Item_Price_Normal";
                            } else {

                                echo "Item_Price";
                            }
                            ?>">

                    <!-- data -->
                    <?php if ($dataSearch['normalprice'] > 0) {
                        echo "<p><b>Normal Size: </b>";
                        echo $dataSearch['normalprice'];
                        echo "</p>";
                    } else {

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
                    <p><?php echo $dataSearch['category'] ?></p>
                </li>

                <li class='Item_Qty'>


                    <p class='updateBtn' title='Click To Update' onclick="updateItem('<?php echo $dataSearch['id']; ?>')"><i class='fa-regular fa-pen-to-square'></i>
                    </p>
                </li>

                <!--  -->


            </div>

        <?php
        }
    }
}
// view food item page
else {


    $foodname = $_REQUEST['foodname'];

    $sql_query = "select * from fooditems where foodname like '%$foodname%'";
    $resFoodItem = mysqli_query($connection, $sql_query);

    $length = mysqli_num_rows($resFoodItem);

    if ($length == 0) {
        echo "<h6>No Item Found</h6>";
    } else {
        while ($dataSearch = mysqli_fetch_array($resFoodItem)) { ?>
            <div class="dataCard" id="resultData">
                <li class="Image_Section">
                    <img src="<?php echo $dataSearch['imagepath'] ?>" alt="item.Image">
                </li>

                <li class="Item_Name">
                    <p><?php echo $dataSearch['foodname'] ?></p>
                </li>





                <li class="<?php if ($dataSearch['normalprice'] > 0) {
                                echo "Item_Price_Normal";
                            } else {

                                echo "Item_Price";
                            }
                            ?>">

                    <!-- data -->
                    <?php if ($dataSearch['normalprice'] > 0) {
                        echo "<p><b>Normal Size: </b>";
                        echo $dataSearch['normalprice'];
                        echo "</p>";
                    } else {

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


                <li class="Item_Qty">
                    <p><?php echo $dataSearch['qty'] ?></p>
                </li>

                <li class="Item_Visibilty">
                    <?php if ($dataSearch['active'] == "on") {
                        echo " <div class=\"ON\">on</div>";
                    } else {
                        echo " <div class=\"OFF\">off</div>";
                    } ?>
                </li>




                <li class="Item_Category">
                    <p><?php echo $dataSearch['category'] ?></p>
                </li>

            </div>

<?php
        }
    }
}
?>