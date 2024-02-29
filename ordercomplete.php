
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/orderdetails.css?v=1">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | order complete";
</script>

<body>
    <div class="admin">





        <!-- header -->
        <?php require('./components/Header.php');


        ?>




    

<div class="order">
        <div class="titleSection">
          <h1>All Today&#39;s Pending Order 
            
<!-- clear cart if just book items -->
       
            <?php 
if(isset($_SESSION['orderComplete'])){

if($_SESSION['orderComplete']=="true"){



?>
<script>
  localStorage.setItem("cartItem", '{"items":[],"isEmpty":true,"totalItems":0,"totalUniqueItems":0,"cartTotal":0}');
  window.document.location.reload();
</script>
<?php

unset($_SESSION["orderComplete"]);
}
}


?></h1>
          <h2>
            Total Order Placed : <span>23</span>
          </h2>
        </div>
        <div class="orderToday">
          <h5><?php  date_default_timezone_set("Asia/Calcutta");
            $currentDate = date("d-m-Y");
      echo $currentDate;
            ?></h5>
          <h6 id="clock"></h6>
        </div>
 



                    <div class="orders" >
                      <div class="top">
                        <div class="left">
                          <h3>
                            ORDER TOKEN:
                            <span
                             
                            
                            >
                            LF1LZ8
                            </span>
                          </h3>
                          <p>Estimated Delivery time</p>
                        </div>
                        <!-- <CountDownTimer
                          date={item.OrderDate}
                          time={item.PickUpTime2}
                        /> -->
                      </div>
                      <hr class="hr" />
                      <h3>Order Details</h3>
                      <div class="details">
                        <div class="personal">
                          <h3>Personal Details:</h3>
                          <div class="detailsInner">
                            <div class="title">User Name : </div>
                            <div class="data">suraj singh</div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">User Email : </div>
                            <div class="data">surajthakurrs45@gmail.com</div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">User Mobile:</div>
                            <div class="data">+91-2345678987</div>
                          </div>
                        </div>
                        <div class="orderRelated">
                          <h3>Order Details:</h3>
                          <div class="detailsInner">
                            <div class="title">
                              Order Pickup Time:
                            </div>
                            <div class="data">3.15-pm</div>
                          </div>
                          <div class="detailsInner">
                            <div class="title">Order Date: </div>
                            <div class="data">24.2.2024</div>
                          </div>

                          <div class="detailsInner">
                            <div class="title">Order status: </div>
                            <div class="data">
                              Pending
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
                                <div >
                                  <hr class="hr1" />
                                  <div class="Itemcard">
                                    <li class="foodName">
                                      
                                    Aloo tikki burger
                                    </li>
                                    <li class="size"> normalsize</li>
                                    <li class="price">
                                     
                                      30
                                    </li>
                                    <li class="qty">1</li>
                                    <li class="rupee">
                                     
                                      ₹ 30
                                    </li>
                                  </div>
                                </div>
                             
                      </div>

                      <hr class="hr" />

                      <h3>Payment Details</h3>
                      <div class="details">
                        <div class="personal">
                          <h3>Payment Method:</h3>

                          <!-- online -->
                          
                            <div class="detailsInner">
                            <svg class="card"stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="OrderDetails_card__5Pubz" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M928 160H96c-17.7 0-32 14.3-32 32v160h896V192c0-17.7-14.3-32-32-32zM64 832c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V440H64v392zm579-184c0-4.4 3.6-8 8-8h165c4.4 0 8 3.6 8 8v72c0 4.4-3.6 8-8 8H651c-4.4 0-8-3.6-8-8v-72z"></path></svg>
                            <div class="title1">
                            online
                              </div>
                            </div>
                          

                            <!-- cod -->
                            <!-- <div class="detailsInner">
                              <BsCashStack class="card" />
                              <div class="title1">
                                COD
                              </div>
                            </div> -->
                        
                        </div>
                        <div class="orderRelated">
                          <div class="detailsInner">
                            <div class="title">Total Amount: </div>
                            <div class="data">
                              ₹ 30
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
                              
                              ₹ 30
                            </div>
                          </div>
                          <hr class="hr2" />
                          <div class="detailsInner">
                            <div class="title">Total: </div>
                            <div class="data1">
                              
                              ₹ 30
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                 

                    <!-- no order today -->
              <!-- <div class="notFood">
                <h3>No Order Placed Today</h3>
                <Link href="/FoodItem">
                  <button>Buy Now Food</button>
                </Link>
              </div> -->
            
      </div>




    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>


    <script>


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
    </script>
</body>

</html>