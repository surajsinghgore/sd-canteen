<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/realtimeorder.css?v=7">
     <!-- ajax added -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Realtime Orders";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Realtime Order Panel";
            require('../components/AdminTopHeader.php'); ?>
    


<div class="orders">
          <h1>Filter Records</h1>
          <h5>
            Todays Collection : <span>₹ <?php 
               require('../middleware/ConnectToDatabase.php');
               date_default_timezone_set("Asia/Calcutta");
               $currentDate = date("d-m-Y");
               $sql = mysqli_query($connection,"SELECT SUM(amountreceived) as total FROM orderitems where orderdate like '$currentDate' and orderstatus='complete'");
            
               $row = mysqli_fetch_array($sql);
              
               if($row[0]==0){
                echo "0";
               }else{

                 echo $totalAmount=$row['total'];
                }
     
          ?></span>
          </h5>

   
          <div class="searchBar">
            <input
              type="search"
              name="token"
              placeholder="Search Token Id ..."
              id="tokenIdSearch"
              onkeyup="searchByTokenId()"
            />
            <input
              type="search"
              name="curstomername"
             
              placeholder="Search Customer Name..."
             
              id="customerNameSearch"
              onkeyup="searchByCustomerName()"
            />
            <select  name="time" id="timeSlotSearch"
            
            onchange="searchByTimeSlot()">
              <option value="null">Search Time Slot...</option>
              <option value="8.00-Am">8.00 Am</option>
              <option value="8.15-Am">8.15 Am</option>
              <option value="8.30-Am">8.30 Am</option>
              <option value="8.45-Am">8.45 Am</option>
              <option value="9.00-AM">9.00 Am</option>
              <option value="9.15-AM">9.15 Am</option>
              <option value="9.30-AM">9.30 Am</option>
              <option value="9.45-AM">9.45 Am</option>
              <option value="10.00-Am">10.00 Am</option>
              <option value="10.15-Am">10.15 Am</option>
              <option value="10.30-Am">10.30 Am</option>
              <option value="10.45-Am">10.45 Am</option>
              <option value="11.00-Am">11.00 Am</option>
              <option value="11.15-Am">11.15 Am</option>
              <option value="11.30-Am">11.30 Am</option>
              <option value="11.45-Am">11.45 Am</option>
              <option value="12.00-Pm">12.00 Pm</option>
              <option value="12.15-Pm">12.15 Pm</option>
              <option value="12.30-Pm">12.30 Pm</option>
              <option value="12.45-Pm">12.45 Pm</option>
              <option value="1.00-Pm">1.00 Pm</option>
              <option value="1.15-Pm">1.15 Pm</option>
              <option value="1.30-Pm">1.30 Pm</option>
              <option value="1.45-Pm">1.45 Pm</option>
              <option value="2.00-Pm">2.00 Pm</option>
              <option value="2.15-Pm">2.15 Pm</option>
              <option value="2.30-Pm">2.30 Pm</option>
              <option value="2.45-Pm">2.45 Pm</option>
              <option value="3.00-Pm">3.00 Pm</option>
              <option value="3.15-Pm">3.15 Pm</option>
              <option value="3.30-Pm">3.30 Pm</option>
              <option value="3.45-Pm">3.45 Pm</option>
              <option value="4.00-Pm">4.00 Pm</option>
              <option value="4.15-Pm">4.15 Pm</option>
              <option value="4.30-Pm">4.30 Pm</option>
              <option value="4.45-Pm">4.45 Pm</option>
              <option value="5.00-Pm">5.00 Pm</option>
              <option value="5.15-Pm">5.15 Pm</option>
              <option value="5.30-Pm">5.30 Pm</option>
              <option value="5.45-Pm">5.45 Pm</option>
              <option value="6.00-Pm">6.00 Pm</option>
            </select>
            <select
              name="category"
              id="itemCategory"
              onchange="searchByItemCategory()"
            >
              <option value="null">Select Category..</option>
              <option value="food">Food Category</option>
              <option value="coffee">Coffee Category</option>
              <option value="drink">Drink Category</option>
              <option value="juice">Juice Category</option>
            </select>
          </div>

    <?php 
    require('../middleware/ConnectToDatabase.php');
    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("d-m-Y");
 

    // total orders
$query="select*from orderitems where orderdate like '$currentDate' ";
$res=mysqli_query($connection, $query);
$totalOrdersLen=mysqli_num_rows($res);
// sum



// complete order
$query1="select*from orderitems where orderdate like '$currentDate' and orderstatus like 'complete'";
$res1=mysqli_query($connection, $query1);
$CompleteOrderLen=mysqli_num_rows($res1);



// pending order
$query2="select*from orderitems where orderdate like '$currentDate' and orderstatus='pending'";
$res2=mysqli_query($connection, $query2);
$PendingOrderLen=mysqli_num_rows($res2);


// reject order
$query3="select*from orderitems where orderdate like '$currentDate' and orderstatus='reject'";
$res3=mysqli_query($connection, $query3);
$RejectOrderLen=mysqli_num_rows($res3);



// orders not on time

$currentTime = date("H:i:s A");
$query4="select*from orderitems where orderdate like '$currentDate' and pickuptime24<'$currentTime' and orderstatus='pending'";

$res4=mysqli_query($connection, $query4);
$lateOrderLen=mysqli_num_rows($res4);








    ?>
          <div class="analysis">
            <div class="div1" onclick="totalOrderLoad()">
              Total Orders : <?php echo $totalOrdersLen;?> 
            </div>
            <div class="div2" onclick="completeOrderLoad()">
              Complete Orders: <?php echo $CompleteOrderLen;?> 
            </div>
            <div class="div3" onclick="pendingOrderLoad()">
              Pending Orders: <?php echo $PendingOrderLen;?> 
            </div>
            <div class="div4" onclick="rejectOrderLoad()">
              Reject Orders : <?php echo $RejectOrderLen;?> 
            </div>
            <div class="div5" onclick="delayOrderLoad()">
              Orders Not On Time: <?php echo $lateOrderLen;?> 
            </div>
          </div>

          <div class="tables_section" id="table_sections">


         
                   
        </div>

   
         


       <a href="/sd-canteen/admin/realtimeorder.php"> <div class="refresh">
        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="admin_icon___wnHZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M17.65 6.35A7.958 7.958 0 0012 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08A5.99 5.99 0 0112 18c-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"></path></svg>
      </div></a>
</div>






        </div>



    </div>




<script>



// process order
function processOrder(id){
// if open then show close
if(document.getElementById(`dropDownMenu${id}`).style.display=="block"){
  document.getElementById(`dropDownMenu${id}`).style.display="none";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.cursor="pointer";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="none";

  // document.getElementById(`UpdateFormDiv${id}`).style.display="none";

}

else{
  document.getElementById(`dropDownMenu${id}`).style.display="block";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="none";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.cursor="pointer";




}
 


}


function processOrderMenu(id){

  document.getElementById(`dropDownMenu${id}`).style.display="none";
  document.getElementById(`UpdateFormDiv${id}`).style.display="flex";
}

function processOrderMenuClose(id){

  document.getElementById(`UpdateFormDiv${id}`).style.display="none";
}



function sendOrderForProcess(id){



  let orderStatus=document.getElementById(`orderStatus${id}`).value;
  let maincategory=document.getElementById(`maincategory${id}`).value;
  let amountReceived=parseInt(document.getElementById(`amountReceived${id}`).value);
  let totalAmount=parseInt(document.getElementById(`totalAmount${id}`).innerText);

  if(orderStatus=="pending"){
    alert('please change order status');
    return;
  }

  if(parseInt(amountReceived)==0){
    alert('please update amount Received');
    return;
  }

  if(parseInt(totalAmount)<parseInt(amountReceived)){
    alert('amount received is above the total price');
    return
  }
  if(parseInt(totalAmount)>parseInt(amountReceived)){
    alert('amount received is below the total price');
    return

  }
let password="";
  if(maincategory=="food"){
    password=prompt('Enter Food Secret Password to process ');
    
  }
  if(maincategory=="coffee"){
    password=prompt('Enter Coffee Secret Password to process ');
  }
  if(maincategory=="drink"){

    password=prompt('Enter Drink Secret Password to process ');
  }
  if(maincategory=="juice"){

    password=prompt('Enter Juice Secret Password to process ');
  }
// matching password
  if(maincategory=="food"){
  if(password!=="food"){
    alert('Wrong Food Secret Password');
    return;
  }}
  if(maincategory=="coffee"){
  if(password!=="coffee"){
    alert('Wrong Coffee Secret Password');
    return;
  }}
  if(maincategory=="drink"){
  if(password!=="drink"){
    alert('Wrong Drink Secret Password');
    return;
  }}
  if(maincategory=="juice"){
  if(password!=="juice"){
    alert('Wrong Juice Secret Password');
    return;
  }}





  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  processOrder: 'process',
                    id:id
                },
                // return data
                success: function(res) {
           
                  document.location.reload();
                 
                }

              })

}


// reject order

function processOrderReject(id){




let maincategory=document.getElementById(`maincategory${id}`).value;




let password="";
if(maincategory=="food"){
  password=prompt('Enter Food Secret Password to process ');
  
}
if(maincategory=="coffee"){
  password=prompt('Enter Coffee Secret Password to process ');
}
if(maincategory=="drink"){

  password=prompt('Enter Drink Secret Password to process ');
}
if(maincategory=="juice"){

  password=prompt('Enter Juice Secret Password to process ');
}
// matching password
if(maincategory=="food"){
if(password!=="food"){
  alert('Wrong Food Secret Password');
  return;
}}
if(maincategory=="coffee"){
if(password!=="coffee"){
  alert('Wrong Coffee Secret Password');
  return;
}}
if(maincategory=="drink"){
if(password!=="drink"){
  alert('Wrong Drink Secret Password');
  return;
}}
if(maincategory=="juice"){
if(password!=="juice"){
  alert('Wrong Juice Secret Password');
  return;
}}





$.ajax({
              type: "POST", //type of method
              url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
              data: {
                rejectOrder: 'reject',
                  id:id
              },
              // return data
              success: function(res) {

                document.location.reload();
               
              }

            })

}


$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  all: 'all',
                    
                },
                // return data
                success: function(res) {
                  document.getElementById('table_sections').innerHTML=res;
                }

              })



              // search By tokenIdSearch
              function searchByTokenId(){
               let input=document.getElementById('tokenIdSearch').value.toUpperCase();
                
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  searchByTokenId: 'process',
                    input:input
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
              }



                  // search By customer name
                  function searchByCustomerName(){
               let input=document.getElementById('customerNameSearch').value.toLowerCase();
                
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  searchByCustomerName: 'process',
                    input:input
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
              }




                   // search By time Slot
                   function searchByTimeSlot(){

                     let input=parseFloat(document.getElementById('timeSlotSearch').value.toUpperCase());
            
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  searchByTimeSlot: 'process',
                    input:input
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
              }




                // search By items category
                function searchByItemCategory(){

let input=document.getElementById('itemCategory').value.toLowerCase();
if(input=="null"){
document.location.reload();
  return;
}
$.ajax({
type: "POST", //type of method
url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
data: {
  searchByItemCategory: 'process',
input:input
},
// return data
success: function(res) {

document.getElementById('table_sections').innerHTML=res;
}

})
}



// all order load
function totalOrderLoad(){
  window.document.location.reload();
}



// all complete load
function completeOrderLoad(){
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  completeOrders: 'process',
                   
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })


}



// all pending load
function pendingOrderLoad(){

  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  pendingOrders: 'process',
                   
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
}


// all reject load
function rejectOrderLoad(){

  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  rejectOrders: 'process',
                   
                },
                // return data
                success: function(res) {
                  document.getElementById('table_sections').innerHTML=res;
                }

              })

}


// all delay load
function delayOrderLoad(){
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  delayOrders: 'process',
                   
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })


}

</script>
    

</body>

</html>

