
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/helpandsupport.css?v=2">
<link rel="stylesheet" href="./styles/client/terms.css?v=2">

<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Help and Support";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin">


    <div class="term">
<h1>How can we help you ?</h1>

<div class="help">
<div class="searchSection">
<input type="search" name="search"  placeholder="Start typing our search..."  id="searchss">
<div class="icons">
<svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
</div>


<div class="suggestions" >
 <li>account</li>
</div>
</div>
<p id="articles">Or you can read the following articles</p>

</div>

<div class="articles">
<h1>Getting Started</h1>

<div class="article" id="ordercancels">
<div class="title" >
cancel order 

<div class="sign" id="downordercancel"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg></div>


<!-- <div class="sign1" id="upordercancel">

<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"></path></svg>
</div> -->


</div>
<div class="solution" id="ordercancel">
<h5>for Cancellation of order you need to follow the following steps:-</h5>
<h6>Note:- After cancellation of order [ cash on delivery ] option willbe disabled lifetime from your account. </h6>
<h4>Step 1: <span>Call on this Number : +91-1234567890</span></h4>
<h3>or</h3>
<h4>Step 2: <span>Write your Query on this Page <a href="/Contact"><span class="link">Click Here</span></a></span></h4>
</div>

</div>



<div class="article" id="accountrecovereds">
<div class="title"  >
Account Recovered 

<div class="sign" id="downordercancel"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg></div>

<!-- 
<div class="sign1" id="upordercancel">

<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"></path></svg>
</div> -->

</div>
<div class="solution" id="accountrecovered">
<h5>for recovered your account you need to follow the following steps:-</h5>
<h4>Step 1: <span>Call on this Number : +91-1234567890</span></h4>
<h3>or</h3>
<h4>Step 2: <span>Write your Query on this Page <a href="/Contact"><span class="link">Click Here</span></a></span></h4>
</div>

</div>


<div class="article" id="forgetpasswords">
<div class="title">
Forget Password

<div class="sign" id="downordercancel"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg></div>


<div class="sign1" id="upordercancel">

<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"></path></svg>
</div>

</div>
<div class="solution" id="forgetpassword">
<h5>To reset our account password you need to follow the following steps:-</h5>
<h4>Step 1: <span>Go to Login Page or <a href="/Contact"><span class="link">Click Here</span></a></span></h4>
<h4>Step 2: <span>Click on forget password option</span></h4>
<h4>Step 3: <span>Provide our Email Id which you registered with account</span></h4>
<h4>Step 4: <span>Enter OTP which you received on your Email Address</span></h4>
<h4>Step 5: <span>Reset New Password</span></h4>
<h3>or</h3>
<h4> <span>If You face any difficulty write your query: <a href="/Contact"><span class="link">Click Here</span></a></span></h4>
</div>

</div>



<div class="article" id="issurefacings">
<div class="title">
Facing Any Issue 

<div class="sign" id="downordercancel"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg></div>


<div class="sign1" id="upordercancel">

<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"></path></svg>
</div>

</div>
<div class="solution" id="issurefacing">
<h5>if You facing any issue with this website you need to follow the following steps:-</h5>
<h4> <span>Write your Query on this Page <a href="/Contact"><span class="link">Click Here</span></a></span></h4>
</div>

</div>

</div>

     </div>


  
    
        </div>

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>