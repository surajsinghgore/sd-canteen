
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Category";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin">




    



  
    
        </div>

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>