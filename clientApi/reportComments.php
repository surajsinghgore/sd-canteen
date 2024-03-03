<?php

   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['idToReport'])) {

        //   connection
        require('../middleware/ConnectToDatabase.php');
         // verify client login
         if (!isset($_SESSION)) {
            session_start();
        }

        

$idToReport=$_POST['idToReport'];
$activeClientId=$_SESSION['activeClientId'];
$fullname=$_SESSION['activeClientFullname'];

$query="select*from commentreports where commentId=$idToReport";

// fetch real comment
$commentFetchRes=mysqli_query($connection,"select*from itemratingcomments where id=$idToReport");
$fetchCommentData=mysqli_fetch_assoc($commentFetchRes);
$originalMessage=$fetchCommentData['message'];

$resGets=mysqli_query($connection,$query);
$countRes=mysqli_num_rows($resGets);


// check weather already reported 
if($countRes> 0) {
$mainCommentData=mysqli_fetch_assoc($resGets);
$mainCommentId=$mainCommentData['id'];
$mainCommentNumberOfReport=$mainCommentData['numberofreport'];
++$mainCommentNumberOfReport;
// user not report 2 times
$resGetsAgain=mysqli_query($connection,"select*from commentreportusers where userId=$activeClientId and maincommentid=$mainCommentId");
$countResAgain=mysqli_num_rows($resGetsAgain);

// means already reported
if($countResAgain> 0) {

echo "you already reported";

}
// new user reported existing comment
else{

  

   

    $insertInCommentReports="update commentreports set numberofreport=$mainCommentNumberOfReport where commentId=$idToReport";
    mysqli_query($connection,$insertInCommentReports);

        // also store user report details
        $insertInCommentReports="insert into commentreportusers(maincommentid,userId,fullname) values($mainCommentId,$activeClientId,'$fullname')";
        mysqli_query($connection,$insertInCommentReports);
    

}


}
// new reported comments [first time reported]
else{


    // insert in comment report
        $insertInCommentReports="insert into commentreports(commentId,numberofreport,message) values($idToReport,1,'$originalMessage')";
        mysqli_query($connection,$insertInCommentReports);
    
        $insertId=mysqli_insert_id($connection);
        // also store user report details
        $insertInCommentReports="insert into commentreportusers(maincommentid,userId,fullname) values($insertId,$activeClientId,'$fullname')";
        mysqli_query($connection,$insertInCommentReports);
    
}



    }

}

?>