<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script>
    window.document.title = "Admin Panel";
</script>

<body>

    <?php
    // verify admin login
    require('../middleware/VerifyAdminLogin.php');
    require('../modules/TopLoader.php');
    if(isset($toast_status)){

        if ($toast_status == 'true') {
            require('../components/Toast.php');
        }
    }
    

    ?>
</body>

</html>