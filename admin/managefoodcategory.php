<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=1">
<link rel="stylesheet" href="../styles/admin/ItemCategory.css?v=9">
<script>
    window.document.title = "Manage Food Category";
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
            <?php $AdminTopHeaderTitle="manage Food Category";require('../components/AdminTopHeader.php'); ?>
   <!-- path navigation -->
   <?php $pathNavigationParentPath = "/sd-canteen/admin/viewfoodItem.php";
            $pathNavigationParent = "Foods";
            $pathNavigationChild = "Manage Food Category";
            require('../components/PathNavigation.php'); ?>





<div class="ListView">
          <div class="addCategory">
            <a href="admin/AddFoodCategory">
              <button>
              <i class="fa-solid fa-plus"></i>
                Add New Food Category
              </button>
            </a>
          </div>
          <div class="Subtop">
            <div class="showData">
              Show Data
              <input
                type="number"
                name="sort"
             
              />
            </div>
            <div class="searchBar">
              <input
                type="search"
                name="searchdata"
                id="searchdata"
                placeholder="Search ..."
                
              />
            </div>
          </div>
          <div class="ListData">
            <div class="Heading">
              <li>Food Categories Name</li>
              <li>Action</li>
            </div>
          



            <div class="DataLists">  

<div class="DataList">
<li>noodle</li>

<li><i class="fa-solid fa-bars cursor_icon"></i></li>
<!--  -->
<!-- <li><i class="fa-regular fa-rectangle-xmark cursor_icon" ></i></li> -->

</div>

<div class="DropDown">
<li class="Update" ><i><FaRegEdit /> </i>Update</li>
<li class="delete"><i><AiOutlineDelete /></i> Delete</li>
</div>
</div>


               
          </div>
        </div>

        </div>

    </div>
</body>

</html>