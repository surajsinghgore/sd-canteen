<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=7">
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
                        <select>
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
                        <select>
                            <option value="no">compare with 2 year</option>

                            <option value="item">
                                2024
                            </option>

                        </select>
                    </li>

                    <li>
                        <select value="year3">
                            <option value="no">compare with 3 year</option>

                            <option value={item} key={index}>
                                2022
                            </option>

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
                                    Total In 2023
                             
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
                                    Total In 2023
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
                                    Total In 2023
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
                                    Total In 2023
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
                                    Total In 2023
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
     

        // total order placed

        const xValues1 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues1 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors1 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    backgroundColor: barColors1,
                    data: yValues1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });




        // total order complete

        const xValues2 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues2 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors2 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                    backgroundColor: barColors2,
                    data: yValues2
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });


   // total reject complete

   const xValues3 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues3 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors3 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues3,
                datasets: [{
                    backgroundColor: barColors3,
                    data: yValues3
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });



        // order pending

        const xValues4 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues4 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors4 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues4,
                datasets: [{
                    backgroundColor: barColors4,
                    data: yValues4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    //   text: "World Wine Production 2018"
                }
            }
        });


        const xMyChart5 = ["Americano", "Cappuccino", "Espresso", "Macchiato", "Mocha", "Latte", "Doppio", "Café au lait", "Cold brew", "Affogato"];
        const yMyChart5 = [20, 1, 34, 5, 5, 10, 3, 4, 12, 22];
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
                    //   text: "World Wide Wine Production 2018"
                }
            }
        });


    </script>




</body>

</html>