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
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
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
                document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
              }

            })



    }


    document.getElementById('totalRecords').innerText= document.getElementsByClassName('card').length;
    </script>
</body>

</html>