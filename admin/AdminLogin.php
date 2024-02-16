<!DOCTYPE html>
<html lang="en">
<?php require('../modules/HeadTag.php'); ?>

<body>

    <?php
    $status = "alert-warning";
    $title = "WARNING";

    $message = "Please Enter Name";
    require('../components/Toast.php');
    // env file setup
    $env = parse_ini_file('../.env');
    $header = $env["ADMIN_PASSWORD"];
    echo "$header";
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
                <form autocomplete="new-password">
                    <input type="text" name="secret" placeholder="Enter Secret Id" required autocomplete="new-password" autoFocus />
                    <input type="password" name="password" placeholder="Enter Password" required autocomplete="new-password" />
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