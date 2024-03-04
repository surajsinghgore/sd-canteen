<?php
 require('../middleware/ConnectToDatabase.php');



 if(isset($_POST['year'])){
    $year=$_POST['year'];

    
    $data="";


$janCount="null";
$febCount="null";
$marCount="null";
$aprCount="null";
$mayCount="null";
$junCount="null";
$julCount="null";
$augCount="null";
$sepCount="null";
$octCount="null";
$novCount="null";
$decCount="null";

    // fetch monthwise visits
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___01-$year%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___02-$year%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___03-$year%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___04-$year%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___05-$year%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___06-$year%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___07-$year%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___08-$year%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___09-$year%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___10-$year%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___11-$year%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___12-$year%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}


// calculate 
$totalMonthwise="$janCount+$febCount+$marCount+$aprCount+$mayCount+$junCount+$julCount+$augCount+$sepCount+$octCount+$novCount+$decCount";

$data.= "{\"monthwisevisit\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";



// browser used count
$Chrome=0;
$Opera=0;
$Firefox=0;
$IE=0;
$Other=0;
$Edge=0;
$Safari=0;

$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%chrome%'");
$Chrome=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%opera%'");
$Opera=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%firebox%'");
$Firefox=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%IE%'");
$IE=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%other Browser%'");
$Other=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%edge%'");
$Edge=mysqli_num_rows($chromeRes);
$chromeRes=mysqli_query($connection,"SELECT * FROM websitecounter where browser like '%safari%'");
$Safari=mysqli_num_rows($chromeRes);


$data.=",\"browserUse\":[$Chrome,$Firefox,$Safari,$Opera,$Edge,$IE,$Other]";





// total order placed

$janCount="null";
$febCount="null";
$marCount="null";
$aprCount="null";
$mayCount="null";
$junCount="null";
$julCount="null";
$augCount="null";
$sepCount="null";
$octCount="null";
$novCount="null";
$decCount="null";

    // fetch monthwise visits
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= ",\"totalOrders\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";


echo $data;
$data2="";


// ! top 10 trending items
$subDataHeading="";
$subData="";
$topTrendingRes=mysqli_query($connection,"select*from topsearches order by numberofsearch desc LIMIT 10");
$count=0;
while($data=mysqli_fetch_array($topTrendingRes)){
    $itemName=$data['itemname'];
    $numberofsearch=$data['numberofsearch'];
    ++$count;
    if($count<10){
        $subDataHeading.="\"$itemName\",";
        $subData.="\"$numberofsearch\",";
    }else{
        $subDataHeading.="\"$itemName\"";
        $subData.="\"$numberofsearch\"";
    }
}


$data2.= ",\"trendingItemName\":[$subDataHeading]";
$data2.= ",\"trendingItemData\":[$subData],";


echo $data2;

$data3= "";

// total order placed

$janCount="0";
$febCount="0";
$marCount="0";
$aprCount="0";
$mayCount="0";
$junCount="0";
$julCount="0";
$augCount="0";
$sepCount="0";
$octCount="0";
$novCount="0";
$decCount="0";

// jan

$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___01-$year%'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
if($janCountRes['Sum']!=null){
    $janCount=$janCountRes['Sum'];

}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___02-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $febCount=$janCountRes['Sum'];
    }
    
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___03-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
  
    if($janCountRes['Sum']!=null){
        $marCount=$janCountRes['Sum'];
    }
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___04-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $aprCount=$janCountRes['Sum'];
    }

// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___05-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
    
    if($janCountRes['Sum']!=null){
        $mayCount=$janCountRes['Sum'];
    }
// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___06-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
     
    if($janCountRes['Sum']!=null){
        $junCount=$janCountRes['Sum'];
    }
// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___07-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $julCount=$janCountRes['Sum'];
    }


// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___08-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $augCount=$janCountRes['Sum'];
    }


// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___09-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
    if($janCountRes['Sum']!=null){
        $sepCount=$janCountRes['Sum'];
    }


// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___10-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
 
    if($janCountRes['Sum']!=null){
        $octCount=$janCountRes['Sum'];
    }



// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___11-$year%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $novCount=$janCountRes['Sum'];
    }

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___12-$year%'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $decCount=$janCountRes['Sum'];
    }

// calculate
$data.= ",\"totalOrders\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
$data3.= "\"totalOrders\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $data3;





// monthwise clients
$data4="";
$janCount="null";
$febCount="null";
$marCount="null";
$aprCount="null";
$mayCount="null";
$junCount="null";
$julCount="null";
$augCount="null";
$sepCount="null";
$octCount="null";
$novCount="null";
$decCount="null";

    // fetch monthwise visits
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-01___'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-02___'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-03___'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-04___'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-05___'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-06___'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-07___'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-08___'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-09___'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-10___'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-11___'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM clientdata where createdAt like '$year-12___'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data4.= ",\"monthwiseclient\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $data4;


// most ordered food item
$data5="";
// ! top 10 trending items
$subDataHeading="";
$subData="";
$topTrendingRes=mysqli_query($connection,"select*from ordertrack where maincategory='food' order by totalOrder desc LIMIT 10");
$count=0;
while($data=mysqli_fetch_array($topTrendingRes)){
    $itemName=$data['itemName'];
    $numberofsearch=$data['totalOrder'];
    ++$count;
    if($count<9){
        $subDataHeading.="\"$itemName\",";
        $subData.="\"$numberofsearch\",";
    }else{
        $subDataHeading.="\"$itemName\"";
        $subData.="\"$numberofsearch\"";
    }
}


$data5.= ",\"topFoodName\":[$subDataHeading]";
$data5.= ",\"topFoodData\":[$subData]";
echo $data5;





// most ordered food item
$data6="";
// ! top 10 trending items
$subDataHeading="";
$subData="";
$topTrendingRes=mysqli_query($connection,"select*from ordertrack where maincategory='coffee' order by totalOrder desc LIMIT 10");
$count=0;
while($data=mysqli_fetch_array($topTrendingRes)){
    $itemName=$data['itemName'];
    $numberofsearch=$data['totalOrder'];
    ++$count;
    if($count<10){
        $subDataHeading.="\"$itemName\",";
        $subData.="\"$numberofsearch\",";
    }else{
        $subDataHeading.="\"$itemName\"";
        $subData.="\"$numberofsearch\"";
    }
}


$data6.= ",\"topCoffeeName\":[$subDataHeading]";
$data6.= ",\"topCoffeeData\":[$subData]";
echo $data6;




// most ordered juice item
$data7="";

$subDataHeading="";
$subData="";
$topTrendingRes=mysqli_query($connection,"select*from ordertrack where maincategory='juice' order by totalOrder desc LIMIT 10");
$count=0;
while($data=mysqli_fetch_array($topTrendingRes)){
    $itemName=$data['itemName'];
    $numberofsearch=$data['totalOrder'];
    ++$count;
    if($count<10){
        $subDataHeading.="\"$itemName\",";
        $subData.="\"$numberofsearch\",";
    }else{
        $subDataHeading.="\"$itemName\"";
        $subData.="\"$numberofsearch\"";
    }
}


$data7.= ",\"topJuiceName\":[$subDataHeading]";
$data7.= ",\"topJuiceData\":[$subData]";
echo $data7;




// most drink food item
$data8="";
$subDataHeading="";
$subData="";
$topTrendingRes=mysqli_query($connection,"select*from ordertrack where maincategory='drink' order by totalOrder desc LIMIT 10");
$count=0;
while($data=mysqli_fetch_array($topTrendingRes)){
    $itemName=$data['itemName'];
    $numberofsearch=$data['totalOrder'];
    ++$count;
    if($count<10){
        $subDataHeading.="\"$itemName\",";
        $subData.="\"$numberofsearch\",";
    }else{
        $subDataHeading.="\"$itemName\"";
        $subData.="\"$numberofsearch\"";
    }
}


$data8.= ",\"topDrinkName\":[$subDataHeading]";
$data8.= ",\"topDrinkData\":[$subData]}";
echo $data8;
}
?>