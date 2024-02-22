<!-- add category api -->
<?php require('../api/updatecoffeecategory.php'); ?>

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
    window.document.title = "SD CANTEEN | Update Coffee Category";

    // getting food id
    if (!sessionStorage.getItem('updatecoffeeitemid')) {
        window.location.href = "http://localhost/sd-canteen/admin/ManageCoffeeCategory.php";

    }
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Update coffee category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/ManageCoffeeCategory.php";
            $pathNavigationParent = "Coffee/ Manage Coffee Category";
            $pathNavigationChild = "Update Coffee category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="width:1230px;margin-top:-5%">
                <form action="" method="POST">

                    <div class="heading">
                        <h1>
                            <?php echo "<script>sessionStorage.getItem('updatecoffeeitemid')</script>"; ?>
                            Update Coffee Categories List For Coffee
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter New Coffee Category Name <span>*</span>
                            </p>
                            <input type="Number" name="coffeecategoryid" id="updatecoffeeitemid" style="display:none"/>
                            <input type="text" name="coffeecategoryupdatename" style="width:1130px;height:55px"  id="foodcategoryupdatename" required>
                        </li>
                        <button id="categoryBtn" name="update_food_category">

                            UPDATE CATEGORY
                        </button>

                    </div>
                </form>
            </div>









        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let categoryId = sessionStorage.getItem('updatecoffeeitemid')
        document.getElementById('updatecoffeeitemid').value=categoryId;

        $.ajax({
            type: "POST", //type of method
            url: "http://localhost/sd-canteen/api/searchcoffeecategorybyname.php", //your page
            data: {
                coffeecategoryid: categoryId,

            }, // passing the values
            success: function(res) {
               document.getElementById('foodcategoryupdatename').value=res;
            }
        });
    </script>
   
</body>

</html>