<!-- client logout -->
<?php
require('./clientApi/clientlogout.php');
// profile photo redirect
require('./middleware/clientProfilePhotoRedirect.php');
?>

<!DOCTYPE html>
<html lang="en">
<!-- global css added -->
<link rel="stylesheet" href="./styles/style.css?v=17">


<!-- ajax added -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<body>
    <?php
    // top progress loader
    require('./modules/clientTopLoader.php');
    // cooking loader
    require('./components/Loader.php');
    // toast
    if (isset($toast_status)) {

        if ($toast_status == 'true') {
            require('./components/ClientToast.php');
        }
    }
    ?>
    <header>
        <div class="logo" id="Header">
            <a href="/sd-canteen">

                <img src="./images/logo.png" alt="sd logo " />

            </a>
        </div>

        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="search" id="searchBarMain" onkeyup="searchMainBar()" placeholder='Search Items...' />
            <div class="suggestion" id="suggestionBar">


             
            </div>
        </div>
        <div class="links">
            <li> <i class="fa-solid fa-utensils"></i> <span class='heading'><a href="/sd-canteen/ordernow.php">Order Now</a> </span></li>


            <li id="heading"> <i class="fa-solid fa-caret-down"></i> <span class='heading'>Pages</span></li>

            <!-- user profile -->

            <?php

            if (!isset($_SESSION)) {
                session_start();
            }
            if (isset($_SESSION['activeClientId'])) {
                $clientId = $_SESSION['activeClientId'];
                require('./middleware/ConnectToDatabase.php');
                $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where id =$clientId");

                $DataFromDB = mysqli_fetch_assoc($resultGet);

                $profileImage;
                $clientAge = $DataFromDB['age'];
                $clientMobile = $DataFromDB['mobile'];
                $clientEmail = $DataFromDB['email'];
                $clientGender = $DataFromDB['gender'];
                $clientAddress = $DataFromDB['fulladdress'];
                if ($DataFromDB['profileimage'] == "") {
                    if ($DataFromDB['gender'] == 'Male') {
                        $profileImage = "https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014242/men_uuulzd.png";
                    } else {

                        $profileImage = "https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014244/girl_vzok8n.png";
                    }
                } else {
                    $profileImage = $DataFromDB['profileimage'];
                }
                echo "<li id=\"user\"><i class=\"fa-solid fa-caret-down\"></i><div>
   <div class=\"profileImg\">  
   <img src=\"" .
                    $profileImage . "\" alt=\"profile\" > </div>
   <span id='heading1' style=\"margin-left:40px\">Hi, ";


                echo mb_strimwidth($_SESSION['activeClientFullname'], 0, 5, "");

                echo " </span></div>
</li> ";
            } else {

                echo "<li id=\"login\"> <i class=\"fa-solid fa-arrow-right-to-bracket\"></i><a href=\"/sd-canteen/login.php\" ><span id='heading2'>Login</span></a></li> ";
            }
            ?>
            <!-- 
    -->





            <!-- cart -->
            <li class='cart1'> <a href="/sd-canteen/cart.php">
                    <div id="count">0</div>
                    <span><i><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z"></path>
                            </svg></i></span>
                </a></li>
        </div>



        <div class="pages" id="pages">
            <div class="page">
                <h1>Pages</h1>
                <li><a href="/">Home</a></li>
                <li><a href="/sd-canteen/contact.php">Contact</a> </li>
                <li><a href="/sd-canteen/about.php">About Us</a></li>
                <li><a href="/sd-canteen/gallery.php">Gallery</a></li>
            </div>
            <div class="page">
                <h1>Menu</h1>
                <li><a href="/sd-canteen/fooditem.php">Food Menu</a></li>
                <li><a href="/sd-canteen/drinkitem.php">Drink Menu</a></li>
                <li><a href="/sd-canteen/coffeeitem.php">Coffee Menu</a></li>
                <li><a href="/sd-canteen/juiceitem.php">Juice Menu</a></li>
            </div>
            <div class="page">
                <li><a href="/sd-canteen/category.php?category=sd special">SD Special</a></li>
                <li> <a href="/sd-canteen/fooditem.php"> Instant Food </a></li>
            </div>
            <div class="page">
                <h1>Extra Pages</h1>
                <li><a href="/sd-canteen/admin/adminlogin.php">Admin Login</a></li>
                <li><a href="/sd-canteen/helpandsupport.php">Help Center</a></li>
            </div>
        </div>

        <!-- client options -->
        <div class="clinetOption" id="clientOption">
            <div>
                <a href="/sd-canteen/ordercomplete.php">
                    <i class="fa-solid fa-calendar-day"></i>
                    <h1>Today&#39;s Order</h1>
                </a>
            </div>

            <div>
                <a href="/sd-canteen/clientpanel.php"><i class="fa-regular fa-circle-user"></i>
                    <h1>Manage Info</h1>
                </a>
            </div>

            <div>
                <a href="/sd-canteen/pastorder.php">
                    <i class="fa-solid fa-clipboard"></i>
                    <h1>Past Order</h1>
                </a>
            </div>
            <div>
                <form action="" method="post">
                    <button name="client_logout_click">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        <h1>Logout</h1>
                    </button>
                </form>
            </div>
        </div>


    </header>
<?php
if(isset($_SESSION['activeClientId'])){

// check weather today order is placed or not
date_default_timezone_set("Asia/Calcutta");
            $currentDate = date("d-m-Y");
$activeUserId=$_SESSION['activeClientId'];
$mainQuery="select* from orderitems where userId=$activeUserId and orderdate like '$currentDate' and orderstatus like 'pending'";
$resMain=mysqli_query($connection,$mainQuery);
$mainCount=mysqli_num_rows($resMain);
if($mainCount>0){

   ?>
   <script>
    if(sessionStorage.getItem('cooking')){

       
        setTimeout(()=>{
            if(sessionStorage.getItem('cooking')=="disable"){

}else{
    sessionStorage.setItem('cooking','enable');

}
        },100)
    }else{
        sessionStorage.setItem('cooking','enable');
    }

   </script>
   <div class='cookingMain' id="cooking">
    <div class='cookingSection'>
    <a href="/sd-canteen/ordercomplete.php"><h6>Order Cooking</h6></a>
      <button title='Hide' onclick="hideCooking()">x</button>
      <a href="/sd-canteen/ordercomplete.php"><div class="cookImage">
      <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014402/cooking_ggqydy.gif"  alt="cooking image" />
      </div>
          </div></a>
      </div>
      <?php
}else{


    
    ?>
<script>
     if(sessionStorage.getItem('cooking')){
    localStorage.removeItem('cooking');
     }
</script>
    <?php
}
}
?>
   





    <script>



        //main Search Bar
        function searchMainBar() {
            let searchInput = document.getElementById('searchBarMain').value;

            if (searchInput == "") {
                document.getElementById('suggestionBar').style.display = "none";


            } else {



                $.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/MainSearchBar.php", //your page
                    data: {
                        searchBarInput: searchInput
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('suggestionBar').style.display = "block";
                        document.getElementById('suggestionBar').innerHTML = res;

                    }
                });

            }
        }




        let states = false;
        let states1 = false;
        let page = document.getElementById('pages');
        let heading = document.getElementById('heading');
        let user = document.getElementById('user');
        let clientOption = document.getElementById('clientOption');

        heading.addEventListener('mouseenter', () => {
            page.style.display = "flex";

        })

        if (user) {
            user.addEventListener('mouseenter', () => {
                clientOption.style.display = "flex";
            })
            clientOption.addEventListener('mouseenter', () => {
                clientOption.style.display = "flex";
                states1 = true;
            })

            clientOption.addEventListener('mouseleave', () => {
                clientOption.style.display = "none";
                states1 = false;
            })


            user.addEventListener('mouseleave', () => {
                setTimeout(disable, 300);

                function disable() {
                    if (states1 == false) {
                        clientOption.style.display = "none";
                    }
                }
            })
        }

        page.addEventListener('mouseenter', () => {
            page.style.display = "flex";
            states = true;
        })

        page.addEventListener('mouseleave', () => {
            page.style.display = "none";
            states = false;
        })

        heading.addEventListener('mouseleave', () => {
            setTimeout(disable, 300);

            function disable() {
                if (states == false) {
                    page.style.display = "none";
                }
            }
        })

        // setting cart
        if (localStorage.getItem('cartItem') == undefined) {
            localStorage.setItem("cartItem", '{"items":[],"isEmpty":true,"totalItems":0,"totalUniqueItems":0,"cartTotal":0}')
        }


        let cartData = localStorage.getItem('cartItem');
        let cartDataConvert = JSON.parse(cartData);
        document.getElementById('count').innerText = cartDataConvert.totalUniqueItems;





        // website counter

        if (!sessionStorage.getItem('visit')) {
            sessionStorage.setItem('visit', 'true');

            let browser;
            if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
                browser = 'opera';
            } else if (navigator.userAgent.indexOf("Edg") != -1) {
                browser = 'edge';
            } else if (navigator.userAgent.indexOf("Chrome") != -1) {
                browser = 'chrome';
            } else if (navigator.userAgent.indexOf("Safari") != -1) {
                browser = 'safari';
            } else if (navigator.userAgent.indexOf("Firefox") != -1) {
                browser = 'firefox';
            } else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) {
                browser = 'IE';
            } else {
                browser = 'other Browser';
            }


            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/websitecounter.php", //your page
                data: {
                    browser: browser
                },
                success: function(res) {


                }
            });

        }



        //  top trending items added
        function searchClick(itemname) {

            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/topsearch.php", //your page
                data: {
                    itemname: itemname
                }, // passing the values
                success: function(res) {


                }
            });
        }











        
// sessionStorage.removeItem('cooking')
function hideCooking(){
    if(sessionStorage.getItem('cooking')){
    sessionStorage.setItem('cooking','disable');
    document.getElementById('cooking').style.display="none";
    }
}
    if(sessionStorage.getItem('cooking')){

        if(sessionStorage.getItem('cooking')=="disable"){

    document.getElementById('cooking').style.display="none";

}

    }
    </script>




</body>

</html>