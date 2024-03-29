<!-- add category api -->
<?php require('../api/AddFoodCategory.php');?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=16">

<script>
   window.document.title = "SD CANTEEN | Add Food Category";
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
      <?php $AdminTopHeaderTitle = "add food category";
      require('../components/AdminTopHeader.php'); ?>
      <!-- path navigation -->
      <?php $pathNavigationParentPath = "/sd-canteen/admin/viewfoodItem.php";
      $pathNavigationParent = "Foods/ Manage Food category";
      $pathNavigationChild = "add food category";
      require('../components/PathNavigation.php'); ?>




      <div class="Form" style="height:280px">
        <form action="" method="POST">
          <div class="heading">
            <h1>
              Enter New Categories List For Food
              Website
            </h1>
          </div>
          <div class="form_element">
           
            <li>
              <p>
                Enter Food Category Name <span>*</span>
              </p>
              <input type="text" name="foodcategoryname"       autofocus style="width:900px;height:45px" value="<?php if(isset($foodcategoryname)){echo $foodcategoryname;}?>" required>
            </li>
            <button id="categoryBtn" name="add_food_category">

              ADD CATEGORY
            </button>
          
          </div>
        </form>
      </div>









    </div>

  </div>
</body>

</html>