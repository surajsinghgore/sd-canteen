<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=5">
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
                        <select>
                            <option value="no">compare with 1 year</option>

                            <option>
                                2023
                            </option>

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
                    <!-- TOTAL EARNINGS placed -->
                    <div class="chartSigle">
                        <h5>TOTAL EARNINGS</h5>
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


<!-- TOTAL NUMBER OF PAYMENTS INITIATED ONLINE -->
                    <div class="chartSigle">
                        <h5>TOTAL NUMBER OF PAYMENTS INITIATED ONLINE</h5>
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
                  

                    <!-- REVENUE GENERATED USING ONLY ONLINE PAYMENTS -->
                    <div class="chartSigle">
                        <h5>REVENUE GENERATED USING ONLY ONLINE PAYMENTS</h5>
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
                  

                    <!-- TOTAL SUCCESS PAYMENTS -->
                    <div class="chartSigle">
                        <h5>TOTAL SUCCESS PAYMENTS</h5>
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
                  

                   
                    <!-- TOTAL FAILED PAYMENTS -->

                    <div class="chartSigle">
                        <h5>TOTAL FAILED PAYMENTS</h5>
                        <div class="chartARea">
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
                   
                    <!-- TOTAL PENDING PAYMENTS -->

                    <div class="chartSigle">
                        <h5>TOTAL PENDING PAYMENTS</h5>
                        <div class="chartARea">
                        <canvas id="myChart6"></canvas>

                        </div>
                        <div class="allDatas">

                            <li>
                                <div class="title">
                                    Total In 2023
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
                                    Total In 2023
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
     

        // total earings

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




        // TOTAL NUMBER OF PAYMENTS INITIATED ONLINE

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


   //REVENUE GENERATED USING ONLY ONLINE PAYMENTS

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



        // TOTAL SUCCESS PAYMENTS

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


 



            // TOTAL FAILED  PAYMENTS

            const xValues5 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues5 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors5 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart5", {
            type: "bar",
            data: {
                labels: xValues5,
                datasets: [{
                    backgroundColor: barColors5,
                    data: yValues5
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




            // TOTAL PENDING  PAYMENTS

            const xValues6 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues6 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors6 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart6", {
            type: "bar",
            data: {
                labels: xValues6,
                datasets: [{
                    backgroundColor: barColors6,
                    data: yValues6
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




            // TOTAL REVENUE USING COD PAYMENTS

            const xValues7 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues7 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors7 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart7", {
            type: "bar",
            data: {
                labels: xValues7,
                datasets: [{
                    backgroundColor: barColors7,
                    data: yValues7
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




            // TOTAL NUMBER OF COD PAYMENTS


            const xValues8 = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        const yValues8 = [55, 49, 44, 24, 15, 23, 23, 23, 45, 45, 12, 34];
        const barColors8 = ["red", "green", "blue", "orange", "brown", "#05FA87", "#FA6D05", "#05D9FA", "#B705FA", "#E3C506", "#48FA05", "#FA0587"];

        new Chart("myChart8", {
            type: "bar",
            data: {
                labels: xValues8,
                datasets: [{
                    backgroundColor: barColors8,
                    data: yValues8
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





    </script>




</body>

</html>