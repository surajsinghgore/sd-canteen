
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="./styles/client/items.css?v=6">

<link rel="stylesheet" href="./styles/admin/admin.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
    .starRatingBox{
        width:80px;
display: flex;
color: white;
height: 35px;
padding-top: 6px;
justify-content: center;
border-radius:5px;
        background-color: #388e3c;
    }
    
    .checked{
        margin-left: 8%;
        font-size:17px;
        margin-top: 3%;
        color: white;

      }
</style>
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Items Page";
</script>

<body>
 <!-- modals -->
  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm to report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to report this comment ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="noReport()">No </button>
                    <button type="button" class="btn btn-primary" onclick="reportCommentFunc()">Yes Delete


                    </button>
                </div>
            </div>
        </div>
    </div>


        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin" id="topOfPage">



 
    



  
    
        </div>




<!-- load data -->
<?php 

$itemname=$_GET['itemname'];


require('./middleware/ConnectToDatabase.php');
$totals=0;

// first check item in food
$sql_query1 = "select * from fooditems where foodname like '$itemname%' and active='on'";
$sql_query2 = "select * from coffeeitems where coffeename like '$itemname%' and active='on'";
$sql_query3 = "select * from drinkitems where drinkname like '$itemname%' and active='on'";
$sql_query4 = "select * from juiceitems where juicename like '$itemname%' and active='on'";

$foodCountRes = mysqli_query($connection, $sql_query1);
$coffeeCountRes = mysqli_query($connection, $sql_query2);
$drinkCountRes = mysqli_query($connection, $sql_query3);
$juiceCountRes = mysqli_query($connection, $sql_query4);

$foodCount = mysqli_num_rows($foodCountRes);
$coffeeCount = mysqli_num_rows($coffeeCountRes);
$drinkCount = mysqli_num_rows($drinkCountRes);
$juiceCount = mysqli_num_rows($juiceCountRes);





// food data load
if ($foodCount > 0) {
    $totals=1;
    while ($data = mysqli_fetch_array($foodCountRes)) {
    // check items rating
      $ProductId=$data['id'];


      $itemRating="select*from itemsrating where itemId=$ProductId";
      $executeItemRating=mysqli_query($connection,$itemRating);
      $ratingLenCount=mysqli_num_rows($executeItemRating);

$itemRateData=mysqli_fetch_assoc($executeItemRating);

      ?>

   <div class="searchSection">


<div class="topSection">
<div class="left">
<div class="mainImage">



  <img
    src="<?php 
    $modifiedString = substr($data['imagepath'], 1);
    echo $modifiedString;?>"
    alt="items"
   
  />
</div>    </div>



<div class="right">
  <h1 id="itemNameCurrent">
  <?php echo $data['foodname'];?>
    <span
      class="activeBtn"
    >
   <input type="text" name="itemname" id="itemnameofcurrent" value="<?php echo $data['foodname'];?>" readonly style="display:none">
   <?php 
   if(isset($_SESSION['activeClientId'])){
?>
<input type="text" name="userid" id="userId" value="<?php echo $_SESSION['activeClientId'];?>" readonly style="display:none">

<?php   }
   ?>
   
    </span>
  </h1>
 


  <div class="star">

  <!-- rating section top  -->
  <?php 
  //! no review found
  if($ratingLenCount==0){
           ?>
              <div class="startSection">

<div class="starRatingBox" >
    <span id="priceMenu">
     
   5
    </span>
    <span class="fa fa-star checked"></span>
</div>


  <h5>(0 Customer Review)</h5>
</div>
           
           <?php
          }
          //! review finds
          else{
?>
         <div class="startSection">

<div class="starRatingBox" >
    <span id="priceMenu">
     
   <?php 
   echo $itemRateData['rating'];?>
   
    </span>
    <span class="fa fa-star checked"></span>
</div>


  <h5>(<?php 
   echo $itemRateData['numberofrating'];?>
   Customer Review)</h5>
</div>
  <?php        }
          ?>
 
  </div>
  <h3>₹ <span id="price">


  <?php 
if($data['smallprice']!=0){

echo $data['smallprice'];
  
}

  else if($data['normalprice']!=0){

      echo $data['normalprice'];
  }
  else if($data['mediumprice']!=0){

    echo $data['mediumprice'];
}

else if($data['largeprice']!=0){

  echo $data['largeprice'];
}
?>

  </span></h3>
  <div class="subSection">
    <div class="subHeading">Qty :</div>
    <div class="subData">1</div>
    <div class="subHeading">Category :</div>
    <div class="subData" style="margin-top:2px"><?php 
    echo $data['category'];?></div>
  </div>
  <hr />

  <div class="filterItem">
    <h1>Select Size</h1>

    <div class="form">


   <!-- normal size -->
   <?php

if($data['normalprice']!=0){
  
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size"
                  id="normalsize"
               
                  onclick='changeSize("<?php echo $data['normalprice'];?>","normalsize")'
                  value="<?php echo $data['normalprice'];?>"
                  checked
                />
              normal
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>

    <!-- small size -->
<?php
$check=0;
if($data['smallprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="smallsize"
                  onclick='changeSize("<?php echo $data['smallprice'];?>","smallsize")'
                  value="<?php echo $data['smallprice'];?>"
            checked
                />
              small
              </span>
            </label>
          </li>

         
        </div>
  <?php

$check=1;
}
?>

   

   <!-- medium size -->
   <?php

if($data['mediumprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="mediumsize"
                  onclick='changeSize("<?php echo $data['mediumprice'];?>","mediumsize")'
                  value="<?php echo $data['mediumprice'];?>"
                  <?php if($check==0){ echo "checked";}?>
                />
              medium
              </span>
            </label>
          </li>

         
        </div>
  <?php
   $check=1;
}
?>
   
   <!-- large size -->
   <?php

if($data['largeprice']!=0){

  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="largesize"
                  onclick='changeSize("<?php echo $data['largeprice'];?>","largesize")'
                  
                  value="<?php echo $data['largeprice'];?>"
          <?php if($check==0){ echo "checked";}?>
                />
              large
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>   
    </div>
  </div>
  
  
  
  <div class="btnSection">
<!-- remove cart btn -->
    
    <button
      class="btn3"
      id="removeToCartBtn<?php echo $data['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $data['id'];?>","<?php echo $data['foodname'];?>")'
    >
      Remove From Cart
    </button>

    <button class="btn1" onclick='addToCart("<?php echo $data['id'];?>","<?php echo $data['foodname'];?>","FoodItem")' id="addToCartBtn<?php echo $data['id'];?>">
      Add To Cart
    </button>


    <!-- buy now btn -->
  <button class="btn2" onclick='addToCartAndBuy("<?php echo $data['id'];?>","<?php echo $data['foodname'];?>","FoodItem")'>
    Buy Now
  </button>
  </div>
</div>
</div>
<div class="description"><?php  echo $data['description'];?></div>

<div class="reviews" id="reviews">
<div class="heading">Rating & Reviews</div>

<div class="box">
  <div class="top">
    <div class="avgRate">
      <h1>
      <?php 
  //! no review found
  if($ratingLenCount==0){

echo "5/5";
  }
  // ! review found
else{

echo $itemRateData['rating']."/5";
}
  ?>

      </h1>
      <div class="rates">

      <!-- star -->
      <div class="starRatingBox" style="margin-bottom:10px;margin-left:8px">
        <span>
       

        <?php 
  //! no review found
  if($ratingLenCount==0){

echo "4.5";
  }
  // ! review found
else{

echo $itemRateData['rating'];
}
  ?>
        </span>
        <span class="fa fa-star checked"></span>
    </div>
        <p>Based On   <?php 
  //! no review found
  if($ratingLenCount==0){

echo "0";
  }
  // ! review found
else{

echo $itemRateData['numberofrating'];
}
  ?> rating</p>
      </div>
    </div>

    <div class="totalStar">
      <li>
        <div class="headings">Quality</div>
        <div class="progress">
          <div
            class="pro"
            style="width: <?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{
  $percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
  ?>"
          ></div>
        </div>
        <div class="percent"><?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{
  $percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
  ?></div>
      </li>
      <li>
        <div class="headings">Price</div>
        <div class="progress">
          <div
            class="pro"
            style="width:<?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{

$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
  ?>"
          ></div>
        </div>
        <div class="percent"><?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{
  $percentageOfQuality=($itemRateData['PriceRate']/5)*100;

  echo $percentageOfQuality."%";
}
  ?></div>
      </li>
      <li>
        <div class="headings">Service</div>
        <div class="progress">
          <div
            class="pro"
            style="width:<?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{
  $percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

  echo $percentageOfQuality."%";

}
  ?>"
          ></div>
        </div>
        <div class="percent"><?php 
  //! no review found
  if($ratingLenCount==0){

echo "100%";
  }
  // ! review found
else{
  $percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

  echo $percentageOfQuality."%";
}
  ?></div>
      </li>
    </div>
  </div>
<!-- filter logic -->
  <div class="filterReview">
    <div class="titles">Reviewed by <?php 
  //! no review found
  if($ratingLenCount==0){

echo "0";
  }
  // ! review found
else{

echo $itemRateData['numberofrating'];
}
  ?> user</div>
    <div class="filterSection">
      <div class="sections">
        <h1>
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg> Sort :
        </h1>
        <select
          value="All Reviews"
          id="filterUsingTime"
          onchange="filterUsingDuration()"
        >
          <option value="all">All Reviews</option>
          <option value="latest">Latest Order</option>
          <option value="oldest">Oldest Order</option>
        </select>
      </div>

      <div class="sections">
        <h1>
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> Filter :
        </h1>


        <select
          value="All star"
          id="filterUsingStar"
      onchange="filterCommentsUsingTime()"
        >
          <option value="all">All Star</option>
          <option value="5">5 Star</option>
          <option value="4.5">4.5 Star</option>
          <option value="4">4 Star</option>
          <option value="3.5">3.5 Star</option>
          <option value="3">3 Star</option>
          <option value="2.5">2.5 Star</option>
          <option value="2">2 Star</option>
          <option value="1.5">1.5 Star</option>
          <option value="1">1 Star</option>
          <option value="0.5">0.5 Star</option>
        </select>
      </div>
    </div>
  </div>


  <div class="reviewsSectionField" >
    <div class="childs" id="mainCommentSection">
   <?php 

   if(isset($itemRateData['numberofrating'])){
   if($itemRateData['numberofrating']>0){
?>


<!-- fetch comments -->
<?php 

$itemIDs=$itemRateData['id'];
$subQuery="select*from itemratingcomments where ratingId=$itemIDs";
$resSubQuery=mysqli_query($connection,$subQuery);

while($subDatas=mysqli_fetch_array($resSubQuery)){
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


// no reviews
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



                <svg class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
                
          

          



    
    </div>

  <?php }


// comments
}else{
?>
<div class="reviewSection">
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
   ?>
            
  </div>
</div>
</div>



</div>






<?php
} 










// review box
?>
<!-- check wether rating is allowed to post or not -->
<?php 

// only check after login
if(isset($_SESSION['activeClientId'])){
 $clientIdActive=$_SESSION['activeClientId'];
 
  //check weather try this food or not 
$checkQuery="select*from itemlist where userID=$clientIdActive and orderstatus='complete' and itemName like '%$itemname%'";
$result = mysqli_query($connection,$checkQuery);
$reviewCheck=mysqli_num_rows($result);

if($reviewCheck> 0){
  // check weather first time giving or already giving
  $itemsratingRes="select*from itemsrating where itemName like '%$itemname%'";
$itemRatingDataRes=mysqli_query($connection,$itemsratingRes);
$itemRatingDataResCount=mysqli_num_rows($itemRatingDataRes);

// update 
if($itemRatingDataResCount> 0){


$itemRatingData=mysqli_fetch_assoc($itemRatingDataRes);
$itemId=$itemRatingData['id'];

  $checkUpdateQuery="select*from itemratingcomments where userId=$clientIdActive and ratingId=$itemId";
  $updateResQuery=mysqli_query($connection,$checkUpdateQuery);
  $updateRowQuery=mysqli_num_rows($updateResQuery);
  $updateData=mysqli_fetch_assoc($updateResQuery);

// update because rating already given by user
  if($updateRowQuery>0){
?>
<div class="reviews">

<div class="box">


<!-- client review -->
<div class="clientReview">
              
           <h1> Update your feedback</h1> 
           
              
<!-- user message -->
            
                 <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
                 
                   readonly >
                 <textarea
                   name="message"
                   id="commentMessage"
                   
                   placeholder="Write Your Reviews*"
                 ><?php echo $updateData['message'];?>
                
               </textarea>

                 <!-- Quality Rate  -->
                 <div class="rateSection">
               
                   <h2>Quality Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="qualityRateStar">
        <?php echo $updateData['QualityRate'];?>
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="qualityRate">
     <option value="<?php echo $updateData['QualityRate'];?>" selected ><?php echo $updateData['QualityRate'];?></option>
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5">5</option>
    </select>
                   </div>
                 </div>

             <!-- service rate -->
                 <div class="rateSection">
                
                   <h2>Service Rate: </h2>
                   <div class="rateClient">
                     <!-- star -->

                     <div class="starRatingBox1" >
        <span id="serviceRateStar" >
        <?php echo $updateData['ServiceRate'];?>
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="serviceRate">

      <option value="<?php echo $updateData['ServiceRate'];?>" selected><?php echo $updateData['ServiceRate'];?></option>
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5">5</option>
    </select>
   
                   </div>
                 </div>
                 <!-- price rate  -->
                 <div class="rateSection">
                   
                   <h2>Price Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="priceRateStar">
        <?php echo $updateData['PriceRate'];?>
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>

    <select name="itemRate" id="priceRate">
    <option value="<?php echo $updateData['PriceRate'];?>" selected>  <?php echo $updateData['PriceRate'];?></option>
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" >5</option>
   
    </select>
                   </div>
                 </div>

           
                 
                 <button onclick="updateReview()">Update Review</button>
                 
                 
                
               
               
             </div>

             </div>
</div>
<?php }


// new comment
else{
?>
<div class="reviews">

<div class="box">



<div class="clientReview">
              
      
                <h1> Leave feedback about this item for others</h1>
         

            
                 <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
                 
                   readonly >
                 <textarea
                   name="message"
                   id="commentMessage"
                   placeholder="Write Your Reviews*"
                 ></textarea>

             
                 <div class="rateSection">
               
                   <h2>Quality Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="qualityRateStar">
        5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="qualityRate">
     
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
                   </div>
                 </div>

            
                 <div class="rateSection">
                
                   <h2>Service Rate: </h2>
                   <div class="rateClient">
                     <!-- star -->

                     <div class="starRatingBox1" >
        <span id="serviceRateStar" >
       5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="serviceRate">

      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
   
                   </div>
                 </div>
                 <!-- price rate  -->
                 <div class="rateSection">
                   
                   <h2>Price Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="priceRateStar">
  5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>

    <select name="itemRate" id="priceRate">
     
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
                   </div>
                 </div>

           
                 
          
                 
                 <button onclick="sendRatingNew()">Submit Review</button>
            
               
               
             </div>

             </div>
</div>
<?php }
 



 }
else{

?>


<!-- new review -->
<div class="reviews">

<div class="box">



<div class="clientReview">
              
      
                <h1> Leave feedback about this item for others</h1>
         

            
                 <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
                 
                   readonly >
                 <textarea
                   name="message"
                   id="commentMessage"
                   placeholder="Write Your Reviews*"
                 ></textarea>

             
                 <div class="rateSection">
               
                   <h2>Quality Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="qualityRateStar">
        5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="qualityRate">
     
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
                   </div>
                 </div>

            
                 <div class="rateSection">
                
                   <h2>Service Rate: </h2>
                   <div class="rateClient">
                     <!-- star -->

                     <div class="starRatingBox1" >
        <span id="serviceRateStar" >
       5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>
    <select name="itemRate" id="serviceRate">

      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
   
                   </div>
                 </div>
                 <!-- price rate  -->
                 <div class="rateSection">
                   
                   <h2>Price Rate of Item: </h2>
                   <div class="rateClient">
                   <div class="starRatingBox1" >
        <span id="priceRateStar">
  5
        </span>
        <span class="fa fa-star starIcon"></span>
    </div>

    <select name="itemRate" id="priceRate">
     
      <option value="0.5">0.5</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5" selected>5</option>
    </select>
                   </div>
                 </div>

           
                 
          
                 
                 <button onclick="sendRatingNew()">Submit Review</button>
            
               
               
             </div>

             </div>
</div>
<?php }
}


}

?>


<?php
}   


// coffee data load

 else if ($coffeeCount > 0) {
  $totals=1;
  while ($data = mysqli_fetch_array($coffeeCountRes)) {
  // check items rating
    $ProductId=$data['id'];


    $itemRating="select*from itemsrating where itemId=$ProductId";
    $executeItemRating=mysqli_query($connection,$itemRating);
    $ratingLenCount=mysqli_num_rows($executeItemRating);

$itemRateData=mysqli_fetch_assoc($executeItemRating);

    ?>

 <div class="searchSection">


<div class="topSection">
<div class="left">
<div class="mainImage">



<img
  src="<?php 
  $modifiedString = substr($data['imagepath'], 1);
  echo $modifiedString;?>"
  alt="items"
 
/>
</div>    </div>



<div class="right">
<h1 id="itemNameCurrent">
<?php echo $data['coffeename'];?>
  <span
    class="activeBtn"
  >
 <input type="text" name="itemname" id="itemnameofcurrent" value="<?php echo $data['coffeename'];?>" readonly style="display:none">
 <?php 
 if(isset($_SESSION['activeClientId'])){
?>
<input type="text" name="userid" id="userId" value="<?php echo $_SESSION['activeClientId'];?>" readonly style="display:none">

<?php   }
 ?>
 
  </span>
</h1>



<div class="star">

<!-- rating section top  -->
<?php 
//! no review found
if($ratingLenCount==0){
         ?>
            <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 5
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(0 Customer Review)</h5>
</div>
         
         <?php
        }
        //! review finds
        else{
?>
       <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 <?php 
 echo $itemRateData['rating'];?>
 
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(<?php 
 echo $itemRateData['numberofrating'];?>
 Customer Review)</h5>
</div>
<?php        }
        ?>

</div>
<h3>₹ <span id="price">


<?php 
if($data['smallprice']!=0){

echo $data['smallprice'];
  
}

  else if($data['normalprice']!=0){

      echo $data['normalprice'];
  }
  else if($data['mediumprice']!=0){

    echo $data['mediumprice'];
}

else if($data['largeprice']!=0){

  echo $data['largeprice'];
}
?>

</span></h3>
<div class="subSection">
  <div class="subHeading">Qty :</div>
  <div class="subData">1</div>
  <div class="subHeading">Category :</div>
  <div class="subData" style="margin-top:2px"><?php 
  echo $data['category'];?></div>
</div>
<hr />

<div class="filterItem">
  <h1>Select Size</h1>

  <div class="form">

 <!-- normal size -->
 <?php

if($data['normalprice']!=0){
  
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size"
                  id="normalsize"
               
                  onclick='changeSize("<?php echo $data['normalprice'];?>","normalsize")'
                  value="<?php echo $data['normalprice'];?>"
                  checked
                />
              normal
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>

    <!-- small size -->
<?php
$check=0;
if($data['smallprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="smallsize"
                  onclick='changeSize("<?php echo $data['smallprice'];?>","smallsize")'
                  value="<?php echo $data['smallprice'];?>"
            checked
                />
              small
              </span>
            </label>
          </li>

         
        </div>
  <?php

$check=1;
}
?>

   

   <!-- medium size -->
   <?php

if($data['mediumprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="mediumsize"
                  onclick='changeSize("<?php echo $data['mediumprice'];?>","mediumsize")'
                  value="<?php echo $data['mediumprice'];?>"
                  <?php if($check==0){ echo "checked";}?>
                />
              medium
              </span>
            </label>
          </li>

         
        </div>
  <?php
   $check=1;
}
?>
   
   <!-- large size -->
   <?php

if($data['largeprice']!=0){

  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="largesize"
                  onclick='changeSize("<?php echo $data['largeprice'];?>","largesize")'
                  
                  value="<?php echo $data['largeprice'];?>"
          <?php if($check==0){ echo "checked";}?>
                />
              large
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>
      
  </div>
</div>



<div class="btnSection">
<!-- remove cart btn -->
  
  <button
    class="btn3"
    id="removeToCartBtn<?php echo $data['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $data['id'];?>","<?php echo $data['coffeename'];?>")'
  >
    Remove From Cart
  </button>

  <button class="btn1" onclick='addToCart("<?php echo $data['id'];?>","<?php echo $data['coffeename'];?>","CoffeeItem")' id="addToCartBtn<?php echo $data['id'];?>">
    Add To Cart
  </button>


  <!-- buy now btn -->
<button class="btn2" onclick='addToCartAndBuy("<?php echo $data['id'];?>","<?php echo $data['coffeename'];?>","CoffeeItem")'>
  Buy Now
</button>
</div>
</div>
</div>
<div class="description"><?php  echo $data['description'];?></div>

<div class="reviews" id="reviews">
<div class="heading">Rating & Reviews</div>

<div class="box">
<div class="top">
  <div class="avgRate">
    <h1>
    <?php 
//! no review found
if($ratingLenCount==0){

echo "5/5";
}
// ! review found
else{

echo $itemRateData['rating']."/5";
}
?>

    </h1>
    <div class="rates">

    <!-- star -->
    <div class="starRatingBox" style="margin-bottom:10px;margin-left:8px">
      <span>
     

      <?php 
//! no review found
if($ratingLenCount==0){

echo "4.5";
}
// ! review found
else{

echo $itemRateData['rating'];
}
?>
      </span>
      <span class="fa fa-star checked"></span>
  </div>
      <p>Based On   <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> rating</p>
    </div>
  </div>

  <div class="totalStar">
    <li>
      <div class="headings">Quality</div>
      <div class="progress">
        <div
          class="pro"
          style="width: <?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Price</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{

$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Service</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";

}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
  </div>
</div>
<!-- filter logic -->
<div class="filterReview">
  <div class="titles">Reviewed by <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> user</div>
  <div class="filterSection">
    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg> Sort :
      </h1>
      <select
        value="All Reviews"
          id="filterUsingTime"
          onchange="filterUsingDuration()"
      >
        <option value="all">All Reviews</option>
        <option value="latest">Latest Order</option>
        <option value="oldest">Oldest Order</option>
      </select>
    </div>

    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> Filter :
      </h1>
      <select
          value="All star"
          id="filterUsingStar"
      onchange="filterCommentsUsingTime()"
        >
          <option value="all">All Star</option>
          <option value="5">5 Star</option>
          <option value="4.5">4.5 Star</option>
          <option value="4">4 Star</option>
          <option value="3.5">3.5 Star</option>
          <option value="3">3 Star</option>
          <option value="2.5">2.5 Star</option>
          <option value="2">2 Star</option>
          <option value="1.5">1.5 Star</option>
          <option value="1">1 Star</option>
          <option value="0.5">0.5 Star</option>
        </select>
      </div>
    </div>
  </div>


  <div class="reviewsSectionField" >
    <div class="childs" id="mainCommentSection">
 <?php 

 if(isset($itemRateData['numberofrating'])){
 if($itemRateData['numberofrating']>0){
?>


<!-- fetch comments -->
<?php 

$itemIDs=$itemRateData['id'];
$subQuery="select*from itemratingcomments where ratingId=$itemIDs";
$resSubQuery=mysqli_query($connection,$subQuery);

while($subDatas=mysqli_fetch_array($resSubQuery)){
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


// no reviews
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



              <svg class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
              
        

        



  
  </div>

<?php }


// comments
}else{
?>
<div class="reviewSection">
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
 ?>
          
</div>
</div>
</div>



</div>






<?php
} 










// review box
?>
<!-- check wether rating is allowed to post or not -->
<?php 

// only check after login
if(isset($_SESSION['activeClientId'])){
$clientIdActive=$_SESSION['activeClientId'];

//check weather try this food or not 
$checkQuery="select*from itemlist where userID=$clientIdActive and orderstatus='complete' and itemName like '%$itemname%'";
$result = mysqli_query($connection,$checkQuery);
$reviewCheck=mysqli_num_rows($result);

if($reviewCheck> 0){
// check weather first time giving or already giving
$itemsratingRes="select*from itemsrating where itemName like '%$itemname%'";
$itemRatingDataRes=mysqli_query($connection,$itemsratingRes);
$itemRatingDataResCount=mysqli_num_rows($itemRatingDataRes);

// update 
if($itemRatingDataResCount> 0){


$itemRatingData=mysqli_fetch_assoc($itemRatingDataRes);
$itemId=$itemRatingData['id'];

$checkUpdateQuery="select*from itemratingcomments where userId=$clientIdActive and ratingId=$itemId";
$updateResQuery=mysqli_query($connection,$checkUpdateQuery);
$updateRowQuery=mysqli_num_rows($updateResQuery);
$updateData=mysqli_fetch_assoc($updateResQuery);

// update because rating already given by user
if($updateRowQuery>0){
?>
<div class="reviews">

<div class="box">


<!-- client review -->
<div class="clientReview">
            
         <h1> Update your feedback</h1> 
         
            
<!-- user message -->
          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 
                 placeholder="Write Your Reviews*"
               ><?php echo $updateData['message'];?>
              
             </textarea>

               <!-- Quality Rate  -->
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      <?php echo $updateData['QualityRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   <option value="<?php echo $updateData['QualityRate'];?>" selected ><?php echo $updateData['QualityRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
                 </div>
               </div>

           <!-- service rate -->
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
      <?php echo $updateData['ServiceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="<?php echo $updateData['ServiceRate'];?>" selected><?php echo $updateData['ServiceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
      <?php echo $updateData['PriceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
  <option value="<?php echo $updateData['PriceRate'];?>" selected>  <?php echo $updateData['PriceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" >5</option>
 
  </select>
                 </div>
               </div>

         
               
               <button onclick="updateReview()">Update Review</button>
               
               
              
             
             
           </div>

           </div>
</div>
<?php }


// new comment
else{
?>
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }




}
else{

?>


<!-- new review -->
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }
}


}

?>


<?php
}   

// juice item data load


else if ($juiceCount > 0) {
  $totals=1;
  while ($data = mysqli_fetch_array($juiceCountRes)) {
  // check items rating
    $ProductId=$data['id'];


    $itemRating="select*from itemsrating where itemId=$ProductId";
    $executeItemRating=mysqli_query($connection,$itemRating);
    $ratingLenCount=mysqli_num_rows($executeItemRating);

$itemRateData=mysqli_fetch_assoc($executeItemRating);

    ?>

 <div class="searchSection">


<div class="topSection">
<div class="left">
<div class="mainImage">



<img
  src="<?php 
  $modifiedString = substr($data['imagepath'], 1);
  echo $modifiedString;?>"
  alt="items"
 
/>
</div>    </div>



<div class="right">
<h1 id="itemNameCurrent">
<?php echo $data['juicename'];?>
  <span
    class="activeBtn"
  >
 <input type="text" name="itemname" id="itemnameofcurrent" value="<?php echo $data['juicename'];?>" readonly style="display:none">
 <?php 
 if(isset($_SESSION['activeClientId'])){
?>
<input type="text" name="userid" id="userId" value="<?php echo $_SESSION['activeClientId'];?>" readonly style="display:none">

<?php   }
 ?>
 
  </span>
</h1>



<div class="star">

<!-- rating section top  -->
<?php 
//! no review found
if($ratingLenCount==0){
         ?>
            <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 5
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(0 Customer Review)</h5>
</div>
         
         <?php
        }
        //! review finds
        else{
?>
       <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 <?php 
 echo $itemRateData['rating'];?>
 
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(<?php 
 echo $itemRateData['numberofrating'];?>
 Customer Review)</h5>
</div>
<?php        }
        ?>

</div>
<h3>₹ <span id="price">

<?php 
if($data['smallprice']!=0){

echo $data['smallprice'];
  
}

  else if($data['normalprice']!=0){

      echo $data['normalprice'];
  }
  else if($data['mediumprice']!=0){

    echo $data['mediumprice'];
}

else if($data['largeprice']!=0){

  echo $data['largeprice'];
}
?>

</span></h3>
<div class="subSection">
  <div class="subHeading">Qty :</div>
  <div class="subData">1</div>
  <div class="subHeading">Category :</div>
  <div class="subData" style="margin-top:2px"><?php 
  echo $data['category'];?></div>
</div>
<hr />

<div class="filterItem">
  <h1>Select Size</h1>

  <div class="form">


   <!-- normal size -->
   <?php

if($data['normalprice']!=0){
  
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size"
                  id="normalsize"
               
                  onclick='changeSize("<?php echo $data['normalprice'];?>","normalsize")'
                  value="<?php echo $data['normalprice'];?>"
                  checked
                />
              normal
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>

    <!-- small size -->
<?php
$check=0;
if($data['smallprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="smallsize"
                  onclick='changeSize("<?php echo $data['smallprice'];?>","smallsize")'
                  value="<?php echo $data['smallprice'];?>"
            checked
                />
              small
              </span>
            </label>
          </li>

         
        </div>
  <?php

$check=1;
}
?>

   

   <!-- medium size -->
   <?php

if($data['mediumprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="mediumsize"
                  onclick='changeSize("<?php echo $data['mediumprice'];?>","mediumsize")'
                  value="<?php echo $data['mediumprice'];?>"
                  <?php if($check==0){ echo "checked";}?>
                />
              medium
              </span>
            </label>
          </li>

         
        </div>
  <?php
   $check=1;
}
?>
   
   <!-- large size -->
   <?php

if($data['largeprice']!=0){

  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="largesize"
                  onclick='changeSize("<?php echo $data['largeprice'];?>","largesize")'
                  
                  value="<?php echo $data['largeprice'];?>"
          <?php if($check==0){ echo "checked";}?>
                />
              large
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>
      
  </div>
</div>



<div class="btnSection">
<!-- remove cart btn -->
  
  <button
    class="btn3"
    id="removeToCartBtn<?php echo $data['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $data['id'];?>","<?php echo $data['juicename'];?>")'
  >
    Remove From Cart
  </button>

  <button class="btn1" onclick='addToCart("<?php echo $data['id'];?>","<?php echo $data['juicename'];?>","JuiceItem")' id="addToCartBtn<?php echo $data['id'];?>">
    Add To Cart
  </button>


  <!-- buy now btn -->
<button class="btn2" onclick='addToCartAndBuy("<?php echo $data['id'];?>","<?php echo $data['juicename'];?>","JuiceItem")'>
  Buy Now
</button>
</div>
</div>
</div>
<div class="description"><?php  echo $data['description'];?></div>

<div class="reviews" id="reviews">
<div class="heading">Rating & Reviews</div>

<div class="box">
<div class="top">
  <div class="avgRate">
    <h1>
    <?php 
//! no review found
if($ratingLenCount==0){

echo "5/5";
}
// ! review found
else{

echo $itemRateData['rating']."/5";
}
?>

    </h1>
    <div class="rates">

    <!-- star -->
    <div class="starRatingBox" style="margin-bottom:10px;margin-left:8px">
      <span>
     

      <?php 
//! no review found
if($ratingLenCount==0){

echo "4.5";
}
// ! review found
else{

echo $itemRateData['rating'];
}
?>
      </span>
      <span class="fa fa-star checked"></span>
  </div>
      <p>Based On   <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> rating</p>
    </div>
  </div>

  <div class="totalStar">
    <li>
      <div class="headings">Quality</div>
      <div class="progress">
        <div
          class="pro"
          style="width: <?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Price</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{

$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Service</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";

}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
  </div>
</div>
<!-- filter logic -->
<div class="filterReview">
  <div class="titles">Reviewed by <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> user</div>
  <div class="filterSection">
    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg> Sort :
      </h1>
      <select
        value="All Reviews"
          id="filterUsingTime"
          onchange="filterUsingDuration()"
      >
        <option value="all">All Reviews</option>
        <option value="latest">Latest Order</option>
        <option value="oldest">Oldest Order</option>
      </select>
    </div>

    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> Filter :
      </h1>
      <select
          value="All star"
          id="filterUsingStar"
      onchange="filterCommentsUsingTime()"
        >
          <option value="all">All Star</option>
          <option value="5">5 Star</option>
          <option value="4.5">4.5 Star</option>
          <option value="4">4 Star</option>
          <option value="3.5">3.5 Star</option>
          <option value="3">3 Star</option>
          <option value="2.5">2.5 Star</option>
          <option value="2">2 Star</option>
          <option value="1.5">1.5 Star</option>
          <option value="1">1 Star</option>
          <option value="0.5">0.5 Star</option>
        </select>
      </div>
    </div>
  </div>


  <div class="reviewsSectionField" >
    <div class="childs" id="mainCommentSection">
 <?php 

 if(isset($itemRateData['numberofrating'])){
 if($itemRateData['numberofrating']>0){
?>


<!-- fetch comments -->
<?php 

$itemIDs=$itemRateData['id'];
$subQuery="select*from itemratingcomments where ratingId=$itemIDs";
$resSubQuery=mysqli_query($connection,$subQuery);

while($subDatas=mysqli_fetch_array($resSubQuery)){
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


// no reviews
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



              <svg class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
              
        

        



  
  </div>

<?php }


// comments
}else{
?>
<div class="reviewSection">
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
 ?>
          
</div>
</div>
</div>



</div>






<?php
} 










// review box
?>
<!-- check wether rating is allowed to post or not -->
<?php 

// only check after login
if(isset($_SESSION['activeClientId'])){
$clientIdActive=$_SESSION['activeClientId'];

//check weather try this food or not 
$checkQuery="select*from itemlist where userID=$clientIdActive and orderstatus='complete' and itemName like '%$itemname%'";
$result = mysqli_query($connection,$checkQuery);
$reviewCheck=mysqli_num_rows($result);

if($reviewCheck> 0){
// check weather first time giving or already giving
$itemsratingRes="select*from itemsrating where itemName like '%$itemname%'";
$itemRatingDataRes=mysqli_query($connection,$itemsratingRes);
$itemRatingDataResCount=mysqli_num_rows($itemRatingDataRes);

// update 
if($itemRatingDataResCount> 0){


$itemRatingData=mysqli_fetch_assoc($itemRatingDataRes);
$itemId=$itemRatingData['id'];

$checkUpdateQuery="select*from itemratingcomments where userId=$clientIdActive and ratingId=$itemId";
$updateResQuery=mysqli_query($connection,$checkUpdateQuery);
$updateRowQuery=mysqli_num_rows($updateResQuery);
$updateData=mysqli_fetch_assoc($updateResQuery);

// update because rating already given by user
if($updateRowQuery>0){
?>
<div class="reviews">

<div class="box">


<!-- client review -->
<div class="clientReview">
            
         <h1> Update your feedback</h1> 
         
            
<!-- user message -->
          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 
                 placeholder="Write Your Reviews*"
               ><?php echo $updateData['message'];?>
              
             </textarea>

               <!-- Quality Rate  -->
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      <?php echo $updateData['QualityRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   <option value="<?php echo $updateData['QualityRate'];?>" selected ><?php echo $updateData['QualityRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
                 </div>
               </div>

           <!-- service rate -->
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
      <?php echo $updateData['ServiceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="<?php echo $updateData['ServiceRate'];?>" selected><?php echo $updateData['ServiceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
      <?php echo $updateData['PriceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
  <option value="<?php echo $updateData['PriceRate'];?>" selected>  <?php echo $updateData['PriceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" >5</option>
 
  </select>
                 </div>
               </div>

         
               
               <button onclick="updateReview()">Update Review</button>
               
               
              
             
             
           </div>

           </div>
</div>
<?php }


// new comment
else{
?>
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }




}
else{

?>


<!-- new review -->
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }
}


}

?>


<?php
} 



// drink item data

else if ($drinkCount > 0) {
  $totals=1;
  while ($data = mysqli_fetch_array($drinkCountRes)) {
  // check items rating
    $ProductId=$data['id'];


    $itemRating="select*from itemsrating where itemId=$ProductId";
    $executeItemRating=mysqli_query($connection,$itemRating);
    $ratingLenCount=mysqli_num_rows($executeItemRating);

$itemRateData=mysqli_fetch_assoc($executeItemRating);

    ?>

 <div class="searchSection">


<div class="topSection">
<div class="left">
<div class="mainImage">



<img
  src="<?php 
  $modifiedString = substr($data['imagepath'], 1);
  echo $modifiedString;?>"
  alt="items"
 
/>
</div>    </div>



<div class="right">
<h1 id="itemNameCurrent">
<?php echo $data['drinkname'];?>
  <span
    class="activeBtn"
  >
 <input type="text" name="itemname" id="itemnameofcurrent" value="<?php echo $data['drinkname'];?>" readonly style="display:none">
 <?php 
 if(isset($_SESSION['activeClientId'])){
?>
<input type="text" name="userid" id="userId" value="<?php echo $_SESSION['activeClientId'];?>" readonly style="display:none">

<?php   }
 ?>
 
  </span>
</h1>



<div class="star">

<!-- rating section top  -->
<?php 
//! no review found
if($ratingLenCount==0){
         ?>
            <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 5
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(0 Customer Review)</h5>
</div>
         
         <?php
        }
        //! review finds
        else{
?>
       <div class="startSection">

<div class="starRatingBox" >
  <span id="priceMenu">
   
 <?php 
 echo $itemRateData['rating'];?>
 
  </span>
  <span class="fa fa-star checked"></span>
</div>


<h5>(<?php 
 echo $itemRateData['numberofrating'];?>
 Customer Review)</h5>
</div>
<?php        }
        ?>

</div>
<h3>₹ <span id="price">

<?php 
if($data['smallprice']!=0){

echo $data['smallprice'];
  
}

  else if($data['normalprice']!=0){

      echo $data['normalprice'];
  }
  else if($data['mediumprice']!=0){

    echo $data['mediumprice'];
}

else if($data['largeprice']!=0){

  echo $data['largeprice'];
}
?>

</span></h3>
<div class="subSection">
  <div class="subHeading">Qty :</div>
  <div class="subData">1</div>
  <div class="subHeading">Category :</div>
  <div class="subData" style="margin-top:2px"><?php 
  echo $data['category'];?></div>
</div>
<hr />

<div class="filterItem">
  <h1>Select Size</h1>

  <div class="form">


   <!-- normal size -->
   <?php

if($data['normalprice']!=0){
  
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size"
                  id="normalsize"
               
                  onclick='changeSize("<?php echo $data['normalprice'];?>","normalsize")'
                  value="<?php echo $data['normalprice'];?>"
                  checked
                />
              normal
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>

    <!-- small size -->
<?php
$check=0;
if($data['smallprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="smallsize"
                  onclick='changeSize("<?php echo $data['smallprice'];?>","smallsize")'
                  value="<?php echo $data['smallprice'];?>"
            checked
                />
              small
              </span>
            </label>
          </li>

         
        </div>
  <?php

$check=1;
}
?>

   

   <!-- medium size -->
   <?php

if($data['mediumprice']!=0){
 
  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="mediumsize"
                  onclick='changeSize("<?php echo $data['mediumprice'];?>","mediumsize")'
                  value="<?php echo $data['mediumprice'];?>"
                  <?php if($check==0){ echo "checked";}?>
                />
              medium
              </span>
            </label>
          </li>

         
        </div>
  <?php
   $check=1;
}
?>
   
   <!-- large size -->
   <?php

if($data['largeprice']!=0){

  ?>


<div class="radioCard">
          <li>
            <label>
              <span>
                <input
                  type="radio"
                  name="size1"
                  id="largesize"
                  onclick='changeSize("<?php echo $data['largeprice'];?>","largesize")'
                  
                  value="<?php echo $data['largeprice'];?>"
          <?php if($check==0){ echo "checked";}?>
                />
              large
              </span>
            </label>
          </li>

         
        </div>
  <?php
}
?>
      
  </div>
</div>



<div class="btnSection">
<!-- remove cart btn -->
  
  <button
    class="btn3"
    id="removeToCartBtn<?php echo $data['id'];?>" style="display:none"
onclick='removeFromCart("<?php echo $data['id'];?>","<?php echo $data['drinkname'];?>")'
  >
    Remove From Cart
  </button>

  <button class="btn1" onclick='addToCart("<?php echo $data['id'];?>","<?php echo $data['drinkname'];?>","DrinkItem")' id="addToCartBtn<?php echo $data['id'];?>">
    Add To Cart
  </button>


  <!-- buy now btn -->
<button class="btn2" onclick='addToCartAndBuy("<?php echo $data['id'];?>","<?php echo $data['drinkname'];?>","DrinkItem")'>
  Buy Now
</button>
</div>
</div>
</div>
<div class="description"><?php  echo $data['description'];?></div>

<div class="reviews" id="reviews">
<div class="heading">Rating & Reviews</div>

<div class="box">
<div class="top">
  <div class="avgRate">
    <h1>
    <?php 
//! no review found
if($ratingLenCount==0){

echo "5/5";
}
// ! review found
else{

echo $itemRateData['rating']."/5";
}
?>

    </h1>
    <div class="rates">

    <!-- star -->
    <div class="starRatingBox" style="margin-bottom:10px;margin-left:8px">
      <span>
     

      <?php 
//! no review found
if($ratingLenCount==0){

echo "4.5";
}
// ! review found
else{

echo $itemRateData['rating'];
}
?>
      </span>
      <span class="fa fa-star checked"></span>
  </div>
      <p>Based On   <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> rating</p>
    </div>
  </div>

  <div class="totalStar">
    <li>
      <div class="headings">Quality</div>
      <div class="progress">
        <div
          class="pro"
          style="width: <?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['QualityRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Price</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{

$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['PriceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
    <li>
      <div class="headings">Service</div>
      <div class="progress">
        <div
          class="pro"
          style="width:<?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";

}
?>"
        ></div>
      </div>
      <div class="percent"><?php 
//! no review found
if($ratingLenCount==0){

echo "100%";
}
// ! review found
else{
$percentageOfQuality=($itemRateData['ServiceRate']/5)*100;

echo $percentageOfQuality."%";
}
?></div>
    </li>
  </div>
</div>
<!-- filter logic -->
<div class="filterReview">
  <div class="titles">Reviewed by <?php 
//! no review found
if($ratingLenCount==0){

echo "0";
}
// ! review found
else{

echo $itemRateData['numberofrating'];
}
?> user</div>
  <div class="filterSection">
    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg> Sort :
      </h1>
      <select
        value="All Reviews"
          id="filterUsingTime"
          onchange="filterUsingDuration()"
      >
        <option value="all">All Reviews</option>
        <option value="latest">Latest Order</option>
        <option value="oldest">Oldest Order</option>
      </select>
    </div>

    <div class="sections">
      <h1>
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> Filter :
      </h1>
      <select
        value="All star"
    
      >
        <option value="all">All Star</option>
        <option value="5">5 Star</option>
        <option value="4.5">4.5 Star</option>
        <option value="4">4 Star</option>
        <option value="3.5">3.5 Star</option>
        <option value="3">3 Star</option>
        <option value="2.5">2.5 Star</option>
        <option value="2">2 Star</option>
        <option value="1.5">1.5 Star</option>
        <option value="1">1 Star</option>
        <option value="0.5">0.5 Star</option>
      </select>
    </div>
  </div>
</div>


<div class="reviewsSectionField">
  <div class="childs" >
 <?php 

 if(isset($itemRateData['numberofrating'])){
 if($itemRateData['numberofrating']>0){
?>


<!-- fetch comments -->
<?php 

$itemIDs=$itemRateData['id'];
$subQuery="select*from itemratingcomments where ratingId=$itemIDs";
$resSubQuery=mysqli_query($connection,$subQuery);

while($subDatas=mysqli_fetch_array($resSubQuery)){
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


// no reviews
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



              <svg class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
              
        

        



  
  </div>

<?php }


// comments
}else{
?>
<div class="reviewSection">
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
 ?>
          
</div>
</div>
</div>



</div>






<?php
} 










// review box
?>
<!-- check wether rating is allowed to post or not -->
<?php 

// only check after login
if(isset($_SESSION['activeClientId'])){
$clientIdActive=$_SESSION['activeClientId'];

//check weather try this food or not 
$checkQuery="select*from itemlist where userID=$clientIdActive and orderstatus='complete' and itemName like '%$itemname%'";
$result = mysqli_query($connection,$checkQuery);
$reviewCheck=mysqli_num_rows($result);

if($reviewCheck> 0){
// check weather first time giving or already giving
$itemsratingRes="select*from itemsrating where itemName like '%$itemname%'";
$itemRatingDataRes=mysqli_query($connection,$itemsratingRes);
$itemRatingDataResCount=mysqli_num_rows($itemRatingDataRes);

// update 
if($itemRatingDataResCount> 0){


$itemRatingData=mysqli_fetch_assoc($itemRatingDataRes);
$itemId=$itemRatingData['id'];

$checkUpdateQuery="select*from itemratingcomments where userId=$clientIdActive and ratingId=$itemId";
$updateResQuery=mysqli_query($connection,$checkUpdateQuery);
$updateRowQuery=mysqli_num_rows($updateResQuery);
$updateData=mysqli_fetch_assoc($updateResQuery);

// update because rating already given by user
if($updateRowQuery>0){
?>
<div class="reviews">

<div class="box">


<!-- client review -->
<div class="clientReview">
            
         <h1> Update your feedback</h1> 
         
            
<!-- user message -->
          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 
                 placeholder="Write Your Reviews*"
               ><?php echo $updateData['message'];?>
              
             </textarea>

               <!-- Quality Rate  -->
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      <?php echo $updateData['QualityRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   <option value="<?php echo $updateData['QualityRate'];?>" selected ><?php echo $updateData['QualityRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
                 </div>
               </div>

           <!-- service rate -->
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
      <?php echo $updateData['ServiceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="<?php echo $updateData['ServiceRate'];?>" selected><?php echo $updateData['ServiceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5">5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
      <?php echo $updateData['PriceRate'];?>
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
  <option value="<?php echo $updateData['PriceRate'];?>" selected>  <?php echo $updateData['PriceRate'];?></option>
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" >5</option>
 
  </select>
                 </div>
               </div>

         
               
               <button onclick="updateReview()">Update Review</button>
               
               
              
             
             
           </div>

           </div>
</div>
<?php }


// new comment
else{
?>
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }




}
else{

?>


<!-- new review -->
<div class="reviews">

<div class="box">



<div class="clientReview">
            
    
              <h1> Leave feedback about this item for others</h1>
       

          
               <input type="text" placeholder="Client Name"   value="<?php echo $_SESSION['activeClientFullname'];?>"
               
                 readonly >
               <textarea
                 name="message"
                 id="commentMessage"
                 placeholder="Write Your Reviews*"
               ></textarea>

           
               <div class="rateSection">
             
                 <h2>Quality Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="qualityRateStar">
      5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="qualityRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

          
               <div class="rateSection">
              
                 <h2>Service Rate: </h2>
                 <div class="rateClient">
                   <!-- star -->

                   <div class="starRatingBox1" >
      <span id="serviceRateStar" >
     5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>
  <select name="itemRate" id="serviceRate">

    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
 
                 </div>
               </div>
               <!-- price rate  -->
               <div class="rateSection">
                 
                 <h2>Price Rate of Item: </h2>
                 <div class="rateClient">
                 <div class="starRatingBox1" >
      <span id="priceRateStar">
5
      </span>
      <span class="fa fa-star starIcon"></span>
  </div>

  <select name="itemRate" id="priceRate">
   
    <option value="0.5">0.5</option>
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    <option value="2.5">2.5</option>
    <option value="3">3</option>
    <option value="3.5">3.5</option>
    <option value="4">4</option>
    <option value="4.5">4.5</option>
    <option value="5" selected>5</option>
  </select>
                 </div>
               </div>

         
               
        
               
               <button onclick="sendRatingNew()">Submit Review</button>
          
             
             
           </div>

           </div>
</div>
<?php }
}


}

?>


<?php
} 





?>







     
    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   <!-- js logic -->



   <script>



// filterUsingDuration

function filterUsingDuration(){
let itemName=document.getElementById('itemNameCurrent').innerText;
let input=document.getElementById('filterUsingTime').value;

if(input=="all"){
  document.location.reload();
  return;
}


$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/reportComments.php", //your page
                data: {
                    filterUsingDuration: input,
                    input:input,
                    itemName:itemName
                },
                // return data
                success: function(res) {
              
document.getElementById('mainCommentSection').innerHTML=res;


                }
              })

}

// comments report
function reportComments(id){
sessionStorage.setItem('reportcomment',id);

}


// report comment on yes
function reportCommentFunc()
{
let id=sessionStorage.getItem('reportcomment');
 $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/reportComments.php", //your page
                data: {
                    idToReport: id,
                    
                },
                // return data
                success: function(res) {
                  
if(res=="you already reported"){
  sessionStorage.removeItem('reportcomment');
  alert('you already reported this comment');
  document.location.reload();
  return;
}
sessionStorage.removeItem('reportcomment');
alert('comment reported Successfully')
  document.location.reload();
            
                }

                })


}       
       function changeSize(price,sizename){
           
           document.getElementById('price').innerText=price;
}


function noReport(){
sessionStorage.removeItem('reportcomment');
}





// filter comments using stars
function filterCommentsUsingTime(){
let input=document.getElementById('filterUsingStar').value;
let itemName=document.getElementById('itemNameCurrent').innerText;
if(input=="all"){
  document.location.reload()
  return;
}



$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/reportComments.php", //your page
                data: {
                    filterUsingStar: input,
                    itemName:itemName
                },
                // return data
                success: function(res) {
document.getElementById('mainCommentSection').innerHTML=res;


                }


              })

}

        
        // ! remove from cart


        const removeFromCart = (id, name) => {
            // check weather item in cart for not
            let cartData1 = localStorage.getItem('cartItem');
            let cartDataConvert1 = JSON.parse(cartData1);




            //    removing item from cart
            for (let i = 0; i < cartDataConvert1.items.length; i++) {
                if (cartDataConvert1.items[i].id == id && cartDataConvert1.items[i].itemName == name) {
                    let newItemsArray = cartDataConvert1.items.filter(item => item.itemName != name);

                    cartDataConvert1.items = newItemsArray;

                }
            }
            let total = 0;
            // re calculate total
            for (let i = 0; i < cartDataConvert1.items.length; i++) {
                total += cartDataConvert1.items[i].price * cartDataConvert1.items[i].qtyBook;
            }

            --cartDataConvert1.totalItems;
            --cartDataConvert1.totalUniqueItems;
            cartDataConvert1.cartTotal = total;
            let JsonToString = JSON.stringify(cartDataConvert1)
            // again to json
            localStorage.setItem('cartItem', JsonToString)
            document.location.reload();

        }
        // ! add to cart functionality

        const addToCart = (id, name,category) => {
            let itemId = id;
            let currentCategorySelected=null ;
            // calculate selected category
            if(document.getElementById('normalsize')){

                if(document.getElementById('normalsize').checked){
                    currentCategorySelected='normal size';
                }
            }
            if(document.getElementById('smallsize')){

if(document.getElementById('smallsize').checked){
    currentCategorySelected='small size';
}
            }


            if(document.getElementById('mediumsize')){

if(document.getElementById('mediumsize').checked){
    currentCategorySelected='medium size';
}}

if(document.getElementById('largesize')){

if(document.getElementById('largesize').checked){
    currentCategorySelected='large size';
}}
            // calculate prices from db
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/calculatePrices.php", //your page
                data: {
                    id: itemId,
                    category: category,
                    size: currentCategorySelected
                },
                // return data
                success: function(res) {


                    // load all cart data  
                    let cartData = localStorage.getItem("cartItem");
                    let convertCartDataToJson = JSON.parse(cartData);
                    // convert res data to json
                    let itemData = JSON.parse(res);


                    // check weather item is already present in cart or not
                    for (let i = 0; i < convertCartDataToJson.items.length; i++) {
                        if (convertCartDataToJson.items[i].itemName == itemData.itemName && convertCartDataToJson.items[i].id == itemData.id) {

                            return;
                        }
                    }


                    // calculate cartTotal cost
                    let total = 0;

                    ++convertCartDataToJson.totalItems;
                    ++convertCartDataToJson.totalUniqueItems;
                    convertCartDataToJson.items.push(itemData)
                    // calculate price
                    for (let i = 0; i < convertCartDataToJson.items.length; i++) {
                        total += convertCartDataToJson.items[i].price * convertCartDataToJson.items[i].qtyBook;
                    }
                    convertCartDataToJson.cartTotal = total;
                    let JsonToString = JSON.stringify(convertCartDataToJson)
                    // again to json
                    localStorage.setItem('cartItem', JsonToString)



                    // manage add to cart and remove from cart Button
                    document.getElementById(`removeToCartBtn${id}`).style.display = "block";
                    document.getElementById(`addToCartBtn${id}`).style.display = "none";

                    window.location.reload();
                }
            });



        }



        // ! add to cart and buy


        const addToCartAndBuy = (id, name, category) => {
            let itemId = id;
            let currentCategorySelected=null ;
            // calculate selected category
            if(document.getElementById('normalsize')){

                if(document.getElementById('normalsize').checked){
                    currentCategorySelected='normal size';
                }
            }
            if(document.getElementById('smallsize')){

if(document.getElementById('smallsize').checked){
    currentCategorySelected='small size';
}
            }


            if(document.getElementById('mediumsize')){

if(document.getElementById('mediumsize').checked){
    currentCategorySelected='medium size';
}}

if(document.getElementById('largesize')){

if(document.getElementById('largesize').checked){
    currentCategorySelected='large size';
}}
            // calculate prices from db
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/calculatePrices.php", //your page
                data: {
                    id: itemId,
                    category: category,
                    size: currentCategorySelected
                },
                // return data
                success: function(res) {


                    // load all cart data  
                    let cartData = localStorage.getItem("cartItem");
                    let convertCartDataToJson = JSON.parse(cartData);

                    // convert res data to json
                    let itemData = JSON.parse(res);

                    // check weather item is already present in cart or not
                    for (let i = 0; i < convertCartDataToJson.items.length; i++) {
                        if (convertCartDataToJson.items[i].itemName == itemData.itemName && convertCartDataToJson.items[i].id == itemData.id) {

                            document.location.href = "http://localhost/sd-canteen/cart.php";
                            return;
                        }
                    }
                    // calculate cartTotal cost
                    let total = 0;

                    ++convertCartDataToJson.totalItems;
                    ++convertCartDataToJson.totalUniqueItems;
                    convertCartDataToJson.items.push(itemData)
                    for (let i = 0; i < convertCartDataToJson.items.length; i++) {
                        total += convertCartDataToJson.items[i].price * convertCartDataToJson.items[i].qtyBook;
                    }
                    convertCartDataToJson.cartTotal = total;
                    let JsonToString = JSON.stringify(convertCartDataToJson)
                    // again to json
                    localStorage.setItem('cartItem', JsonToString)
                    // manage add to cart and remove from cart Button
                    document.getElementById(`removeToCartBtn${id}`).style.display = "block";
                    document.getElementById(`addToCartBtn${id}`).style.display = "none";
                    document.location.href = "http://localhost/sd-canteen/cart.php";




                }
            });







        }


        // manage add and remove buttons from food items

        setTimeout(() => {
            let cartData1 = localStorage.getItem('cartItem');
            let cartDataConvert1 = JSON.parse(cartData1);
            for (let i = 0; i < cartDataConvert1.items.length; i++) {
                if (cartDataConvert1.items[i].itemMainCategory == "food") {
if(document.getElementById('itemNameCurrent')){
let currentItemNameCheck=document.getElementById('itemNameCurrent').innerText.toLowerCase();
if(cartDataConvert1.items[i].itemName==currentItemNameCheck){
  document.getElementById(`removeToCartBtn${cartDataConvert1.items[i].id}`).style.display = "flex";
                    document.getElementById(`addToCartBtn${cartDataConvert1.items[i].id}`).style.display = "none";

                 let category=(cartDataConvert1.items[i].size).replaceAll(' ','');


    document.getElementById(`${category}`).checked=true;

document.getElementById('price').innerText =cartDataConvert1.items[i].price;
}

                }             
                }
            }
        }, 500)


        if(document.getElementById('qualityRate')){

          document.getElementById('qualityRate').addEventListener('change',()=>{
            let serviceRateStar=document.getElementById('qualityRateStar').innerText=document.getElementById('qualityRate').value;
          })
        }

        if(document.getElementById('serviceRate')){

      
        document.getElementById('serviceRate').addEventListener('change',()=>{
          let serviceRateStar=document.getElementById('serviceRateStar').innerText=document.getElementById('serviceRate').value;
        })
      }

      if(document.getElementById('priceRate')){
        document.getElementById('priceRate').addEventListener('change',()=>{
          let priceRateStar=document.getElementById('priceRateStar').innerText=document.getElementById('priceRate').value;
        })
      }




        // new rating

        function sendRatingNew(){
let qualityRate=document.getElementById('qualityRate').value;
let serviceRate=document.getElementById('serviceRate').value;
let priceRate=document.getElementById('priceRate').value;
let itemName=document.getElementById('itemnameofcurrent').value;
let commentMessage=document.getElementById('commentMessage').value;
let userId=document.getElementById('userId').value;

if(commentMessage==""){
  alert('please enter your valuable message');
  return;
}
$.ajax({
                type: "POST", 
                url: "http://localhost/sd-canteen/clientApi/reviewItems.php",
                data: {
                    itemName: itemName,
                    qualityRate: qualityRate,
                    serviceRate: serviceRate,
                    priceRate: priceRate,
                    new:'new',
                    usermessage:commentMessage,
                    userId:userId
                },
                // return data
                success: function(res) {

                  window.scroll({
 top: 0, 
 left: 0, 
 behavior: 'smooth' 
});

setTimeout(()=>{
  document.location.reload();
},1000)
                
                }

              })

        }


        // updateReview

        function updateReview(){
let qualityRate=document.getElementById('qualityRate').value;
let serviceRate=document.getElementById('serviceRate').value;
let priceRate=document.getElementById('priceRate').value;
let itemName=document.getElementById('itemnameofcurrent').value;
let commentMessage=document.getElementById('commentMessage').value;
let userId=document.getElementById('userId').value;

if(commentMessage==""){
  alert('please enter your valuable message');
  return;
}
$.ajax({
                type: "POST", 
                url: "http://localhost/sd-canteen/clientApi/reviewItems.php",
                data: {
                    itemName: itemName,
                    qualityRate: qualityRate,
                    serviceRate: serviceRate,
                    priceRate: priceRate,
                    new:'new',
                    usermessage:commentMessage,
                    userId:userId
                },
                // return data
                success: function(res) {

                  window.scroll({
 top: 0, 
 left: 0, 
 behavior: 'smooth' 
});

setTimeout(()=>{
  document.location.reload();
},1000)
                }

              })

        }

   </script>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>





    
  
