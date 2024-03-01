<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['activeClientId'])) {

	$CUST_ID=$_SESSION['activeClientId'] ;
      //   connection
	  require('./middleware/ConnectToDatabase.php');
$query="select*from clientdata where id=$CUST_ID";
$resultGet = mysqli_query($connection, $query);
$data=mysqli_fetch_assoc( $resultGet );
if (!isset($_SESSION)) {
    session_start();
}
	$email=$data['email'] ;
	$fullname=$data['fullname'] ;
	$mobile=$data['mobile'] ;
	$address=$data['fulladdress'] ;
	$payment=$_POST['payment'];
	$pickUpTime=$_POST['orderTime'];
	$pickuptime24=date("H:i", strtotime("$pickUpTime"));
	$cartData=$_POST['cartDataSend'];
	date_default_timezone_set("Asia/Calcutta");
	$currentDate = date("d-m-Y");
	$currentTime = date("h:i:s A");
	$ORDER_ID=$_POST['ORDERID'];
	$TXN_AMOUNT=$_POST['TXN_AMOUNT'];

// online only
if($payment=="Online"){


	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");
	
	$checkSum = "";
	$paramList = array();
	
	
	$INDUSTRY_TYPE_ID = "Retail";
	$CHANNEL_ID ="WEB";
	// Create an array having all required parameters for creating checksum.
	// generate orderId
	$length = 6;
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $orderId = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $orderId .= $characters[mt_rand(0, $max)];
    }

	
// check weather go back and request entery
$q1="select*from paymentdata where txn_token='$ORDER_ID'";
$resultGets = mysqli_query($connection, $q1);
$rowCount=mysqli_num_rows($resultGets);

if($rowCount==0){
	$insertInDb="insert into paymentdata(userId,fullname,email,mobile,totalamount,paymentstatus,amountreceived,orderId,txn_token,paymentinfo,itemsorder,address,pickuptime,pickuptime24,ordertime,orderdate,paymentmethod,orderstatus) values($CUST_ID,'$fullname','$email',$mobile,$TXN_AMOUNT,'pending',0,'$orderId','$ORDER_ID','','$cartData','$address','$pickUpTime','$pickuptime24','$currentTime','$currentDate','online','pending')";
           
	$resultGet = mysqli_query($connection, $insertInDb);
}
	






	$paramList["MID"] = PAYTM_MERCHANT_MID;
	$paramList["ORDER_ID"] = $ORDER_ID;
	$paramList["CUST_ID"] = $CUST_ID;
	$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
	$paramList["CHANNEL_ID"] = $CHANNEL_ID;
	$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
	$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
	$paramList["CALLBACK_URL"] = "http://localhost/sd-canteen/pgResponse.php";
	$paramList["VERIFIED_BY"] = $email;
	$paramList["MSISDN"] = $mobile;
	$paramList["IS_USER_VERIFIED"] = "YES";
	/*
	$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
	$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
	$paramList["EMAIL"] = $EMAIL; //Email ID of customer
	// $paramList["VERIFIED_BY"] = "EMAIL"; //
	$paramList["IS_USER_VERIFIED"] = "YES"; //
	
	*/
	
	//Here checksum string will return by getChecksumFromArray() function.
	$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	
	?>
	<html>
	<head>
	<title>Merchant Check Out Page</title>
	</head>
	<body>
		<center><h1>Please do not refresh this page...</h1></center>
			<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
			<table border="1">
				<tbody>
				<?php
				foreach($paramList as $name => $value) {
					echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
				}
				?>
				<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
				</tbody>
			</table>
			<script type="text/javascript">
				document.f1.submit();
			</script>
		</form>
	</body>
	</html>
	
	
	<?php 
	
	
	



}



// cod payment
else{



// generate orderId
$length = 6;
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$orderId = '';
$max = strlen($characters) - 1;

for ($i = 0; $i < $length; $i++) {
	$orderId .= $characters[mt_rand(0, $max)];
}


// check weather go back and request entry
$q1="select*from orderitems where txn_token='$ORDER_ID'";
$resultGets = mysqli_query($connection, $q1);
$rowCount=mysqli_num_rows($resultGets);

if($rowCount==0){
$insertInDb="insert into orderitems(userId,fullname,email,mobile,totalamount,paymentstatus,amountreceived,orderId,txn_token,paymentinfo,address,pickuptime,pickuptime24,ordertime,orderdate,paymentmethod,orderstatus) values($CUST_ID,'$fullname','$email',$mobile,$TXN_AMOUNT,'pending',0,'$orderId','$ORDER_ID','pending','$address','$pickUpTime','$pickuptime24','$currentTime','$currentDate','cod','pending')";
	   
$resultGet = mysqli_query($connection, $insertInDb);

$last_id = mysqli_insert_id($connection);


// fetching just insert data
$q2="select*from orderitems where id=$last_id";
$DataGetsRes = mysqli_query($connection, $q2);
$lastInsertData=mysqli_fetch_assoc( $DataGetsRes);

// set cart items

$item = json_decode($cartData,true);
$countLength=count($item);
$userId=$lastInsertData['userId'];
$mainOrderId=$last_id;
$orderToken=$lastInsertData['orderId'];
$txn_token=$lastInsertData['txn_token'];




for ($i=0; $i <$countLength ; $i++) { 
	$cartItemName=$item[$i]['itemName'];
	$cartItemPrice=$item[$i]['price'];
	$cartItemQtyBook=$item[$i]['qtyBook'];
	$cartItemTotal=$item[$i]['total'];
	$cartItemSize=$item[$i]['size'];
	$cartItemMainCategory=$item[$i]['itemMainCategory'];
	$cartItemCategory=$item[$i]['category'];

	// insert all items in itemslist
	$insertItemsQuery="insert into itemlist(userId,mainOrderId,itemName,qty,size,maincategory,itemPrice,amountreceived,paymentstatus,orderstatus,category,txn_token,ordertoken) values($userId,$mainOrderId,'$cartItemName','$cartItemQtyBook','$cartItemSize','$cartItemMainCategory','$cartItemPrice','0','pending','pending','$cartItemCategory','$txn_token','$orderToken')";

$DataGetsRes = mysqli_query($connection, $insertItemsQuery);

}



setcookie('orderComplete', 'true', time() + (60 * 5));

header("Location: /sd-canteen/ordercomplete.php");

}




}


}

}
?>