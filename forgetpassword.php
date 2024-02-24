<!-- client login api -->
<!-- <?php require('./clientApi/login.php');?> -->


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/forgetpassword.css?v=2">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
         // prevent reload post request
         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    window.document.title="SD CANTEEN | Forget Password";
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
<form>
<div class="email">
<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="Forget_icons__Xht19" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-40 110.8V792H136V270.8l-27.6-21.5 39.3-50.5 42.8 33.3h643.1l42.8-33.3 39.3 50.5-27.7 21.5zM833.6 232L512 482 190.4 232l-42.8-33.3-39.3 50.5 27.6 21.5 341.6 265.6a55.99 55.99 0 0 0 68.7 0L888 270.8l27.6-21.5-39.3-50.5-42.7 33.2z"></path></svg>
<!-- after otp send -->
<!-- <input type="email" readOnly />: -->
<input type="email" placeholder="Enter Email Id to Reset Password" autofocus required> 
</div>


<button>Send Otp</button>
</form>
</div>

<!-- after otp send -->

<div class="otp">
<div class="email">
<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Forget_icons__Xht19" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"></path><path d="m17.207 7.207-1.414-1.414L11 10.586 8.707 8.293 7.293 9.707 11 13.414z"></path></svg>
<input type="Number" placeholder="Enter 6 Digit Otp send to email id"  autofocus required>
</div>
</div>

<div class="pass">
<form>
<div class="email">
<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Forget_icons__Xht19" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"></path></g></svg>

<input type="password"  placeholder="Enter New Password" autocomplete="off"/>

</div>
<div class="email">
<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Forget_icons__Xht19" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"></path></g></svg>
<input type="password" placeholder="Re-Enter Confirm Password"/>

</div>

<button >Change Password</button>
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