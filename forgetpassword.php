<!-- forget password api -->
<?php require('./clientApi/forgetpassword.php'); ?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/forgetpassword.css?v=3">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Forget Password";
</script>

<body>
    <div class="admin">





        <!-- email template -->
        <?php



        ?>





        <!-- header -->
        <?php require('./components/Header.php');


        ?>




        <div class="forget">

            <div class="form">
                <div class="top">
                    <h1>Forget Password</h1>
                </div>



                <div class="emailSection">
                    <form method="post" action="">
                        <div class="email">
                            <svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="Forget_icons__Xht19" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-40 110.8V792H136V270.8l-27.6-21.5 39.3-50.5 42.8 33.3h643.1l42.8-33.3 39.3 50.5-27.7 21.5zM833.6 232L512 482 190.4 232l-42.8-33.3-39.3 50.5 27.6 21.5 341.6 265.6a55.99 55.99 0 0 0 68.7 0L888 270.8l27.6-21.5-39.3-50.5-42.7 33.2z"></path>
                            </svg>

                            <input type="email" name="email" placeholder="Enter Email Id to Reset Password" value="<?php if(isset($email)){echo $email;}?>" autofocus required>
                        </div>


                        <button name="forget_password">Send Otp</button>
                    </form>
                </div>





            </div>

        </div>



    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>