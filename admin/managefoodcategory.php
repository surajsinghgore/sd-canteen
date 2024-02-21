<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=1">
<link rel="stylesheet" href="../styles/admin/ItemCategory.css?v=13">
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
      <?php $AdminTopHeaderTitle = "manage Food Category";
      require('../components/AdminTopHeader.php'); ?>
      <!-- path navigation -->
      <?php $pathNavigationParentPath = "/sd-canteen/admin/viewfoodItem.php";
      $pathNavigationParent = "Foods";
      $pathNavigationChild = "Manage Food Category";
      require('../components/PathNavigation.php'); ?>





      <div class="ListView">
        <div class="addCategory">
          <a href="/sd-canteen/admin/addfoodcategory.php">
            <button>
              <i class="fa-solid fa-plus"></i>
              Add New Food Category
            </button>
          </a>
        </div>
        <div class="Subtop">
          <div class="showData">
            Show Data
            <input type="number" name="sort" />
          </div>
          <div class="searchBar">
            <input type="search" name="searchdata" id="searchdata" placeholder="Search ..." />
          </div>
        </div>
        <div class="ListData">
          <div class="Heading">
            <li>Food Categories Name</li>
            <li>Action</li>
          </div>




          <!-- fetching food category data -->

          <?php
          //  established connection
          require('../middleware/ConnectToDatabase.php');
          $sql_query = "select * from foodcategories";
          $resFoodCategory = mysqli_query($connection, $sql_query);
          $length = mysqli_num_rows($resFoodCategory);
          if ($length == 0) {
            echo "<h5 class='noItemFound'>No Food Category Found</h5>";
          } else {
            while ($FoodCategory = mysqli_fetch_array($resFoodCategory)) { ?>
              <div class="DataLists" id="parent<?php echo $FoodCategory['id']; ?>">

                <div class="DataList">
                  <li><?php echo $FoodCategory['foodcategoryname']; ?></li>

                  <li id="menuIcons<?php echo $FoodCategory['id']; ?>" onclick='enableOptions("<?php echo $FoodCategory['id']; ?>")'><i class="fa-solid fa-bars cursor_icon"></i></li>


                </div>

                <div class="DropDown" id="dropdownmenu<?php echo $FoodCategory['id']; ?>" style="display:none;">
                  <li class="Update"><i>
                      <FaRegEdit />
                    </i>Update</li>
                  <li class="delete"><i>
                      <AiOutlineDelete />
                    </i> Delete</li>
                </div>
              </div>

          <?php
            }
          }

          ?>











        </div>
      </div>

    </div>

  </div>

  <script>
    function enableOptions(id) {
      let dropdownmenu = 'dropdownmenu' + id;
      let menuIcon = 'menuIcons' + id;

      if (document.getElementById(dropdownmenu).style.display == "block") {
        document.getElementById(dropdownmenu).style.display = "none";
        document.getElementById(menuIcon).innerHTML = "<i class='fa-solid fa-bars cursor_icon'></i>";

      } else {

        document.getElementById(dropdownmenu).style.display = "block";

        document.getElementById(menuIcon).innerHTML = "<i class='fa-regular fa-rectangle-xmark'></i>";

      }



    }
  </script>
  <!-- <script>
    document.getElementById('dropdownmenu').style.display="none";
const enableOptions=(this)=>{
 
console.log(this)

  if(document.getElementById('dropdownmenu').style.display=="block"){
    document.getElementById('dropdownmenu').style.display="none";
  document.getElementById('menuIcons').innerHTML="<i class='fa-solid fa-bars cursor_icon'></i>";

  }else{

    document.getElementById('dropdownmenu').style.display="block";
  document.getElementById('menuIcons').innerHTML="<i class='fa-regular fa-rectangle-xmark'></i>";

  }
 

}
    
  </script> -->
</body>

</html>