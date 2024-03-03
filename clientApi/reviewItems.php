<?php


function CalaulateAvg($item,$NumberOfReviews){

    $ZeroPointFive=0;
    $OnePointFive=0;
    $TwoPointFive=0;
    $ThreePointFive=0;
    $FourPointFive=0;
    $One=0;
    $two=0;
    $three=0;
    $four=0;
    $five=0;
  
    if($item=="0.5"){$ZeroPointFive++;}
    if($item=="1"){$One++;}
    if($item=="1.5"){$OnePointFive++;}
    if($item=="2"){$two++;}
    if($item=="2.5"){$TwoPointFive++;}
    if($item=="3"){$three++;}
    if($item=="3.5"){$ThreePointFive++;}
    if($item=="4"){$four++;}
    if($item=="4.5"){$FourPointFive++;}
    if($item=="5"){$five++;}
 
    
    // if(qualityRate=="0.5"){$ZeroPointFive++;}
    // if(qualityRate=="1"){$One++;}
    // if(qualityRate=="1.5"){$OnePointFive++;}
    // if(qualityRate=="2"){$two++;}
    // if(qualityRate=="2.5"){$TwoPointFive++;}
    // if(qualityRate=="3"){$three++;}
    // if(qualityRate=="3.5"){$ThreePointFive++;}
    // if(qualityRate=="4"){$four++;}
    // if(qualityRate=="4.5"){$FourPointFive++;}
    // if(qualityRate=="5"){$five++;}
  
   
    $OverAllProuctRate=(5*$five + 4.5*$FourPointFive +4*$four +3.5*$ThreePointFive + 3*$three +2.5*$TwoPointFive + 2*$two +1.5*$OnePointFive + 1*$One+0.5*$ZeroPointFive) /$NumberOfReviews;
    
     return $OverAllProuctRate;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //   connection
    require('../middleware/ConnectToDatabase.php');

    // new enter in db
    if (isset($_POST['itemName'])&&isset($_POST['qualityRate'])&&isset($_POST['serviceRate'])&&isset($_POST['priceRate'])&&isset($_POST['new'])&&isset($_POST['usermessage'])&&isset($_POST['userId'])) {
$itemName=$_POST['itemName'];
$qualityRate=$_POST['qualityRate'];
$serviceRate=$_POST['serviceRate'];
$priceRate=$_POST['priceRate'];
$userId=$_POST['userId'];
$usermessage=$_POST['usermessage'];

date_default_timezone_set("Asia/Calcutta");
$currentDate = date("d-m-Y");
$currentTime = date("h:i:s A");

// fetch user details
$clientDataQuery="select*from clientdata where id=$userId";
$clientDataRes=mysqli_query($connection,$clientDataQuery);
$clientData=mysqli_fetch_assoc($clientDataRes);
$username=$clientData['fullname'];



// fetch itemName Original Data
$foodRes=mysqli_query($connection,"select*from fooditems where foodname like '%$itemName%'");
$food=mysqli_num_rows($foodRes);
$coffeeRes=mysqli_query($connection,"select*from coffeeitems where coffeename like '%$itemName%'");
$coffee=mysqli_num_rows($coffeeRes);
$drinkRes=mysqli_query($connection,"select*from drinkitems where drinkname like '%$itemName%'");
$drink=mysqli_num_rows($drinkRes);
$juiceRes=mysqli_query($connection,"select*from juiceitems where juicename like '%$itemName%'");
$juice=mysqli_num_rows($juiceRes);
$mainCategory="";
$itemId="";

if($food>0){
    $itemData=mysqli_fetch_assoc($foodRes);
    $mainCategory="food";
$itemId=$itemData['id'];
}
if($coffee>0){
    $itemData=mysqli_fetch_assoc($coffeeRes);
    $mainCategory="coffee";
$itemId=$itemData['id'];
}
if($drink>0){
    $itemData=mysqli_fetch_assoc($drinkRes);
    $mainCategory="drink";
$itemId=$itemData['id'];
}
if($juice>0){  $itemData=mysqli_fetch_assoc($juiceRes);
    $mainCategory="juice";
$itemId=$itemData['id'];}







// check weather new entry or update

$q1="select*from itemsrating where itemName like '%$itemName%'";
$queryCheck=mysqli_query($connection,$q1);



$itemsRatingCount=mysqli_num_rows($queryCheck);

// already exits just update
if ($itemsRatingCount> 0) {
$itemDataMain=mysqli_fetch_assoc($queryCheck);
$ratingIdMain=$itemDataMain['id'];
$ratingMain=$itemDataMain['rating'];
$numberofrating=$itemDataMain['numberofrating'];
$QualityRateMain=$itemDataMain['QualityRate'];
$ServiceRateMain=$itemDataMain['ServiceRate'];
$PriceRateMain=$itemDataMain['PriceRate'];

$q3="select*from itemratingcomments where userId=$userId and ratingId=$ratingIdMain";
$queryCheck2=mysqli_query($connection,$q3);
$itemsRatingCommentCount=mysqli_num_rows($queryCheck2);
// update request to modify its own review

if($itemsRatingCommentCount>0){

// update itemratingcomments
    $updateItemRatingComments="update itemratingcomments set message='$usermessage',QualityRate=$qualityRate,ServiceRate=$serviceRate,PriceRate=$priceRate,commenttime='$currentTime',commentdate='$currentDate' where userId=$userId and ratingId=$ratingIdMain";
$executeRes=mysqli_query($connection,$updateItemRatingComments);



// fetch all items comment so that overall rate re calculate
$allSubDatas="select*from itemratingcomments where ratingId=$ratingIdMain";
$allCommentsResData=mysqli_query($connection,$allSubDatas);
$numberOfComments=mysqli_num_rows($allCommentsResData);


$averageQuality=0;
$ServiceRate=0;
$PriceRate=0;
while($allSubData=mysqli_fetch_array($allCommentsResData)){
    $averageQuality+=CalaulateAvg($allSubData['QualityRate'],$numberOfComments);
    $ServiceRate+=CalaulateAvg($allSubData['ServiceRate'],$numberOfComments);
    $PriceRate+=CalaulateAvg($allSubData['PriceRate'],$numberOfComments);
}

$updateItemsRating="update itemsrating set rating=$averageQuality,QualityRate=$averageQuality,ServiceRate=$ServiceRate,PriceRate=$PriceRate where id=$ratingIdMain";
$executeQuery=mysqli_query($connection,$updateItemsRating);
}
// new comment

else{



    $q2="insert into itemratingcomments(ratingId,username,message,userId,QualityRate,ServiceRate,PriceRate,commenttime,commentdate) values($ratingIdMain,'$username','$usermessage',$userId,$qualityRate,$serviceRate,$priceRate,'$currentTime','$currentDate')";
    mysqli_query($connection, $q2);


// fetch all items comment so that overall rate re calculate
$allSubDatas="select*from itemratingcomments where ratingId=$ratingIdMain";
$allCommentsResData=mysqli_query($connection,$allSubDatas);
$numberOfComments=mysqli_num_rows($allCommentsResData);

++$numberofrating;
$averageQuality=0;
$ServiceRate=0;
$PriceRate=0;
while($allSubData=mysqli_fetch_array($allCommentsResData)){
    $averageQuality+=CalaulateAvg($allSubData['QualityRate'],$numberOfComments);
    $ServiceRate+=CalaulateAvg($allSubData['ServiceRate'],$numberOfComments);
    $PriceRate+=CalaulateAvg($allSubData['PriceRate'],$numberOfComments);
}

$updateItemsRating="update itemsrating set rating=$averageQuality,numberofrating=$numberofrating,QualityRate=$averageQuality,ServiceRate=$ServiceRate,PriceRate=$PriceRate where id=$ratingIdMain";
$executeQuery=mysqli_query($connection,$updateItemsRating);

}




}


// new entry
else{

$insertInRating="insert into itemsrating(itemId,itemName,maincategory,rating,numberofrating,QualityRate,ServiceRate,PriceRate) values($itemId,'$itemName','$mainCategory',$qualityRate,1,$qualityRate,$serviceRate,$priceRate)";
mysqli_query($connection, $insertInRating);
$last_INDEX_ID=mysqli_insert_id($connection);

// insert in itemratingcomments table
$q2="insert into itemratingcomments(ratingId,username,message,userId,QualityRate,ServiceRate,PriceRate,commenttime,commentdate) values($last_INDEX_ID,'$username','$usermessage',$userId,$qualityRate,$serviceRate,$priceRate,'$currentTime','$currentDate')";
mysqli_query($connection, $q2);

}


    }

       
       
    


}

?>