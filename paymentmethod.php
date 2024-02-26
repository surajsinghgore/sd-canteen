
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/cart.css?v=4">
<link rel="stylesheet" href="./styles/client/orderdetails.css?v=4"> 
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Payment Method Page";
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
              <div class="circle">
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
              <div class="circle circle1">  <span>3</span> </div>
              <div class="description">
                <p> PAYMENT METHOD </p>
              </div>
            </div>
          </div>
        </div>





        <div class="orderDetails">
          <div class="orderTable">
            <div>
              <h4> Note: Order Can&#39;t Cancelled Once Placed.</h4>
              <h3>Select Payment Mode</h3>
            </div>
          </div>

          <div class="payment">
            <form>
              <div class="div">
                <input
                  type="radio"
                  name="payment"
                  id="Online"
                  value="Online"
                  defaultChecked
                />
                <label for="Online" style="cursor:pointer">
                
                  <h4> Online Payment</h4>
                </label>
              </div>

          
                <div class="div">
                  <input type="radio" name="payment" id="cod" value="COD" />
                  <label for="cod" style="cursor:pointer">
                    <h4> Cash On Delivery</h4>
                  </label>
                </div>
           
            </form>
          </div>

          <div class="PaymentBottomMessage">
            <h4>
              Total Payable Amount:
              <span>2</span>
            </h4>
            <div class="bottomItem">
           
              <h4>
                Total Items Booked: <span>2</span>
              </h4>
              <h3>
                <Link href="/Cart">Click to view Items List</Link>
              </h3>
            </>
          
            </div>
          </div>

        

          

         
          <div class="bottom1">
          <a href="/OrderDetails">
              <button class="more">Update Pickup Time</button>
            </a>
            <div class="subtotal">
                <button>Placed Order</button>
             
                <!-- <button disabled>Placed Order</button> -->
             
            </div>
          </div>
        </div>



      </div>





    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>