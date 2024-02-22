<!-- add category api -->
<?php require('../api/updatedrinkcategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">

<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Update Drink Category";

    // getting food id
    if (!sessionStorage.getItem('updatedrinkitemid')) {
        window.location.href = "http://localhost/sd-canteen/admin/ManageDrinkCategory.php";

    }
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Update drink category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/ManagedrinkCategory.php";
            $pathNavigationParent = "Drinks / Manage Drinks Category";
            $pathNavigationChild = "Update Drink category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="width:1230px;margin-top:-5%">
                <form action="" method="POST">

                    <div class="heading">
                        <h1>
                            
                            Update Drink Categories List For Drink
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter New Drink Category Name <span>*</span>
                            </p>
                            <input type="Number" name="drinkcategoryid" id="updatedrinkitemid" style="display:none" />
                            <input type="text" name="drinkcategoryupdatename" style="width:1130px;height:55px" id="drinkcategoryupdatename" required>
                        </li>
                        <button id="categoryBtn" name="update_drink_category">

                            UPDATE CATEGORY
                        </button>

                    </div>
                </form>
            </div>









        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let categoryId = sessionStorage.getItem('updatedrinkitemid')
        document.getElementById('updatedrinkitemid').value = categoryId;

        $.ajax({
            type: "POST", //type of method
            url: "http://localhost/sd-canteen/api/searchdrinkcategorybyname.php", //your page
            data: {
                drinkcategoryid: categoryId,

            }, // passing the values
            success: function(res) {
                document.getElementById('drinkcategoryupdatename').value = res;
            }
        });
    </script>

</body>

</html>