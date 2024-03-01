<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/realtimeorder.css?v=7">
     <!-- ajax added -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

          <div class="tables_section" id="table_sections">


         
                   
        </div>

   
         


        <div class="refresh">
        <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="admin_icon___wnHZ" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M17.65 6.35A7.958 7.958 0 0012 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08A5.99 5.99 0 0112 18c-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"></path></svg>
      </div>
</div>






        </div>



    </div>




<script>



// process order
function processOrder(id){
// if open then show close
if(document.getElementById(`dropDownMenu${id}`).style.display=="block"){
  document.getElementById(`dropDownMenu${id}`).style.display="none";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.cursor="pointer";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="none";
  document.getElementById(`UpdateFormDiv${id}`).style.display="none";

}

else{
  document.getElementById(`dropDownMenu${id}`).style.display="block";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="none";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.cursor="pointer";
  document.getElementById(`UpdateFormDiv${id}`).style.display="flex";
console.log(document.getElementById(`UpdateFormDiv${id}`))
}
 


}


$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  all: 'all',
                    
                },
                // return data
                success: function(res) {
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
</script>
    

</body>

</html>

