<!-- client login api -->
<?php 
     require('./middleware/VerifyClientLogin.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/ClientPanel.css?v=4">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
         // prevent reload post request
         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    window.document.title="SD CANTEEN | Client Panel ";
</script>
<body>
    <div class="admin">







    <!-- header -->
    <?php require('./components/Header.php'); ?>




    <div class="clientPanel">
        <div class="left">
          <div class="imageSection">
            <img
              src="<?php if(isset($profileImage)){echo $profileImage;} else{

                header('Location: /sd-canteen/login.php');
              }?>"
              alt="profile"
             
              class="imgs"
    
            />

            <div
              class="update"
              title="Update Profile"
        
            >
<a href="/sd-canteen/updateclientprofile.php">
            <svg lass="edit" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="ClientPanel_edit__tcXM5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 000-1.41l-2.34-2.34a.996.996 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path></svg>
         
              Edit
              </a>

            </div>
          </div>
          <div class="title">
            <h1><?php  echo$_SESSION['activeClientFullname'];?></h1>
          </div>
          <hr />
          <div class="links">
            <li class="link">
              <div class="icon">
                <div class="ic">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43 96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7 0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2 1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26 9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3 89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z"></path></svg>
                </div>
              </div>
              <div class="text">General</div>
            </li>

            <li>
              <div class="icon">
                <div class="ic">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"></path></g></svg>
                </div>
              </div>
              <div class="text"><a href="/sd-canteen/updatepassword.php">Password</a></div>
            </li>
            <li>
              <div class="icon">
                <div class="ic">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 21.99V21h15.03v.99c0 .55-.45 1-1.01 1H2.01c-.56 0-1.01-.45-1.01-1zm15.03-7c0-8-15.03-8-15.03 0h15.03zM1.02 17h15v2h-15z"></path></svg>
               
                </div>
              </div>
              <div class="text"><a href="/sd-canteen/pastorder.php">Orders</a></div>
            </li>
          
        

            <li>
              <div class="icon">
                <div class="ic">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M7 12h14l-3 -3m0 6l3 -3"></path></svg>
                </div>
              </div>
              <div class="text">Logout</div>
            </li>
          </div>
        </div>

        <div class="right">

        <!-- right side bar -->
          
      
            <div class="general">
              <div class="top">
                <div class="headingTop">General Details</div>
                <div
                  class="topicons"
                  title="Edit Details"
                 
                >
                <a href="/sd-canteen/updategeneraldetails.php">
                <svg  class="edit" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="ClientPanel_edit__tcXM5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 000-1.41l-2.34-2.34a.996.996 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path></svg>
                  Edit
                  </a>
                </div>
              </div>
             


              <!-- details -->
              <div class="forms">
                <li>
                  <div class="tt">Name </div>
                  <div class="dd">
                    <input
                      type="text"
                      placeholder="Your Fullname"
                      value="<?php  if(isset($_SESSION['activeClientFullname'])){echo $_SESSION['activeClientFullname'];}?>"
                   readonly
                    />
                  </div>
                </li>

                <li>
                  <div class="tt">Age</div>
                  <div class="dd">
                    <input
                      type="number"
                      placeholder="Your Age"
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
                      value="<?php  if(isset($clientEmail)){echo $clientEmail;}?>"
                      readOnly
                    />
                  </div>
                </li>

                <li>
                  <div class="tt">Mobile</div>
                  <div class="dd">
                    <input
                      type="number"
                      placeholder="Your Mobile Number"
                      value="<?php  if(isset($clientMobile)){echo $clientMobile;}?>"
                      readOnly
                    />
                  </div>
                </li>

                <li>
                  <div class="tt">Gender</div>
                  <div class="dd">
                    <select  disabled>
                    value="<?php  if(isset($clientGender)){echo "<option selected>$clientGender</option>";}?>"
                      
                      <option >Male</option>
                      <option>Female</option>
                      <option>Transgender</option>
                    </select>
                  </div>
                </li>

                <li class="text">
                  <div class="tt">Full Address</div>
                  <div class="dd">
                    
                    <textarea
                      placeholder="Address"
                     
                      readOnly
                    ><?php  if(isset($clientAddress)){echo $clientAddress;}?></textarea>
                  </div>
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