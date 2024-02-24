<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['activeClientId'])) {
    require('./middleware/ConnectToDatabase.php');

   $email=$_SESSION['activeClientEmail'];
    $resultGet = mysqli_query($connection, "SELECT * FROM clientdata where email like '$email'");
    $data = mysqli_fetch_assoc($resultGet);
   

if($data['profileimage']==""){
     
    if($_SERVER['REQUEST_URI']=="/sd-canteen/clientprofile.php"){

    }else{

        header("Location: /sd-canteen/clientprofile.php");
    }
    
}
}

?>