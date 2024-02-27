<!-- handle admin login -->
<?php require('../api/AdminLogin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php require('../modules/HeadTag.php'); ?>
<link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
<link rel="stylesheet" href="../styles/admin/AdminLogin.css?v=2">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }

  
    window.document.title = "SD CANTEEN | Admin Login";

</script>

<body>


    <?php
 require('../middleware/DisabledPageOnAdminLogin.php');
 require('../modules/TopLoader.php');
    if ($toast_status == 'true') {
        require('../components/Toast.php');
    }

    ?>

    <div class="login">




        <div class="left_section">
            <div class="image">
                <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014333/loginImg_bcii95.svg" alt="login banner image" layout="fill" priority="true" />
            </div>
        </div>
        <div class="right_section">
            <div class="image">
                <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014332/loginProfile_gfungr.png" alt="login banner image" layout="fill" priority />
            </div>
            <h1>Sign in to Admin Panel</h1>
            <div class="form">

                <form method="post" action="" autocomplete="off">
                    <input type="text" name="secret" placeholder="Enter Secret Id" required autocomplete="off" value='<?php echo "$adminSecret"; ?>' autoFocus />
                    <input type="password" name="password" placeholder="Enter Password" required value='<?php echo "$adminPassword"; ?>' autocomplete="off" />
                    <button >Click to login</button>


                    <h6> <a href="/sd-canteen">Click Here To Main Website </a></h6>

                </form>
            </div>
        </div>
    </div>
    <?php require('../modules/BootstrapJSCDN.php'); ?>

</body>

</html>