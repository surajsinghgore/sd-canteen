<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/signup.css?v=3">
<link rel="stylesheet" href="./styles/admin/admin.css">

<?php 
if (!isset($_SESSION)) {
  session_start();
}
    // redirect page to signup
    if(isset($_SESSION['client_email_AccountTemp'])){
      
    }
else{

  header('Location: /sd-canteen/signup.php');
}

?>
<script>
    window.document.title="SD CANTEEN | Client Otp Verify ";
</script>
<body>
    <div class="admin">


    <!-- header -->
    <?php require('./components/Header.php'); 
    

    
    ?>




    <div class="clientLogin">
          <div class="form">
            <h3>SD CANTEEN</h3>
            <h2 style="text-align:center;margin-top:52px">
              Otp Successfully send to <span><?php if(isset($_SESSION['client_email_AccountTemp'])){ echo $_SESSION['client_email_AccountTemp'];}?></span>
            </h2>
            <form>
              <li style="margin-top:30px">
                <h6 >
                  Enter 6 Digit Otp send to Email Id <span>*</span>
                </h6>
                <input
                  type="number"
                  name="otp"
                  placeholder="Enter OTP"
                 
                  autoFocus
               
                />
                <svg class="icon" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 3h10v8h-3l-4 2v-2h-3z"></path><path d="M15 16v4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h2"></path><path d="M10 18v.01"></path></svg>
                
              </li>

            
                <button>
                  Verify User
                </button>
              
            </form>

            <div class="path" >
            
                <!-- <h4 style="padding-left:80px">Resend Otp Again</h4> -->
             
                  <h4>
                  New Otp request available in 5 minutes
                </h4> 
           

              <h4>
                <a href="/sd-canteen/signup.php">Wrong Email Id ?</a>
              </h4>
            </div>
          </div>
        </div>






    </div>
    




    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>