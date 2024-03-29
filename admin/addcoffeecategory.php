<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=16">

<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Add Coffee Category";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "add coffee category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewcoffeeItem.php";
            $pathNavigationParent = "Coffee / Manage Coffee category";
            $pathNavigationChild = "add coffee category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="height:280px">
                <form action="" method="POST">
                    <div class="heading">
                        <h1>
                            Enter New Categories List For Coffee
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter Coffee Category Name <span>*</span>
                            </p>
                            <input type="text" name="coffeecategoryname"
                            autofocus
                            style="width:900px;height:45px" value="<?php if (isset($coffeecategoryname)) {
                                                                                                                        echo $coffeecategoryname;
                                                                                                                    } ?>" required>
                        </li>
                        <button id="categoryBtn" name="add_coffee_category">

                            ADD CATEGORY
                        </button>

                    </div>
                </form>
            </div>









        </div>

    </div>
</body>

</html>