<?php


require('./middleware/VerifyClientLogin.php');?>


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/orderdetails.css?v=10">
<link rel="stylesheet" href="./styles/client/cart.css?v=3">

<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Order Timing";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>
        <div class="admin">







    </div>

   <!-- order timing page -->

 
  
   <div class="cart">
        <h1> Order Details </h1>
        <div class="progressTop">
          <hr />

          <div class="number">
            <div class="num1">
              <div class="circle">
                <span>1</span>
              </div>
              <div class="description">
                <p> SHOPPING CART </p>
              </div>
            </div>
          </div>

          <div class="number">
            <div class="num1">
              <div class="circle circle1">
            
                <span>2</span>
              </div>
              <div class="description">
                <p> ORDER DETAILS </p>
              </div>
            </div>
          </div>

          <div class="number">
            <div class="num1">
              <div class="circle">
             
                <span>3</span>
              </div>
              <div class="description">
                <p> PAYMENT METHOD </p>
              </div>
            </div>
          </div>
        </div>

        <div class="orderDetails">
          <div class="orderTable">
          
              <div>
                <h4>Please order food 10 minutes before pickup</h4>
                <h3>Select Pickup Time</h3>
              </div>
            
          </div>



          <!-- check weather order is allowed from backend or not -->

          <?php 
        require('./middleware/ConnectToDatabase.php');
          

        $query="select*from orderonoffstatus";
       $res= mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($res);



if($data['status']=="true"){

?>


          <div class="TimeBox" id="TimingBox">
          
       
              
              


      
          </div>
          <?php 
}


          ?>
          <div class="BottomMessage" id="BottomMessage">
           <?php 
           
           if($data["status"]== "true"){


            ?>
<h6>Note: Order Can&#39;t Cancelled Once Placed.</h6>
            <?php
           }

           else{


            ?>

<div class="message">
Orders are not allowed to be placed after <span>5.51 PM</span> from <span>Monday</span> to <span>Saturday.</span> . We are closed on <span>Sundays</span> and <span>Holidays</span>.
               
              </div>
            <?php

           }
             ?>
              
           
          
              
            
          </div>

  
          <div class="bottom">
            <Link href="/Cart">
              <button class="more">Cart Page</button>
            </Link>
            <div class="subtotal" id="BottomBtns">
    
            


               
             
                
            </div>
          </div>
        </div>
      </div>







    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   

    <!-- loading timing dynamic -->
    <script type="module"> 

import data from './data/Timing2.js';
if(document.getElementById('TimingBox')){

let Dates=new Date();

let m = parseInt(Dates.getMinutes());
    let h = parseInt(Dates.getHours());

m = m + 10;
    if (m <= 9) {
      m = "0" + m;
    }
    if (m > 59) {
      m = 0;
      h = h + 1;
      m = m + 10;
    }

    let times = `${h}.${m}`;

// check weather today is sunday or not
// 0 means sunday
if(Dates.getDay()==0){



  let datass=data.filter((items)=>{
return items.time>=times;

})

if(datass.length==0){
  document.getElementById('BottomMessage').innerHTML=`<div class="message">
Orders are not allowed to be placed after <span>5.51 PM</span> from <span>Monday</span> to <span>Saturday.</span> . We are closed on <span>Sundays</span> and <span>Holidays</span>.`;

document.getElementById('BottomBtns').innerHTML=`
  <button
                  style="cursor: not-allowed;"
                  
                  disabled
                >
                  Order Is Off
                </button>
  `;
}

else{
  document.getElementById('BottomBtns').innerHTML=`
  <a href="/sd-canteen/paymentmethod.php"><button>Continue Order</button></a>`;
}
datass.map((item,index)=>{


  document.getElementById('TimingBox').innerHTML+=`
<div class="box" >
                <div class="btn">
                
                    <input
                      type="radio"
                      name="time"
                      id="box${item.time1}"
                   onclick='setTimeForOrder("${item.time}","${item.time1}")'
                    />
                
                 
            
                </div>

                <div class="time">
                  <h4>
                    <label for="box${item.time1}">
                      ${item.time1} 
                    </label>
                  </h4>
                </div>
              </div>
`;
})



}

// means not sunday
else{

 
  let datass=data.filter((items)=>{
return items.time>=times;

})

if(datass.length==0){
  document.getElementById('BottomMessage').innerHTML=`<div class="message">
Orders are not allowed to be placed after <span>5.51 PM</span> from <span>Monday</span> to <span>Saturday.</span> . We are closed on <span>Sundays</span> and <span>Holidays</span>.`;

document.getElementById('BottomBtns').innerHTML=`
  <button
                  style="cursor: not-allowed;"
                  
                  disabled
                >
                  Order Is Off
                </button>
  `;
}

else{
  document.getElementById('BottomBtns').innerHTML=`
  <a href="/sd-canteen/paymentmethod.php"><button>Continue Order</button></a>`;
}
datass.map((item,index)=>{


  document.getElementById('TimingBox').innerHTML+=`
<div class="box" >
                <div class="btn">
                
                    <input
                      type="radio"
                      name="time"
                      id="box${item.time1}"
                   onclick='setTimeForOrder("${item.time}","${item.time1}")'
                    />
                
                 
            
                </div>

                <div class="time">
                  <h4>
                    <label for="box${item.time1}">
                      ${item.time1} 
                    </label>
                  </h4>
                </div>
              </div>
`;
})


}

}
else{

  document.getElementById('BottomBtns').innerHTML=`
  <button
                  style="cursor: not-allowed;"
                  
                  disabled
                >
                  Order Is Off
                </button>
  `;
}


    </script>




<script>

  function setTimeForOrder(time,time1){

  
    localStorage.setItem('orderTime',time1)
  }
</script>
  </body>

</html>