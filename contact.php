<?php 

require('./clientApi/contact.php');

if (!isset($_SESSION)) {
    session_start();
}
require('./middleware/VerifyClientLogin.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/contact.css?v=3">
<link rel="stylesheet" href="./styles/client/fooditem.css?v=3">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Contact";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>
        <div class="admin">

<!-- banner -->

    

<div class="Status">
      <div class="banner">
        <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014251/contactbanner_ujd9dh.jpg" alt="banner"  />
      </div>
  
      
  
          <div class="pathContact">
            <h1>Menu</h1>

            <p>
              <a href="/sd-canteen">Home </a>
            - Contact - 
              <span>Page</span>
            </p>
          </div>
     





        
      </div>




      </div>
      <!-- contact Icons -->

      <div class="contactIcons">
<li>
<div class="Icon">
<div class="Div">
<div class="StyleImg">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/shape_rftir3.png" alt="shape" layout="fill"></div>
</div>

<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 12 16" class="Contact_icons__aAYQZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 0C2.69 0 0 2.5 0 5.5 0 10.02 6 16 6 16s6-5.98 6-10.5C12 2.5 9.31 0 6 0zm0 14.55C4.14 12.52 1 8.44 1 5.5 1 3.02 3.25 1 6 1c1.34 0 2.61.48 3.56 1.36.92.86 1.44 1.97 1.44 3.14 0 2.94-3.14 7.02-5 9.05zM8 5.5c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
</div>
<div class="deatils">
<h3>ggdsd sector 32-C chandigarh
</h3>
</div>
</li>


<li>
<div class="Icon">
<div class="Div">
<div class="StyleImg">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/shape_rftir3.png" alt="shape" layout="fill"/></div></div>

<svg class="icons" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="Contact_icons__aAYQZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
</div>
<div class="deatils">
<p>+0172 491 2400
</p>
</div>
</li>
<li>
<div class="Icon">
<div class="Div">
<div class="StyleImg">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/shape_rftir3.png" alt="shape" layout="fill"/></div></div>

<svg class="icons" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="Contact_icons__aAYQZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path></svg>
</div>
<div class="deatils">
<p >info@ggdsd.ac.in
</p>
</div>
</li>

<li>
<div class="Icon">
<div class="Div">
<div class="StyleImg">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/shape_rftir3.png" alt="shape" layout="fill"/></div></div>

<svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="Contact_icons__aAYQZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M480 160V77.25a32 32 0 0 0-9.38-22.63L425.37 9.37A32 32 0 0 0 402.75 0H160a32 32 0 0 0-32 32v448a32 32 0 0 0 32 32h320a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32zM288 432a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm128 128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-112H192V64h160v48a16 16 0 0 0 16 16h48zM64 128H32a32 32 0 0 0-32 32v320a32 32 0 0 0 32 32h32a32 32 0 0 0 32-32V160a32 32 0 0 0-32-32z"></path></svg>
</div>
<div class="deatils">
<p >+91-172-2661077
</p>
</div>
</li>
</div>


<div class="curli_line">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014246/line-cauve_mipnzr.png " alt="shape" layout="fill"/>
</div>



<div class="form">
<div class="left">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1395.880377230655!2d76.77054255924733!3d30.703901985301545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed8c1f11d227%3A0x70bd95668a9bd51f!2sNescafe%20Cafe%20SD%20College!5e1!3m2!1sen!2sin!4v1660984992813!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="right">
<h3>GET IN TOUCH</h3>
<h2>Send Us Message</h2>
<p>Please provide your details below so that we get in touch.</p>
<form  action="" method="post">
<input type="text" name="Full Name" placeholder="Full Name" class="Names" value="<?php if(isset($_SESSION['activeClientFullname'])){echo $_SESSION['activeClientFullname'];}?>" readOnly/>

<input type="email" name="Email" placeholder="Email Id" class="Email" value="<?php if(isset($_SESSION['activeClientEmail'])){echo $_SESSION['activeClientEmail'];}?>"/>

<input type="number" name="Mobile" placeholder="Mobile Number" value="<?php if(isset($_SESSION['activeClientMobile'])){echo $_SESSION['activeClientMobile'];}?>" class="Number" readOnly/>

<textarea name="Message" class="Message" placeholder="Your Message" required></textarea>
<button name="user_contact_message">SUBMIT NOW</button>
</form>
</div>
</div>  


    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>