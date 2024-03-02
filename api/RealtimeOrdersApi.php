<?php

require('../middleware/ConnectToDatabase.php');


// all orders
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['all'])) {


        date_default_timezone_set("Asia/Calcutta");
        $currentDate = date("d-m-Y");
        $currentTime = date("h:i:s A");
$query="select*from orderitems where orderdate like '$currentDate' and orderstatus='pending' order by pickuptime24";
$res=mysqli_query($connection, $query);
$row=mysqli_num_rows($res);

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
$query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken' ";
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
<div class="div5">
<?php $price=$subData['itemPrice'];
$qty=$subData['qty'];
$total=$price*$qty;
 echo $total;?>

</div>
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










<!-- down down menu -->
<?php 
// only pending will show drop down menu
if($subData['orderstatus']=="pending"){
?>

<!-- icon of menu -->
<div class="div8" >
<!-- open menu-->
<i class="fa-solid fa-bars" id="dropDownMenuOpenIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")' style="cursor:pointer"></i>

<!-- close menu -->
<i style="display:none" id="dropDownMenuCloseIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")'><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg></i>

</div>
<div class="options" id="dropDownMenu<?php echo $subData['id']?>" style="display:none">
<div onclick='processOrderMenu("<?php echo $subData['id']?>")'><span class="icon1">
<i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
</div>

<div onclick='processOrderReject("<?php echo $subData['id']?>")'><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
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



<!-- update form -->
     <!-- updateMenu -->

     <div class="update" id="UpdateFormDiv<?php echo $subData['id']; ?>" style="display:none">
<div class="div1"><?php echo $subData['itemName'];?></div>
<div class="div2"><?php echo $subData['itemPrice'];?></div>
<div class="div3"><?php echo $subData['qty'];?></div>
<div class="div4"><?php echo $subData['category'];?>
</div>
<div class="div5" id="totalAmount<?php echo $subData['id']?>"><?php 
$price=$subData['itemPrice'];
$qty=$subData['qty'];
$total=$price*$qty;
echo $total;?></div>
<div class="div6">
<input type="text" id="amountReceived<?php echo $subData['id']?>" value="<?php

echo $subData['amountreceived'];?>">
<input type="text" id="maincategory<?php echo $subData['id']?>" value="<?php echo $subData['maincategory'];?>" style="display:none">
</div>
<div class="div7">
<select id="orderStatus<?php echo $subData['id']?>">
<option value="pending">Pending</option>
<option value="complete">Complete</option>
</select>
</div>
<div class="div8">


<svg class="tick" onclick='sendOrderForProcess("<?php echo $subData['id']?>")' stroke="currentColor" title="Update" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg>

<!-- close menu -->
<svg onclick='processOrderMenuClose("<?php echo $subData['id']?>")' class="back" onclick='processOrder("<?php echo $subData['id']?>")' title="close menu" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
</div>
</div>




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





    
// process Order to complete
if (isset($_POST['processOrder']) && isset($_POST['id'])){
  $id= $_POST['id'];
$GetQuery="select*from itemlist where id=$id";
$res=mysqli_query($connection,$GetQuery);

$row=mysqli_num_rows($res);
if($row> 0){

  $data=mysqli_fetch_assoc($res);

  $price=$data['itemPrice'];
  $mainOrderID=$data['mainOrderId'];
 
  $qty=$data['qty'];
  $totalamount=$price*$qty;
$query="update itemlist set orderstatus='complete',paymentstatus='complete', amountreceived='$totalamount' where id=$id";
$res=mysqli_query($connection,$query);



// !  update in orderTrack DB
$orderTrack="select*from ordertrack where itemId=$id";
$orderTrackRes=mysqli_query($connection,$orderTrack);
$numberOfRecords=mysqli_num_rows($orderTrackRes);
// means update success to + 1
$orderTrackData=mysqli_fetch_assoc($orderTrackRes);
$success=$orderTrackData["success"];
$pending=$orderTrackData["pending"];
$ids=$orderTrackData["id"];
++$success;
--$pending;
$insertOrderTrack="update ordertrack set success=$success,pending=$pending where id=$ids";
	$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);








$mainQuery="select*from orderitems where id=$mainOrderID";
$userDataRes=mysqli_query($connection,$mainQuery);
$userData=mysqli_fetch_assoc($userDataRes);

$email=$userData['email'];
$paymentinfo=$userData['paymentinfo'];
$userId=$userData['id'];
$fullname=$userData['fullname'];
$orderId=$userData['orderId'];

// update main orderitem status if all particular item complete
$q="select*from itemlist where mainOrderId=$mainOrderID";
$res1=mysqli_query($connection,$q);
$count=mysqli_num_rows($res1);

$counter=0;
$reject=0;
$amountReceived=0;
while($dataCheck=mysqli_fetch_assoc($res1)){
if($dataCheck["orderstatus"]=="complete"){
  $counter++;
  $amountReceived+=$dataCheck["amountreceived"];
}
if($dataCheck["orderstatus"]=="reject"){
  $reject++; $counter++;
}
}

// all orders processed
var_dump($count);
var_dump($counter);
if($count==$counter){
// check any reject order
if($reject>0){

$userDataUpdate="update clientdata set cod='disabled' where id=$userId";

if($paymentinfo=="pending"){
  $updateMainRecord="update orderitems set paymentstatus='failed',paymentinfo='failed',orderstatus='reject',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
  $execute1=mysqli_query($connection,$userDataUpdate);
}
else{


  
  $updateMainRecord="update orderitems set paymentstatus='failed',orderstatus='reject',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
  $execute1=mysqli_query($connection,$userDataUpdate);
}


  $to = $email;
                    $subject = "Order Rejected on the SD CANTEEN";
                    $message = "
<html>
    <head>
        <title>Order Rejected on the SD CANTEEN</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
        <div style='text-align:center'><h4>Hi, $fullname</h4></div>
        <div style='color:rgb(104, 104, 104);text-align:center;font-size:4vw'>
       Welcome to SD CANTEEN!
        </div>
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.6vw'>Your order with Token Number : <b> $orderId</b> has been <span style='color:red;'>rejected</span></div>
       <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Please place your order responsibly.</div>
       <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Note:</b>Cash On Delivery has been disabled for your account for  lifetime.</div>
       <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
       <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
       <div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>If you think this request was made wrongly, you can contact customer support.</div> 
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
    
    </body>
</html>
";
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                    $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";


                    $result = mail($to, $subject, $message, $headers);
                   



}

// ! if success
else{

  if($paymentinfo=="pending"){

    $updateMainRecord="update orderitems set paymentstatus='success',paymentinfo='success',orderstatus='complete',amountreceived=$amountReceived where id=$mainOrderID";
    $execute=mysqli_query($connection,$updateMainRecord);
    
  }else{


    $updateMainRecord="update orderitems set paymentstatus='success',orderstatus='complete',amountreceived=$amountReceived where id=$mainOrderID";
    $execute=mysqli_query($connection,$updateMainRecord);
    
  }
  
  
  
    $to = $email;
                      $subject = "Your order is complete on SD CANTEEN";
                      $message = "
  <html>
      <head>
          <title>Your order is complete on SD CANTEEN</title>
      </head>
  
      <body>
          <div>
          <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
          </div>
          <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
 <div style='text-align:center'><h4>Hi, $fullname</h4></div>
 <div style='color:rgb(104, 104, 104);text-align:center;font-size:4vw'>
Welcome to SD CANTEEN!
 </div>
<div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.5vw'>Your order with Token Number : <b> $orderId</b> has been <span style='color:blue;'>completed</span></div>
<div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Thanks for placing an order using the SD CANTEEN </div>
<div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Please don't forget to give ratings to the items by opening them on the SD CANTEEN website.</div>
<div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
<div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
<div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>If you think this request was made wrongly, you can contact customer support.</div> 
 <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
      
      </body>
  </html>
  ";
                      // Always set content-type when sending HTML email
                      $headers = "MIME-Version: 1.0" . "\r\n";
                      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                      $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";
  
  
                      $result = mail($to, $subject, $message, $headers);
                     
  
  
  
}

}





}
}




//! reject order
if (isset($_POST['rejectOrder']) && isset($_POST['id'])){
  $id= $_POST['id'];
$GetQuery="select*from itemlist where id=$id";
$res=mysqli_query($connection,$GetQuery);

$row=mysqli_num_rows($res);
if($row> 0){

  $data=mysqli_fetch_assoc($res);

  $price=$data['itemPrice'];
  $mainOrderID=$data['mainOrderId'];
 
  
$query="update itemlist set orderstatus='reject',paymentstatus='reject', amountreceived='0' where id=$id";
$res=mysqli_query($connection,$query);

// !  update in orderTrack DB
$orderTrack="select*from ordertrack where itemId=$id";
$orderTrackRes=mysqli_query($connection,"$orderTrack");
$numberOfRecords=mysqli_num_rows($orderTrackRes);
// means update reject to + 1
$orderTrackData=mysqli_fetch_assoc($orderTrackRes);
$reject=$orderTrackData["reject"];
$pending=$orderTrackData["pending"];
$ids=$orderTrackData["id"];
++$reject;
--$pending;
$insertOrderTrack="update ordertrack set reject=$reject,pending=$pending where id=$ids";
$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);






$mainQuery="select*from orderitems where id=$mainOrderID";
$userDataRes=mysqli_query($connection,$mainQuery);
$userData=mysqli_fetch_assoc($userDataRes);
$email=$userData['email'];
$userId=$userData['id'];
$paymentinfo=$userData['paymentinfo'];
$fullname=$userData['fullname'];
$orderId=$userData['orderId'];

// update main orderitem status if all particular item complete
$q="select*from itemlist where mainOrderId=$mainOrderID";
$res1=mysqli_query($connection,$q);
$count=mysqli_num_rows($res1);

$counter=0;
$reject=0;
$amountReceived=0;
while($dataCheck=mysqli_fetch_assoc($res1)){
if($dataCheck["orderstatus"]=="complete"){
  $counter++;
  $amountReceived+=$dataCheck["amountreceived"];
}
if($dataCheck["orderstatus"]=="reject"){
  $reject++; $counter++;
}
}

// all orders processed

if($count==$counter){
// check any reject order
if($reject>0){
$userDataUpdate="update clientdata set cod='disabled' where id=$userId";


if($paymentinfo=="pending"){
  $updateMainRecord="update orderitems set paymentstatus='failed',paymentinfo='failed',orderstatus='reject',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
  $execute1=mysqli_query($connection,$userDataUpdate);

}else{


  $updateMainRecord="update orderitems set paymentstatus='failed',orderstatus='reject',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
  $execute1=mysqli_query($connection,$userDataUpdate);
}




  $to = $email;
                    $subject = "Order Rejected on the SD CANTEEN";
                    $message = "
<html>
    <head>
        <title>Order Rejected on the SD CANTEEN</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
        <div style='text-align:center'><h4>Hi, $fullname</h4></div>
        <div style='color:rgb(104, 104, 104);text-align:center;font-size:4vw'>
       Welcome to SD CANTEEN!
        </div>
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.6vw'>Your order with Token Number : <b> $orderId</b> has been <span style='color:red;'>rejected</span></div>
       <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Please place your order responsibly.</div>
       <div style='font-size:3vw;color:#4f4f4f;margin-top:4%'><b>Note:</b>Cash On Delivery has been disabled for your account for  lifetime.</div>
       <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
       <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
       <div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>If you think this request was made wrongly, you can contact customer support.</div> 
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
    
    </body>
</html>
";
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                    $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";


                    $result = mail($to, $subject, $message, $headers);
                   



}
else{

if($paymentinfo== "pending"){

  $updateMainRecord="update orderitems set paymentstatus='success',paymentinfo='success',orderstatus='complete',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
}

else{


  $updateMainRecord="update orderitems set paymentstatus='success',orderstatus='complete',amountreceived=$amountReceived where id=$mainOrderID";
  $execute=mysqli_query($connection,$updateMainRecord);
}
  
  
  
  
    $to = $email;
                      $subject = "Your order is complete on SD CANTEEN";
                      $message = "
  <html>
      <head>
          <title>Your order is complete on SD CANTEEN</title>
      </head>
  
      <body>
          <div>
          <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
          </div>
          <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
 <div style='text-align:center'><h4>Hi, $fullname</h4></div>
 <div style='color:rgb(104, 104, 104);text-align:center;font-size:4vw'>
Welcome to SD CANTEEN!
 </div>
<div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3.5vw'>Your order with Token Number : <b> $orderId</b> has been <span style='color:blue;'>completed</span></div>
<div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Thanks for placing an order using the SD CANTEEN </div>
<div style='font-size:3vw;color:#4f4f4f;margin-top:4%'>Please don't forget to give ratings to the items by opening them on the SD CANTEEN website.</div>
<div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
<div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
<div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>If you think this request was made wrongly, you can contact customer support.</div> 
 <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
      
      </body>
  </html>
  ";
                      // Always set content-type when sending HTML email
                      $headers = "MIME-Version: 1.0" . "\r\n";
                      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                      $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";
  
  
                      $result = mail($to, $subject, $message, $headers);
                     
  
  
  
}

}





}
}






// search By Token Id
if (isset($_POST['searchByTokenId']) && isset($_POST['input'])) {

$input=$_POST['input'];

  date_default_timezone_set("Asia/Calcutta");
  $currentDate = date("d-m-Y");
  $currentTime = date("h:i:s A");
$query="select*from orderitems where orderId like '%$input%' and orderdate like '$currentDate'  order by pickuptime24";
$res=mysqli_query($connection, $query);
$row=mysqli_num_rows($res);

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
$query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken' ";
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
<div class="div5">
<?php $price=$subData['itemPrice'];
$qty=$subData['qty'];
$total=$price*$qty;
echo $total;?>

</div>
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










<!-- down down menu -->
<?php 
// only pending will show drop down menu
if($subData['orderstatus']=="pending"){
?>

<!-- icon of menu -->
<div class="div8" >
<!-- open menu-->
<i class="fa-solid fa-bars" id="dropDownMenuOpenIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")' style="cursor:pointer"></i>

<!-- close menu -->
<i style="display:none" id="dropDownMenuCloseIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")'><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg></i>

</div>
<div class="options" id="dropDownMenu<?php echo $subData['id']?>" style="display:none">
<div onclick='processOrderMenu("<?php echo $subData['id']?>")'><span class="icon1">
<i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
</div>

<div onclick='processOrderReject("<?php echo $subData['id']?>")'><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
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



<!-- update form -->
<!-- updateMenu -->

<div class="update" id="UpdateFormDiv<?php echo $subData['id']; ?>" style="display:none">
<div class="div1"><?php echo $subData['itemName'];?></div>
<div class="div2"><?php echo $subData['itemPrice'];?></div>
<div class="div3"><?php echo $subData['qty'];?></div>
<div class="div4"><?php echo $subData['category'];?>
</div>
<div class="div5" id="totalAmount<?php echo $subData['id']?>"><?php 
$price=$subData['itemPrice'];
$qty=$subData['qty'];
$total=$price*$qty;
echo $total;?></div>
<div class="div6">
<input type="text" id="amountReceived<?php echo $subData['id']?>" value="<?php

echo $subData['amountreceived'];?>">
<input type="text" id="maincategory<?php echo $subData['id']?>" value="<?php echo $subData['maincategory'];?>" style="display:none">
</div>
<div class="div7">
<select id="orderStatus<?php echo $subData['id']?>">
<option value="pending">Pending</option>
<option value="complete">Complete</option>
</select>
</div>
<div class="div8">


<svg class="tick" onclick='sendOrderForProcess("<?php echo $subData['id']?>")' stroke="currentColor" title="Update" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg>

<!-- close menu -->
<svg onclick='processOrderMenuClose("<?php echo $subData['id']?>")' class="back" onclick='processOrder("<?php echo $subData['id']?>")' title="close menu" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
</div>
</div>




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
<h6>No orders Found</h6>
<?php
}

}



// search By Customer Name
if (isset($_POST['searchByCustomerName']) && isset($_POST['input'])) {

  $input=$_POST['input'];

    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("d-m-Y");
    $currentTime = date("h:i:s A");
  $query="select*from orderitems where fullname like '%$input%' and orderdate like '$currentDate'  order by pickuptime24";
  $res=mysqli_query($connection, $query);
  $row=mysqli_num_rows($res);
  
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
  $query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken' ";
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
  <div class="div5">
  <?php $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?>
  
  </div>
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
  
  
  
  
  
  
  
  
  
  
  <!-- down down menu -->
  <?php 
  // only pending will show drop down menu
  if($subData['orderstatus']=="pending"){
  ?>
  
  <!-- icon of menu -->
  <div class="div8" >
  <!-- open menu-->
  <i class="fa-solid fa-bars" id="dropDownMenuOpenIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")' style="cursor:pointer"></i>
  
  <!-- close menu -->
  <i style="display:none" id="dropDownMenuCloseIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")'><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg></i>
  
  </div>
  <div class="options" id="dropDownMenu<?php echo $subData['id']?>" style="display:none">
  <div onclick='processOrderMenu("<?php echo $subData['id']?>")'><span class="icon1">
  <i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
  </div>
  
  <div onclick='processOrderReject("<?php echo $subData['id']?>")'><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
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
  
  
  
  <!-- update form -->
  <!-- updateMenu -->
  
  <div class="update" id="UpdateFormDiv<?php echo $subData['id']; ?>" style="display:none">
  <div class="div1"><?php echo $subData['itemName'];?></div>
  <div class="div2"><?php echo $subData['itemPrice'];?></div>
  <div class="div3"><?php echo $subData['qty'];?></div>
  <div class="div4"><?php echo $subData['category'];?>
  </div>
  <div class="div5" id="totalAmount<?php echo $subData['id']?>"><?php 
  $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?></div>
  <div class="div6">
  <input type="text" id="amountReceived<?php echo $subData['id']?>" value="<?php
  
  echo $subData['amountreceived'];?>">
  <input type="text" id="maincategory<?php echo $subData['id']?>" value="<?php echo $subData['maincategory'];?>" style="display:none">
  </div>
  <div class="div7">
  <select id="orderStatus<?php echo $subData['id']?>">
  <option value="pending">Pending</option>
  <option value="complete">Complete</option>
  </select>
  </div>
  <div class="div8">
  
  
  <svg class="tick" onclick='sendOrderForProcess("<?php echo $subData['id']?>")' stroke="currentColor" title="Update" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg>
  
  <!-- close menu -->
  <svg onclick='processOrderMenuClose("<?php echo $subData['id']?>")' class="back" onclick='processOrder("<?php echo $subData['id']?>")' title="close menu" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
  </div>
  </div>
  
  
  
  
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
 <h6>No orders Found</h6>
  <?php
  }
  
  }
  





  // search By Time Slot
if (isset($_POST['searchByTimeSlot']) && isset($_POST['input'])) {

  $input=$_POST['input'];

    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("d-m-Y");
    $currentTime = date("h:i:s A");
  $query="select*from orderitems where pickuptime like '%$input%' and orderdate like '$currentDate'  order by pickuptime24";
  $res=mysqli_query($connection, $query);
  $row=mysqli_num_rows($res);
  
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
  $query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken' ";
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
  <div class="div5">
  <?php $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?>
  
  </div>
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
  
  
  
  
  
  
  
  
  
  
  <!-- down down menu -->
  <?php 
  // only pending will show drop down menu
  if($subData['orderstatus']=="pending"){
  ?>
  
  <!-- icon of menu -->
  <div class="div8" >
  <!-- open menu-->
  <i class="fa-solid fa-bars" id="dropDownMenuOpenIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")' style="cursor:pointer"></i>
  
  <!-- close menu -->
  <i style="display:none" id="dropDownMenuCloseIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")'><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg></i>
  
  </div>
  <div class="options" id="dropDownMenu<?php echo $subData['id']?>" style="display:none">
  <div onclick='processOrderMenu("<?php echo $subData['id']?>")'><span class="icon1">
  <i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
  </div>
  
  <div onclick='processOrderReject("<?php echo $subData['id']?>")'><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
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
  
  
  
  <!-- update form -->
  <!-- updateMenu -->
  
  <div class="update" id="UpdateFormDiv<?php echo $subData['id']; ?>" style="display:none">
  <div class="div1"><?php echo $subData['itemName'];?></div>
  <div class="div2"><?php echo $subData['itemPrice'];?></div>
  <div class="div3"><?php echo $subData['qty'];?></div>
  <div class="div4"><?php echo $subData['category'];?>
  </div>
  <div class="div5" id="totalAmount<?php echo $subData['id']?>"><?php 
  $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?></div>
  <div class="div6">
  <input type="text" id="amountReceived<?php echo $subData['id']?>" value="<?php
  
  echo $subData['amountreceived'];?>">
  <input type="text" id="maincategory<?php echo $subData['id']?>" value="<?php echo $subData['maincategory'];?>" style="display:none">
  </div>
  <div class="div7">
  <select id="orderStatus<?php echo $subData['id']?>">
  <option value="pending">Pending</option>
  <option value="complete">Complete</option>
  </select>
  </div>
  <div class="div8">
  
  
  <svg class="tick" onclick='sendOrderForProcess("<?php echo $subData['id']?>")' stroke="currentColor" title="Update" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg>
  
  <!-- close menu -->
  <svg onclick='processOrderMenuClose("<?php echo $subData['id']?>")' class="back" onclick='processOrder("<?php echo $subData['id']?>")' title="close menu" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
  </div>
  </div>
  
  
  
  
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
 <h6>No orders Found</h6>
  <?php
  }
  
  }






    // search By Item category
if (isset($_POST['searchByItemCategory']) && isset($_POST['input'])) {

  $input=$_POST['input'];

  date_default_timezone_set("Asia/Calcutta");
  $currentDate = date("d-m-Y");
  $currentTime = date("h:i:s A");

  $mainQuery="select*from itemlist where maincategory like '%$input%'";
$resMainQuery=mysqli_query($connection, $mainQuery);
$mainQueryCount=mysqli_num_rows($resMainQuery);

if($mainQueryCount> 0){
while($MainQueryData=mysqli_fetch_array($resMainQuery)){

$orderToken=$MainQueryData['ordertoken'];
$mainOrderId=$MainQueryData['mainOrderId'];
$query="select*from orderitems where id=$mainOrderId and orderdate like '$currentDate'";
$resExecute=mysqli_query($connection, $query);
$rowCount=mysqli_num_rows($resExecute);

while($data=mysqli_fetch_array($resExecute)){
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
  $query2="select*from itemlist where mainOrderId=$mainOrderId and ordertoken like '$orderToken' and maincategory like '%$input%'";
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
  <div class="div5">
  <?php $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?>
  
  </div>
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
  
  
  
  
  
  
  
  
  
  
  <!-- down down menu -->
  <?php 
  // only pending will show drop down menu
  if($subData['orderstatus']=="pending"){
  ?>
  
  <!-- icon of menu -->
  <div class="div8" >
  <!-- open menu-->
  <i class="fa-solid fa-bars" id="dropDownMenuOpenIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")' style="cursor:pointer"></i>
  
  <!-- close menu -->
  <i style="display:none" id="dropDownMenuCloseIcon<?php echo $subData['id']?>" onclick='processOrder("<?php echo $subData['id']?>")'><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_close__Z7iJl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor"></path><path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor"></path><path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor"></path><path d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z" fill="currentColor"></path></svg></i>
  
  </div>
  <div class="options" id="dropDownMenu<?php echo $subData['id']?>" style="display:none">
  <div onclick='processOrderMenu("<?php echo $subData['id']?>")'><span class="icon1">
  <i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
  </div>
  
  <div onclick='processOrderReject("<?php echo $subData['id']?>")'><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
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
  
  
  
  <!-- update form -->
  <!-- updateMenu -->
  
  <div class="update" id="UpdateFormDiv<?php echo $subData['id']; ?>" style="display:none">
  <div class="div1"><?php echo $subData['itemName'];?></div>
  <div class="div2"><?php echo $subData['itemPrice'];?></div>
  <div class="div3"><?php echo $subData['qty'];?></div>
  <div class="div4"><?php echo $subData['category'];?>
  </div>
  <div class="div5" id="totalAmount<?php echo $subData['id']?>"><?php 
  $price=$subData['itemPrice'];
  $qty=$subData['qty'];
  $total=$price*$qty;
  echo $total;?></div>
  <div class="div6">
  <input type="text" id="amountReceived<?php echo $subData['id']?>" value="<?php
  
  echo $subData['amountreceived'];?>">
  <input type="text" id="maincategory<?php echo $subData['id']?>" value="<?php echo $subData['maincategory'];?>" style="display:none">
  </div>
  <div class="div7">
  <select id="orderStatus<?php echo $subData['id']?>">
  <option value="pending">Pending</option>
  <option value="complete">Complete</option>
  </select>
  </div>
  <div class="div8">
  
  
  <svg class="tick" onclick='sendOrderForProcess("<?php echo $subData['id']?>")' stroke="currentColor" title="Update" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="RealtimeOrder_tick__MD5Un" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Update</title><path d="M11 20c-.801 0-1.555-.312-2.121-.879l-4-4c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.122c1.133-1.133 3.109-1.133 4.242 0l1.188 1.188 3.069-5.523c.526-.952 1.533-1.544 2.624-1.544.507 0 1.012.131 1.456.378.7.39 1.206 1.028 1.427 1.798.221.771.127 1.581-.263 2.282l-5 9c-.454.818-1.279 1.384-2.206 1.514-.139.019-.277.029-.416.029zm-4-8c-.268 0-.518.104-.707.293s-.293.439-.293.707.104.518.293.707l4 4c.223.221.523.33.844.283.312-.043.586-.232.737-.504l5-9c.13-.233.161-.503.088-.76-.073-.257-.243-.47-.478-.6-.473-.264-1.101-.078-1.357.388l-4.357 7.841-3.062-3.062c-.19-.189-.44-.293-.708-.293z"></path></svg>
  
  <!-- close menu -->
  <svg onclick='processOrderMenuClose("<?php echo $subData['id']?>")' class="back" onclick='processOrder("<?php echo $subData['id']?>")' title="close menu" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="RealtimeOrder_back__KRJO_" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Back</title><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
  </div>
  </div>
  
  
  
  
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
}
else{
?>
<h6>No orders Found</h6>
<?php

}


}

}





?>