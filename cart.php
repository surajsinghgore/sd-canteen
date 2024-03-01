
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
<h6>You have <span id="totalItemsCount">2 </span> items in your order.</h6>
<button onclick="cleanCart()">Clean Cart</button>
</div>
<div class="cartTable">
<div class="heading" id="headingOfCart">
<div class="pics"></div>
<div class="names">NAME</div>
<div class="price">PRICE</div>
<div class="price">SIZE</div>
<div class="qty">QTY</div>
<div class="total">TOTAL</div>
<div class="remove"></div>
</div>



<div id="cartData">



</div>





<div class="bottom">
<button class="more" onclick="continueShopping()">Continue Shopping</button>
<div class="subtotal">
<h1>Total Payable Amount: <span> ₹ <span id="totalPayableAmount1">0</span></span></h1>

<div id="BtnProcess">


</div>
 

</div>
</div>



</div>

<div class="top" id="BtnInMobile">
<h6>TOTAL PAYABLE AMOUNT:<span> ₹ <span id="totalPayableAmount2">0</span> </span></h6>


 
 <button >Order Now</button>
</div>
</div>





      </div>



      </div>

    
 

    <!-- footer -->
    <?php require('./components/Footer.php'); ?>


    <!-- load cart data -->
   <script>
let cartDataLoad=localStorage.getItem('cartItem');
let data=JSON.parse(cartDataLoad);
// set top total items
document.getElementById('totalItemsCount').innerText=data.totalUniqueItems;
// set totalPayableAmount
document.getElementById('totalPayableAmount1').innerText=data.cartTotal;
document.getElementById('totalPayableAmount2').innerText=data.cartTotal;

// check weather process item or not continue
if(data.cartTotal>0){
  document.getElementById('BtnProcess').innerHTML=`<a href="/sd-canteen/orderTiming.php"><button>Order Now</button></a>`;
}else{

  document.getElementById('cartData').innerHTML=`<h1 style="padding:70px 0;text-transform: uppercase;">Cart Is Empty</h1>`;
  document.getElementById('BtnProcess').innerHTML=`<a href="/sd-canteen/ordernow.php"><button class="disables">Add Item</button></a>`;


}
// load items of cart in html
for(let i=0;i<data.items.length;i++){
let imagePath=data.items[i].image;
image = imagePath.substring(1);
  document.getElementById('cartData').innerHTML+=`
  <div class="data">
<div class="FoodPics">
<img src="${image}" alt="${data.items[i].itemName}" layout="fill"/>
</div>
<div class="names"><p>${data.items[i].itemName}</p></div>
<div class="price"> <p>${data.items[i].price}</p> </div>
<div class="price"> <p>${data.items[i].size}</p> </div>
<div class="qty">
<div class="button">
<div class="left"  title="Decrement" onclick='decrementItems("${data.items[i].id}","${data.items[i].itemName}")'>-</div>
<div class="middle">${data.items[i].qtyBook}</div>
<div class="right"  title="Increment" onclick='incrementItems("${data.items[i].id}","${data.items[i].itemName}")'>+</div>
</div>
</div>
<div class="total"><p>${data.items[i].total}</p></div>
<div class="remove" >
<svg stroke="currentColor" onclick='deleteItems("${data.items[i].id}","${data.items[i].itemName}")' title="remove this item" style="cursor:pointer" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;"><title>remove this item</title><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z"></path></g></svg>
</div>
</div>

  `;
}




// clean cart
function cleanCart(){
// setting cart

    localStorage.setItem("cartItem",'{"items":[],"isEmpty":true,"totalItems":0,"totalUniqueItems":0,"cartTotal":0}')

document.location.reload();

}


function continueShopping(){

  window.history.back()
}


// increment qty
function incrementItems(id,name){
let cartDataForIncrement=localStorage.getItem('cartItem');
let cartD=JSON.parse(cartDataForIncrement)

  for (let i = 0; i < cartD.items.length; i++) {
  if(cartD.items[i].id==id && cartD.items[i].itemName==name){
    cartD.items[i].qtyBook=++cartD.items[i].qtyBook;
    cartD.items[i].total=cartD.items[i].price*cartD.items[i].qtyBook;
  }
    
  }

let total=0;
 // calculate price
 for (let i = 0; i < cartD.items.length; i++) {
                        total += cartD.items[i].price * cartD.items[i].qtyBook;
                    }
                    cartD.cartTotal = total;
                 
                    let JsonToString = JSON.stringify(cartD);
                    localStorage.setItem('cartItem', JsonToString)

                    document.location.reload();
}



// decrement qty
function decrementItems(id,name){
  let cartDataForIncrement=localStorage.getItem('cartItem');
let cartD=JSON.parse(cartDataForIncrement)

  for (let i = 0; i < cartD.items.length; i++) {


  if(cartD.items[i].id==id && cartD.items[i].itemName==name){
// if below 0 then remove
let afterMinus=cartD.items[i].qtyBook;
if((--afterMinus)==0){


  deleteItems(cartD.items[i].id,cartD.items[i].itemName)
 return;
}

    cartD.items[i].qtyBook=--cartD.items[i].qtyBook;
    cartD.items[i].total=cartD.items[i].price*cartD.items[i].qtyBook;
  }
    
  }

let total=0;
 // calculate price
 for (let i = 0; i < cartD.items.length; i++) {
                        total += cartD.items[i].price * cartD.items[i].qtyBook;
                    }
                    cartD.cartTotal = total;
                
                    let JsonToString = JSON.stringify(cartD);
                    localStorage.setItem('cartItem', JsonToString)

                    document.location.reload();
}




// delete item
function deleteItems(id,name){
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

   </script>
</body>

</html>