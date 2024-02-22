<!-- add category api -->
<?php require('../api/AddDrinkCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">

<script>
    window.document.title = "SD CANTEEN | Add Drink Item";
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Add Drink Category";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "add drink category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewdrinkItem.php";
            $pathNavigationParent = "Drinks/ Manage Drink category";
            $pathNavigationChild = "add drink category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="width:1230px;margin-top:-5%">
                <form action="" method="POST">
                    <div class="heading">
                        <h1>
                            Enter New Categories List For Drink
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter Drink Category Name <span>*</span>
                            </p>
                            <input type="text" name="drinkcategoryname" style="width:1130px;height:55px" value="<?php if (isset($drinkcategoryname)) {
                                                                                                                        echo $drinkcategoryname;
                                                                                                                    } ?>" required>
                        </li>
                        <button id="categoryBtn" name="add_drink_category">

                            ADD CATEGORY
                        </button>

                    </div>
                </form>
            </div>









        </div>

    </div>
</body>

</html>