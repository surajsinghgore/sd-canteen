<?php

if (!isset($_SESSION)) {
    session_start();
}
// checking 
if (isset($_SESSION['activeClientId'])) {
    if ($_SESSION['activeClientId'] == "true") {
       header("Location: /sd-canteen");
    }
}
?>