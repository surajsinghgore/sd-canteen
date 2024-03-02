<?php


function CalaulateAvg($item){
 
       $ZeroPointFive = 0;
       $OnePointFive = 0;
       $TwoPointFive = 0;
       $ThreePointFive = 0;
       $FourPointFive = 0;
       $One = 0;
       $two = 0;
       $three = 0;
       $four = 0;
       $findAvgCount = 0;
       $five = 0;
      
         
            if ($item=="0.5") {
              $ZeroPointFive++;
            }
            if ($item=="1") {
              $One++;
            }
            if ($item=="1.5") {
              $OnePointFive++;
            }
            if ($item=="2") {
              $two++;
            }
            if ($item=="2.5") {
              $TwoPointFive++;
            }
            if ($item=="3") {
              $three++;
            }
            if ($item=="3.5") {
              $ThreePointFive++;
            }
            if ($item=="4") {
              $four++;
            }
            if ($item=="4.5") {
              $FourPointFive++;
            }
            if ($item=="5") {
              $five++;
            }
          
        if ($ZeroPointFive != 0) {
          $findAvgCount++;
        }
        if ($OnePointFive != 0) {
          $findAvgCount++;
        }
        if ($TwoPointFive != 0) {
          $findAvgCount++;
        }
        if ($ThreePointFive != 0) {
          $findAvgCount++;
        }
        if ($FourPointFive != 0) {
          $findAvgCount++;
        }
        if ($One != 0) {
          $findAvgCount++;
        }
        if ($two != 0) {
          $findAvgCount++;
        }
        if ($three != 0) {
          $findAvgCount++;
        }
        if ($four != 0) {
          $findAvgCount++;
        }
        if ($five != 0) {
          $findAvgCount++;
        }

       $calZeroPointFive = 0;
       $calOne = 0;
       $calOnePointFive = 0;
       $caltwo = 0;
       $calTwoPointFive = 0;
       $calthree = 0;
       $calThreePointFive = 0;
       $calfour = 0;
       $calFourPointFive = 0;
       $calfive = 0;
        if ($ZeroPointFive != 0) {
          $calZeroPointFive =
            (($ZeroPointFive * 0.5) / (5 * $ZeroPointFive)) * 100;
        }
        if ($OnePointFive != 0) {
          $calOnePointFive = (($OnePointFive * 1.5) / (5 * $OnePointFive)) * 100;
        }
        if ($TwoPointFive != 0) {
          $calTwoPointFive = (($TwoPointFive * 2.5) / (5 * $TwoPointFive)) * 100;
        }
        if ($ThreePointFive != 0) {
          $calThreePointFive =
            (($ThreePointFive * 3.5) / (5 * $ThreePointFive)) * 100;
        }
        if ($FourPointFive != 0) {
          $calFourPointFive =
            (($FourPointFive * 4.5) / (5 * $FourPointFive)) * 100;
        }
        if ($One != 0) {
          $calOne = (($One * 1) / (5 * $One)) * 100;
        }
        if ($two != 0) {
          $caltwo = (($two * 2) / (5 * $two)) * 100;
        }
        if ($three != 0) {
          $calthree = (($three * 3) / (5 * $three)) * 100;
        }
        if ($four != 0) {
          $calfour = (($four * 4) / (5 * $four)) * 100;
        }
        if ($five != 0) {
          $calfive = (($five * 5) / (5 * $five)) * 100;
        }

       $AllPercantegTotal =
          $calZeroPointFive +
          $calOne +
          $calOnePointFive +
          $caltwo +
          $calTwoPointFive +
          $calthree +
          $calThreePointFive +
          $calfour +
          $calFourPointFive +
          $calfive;
        $avgs = ($AllPercantegTotal / (100 * $findAvgCount)) * 100;

       
     return $avgs;
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

       
        //   function PriceRateCalculate() {
        //     let ZeroPointFive = 0;
        //     let OnePointFive = 0;
        //     let TwoPointFive = 0;
        //     let ThreePointFive = 0;
        //     let FourPointFive = 0;
        //     let One = 0;
        //     let two = 0;
        //     let three = 0;
        //     let four = 0;
        //     let findAvgCount = 0;
        //     let five = 0;
        //     if (dataRess.data.length != 0) {
        //       dataRess.data[0].ItemsReviwers.map((item) => {
        //         if (item.PriceRate == "0.5") {
        //           ZeroPointFive++;
        //         }
        //         if (item.PriceRate == "1") {
        //           One++;
        //         }
        //         if (item.PriceRate == "1.5") {
        //           OnePointFive++;
        //         }
        //         if (item.PriceRate == "2") {
        //           two++;
        //         }
        //         if (item.PriceRate == "2.5") {
        //           TwoPointFive++;
        //         }
        //         if (item.PriceRate == "3") {
        //           three++;
        //         }
        //         if (item.PriceRate == "3.5") {
        //           ThreePointFive++;
        //         }
        //         if (item.PriceRate == "4") {
        //           four++;
        //         }
        //         if (item.PriceRate == "4.5") {
        //           FourPointFive++;
        //         }
        //         if (item.PriceRate == "5") {
        //           five++;
        //         }
        //       });
        //     }
        //     if (ZeroPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (OnePointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (TwoPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (ThreePointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (FourPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (One != 0) {
        //       findAvgCount++;
        //     }
        //     if (two != 0) {
        //       findAvgCount++;
        //     }
        //     if (three != 0) {
        //       findAvgCount++;
        //     }
        //     if (four != 0) {
        //       findAvgCount++;
        //     }
        //     if (five != 0) {
        //       findAvgCount++;
        //     }
  
        //     let calZeroPointFive = 0;
        //     let calOne = 0;
        //     let calOnePointFive = 0;
        //     let caltwo = 0;
        //     let calTwoPointFive = 0;
        //     let calthree = 0;
        //     let calThreePointFive = 0;
        //     let calfour = 0;
        //     let calFourPointFive = 0;
        //     let calfive = 0;
        //     if (ZeroPointFive != 0) {
        //       calZeroPointFive =
        //         ((ZeroPointFive * 0.5) / (5 * ZeroPointFive)) * 100;
        //     }
        //     if (OnePointFive != 0) {
        //       calOnePointFive = ((OnePointFive * 1.5) / (5 * OnePointFive)) * 100;
        //     }
        //     if (TwoPointFive != 0) {
        //       calTwoPointFive = ((TwoPointFive * 2.5) / (5 * TwoPointFive)) * 100;
        //     }
        //     if (ThreePointFive != 0) {
        //       calThreePointFive =
        //         ((ThreePointFive * 3.5) / (5 * ThreePointFive)) * 100;
        //     }
        //     if (FourPointFive != 0) {
        //       calFourPointFive =
        //         ((FourPointFive * 4.5) / (5 * FourPointFive)) * 100;
        //     }
        //     if (One != 0) {
        //       calOne = ((One * 1) / (5 * One)) * 100;
        //     }
        //     if (two != 0) {
        //       caltwo = ((two * 2) / (5 * two)) * 100;
        //     }
        //     if (three != 0) {
        //       calthree = ((three * 3) / (5 * three)) * 100;
        //     }
        //     if (four != 0) {
        //       calfour = ((four * 4) / (5 * four)) * 100;
        //     }
        //     if (five != 0) {
        //       calfive = ((five * 5) / (5 * five)) * 100;
        //     }
  
        //     let AllPercantegTotal =
        //       calZeroPointFive +
        //       calOne +
        //       calOnePointFive +
        //       caltwo +
        //       calTwoPointFive +
        //       calthree +
        //       calThreePointFive +
        //       calfour +
        //       calFourPointFive +
        //       calfive;
        //     let avgs = (AllPercantegTotal / (100 * findAvgCount)) * 100;
        //     if (findAvgCount != 0) {
        //       setPrices(avgs);
        //     }
        //   }
        //   function ServiceRateCalculate() {
        //     let ZeroPointFive = 0;
        //     let OnePointFive = 0;
        //     let TwoPointFive = 0;
        //     let ThreePointFive = 0;
        //     let FourPointFive = 0;
        //     let One = 0;
        //     let two = 0;
        //     let three = 0;
        //     let four = 0;
        //     let findAvgCount = 0;
        //     let five = 0;
        //     if (dataRess.data.length != 0) {
        //       dataRess.data[0].ItemsReviwers.map((item) => {
        //         if (item.ServiceRate == "0.5") {
        //           ZeroPointFive++;
        //         }
        //         if (item.ServiceRate == "1") {
        //           One++;
        //         }
        //         if (item.ServiceRate == "1.5") {
        //           OnePointFive++;
        //         }
        //         if (item.ServiceRate == "2") {
        //           two++;
        //         }
        //         if (item.ServiceRate == "2.5") {
        //           TwoPointFive++;
        //         }
        //         if (item.ServiceRate == "3") {
        //           three++;
        //         }
        //         if (item.ServiceRate == "3.5") {
        //           ThreePointFive++;
        //         }
        //         if (item.ServiceRate == "4") {
        //           four++;
        //         }
        //         if (item.ServiceRate == "4.5") {
        //           FourPointFive++;
        //         }
        //         if (item.ServiceRate == "5") {
        //           five++;
        //         }
        //       });
        //     }
        //     if (ZeroPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (OnePointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (TwoPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (ThreePointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (FourPointFive != 0) {
        //       findAvgCount++;
        //     }
        //     if (One != 0) {
        //       findAvgCount++;
        //     }
        //     if (two != 0) {
        //       findAvgCount++;
        //     }
        //     if (three != 0) {
        //       findAvgCount++;
        //     }
        //     if (four != 0) {
        //       findAvgCount++;
        //     }
        //     if (five != 0) {
        //       findAvgCount++;
        //     }
  
        //     let calZeroPointFive = 0;
        //     let calOne = 0;
        //     let calOnePointFive = 0;
        //     let caltwo = 0;
        //     let calTwoPointFive = 0;
        //     let calthree = 0;
        //     let calThreePointFive = 0;
        //     let calfour = 0;
        //     let calFourPointFive = 0;
        //     let calfive = 0;
        //     if (ZeroPointFive != 0) {
        //       calZeroPointFive =
        //         ((ZeroPointFive * 0.5) / (5 * ZeroPointFive)) * 100;
        //     }
        //     if (OnePointFive != 0) {
        //       calOnePointFive = ((OnePointFive * 1.5) / (5 * OnePointFive)) * 100;
        //     }
        //     if (TwoPointFive != 0) {
        //       calTwoPointFive = ((TwoPointFive * 2.5) / (5 * TwoPointFive)) * 100;
        //     }
        //     if (ThreePointFive != 0) {
        //       calThreePointFive =
        //         ((ThreePointFive * 3.5) / (5 * ThreePointFive)) * 100;
        //     }
        //     if (FourPointFive != 0) {
        //       calFourPointFive =
        //         ((FourPointFive * 4.5) / (5 * FourPointFive)) * 100;
        //     }
        //     if (One != 0) {
        //       calOne = ((One * 1) / (5 * One)) * 100;
        //     }
        //     if (two != 0) {
        //       caltwo = ((two * 2) / (5 * two)) * 100;
        //     }
        //     if (three != 0) {
        //       calthree = ((three * 3) / (5 * three)) * 100;
        //     }
        //     if (four != 0) {
        //       calfour = ((four * 4) / (5 * four)) * 100;
        //     }
        //     if (five != 0) {
        //       calfive = ((five * 5) / (5 * five)) * 100;
        //     }
  
        //     let AllPercantegTotal =
        //       calZeroPointFive +
        //       calOne +
        //       calOnePointFive +
        //       caltwo +
        //       calTwoPointFive +
        //       calthree +
        //       calThreePointFive +
        //       calfour +
        //       calFourPointFive +
        //       calfive;
        //     let avgs = (AllPercantegTotal / (100 * findAvgCount)) * 100;
        //     if (findAvgCount != 0) {
        //       setService(avgs);
        //     }
        //   }


    


}

?>