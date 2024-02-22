<!-- add category api -->
<?php require('../api/updatefoodcategory.php'); ?>

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
    window.document.title = "SD CANTEEN | Update Food Category";

    // getting food id
    if (!sessionStorage.getItem('updatefooditemid')) {
        window.location.href = "http://localhost/sd-canteen/admin/ManageFoodCategory.php";

    }
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Update food category";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/ManageFoodCategory.php";
            $pathNavigationParent = "Foods/ Manage Food Categories  ";
            $pathNavigationChild = "Update food category";
            require('../components/PathNavigation.php'); ?>




            <div class="Form" style="width:1230px;margin-top:-5%">
                <form action="" method="POST">

                    <div class="heading">
                        <h1>
                            <?php echo "<script>sessionStorage.getItem('updatefooditemid')</script>"; ?>
                            Update Food Categories List For Food
                            Website
                        </h1>
                    </div>
                    <div class="form_element">

                        <li>
                            <p>
                                Enter New Food Category Name <span>*</span>
                            </p>
                            <input type="Number" name="foodcategoryid" id="foodcategoryid" style="display:none"/>
                            <input type="text" name="foodcategoryupdatename" style="width:1130px;height:55px"  autofocus  id="foodcategoryupdatename" required>
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
        let categoryId = sessionStorage.getItem('updatefooditemid')
        document.getElementById('foodcategoryid').value=categoryId;

        $.ajax({
            type: "POST", //type of method
            url: "http://localhost/sd-canteen/api/searchfoodcategorybyname.php", //your page
            data: {
                foodcategoryid: categoryId,

            }, // passing the values
            success: function(res) {
               document.getElementById('foodcategoryupdatename').value=res;
            }
        });
    </script>
   
</body>

</html>