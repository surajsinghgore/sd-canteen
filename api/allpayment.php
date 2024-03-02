<?php

require('../middleware/ConnectToDatabase.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['month'])&&isset($_POST['year'])&&isset($_POST['status'])){
$month=$_POST['month'];
$year=$_POST['year'];
$status=$_POST['status'];



// success payment history is in orderitems table
if($status=="TXN_SUCCESS"){

$query="select*from orderitems where paymentstatus='success'";
 $resQuery=mysqli_query($connection,$query);
    


}
// failed,pending payment is in paymentdata page
else{


}


    }
}



?>