<!-- add category api -->
<?php require('../api/AddJuiceCategory.php'); ?>

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
    window.document.title = "SD CANTEEN | Add Juice Category";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "add juice category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/viewjuiceItem.php";
            $pathNavigationParent = "Juices/ Manage Juice category";
            $pathNavigationChild = "add juice category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="height:280px">
                <form action="" method="POST">
                    <div class="heading">
                        <h1>
                            Enter New Categories List For Juice
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter Juice Category Name <span>*</span>
                            </p>
                            <input type="text" name="juicecategoryname"       autofocus style="width:1130px;height:55px" value="<?php if (isset($juicecategoryname)) {
                                                                                                                    echo $juicecategoryname;
                                                                                                                } ?>" required>
                        </li>
                        <button id="categoryBtn" name="add_juice_category">

                            ADD CATEGORY
                        </button>

                    </div>
                </form>
            </div>









        </div>

    </div>
</body>

</html>