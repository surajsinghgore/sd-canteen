<?php
 require('../middleware/ConnectToDatabase.php');



// single year
if(isset($_POST['year1'])&&(isset($_POST['onlyOne']))){
    $year1=$_POST['year1'];


    // total earing [year1]
  
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

$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___01-$year1%'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
if($janCountRes['Sum']!=null){
    $janCount=$janCountRes['Sum'];

}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___02-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $febCount=$janCountRes['Sum'];
    }
    
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___03-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
  
    if($janCountRes['Sum']!=null){
        $marCount=$janCountRes['Sum'];
    }
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___04-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $aprCount=$janCountRes['Sum'];
    }

// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___05-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
    
    if($janCountRes['Sum']!=null){
        $mayCount=$janCountRes['Sum'];
    }
// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___06-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
     
    if($janCountRes['Sum']!=null){
        $junCount=$janCountRes['Sum'];
    }
// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___07-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $julCount=$janCountRes['Sum'];
    }


// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___08-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $augCount=$janCountRes['Sum'];
    }


// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___09-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
    if($janCountRes['Sum']!=null){
        $sepCount=$janCountRes['Sum'];
    }


// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___10-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
 
    if($janCountRes['Sum']!=null){
        $octCount=$janCountRes['Sum'];
    }



// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___11-$year1%'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $novCount=$janCountRes['Sum'];
    }

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___12-$year1%'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $decCount=$janCountRes['Sum'];
    }

// calculate

$data= "{\"totalEarningYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $data;



// number of payment initiated online [Year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___01-$year1%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
    $janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___02-$year1%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
    $febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___03-$year1%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
    $marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___04-$year1%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___05-$year1%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___06-$year1%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___07-$year1%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___08-$year1%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___09-$year1%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___10-$year1%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___11-$year1%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM paymentdata where orderdate like '%___12-$year1%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= ",\"totalPaymentInitiatedYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;




// total revenue using online
$data="";
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

$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___01-$year1%' and orderstatus='complete' and paymentmethod='online'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
if($janCountRes['Sum']!=null){
    $janCount=$janCountRes['Sum'];

}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___02-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $febCount=$janCountRes['Sum'];
    }
    
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___03-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
  
    if($janCountRes['Sum']!=null){
        $marCount=$janCountRes['Sum'];
    }
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___04-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $aprCount=$janCountRes['Sum'];
    }

// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___05-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
    
    if($janCountRes['Sum']!=null){
        $mayCount=$janCountRes['Sum'];
    }
// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___06-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
     
    if($janCountRes['Sum']!=null){
        $junCount=$janCountRes['Sum'];
    }
// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___07-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $julCount=$janCountRes['Sum'];
    }


// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___08-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $augCount=$janCountRes['Sum'];
    }


// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___09-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
    if($janCountRes['Sum']!=null){
        $sepCount=$janCountRes['Sum'];
    }


// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___10-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
 
    if($janCountRes['Sum']!=null){
        $octCount=$janCountRes['Sum'];
    }



// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___11-$year1%' and orderstatus='complete' and paymentmethod='online'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $novCount=$janCountRes['Sum'];
    }

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___12-$year1%' and orderstatus='complete' and paymentmethod='online'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $decCount=$janCountRes['Sum'];
    }

// calculate

$data= "\"totalRevenueOnlineYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $data;



// total revenue using cod [Year1]
 $data="";
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

$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___01-$year1%' and orderstatus='complete' and paymentmethod='cod'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
if($janCountRes['Sum']!=null){
    $janCount=$janCountRes['Sum'];

}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___02-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $febCount=$janCountRes['Sum'];
    }
    
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___03-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
  
    if($janCountRes['Sum']!=null){
        $marCount=$janCountRes['Sum'];
    }
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___04-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $aprCount=$janCountRes['Sum'];
    }

// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___05-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
    
    if($janCountRes['Sum']!=null){
        $mayCount=$janCountRes['Sum'];
    }
// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___06-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
     
    if($janCountRes['Sum']!=null){
        $junCount=$janCountRes['Sum'];
    }
// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___07-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $julCount=$janCountRes['Sum'];
    }


// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___08-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $augCount=$janCountRes['Sum'];
    }


// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___09-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    
    if($janCountRes['Sum']!=null){
        $sepCount=$janCountRes['Sum'];
    }


// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___10-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
 
    if($janCountRes['Sum']!=null){
        $octCount=$janCountRes['Sum'];
    }



// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___11-$year1%' and orderstatus='complete' and paymentmethod='cod'");
$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);
   
    if($janCountRes['Sum']!=null){
        $novCount=$janCountRes['Sum'];
    }

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT SUM(amountreceived) as Sum FROM orderitems where orderdate like '%___12-$year1%' and orderstatus='complete' and paymentmethod='cod'");

$janCountRes=mysqli_fetch_assoc($websiteVisitCountRes);

    if($janCountRes['Sum']!=null){
        $decCount=$janCountRes['Sum'];
    }

// calculate

$data= ",\"totalRevenueCODYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]";
echo $data;



// total success payments [Year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and paymentstatus='success'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and paymentstatus='success'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and paymentstatus='success'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and paymentstatus='success'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and paymentstatus='success'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and paymentstatus='success'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and paymentstatus='success'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and paymentstatus='success'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and paymentstatus='success'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and paymentstatus='success'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and paymentstatus='success'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and paymentstatus='success'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= ",\"totalSuccessPaymentYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;


// total failed payment [year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and paymentstatus='failed'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and paymentstatus='failed'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and paymentstatus='failed'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and paymentstatus='failed'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and paymentstatus='failed'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and paymentstatus='failed'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and paymentstatus='failed'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and paymentstatus='failed'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and paymentstatus='failed'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and paymentstatus='failed'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and paymentstatus='failed'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and paymentstatus='failed'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalFailedPaymentYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;



// total pending payments [year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and paymentstatus='pending'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and paymentstatus='pending'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and paymentstatus='pending'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and paymentstatus='pending'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and paymentstatus='pending'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and paymentstatus='pending'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and paymentstatus='pending'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and paymentstatus='pending'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and paymentstatus='pending'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and paymentstatus='pending'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and paymentstatus='pending'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and paymentstatus='pending'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalPendingPaymentYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;





// total number of online payment [Year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___01-$year1%' and paymentmethod");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___02-$year1%' and paymentmethod");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___03-$year1%' and paymentmethod");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___04-$year1%' and paymentmethod");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___05-$year1%' and paymentmethod");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___06-$year1%' and paymentmethod");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___07-$year1%' and paymentmethod");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___08-$year1%' and paymentmethod");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___09-$year1%' and paymentmethod");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___10-$year1%' and paymentmethod");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___11-$year1%' and paymentmethod");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where orderdate like '%___12-$year1%' and paymentmethod");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalPendingPaymentYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
// echo $data;





// total number of cod payment [Year1]
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___01-$year1%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___02-$year1%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___03-$year1%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___04-$year1%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___05-$year1%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___06-$year1%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___07-$year1%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___08-$year1%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___09-$year1%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___10-$year1%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___11-$year1%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='cod' and orderdate like '%___12-$year1%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalCodOrderYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount],";
echo $data;


// total order using online
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
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___01-$year1%'");
$janCountRes=mysqli_num_rows($websiteVisitCountRes);
if($janCountRes>0){
$janCount=$janCountRes;
}

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___02-$year1%'");
$febCountRes=mysqli_num_rows($websiteVisitCountRes);
if($febCountRes>0){
$febCount=$febCountRes;
}
// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___03-$year1%'");
$marCountRes=mysqli_num_rows($websiteVisitCountRes);
if($marCountRes> 0){
$marCount=$marCountRes;
}
// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___04-$year1%'");
$aprCountRes=mysqli_num_rows($websiteVisitCountRes);
if($aprCountRes> 0){$aprCount=$aprCountRes;}


// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___05-$year1%'");
$mayCountRes=mysqli_num_rows($websiteVisitCountRes);
if($mayCountRes> 0){$mayCount=$aprCountRes;}

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___06-$year1%'");
$junCountRes=mysqli_num_rows($websiteVisitCountRes);
if($junCountRes> 0){$junCount=$junCountRes;}

// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___07-$year1%'");
$julCountRes=mysqli_num_rows($websiteVisitCountRes);
if($julCountRes> 0){$julCount=$julCountRes;}

// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___08-$year1%'");
$augCountRes=mysqli_num_rows($websiteVisitCountRes);
if($augCountRes> 0){$augCount=$augCountRes;}

// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___09-$year1%'");
$sepCountRes=mysqli_num_rows($websiteVisitCountRes);
if($sepCountRes> 0){$sepCount=$sepCountRes;}

// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___10-$year1%'");
$octCountRes=mysqli_num_rows($websiteVisitCountRes);
if($octCountRes> 0){$octCount=$octCountRes;}

// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___11-$year1%'");
$novCountRes=mysqli_num_rows($websiteVisitCountRes);
if($novCountRes> 0){$novCount=$novCountRes;}

// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM orderitems where paymentmethod='online' and orderdate like '%___12-$year1%'");
$decCountRes=mysqli_num_rows($websiteVisitCountRes);
if($decCountRes> 0){$decCount=$decCountRes;}
// calculate
$data.= "\"totalOnlineOrderYear1\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]}";
echo $data;


}






// two year 
if(isset($_POST['year1'])&&isset($_POST['year2'])&&(isset($_POST['SecondYear2']))){}







//  three year
if(isset($_POST['year1'])&&isset($_POST['year2'])&&(isset($_POST['SecondYear3'])&&isset($_POST['year3']))){}
 ?>