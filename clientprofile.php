<!-- client login api -->
<?php require('./clientApi/clientprofileupload.php'); ?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/ClientProfile.css">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Client Profile Upload";
</script>

<body>
    <div class="admin">









        <!-- header -->
        <?php require('./components/Header.php');

        // <!-- validate client login -->
        require('./middleware/VerifyClientLogin.php');
        ?>




        <!-- client profile upload -->
        <div class="Profile">
            <div class="left">
                <h1>Please Upload your Profile Photo</h1>
                <div class="div">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label class="custom_file_upload">
                            <input type="file" name="ClientProfile" id="photoFood" onchange="loadFile(event)" >
                            <i class="fa-solid fa-cloud-arrow-up upload_icon"></i>
                            Select Profile
                        </label>
                </div>

                <button name="client_profile_upload">Upload Profile</button>
                </form>
            </div>


            <div class="right">
                <div class="image">
                    <img src="" alt="" id="output" />
                </div>

                <button onClick="uploadProfileImage">Upload Profile</button>

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