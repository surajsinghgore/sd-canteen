<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['activeClientId'])) {

	$_SESSION['redirect']="true";
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
	
	$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	
	?>
	<html>
	<head>
	<title>Merchant Check Out Page</title>
	</head>
	<body>
		<center><h1>Please do not refresh this page...</h1></center>
			<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
			<table >
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

// order placed added in orderTrackDb



$cartItemName=$item[$i]['itemName'];
$cartItemPrice=$item[$i]['price'];
$cartItemQtyBook=$item[$i]['qtyBook'];
$cartItemSize=$item[$i]['size'];
$cartItemMainCategory=$item[$i]['itemMainCategory'];
$cartItemCategory=$item[$i]['category'];


	// insert all items in itemslist
	$insertItemsQuery="insert into itemlist(userId,mainOrderId,itemName,qty,size,maincategory,itemPrice,amountreceived,paymentstatus,orderstatus,category,txn_token,ordertoken) values($userId,$mainOrderId,'$cartItemName','$cartItemQtyBook','$cartItemSize','$cartItemMainCategory','$cartItemPrice','0','pending','pending','$cartItemCategory','$txn_token','$orderToken')";

$DataGetsRes = mysqli_query($connection, $insertItemsQuery);
$ItemId=mysqli_insert_id($connection);


$getIdOfItem="";
if($cartItemMainCategory=="food"){
	$getFoodDEtails="select*from fooditems where foodname like '%$cartItemName%'";
	$foodResDb=mysqli_query($connection, $getFoodDEtails);
	$foodDataFromDb=mysqli_fetch_assoc($foodResDb);
	$getIdOfItem=$foodDataFromDb['id'];
}
if($cartItemMainCategory=="coffee"){
	$getFoodDEtails="select*from coffeeitems where coffeename like '%$cartItemName%'";
	$foodResDb=mysqli_query($connection, $getFoodDEtails);
	$foodDataFromDb=mysqli_fetch_assoc($foodResDb);
	$getIdOfItem=$foodDataFromDb['id'];
}
if($cartItemMainCategory=="juice"){
	$getFoodDEtails="select*from juiceitems where juicename like '%$cartItemName%'";
	$foodResDb=mysqli_query($connection, $getFoodDEtails);
	$foodDataFromDb=mysqli_fetch_assoc($foodResDb);
	$getIdOfItem=$foodDataFromDb['id'];
}
if($cartItemMainCategory=="drink"){
	$getFoodDEtails="select*from drinkitems where drinkname like '%$cartItemName%'";
	$foodResDb=mysqli_query($connection, $getFoodDEtails);
	$foodDataFromDb=mysqli_fetch_assoc($foodResDb);
	$getIdOfItem=$foodDataFromDb['id'];
}

// !  add items in orderTrack DB
$currentMonth = date('F'); // Full month name (e.g., January)
$currentYear = date('Y'); // Four-digit year (e.g., 2024)


$orderTrack="select*from ordertrack where itemName like '$cartItemName' and month='$currentMonth' and year='$currentYear'";
$orderTrackRes=mysqli_query($connection,"$orderTrack");
$numberOfRecords=mysqli_num_rows($orderTrackRes);

// means update totalOrder to + 1
if ($numberOfRecords > 0) {


$orderTrackData=mysqli_fetch_assoc($orderTrackRes);
$totalOrder=$orderTrackData["totalOrder"];
$pending=$orderTrackData["pending"];
$id=$orderTrackData["id"];
++$totalOrder;
++$pending;
$insertOrderTrack="update ordertrack set totalOrder=$totalOrder,pending=$pending where id=$id";
	$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);
}
// new item insert in orderTrack
else{
	$insertOrderTrack="insert into ordertrack(itemName,itemId,maincategory,totalOrder,pending,month,year) values('$cartItemName',$getIdOfItem,'$cartItemMainCategory',1,1,'$currentMonth','$currentYear')";
	$executeOrderTrack=mysqli_query($connection, $insertOrderTrack);
}




}


// sending mail
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
	<div style='width:50%'>₹ $TXN_AMOUNT</div>
	 </div>
	<div style='margin-Top:4%;width:100%;display:flex;font-size: 2vw;'>
	<div style='color:rgb(28, 28, 28)'>PickUp Time : </div>
	<div style='padding-left:3%;color:rgb(2, 151, 205)'>$pickUpTime</div>
	 </div>
	 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
	<div style='color:rgb(28, 28, 28)'>Order Time : </div>
	<div style='padding-left:3%;color:rgb(2, 151, 205)'>$currentTime</div>
	 </div>
	 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
	<div style='color:rgb(28, 28, 28)'>Order Date : </div>
	<div style='padding-left:3%;color:rgb(2, 151, 205)'>$currentDate</div>
	 </div>
	 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
	<div style='color:rgb(28, 28, 28)'>Payment Method : </div>
	<div style='padding-left:3%;color:rgb(2, 151, 205)'>$payment</div>
	 </div>
	 <div style='margin-Top:2%;width:100%;display:flex;font-size: 2vw;'>
	<div style='color:rgb(28, 28, 28)'>Amount Paid : </div>
	<div style='padding-left:3%;color:rgb(2, 151, 205)'>0</div>
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




}


}

}
?>