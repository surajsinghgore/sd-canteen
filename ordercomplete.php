


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/orderdetails.css?v=1">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
   
    window.document.title = "SD CANTEEN | order complete";
</script>

<body >
    <div class="admin">





        <!-- header -->
        <?php require('./components/Header.php');


        ?>




    

<div class="order">
        <div class="titleSection">
          <h1>All Today&#39;s Pending Order 

<!-- remove elements for cart after order placed -->
       
<?php 

if(isset($_SESSION['redirect'])) {
    ?> 
  <script>
  localStorage.setItem("cartItem", '{"items":[],"isEmpty":true,"totalItems":0,"totalUniqueItems":0,"cartTotal":0}');
  browser.history.deleteAll()
localStorage.removeItem('orderTime');
window.document.location.reload(); 
   </script>

<?php

unset($_SESSION['redirect']);
}
?>


             

            
             

      
         
           
         
           
     

       
  </h1>
          <h2>
            Total Order Placed : <span id="totalItems">0</span>
          </h2>
        </div>
        <div class="orderToday">
          <h5><?php  date_default_timezone_set("Asia/Calcutta");
            $currentDate = date("d-m-Y");
      echo $currentDate;
            ?></h5>
          <h6 id="clock"></h6>
        </div>
 
<!-- fetch todays order -->
<?php 

 // <!-- validate client login -->
 require('./middleware/VerifyClientLogin.php');
 
 // require connection for table
 require('./middleware/ConnectToDatabase.php');

$activeUserId=$_SESSION['activeClientId'];

$mainQuery="select* from orderitems where userId=$activeUserId and orderdate like '$currentDate' and orderstatus like 'pending'";
$resMain=mysqli_query($connection,$mainQuery);
$mainCount=mysqli_num_rows($resMain);

if($mainCount>0){

$query="select* from orderitems where userId=$activeUserId and orderdate like '$currentDate' and orderstatus like 'pending' order by pickuptime24 ";
$res=mysqli_query($connection,$query);
$countRecord=mysqli_num_rows($res);
// todays orders
if($countRecord>0){


  while($data=mysqli_fetch_array($res)){

    ?>

<div class="orders">
<div class="pickuptime" style="display:none"> <?php echo $data['pickuptime24'];?></div>
                      <div class="top">
                        <div class="left">
                          <h3  >
                            ORDER TOKEN:
                            <span
                             class="orderIds"
                            
                            >
                            <?php echo $data['orderId'];?>
                            </span>
                          </h3>
                          <p>Estimated Delivery time</p>
                        </div>
                        <div class="right">
<div class="hours" id="hours<?php echo $data['orderId'];?>" >4</div>
<div class="mins" id="mins<?php echo $data['orderId'];?>">4</div>
<div class="sec" id="sec<?php echo $data['orderId'];?>">34</div>

<!-- CountDown -->
</div>
                      </div>
                      <hr class="hr" />
                      <h3>Order Details</h3>
                      <div class="details">
                        <div class="personal">
                          <h3>Personal Details:</h3>
                          <div class="detailsInner">
                            <div class="title">User Name : </div>
                            <div class="data">       <?php echo $data['fullname'];?></div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">User Email : </div>
                            <div class="data">       <?php echo $data['email'];?></div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">User Mobile:</div>
                            <div class="data">+91-       <?php echo $data['mobile'];?></div>
                          </div>
                        </div>
                        <div class="orderRelated">
                          <h3>Order Details:</h3>
                          <div class="detailsInner">
                            <div class="title ">
                              Order Pickup Time:
                            </div>
                            <div class="data">    
                                 <?php echo $data['pickuptime'];?>
                               
                                </div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">Order Date: </div>
                            <div class="data">       <?php echo $data['orderdate'];?></div>
                          </div>

                          <div class="detailsInner">
                            <div class="title">Order status: </div>
                            <div class="data">
                            <?php echo $data['orderstatus'];?>
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr class="hr" />

                      <div class="items">
                        <h3>Items Order</h3>
                        <hr class="hr1" />

                        <div class="ItemcardHeading">
                          <li class="foodName"> Item Name</li>
                          <li class="size">Item Size</li>
                          <li class="price"> Original Price</li>
                          <li class="qty">Qty Book</li>
                          <li class="rupee"> Price</li>
                        </div>

                       <!-- data items order -->
<!-- data here -->
<?php

$orderToken=$data['orderId'];
$txn_token=$data['txn_token'];
$dataQuery="select*from itemlist where userId=$activeUserId and ordertoken='$orderToken' and txn_token='$txn_token'";

$resItemList=mysqli_query($connection,$dataQuery);


while($itemData=mysqli_fetch_array($resItemList)){
  ?>
<div >
                                  <hr class="hr1" />
                                  <div class="Itemcard">
                                    <li class="foodName">
                                      
                                    <?php echo $itemData['itemName'];?>
                                    </li>
                                    <li class="size">  <?php echo $itemData['size'];?></li>
                                    <li class="price">
                                     
                                    <?php  echo $itemData['itemPrice'];?>
                                    </li>
                                    <li class="qty"> <?php echo $itemData['qty'];?></li>
                                    <li class="rupee">
                                     
                                      ₹  <?php  $calulateTotal=$itemData['itemPrice']*$itemData['qty'];
                                      echo $calulateTotal;
                                      ?>
                                    </li>
                                  </div>
                                </div>

  <?php
}


?>
                      
                             
                             
                      </div>

                      <hr class="hr" />

                      <h3>Payment Details</h3>
                      <div class="details">
                        <div class="personal">
                          <h3>Payment Method:</h3>

                          <!-- online -->
                          <!-- order status -->

                          <?php 
                          // if online
                          if($data['paymentmethod']=="online"){
?>
  <div class="detailsInner">
                            <svg class="card"stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="OrderDetails_card__5Pubz" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M928 160H96c-17.7 0-32 14.3-32 32v160h896V192c0-17.7-14.3-32-32-32zM64 832c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V440H64v392zm579-184c0-4.4 3.6-8 8-8h165c4.4 0 8 3.6 8 8v72c0 4.4-3.6 8-8 8H651c-4.4 0-8-3.6-8-8v-72z"></path></svg>
                            <div class="title1">
                            Online
                              </div>
                            </div>

<?php

                            
                          }
                          
                          // if cod
                          else
                          {
?>
  <div class="detailsInner">
  <i class="fa-solid fa-money-bill card"></i>
                            <div class="title1">
                            Cod
                              </div>
                            </div>

<?php



                          }?>
                           
                          

                          
                        
                        </div>
                        <div class="orderRelated">
                          <div class="detailsInner">
                            <div class="title">Total Amount: </div>
                            <div class="data">
                              ₹ <?php echo $data['totalamount'];?>
                            </div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">
                              Total Item Order:
                            </div>
                            <div class="data">
                             1
                            </div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">
                              Amount Received:
                            </div>
                            <div class="data">
                              
                              ₹ <?php echo $data['amountreceived'];?>
                            </div>
                          </div>
                          <hr class="hr2" />
                          <div class="detailsInner">
                            <div class="title">Total: </div>
                            <div class="data1">
                              
                              ₹ <?php echo $data['totalamount'];?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                 

<?php


  }


}





}
// no records found
else{

?>
<div class="notFood">
                <h3 style="margin-bottom:20px">No Order Placed Today</h3>
              
                  <a href="/sd-canteen/fooditem.php"><button>Buy Now Food</button></a>
              
              </div>
<?php
}
?>

                   

                    <!-- no order today -->
              
            
      </div>




    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>


    <script>




      for (let index = 0; index < document.getElementsByClassName('orders').length; index++) {

        let getIdsMainName=document.getElementsByClassName('orderIds')[index].innerText;
let time=document.getElementsByClassName('pickuptime')[index].innerText;


countDown(time,getIdsMainName);
  


}


// countdown timer

function countDown(time,id){


let date=new Date();
Dd=date.getDate();
Mm=parseInt(date.getMonth());
++Mm;
Yy=date.getFullYear();

let arrayOfTime = time.split(':');

let hoursInt=parseInt(arrayOfTime[0])
Hou=hoursInt;
let minutesInt=parseFloat(arrayOfTime[1])
Min=minutesInt;

let Sec=0;






const target=new Date(`${Mm}/${Dd}/${Yy} ${Hou}:${Min}:${Sec}`);



var x = setInterval(function() {

// Get the current date and time
var now = new Date().getTime();

// Find the distance between now and the target time
var distance = target - now;
if(distance>=0){





// Calculate time units
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

if(parseInt(document.getElementById(`hours${id}`).innerText)>=0){
  document.getElementById(`hours${id}`).innerText=hours;

}
// minutes
if(parseInt(document.getElementById(`mins${id}`).innerText)>=0){
  document.getElementById(`mins${id}`).innerText=minutes;
}


// seconds
if(parseInt(document.getElementById(`sec${id}`).innerText)>=0){
  document.getElementById(`sec${id}`).innerText=seconds;
}


}else{
  document.getElementById(`sec${id}`).innerText="0";
  document.getElementById(`mins${id}`).innerText="0";
  document.getElementById(`hours${id}`).innerText="0";
}
}, 1000);





}




// website current time realtime logic
function updateTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    // Add leading zeros if the value is less than 10
    hours1 = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // If hours is 0, set it to 12
    // Add leading zeros if the value is less than 10
    hours = hours < 10 ? '0' + hours : hours;
    var timeString = ""
    if(hours1>=12){
      timeString=hours + ':' + minutes + ':' + seconds+" PM";
    }else{
      timeString=hours + ':' + minutes + ':' + seconds+" AM";

    }
    document.getElementById('clock').innerText = timeString;
}

// Call updateTime every second
setInterval(updateTime, 1000);

document.getElementById('totalItems').innerText=document.getElementsByClassName('orders').length;

    </script>

    




  
</body>

</html>