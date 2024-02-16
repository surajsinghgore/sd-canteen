<!-- handle admin login -->
<?php require('../api/AdminLogin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php require('../modules/HeadTag.php'); ?>
<link rel="shortcut icon" href="../favicon.png" type="image/x-icon">

<body>


    <?php
    
    if ($warning_error == 'true') {
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
                    <button onClick="LoginFunction">Click to login</button>

                    <a href="/">
                        <h6>Click Here To Main Website</h6>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <?php require('../modules/BootstrapJSCDN.php'); ?>

</body>

</html>