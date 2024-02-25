<!-- client login api -->
<?php 
     require('./middleware/VerifyClientLogin.php');

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
                      
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Age</div>
                    <div class="dd">
                      <input
                        type="number"
                        placeholder="Your Age"
                       
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Email</div>
                    <div class="dd">
                      <input
                        type="email"
                        placeholder="Your Email Id"
                       
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Mobile</div>
                    <div class="dd">
                      <input
                        type="number"
                        placeholder="Your Mobile Number"
                     
                      />
                    </div>
                  </li>

                  <li>
                    <div class="tt">Gender</div>
                    <div class="dd">
                      <select
                        
                      >
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
                       
                      ></textarea>
                    </div>
                  </li>
                </div>
              </div>

              <button >Update Details</button>
            </div>
          </div>










    </div>
    




    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>