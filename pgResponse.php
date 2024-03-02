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
$ItemId=mysqli_insert_id($connection);




// !  add items in orderTrack DB
$orderTrack="select*from ordertrack where itemName like '$cartItemName'";
$orderTrackRes=mysqli_query($connection,"$orderTrack");
$numberOfRecords=mysqli_num_rows($orderTrackRes);
// means update totalOrder to + 1
if ($numberOfRecords > 0) {
$orderTrackData=mysqli_fetch_assoc($orderTrackRes);
$totalOrder=$orderTrackData["totalOrder"];
$id=$orderTrackData["id"];
++$totalOrder;
$insertOrderTrack="update ordertrack set totalOrder=$totalOrder where id=$id";
	$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);
}
// new item insert in orderTrack
else{
	$insertOrderTrack="insert into ordertrack(itemName,itemId,maincategory,totalOrder) values('$cartItemName',$ItemId,'$cartItemMainCategory',1)";
	$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);
}


}



$fetchFromDb1="delete from paymentdata where id=$id";
	$resultGet1 = mysqli_query($connection, $fetchFromDb1);


	






	$email_body="<html>
	<head>
	<title>Order Placed </title>
	</head>
	
	<body>
	<div>
	<img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
	</div>
	<div style='color:rgb(245, 245, 245);text-align: center;width: 99%;font-size:3vw;background-color: rgb(245, 61, 0);padding-top: 1%;padding-bottom: 1%;'>SD CANTEEN</div>
		<h1 style='margin-top:4%;font-size:3vw;color:rgb(0, 0, 0)'>Hi,<span style='color:rgb(231, 5, 5);'>$fullname</span> </h1>
		<div style='color:black;text-align: center;width: 100%;font-size:3vw;'>Thank You For Your Order</div>
		  <div style='margin-top:4%;color:rgb(95, 95, 95);text-align: center;width: 100%;font-size:2vw;'>Your 6 Digit Token Number:</div>
		  <div style='margin-top:4%;color:rgb(198, 10, 10);text-align: center;width: 99%;font-size:3vw;border: 3px dotted rgb(255, 38, 0);text-transform: lowercase;'>$orderId</div>
			<div style='margin-top:6%;color:rgb(95, 95, 95);width: 100%;font-size:2vw;'>Your Order Items Details:</div>
		<table style='margin-top:2%;width:100%;text-align: center;font-size: 2vw;border:2px solid black'>
		<tr style='background-color: rgb(238, 238, 238);color:black'>
		<th>Item Name</th>
		<th>Price</th>
		<th>Size</th>
		<th>Qty</th>
		<th>Category</th>
		<th>Total</th>
		</tr>";
	
	
	
	
	
		for ($i=0; $i <$countLength ; $i++) { 
			$cartItemName=$item[$i]['itemName'];
			$cartItemPrice=$item[$i]['price'];
			$cartItemQtyBook=$item[$i]['qtyBook'];
			$cartItemSize=$item[$i]['size'];
			$cartItemMainCategory=$item[$i]['itemMainCategory'];
			$cartItemCategory=$item[$i]['category'];
			$totalAmount=$cartItemQtyBook*$cartItemPrice;
			$email_body .="
		<tr style='border: 1px solid rgb(220, 220, 220);color:rgb(255, 81, 0);text-transform: capitalize;'>
		<td>$cartItemName</td>
		<td>$cartItemPrice</td>
		<td>$cartItemSize</td>
		<td>$cartItemQtyBook</td>
		<td>$cartItemCategory</td>
		<td>$totalAmount</td>
		</tr>
		";
		}
	
	
	
		$email_body .="</table>
	
		<div style='margin-Top:4%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>Total Items Order : </div>
		<div style='padding-left:3%;color:rgb(66, 66, 66)'>$countLength</div>
		 </div>
		<div style='margin-Top:4%;width:100%;display:flex;border-top: 4px solid rgb(213, 213, 213);border-bottom: 4px solid rgb(213, 213, 213);font-size: 3vw;text-align: center;color: rgb(49, 49, 49);'>
		<div style='width:50%'>Total Amount</div>
		<div style='width:50%'>₹ $totalamount</div>
		 </div>
		<div style='margin-Top:4%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>PickUp Time : </div>
		<div style='padding-left:3%;color:rgb(2, 151, 205)'>$pickuptime</div>
		 </div>
		 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>Order Time : </div>
		<div style='padding-left:3%;color:rgb(2, 151, 205)'>$ordertime</div>
		 </div>
		 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>Order Date : </div>
		<div style='padding-left:3%;color:rgb(2, 151, 205)'>$orderdate</div>
		 </div>
		 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>Payment Method : </div>
		<div style='padding-left:3%;color:rgb(2, 151, 205)'>online</div>
		 </div>
		 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
		<div style='color:rgb(28, 28, 28)'>Amount Paid : </div>
		<div style='padding-left:3%;color:rgb(2, 151, 205)'>$totalamount</div>
		 </div>
		  <div style='margin-Top:5%;width:100%;font-size: 2vw;text-align: center;'>
		<div style='color:rgb(117, 117, 117)'>Please contact SD CANTEEN if you have not placed an order or if the order was placed by mistake.</div>
		 </div>
		  <div style='margin-top:4%;color:rgb(245, 245, 245);text-align: center;width: 99%;font-size:3vw;background-color: rgb(245, 61, 0);padding-top: 1%;padding-bottom: 1%;'>SD CANTEEN</div>
		
		
		</body>
		</html>";
	// send email about order placed
	
	
	
	$to = $email;
	$subject = "Order Placed ";
	
	
	
		
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
	$headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";
	
	
	$result = mail($to, $subject, $email_body, $headers);
	if ($result == true) {
		header("Location: /sd-canteen/ordercomplete.php");


	
	}
	




	
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