<?php


// local System Setup
$host="localhost";
$conPassword="";
$conUsername="root";
$db="sd canteen";
$connection=mysqli_connect($host,$conUsername,$conPassword,$db);
if(mysqli_connect_error()){
    $alert = true;
    $mainMessage = "Server Internal Error !";
    $status = "alert-danger";
    $message = "Sorry Internal Server Error, Please Try Again After Some Time";

}
?>