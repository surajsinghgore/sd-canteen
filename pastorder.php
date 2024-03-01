

<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/pastorders.css?v=2">
<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Past Orders";
</script>

<body>
    <div class="admin">





        <!-- header -->
        <?php require('./components/Header.php');

        ?>




    



<div class="AllOrder">
    

<!-- top section -->
        <div class="topSection">
          <h1>All Order&#39;s Details</h1>
          <h2>
            Total Order Placed: <span id="totalRecords">23</span>
          </h2>
        </div>

    



    

       <div id="dataHandle">

       </div>
      </div>



    </div>





    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

    </div>

<script>
function allOrderClick(){

  
$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/clientpastorder.php", //your page
                data: {
                  all: 'all',
                    
                },
                // return data
                success: function(res) {
document.getElementById('dataHandle').innerHTML=res;

                }


              })

}

$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/clientpastorder.php", //your page
                data: {
                  all: 'all',
                    
                },
                // return data
                success: function(res) {
document.getElementById('dataHandle').innerHTML=res;

                }


              })




           

// complete
function complete(){

  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/clientpastorder.php", //your page
                data: {
                  complete: 'all',
                    
                },
                // return data
                success: function(res) {
document.getElementById('dataHandle').innerHTML=res;

                }


              })



}

// reject
function reject(){


  
$.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/clientpastorder.php", //your page
                data: {
                  reject: 'all',
                    
                },
                // return data
                success: function(res) {
document.getElementById('dataHandle').innerHTML=res;

                }


              })

}

// pending
function pending(){

  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/clientApi/clientpastorder.php", //your page
                data: {
                  pending: 'all',
                    
                },
                // return data
                success: function(res) {
document.getElementById('dataHandle').innerHTML=res;

                }


              })



}



setTimeout(()=>{
  document.getElementById('totalRecords').innerText=document.getElementsByClassName('data').length;

},100)
</script>






     <!-- ajax added -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>