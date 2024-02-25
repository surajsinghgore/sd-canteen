<!-- client login api -->
<?php
require('./middleware/VerifyClientLogin.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/ClientPanel.css?v=2">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Client Password change ";
</script>

<body>
    <div class="admin">







        <!-- header -->
        <?php require('./components/Header.php'); ?>




        <div class="clientPanel">





            <div class="top">
                <div class="headingTop">Password Details Manage</div>
            </div>

            <div class="forms">
                <li>
                    <div class="tt">Current Password</div>
                    <div class="dd">
                        <input type="password" placeholder="Enter current password" id="password" autocomplete="off" />
                    </div>
                </li>

                <li>
                    <div class="tt">New Password</div>
                    <div class="dd">
                        <input type="password" placeholder="Enter new password" id="password" autocomplete="off" />
                    </div>
                </li>

                <li>
                    <div class="tt">Re-enter new password </div>
                    <div class="dd">
                        <input type="password" placeholder="Enter again new password" id="password" autocomplete="off" />
                    </div>
                </li>
                <li>
                    <button onClick="passwordChange">Change Password</button>
                </li>
            </div>
        </div>





    </div>


    </div>















    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>