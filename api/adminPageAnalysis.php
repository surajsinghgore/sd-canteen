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


$data.=",\"browserUse\":[$Chrome,$Firefox,$Safari,$Opera,$Edge,$IE,$Other]}";

echo $data;

}
?>