<!-- signup api -->
<?php require('./clientApi/Signup.php'); ?>


<!DOCTYPE html>
<html lang="en">
<?php  require('./middleware/DisabledPageOnClientLogin.php');
         require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/signup.css?v=3">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
         // prevent reload post request
         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    window.document.title = "SD CANTEEN | Signup Client ";
</script>

<body>
    <div class="admin">


        <!-- header -->
        <?php
         require('./components/Header.php');
        

        ?>



        <div class="clientLogin">
            <div class="form">
                <h3>SD CANTEEN</h3>
                <form method="post" action="">
                    <li>

                    <?php







?>
                        <h6>Enter Full Name <span>*</span></h6>
                        <input type="text" name="fullname" autocomplete="off" placeholder="Enter full name" value="<?php if(isset($fullname)){echo $fullname;}?>" autoFocus required />
                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 10c1.151 0 2-.848 2-2s-.849-2-2-2c-1.15 0-2 .848-2 2s.85 2 2 2zm0 1c-2.209 0-4 1.612-4 3.6v.386h8V14.6c0-1.988-1.791-3.6-4-3.6z"></path>
                            <path d="M19 2H5c-1.103 0-2 .897-2 2v13c0 1.103.897 2 2 2h4l3 3 3-3h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm-5 15-2 2-2-2H5V4h14l.002 13H14z"></path>
                        </svg>
                    </li>

                    <li>
                        <h6>Enter Age <span>*</span></h6>
                        <input type="number" name="age" placeholder="Enter your age" autocomplete="off" value="<?php if(isset($age)){echo $age;}?>" required />


                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"></path>
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                        </svg>
                    </li>

                    <li>
                        <h6>Enter Email Account <span>*</span></h6>
                        <input type="email" name="email" placeholder="Enter email id" autocomplete="off" value="<?php if(isset($email)){echo $email;}?>" required />

                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-40 110.8V792H136V270.8l-27.6-21.5 39.3-50.5 42.8 33.3h643.1l42.8-33.3 39.3 50.5-27.7 21.5zM833.6 232L512 482 190.4 232l-42.8-33.3-39.3 50.5 27.6 21.5 341.6 265.6a55.99 55.99 0 0 0 68.7 0L888 270.8l27.6-21.5-39.3-50.5-42.7 33.2z"></path>
                        </svg>
                    </li>


                    <li>
                        <h6>Enter Mobile Number <span>*</span></h6>
                        <input type="number" name="mobile" onkeyup="validateInput()" placeholder="Enter Mobile Number" value="<?php if(isset($mobile)){echo $mobile;}?>" autocomplete="off" id="numberBox" required />


                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 10 16" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9 0H1C.45 0 0 .45 0 1v14c0 .55.45 1 1 1h8c.55 0 1-.45 1-1V1c0-.55-.45-1-1-1zM5 15.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zM9 12H1V2h8v10z"></path>
                        </svg>
                    </li>

                    <li>
                        <h6>Select Gender <span>*</span></h6>
                        <select name="gender" >
                        value="<?php if(isset($gender)){
                            if($gender!="no"){
                                
                                echo "<option>$gender</option>";
                            }
                        }?>"
                            <option value="no">Select your gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Transgender</option>
                            <option></option>
                        </select>

                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"></path>
                        </svg>
                    </li>

                    <li>
                        <h6>Enter Full Address <span>*</span></h6>
                        <input type="text" name="address" value="<?php if(isset($address)){echo $address;}?>" placeholder="Enter Address" autocomplete="off" required />
                        <svg class="icon" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <desc></desc>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z"></path>
                            <path d="M10 16h6"></path>
                            <circle cx="13" cy="11" r="2"></circle>
                            <path d="M4 8h3"></path>
                            <path d="M4 12h3"></path>
                            <path d="M4 16h3"></path>
                        </svg>
                    </li>
                    <li>
                        <h6>Enter Password <span>*</span></h6>
                        <input type="password" name="password" placeholder="Password" autocomplete="off" value="<?php if(isset($password)){echo $password;}?>" required />

                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"></path>
                            </g>
                        </svg>
                    </li>
                    <li>
                        <h6>Enter Confirm Password <span>*</span></h6>
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php if(isset($confirmpassword)){echo $confirmpassword;}?>" autocomplete="off" required />
                        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="Signup_icon__fRYE6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"></path>
                            </g>
                        </svg>
                    </li>

                    <button name="client_register">Create Account</button>
                </form>
                <div class="path">

                    <h4><a href="/sd-canteen/login.php">Already Registered ?</a></h4>
                    <h3><a href="/sd-canteen/admin/adminlogin.php">Admin Login </a></h3>

                </div>
            </div>

        </div>




    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>



    <script>
        function validateInput() {
            let numberBox = document.getElementById('numberBox');
            if (numberBox.value.length > 10) {


                alert('Please Enter 10 Digit Mobile Number')
                document.getElementById('numberBox').value = "";

            }

        }

        // document.getElementById('numberBox').addEventListener('on',()=>{

        // })
    </script>
    </div>
</body>

</html>