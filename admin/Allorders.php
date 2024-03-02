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
    window.document.title = "SD CANTEEN | All Orders";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "All Order Details";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
           


            <div class="orders">
                <h1 >Filter Records</h1>
                <h5>Total Orders : <span>23</span></h5>
                <div class="searchBar1">
                    <select name="time"  id="searchType" onchange="changeSearchType()" style="width:420px">
                        <option value="all">All Records</option>
                        <option value="token">Search Using Client Token</option>
                        <option value="clientname">Search Using Client Name</option>
                        <option value="clientemail">Search Using Client Email Address</option>
                        <option value="clientphone">Search Using Client Phone Number</option>
                        <option value="fulldate">Search Using Full Date</option>
                        <option value="fulltime">Search Using Full Time</option>
                        <option value="paymentmethod">Search Using Payment Method</option>
                        <option value="productname">Search Using Product Name</option>
                        <option value="productcategory">Search Using Product Category</option>
                        <option value="orderstatus">Search Using Order Status</option>
                        <option value="totalamount">Search Using Total Amount</option>
                    </select>
                    <input type="search" id="inputSearch" onkeyup="searchingOrder()" placeholder="search" />
                </div>





                <div class="tables_section" id="table_sections">



                   

                        <div>
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
                                        23223
                                    </div>
                                    <div class="div2">
                                        suraj singh
                                    </div>
                                    <div class="div3">
                                        4-20pm
                                    </div>
                                    <div class="div4">
                                        23
                                    </div>
                                    <div class="div5">
                                        COD
                                    </div>
                                    <div class="div6">surajthakurrs45@gmail.com</div>
                                    <div class="div7">
                                        2678909846
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

                                <!-- actual data -->
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
                                            <div><span class="icon1">
                                                    <i class="fa-solid fa-spinner"></i></span> <span class="icon_1">Process</span>
                                            </div>

                                            <div><span class="icon2"><i class="fa-solid fa-trash-can"></i></span> <span class="icon_2">Reject</span> </div>
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



    







        <script>
            function changeSearchType(){
                let selectBox=document.getElementById('searchType').value;

                        
                       
                      
                        
                       
        
let inputBox=document.getElementById('inputSearch');               
                
if(selectBox=="all"){}
if(selectBox=="token"){inputBox.placeholder="Enter 6 Digit Token eg [xxxxxx] ";}
if(selectBox=="clientname"){inputBox.placeholder="Enter Client Full Name eg [s----- -----]";}
if(selectBox=="clientemail"){inputBox.placeholder="Enter Client Email Address eg [---@fg.com]";}
if(selectBox=="clientphone"){inputBox.placeholder="Enter Order's Full Date eg [--.--.----]";}
if(selectBox=="fulldate"){inputBox.placeholder="Enter Order\'s Full Date eg [31-03-2034]";}
if(selectBox=="fulltime"){inputBox.placeholder="Enter Order\'s Full Time   eg [10.11 Pm]";}


if(selectBox=="paymentmethod"){inputBox.placeholder="Enter Payment Method eg [complete]";}
if(selectBox=="productname"){inputBox.placeholder="Enter Item Name eg [samosa]";}
if(selectBox=="productcategory"){inputBox.placeholder="Enter Item Category eg [food]";}
if(selectBox=="orderstatus"){inputBox.placeholder="Enter Order' Status eg [pending] ";}
if(selectBox=="totalamount"){inputBox.placeholder="Enter Order Total Amount eg [100]";}

            }




            // searchingOrder


            function searchingOrder(){
                let selectBox=document.getElementById('searchType').value;
                let inputBox=document.getElementById('inputSearch').value;               
     

// if all
                if(selectBox=="all"){
                    document.location.reload();
                }




//                 if(selectBox=="token"){inputBox.placeholder="Enter 6 Digit Token eg [xxxxxx] ";}
// if(selectBox=="clientname"){inputBox.placeholder="Enter Client Full Name eg [s----- -----]";}
// if(selectBox=="clientemail"){inputBox.placeholder="Enter Client Email Address eg [---@fg.com]";}
// if(selectBox=="clientphone"){inputBox.placeholder="Enter Order's Full Date eg [--.--.----]";}
// if(selectBox=="fulldate"){inputBox.placeholder="Enter Order\'s Full Date eg [31-03-2034]";}
// if(selectBox=="fulltime"){inputBox.placeholder="Enter Order\'s Full Time   eg [10.11 Pm]";}


// if(selectBox=="paymentmethod"){inputBox.placeholder="Enter Payment Method eg [complete]";}
// if(selectBox=="productname"){inputBox.placeholder="Enter Item Name eg [samosa]";}
// if(selectBox=="productcategory"){inputBox.placeholder="Enter Item Category eg [food]";}
// if(selectBox=="orderstatus"){inputBox.placeholder="Enter Order' Status eg [pending] ";}
// if(selectBox=="totalamount"){inputBox.placeholder="Enter Order Total Amount eg [100]";}


                // if search using client token
                if(selectBox=="token"){

            
               
                
  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  searchByTokenId: 'process',
                    input:inputBox
                },
                // return data
                success: function(res) {
          
                  document.getElementById('table_sections').innerHTML=res;
                }

              })
           
              
                }
            }








            

// process order
function processOrder(id){
// if open then show close
if(document.getElementById(`dropDownMenu${id}`).style.display=="block"){
  document.getElementById(`dropDownMenu${id}`).style.display="none";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.cursor="pointer";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="none";

  // document.getElementById(`UpdateFormDiv${id}`).style.display="none";

}

else{
  document.getElementById(`dropDownMenu${id}`).style.display="block";
  document.getElementById(`dropDownMenuOpenIcon${id}`).style.display="none";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.display="block";
  document.getElementById(`dropDownMenuCloseIcon${id}`).style.cursor="pointer";




}
 


}


function processOrderMenu(id){

  document.getElementById(`dropDownMenu${id}`).style.display="none";
  document.getElementById(`UpdateFormDiv${id}`).style.display="flex";
}

function processOrderMenuClose(id){

  document.getElementById(`UpdateFormDiv${id}`).style.display="none";
}



function sendOrderForProcess(id){



  let orderStatus=document.getElementById(`orderStatus${id}`).value;
  let maincategory=document.getElementById(`maincategory${id}`).value;
  let amountReceived=parseInt(document.getElementById(`amountReceived${id}`).value);
  let totalAmount=parseInt(document.getElementById(`totalAmount${id}`).innerText);

  if(orderStatus=="pending"){
    alert('please change order status');
    return;
  }

  if(parseInt(amountReceived)==0){
    alert('please update amount Received');
    return;
  }

  if(parseInt(totalAmount)<parseInt(amountReceived)){
    alert('amount received is above the total price');
    return
  }
  if(parseInt(totalAmount)>parseInt(amountReceived)){
    alert('amount received is below the total price');
    return

  }
let password="";
  if(maincategory=="food"){
    password=prompt('Enter Food Secret Password to process ');
    
  }
  if(maincategory=="coffee"){
    password=prompt('Enter Coffee Secret Password to process ');
  }
  if(maincategory=="drink"){

    password=prompt('Enter Drink Secret Password to process ');
  }
  if(maincategory=="juice"){

    password=prompt('Enter Juice Secret Password to process ');
  }
// matching password
  if(maincategory=="food"){
  if(password!=="food"){
    alert('Wrong Food Secret Password');
    return;
  }}
  if(maincategory=="coffee"){
  if(password!=="coffee"){
    alert('Wrong Coffee Secret Password');
    return;
  }}
  if(maincategory=="drink"){
  if(password!=="drink"){
    alert('Wrong Drink Secret Password');
    return;
  }}
  if(maincategory=="juice"){
  if(password!=="juice"){
    alert('Wrong Juice Secret Password');
    return;
  }}





  $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
                data: {
                  processOrder: 'process',
                    id:id
                },
                // return data
                success: function(res) {
                  document.location.reload();
                }

              })

}


// reject order

function processOrderReject(id){




let maincategory=document.getElementById(`maincategory${id}`).value;




let password="";
if(maincategory=="food"){
  password=prompt('Enter Food Secret Password to process ');
  
}
if(maincategory=="coffee"){
  password=prompt('Enter Coffee Secret Password to process ');
}
if(maincategory=="drink"){

  password=prompt('Enter Drink Secret Password to process ');
}
if(maincategory=="juice"){

  password=prompt('Enter Juice Secret Password to process ');
}
// matching password
if(maincategory=="food"){
if(password!=="food"){
  alert('Wrong Food Secret Password');
  return;
}}
if(maincategory=="coffee"){
if(password!=="coffee"){
  alert('Wrong Coffee Secret Password');
  return;
}}
if(maincategory=="drink"){
if(password!=="drink"){
  alert('Wrong Drink Secret Password');
  return;
}}
if(maincategory=="juice"){
if(password!=="juice"){
  alert('Wrong Juice Secret Password');
  return;
}}





$.ajax({
              type: "POST", //type of method
              url: "http://localhost/sd-canteen/api/RealtimeOrdersApi.php", //your page
              data: {
                rejectOrder: 'reject',
                  id:id
              },
              // return data
              success: function(res) {
               

                document.location.reload();
               
              }

            })

}





            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/allorders.php", //your page
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