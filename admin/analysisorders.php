<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=7">
  <!-- ajax added -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.document.title = "SD CANTEEN | Analysis Order";
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
            <?php $AdminTopHeaderTitle = "Analysis Orders";
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
                    <!-- total orders placed -->
                    <div class="chartSigle">
                        <h5>Total Orders</h5>
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


<!-- total complete orders -->
                    <div class="chartSigle">
                        <h5>Total Complete Orders</h5>
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
                  

                    <!-- reject orders -->
                    <div class="chartSigle">
                        <h5>Total Reject Orders</h5>
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
                  

                    <!-- pending orders -->
                    <div class="chartSigle">
                        <h5>Total Pending Orders</h5>
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
                  

                    <!-- top 10 most rated item-->

                    <div class="chartSigle">
                        <h5>Top 10 Most Rated Items All Times</h5>
                        <div class="chartARea1">
                        <canvas id="myChart5"></canvas>

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
     


     



















       





        // compare with 1 year
function year1Selected(){
    let year1=document.getElementById('year1').value;
  
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisOrder.php", 
                data: {
                   year1:year1,
                   onlyOne:'onlyOne'
               
                },
           
                success: function(res) {
                 
                   console.log(res)

let data=JSON.parse(res);





                   const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
      data: data.totalOrdersYear1,
      backgroundColor: 'red',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });



        
        // total order complete

        const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalOrdersCompleteYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{     label:year1,
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
                    //   text: "World Wine Production 2018"
                }
            }
        });



        

   // total reject complete

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 = data.totalOrdersRejectYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{     label:year1,
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



        // order pending

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalOrdersPendingYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{     label:year1,
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
                    //   text: "World Wine Production 2018"
                }
            }
        });


        // most ordered rated item
        const xMyChart5 = data.bestRatedItemName;
        const yMyChart5 = data.bestRatedItemData;
        const barColorsMyChart5 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            "#11D7F3",
            "#F311DE",
            "#F7506C",
            "#5AB3F9",
            "#F69405"
        ];

        new Chart("myChart5", {
            type: "pie",
            data: {
                labels: xMyChart5,
                datasets: [{
                    backgroundColor: barColorsMyChart5,
                    data: yMyChart5
                }]
            },
            options: {
                title: {
                    display: true,
                 
                }
            }
        });


                }})
}


        // compare with two year
        function year2Selected(){
    let year1=document.getElementById('year1').value;
    let year2=document.getElementById('year2').value;
 
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisOrder.php", 
                data: {
                   year1:year1,
                   year2:year2,
               SecondYear2:'secondYear'
                },
           
                success: function(res) {
                 


let data=JSON.parse(res);





                   const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
      data: data.totalOrdersYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalOrdersYear2,
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




        // most ordered rated item
        const xMyChart5 = data.bestRatedItemName;
        const yMyChart5 = data.bestRatedItemData;
        const barColorsMyChart5 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            "#11D7F3",
            "#F311DE",
            "#F7506C",
            "#5AB3F9",
            "#F69405"
        ];

        new Chart("myChart5", {
            type: "pie",
            data: {
                labels: xMyChart5,
                datasets: [{
                    backgroundColor: barColorsMyChart5,
                    data: yMyChart5
                }]
            },
            options: {
                title: {
                    display: true,
                 
                }
            }
        });

         // total order complete

         const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalOrdersCompleteYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    label:year1,
                    backgroundColor: barColors2,
                    data: yValues2
                },{
                    label:year2,
      data: data.totalOrdersCompleteYear2,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });



        

   // total reject complete

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 = data.totalOrdersRejectYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    label:year2,
                    backgroundColor: barColors3,
                    data: yValues3
                },{
                    label:year2,
      data: data.totalOrdersRejectYear2,
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



        // order pending

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalOrdersPendingYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    label:year1,
                    backgroundColor: barColors4,
                    data: yValues4
                },{
                    label:year2,
      data: data.totalOrdersPendingYear1,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });

                }})
}


        // compare with three year
 // compare with two year
 function year3Selected(){
    let year1=document.getElementById('year1').value;
    let year2=document.getElementById('year2').value;
    let year3=document.getElementById('year3').value;
 
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/analysisOrder.php", 
                data: {
                   year1:year1,
                   year3:year3,
                   year2:year2,
               SecondYear3:'secondYear'
                },
           
                success: function(res) {
                 
                   console.log(res)

let data=JSON.parse(res);





                   const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    label:year1,
      data: data.totalOrdersYear1,
      backgroundColor: 'red',
     
    },{
                    label:year2,
      data: data.totalOrdersYear2,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalOrdersYear3,
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



        // most ordered rated item
        const xMyChart5 = data.bestRatedItemName;
        const yMyChart5 = data.bestRatedItemData;
        const barColorsMyChart5 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            "#11D7F3",
            "#F311DE",
            "#F7506C",
            "#5AB3F9",
            "#F69405"
        ];

        new Chart("myChart5", {
            type: "pie",
            data: {
                labels: xMyChart5,
                datasets: [{
                    backgroundColor: barColorsMyChart5,
                    data: yMyChart5
                }]
            },
            options: {
                title: {
                    display: true,
                 
                }
            }
        });






         // total order complete

         const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = data.totalOrdersCompleteYear1;
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    label:year1,
                    backgroundColor: barColors2,
                    data: yValues2
                },{
                    label:year2,
      data: data.totalOrdersCompleteYear2,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalOrdersCompleteYear3,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });



        

   // total reject complete

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 = data.totalOrdersRejectYear1;
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    label:year2,
                    backgroundColor: barColors3,
                    data: yValues3
                },{
                    label:year2,
      data: data.totalOrdersRejectYear2,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalOrdersRejectYear3,
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



        // order pending

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = data.totalOrdersPendingYear1;
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    label:year1,
                    backgroundColor: barColors4,
                    data: yValues4
                },{
                    label:year2,
      data: data.totalOrdersPendingYear1,
      backgroundColor: 'blue',
     
    },{
                    label:year3,
      data: data.totalOrdersPendingYear3,
      backgroundColor: 'blue',
     
    }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });



                }})
}



    </script>




</body>

</html>