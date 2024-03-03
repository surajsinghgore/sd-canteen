<?php
 require('../middleware/ConnectToDatabase.php');



 if(isset($_POST['year'])){
    $year=$_POST['year'];

    
    $data="";
    // fetch monthwise visits
// jan
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___01-$year%'");
$janCount=mysqli_num_rows($websiteVisitCountRes);

// feb
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___02-$year%'");
$febCount=mysqli_num_rows($websiteVisitCountRes);

// mar
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___03-$year%'");
$marCount=mysqli_num_rows($websiteVisitCountRes);

// apr
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___04-$year%'");
$aprCount=mysqli_num_rows($websiteVisitCountRes);
// may
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___05-$year%'");
$mayCount=mysqli_num_rows($websiteVisitCountRes);

// jun
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___06-$year%'");
$junCount=mysqli_num_rows($websiteVisitCountRes);
// jul
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___07-$year%'");
$julCount=mysqli_num_rows($websiteVisitCountRes);
// aug
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___08-$year%'");
$augCount=mysqli_num_rows($websiteVisitCountRes);
// sep
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___09-$year%'");
$sepCount=mysqli_num_rows($websiteVisitCountRes);
// oct
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___10-$year%'");
$octCount=mysqli_num_rows($websiteVisitCountRes);
// nov
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___11-$year%'");
$novCount=mysqli_num_rows($websiteVisitCountRes);
// dec
$websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter where visitDate like '%___12-$year%'");
$decCount=mysqli_num_rows($websiteVisitCountRes);

$data.= "{\"monthwisevisit\":[$janCount,$febCount,$marCount,$aprCount,$mayCount,$junCount,$julCount,$augCount,$sepCount,$octCount,$novCount,$decCount]}";

// $websiteVisitCountRes=mysqli_query($connection,"SELECT * FROM websitecounter GROUP BY MONTH(visitDate) ORDER BY MONTH(visitDate)");

echo $data;

}
?>