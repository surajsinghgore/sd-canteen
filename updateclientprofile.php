<!-- client login api -->
<?php
require('./middleware/VerifyClientLogin.php');
require('./clientApi/clientprofileupdate.php');

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
    window.document.title = "SD CANTEEN | Update Client Profile ";
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
                            <div class="topicons" title="Close Details">
                                <span>x</span>
                            </div>
                        </div>



                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="upsection">
                            <div class="lefts">
                                <div class="div">
                                 
                                    <label class="custom_file_upload">
                                        <input type="file" name="ClientProfile" id="photoFood" onchange="loadFile(event)"/>
                                        <svg class="upload_icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="ClientPanel_upload_icon__GXB_S" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M518.3 459a8 8 0 0 0-12.6 0l-112 141.7a7.98 7.98 0 0 0 6.3 12.9h73.9V856c0 4.4 3.6 8 8 8h60c4.4 0 8-3.6 8-8V613.7H624c6.7 0 10.4-7.7 6.3-12.9L518.3 459z"></path>
                                            <path d="M811.4 366.7C765.6 245.9 648.9 160 512.2 160S258.8 245.8 213 366.6C127.3 389.1 64 467.2 64 560c0 110.5 89.5 200 199.9 200H304c4.4 0 8-3.6 8-8v-60c0-4.4-3.6-8-8-8h-40.1c-33.7 0-65.4-13.4-89-37.7-23.5-24.2-36-56.8-34.9-90.6.9-26.4 9.9-51.2 26.2-72.1 16.7-21.3 40.1-36.8 66.1-43.7l37.9-9.9 13.9-36.6c8.6-22.8 20.6-44.1 35.7-63.4a245.6 245.6 0 0 1 52.4-49.9c41.1-28.9 89.5-44.2 140-44.2s98.9 15.3 140 44.2c19.9 14 37.5 30.8 52.4 49.9 15.1 19.3 27.1 40.7 35.7 63.4l13.8 36.5 37.8 10C846.1 454.5 884 503.8 884 560c0 33.1-12.9 64.3-36.3 87.7a123.07 123.07 0 0 1-87.6 36.3H720c-4.4 0-8 3.6-8 8v60c0 4.4 3.6 8 8 8h40.1C870.5 760 960 670.5 960 560c0-92.7-63.1-170.7-148.6-193.3z"></path>
                                        </svg>

                                        Select Profile
                                    </label>
                                </div>

                                <button name="client_profile_update">
                                    Click to upload
                                </button>
                            </div>
                        </form>

                            <div class="rights">
                                <div class="imageSections">
                                    <img src="<?php if (isset($profileImage)) {
                                                    echo $profileImage;
                                                } else {

                                                    header('Location: /sd-canteen/login.php');
                                                } ?>" alt="client profile" id="output" />
                                </div>

                                

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




    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('output').style.display = "block";
                var preview = document.getElementById('output');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);

        };
    </script>
</body>

</html>