<!-- forget password api -->


<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/fooditem.css?v=3">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Food Item";
</script>

<body onload="pageLoadData()">
    <div class="admin">

        <!-- header -->
        <?php require('./components/Header.php');
        ?>
<!-- banner -->

<div class="Status">
      <div class="banner1">
        <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014250/banner_bln578.jpg" alt="Food Item Banner"  />
      </div>
  
      
  
          <div class="path">
            <h1>Menu</h1>

            <p>
              <a href="/sd-canteen">Home </a>
            - Food Item - 
              <span>Page</span>
            </p>
          </div>
     





        
      </div>

     




    </div>


      <!-- main body -->
      <div class="main_food">

<!-- left -->
<div class="left">
<h2>Categories</h2>
<hr />
<div class="menu" id="categoryMenu">



  


</div>
</div>



<!-- right side bar -->

<div class="right">
    <!-- search bar -->
<div class="top">

<h4>Showing all 15  results</h4>
  <div class="search">
<input type="search" name="search" id="search1" placeholder="Search Item ..."/>
<div class="btn">
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
</div>
</div>
</div>

<!-- food data -->
 <div class="cards">


 <div class="card" loading="lazy">
   <div class="FoodImg">
  <a href="">
    <img src="http://localhost:3000/_next/image?url=http%3A%2F%2Fres.cloudinary.com%2Fdnxv21hr0%2Fimage%2Fupload%2Fv1681098186%2F7a9a7566e6a62fb27b0e6de1e173680d2023-04-10T03-43-04.928Z-2023-01-02T10-20-48.785Z-17.jpg.jpg&w=3840&q=75" alt="food image"layout='fill' priority="true" /></a>
   </div>
   <div class="deatils">
   <a href=""><h1>bruger</h1></a>
<h3>Qty: <span>1</span></h3>

<h6>Category: <span>burger</span></h6>

<!-- <h6>Category: <span>No</span></h6> -->

<!-- sizes -->
 <div class="sizes">
 <div class="dropBtn">
 <div class="span">normal price1</div>
 <div class="arrow">

 <svg stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 14l-4-4h8z"></path></g></svg>




 <!-- <svg stroke="currentColor" class="arrowIcon" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="FoodItem_arrowIcon__eZSbD" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10l4 4H8z"></path></g></svg> -->



 </div>
 </div>

  <div class="listPopUp">
<!-- pop up category -->
 <div><li>normal price</li></div>
 
 
 <div class="price">
   <h4>₹ 40</h4>
 </div>
 </div>

   </div>
   <div class="btnSection">

<!-- if add to cart then removve -->
<!-- <button>Remove Item</button> -->

<!-- add to cart -->
<button >Add To Cart</button>

<!-- buy now button -->
<button class="buy" >Buy Now</button>
</div>

</div>

</div>




 <!-- <h1 class="match">No Item Found</h1> -->




</div>
</div>



  
    </div>

      <!-- footer -->
      <?php require('./components/Footer.php'); ?>


      <script>
    //  loading left side category
const pageLoadData=()=>{
// loading category

// load data
$.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/searchFoodCategory.php", //your page
                    data: {
                        loadPage: 'pageLoad'
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('categoryMenu').innerHTML=res;
                    }
                });

//  document.getElementById('categoryMenu').innerHTML+=`
//   <li><span class="heading">
//   <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M192 128l128 128-128 128z"></path></svg>  
//   Burger </span>
//   <span class="length">  16 </span></li>
// `;
}



            // search with name
            function searchByName() {
                let searchInput = document.getElementById('foodNameSearch').value;

                $.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/api/searchDrinkItemByName.php", //your page
                    data: {
                        foodname: searchInput
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('resultData').innerHTML = res;
                    }
                });

            }
        </script>

      <!-- ajax added -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>