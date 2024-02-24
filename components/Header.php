<!DOCTYPE html>
<html lang="en">
<!-- global css added -->
<link rel="stylesheet" href="./styles/style.css?v=4">

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
   <a href="/">
    
    <Image src="./images/logo.png" alt="sd logo " />
    
    </a> </div>

        <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" name="search" id="search" placeholder='Search Items...'/>
    <div class="suggestion" id="suggestion">
<a href="s"><li><i class="fa-solid fa-magnifying-glass fixed" ></i>BURGER</li></a>
<a href="s"><li><i class="fa-solid fa-magnifying-glass fixed" ></i>BURGER</li></a>
<a href="s"><li><i class="fa-solid fa-magnifying-glass fixed" ></i>BURGER</li></a>
<a href="s"><li><i class="fa-solid fa-magnifying-glass fixed" ></i>BURGER</li></a>

    <!-- <h1 id="searchHeading">No Item Match</h1> -->
    </div>
    </div>
    <div class="links">
    <li> <i class="fa-solid fa-utensils"></i> <span class='heading'><a href="/OrderNow">Order Now</a> </span></li>


      <li id="heading"> <i class="fa-solid fa-caret-down"></i> <span class='heading' >Pages</span></li>

      <!-- user profile -->
 
    <?php

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['activeClientId'])) {
   echo"<li id=\"user\"><i class=\"fa-solid fa-caret-down\"></i><div>
   <div class=\"profileImg\">  
   <img src=\"./images/user.png\" alt=\"profile\" > </div>
   <span id='heading1' style=\"margin-left:40px\">Hi, ";
   echo mb_strimwidth($_SESSION['activeClientFullname'], 0, 5, "");
   
   echo" </span></div>
</li> "; 

}else{

echo"<li id=\"login\"> <i class=\"fa-solid fa-arrow-right-to-bracket\"></i><a href=\"sd-canteen/login.php\" ><span id='heading2'>Login</span></a></li> ";
}
?>
      <!-- 
    -->
   
   
   <!-- login link -->

      


      <!-- cart -->
     <li  class='cart'> <a href="/Cart"><a>
    <div id="count">0</div>
    <span><i><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z"></path></svg></i></span></a></a></li>
    </div>



    <div class="pages" id="pages" >
    <div class="page">
    <h1>Pages</h1>
    <li><a href="/">Home</a></li>
    <li><a href="/Contact">Contact</a> </li>
    <li><a href="/AboutUs">About Us</a></li>
    <li><a href="/Gallery">Gallery</a></li>
    </div>
<div class="page">
    <h1>Menu</h1>
    <li><a href="/FoodItem">Food Menu</a></li>
    <li><a href="/DrinkItem">Drink Menu</a></li>
    <li><a href="/CoffeeItem">Coffee Menu</a></li>
    <li><a href="/JuiceItem">Juice Menu</a></li>
    </div>
    <div class="page">
    <li><a href="/Items/sd special">SD Special</a></li>
    <li> <a href="/FoodItem"> Instant Food </a></li>
    </div>
        <div class="page">
    <h1>Extra Pages</h1>
    <li><a href="/sd-canteen/admin/adminlogin.php">Admin Login</a></li>
    <li><a href="/HelpAndSupport">Help Center</a></li>
    </div>
    </div>

<!-- client options -->
    <div class="clinetOption" id="clientOption">
<div>
<a href="/OrderComplete"><a>
<i class="fa-solid fa-calendar-day"></i>
<h1>Today&#39;s Order</h1>
</a></a>
</div>

<div>
<a href="/ClientManage"><a><i class="fa-regular fa-circle-user"></i>
<h1>Manage Info</h1></a></a>
</div>

<div>
<a href="/PastOrder"><a>
<i class="fa-solid fa-clipboard"></i>
<h1>Past Order</h1></a></a>
</div>
<div >
<i class="fa-solid fa-right-from-bracket"></i>
<h1>Logout</h1>
</div>
</div> 


    </header>







    <script>

let states=false;
let states1=false;
let page=document.getElementById('pages');
let heading=document.getElementById('heading');
let user=document.getElementById('user');
let clientOption=document.getElementById('clientOption');

heading.addEventListener('mouseenter',()=>{
page.style.display="flex";

})

if(user){
user.addEventListener('mouseenter',()=>{
clientOption.style.display="flex";
})
clientOption.addEventListener('mouseenter',()=>{
clientOption.style.display="flex";
states1=true;
})

clientOption.addEventListener('mouseleave',()=>{
clientOption.style.display="none";
states1=false;
})


user.addEventListener('mouseleave',()=>{
setTimeout(disable,300);

function disable(){
if(states1==false){
clientOption.style.display="none";
}
}
})
}

page.addEventListener('mouseenter',()=>{
page.style.display="flex";
states=true;
})

page.addEventListener('mouseleave',()=>{
page.style.display="none";
states=false;
})

heading.addEventListener('mouseleave',()=>{
setTimeout(disable,300);
function disable(){
if(states==false){
page.style.display="none";
}
}
})
    </script>
</body>

</html>