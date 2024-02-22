<?php
// delete food item page
if (isset($_REQUEST['deletepage'])) {

    require('../middleware/ConnectToDatabase.php');
    $category = $_REQUEST['category'];
    $array = array();
    $sql_query = "select * from coffeeitems where category='$category'";
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
                    <p><?php echo $dataSearch['coffeename'] ?></p>
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


                    <p class='updateBtn' title='Click To Delete' data-toggle="modal" data-target="#exampleModal" onclick="deleteItem('<?php echo $dataSearch['id']; ?>')"> <i class='fa-solid fa-trash'></i>
                    </p>
                </li>




            </div>

        <?php
        }
    }
}
// update food page


else if (isset($_REQUEST['updatepage'])) {


    require('../middleware/ConnectToDatabase.php');
    $category = $_REQUEST['category'];
    $array = array();
    $sql_query = "select * from coffeeitems where category='$category'";
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
                    <p><?php echo $dataSearch['coffeename'] ?></p>
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


                    <p class='updateBtn' title='Click To Update' onclick="updateItem('<?php echo $dataSearch['id']; ?>')"> <i class='fa-regular fa-pen-to-square'></i>
                    </p>
                </li>




            </div>

        <?php
        }
    }
}


else {



    require('../middleware/ConnectToDatabase.php');
    $category = $_REQUEST['category'];
    $array = array();
    $sql_query = "select * from coffeeitems where category='$category'";
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
                    <p><?php echo $dataSearch['coffeename'] ?></p>
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