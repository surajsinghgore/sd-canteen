<?php
       require('../middleware/ConnectToDatabase.php');
if (!isset($_SESSION)) {
    session_start();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {



$userId=$_SESSION['activeClientId'];

//! all orders
if (isset($_POST['all'])) {
$query="select*from orderitems where userId like $userId";
$res1 = mysqli_query($connection, $query);
$row1 = mysqli_num_rows($res1);
?>

<div class="filter">
          <li class="active" onclick="allOrderClick()">
   <hr>
          
   
          All Orders
     
       
          </li>
        
          <li  onclick="complete()">
       
          Complete Order
          </li>
          <li  onclick="reject()">
      
           Reject Order
          </li>
          <li  onclick="pending()">
         Pending Order
          </li>
        </div>

<?php

if($row1 > 0) {


   
while($data = mysqli_fetch_array($res1)) {
?>
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
  
         
 
   

      <!-- data -->
            <div class="allItems">
              <div class="headingData">
                <li
                  class="token"
                  
                >
                <?php echo $data['orderId']; ?>
                </li>
                <li><?php echo $data['orderdate']; ?></li>
                <li><?php echo $data['pickuptime']; ?></li>
                <li><?php echo $data['paymentmethod']; ?></li>
                <li><?php echo $data['totalamount']; ?></li>
                

                <?php 
                if($data['orderstatus']=="pending"){
?>
<li class="status">
                    <div class="pending">Pending</div>
                  </li>
<?php
                }


                if($data['orderstatus']=="complete"){
?>
   <li class="status">
                    <div class="complete">Complete</div>
                  </li>
<?php
                }
                if($data['orderstatus']=="reject"){
?>


<li class="status">
                    <div class="reject">Reject</div>
                  </li>

<?php

                }
                ?>
                  


         
          
               
              
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
<?php 
$mainOrderId=$data['id'];
$ordertoken=$data['orderId'];
$data['orderId'];
$query2="select*from itemlist where userId=$userId and mainOrderId=$mainOrderId and ordertoken='$ordertoken'";
$res2 = mysqli_query($connection, $query2);

while($itemData=mysqli_fetch_array($res2)) {
?>
  <div class="itemsMenu">
                          <li><?php echo $itemData['itemName'];?></li>
                          <li><?php echo $itemData['qty'];?></li>
                          <li><?php echo $itemData['category'];?></li>
                          <li><?php echo $itemData['itemPrice'];?></li>
                          <li><?php echo $itemData['size'];?></li>
                        </div>
<?php
}
?>
                      
                     
                
              
              </div>
            </div>
      
      <!-- <h4>No Order Found</h4> -->
  </div>
<?php
}

}

// no data
else{
?>

<div class="data">
   
      <h4>No Order Found</h4>
  </div>
<?php

}
    }


    // complete
    if (isset($_POST['complete'])) {
        $query="select*from orderitems where userId like $userId and orderstatus like 'complete'";
        $res1 = mysqli_query($connection, $query);
        $row1 = mysqli_num_rows($res1);
        ?>

<div class="filter">
          <li  onclick="allOrderClick()">

          
   
          All Orders
     
       
          </li>
        
          <li  class="active"onclick="complete()">
       
         <hr> Complete Order
          </li>
          <li  onclick="reject()">
      
           Reject Order
          </li>
          <li  onclick="pending()">
         Pending Order
          </li>
        </div>

<?php
        if($row1 > 0) {
        while($data = mysqli_fetch_array($res1)) {
     
?>

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
          
                 
         
           
        
              <!-- data -->
                    <div class="allItems">
                      <div class="headingData">
                        <li
                          class="token"
                          
                        >
                        <?php echo $data['orderId']; ?>
                        </li>
                        <li><?php echo $data['orderdate']; ?></li>
                        <li><?php echo $data['pickuptime']; ?></li>
                        <li><?php echo $data['paymentmethod']; ?></li>
                        <li><?php echo $data['totalamount']; ?></li>
                        
        
                        <?php 
                        if($data['orderstatus']=="pending"){
        ?>
        <li class="status">
                            <div class="pending">Pending</div>
                          </li>
        <?php
                        }
        
        
                        if($data['orderstatus']=="complete"){
        ?>
           <li class="status">
                            <div class="complete">Complete</div>
                          </li>
        <?php
                        }
                        if($data['orderstatus']=="reject"){
        ?>
        
        
        <li class="status">
                            <div class="reject">Reject</div>
                          </li>
        
        <?php
        
                        }
                        ?>
                          
        
        
                 
                  
                       
                      
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
        <?php 
        $mainOrderId=$data['id'];
        $ordertoken=$data['orderId'];
        $data['orderId'];
        $query2="select*from itemlist where userId=$userId and mainOrderId=$mainOrderId and ordertoken='$ordertoken'";
        $res2 = mysqli_query($connection, $query2);
        
        while($itemData=mysqli_fetch_array($res2)) {
        ?>
          <div class="itemsMenu">
                                  <li><?php echo $itemData['itemName'];?></li>
                                  <li><?php echo $itemData['qty'];?></li>
                                  <li><?php echo $itemData['category'];?></li>
                                  <li><?php echo $itemData['itemPrice'];?></li>
                                  <li><?php echo $itemData['size'];?></li>
                                </div>
        <?php
        }
        ?>
                              
                             
                        
                      
                      </div>
                    </div>
              
              <!-- <h4>No Order Found</h4> -->
          </div>
        <?php
        }
        
        }
        
        // no data
        else{
        ?>
        
        <div class="data">
           
              <h4>No Order Found</h4>
          </div>
        <?php
        
        }

    }


    // reject
    if (isset($_POST['reject'])) {
        $query="select*from orderitems where userId like $userId and orderstatus like 'reject'";
        $res1 = mysqli_query($connection, $query);
        $row1 = mysqli_num_rows($res1);
        
      
        ?>

        <div class="filter">
                  <li  onclick="allOrderClick()">
         
                  
           
                  All Orders
             
               
                  </li>
                
                  <li  onclick="complete()">
               
                  Complete Order
                  </li>
                  <li  class="active" onclick="reject()">
              <hr>
                   Reject Order
                  </li>
                  <li  onclick="pending()">
                 Pending Order
                  </li>
                </div>
        
        <?php

        if($row1 > 0) {
        while($data = mysqli_fetch_array($res1)) {
        ?>


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
          
                 
         
           
        
              <!-- data -->
                    <div class="allItems">
                      <div class="headingData">
                        <li
                          class="token"
                          
                        >
                        <?php echo $data['orderId']; ?>
                        </li>
                        <li><?php echo $data['orderdate']; ?></li>
                        <li><?php echo $data['pickuptime']; ?></li>
                        <li><?php echo $data['paymentmethod']; ?></li>
                        <li><?php echo $data['totalamount']; ?></li>
                        
        
                        <?php 
                        if($data['orderstatus']=="pending"){
        ?>
        <li class="status">
                            <div class="pending">Pending</div>
                          </li>
        <?php
                        }
        
        
                        if($data['orderstatus']=="complete"){
        ?>
           <li class="status">
                            <div class="complete">Complete</div>
                          </li>
        <?php
                        }
                        if($data['orderstatus']=="reject"){
        ?>
        
        
        <li class="status">
                            <div class="reject">Reject</div>
                          </li>
        
        <?php
        
                        }
                        ?>
                          
        
        
                 
                  
                       
                      
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
        <?php 
        $mainOrderId=$data['id'];
        $ordertoken=$data['orderId'];
        $data['orderId'];
        $query2="select*from itemlist where userId=$userId and mainOrderId=$mainOrderId and ordertoken='$ordertoken'";
        $res2 = mysqli_query($connection, $query2);
        
        while($itemData=mysqli_fetch_array($res2)) {
        ?>
          <div class="itemsMenu">
                                  <li><?php echo $itemData['itemName'];?></li>
                                  <li><?php echo $itemData['qty'];?></li>
                                  <li><?php echo $itemData['category'];?></li>
                                  <li><?php echo $itemData['itemPrice'];?></li>
                                  <li><?php echo $itemData['size'];?></li>
                                </div>
        <?php
        }
        ?>
                              
                             
                        
                      
                      </div>
                    </div>
              
              <!-- <h4>No Order Found</h4> -->
          </div>
        <?php
        }
        
        }
        
        // no data
        else{
        ?>
        
        <div class="data">
           
              <h4>No Order Found</h4>
          </div>
        <?php
        
        }

    }



    // pending

    if (isset($_POST['pending'])) {
        $query="select*from orderitems where userId like $userId and orderstatus like 'pending'";
        $res1 = mysqli_query($connection, $query);
        $row1 = mysqli_num_rows($res1);
        

        ?>

<div class="filter">
          <li  onclick="allOrderClick()">

          
   
          All Orders
     
       
          </li>
        
          <li  onclick="complete()">
       
          Complete Order
          </li>
          <li  onclick="reject()">
      
           Reject Order
          </li>
          <li  class="active" onclick="pending()">
          <hr> Pending Order
          </li>
        </div>

<?php
        if($row1 > 0) {

       
        while($data = mysqli_fetch_array($res1)) {
        ?>


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
          
                 
         
           
        
              <!-- data -->
                    <div class="allItems">
                      <div class="headingData">
                        <li
                          class="token"
                          
                        >
                        <?php echo $data['orderId']; ?>
                        </li>
                        <li><?php echo $data['orderdate']; ?></li>
                        <li><?php echo $data['pickuptime']; ?></li>
                        <li><?php echo $data['paymentmethod']; ?></li>
                        <li><?php echo $data['totalamount']; ?></li>
                        
        
                        <?php 
                        if($data['orderstatus']=="pending"){
        ?>
        <li class="status">
                            <div class="pending">Pending</div>
                          </li>
        <?php
                        }
        
        
                        if($data['orderstatus']=="complete"){
        ?>
           <li class="status">
                            <div class="complete">Complete</div>
                          </li>
        <?php
                        }
                        if($data['orderstatus']=="reject"){
        ?>
        
        
        <li class="status">
                            <div class="reject">Reject</div>
                          </li>
        
        <?php
        
                        }
                        ?>
                          
        
        
                 
                  
                       
                      
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
        <?php 
        $mainOrderId=$data['id'];
        $ordertoken=$data['orderId'];
        $data['orderId'];
        $query2="select*from itemlist where userId=$userId and mainOrderId=$mainOrderId and ordertoken='$ordertoken'";
        $res2 = mysqli_query($connection, $query2);
        
        while($itemData=mysqli_fetch_array($res2)) {
        ?>
          <div class="itemsMenu">
                                  <li><?php echo $itemData['itemName'];?></li>
                                  <li><?php echo $itemData['qty'];?></li>
                                  <li><?php echo $itemData['category'];?></li>
                                  <li><?php echo $itemData['itemPrice'];?></li>
                                  <li><?php echo $itemData['size'];?></li>
                                </div>
        <?php
        }
        ?>
                              
                             
                        
                      
                      </div>
                    </div>
              
              <!-- <h4>No Order Found</h4> -->
          </div>
        <?php
        }
        
        }
        
        // no data
        else{
        ?>
        
        <div class="data">
           
              <h4>No Order Found</h4>
          </div>
        <?php
        
        }

    }


}
?>