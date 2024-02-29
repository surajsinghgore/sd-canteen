<?php


require('./middleware/VerifyClientLogin.php');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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




        <form action="./pgRedirect.php" method="post">
        <div class="orderDetails">
          <div class="orderTable">
            <div>
              <h4> Note: Order Can&#39;t Cancelled Once Placed.</h4>
              <h3>Select Payment Mode</h3>
            </div>
          </div>

          <div class="payment">

              <div class="div">

              <input type="text" id="orderId"name="ORDERID" style="display:none">
              <input type="text" id="TXN_AMOUNT" name="TXN_AMOUNT" style="display:none">
                <input
                  type="radio"
                  name="payment"
                  id="online"
                  value="Online"
           checked
                />
                <label for="online" style="cursor:pointer">
                
                  <h4> Online Payment</h4>
                </label>
              </div>

          
                <div class="div">
                  <input type="radio" name="payment" id="cod" value="COD" />
                  <label for="cod" style="cursor:pointer">
                    <h4> Cash On Delivery</h4>
                  </label>
                </div>
           
  
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
                <button onclick="placeOrder()">Placed Order</button>
             
                <!-- <button disabled>Placed Order</button> -->
             
            </div>
          </div>
  </form>
        </div>



      </div>





    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   

    <script>
function generateUniqueToken() {
    // Get current timestamp
    const timestamp = Date.now().toString();

    // Generate random number between 1000 and 9999 (4 digits)
    const randomNumber = Math.floor(Math.random() * 9000) + 1000;

    // Concatenate timestamp and random number
    const token = timestamp + randomNumber;

    // Ensure token length is 16 digits
    if (token.length < 16) {
        const remainingLength = 16 - token.length;
        const additionalRandom = Math.floor(Math.random() * Math.pow(10, remainingLength)).toString();
        return token + additionalRandom;
    } else if (token.length > 16) {
        // Trim excess length
        return token.slice(0, 16);
    } else {
        return token;
    }
}


const uniqueToken = generateUniqueToken();

              document.getElementById('orderId').value=uniqueToken;
              document.getElementById('TXN_AMOUNT').value=40;

    </script>





  
</body>

</html>