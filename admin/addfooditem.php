<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>

<link rel="stylesheet" href="../styles/admin/admin.css?v=3">
<script>
    window.document.title = "Add Food Item";
</script>

<body>

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
            <?php $AdminTopHeaderTitle = "Add Food Page";
            require('../components/AdminTopHeader.php'); ?>



<!-- path navigation -->
<?php $AdminTopHeaderTitle = "Add Food Page";
            require('../components/PathNavigation.php'); ?>

            <div class="FoodPage">
                <!-- <AdminRightInnerHeader
          title={
            pageStatus == "FoodItem"
              ? "Add Food Page"
              : pageStatus == "CoffeeItem"
              ? "Add Coffee Page"
              : pageStatus == "JuiceItem"
              ? "Add Juice Page"
              : "Add Drink Page"
          }
        /> -->

                <!-- <PathNavigate
          mainSection="Admin"
          mainSectionURL="/admin"
          subsection=""
          subsectionURL={
            pageStatus == "FoodItem"
              ? "/admin/ShowFoodItem"
              : pageStatus == "CoffeeItem"
              ? "/admin/ShowCoffeeItem"
              : pageStatus == "JuiceItem"
              ? "/admin/ShowJuiceItem"
              : "/admin/ShowDrinkItem"
          }
          current={
            pageStatus == "FoodItem"
              ? "ADD FOOD ITEM"
              : pageStatus == "CoffeeItem"
              ? "ADD COFFEE ITEM"
              : pageStatus == "JuiceItem"
              ? "ADD JUICE ITEM"
              : "ADD DRINK ITEM"
          }
        /> -->

               

                <div class="Form">
                    <div class="heading">
                        <h1>
                            Enter New FoodItem Item For Website
                        </h1>
                    </div>
                    <div class="form_element">
                        <li>
                            <p>
                                Enter FoodItem Name <span>*</span>
                            </p>
                            <input type="text" name="itemName">
                        </li>

                        <li>
                            <p>
                                Enter FoodItem Qty
                            </p>
                            <input type="text" name="itemQty">
                        </li>

                        <li class="selects">
                            <p>
                                Enter FoodItem Category <span>*</span>
                            </p>
                            <select name="itemCategory">                                                              

                                <option>
                                    item.FoodCategoryName

                                </option>


                            </select>
                        </li>


                        <li class="Pricess">
                                <h6>
                                    Enter Price <span>*</span>
                                </h6>
                                <p>
                                    <input type="text" name="normalPriceName" class="priceHeading" value="Normal Size Price" readonly>
                                    <input type="Number" name="itemQty" class="prices">
                                </p>
                                <h4>Or</h4>
                                <p>
                                    <input type="text" name="smallPriceName" class="priceHeading" value="Small Size Price" readonly >
                                    <input type="Number" name="itemQty" class="prices">
                                </p>

                                <p>
                                    <input type="text" name="mediumPriceName" class="priceHeading" value="Medium Size Price" readonly>
                                    <input type="Number" name="itemQty" class="prices" />
                                </p>

                                <p>
                                    <input type="text" name="largePriceName" class="priceHeading" value="Large Size Price" readonly >
                                    <input type="Number" name="itemQty" class="prices"  />
                                </p>
                        </li>


                        <li class="description">
                            <p>
                                Enter Description Category<span>*</span>
                            </p>
                            <textarea value="description" name="description"></textarea>
                        </li>
                        <li>
                            <p> Upload Food Photo <span>*</span>
                            </p>
                            <input type="file" name="photo" id="photoJuice" />
                        </li>
                        <li>
                            <p>Photo Realtime Preview</p>
                            <div class="preview_photo">

                                <div class="uploadImage">

                                    <img src="imgs" alt="item images" id="output" layout="fill" />
                                </div>

                            </div>
                        </li>

                        <li class="btns">
                            <p>Product Visibility Status </p>
                            <label class="switch">



                                <input type='checkbox' name='orderStatus' checked>



                                <span class="slider round"></span>

                            </label>
                        </li>
                        <button>
                            ADD FOOD
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>