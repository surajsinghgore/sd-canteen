<?php



        require('./middleware/ConnectToDatabase.php');

		


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

$ORDERID=$_POST['ORDERID'];
if($isValidChecksum == "TRUE") {

	$ORDERID=$_POST['ORDERID'];
	$TXNID=$_POST['TXNID'];
	$TXNAMOUNT=$_POST['TXNAMOUNT'];
	$PAYMENTMODE=$_POST['PAYMENTMODE'];
	$CURRENCY=$_POST['CURRENCY'];
	$TXNDATE=$_POST['TXNDATE'];
	$STATUS=$_POST['STATUS'];
	$RESPCODE=$_POST['RESPCODE'];
	$RESPMSG=$_POST['RESPMSG'];
	$GATEWAYNAME=$_POST['GATEWAYNAME'];
	$BANKTXNID=$_POST['BANKTXNID'];
	$BANKNAME=$_POST['BANKNAME'];
	$CHECKSUMHASH=$_POST['CHECKSUMHASH'];
	
	$paymentInfo="{\"ORDERID\":\"$ORDERID\",\"TXNID\":\"$TXNID\",\"TXNAMOUNT\":\"$TXNAMOUNT\",\"PAYMENTMODE\":\"$PAYMENTMODE\",\"CURRENCY\":\"$CURRENCY\",\"TXNDATE\":\"$TXNDATE\",\"STATUS\":\"$STATUS\",\"RESPCODE\":\"$RESPCODE\",\"RESPMSG\":\"$RESPMSG\",\"GATEWAYNAME\":\"$GATEWAYNAME\",\"BANKTXNID\":\"$BANKTXNID\",\"BANKNAME\":\"$BANKNAME\",\"CHECKSUMHASH\":\"$CHECKSUMHASH\"}";

	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
//! success payment



		
	$fetchFromDb="select*from paymentdata where txn_token='$ORDERID'";
	$resultGet = mysqli_query($connection, $fetchFromDb);

$data=mysqli_fetch_assoc($resultGet);
$userId=$data['userId'];
$id=$data['id'];
$fullname=$data['fullname'];
$email=$data['email'];
$mobile=$data['mobile'];
$totalamount=$data['totalamount'];
$paymentstatus=$data['paymentstatus'];
$amountreceived=$data['amountreceived'];
$orderId=$data['orderId'];
$txn_token=$data['txn_token'];
$paymentinfo=$data['paymentinfo'];
$itemsorder=$data['itemsorder'];
$address=$data['address'];
$pickuptime=$data['pickuptime'];
$pickuptime24=$data['pickuptime24'];
$ordertime=$data['ordertime'];
$orderdate=$data['orderdate'];
$paymentmethod=$data['paymentmethod'];
$orderstatus=$data['orderstatus'];





// payment details


// check weather not double enter
$checkDoubleEntry="select*from orderitems where txn_token='$ORDERID'";
$resultGet = mysqli_query($connection, $checkDoubleEntry);
$row=mysqli_num_rows($resultGet);

if($row>0){

	
	header("Location: /sd-canteen/ordercomplete.php");

}else{



	$insertInDb="insert into orderitems(userId,fullname,email,mobile,totalamount,paymentstatus,amountreceived,orderId,txn_token,paymentinfo,address,pickuptime,pickuptime24,ordertime,orderdate,paymentmethod,orderstatus) values($userId,'$fullname','$email',$mobile,$totalamount,'success',$totalamount,'$orderId','$txn_token','$paymentInfo','$address','$pickuptime','$pickuptime24','$ordertime','$orderdate','online','pending')";       
	$resultGet = mysqli_query($connection, $insertInDb);
$last_id = mysqli_insert_id($connection);
	


// adding items in items table

$item = json_decode($data['itemsorder'],true);
$countLength=count($item);
$userId=$data['userId'];
$mainOrderId=$last_id;
$orderToken=$data['orderId'];
$txn_token=$data['txn_token'];


for ($i=0; $i <$countLength ; $i++) { 
	$cartItemName=$item[$i]['itemName'];
	$cartItemPrice=$item[$i]['price'];
	$cartItemQtyBook=$item[$i]['qtyBook'];
	$cartItemTotal=$item[$i]['total'];
	$cartItemSize=$item[$i]['size'];
	$cartItemMainCategory=$item[$i]['itemMainCategory'];
	$cartItemCategory=$item[$i]['category'];
// insert all items in itemslist
$insertItemsQuery="insert into itemlist(userId,mainOrderId,itemName,qty,size,maincategory,itemPrice,amountreceived,paymentstatus,orderstatus,category,txn_token,ordertoken) values($userId,$mainOrderId,'$cartItemName','$cartItemQtyBook','$cartItemSize','$cartItemMainCategory','$cartItemPrice','$cartItemPrice','success','pending','$cartItemCategory','$txn_token','$orderToken')";

$DataGetsRes = mysqli_query($connection, $insertItemsQuery);
}



$fetchFromDb1="delete from paymentdata where id=$id";
	$resultGet1 = mysqli_query($connection, $fetchFromDb1);


	
	header("Location: /sd-canteen/ordercomplete.php");





	
}





		
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {


		//! failed payment



		
		$fetchFromDb="select*from paymentdata where txn_token='$ORDERID'";
		$resultGet = mysqli_query($connection, $fetchFromDb);
	
	$data=mysqli_fetch_assoc($resultGet);
	$id=$data['id'];
	$token=$data['txn_token'];
	
	
	
	
	// update records
	
	
		$insertInDb="update paymentdata set paymentstatus='failed',paymentinfo='$paymentInfo',orderstatus='reject' where id=$id";       
		$resultGet = mysqli_query($connection, $insertInDb);
	
	header("Location: /sd-canteen/orderfailed.php?tokenReject=$token");






		
	}

	

}
else {

	$fetchFromDb="select*from paymentdata where txn_token='$ORDERID'";
	$resultGet = mysqli_query($connection, $fetchFromDb);

$data=mysqli_fetch_assoc($resultGet);
$token=$data['txn_token'];


	header("Location: /sd-canteen/orderfailed.php?tokenPending=$token");
		
		
	//Process transaction as suspicious.
}

?>