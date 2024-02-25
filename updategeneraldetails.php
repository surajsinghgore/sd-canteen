<!-- client login api -->
<?php 
     require('./middleware/VerifyClientLogin.php');
     require('./clientApi/updateclientgeneraldetails.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/ClientPanel.css?v=7">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
         // prevent reload post request
         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    window.document.title="SD CANTEEN | Update General Details ";
</script>
<body>
    <div class="admin">







    <!-- header -->
    <?php require('./components/Header.php'); ?>










    <div class="updateGeneral" >
            <div class="shadow"></div>
            <form method="post" action="">
            <div class="form">
              <div class="general">
                <div class="top">
                  <div class="headingTop">Edit General Details</div>
                  <div
                    class="topicons"
                    title="Close Details"
                  
                  >
                    <span><a href="/sd-canteen/clientpanel.php">X</a></span>
                  </div>
                </div>
           

                <div class="forms">
                
                  <li>
                    <div class="tt">Name</div>
                    <div class="dd">
                      <input
                        type="text"
                        placeholder="Your Fullname"
                        name="fullname"
                        value="<?php  if(isset($_SESSION['activeClientFullname'])){echo $_SESSION['activeClientFullname'];}?>"
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Age</div>
                    <div class="dd">
                      <input
                        type="number"
                        placeholder="Your Age"
                       name="age"
                       value="<?php  if(isset($clientAge)){echo $clientAge;}?>"
                    
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Email</div>
                    <div class="dd">
                      <input
                        type="email"
                        placeholder="Your Email Id"
                       name="email"
                       value="<?php  if(isset($clientEmail)){echo $clientEmail;}?>"
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Mobile</div>
                    <div class="dd">
                      <input
                        type="number"
                        placeholder="Your Mobile Number"
                     name="mobile"
                     value="<?php  if(isset($clientMobile)){echo $clientMobile;}?>"
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Gender</div>
                    <div class="dd">
                      <select
                        name="gender"
                      >
                      <?php  if(isset($clientGender)){echo "<option selected>$clientGender</option>";}?>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Transgender</option>
                      </select>
                    </div>
                  </li>

                  <li class="text">
                    <div class="tt">Address</div>
                    <div class="dd">
                      <textarea
                        placeholder="Address"
                       name="fulladdress"
                       value="<?php if(isset($clientAddress)){echo $clientAddress;}?>"
                       ><?php  if(isset($clientAddress)){echo $clientAddress;}?>
                    </textarea>
                    </div>
                  </li>
                
                </div>
              </div>

              <button name="update_client_details">Update Details</button>
            </div>
            </form>
          </div>










    </div>
    




    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>