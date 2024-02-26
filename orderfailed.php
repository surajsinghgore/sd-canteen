
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/orderdetails.css?v=4"> 
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Payment Status Page";
</script>

<body>
 



<div class="admin">


    
    <!-- header -->
    <?php require('./components/Header.php'); ?>
    
</div>

   

 
    <div class="order">

<!-- failed page -->

  <!-- <div class="failed">
<h2>Sorry Payment Pending</h2>
<div class="Div1">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014247/pending_sxghrh.gif" alt="payment pending" />
</div>


<h3>Bank Transaction Id : <span>23243543</span></h3>
<h4>Payment Status: <span>Pending</span></h4>
<button>Go Back</button>
    </div> -->

<!-- reject order -->

 <!-- <div class="failed">
<h2>Sorry Payment Failed</h2>
<div class="PaymentFailed" >
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/paymentFailed_qngsej.gif" alt="payment reject" id="reject"/>
</div>


<h3>Bank Transaction Id : <span>34554</span></h3>
<h4>Payment Status: <span>Failed</span></h4>
<button>Go Back</button>
    </div> -->

<!-- temp res -->
 <div class="failed">
<h2 >Sorry Something Went Wrong </h2>
<button>Go Back</button>
    </div>
   

    </div> 




    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>