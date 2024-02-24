<!-- client login api -->
<?php require('./clientApi/login.php');?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/ClientLogin.css?v=2">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
         // prevent reload post request
         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    window.document.title="SD CANTEEN | Client Login";
</script>
<body>
    <div class="admin">





    <!-- email template -->
<?php



?>





    <!-- header -->
    <?php require('./components/Header.php'); ?>




<div class="clientLogin">
<div class="form">
<h3>SD CANTEEN 
    
   </h3>


<form method="post" action="">
<li>
<h6>Enter Email/Mobile To Login</h6>
<input type="text" name="username" placeholder="Email / Mobile" value="<?php if(isset($username)){echo $username;}?>" autocomplete="off" autofocus required/>

<input type="text" name="ipAddress" placeholder="" autocomplete="off" autofocus required/value="<?php  $client_ip = $_SERVER['REMOTE_ADDR']; echo $client_ip;?>" style="display: none;">
<i class="fa-solid fa-at icon"></i>
</li>
<li>
<h6>Enter Password To Login</h6>
<input type="password" name="password" placeholder="Password"  value="<?php if(isset($password)){echo $password;}?>" autocomplete="off" required/>
<i class="fa-solid fa-lock icon"></i>
</li>
<p><a href="/ForgetPassword">Forget Password ?</a></p>

<button name="client_login">Login</button>

</form>
<div class="path">
<h4><a href="/sd-canteen/signup.php">Register New User?</a></h4>
<h4><a href="/sd-canteen/admin/adminlogin.php">Admin Login </a></h4>
</div>
</div>

<div class="image">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014242/login_ii8bvb.webp" alt="login image"  />

</div>

</div>
    </div>
    




    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>