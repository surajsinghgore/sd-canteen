<?php

   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //   connection
  require('../middleware/ConnectToDatabase.php');
  // verify client login
  if (!isset($_SESSION)) {
    session_start();
}
    // post report comments
    if (isset($_POST['idToReport'])) {

      
       

        

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




    // fetch comments using star
    if (isset($_POST['filterUsingStar'])&&isset($_POST['itemName'])){
$filterUsingStar=$_POST['filterUsingStar'];
$itemName=$_POST['itemName'];


// itemsrating gets

$itemsRatingQuery="select*from itemsrating where itemName like '%$itemName%'";
$itemRatingRes=mysqli_query($connection,$itemsRatingQuery);
$ratingRecordsCount=mysqli_num_rows($itemRatingRes);

if($ratingRecordsCount>0){
$ratingData=mysqli_fetch_assoc($itemRatingRes);
$id=$ratingData['id'];



$viewQuery="select*from itemratingcomments where QualityRate=$filterUsingStar and ratingId=$id";
$ResQuery=mysqli_query($connection,$viewQuery);
$countResult=mysqli_num_rows($ResQuery);

if($countResult>0){
while($subDatas=mysqli_fetch_array($ResQuery)){
?>
<div class="reviewSection" >
                <div class="topSection">
                  <div class="starSection" >
                  <div class="starRatingBox" >
        <span style="font-size:15px;">
        <?php echo $subDatas['QualityRate'];?>
        </span>
        <span class="fa fa-star checked"></span>
    </div>
                    <p></p>
                   
                  </div>
                  <div class="userDetails">
                    <h2><?php echo $subDatas['username'];?></h2>
                  </div>

                  <div class="icons">
                  <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                    <p><?php echo $subDatas['commentdate'];?></p>


                    <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                    <p><?php echo $subDatas['commenttime'];?></p>
                  </div>
                </div>

                <div class="commentStyle">
                  <p><?php echo $subDatas['message'];?></p>
                </div>


<!-- report comments -->

<!-- only allowed after login -->
<?php if(isset($_SESSION['activeClientId'])){
$userActiveId=$_SESSION['activeClientId'];

if($subDatas['userId']!= $userActiveId){
?>
   <svg   
                data-toggle="modal" data-target="#exampleModal"

onclick='reportComments("<?php echo $subDatas['id'];?>")'

 class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>


<?php }
} ?>
             
                
          

          



    
    </div>




    <?php }





 }


else{
?>

<div class="reviewSection" >
                <div class="topSection">
                  <div class="starSection" >
                  <div class="starRatingBox" >
        <span style="font-size:15px;">
        5
        </span>
        <span class="fa fa-star checked"></span>
    </div>
                    <p></p>
                   
                  </div>
                  <div class="userDetails">
                    <h2>admin</h2>
                  </div>

                  <div class="icons">
                  <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                    <p>0-0-0000</p>


                    <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                    <p>0-00 Am</p>
                  </div>
                </div>

                <div class="commentStyle">
                  <p>No Comments Found</p>
                </div>




          



    
    </div>

<?php }





}

else{
?>


<div class="reviewSection" >
                <div class="topSection">
                  <div class="starSection" >
                  <div class="starRatingBox" >
        <span style="font-size:15px;">
        5
        </span>
        <span class="fa fa-star checked"></span>
    </div>
                    <p></p>
                   
                  </div>
                  <div class="userDetails">
                    <h2>admin</h2>
                  </div>

                  <div class="icons">
                  <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                    <p>0-0-0000</p>


                    <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                    <p>0-00 Am</p>
                  </div>
                </div>

                <div class="commentStyle">
                  <p>No Comments Found</p>
                </div>




          



    
    </div>
<?php }





    }




    // filter using duration
    if (isset($_POST['filterUsingDuration'])&&isset($_POST['input'])&&isset($_POST['itemName'])){
        $duration=$_POST['filterUsingDuration'];
        $input=$_POST['input'];
        $itemName=$_POST['itemName'];
        
        
        // itemsRating gets
        
        $itemsRatingQuery="select*from itemsrating where itemName like '%$itemName%'";
        $itemRatingRes=mysqli_query($connection,$itemsRatingQuery);
        $ratingRecordsCount=mysqli_num_rows($itemRatingRes);
        
        if($ratingRecordsCount>0){
        $ratingData=mysqli_fetch_assoc($itemRatingRes);
        $id=$ratingData['id'];
        

        
// fetch with latest
        if($input=="latest"){

            $sql = "select*from itemratingcomments where ratingId=$id order by commentdate desc,time24 desc";
            $viewRes1=mysqli_query($connection,$sql);
     
     
            while($subDatas = mysqli_fetch_array($viewRes1)){
     ?>
        
     
        <div class="reviewSection" >
                     <div class="topSection">
                       <div class="starSection" >
                       <div class="starRatingBox" >
             <span style="font-size:15px;">
             <?php echo $subDatas['QualityRate'];?>
             </span>
             <span class="fa fa-star checked"></span>
         </div>
                         <p></p>
                        
                       </div>
                       <div class="userDetails">
                         <h2><?php echo $subDatas['username'];?></h2>
                       </div>
     
                       <div class="icons">
                       <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                         <p><?php echo $subDatas['commentdate'];?></p>
     
     
                         <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                         <p><?php echo $subDatas['commenttime'];?></p>
                       </div>
                     </div>
     
                     <div class="commentStyle">
                       <p><?php echo $subDatas['message'];?></p>
                     </div>
     
     
     <!-- report comments -->
     
     <!-- only allowed after login -->
     <?php if(isset($_SESSION['activeClientId'])){
     $userActiveId=$_SESSION['activeClientId'];
     
     if($subDatas['userId']!= $userActiveId){
     ?>
        <svg   
                     data-toggle="modal" data-target="#exampleModal"
     
     onclick='reportComments("<?php echo $subDatas['id'];?>")'
     
      class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
     
     
     <?php }
     } ?>
                  
                     
               
     
               
     
     
     
         
         </div>
     
      <?php      }
     

        }
     


        // oldest
       else if($input=="oldest"){


            $sql = "select*from itemratingcomments where ratingId=$id order by commentdate,time24";
            $viewRes1=mysqli_query($connection,$sql);
     
     
            while($subDatas = mysqli_fetch_array($viewRes1)){
     ?>
        
     
        <div class="reviewSection" >
                     <div class="topSection">
                       <div class="starSection" >
                       <div class="starRatingBox" >
             <span style="font-size:15px;">
             <?php echo $subDatas['QualityRate'];?>
             </span>
             <span class="fa fa-star checked"></span>
         </div>
                         <p></p>
                        
                       </div>
                       <div class="userDetails">
                         <h2><?php echo $subDatas['username'];?></h2>
                       </div>
     
                       <div class="icons">
                       <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                         <p><?php echo $subDatas['commentdate'];?></p>
     
     
                         <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                         <p><?php echo $subDatas['commenttime'];?></p>
                       </div>
                     </div>
     
                     <div class="commentStyle">
                       <p><?php echo $subDatas['message'];?></p>
                     </div>
     
     
     <!-- report comments -->
     
     <!-- only allowed after login -->
     <?php if(isset($_SESSION['activeClientId'])){
     $userActiveId=$_SESSION['activeClientId'];
     
     if($subDatas['userId']!= $userActiveId){
     ?>
        <svg   
                     data-toggle="modal" data-target="#exampleModal"
     
     onclick='reportComments("<?php echo $subDatas['id'];?>")'
     
      class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
     
     
     <?php }
     } ?>
                  
                     
               
     
               
     
     
     
         
         </div>
     
      <?php      }
     

        }
     

      

        
        
        
        
        }
        
        else{
        ?>
        
        
        <div class="reviewSection" >
                        <div class="topSection">
                          <div class="starSection" >
                          <div class="starRatingBox" >
                <span style="font-size:15px;">
                5
                </span>
                <span class="fa fa-star checked"></span>
            </div>
                            <p></p>
                           
                          </div>
                          <div class="userDetails">
                            <h2>admin</h2>
                          </div>
        
                          <div class="icons">
                          <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                            <p>0-0-0000</p>
        
        
                            <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                            <p>0-00 Am</p>
                          </div>
                        </div>
        
                        <div class="commentStyle">
                          <p>No Comments Found</p>
                        </div>
        
        
        
        
                  
        
        
        
            
            </div>
        <?php }
        
        
        
        
        
            }
        
}

?>