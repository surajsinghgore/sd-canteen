<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/managecomments.css?v=2">
<script>
    window.document.title = "SD CANTEEN | MANAGE COMMENTS";
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
            <?php $AdminTopHeaderTitle="Manage Toxic Comments";require('../components/AdminTopHeader.php'); ?>


            <!-- manage comments -->
            <div class="mainComments">
   
     
            <div class="section">
   <h3>Number Of Reports : <span>2</span></h3>
     <div class="comment">
    TESTING COMMENTS
     </div>

     <div class="options">
     <div class="div1"> <button title="Really Toxic ?">Toxic</button>  </div>
     <div class="div2">
   <button  title="Really Not Toxic ">Not Toxic</button>
     </div>
     </div>
     </div>
  
   <!-- <h1>No Comments Reported Yet</h1> -->
   


     </div>

        </div>

    </div>
</body>

</html>