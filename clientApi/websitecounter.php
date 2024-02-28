<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (isset($_POST['browser'])) {
        date_default_timezone_set("Asia/Calcutta");
        $currentDate = date("d-m-Y");
        $currentTime = date("h:i:s A");
        $browser = $_POST['browser'];

        require('../middleware/ConnectToDatabase.php');
        $query = "insert into websitecounter(browser,visitTime,visitDate) values('$browser','$currentTime','$currentDate')";

        $resultGet = mysqli_query($connection, $query);


        echo $_POST['browser'];
    }
}
