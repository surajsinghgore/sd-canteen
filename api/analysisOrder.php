<?php
 require('../middleware/ConnectToDatabase.php');


// single year
 if(isset($_POST['year1'])&&(isset($_POST['onlyOne']))){


    $year1=$_POST['year1'];


    // total order place
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "{\"totalOrdersYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;



// total complete orders
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'complete'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'complete'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'complete'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'complete'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'complete'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'complete'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'complete'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'complete'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'complete'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'complete'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'complete'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'complete'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersCompleteYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;



// total order reject

// total complete orders
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'reject'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'reject'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'reject'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'reject'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'reject'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'reject'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'reject'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'reject'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'reject'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'reject'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'reject'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'reject'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersRejectYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;




// total complete orders
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



// pending order
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'pending'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'pending'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'pending'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'pending'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'pending'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'pending'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'pending'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'pending'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'pending'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'pending'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'pending'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'pending'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersPendingYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]}";
echo $data;

 }





// two year 
 if(isset($_POST['year1'])&&isset($_POST['year2'])&&(isset($_POST['SecondYear2']))){
$year1=$_POST['year1'];
$year2=$_POST['year2'];

    // total order place
    $dataYear1="";
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$dataYear1.= "{\"totalOrdersYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $dataYear1;
// year 2
 // total order place
 $dataYear2="";
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year2%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
 $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year2%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
 $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year2%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
 $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year2%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year2%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year2%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year2%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year2%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year2%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year2%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year2%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year2%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$dataYear2.= ",\"totalOrdersYear2\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";


echo $dataYear2;








// total complete orders
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'complete'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'complete'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'complete'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'complete'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'complete'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'complete'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'complete'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'complete'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'complete'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'complete'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'complete'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'complete'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersCompleteYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;




// total complete orders
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

// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'reject'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'reject'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'reject'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'reject'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'reject'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'reject'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'reject'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'reject'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'reject'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'reject'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'reject'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'reject'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersRejectYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;




// total complete orders
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



// pending order
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and orderstatus like 'pending'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and orderstatus like 'pending'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and orderstatus like 'pending'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and orderstatus like 'pending'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and orderstatus like 'pending'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and orderstatus like 'pending'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and orderstatus like 'pending'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and orderstatus like 'pending'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and orderstatus like 'pending'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and orderstatus like 'pending'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and orderstatus like 'pending'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and orderstatus like 'pending'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersPendingYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;





// total complete orders
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year2%' and orderstatus like 'complete'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year2%' and orderstatus like 'complete'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year2%' and orderstatus like 'complete'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year2%' and orderstatus like 'complete'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year2%' and orderstatus like 'complete'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year2%' and orderstatus like 'complete'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year2%' and orderstatus like 'complete'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year2%' and orderstatus like 'complete'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year2%' and orderstatus like 'complete'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year2%' and orderstatus like 'complete'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year2%' and orderstatus like 'complete'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year2%' and orderstatus like 'complete'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersCompleteYear2\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;



// total order reject

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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year2%' and orderstatus like 'reject'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year2%' and orderstatus like 'reject'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year2%' and orderstatus like 'reject'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year2%' and orderstatus like 'reject'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year2%' and orderstatus like 'reject'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year2%' and orderstatus like 'reject'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year2%' and orderstatus like 'reject'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year2%' and orderstatus like 'reject'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year2%' and orderstatus like 'reject'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year2%' and orderstatus like 'reject'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year2%' and orderstatus like 'reject'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year2%' and orderstatus like 'reject'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersRejectYear2\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;




// total complete orders
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



// pending order
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year2%' and orderstatus like 'pending'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year2%' and orderstatus like 'pending'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year2%' and orderstatus like 'pending'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year2%' and orderstatus like 'pending'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year2%' and orderstatus like 'pending'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year2%' and orderstatus like 'pending'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year2%' and orderstatus like 'pending'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year2%' and orderstatus like 'pending'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year2%' and orderstatus like 'pending'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year2%' and orderstatus like 'pending'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year2%' and orderstatus like 'pending'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year2%' and orderstatus like 'pending'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOrdersPendingYear2\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]}";
echo $data;



 }








//  three year
if(isset($_POST['year1'])&&isset($_POST['year2'])&&(isset($_POST['SecondYear3'])&&isset($_POST['year3']))){
    $year1=$_POST['year1'];
    $year2=$_POST['year2'];
    $year3=$_POST['year3'];
    
        // total order place
        $dataYear1="";
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
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%'");
    $janCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($janCountRes>0){
        $janCount=$janCountRes;
    }
    
    // feb
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%'");
    $febCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($febCountRes>0){
        $febCount=$febCountRes;
    }
    // mar
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%'");
    $marCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($marCountRes> 0){
        $marCount=$marCountRes;
    }
    // apr
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%'");
    $aprCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($aprCountRes> 0){$aprCount=$aprCountRes;}
    
    
    // may
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%'");
    $mayCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($mayCountRes> 0){$mayCount=$aprCountRes;}
    
    // jun
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%'");
    $junCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($junCountRes> 0){$junCount=$junCountRes;}
    
    // jul
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%'");
    $julCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($julCountRes> 0){$julCount=$julCountRes;}
    
    // aug
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%'");
    $augCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($augCountRes> 0){$augCount=$augCountRes;}
    
    // sep
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%'");
    $sepCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($sepCountRes> 0){$sepCount=$sepCountRes;}
    
    // oct
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%'");
    $octCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($octCountRes> 0){$octCount=$octCountRes;}
    
    // nov
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%'");
    $novCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($novCountRes> 0){$novCount=$novCountRes;}
    
    // dec
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%'");
    $decCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($decCountRes> 0){$decCount=$decCountRes;}
    // calculate
    $dataYear1.= "{\"totalOrdersYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
    echo $dataYear1;
    // year 2
     // total order place
     $dataYear2="";
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
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year2%'");
    $janCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($janCountRes>0){
     $janCount=$janCountRes;
    }
    
    // feb
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year2%'");
    $febCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($febCountRes>0){
     $febCount=$febCountRes;
    }
    // mar
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year2%'");
    $marCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($marCountRes> 0){
     $marCount=$marCountRes;
    }
    // apr
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year2%'");
    $aprCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($aprCountRes> 0){$aprCount=$aprCountRes;}
    
    
    // may
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year2%'");
    $mayCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($mayCountRes> 0){$mayCount=$aprCountRes;}
    
    // jun
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year2%'");
    $junCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($junCountRes> 0){$junCount=$junCountRes;}
    
    // jul
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year2%'");
    $julCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($julCountRes> 0){$julCount=$julCountRes;}
    
    // aug
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year2%'");
    $augCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($augCountRes> 0){$augCount=$augCountRes;}
    
    // sep
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year2%'");
    $sepCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($sepCountRes> 0){$sepCount=$sepCountRes;}
    
    // oct
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year2%'");
    $octCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($octCountRes> 0){$octCount=$octCountRes;}
    
    // nov
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year2%'");
    $novCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($novCountRes> 0){$novCount=$novCountRes;}
    
    // dec
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year2%'");
    $decCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($decCountRes> 0){$decCount=$decCountRes;}
    // calculate
    $dataYear2.= ",\"totalOrdersYear2\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
    
    
    echo $dataYear2;
    // third year
      // year 3
     // total order place
     $dataYear3="";
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
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year3%'");
    $janCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($janCountRes>0){
     $janCount=$janCountRes;
    }
    
    // feb
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year3%'");
    $febCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($febCountRes>0){
     $febCount=$febCountRes;
    }
    // mar
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year3%'");
    $marCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($marCountRes> 0){
     $marCount=$marCountRes;
    }
    // apr
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year3%'");
    $aprCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($aprCountRes> 0){$aprCount=$aprCountRes;}
    
    
    // may
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year3%'");
    $mayCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($mayCountRes> 0){$mayCount=$aprCountRes;}
    
    // jun
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year3%'");
    $junCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($junCountRes> 0){$junCount=$junCountRes;}
    
    // jul
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year3%'");
    $julCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($julCountRes> 0){$julCount=$julCountRes;}
    
    // aug
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year3%'");
    $augCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($augCountRes> 0){$augCount=$augCountRes;}
    
    // sep
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year3%'");
    $sepCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($sepCountRes> 0){$sepCount=$sepCountRes;}
    
    // oct
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year3%'");
    $octCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($octCountRes> 0){$octCount=$octCountRes;}
    
    // nov
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year3%'");
    $novCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($novCountRes> 0){$novCount=$novCountRes;}
    
    // dec
    $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year3%'");
    $decCountRes=mysqli_num_rows($websiteVisitCountRes);
    if($decCountRes> 0){$decCount=$decCountRes;}
    // calculate
    $dataYear3.= ",\"totalOrdersYear3\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]}";
    
    
    echo $dataYear3;
    
    
     }
 ?>