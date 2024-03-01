<?php

require('../middleware/ConnectToDatabase.php');


// all orders
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['all'])) {


        date_default_timezone_set("Asia/Calcutta");
        $currentDate = date("d-m-Y");
        $currentTime = date("h:i:s A");
$query="select*from orderitems where orderdate like '$currentDate' and orderstatus='pending'";
$res=mysqli_query($connection, $query);
$row=   mysqli_num_rows($res);

if($row>0){
while($data=mysqli_fetch_array($res)){
?>

<div>
                      <div class="tableheading">
                        <div class="div1">Token Id</div>
                        <div class="div2">Customer Name</div>
                        <div class="div3">PickUp Time</div>
                        <div class="div4">Total Amount</div>
                        <div class="div5">Payment Mode</div>
                        <div class="div6">Email</div>
                        <div class="div7">Mobile</div>
                      </div>
                      <div class="contain">
                        <div class="tableheaddata">
                          <div class="div1">
                         <?php echo $data['orderId']; ?>
                          </div>
                          <div class="div2">
                          <?php echo $data['fullname']; ?>
                          </div>
                          <div class="div3">
                          <?php echo $data['pickuptime']; ?>
                          </div>
                          <div class="div4">
                          <?php echo $data['totalamount']; ?>
                          </div>
                          <div class="div5">
                          <?php echo $data['paymentmethod']; ?>
                          </div>
                          <div class="div6"><?php echo $data['email']; ?></div>
                          <div class="div7">
                          <?php echo $data['mobile']; ?>
                          </div>
                        </div>
                        

                        <!-- sub data -->
                        <div class="tableheadingsub">
                          <div class="div1">Item Name</div>
                          <div class="div2">
                            Product Price
                          </div>
                          <div class="div3">Qty</div>
                          <div class="div4">Category</div>
                          <div class="div5">Total Amount</div>
                          <div class="div6">
                            Amount Received
                          </div>
                          <div class="div7">Order Status</div>
                          <div class="div8">Action</div>
                        </div>
<?php
$mainOrderId=$data['id'];
$orderToken=$data['orderId'];
$query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken'";
$res2=mysqli_query($connection, $query2);

while($subData=mysqli_fetch_array($res2)){
?>
<!-- data -->
<div>
<div class="tableheaddatasub">
<div class="div1"><?php echo $subData['itemName'];?></div>
<div class="div2"><?php echo $subData['itemPrice'];?></div>
<div class="div3"><?php echo $subData['qty'];?></div>
<div class="div4"><?php echo $subData['category'];?>

</div>
<div class="div5"><?php echo $subData['itemPrice'];?></div>
<div class="div6"><?php echo $subData['amountreceived'];?></div>
<div class="div7">
<?php
// pending
if( $subData['orderstatus']=="pending"){
?>
<div class="pen">pending</div> 
<?php

}
// complete
if( $subData['orderstatus']=="complete"){
    ?>
    <div class="com">complete</div> 
    <?php

}

// reject
if( $subData['orderstatus']=="reject"){

    ?>
    <div class="rej">reject</div> 
    <?php
}
?>

 
</div>



<!-- after open menu -->

<!-- <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg> -->



<!-- update tick -->
<!-- <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg> -->


<!-- process close -->
<!-- <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg> -->

<!-- down down menu -->
<?php 
// only pending will show drop down menu
if($subData['orderstatus']=="pending"){
?>

<!-- icon of menu -->
<div class="div8">
<i class="fa-solid fa-bars"></i>
</div>
<div class="options" id="dropDownMenu<?echo $subData['id']?>">
<div><span class="icon1" >
<i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
</div>

<div><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
</div>


<?php
}


// if complete
if($subData['orderstatus']=="complete"){
  ?>  <div class="div8" title="order complete">
   <svg class="com" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="RealtimeOrder_com__LYMF9" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Order Complete</title><path d="M387.581 139.712L356.755 109 216.913 248.319l30.831 30.719 139.837-139.326zM481.172 109L247.744 340.469l-91.39-91.051-30.827 30.715L247.744 403 512 139.712 481.172 109zM0 280.133L123.321 403l30.829-30.713L31.934 249.418 0 280.133z"></path></svg>
    </div>

    <?php
    
}

// if reject
if($subData['orderstatus']=="reject"){
?>

<div class="div8" title="order complete">
<svg class="rej" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_rej__hBNIT" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Order Reject</title><path fill="none" stroke="#000" stroke-width="2" d="M7,7 L17,17 M7,17 L17,7"></path></svg>
    </div>
<?php
    
}

?>









</div>
                        </div>

<?php


}
?>

                      




              </div>
            


             
         
          </div>




<?php

}


}

// means no order
else{
?>
<h6>No orders are pending today</h6>
<?php
}

    }


}



?>