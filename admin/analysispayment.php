<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=7">
  <!-- ajax added -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    window.document.title = "SD CANTEEN | Analysis Payment";
</script>

<body>

    <?php

    if (isset($toast_status)) {

        if ($toast_status == 'true') {
            require('../components/Toast.php');
        }
    }

    ?>
    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Analysis Payment";
            require('../components/AdminTopHeader.php'); ?>





            <div class="payment">
                <h4>Select Years to Compare records</h4>
                <div class="filters">
                    <li>
                        <select onchange="year1Selected()" id="year1">
                        <option value="no">compare with 2 year</option>
                        <?php 
 require('../middleware/ConnectToDatabase.php');
 $sql="SELECT DISTINCT(YEAR(createat)) as Year from orderitems ";
    $result = mysqli_query($connection,$sql);
  while( $data = mysqli_fetch_array($result) ) {
   ?>
<option><?php echo $data['Year'];?></option>
  <?php }
?>

                        </select>
                    </li>


                    <li>
                        <select  onchange="year2Selected()" id="year2">
                            <option value="no">compare with 2 year</option>

                            <?php 
 require('../middleware/ConnectToDatabase.php');
 $sql="SELECT DISTINCT(YEAR(createat)) as Year from orderitems ";
    $result = mysqli_query($connection,$sql);
  while( $data = mysqli_fetch_array($result) ) {
   ?>
<option><?php echo $data['Year'];?></option>
  <?php }
?>

                        </select>
                    </li>

                    <li>
                        <select value="year3" onchange="year3Selected()" id="year3">
                            <option value="no">compare with 3 year</option>

                            <?php 
 require('../middleware/ConnectToDatabase.php');
 $sql="SELECT DISTINCT(YEAR(createat)) as Year from orderitems ";
    $result = mysqli_query($connection,$sql);
  while( $data = mysqli_fetch_array($result) ) {
   ?>
<option><?php echo $data['Year'];?></option>
  <?php }
?>

                        </select>
                    </li>
                </div>


             
             
             
                <div class="chartSection">
                    <!-- TOTAL EARNINGS placed -->
                    <div class="chartSigle">
                        <h5>TOTAL EARNINGS</h5>
                        <div class="chartARea">
                        <canvas id="myChart1"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>


<!-- TOTAL NUMBER OF PAYMENTS INITIATED ONLINE -->
                    <div class="chartSigle">
                        <h5>TOTAL NUMBER OF PAYMENTS INITIATED ONLINE</h5>
                        <div class="chartARea">
                        <canvas id="myChart2"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  

                    <!-- REVENUE GENERATED USING ONLY ONLINE PAYMENTS -->
                    <div class="chartSigle">
                        <h5>REVENUE GENERATED USING ONLY ONLINE PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart3"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  

                    <!-- TOTAL SUCCESS PAYMENTS -->
                    <div class="chartSigle">
                        <h5>TOTAL SUCCESS PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart4"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  

                   
                    <!-- TOTAL FAILED PAYMENTS -->

                    <div class="chartSigle">
                        <h5>TOTAL FAILED PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart5"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                   
                    <!-- TOTAL PENDING PAYMENTS -->

                    <div class="chartSigle">
                        <h5>TOTAL PENDING PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart6"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  
                    <!-- TOTAL REVENUE USING COD PAYMENTS -->

                    <div class="chartSigle">
                        <h5>TOTAL REVENUE USING COD PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart7"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  


                    <!-- TOTAL NUMBER OF COD PAYMENTS-->

                    <div class="chartSigle">
                        <h5>TOTAL NUMBER OF COD PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart8"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  
                    

                    <!-- total online payments -->
                    <div class="chartSigle">
                        <h5>TOTAL NUMBER OF ONLINE PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart9"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                   
                                </div>

                            </li>

                        </div>
                    </div>
                  
                </div>
            </div>





        </div>

    </div>


    <!-- chatJs graph -->
    <script>
     

    

        function year1Selected(){
    let year1=document.getElementById('year1').value;
  
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisPayment.php", 
                data: {
                   year1:year1,
                   onlyOne:'onlyOne'
               
                },
           
                success: function(res) {
             
let data=JSON.parse(res);





    // total earings

    const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = data.totalEarningYear1;
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues1
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




        // TOTAL NUMBER OF PAYMENTS INITIATED ONLINE

        const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalPaymentInitiatedYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues2
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


   //REVENUE GENERATED USING ONLY ONLINE PAYMENTS

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 =  data.totalRevenueOnlineYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues3
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });



        // TOTAL SUCCESS PAYMENTS

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalSuccessPaymentYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues4
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });


 



            // TOTAL FAILED  PAYMENTS

            const xValues5 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues5 = data.totalFailedPaymentYear1;
        const barColors5 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart5", {
            type: "bar",
            data: {
                labels: xValues5,
                datasets: [{
                    label:year1,
                    backgroundColor:'red',
                    data: yValues5
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });




            // TOTAL PENDING  PAYMENTS

            const xValues6 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues6 = data.totalPendingPaymentYear1;
        const barColors6 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart6", {
            type: "bar",
            data: {
                labels: xValues6,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues6
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                 
                }
            }
        });




            // TOTAL REVENUE USING COD PAYMENTS

            const xValues7 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues7 = data.totalRevenueCODYear1;
        const barColors7 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart7", {
            type: "bar",
            data: {
                labels: xValues7,
                datasets: [{
                    label:year1,
                    backgroundColor:'red',
                    data: yValues7
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




            // TOTAL NUMBER OF COD PAYMENTS


            const xValues8 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues8 =  data.totalCodOrderYear1;
        const barColors8 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart8", {
            type: "bar",
            data: {
                labels: xValues8,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues8
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });

// total payment using online

        const xValues9 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues9 = data.totalOnlineOrderYear1;
        const barColors9 = ["red", "green", "blue", "orange", "brown", "#05FA97", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart9", {
            type: "bar",
            data: {
                labels: xValues9,
                datasets: [{
                    label:year1,
                    backgroundColor: 'red',
                    data: yValues9
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


                }


            })
        }



        // year 2
        function year2Selected(){
    let year1=document.getElementById('year1').value;
    let year2=document.getElementById('year2').value;
  
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisPayment.php", 
                data: {
                   year1:year1,
                   year2:year2,
                   SecondYear2:'onlyOne'
               
                },
           
                success: function(res) {
          
let data=JSON.parse(res);





    // total earings

    const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = data.totalEarningYear1;
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
      data: data.totalEarningYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalEarningYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




        // TOTAL NUMBER OF PAYMENTS INITIATED ONLINE

        const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalPaymentInitiatedYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    label:year1,
      data: data.totalPaymentInitiatedYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalPaymentInitiatedYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


   //REVENUE GENERATED USING ONLY ONLINE PAYMENTS

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 =  data.totalRevenueOnlineYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    label:year1,
      data: data.totalRevenueOnlineYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalRevenueOnlineYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });



        // TOTAL SUCCESS PAYMENTS

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalSuccessPaymentYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    label:year1,
      data: data.totalSuccessPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalSuccessPaymentYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });


 



            // TOTAL FAILED  PAYMENTS

            const xValues5 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues5 = data.totalFailedPaymentYear1;
        const barColors5 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart5", {
            type: "bar",
            data: {
                labels: xValues5,
                datasets: [{
                    label:year1,
      data: data.totalFailedPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalFailedPaymentYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });




            // TOTAL PENDING  PAYMENTS

            const xValues6 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues6 = data.totalPendingPaymentYear1;
        const barColors6 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart6", {
            type: "bar",
            data: {
                labels: xValues6,
                datasets: [{
                    label:year1,
      data: data.totalPendingPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalPendingPaymentYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                 
                }
            }
        });




            // TOTAL REVENUE USING COD PAYMENTS

            const xValues7 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues7 = data.totalRevenueCODYear1;
        const barColors7 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart7", {
            type: "bar",
            data: {
                labels: xValues7,
                datasets: [{
                    label:year1,
      data: data.totalRevenueCODYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalRevenueCODYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




            // TOTAL NUMBER OF COD PAYMENTS


            const xValues8 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues8 =  data.totalCodOrderYear1;
        const barColors8 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart8", {
            type: "bar",
            data: {
                labels: xValues8,
                datasets: [{
                    label:year1,
      data: data.totalCodOrderYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalCodOrderYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });

// total payment using online

        const xValues9 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues9 = data.totalOnlineOrderYear1;
        const barColors9 = ["red", "green", "blue", "orange", "brown", "#05FA97", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart9", {
            type: "bar",
            data: {
                labels: xValues9,
                datasets: [{
                    label:year1,
      data: data.totalOnlineOrderYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalOnlineOrderYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


                }


            })
        }



        // year 3
        
          function year3Selected(){
    let year1=document.getElementById('year1').value;
    let year2=document.getElementById('year2').value;
    let year3=document.getElementById('year3').value;
  
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisPayment.php", 
                data: {
                   year1:year1,
                   year2:year2,
                   year3:year3,
                   SecondYear3:'onlyOne'
               
                },
           
                success: function(res) {
          
let data=JSON.parse(res);





    // total earings

    const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = data.totalEarningYear1;
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
      data: data.totalEarningYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalEarningYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalEarningYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




        // TOTAL NUMBER OF PAYMENTS INITIATED ONLINE

        const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalPaymentInitiatedYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    label:year1,
      data: data.totalPaymentInitiatedYear2,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalPaymentInitiatedYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalPaymentInitiatedYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


   //REVENUE GENERATED USING ONLY ONLINE PAYMENTS

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 =  data.totalRevenueOnlineYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    label:year1,
      data: data.totalRevenueOnlineYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalRevenueOnlineYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalPaymentInitiatedYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });



        // TOTAL SUCCESS PAYMENTS

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalSuccessPaymentYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    label:year1,
      data: data.totalSuccessPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalSuccessPaymentYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalSuccessPaymentYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });


 



            // TOTAL FAILED  PAYMENTS

            const xValues5 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues5 = data.totalFailedPaymentYear1;
        const barColors5 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart5", {
            type: "bar",
            data: {
                labels: xValues5,
                datasets: [{
                    label:year1,
      data: data.totalFailedPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalFailedPaymentYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalFailedPaymentYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    
                }
            }
        });




            // TOTAL PENDING  PAYMENTS

            const xValues6 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues6 = data.totalPendingPaymentYear1;
        const barColors6 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart6", {
            type: "bar",
            data: {
                labels: xValues6,
                datasets: [{
                    label:year1,
      data: data.totalPendingPaymentYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalPendingPaymentYear2,
      backgroundColor: 'blue',
     
    },
    {
                    label:year3,
      data: data.totalPendingPaymentYear3,
      backgroundColor: 'green',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                 
                }
            }
        });




            // TOTAL REVENUE USING COD PAYMENTS

            const xValues7 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues7 = data.totalRevenueCODYear1;
        const barColors7 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart7", {
            type: "bar",
            data: {
                labels: xValues7,
                datasets: [{
                    label:year1,
      data: data.totalRevenueCODYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalRevenueCODYear3,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalRevenueCODYear3,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });




            // TOTAL NUMBER OF COD PAYMENTS


            const xValues8 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues8 =  data.totalCodOrderYear1;
        const barColors8 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart8", {
            type: "bar",
            data: {
                labels: xValues8,
                datasets: [{
                    label:year1,
      data: data.totalCodOrderYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalCodOrderYear2,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalCodOrderYear3,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });

// total payment using online

        const xValues9 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues9 = data.totalOnlineOrderYear1;
        const barColors9 = ["red", "green", "blue", "orange", "brown", "#05FA97", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart9", {
            type: "bar",
            data: {
                labels: xValues9,
                datasets: [{
                    label:year1,
      data: data.totalOnlineOrderYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalOnlineOrderYear2,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalOnlineOrderYear3,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                   
                }
            }
        });


                }


            })
        }
    </script>




</body>

</html>