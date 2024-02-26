
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/cart.css?v=4">

<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Cart Page";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>
        <div class="admin">







    </div>

    <!-- cart page -->
    

 
    <div class="cart">
        <h1> Cart Items </h1>
        <div class="progressTop">
          <hr />

          <div class="number">
            <div class="num1">
              <div class="circle circle1">
               <span>1</span> 
              </div>
              <div class="description">
                <p> SHOPPING CART </p>
              </div>
            </div>
          </div>

          <div class="number">
            <div class="num1">
              <div class="circle">  <span>2</span> </div>
              <div class="description">
                <p> ORDER DETAILS </p>
              </div>
            </div>
          </div>

          <div class="number">
            <div class="num1">
              <div class="circle">  <span>3</span> </div>
              <div class="description">
                <p> PAYMENT METHOD </p>
              </div>
            </div>
          </div>
        </div>





<div class="cartItem">
<div class="top">
<h6>You have <span>2 items </span>in your order.</h6>
<button>Clean Cart</button>
</div>
<div class="cartTable">
<div class="heading">
<div class="pics"></div>
<div class="names">NAME</div>
<div class="price">PRICE</div>
<div class="price">SIZE</div>
<div class="qty">QTY</div>
<div class="total">TOTAL</div>
<div class="remove"></div>
</div>

<!-- <h1>Cart Is Empty</h1> -->
<div class="data">
<div class="FoodPics">
<img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="food" layout="fill"/>
</div>
<div class="names"><p>FoodName</p></div>
<div class="price"> <p>30</p> </div>
<div class="price"> <p>normal size</p> </div>
<div class="qty">
<div class="button">
<div class="left"  title="Decrement">-</div>
<div class="middle">1</div>
<div class="right"  title="Increment">+</div>
</div>
</div>
<div class="total"><p>30</p></div>
<div class="remove">
<svg stroke="currentColor" title="remove this item" style="cursor:pointer" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;"><title>remove this item</title><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z"></path></g></svg>
</div>
</div>





<div class="bottom">
<button class="more" >Continue Shopping</button>
<div class="subtotal">
<h1>Total Payable Amount: <span> ₹ 40</span></h1>
 <button class="disables">Add Item</button>
 
 <!-- <!-- <button onClick={redirectToOrderPage}>Order Now</button> -->
</div>
</div>



</div>

<div class="top" id="BtnInMobile">
<h6>TOTAL PAYABLE AMOUNT:<span> ₹ 40 </span></h6>

 <!-- <button class={CartStyle.disables}>Add Item</button> -->
 
 <button >Order Now</button>
</div>
</div>





      </div>





    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>