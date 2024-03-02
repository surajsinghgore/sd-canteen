<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/payment.css?v=2">


  <!-- ajax added -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | All Payments";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "All Payments";
            require('../components/AdminTopHeader.php'); ?>
       



            <div class="AllPayments">
                <div class="filterBox">
                    <li>
                        <select placeholder="Select Month" id="month">
                            <option value="no">Select Month</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </li>

                    <li>

                 
                        <select placeholder="Select Year" id="year">
                            <option value="no">Select Year</option>



                            <?php 
 require('../middleware/ConnectToDatabase.php');


 $sql="SELECT DISTINCT orderdate FROM orderitems";
    $result = mysqli_query($connection,$sql);

    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row
            while ($row = mysqli_fetch_assoc($result)) {
                // Access the column data
                $distinctData = $row['orderdate'];
                



// Extracting the year using MySQL YEAR() function
$query = "SELECT YEAR(STR_TO_DATE('$distinctData', '%d-%m-%Y')) AS year";
$result = mysqli_query($connection, $query);

if ($result) {
    // Fetching the result
    $row = mysqli_fetch_assoc($result);
    $year = $row['year'];
    ?>
    <option>
  <?php echo $year; ?>
   </option>
   <?php
    // Output the year

    // year return


    echo "Year from MySQL date: $year";
} else {
  
  
}

            }
        } else {
          
        }
    } else {
       
    }
    

?>
                           
                        </select>
                    </li>

                    <li>
                        <select placeholder="Select Payment Status" id="paymentstatus">
                            <option value="no">Select Status</option>
                            <option value="TXN_SUCCESS">Complete</option>
                            <option value="TXN_FAILURE">Failed</option>
                            <option value="PENDING">Pending</option>
                            <option value="initiated">Initiated</option>
                        </select>
                    </li>

                    <li>
                        <button onclick="searchWorking()">Search</button>
                    </li>
                </div>

                <div class="datasPayment">
                    <h2>
                        Total Records: <span id="totalRecords"> 23</span>
                    </h2>

                    <div class="cards" id="cards">
<?php 

$query="select*from orderitems where fullname='suraj singh'";
$result = mysqli_query($connection,$query);

while ($data = mysqli_fetch_array($result)) {
?>


<div class="card">
                            <div class="topSection">
                                <div class="left">
                                    <h6>Payment Details</h6>
                                    <p><?php echo $data['fullname'];?></p>
                                </div>



                                <?php 
                                if($data['paymentstatus']=="success"){
?>
<div class="right">
                                    <li class="button">
                                        <div class="complete">Complete</div>
                                    </li>
                                </div>
  <?php                              }




else if($data['paymentstatus']=="pending"){
    ?>
      <div class="right">
                              <li class="button">
                                <div class="pending">Pending</div>
                              </li>
                            </div>
      <?php                              }




else if($data['paymentstatus']=="reject"){
    ?>
      <div class="right">
                              <li class="button">
                                <div class="reject">Failed</div>
                              </li>
                            </div>
      <?php                              }

      else{
?>
<div class="right">
                           
                           <li class="button">
                             <div class="initiate">
                               Initiated
                             </div>
                           </li>
                         </div> 


<?php

      }
                                ?>
                                

                              
                            </div>
                                
                             


                             


                        

                        <div class="mainData">
                            <h5>Payment Info</h5>
                            <div class="all">
                                <li>
                                    <div class="heading">Email ID</div>
                                    <div class="desc"><?php echo $data['email'];?></div>
                                </li>

                                <li>
                                    <div class="heading">Mobile</div>
                                    <div class="desc"><?php echo $data['mobile'];?></div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Token
                                    </div>
                                    <div class="desc1">
                                    <?php echo $data['orderId'];?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Date
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['orderdate'];?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Payment Time
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['pickuptime'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Status
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['orderstatus'];?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Order Amount
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['totalamount'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Amount
                                    </div>
                                    <div class="desc">
                                    <?php 
                                    $dataArray=json_decode($data['paymentinfo'], true);
                                   
                                    if(isset($dataArray['TXNAMOUNT'])){
                                        echo $dataArray['TXNAMOUNT'];
                                    }else{
                                        echo 'NO';
                                    }
                                   ?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        transaction Currency
                                    </div>
                                    <div class="desc">



                                    <?php
                                    if(isset($dataArray['CURRENCY'])){
                                        echo $dataArray['CURRENCY'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>
                            <h4>Bank Info</h4>
                            <div class="all">
                                <li>
                                    <div class="heading">Bank Name</div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['BANKNAME'])){
                                        echo $dataArray['BANKNAME'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Bank Transaction ID
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['BANKTXNID'])){
                                        echo $dataArray['BANKTXNID'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Gateway Name
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['GATEWAYNAME'])){
                                        echo $dataArray['GATEWAYNAME'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Mode
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['PAYMENTMODE'])){
                                        echo $dataArray['PAYMENTMODE'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Full Date
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['TXNDATE'])){
                                        echo $dataArray['TXNDATE'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Payment Status
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['STATUS'])){
                                        echo $dataArray['STATUS'];
                                    }else{
                                        echo 'NO';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>

                        </div>
                    </div>




<?php
}



?>


                    

                    <!-- <h1>No Data Found</h1> -->

                  
                </div>
            </div>
        </div>








    </div>

    </div>


    <script>


    function searchWorking(){
let month=document.getElementById('month').value;
let year=document.getElementById('year').value;
let status=document.getElementById('paymentstatus').value;



if(month=="no"){alert('please select month');
return;
}
if(year=="no"){alert('please select year');
return;
}
if(status=="no"){alert('please select payment status');
return;
}



             
$.ajax({
              type: "POST", //type of method
              url: "http://localhost/sd-canteen/api/allpayment.php", //your page
              data: {
                month: month,
                  year:year,status:status
              },
              // return data
              success: function(res) {
        
                document.getElementById('cards').innerHTML=res;
              }

            })



    }


    document.getElementById('totalRecords').innerText= document.getElementsByClassName('card').length;
    </script>
</body>

</html>