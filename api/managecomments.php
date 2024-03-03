<?php

require('../middleware/ConnectToDatabase.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    require('../middleware/ConnectToDatabase.php');


    // toxic comment handle
    if ((isset($_POST['toxic']))&& (isset($_POST['id']))&&(isset($_POST['commentId']))){


$id=$_POST['id'];
$commentId=$_POST['commentId'];

// fetch toxic text user for email
$fetchDataQuery="select*from itemratingcomments where id=$commentId";
$fetchFromItemRatingCommentData=mysqli_query($connection, $fetchDataQuery);

$userRatingData=mysqli_fetch_assoc($fetchFromItemRatingCommentData);
$userID=$userRatingData['userId'];
$originalMessage=$userRatingData['message'];

$fetchUserData=mysqli_query($connection, "select*from clientdata where id=$userID");
$userData=mysqli_fetch_assoc($fetchUserData);
$email=$userData['email'];
$fullname=$userData['fullname'];


// update original comment
$updateQuery="update itemratingcomments set message='this message contain toxic text' where id=$commentId";
mysqli_query($connection, $updateQuery); 

//remove from comment report
$deleteCommentFromCommentReport="delete from commentreports where id=$id";
mysqli_query($connection, $deleteCommentFromCommentReport);
// remove from commentreportusers
$deleteCommentFromCommentUserReport="delete from commentreportusers where maincommentid=$id";
mysqli_query($connection, $deleteCommentFromCommentUserReport);



// send mail about action
$to = $email;
$subject = "Inappropriate comment found on SD CANTEEN posted by you";
$message = "
<html>
    <head>
        <title>Account Login on SD CANTEEN</title>
    </head>

    <body>
        <div>
        <img src='https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png' alt='logo' height='50px' width='130px' style='margin-left:30vw'>
        </div>

        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
        <div style='text-align:center;font-size:3.5vw'><h4>Hi , $fullname</h4></div>
       
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;;font-size:3vw'>Inappropriate Comment Found </div>
       
       <div style='font-size:3.5vw;color:#f73b3b;margin-top:4%;;font-size:3.3vw'>Your Comment : <b>$originalMessage</b> contain inappropriate text.</div>
       
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3vw;'>You can change this comment to include proper text in the item review section</div>
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3vw;'>Please use the SD CANTEEN website in accordance with the proper rules and regulations.</div>
       <div style='text-align:center;margin-top:3%;margin-bottom:2%;font-size:3vw;'>Don't use toxic language in the comment sections of items.</div>
       <div style='font-size:3vw;text-align:center;color:#383838;margin-top:5%'>Thank You,</div>
       <div style='font-size:evw;text-align:center;color: rgb(255, 98, 0);'>Team SD CANTEEN</div>
       <div style='font-size:2vw;text-align:center;color:#4f4f4f;margin-top:6%;margin-bottom:6%'>Please follow proper guidelines issued by SD canteen</div> 
        <div style='color:blue;background-color:rgb(255, 98, 0);padding:1% 0% 1% 3%;color:white;font-size:4vw'>SD CANTEEN</div>
         
    </body>
    </html>
    ";
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                        $headers .= 'From: prpbrainbooster@gmail.com' . "\r\n";
    
    
                        $result = mail($to, $subject, $message, $headers);
                        if ($result == true) {
                          
                        }

    }

// no toxic comment handle
if ((isset($_POST['notoxic']))&& (isset($_POST['id']))&&(isset($_POST['commentId']))){


    $id=$_POST['id'];
    $commentId=$_POST['commentId'];
 

    

    //remove from comment report
    $deleteCommentFromCommentReport="delete from commentreports where id=$id";
    mysqli_query($connection, $deleteCommentFromCommentReport);
    // remove from commentreportusers
    $deleteCommentFromCommentUserReport="delete from commentreportusers where maincommentid=$id";
    mysqli_query($connection, $deleteCommentFromCommentUserReport);
    
    
    
    
        }
    
}


?>