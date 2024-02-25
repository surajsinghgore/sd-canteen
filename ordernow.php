
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/ordernow.css?v=2">

<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Order Now";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>
        <div class="admin">


        <div class="order">
    <h1>TRY OUR TASTY ITEMS</h1>
 
  
  <div class="cardSection">
  
  <div class="food" >
  <div class="imgs">
  <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014247/food_jxjsba.png" alt="food"  />
  </div>
  <h1>Food Items</h1>
  </div>


  <div class="food" >
  <div class="imgs">
  <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014251/coffee_i2cfjf.webp" alt="food"  l />
  </div>
  <h1>Coffee Items</h1>
  </div>


   <div class="food" >
  <div class="imgs" >
  <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014245/juice_rafk8s.png" alt="food"  />
  </div>
  <h1 style="padding-top:2%">Juice Items</h1>
  </div>

 <div class="food" >
  <div class="imgs">
  <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014243/drink_eekwf6.webp" alt="food" />
  </div>
  <h1>Drink Items</h1>
  </div>
  </div>   </div>

    



    
        </div>

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>