

<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/pastorders.css?v=2">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Past Orders";
</script>

<body>
    <div class="admin">





        <!-- header -->
        <?php require('./components/Header.php');

        ?>




    



<div class="AllOrder">
    

<!-- top section -->
        <div class="topSection">
          <h1>All Order&#39;s Details</h1>
          <h2>
            Total Order Placed: <span>23</span>
          </h2>
        </div>


        <!-- filter -->
        <div class="filter">
          <li class="active" >
   
          <hr />All Orders
          </li>
          <li>
          Complete Order
          </li>
          <li>
           Reject Order
          </li>
          <li>
            Pending Order
          </li>
        </div>

        <!-- data heading -->
        <div class="data">
          
                <div class="headings">
                  <li>Order Id </li>
                  <li>Date</li>
                  <li>Time</li>
                  <li>Payment Method</li>
                  <li>Total Amount</li>
                  <li>Order Status</li>
                </div>
        
                <!-- no data found -->
                <!-- <h4>No Order Found</h4> -->
             
            <!-- <h4>No Order Found</h4> -->
       
         

            <!-- data -->
                  <div class="allItems">
                    <div class="headingData">
                      <li
                        class="token"
                        
                      >
                      6I1NDK
                      </li>
                      <li>9.4.2023</li>
                      <li>6.00-pm</li>
                      <li>cod</li>
                      <li>1463</li>
                      
                        <li class="status">
                          <div class="pending">Pending</div>
                        </li>


               
                        <!-- <li class="status">
                          <div class="reject">Reject</div>
                        </li>
                  -->
                        <!-- <li class="status">
                          <div class="complete">Complete</div>
                        </li> -->
                    
                    </div>
                    
                    <h6>Items Order Details </h6>
                    <div class="innerHeading">
                      <div class="itemsHeading">
                        <li>Item Name</li>
                        <li>Qty</li>
                        <li>Category</li>
                        <li>Amount</li>
                        <li>Size </li>
                      </div>
                    </div>

                    <div class="items">
                      <!-- item data -->
                              <div class="itemsMenu">
                                <li>Test</li>
                                <li>1</li>
                                <li>Sandwich</li>
                                <li>21</li>
                                <li>Mediumsize</li>
                              </div>
                           
                        <!-- <h4>No Order Found</h4> -->
                    
                    </div>
                  </div>
            
            <!-- <h4>No Order Found</h4> -->
        </div>
      </div>



    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>
</body>

</html>