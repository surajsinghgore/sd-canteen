<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (isset($_POST['itemname'])) {
        $itemname = $_POST['itemname'];
        echo $itemname;

        require('../middleware/ConnectToDatabase.php');
        $query1 = "select*from topsearches where itemname like '$itemname'";
        $res = mysqli_query($connection, $query1);
  $count=mysqli_num_rows($res);
  // check weather new entry
  
//   update
if ($count> 0) {
$data=mysqli_fetch_assoc($res);
$id=$data['id'];
$incrementCount=(int)$data["numberofsearch"];
++$incrementCount;
    $queryInsert = "update topsearches set numberofsearch=$incrementCount where id=$id";
    $resultGet = mysqli_query($connection, $queryInsert);

}

// new entry
else{
    $queryInsert = "insert into topsearches(itemname,numberofsearch) values('$itemname',1)";
    $resultGet = mysqli_query($connection, $queryInsert);
}


       



    }
}
