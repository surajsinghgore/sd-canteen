<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['activeClientId'])) {
  
       header("Location: /sd-canteen");
    
}
?>