

<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->

<link rel="stylesheet" href="./styles/client/fooditem.css?v=9">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Drink Item";
</script>

<body onload="pageLoadData()">
    <div class="admin">

        <!-- header -->
        <?php require('./components/Header.php');
        ?>
<!-- banner -->

<div class="Status">
      <div class="banner1">
        <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014251/banner4_upvf40.jpg" alt="Drink Item Banner"  />
      </div>
  
      
  
          <div class="pathDrink" >
            <h1 >Menu</h1>

            <p>
              <a href="/sd-canteen">Home </a>
            - Drink Item - 
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

<h4>Showing all <span id="currentDisplayData">0</span>  results</h4>
  <div class="search">
<input type="search" name="search" id="itemSearchBar" onkeyup="searchByItemName()" placeholder="Search Item ..."/>
<div class="btn">
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
</div>
</div>
</div>

<!-- food data -->
 <div class="cards" id="loadItems">






 <h1 class="match" style="margin-top:30px">No Item Found</h1>




</div>
</div>



  
    </div>

      <!-- footer -->
      <?php require('./components/Footer.php'); ?>


      <script>

        // search by item name
        const searchByItemName=()=>{
         
let searchInput=document.getElementById('itemSearchBar').value;
$.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/searchDrinkItem.php", //your page
                    data: {
                        itemName: searchInput
                    }, // passing the values
                    success: function(res) {
  
                        document.getElementById('loadItems').innerHTML=res;
                        document.getElementById('currentDisplayData').innerText=document.getElementById('loadItems').children.length;
                        let cartData1=localStorage.getItem('cartItem');
let cartDataConvert1=JSON.parse(cartData1);
for(let i=0;i<cartDataConvert1.items.length;i++){
    document.getElementById(`removeToCartBtn${cartDataConvert1.items[i].id}`).style.display="block";
    document.getElementById(`addToCartBtn${cartDataConvert1.items[i].id}`).style.display="none";
    
    document.getElementById(`currentSizeSelect${cartDataConvert1.items[i].id}`).innerText=cartDataConvert1.items[i].size;
    
    document.getElementById(`price${cartDataConvert1.items[i].id}`).innerHTML=`<h4>₹${cartDataConvert1.items[i].price}</h4>`;
}
                   

                    }
                });
        }



    //  loading left side category
const pageLoadData=()=>{
// loading category data
$.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/searchDrinkCategory.php", //your page
                    data: {
                        loadPage: 'pageLoad'
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('categoryMenu').innerHTML=res;
                    }
                });




                // load food data
                $.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/searchDrinkItem.php", //your page
                    data: {
                        loadPage: 'pageLoad'
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('loadItems').innerHTML=res;
                        document.getElementById('currentDisplayData').innerText=document.getElementById('loadItems').children.length;
                    }
                });

              

}





         



         


            // load particular category food Items
            function loadParticularCategory(itemName){
                  $.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/searchDrinkCategory.php", //your page
                    data: {
                        category: itemName
                    }, // passing the values
                    success: function(res) {
                        document.getElementById('loadItems').innerHTML=res;
                        document.getElementById('currentDisplayData').innerText=document.getElementById('loadItems').children.length;
                        let cartData1=localStorage.getItem('cartItem');
let cartDataConvert1=JSON.parse(cartData1);
for(let i=0;i<cartDataConvert1.items.length;i++){
    document.getElementById(`removeToCartBtn${cartDataConvert1.items[i].id}`).style.display="block";
    document.getElementById(`addToCartBtn${cartDataConvert1.items[i].id}`).style.display="none";
    
    document.getElementById(`currentSizeSelect${cartDataConvert1.items[i].id}`).innerText=cartDataConvert1.items[i].size;
    
    document.getElementById(`price${cartDataConvert1.items[i].id}`).innerHTML=`<h4>₹${cartDataConvert1.items[i].price}</h4>`;
}
           
                    }
                });
            }




            // show popUpMenu category
const showPopUpMenu=(id)=>{
    let targetMenu=document.getElementById(`listPopUp${id}`);
    let arrowUpArrow=document.getElementById(`arrowUpArrow${id}`);
    let arrowDownArrow=document.getElementById(`arrowDownArrow${id}`);
if(targetMenu.style.display=="block"){
    targetMenu.style.display="none";
    arrowUpArrow.style.display="none";
    arrowDownArrow.style.display="block";
}
else{

    arrowUpArrow.style.display="block";
    arrowDownArrow.style.display="none";
    targetMenu.style.display="block";
}
}


// select sizes
const changeSize=(id,price,sizename)=>{
// normal size
let arrowUpArrow=document.getElementById(`arrowUpArrow${id}`);
let arrowDownArrow=document.getElementById(`arrowDownArrow${id}`);
if(sizename=="normal"){
    document.getElementById(`currentSizeSelect${id}`).innerText="normal size";
    document.getElementById(`listPopUp${id}`).style.display="none";
    let priceSection=document.getElementById(`price${id}`);
    priceSection.innerHTML=`<h4>₹ ${price} </h4>`;arrowUpArrow.style.display="none";
    arrowDownArrow.style.display="block";
}
// small size
else if(sizename=="small"){
    document.getElementById(`listPopUp${id}`).style.display="none";
    document.getElementById(`currentSizeSelect${id}`).innerText="small size";

let priceSection=document.getElementById(`price${id}`);
priceSection.innerHTML=`<h4>₹ ${price} </h4>`;arrowUpArrow.style.display="none";
    arrowDownArrow.style.display="block";
}
// medium
else if(sizename=="medium"){

    document.getElementById(`listPopUp${id}`).style.display="none";
    document.getElementById(`currentSizeSelect${id}`).innerText="medium size";

let priceSection=document.getElementById(`price${id}`);
priceSection.innerHTML=`<h4>₹ ${price} </h4>`;arrowUpArrow.style.display="none";
    arrowDownArrow.style.display="block";
}
// large
else if(sizename=="large"){

    document.getElementById(`listPopUp${id}`).style.display="none";
    document.getElementById(`currentSizeSelect${id}`).innerText="large size";

let priceSection=document.getElementById(`price${id}`);

priceSection.innerHTML=`<h4>₹ ${price} </h4>`;arrowUpArrow.style.display="none";
    arrowDownArrow.style.display="block";
}
}



// ! remove from cart


const removeFromCart=(id,name)=>{
// check weather item in cart for not
let cartData1=localStorage.getItem('cartItem');
let cartDataConvert1=JSON.parse(cartData1);


//    removing item from cart
for(let i=0;i<cartDataConvert1.items.length;i++){
if(cartDataConvert1.items[i].id==id && cartDataConvert1.items[i].itemName==name){
   let newItemsArray = cartDataConvert1.items.filter(item => item.itemName!=name);

   cartDataConvert1.items=newItemsArray;

}
}
let total=0;
// re calculate total
for (let i = 0; i < cartDataConvert1.items.length; i++) {
    total += cartDataConvert1.items[i].price*cartDataConvert1.items[i].qtyBook;
}

--cartDataConvert1.totalItems;
--cartDataConvert1.totalUniqueItems;
cartDataConvert1.cartTotal=total;
let JsonToString=JSON.stringify(cartDataConvert1)
// again to json
localStorage.setItem('cartItem',JsonToString)
document.location.reload();

}
// ! add to cart functionality

const addToCart=(id,name)=>{
let itemId=id;
let currentCategorySelected=document.getElementById(`currentSizeSelect${id}`).innerText;
// calculate prices from db
$.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/calculatePrices.php", //your page
                    data: {
                        id: itemId,category:'DrinkItem',size:currentCategorySelected
                    }, 
                    // return data
                    success: function(res) {


// load all cart data  
let cartData=localStorage.getItem("cartItem");
let convertCartDataToJson=JSON.parse(cartData);
// convert res data to json
let itemData=JSON.parse(res);


// check weather item is already present in cart or not
for (let i = 0; i < convertCartDataToJson.items.length; i++) {
if(convertCartDataToJson.items[i].itemName==itemData.itemName && convertCartDataToJson.items[i].id==itemData.id){
  
    return;
}
}


// calculate cartTotal cost
let total=0;

++convertCartDataToJson.totalItems;
++convertCartDataToJson.totalUniqueItems;
convertCartDataToJson.items.push(itemData)
// calculate price
for (let i = 0; i < convertCartDataToJson.items.length; i++) {
    total += convertCartDataToJson.items[i].price*convertCartDataToJson.items[i].qtyBook;
}
convertCartDataToJson.cartTotal=total;
let JsonToString=JSON.stringify(convertCartDataToJson)
// again to json
localStorage.setItem('cartItem',JsonToString)



 // manage add to cart and remove from cart Button
 document.getElementById(`removeToCartBtn${id}`).style.display="block";
document.getElementById(`addToCartBtn${id}`).style.display="none";

window.location.reload();
                    }
                });


               
}



// ! add to cart and buy


const addToCartAndBuy=(id,name,image)=>{
let itemId=id;
let currentCategorySelected=document.getElementById(`currentSizeSelect${id}`).innerText;
// calculate prices from db
$.ajax({
                    type: "POST", //type of method
                    url: "http://localhost/sd-canteen/clientApi/calculatePrices.php", //your page
                    data: {
                        id: itemId,category:'FoodItem',size:currentCategorySelected
                    }, 
                    // return data
                    success: function(res) {


// load all cart data  
let cartData=localStorage.getItem("cartItem");
let convertCartDataToJson=JSON.parse(cartData);

// convert res data to json
let itemData=JSON.parse(res);

// check weather item is already present in cart or not
for (let i = 0; i < convertCartDataToJson.items.length; i++) {
if(convertCartDataToJson.items[i].itemName==itemData.itemName && convertCartDataToJson.items[i].id==itemData.id){
  
    document.location.href="http://localhost/sd-canteen/cart.php";
return;
}
}
// calculate cartTotal cost
let total=0;

++convertCartDataToJson.totalItems;
++convertCartDataToJson.totalUniqueItems;
convertCartDataToJson.items.push(itemData)
for (let i = 0; i < convertCartDataToJson.items.length; i++) {
    total += convertCartDataToJson.items[i].price*convertCartDataToJson.items[i].qtyBook;
}
convertCartDataToJson.cartTotal=total;
let JsonToString=JSON.stringify(convertCartDataToJson)
// again to json
localStorage.setItem('cartItem',JsonToString)
 // manage add to cart and remove from cart Button
 document.getElementById(`removeToCartBtn${id}`).style.display="block";
                document.getElementById(`addToCartBtn${id}`).style.display="none";
document.location.href="http://localhost/sd-canteen/cart.php";




                    }
                });







}


// manage add and remove buttons from food items

setTimeout(()=>{
    let cartData1=localStorage.getItem('cartItem');
let cartDataConvert1=JSON.parse(cartData1);
for(let i=0;i<cartDataConvert1.items.length;i++){
    if(cartDataConvert1.items[i].itemMainCategory=="drink"){

    document.getElementById(`removeToCartBtn${cartDataConvert1.items[i].id}`).style.display="block";
    document.getElementById(`addToCartBtn${cartDataConvert1.items[i].id}`).style.display="none";
    
    document.getElementById(`currentSizeSelect${cartDataConvert1.items[i].id}`).innerText=cartDataConvert1.items[i].size;
    
    document.getElementById(`price${cartDataConvert1.items[i].id}`).innerHTML=`<h4>₹${cartDataConvert1.items[i].price}</h4>`;
    }
}
},500)

        </script>

      <!-- ajax added -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>