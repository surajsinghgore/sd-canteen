<!-- include add to food API -->
<?php require('../api/AddDrinkItem.php'); ?>



<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css?v=5">
<script>
    window.document.title = "SD CANTEEN | Add Drink Item";
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
            <?php $AdminTopHeaderTitle = "Add Drink Page";
            require('../components/AdminTopHeader.php'); ?>



            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewdrinkItem.php";
            $pathNavigationParent = "Drink";
            $pathNavigationChild = "add drink item";
            require('../components/PathNavigation.php'); ?>

            <div class="FoodPage">

                <div class="Form" style="margin-top:-8%">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="heading">
                            <h1>
                                Enter New DrinkItem Item For Website
                            </h1>
                        </div>
                        <div class="form_element">
                            <li>
                                <p>
                                    Enter Drink Name <span>*</span>
                                </p>
                                <input type="text" name="DrinkName" value="<?php if (isset($DrinkName)) {
                                                                                echo $DrinkName;
                                                                            } ?>"
                                                                            autofocus required>
                            </li>

                            <li>
                                <p>
                                    Enter Drink Qty
                                </p>
                                <input type="Number" name="DrinkQty" value="1" required>
                            </li>

                            <li class="selects">
                                <p>
                                    Enter Drink Category <span>*</span>
                                </p>
                                <select name="DrinkCategory">


                                    <option value="no">Select drink category</option>


                                    <!-- load category name -->
                                    <?php

                                    require('../middleware/ConnectToDatabase.php');
                                    $sql_query = "select * from drinkcategories";
                                    $resFoodItem = mysqli_query($connection, $sql_query);

                                    $length = mysqli_num_rows($resFoodItem);

                                    if ($length == 0) {
                                        echo "<h6>No Item Found</h6>";
                                    } else {
                                        while ($dataSearch = mysqli_fetch_array($resFoodItem)) {
                                            echo "<option>";
                                            echo $dataSearch['drinkcategoryname'];
                                            echo "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </li>


                            <li class="Prices">
                                <h6>
                                    Enter Price <span>*</span>
                                </h6>
                                <p>
                                    <input type="text" name="normalPriceName" class="priceHeading" value="Normal Size Price" readonly>
                                    <input type="Number" name="normalPrice" class="prices" value="<?php if (isset($normalPrice)) {
                                                                                                        echo $normalPrice;
                                                                                                    } ?>">
                                </p>
                                <h4>Or</h4>
                                <p>
                                    <input type="text" name="smallPriceName" class="priceHeading" value="Small Size Price" readonly>
                                    <input type="Number" name="smallPrice" class="prices" value="<?php if (isset($smallPrice)) {
                                                                                                        echo $smallPrice;
                                                                                                    } ?>">
                                </p>

                                <p>
                                    <input type="text" name="mediumPriceName" class="priceHeading" value="Medium Size Price" readonly>
                                    <input type="Number" name="mediumPrice" class="prices" value="<?php if (isset($mediumPrice)) {
                                                                                                        echo $mediumPrice;
                                                                                                    } ?>">
                                </p>

                                <p>
                                    <input type="text" name="largePriceName" class="priceHeading" value="Large Size Price" readonly>
                                    <input type="Number" name="largePrice" class="prices" value="<?php if (isset($largePrice)) {
                                                                                                        echo $largePrice;
                                                                                                    } ?>">
                                </p>
                            </li>


                            <li class="description">
                                <p>
                                    Enter Description Category<span>*</span>
                                </p>
                                <textarea value="description" name="description" required><?php if (isset($description)) {
                                                                                                echo $description;
                                                                                            } ?></textarea>
                            </li>
                            <li>
                                <p> Upload Drink Photo <span>*</span>
                                </p>
                                <input type="file" name="DrinkImage" id="CoffeeImage" onchange="loadFile(event)">
                            </li>
                            <li>
                                <p>Photo Realtime Preview</p>
                                <div class="preview_photo">

                                    <img alt="Drink images" id="CoffeeImagePreview" layout="fill" />


                                </div>
                            </li>

                            <li class="btns">
                                <p>Product Visibility Status </p>
                                <label class="switch">

                                    <input type='checkbox' name='orderStatus' checked>



                                    <span class="slider round"></span>

                                </label>
                            </li>
                            <button name="SendDrinkItem">
                                ADD Drink
                            </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>

    </div>

    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('CoffeeImagePreview').style.display = "block";
                var preview = document.getElementById('CoffeeImagePreview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);

        };
    </script>
</body>

</html>