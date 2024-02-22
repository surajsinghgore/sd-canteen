<!-- include add to food API -->
<?php require('../api/updatedrinkitem.php'); ?>



<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css?v=5">
<script>
    window.document.title = "SD CANTEEN | Update Drink Item";
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }

    // getting food id
    if (!sessionStorage.getItem('updateDrinkItemId')) {
        window.location.href = "http://localhost/sd-canteen/admin/updatedrinkitem.php";

    }
</script>

<body>


    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Update Drink Page";
            require('../components/AdminTopHeader.php'); ?>



            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewdrinkItem.php";
            $pathNavigationParent = "Drinks";
            $pathNavigationChild = "Update Drink item";
            require('../components/PathNavigation.php'); ?>

            <div class="FoodPage">

                <div class="Form" style="margin-top:-8%">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="heading">
                            <h1>
                                Update New DrinkItem Item For Website
                            </h1>
                        </div>
                        <div class="form_element">
                            <li>
                                <p>
                                    Update DrinkItem Name <span>*</span>
                                </p>
<input type="number" name="FoodId"  id="foodId" style="display:none;">

                                <input type="text" name="DrinkName"  autofocus id="FoodName" value="<?php if (isset($DrinkName)) {
                                                                                            echo $DrinkName;
                                                                                        } ?>" required>
                            </li>

                            <li>
                                <p>
                                    Update Drink Qty
                                </p>
                                <input type="Number" name="DrinkQty" id="qty" value="1" required>
                            </li>

                            <li class="selects">
                                <p>
                                    Update Drink Category <span>*</span>
                                </p>
                                <select name="DrinkCategory" id="FoodCategory">

                                    <?php if (isset($DrinkCategory)) {
                                        if ($DrinkCategory == "no") {

                                            echo "<option value='no'>
                                            Select Coffee Category
                                        </option>";
                                        } else {

                                            echo "<option>
                                            $DrinkCategory
                                        </option>";
                                        }
                                    } else {
                                       


            
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
                                       

                                    }
                                    ?>





                                </select>
                            </li>


                            <li class="Prices">
                                <h6>
                                    Update Price <span>*</span>
                                </h6>
                                <p>
                                    <input type="text" name="normalPriceName" class="priceHeading" " value=" Normal Size Price" readonly>
                                    <input type="Number" name="normalPrice" id="normalPrice" class="prices" value="<?php if (isset($normalPrice)) {
                                                                                                                        echo $normalPrice;
                                                                                                                    } ?>">
                                </p>
                                <h4>Or</h4>
                                <p>
                                    <input type="text" name="smallPriceName" class="priceHeading" value="Small Size Price" readonly>
                                    <input type="Number" id="smallPrice" name="smallPrice" class="prices" value="<?php if (isset($smallPrice)) {
                                                                                                                        echo $smallPrice;
                                                                                                                    } ?>">
                                </p>

                                <p>
                                    <input type="text" name="mediumPriceName" class="priceHeading" value="Medium Size Price" readonly>
                                    <input type="Number" id="mediumPrice" name="mediumPrice" class="prices" value="<?php if (isset($mediumPrice)) {
                                                                                                                        echo $mediumPrice;
                                                                                                                    } ?>">
                                </p>

                                <p>
                                    <input type="text" name="largePriceName" class="priceHeading" value="Large Size Price" readonly>
                                    <input type="Number" id="largePrice" name="largePrice" class="prices" value="<?php if (isset($largePrice)) {
                                                                                                                        echo $largePrice;
                                                                                                                    } ?>">
                                </p>
                            </li>


                            <li class="description">
                                <p>
                                    Update Description Category<span>*</span>
                                </p>
                                <textarea value="description" id="description" name="description" required><?php if (isset($description)) {
                                                                                                                echo $description;
                                                                                                            } ?></textarea>
                            </li>
                            <li>
                                <p> Upload Drink Photo <span>*</span>
                                </p>
                                <input type="file" name="DrinkImage" id="FoodImageInput" onchange="loadFile(event)">
                            </li>
                            <li>
                                <p>Photo Realtime Preview</p>
                                <div class="preview_photo">

                                    <img alt="Drink images" id="FoodImagePreview" layout="fill" />


                                </div>
                            </li>

                            <li class="btns">
                                <p>Product Visibility Status </p>
                                <label class="switch">

                                    <input type='checkbox' name='orderStatus' id="visibiltyStatus" checked>



                                    <span class="slider round"></span>

                                </label>
                            </li>
                            <button name="update_drink_item">
                                UPDATE DRINK
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
                document.getElementById('FoodImagePreview').style.display = "block";
                var preview = document.getElementById('FoodImagePreview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);

        };
    </script>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        document.getElementById('FoodImagePreview').style.display = "block";
        let FoodId = sessionStorage.getItem('updateDrinkItemId');
document.getElementById('foodId').value=FoodId;
        $.ajax({
            type: "POST",
            url: "http://localhost/sd-canteen/api/searchDrinkItemByName.php",
            data: {
                foodId: FoodId,

            },
            success: function(res) {
                let data = JSON.parse(res);
                document.getElementById('FoodName').value = data.foodname;
                document.getElementById('qty').value = data.qty;
                document.getElementById('normalPrice').value = data.normalprice;
                document.getElementById('normalPrice').value = data.normalprice;
                document.getElementById('smallPrice').value = data.smallprice;
                document.getElementById('mediumPrice').value = data.mediumprice;
                document.getElementById('largePrice').value = data.largeprice;
                document.getElementById('description').value = data.description;
                document.getElementById('FoodImagePreview').src = data.imagepath;
                document.getElementById('FoodCategory').innerHTML += `<option selected>${data.category}</option>`;
                // order is off
                if (data.active == "off") {
                    document.getElementById('visibiltyStatus').checked = false

                }
                // order is on
                else {
                    document.getElementById('visibiltyStatus').checked = true;

                }

       

            }
        });
    </script>
</body>

</html>