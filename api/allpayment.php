<?php

require('../middleware/ConnectToDatabase.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['month'])&&isset($_POST['year'])&&isset($_POST['status'])){
$month=$_POST['month'];
$year=$_POST['year'];
$status=$_POST['status'];

$fulldate=$month.'-'.$year;

// success payment history is in orderitems table
if($status=="TXN_SUCCESS"){

$query="select*from orderitems where paymentstatus='success' and orderdate like '___$fulldate%'";
 $resQuery=mysqli_query($connection,$query);


 if(mysqli_num_rows($resQuery)>0){

 
 while($data=mysqli_fetch_array($resQuery)){
    ?>
<div class="card">
                            <div class="topSection">
                                <div class="left">
                                    <h6>Payment Details</h6>
                                    <p><?php echo $data['fullname'];?></p>
                                </div>



                                <?php 
                                if($data['paymentstatus']=="success"){
?>
<div class="right">
                                    <li class="button">
                                        <div class="complete">Complete</div>
                                    </li>
                                </div>
  <?php                              }




else if($data['paymentstatus']=="pending"){
    ?>
      <div class="right">
                              <li class="button">
                                <div class="pending">Pending</div>
                              </li>
                            </div>
      <?php                              }




else if($data['paymentstatus']=="reject"){
    ?>
      <div class="right">
                              <li class="button">
                                <div class="reject">Failed</div>
                              </li>
                            </div>
      <?php                              }

      else{
?>
<div class="right">
                           
                           <li class="button">
                             <div class="initiate">
                               Initiated
                             </div>
                           </li>
                         </div> 


<?php

      }
                                ?>
                                

                              
                            </div>
                                
                             


                             


                        

                        <div class="mainData">
                            <h5>Payment Info</h5>
                            <div class="all">
                                <li>
                                    <div class="heading">Email ID</div>
                                    <div class="desc"><?php echo $data['email'];?></div>
                                </li>

                                <li>
                                    <div class="heading">Mobile</div>
                                    <div class="desc"><?php echo $data['mobile'];?></div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Token
                                    </div>
                                    <div class="desc1">
                                    <?php echo $data['orderId'];?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Date
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['orderdate'];?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Payment Time
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['pickuptime'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Status
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['orderstatus'];?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Order Amount
                                    </div>
                                    <div class="desc">
                                    <?php echo $data['totalamount'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Amount
                                    </div>
                                    <div class="desc">
                                    <?php 
                                    $dataArray=json_decode($data['paymentinfo'], true);
                                   
                                    if(isset($dataArray['TXNAMOUNT'])){
                                        echo $dataArray['TXNAMOUNT'];
                                    }else{
                                        echo 'COD';
                                    }
                                   ?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        transaction Currency
                                    </div>
                                    <div class="desc">



                                    <?php
                                    if(isset($dataArray['CURRENCY'])){
                                        echo $dataArray['CURRENCY'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>
                            <h4>Bank Info</h4>
                            <div class="all">
                                <li>
                                    <div class="heading">Bank Name</div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['BANKNAME'])){
                                        echo $dataArray['BANKNAME'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Bank Transaction ID
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['BANKTXNID'])){
                                        echo $dataArray['BANKTXNID'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Gateway Name
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['GATEWAYNAME'])){
                                        echo $dataArray['GATEWAYNAME'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Mode
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['PAYMENTMODE'])){
                                        echo $dataArray['PAYMENTMODE'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Full Date
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['TXNDATE'])){
                                        echo $dataArray['TXNDATE'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Payment Status
                                    </div>
                                    <div class="desc">
                                    <?php
                                    if(isset($dataArray['STATUS'])){
                                        echo $dataArray['STATUS'];
                                    }else{
                                        echo 'COD';
                                    }
                                    ?>
                                    </div>
                                </li>
                            </div>

                        </div>
                    </div>

<?php
 }   
}else{
    ?>
<h1>No Data Found</h1>
    <?php
}

}



// pending payment
else if($status=="PENDING"){

// paymentdata data fetch
    
$query1="select*from paymentdata where paymentstatus='pending' and orderdate like '___$fulldate%'";
$resQuery1=mysqli_query($connection,$query1);

// fetch from orderitems page
if(mysqli_num_rows($resQuery1)>0){


while($data1=mysqli_fetch_array($resQuery1)){
   ?>
<div class="card">
                           <div class="topSection">
                               <div class="left">
                                   <h6>Payment Details</h6>
                                   <p><?php echo $data1['fullname'];?></p>
                               </div>



                               <?php 
                               if($data1['paymentstatus']=="success"){
?>
<div class="right">
                                   <li class="button">
                                       <div class="complete">Complete</div>
                                   </li>
                               </div>
 <?php                              }




else if($data1['paymentstatus']=="pending"){
   ?>
     <div class="right">
                             <li class="button">
                               <div class="pending">Pending</div>
                             </li>
                           </div>
     <?php                              }




else if($data1['paymentstatus']=="reject"){
   ?>
     <div class="right">
                             <li class="button">
                               <div class="reject">Failed</div>
                             </li>
                           </div>
     <?php                              }

     else{
?>
<div class="right">
                          
                          <li class="button">
                            <div class="initiate">
                              Initiated
                            </div>
                          </li>
                        </div> 


<?php

     }
                               ?>
                               

                             
                           </div>
                               
                            


                            


                       

                       <div class="mainData">
                           <h5>Payment Info</h5>
                           <div class="all">
                               <li>
                                   <div class="heading">Email ID</div>
                                   <div class="desc"><?php echo $data1['email'];?></div>
                               </li>

                               <li>
                                   <div class="heading">Mobile</div>
                                   <div class="desc"><?php echo $data1['mobile'];?></div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Order Token
                                   </div>
                                   <div class="desc1">
                                   <?php echo $data1['orderId'];?>
                                   </div>
                               </li>
                           </div>
                           <div class="all">
                               <li>
                                   <div class="heading">
                                       Payment Date
                                   </div>
                                   <div class="desc">
                                   <?php echo $data1['orderdate'];?>
                                   </div>
                               </li>

                               <li>
                                   <div class="heading">
                                       Payment Time
                                   </div>
                                   <div class="desc">
                                   <?php echo $data1['pickuptime'];?>
                                   </div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Order Status
                                   </div>
                                   <div class="desc">
                                   <?php echo $data1['orderstatus'];?>
                                   </div>
                               </li>
                           </div>
                           <div class="all">
                               <li>
                                   <div class="heading">
                                       Order Amount
                                   </div>
                                   <div class="desc">
                                   <?php echo $data1['totalamount'];?>
                                   </div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Transaction Amount
                                   </div>
                                   <div class="desc">
                                   <?php 
                                   $data1Array=json_decode($data1['paymentinfo'], true);
                                  
                                   if(isset($data1Array['TXNAMOUNT'])){
                                       echo $data1Array['TXNAMOUNT'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                  ?>
                                   </div>
                               </li>

                               <li>
                                   <div class="heading">
                                       transaction Currency
                                   </div>
                                   <div class="desc">



                                   <?php
                                   if(isset($data1Array['CURRENCY'])){
                                       echo $data1Array['CURRENCY'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                           </div>
                           <h4>Bank Info</h4>
                           <div class="all">
                               <li>
                                   <div class="heading">Bank Name</div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['BANKNAME'])){
                                       echo $data1Array['BANKNAME'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>

                               <li>
                                   <div class="heading">
                                       Bank Transaction ID
                                   </div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['BANKTXNID'])){
                                       echo $data1Array['BANKTXNID'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Gateway Name
                                   </div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['GATEWAYNAME'])){
                                       echo $data1Array['GATEWAYNAME'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                           </div>
                           <div class="all">
                               <li>
                                   <div class="heading">
                                       Payment Mode
                                   </div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['PAYMENTMODE'])){
                                       echo $data1Array['PAYMENTMODE'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Transaction Full Date
                                   </div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['TXNDATE'])){
                                       echo $data1Array['TXNDATE'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                               <li>
                                   <div class="heading">
                                       Payment Status
                                   </div>
                                   <div class="desc">
                                   <?php
                                   if(isset($data1Array['STATUS'])){
                                       echo $data1Array['STATUS'];
                                   }else{
                                       echo 'ONLINE';
                                   }
                                   ?>
                                   </div>
                               </li>
                           </div>

                       </div>
                   </div>

<?php
}   
}



    $query="select*from orderitems where paymentstatus='pending' and orderdate like '___$fulldate%'";
     $resQuery=mysqli_query($connection,$query);
    
    // fetch from orderitems page
     if(mysqli_num_rows($resQuery)>0){
    
     
     while($data=mysqli_fetch_array($resQuery)){
        ?>
                                 <div class="card">
                                <div class="topSection">
                                    <div class="left">
                                        <h6>Payment Details</h6>
                                        <p><?php echo $data['fullname'];?></p>
                                    </div>
    
    
    
                                    <?php 
                                    if($data['paymentstatus']=="success"){
    ?>
    <div class="right">
                                        <li class="button">
                                            <div class="complete">Complete</div>
                                        </li>
                                    </div>
      <?php                              }
    
    
    
    
    else if($data['paymentstatus']=="pending"){
        ?>
          <div class="right">
                                  <li class="button">
                                    <div class="pending">Pending</div>
                                  </li>
                                </div>
          <?php                              }
    
    
    
    
    else if($data['paymentstatus']=="reject"){
        ?>
          <div class="right">
                                  <li class="button">
                                    <div class="reject">Failed</div>
                                  </li>
                                </div>
          <?php                              }
    
          else{
    ?>
    <div class="right">
                               
                               <li class="button">
                                 <div class="initiate">
                                   Initiated
                                 </div>
                               </li>
                             </div> 
    
    
    <?php
    
          }
                                    ?>
                                    
    
                                  
                                </div>
                                    
                                 
    
    
                                 
    
    
                            
    
                            <div class="mainData">
                                <h5>Payment Info</h5>
                                <div class="all">
                                    <li>
                                        <div class="heading">Email ID</div>
                                        <div class="desc"><?php echo $data['email'];?></div>
                                    </li>
    
                                    <li>
                                        <div class="heading">Mobile</div>
                                        <div class="desc"><?php echo $data['mobile'];?></div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Order Token
                                        </div>
                                        <div class="desc1">
                                        <?php echo $data['orderId'];?>
                                        </div>
                                    </li>
                                </div>
                                <div class="all">
                                    <li>
                                        <div class="heading">
                                            Payment Date
                                        </div>
                                        <div class="desc">
                                        <?php echo $data['orderdate'];?>
                                        </div>
                                    </li>
    
                                    <li>
                                        <div class="heading">
                                            Payment Time
                                        </div>
                                        <div class="desc">
                                        <?php echo $data['pickuptime'];?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Order Status
                                        </div>
                                        <div class="desc">
                                        <?php echo $data['orderstatus'];?>
                                        </div>
                                    </li>
                                </div>
                                <div class="all">
                                    <li>
                                        <div class="heading">
                                            Order Amount
                                        </div>
                                        <div class="desc">
                                        <?php echo $data['totalamount'];?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Transaction Amount
                                        </div>
                                        <div class="desc">
                                        <?php 
                                        $dataArray=json_decode($data['paymentinfo'], true);
                                       
                                        if(isset($dataArray['TXNAMOUNT'])){
                                            echo $dataArray['TXNAMOUNT'];
                                        }else{
                                            echo 'COD';
                                        }
                                       ?>
                                        </div>
                                    </li>
    
                                    <li>
                                        <div class="heading">
                                            transaction Currency
                                        </div>
                                        <div class="desc">
    
    
    
                                        <?php
                                        if(isset($dataArray['CURRENCY'])){
                                            echo $dataArray['CURRENCY'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                </div>
                                <h4>Bank Info</h4>
                                <div class="all">
                                    <li>
                                        <div class="heading">Bank Name</div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['BANKNAME'])){
                                            echo $dataArray['BANKNAME'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
    
                                    <li>
                                        <div class="heading">
                                            Bank Transaction ID
                                        </div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['BANKTXNID'])){
                                            echo $dataArray['BANKTXNID'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Gateway Name
                                        </div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['GATEWAYNAME'])){
                                            echo $dataArray['GATEWAYNAME'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                </div>
                                <div class="all">
                                    <li>
                                        <div class="heading">
                                            Payment Mode
                                        </div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['PAYMENTMODE'])){
                                            echo $dataArray['PAYMENTMODE'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Transaction Full Date
                                        </div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['TXNDATE'])){
                                            echo $dataArray['TXNDATE'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="heading">
                                            Payment Status
                                        </div>
                                        <div class="desc">
                                        <?php
                                        if(isset($dataArray['STATUS'])){
                                            echo $dataArray['STATUS'];
                                        }else{
                                            echo 'COD';
                                        }
                                        ?>
                                        </div>
                                    </li>
                                </div>
    
                            </div>
                        </div>
    
    <?php
     }   

  






    }
    

    
  
   
    
   
    
   
    }

// failed payment
else if($status=="TXN_FAILURE"){

    // paymentdata data fetch
        
    $query1="select*from paymentdata where paymentstatus='failed' and orderdate like '___$fulldate%'";
    $resQuery1=mysqli_query($connection,$query1);
    
    // fetch from orderitems page
    if(mysqli_num_rows($resQuery1)>0){
    
    
    while($data1=mysqli_fetch_array($resQuery1)){
       ?>
    <div class="card">
                               <div class="topSection">
                                   <div class="left">
                                       <h6>Payment Details</h6>
                                       <p><?php echo $data1['fullname'];?></p>
                                   </div>
    
    
    
                                   <?php 
                                   if($data1['paymentstatus']=="success"){
    ?>
    <div class="right">
                                       <li class="button">
                                           <div class="complete">Complete</div>
                                       </li>
                                   </div>
     <?php                              }
    
    
    
    
    else if($data1['paymentstatus']=="pending"){
       ?>
         <div class="right">
                                 <li class="button">
                                   <div class="pending">Pending</div>
                                 </li>
                               </div>
         <?php                              }
    
    
    
    
    else if($data1['paymentstatus']=="failed"){
       ?>
         <div class="right">
                                 <li class="button">
                                   <div class="reject">Failed</div>
                                 </li>
                               </div>
         <?php                              }
    
         else{
    ?>
    <div class="right">
                              
                              <li class="button">
                                <div class="initiate">
                                  Initiated
                                </div>
                              </li>
                            </div> 
    
    
    <?php
    
         }
                                   ?>
                                   
    
                                 
                               </div>
                                   
                                
    
    
                                
    
    
                           
    
                           <div class="mainData">
                               <h5>Payment Info</h5>
                               <div class="all">
                                   <li>
                                       <div class="heading">Email ID</div>
                                       <div class="desc"><?php echo $data1['email'];?></div>
                                   </li>
    
                                   <li>
                                       <div class="heading">Mobile</div>
                                       <div class="desc"><?php echo $data1['mobile'];?></div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Order Token
                                       </div>
                                       <div class="desc1">
                                       <?php echo $data1['orderId'];?>
                                       </div>
                                   </li>
                               </div>
                               <div class="all">
                                   <li>
                                       <div class="heading">
                                           Payment Date
                                       </div>
                                       <div class="desc">
                                       <?php echo $data1['orderdate'];?>
                                       </div>
                                   </li>
    
                                   <li>
                                       <div class="heading">
                                           Payment Time
                                       </div>
                                       <div class="desc">
                                       <?php echo $data1['pickuptime'];?>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Order Status
                                       </div>
                                       <div class="desc">
                                       <?php echo $data1['orderstatus'];?>
                                       </div>
                                   </li>
                               </div>
                               <div class="all">
                                   <li>
                                       <div class="heading">
                                           Order Amount
                                       </div>
                                       <div class="desc">
                                       <?php echo $data1['totalamount'];?>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Transaction Amount
                                       </div>
                                       <div class="desc">
                                       <?php 
                                       $data1Array=json_decode($data1['paymentinfo'], true);
                                      
                                       if(isset($data1Array['TXNAMOUNT'])){
                                           echo $data1Array['TXNAMOUNT'];
                                       }else{
                                           echo 'ONLINE';
                                       }
                                      ?>
                                       </div>
                                   </li>
    
                                   <li>
                                       <div class="heading">
                                           transaction Currency
                                       </div>
                                       <div class="desc">
    
    
    
                                       <?php
                                       if(isset($data1Array['CURRENCY'])){
                                           echo $data1Array['CURRENCY'];
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                               </div>
                               <h4>Bank Info</h4>
                               <div class="all">
                                   <li>
                                       <div class="heading">Bank Name</div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['BANKNAME'])){

                                      
                                        if($data1Array['BANKNAME']==""){

                                            echo "NO";
                                        }else{

                                            echo $data1Array['BANKNAME'];
                                        }
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
    
                                   <li>
                                       <div class="heading">
                                           Bank Transaction ID
                                       </div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['BANKTXNID'])){
                                           

                                           if($data1Array['BANKTXNID']==""){

                                            echo "NO";
                                        }else{

                                            echo $data1Array['BANKTXNID'];
                                        }
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Gateway Name
                                       </div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['GATEWAYNAME'])){

                                        if($data1Array['GATEWAYNAME']==""){

                                            echo "NO";
                                        }else{

                                            echo $data1Array['GATEWAYNAME'];
                                        }
                                          
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                               </div>
                               <div class="all">
                                   <li>
                                       <div class="heading">
                                           Payment Mode
                                       </div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['PAYMENTMODE'])){
                                         
                                           if($data1Array['PAYMENTMODE']==""){

                                            echo "NO";
                                        }else{

                                            echo $data1Array['PAYMENTMODE'];
                                        }
                                          
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Transaction Full Date
                                       </div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['TXNDATE'])){
                                          

                                           if($data1Array['TXNDATE']==""){

                                            echo "NO";
                                        }else{

                                            echo $data1Array['TXNDATE'];
                                        }
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="heading">
                                           Payment Status
                                       </div>
                                       <div class="desc">
                                       <?php
                                       if(isset($data1Array['STATUS'])){
                                           echo $data1Array['STATUS'];
                                       }else{
                                           echo 'ONLINE';
                                       }
                                       ?>
                                       </div>
                                   </li>
                               </div>
    
                           </div>
                       </div>
    
    <?php
    }   
    }
    
    
    
        $query="select*from orderitems where paymentstatus='failed' and orderdate like '___$fulldate%'";
         $resQuery=mysqli_query($connection,$query);
        
        // fetch from orderitems page
         if(mysqli_num_rows($resQuery)>0){
        
         
         while($data=mysqli_fetch_array($resQuery)){
            ?>
                                     <div class="card">
                                    <div class="topSection">
                                        <div class="left">
                                            <h6>Payment Details</h6>
                                            <p><?php echo $data['fullname'];?></p>
                                        </div>
        
        
        
                                        <?php 
                                        if($data['paymentstatus']=="success"){
        ?>
        <div class="right">
                                            <li class="button">
                                                <div class="complete">Complete</div>
                                            </li>
                                        </div>
          <?php                              }
        
        
        
        
        else if($data['paymentstatus']=="pending"){
            ?>
              <div class="right">
                                      <li class="button">
                                        <div class="pending">Pending</div>
                                      </li>
                                    </div>
              <?php                              }
        
        
        
        
        else if($data['paymentstatus']=="failed"){
            ?>
              <div class="right">
                                      <li class="button">
                                        <div class="reject">Failed</div>
                                      </li>
                                    </div>
              <?php                              }
        
              else{
        ?>
        <div class="right">
                                   
                                   <li class="button">
                                     <div class="initiate">
                                       Initiated
                                     </div>
                                   </li>
                                 </div> 
        
        
        <?php
        
              }
                                        ?>
                                        
        
                                      
                                    </div>
                                        
                                     
        
        
                                     
        
        
                                
        
                                <div class="mainData">
                                    <h5>Payment Info</h5>
                                    <div class="all">
                                        <li>
                                            <div class="heading">Email ID</div>
                                            <div class="desc"><?php echo $data['email'];?></div>
                                        </li>
        
                                        <li>
                                            <div class="heading">Mobile</div>
                                            <div class="desc"><?php echo $data['mobile'];?></div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Order Token
                                            </div>
                                            <div class="desc1">
                                            <?php echo $data['orderId'];?>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="all">
                                        <li>
                                            <div class="heading">
                                                Payment Date
                                            </div>
                                            <div class="desc">
                                            <?php echo $data['orderdate'];?>
                                            </div>
                                        </li>
        
                                        <li>
                                            <div class="heading">
                                                Payment Time
                                            </div>
                                            <div class="desc">
                                            <?php echo $data['pickuptime'];?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Order Status
                                            </div>
                                            <div class="desc">
                                            <?php echo $data['orderstatus'];?>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="all">
                                        <li>
                                            <div class="heading">
                                                Order Amount
                                            </div>
                                            <div class="desc">
                                            <?php echo $data['totalamount'];?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Transaction Amount
                                            </div>
                                            <div class="desc">
                                            <?php 
                                            $dataArray=json_decode($data['paymentinfo'], true);
                                           
                                            if(isset($dataArray['TXNAMOUNT'])){
                                                echo $dataArray['TXNAMOUNT'];
                                            }else{
                                                echo 'COD';
                                            }
                                           ?>
                                            </div>
                                        </li>
        
                                        <li>
                                            <div class="heading">
                                                transaction Currency
                                            </div>
                                            <div class="desc">
        
        
        
                                            <?php
                                            if(isset($dataArray['CURRENCY'])){
                                                echo $dataArray['CURRENCY'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                    </div>
                                    <h4>Bank Info</h4>
                                    <div class="all">
                                        <li>
                                            <div class="heading">Bank Name</div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['BANKNAME'])){
                                                echo $dataArray['BANKNAME'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
        
                                        <li>
                                            <div class="heading">
                                                Bank Transaction ID
                                            </div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['BANKTXNID'])){
                                                echo $dataArray['BANKTXNID'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Gateway Name
                                            </div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['GATEWAYNAME'])){
                                                echo $dataArray['GATEWAYNAME'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="all">
                                        <li>
                                            <div class="heading">
                                                Payment Mode
                                            </div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['PAYMENTMODE'])){
                                                echo $dataArray['PAYMENTMODE'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Transaction Full Date
                                            </div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['TXNDATE'])){
                                                echo $dataArray['TXNDATE'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="heading">
                                                Payment Status
                                            </div>
                                            <div class="desc">
                                            <?php
                                            if(isset($dataArray['STATUS'])){
                                                echo $dataArray['STATUS'];
                                            }else{
                                                echo 'COD';
                                            }
                                            ?>
                                            </div>
                                        </li>
                                    </div>
        
                                </div>
                            </div>
        
        <?php
         }   
    
      
    
    
    
    
    
    
        }
        
    
        
      
       
        
       
        
       
        }
    }
}



?>