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
    window.document.title="SD CANTEEN | Update Client Profile ";
</script>
<body>
    <div class="admin">







    <!-- header -->
    <?php require('./components/Header.php'); ?>




    <div class="clientPanel">
     



    
         <div class="profile">
            <div class="shadow"></div>
            <div class="form">
              <div class="general">
                <div class="top">
                  <div class="headingTop">Upload New Profile </div>
                  <div
                    class="topicons"
                    title="Close Details"
                   
                  >
                    <span>x</span>
                  </div>
                </div>
 


                <div class="upsection">
                  <div class="lefts">
                    <div class="div">
                      <label class="custom_file_upload">
                        <input
                          type="file"
                          name="photo"
                          id="photoFood"
                          
                        />
                        <AiOutlineCloudUpload class="upload_icon" />
                        Select Profile
                      </label>
                    </div>
                  
                      <button onClick={uploadProfileImage}>
                        Click to upload
                      </button>
                
                  </div>

                  <div class="rights">
                    <div class="imageSections">
                      <img
                        src=""
                        alt="client profile"
                        id="output"
                      
                      />
                    </div>
                 
                      <button >
                        Click to upload
                      </button>
                
                  </div>
                </div>
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