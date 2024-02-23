<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/realtimeorder.css?v=6">

<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Realtime Orders";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Realtime Order Panel";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/realtimeorder.php";
            $pathNavigationParent = "Orders";
            $pathNavigationChild = "add coffee category";
            require('../components/PathNavigation.php'); ?>



<div class="orders">
          <h1>Filter Records</h1>
          <h5>
            Todays Collection : <span>₹ 23</span>
          </h5>

   
          <div class="searchBar">
            <input
              type="search"
              name="token"
         
              placeholder="Search Token Id ..."
              id="token"
            />
            <input
              type="search"
              name="curstomername"
             
              placeholder="Search Customer Name..."
             
              id="names"
            />
            <select  name="time" id="time">
              <option value="null">Search Time Slot...</option>
              <option value="8.00-Am">8.00 Am</option>
              <option value="8.15-Am">8.15 Am</option>
              <option value="8.30-Am">8.30 Am</option>
              <option value="8.45-Am">8.45 Am</option>
              <option value="9.00-AM">9.00 Am</option>
              <option value="9.15-AM">9.15 Am</option>
              <option value="9.30-AM">9.30 Am</option>
              <option value="9.45-AM">9.45 Am</option>
              <option value="10.00-Am">10.00 Am</option>
              <option value="10.15-Am">10.15 Am</option>
              <option value="10.30-Am">10.30 Am</option>
              <option value="10.45-Am">10.45 Am</option>
              <option value="11.00-Am">11.00 Am</option>
              <option value="11.15-Am">11.15 Am</option>
              <option value="11.30-Am">11.30 Am</option>
              <option value="11.45-Am">11.45 Am</option>
              <option value="12.00-Pm">12.00 Pm</option>
              <option value="12.15-Pm">12.15 Pm</option>
              <option value="12.30-Pm">12.30 Pm</option>
              <option value="12.45-Pm">12.45 Pm</option>
              <option value="1.00-Pm">1.00 Pm</option>
              <option value="1.15-Pm">1.15 Pm</option>
              <option value="1.30-Pm">1.30 Pm</option>
              <option value="1.45-Pm">1.45 Pm</option>
              <option value="2.00-Pm">2.00 Pm</option>
              <option value="2.15-Pm">2.15 Pm</option>
              <option value="2.30-Pm">2.30 Pm</option>
              <option value="2.45-Pm">2.45 Pm</option>
              <option value="3.00-Pm">3.00 Pm</option>
              <option value="3.15-Pm">3.15 Pm</option>
              <option value="3.30-Pm">3.30 Pm</option>
              <option value="3.45-Pm">3.45 Pm</option>
              <option value="4.00-Pm">4.00 Pm</option>
              <option value="4.15-Pm">4.15 Pm</option>
              <option value="4.30-Pm">4.30 Pm</option>
              <option value="4.45-Pm">4.45 Pm</option>
              <option value="5.00-Pm">5.00 Pm</option>
              <option value="5.15-Pm">5.15 Pm</option>
              <option value="5.30-Pm">5.30 Pm</option>
              <option value="5.45-Pm">5.45 Pm</option>
              <option value="6.00-Pm">6.00 Pm</option>
            </select>
            <select
              name="category"
              id="category"
            >
              <option value="null">Select Category..</option>
              <option value="foodcategory">Food Category</option>
              <option value="coffeecategory">Coffee Category</option>
              <option value="drinkcategory">Drink Category</option>
              <option value="juicecategory">Juice Category</option>
            </select>
          </div>

    
          <div class="analysis">
            <div class="div1" >
              Total Orders : 34
            </div>
            <div class="div2">
              Complete Orders: 23
            </div>
            <div class="div3">
              Pending Orders: 23
            </div>
            <div class="div4" >
              Reject Orders : 23
            </div>
            <div class="div5">
              Orders Not On Time: 23
            </div>
          </div>

          <div class="tables_section">


         
                    <div >
                      <div class="tableheading">
                        <div class="div1">Token Id</div>
                        <div class="div2">Customer Name</div>
                        <div class="div3">PickUp Time</div>
                        <div class="div4">Total Amount</div>
                        <div class="div5">Payment Mode</div>
                        <div class="div6">Email</div>
                        <div class="div7">Mobile</div>
                      </div>
                      <div class="contain">
                        <div class="tableheaddata">
                          <div class="div1">
                          V9OPGQ
                          </div>
                          <div class="div2">
                          SURAJ SINGH
                          </div>
                          <div class="div3">
                          2.00-PM
                          </div>
                          <div class="div4">
                            50
                          </div>
                          <div class="div5">
                          ONLINE
                          </div>
                          <div class="div6">SURAJTHAKURRS45@GMAIL.COM</div>
                          <div class="div7">
                          6239522303
                          </div>
                        </div>
                        
                        <div class="tableheadingsub">
                          <div class="div1">Item Name</div>
                          <div class="div2">
                            Product Price
                          </div>
                          <div class="div3">Qty</div>
                          <div class="div4">Category</div>
                          <div class="div5">Total Amount</div>
                          <div class="div6">
                            Amount Received
                          </div>
                          <div class="div7">Order Status</div>
                          <div class="div8">Action</div>
                        </div>



<!-- data -->
                        <div>
<div class="tableheaddatasub">
<div class="div1">burger</div>
<div class="div2">50</div>
<div class="div3">1</div>
<div class="div4">burger
<span>
    [S]
</div>
<div class="div5">50</div>
<div class="div6">50</div>
<div class="div7">
 <div class="pen">pending</div> 
</div>


<div class="div8">
<i class="fa-solid fa-bars"></i>
</div>

<div class="options">
<div><span class="icon1" >
<i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span> 
</div>

<div><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2" >Reject</span> </div>
</div>




<!-- <div class={options}>
<div><span class={icon1} >
<BiLoader /></span> <span class={icon_1}>Process</span> 
</div>

<div><span class={icon2} ><RiDeleteBin7Line /></span> <span class={icon_2} >Reject</span> </div>
</div>  -->




</div>
                        </div>
              </div>
            


             
         
          </div>
        </div>

   
         

</div>






        </div>

    </div>
</body>

</html>