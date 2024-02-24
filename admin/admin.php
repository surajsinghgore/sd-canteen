<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=3">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=5">
<script>
    window.document.title = "SD CANTEEN | Admin Panel";
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
            <?php $AdminTopHeaderTitle = "admin DASHBOARD";
            require('../components/AdminTopHeader.php'); ?>



            <div class="allAnaylsis">
                <!-- filter by year wise -->
                <div class="filter">
                    <select name="year">

                        <option>
                            2024
                        </option>
                        <option>
                            2023
                        </option>

                    </select>
                </div>


                <!-- Monthwise Website Visits -->
                <div class="charjs">
                    <h4>
                        Monthwise Website Visits
                        <span>Total: 23</span>
                    </h4>
                    <div class="chart">

                    <canvas id="myChart11"></canvas>

                    </div>
                </div>
                <!--  Browser Used To Access Sd Website -->
                <div class="charjs">
                    <h4>
                        Browser Used To Access Sd Website In 2024
                        <span>Total: 22</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart10"></canvas>

                    </div>
                </div>

                <!--Total Orders Place  -->
                <div class="charjs">
                    <h4>
                        Total Orders Placed In 2024
                        <span>Total : 23</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart9"></canvas>
                       
                    </div>
                </div>
                <!-- {/* top 10 trending */} -->
                <div class="charjs">
                    <h4>
                        Top 10 Trending Items Of All Times <span>Top 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart8"></canvas>

                    </div>
                </div>

                <!--Total Earning   -->
                <div class="charjs">
                    <h4>
                        Total Earning In 2024
                        <span>Total ₹: 2322</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart7"></canvas>

                    </div>
                </div>

                <!--  Monthwise New Clients Register -->
                <div class="charjs">
                    <h4>
                        Monthwise New Clients Register
                        <span>Total: 23</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart6"></canvas>
                    </div>
                </div>

                <!--   Top 10 Most Ordered Food In 2024 -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Food In 2024 <span>Total: 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart5"></canvas>
                    </div>
                </div>

                <!-- Top 10 Most Ordered Coffee   -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Coffee In 23 <span>Top 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart4"></canvas>
                    </div>
                </div>

                <!-- Top 10 Most Ordered Juice In 23 -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Juice In 2024 <span>Top 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <!--  Top 10 Most Ordered Drink -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Drink In 2024 <span>Top 10</span>
                    </h4>
                    <div class="chartPie">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>





        </div>

    </div>


    <!-- chatJs graph -->
    <script>
// monthwise website visits
const xValues11 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues11 = [2,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart11", {
  type: "line",
  data: {
    labels: xValues11,
    datasets: [{
      fill: false,
      lineTension:0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "#FA5305",
      data: yValues11
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:45}}],
    }
  }
});

// browser used


const xMyChart10 = ["chrome", "firebox", "safari", "opera", "other"];
        const yMyChart10 = [20, 1, 34, 5, 5];
        const barColorsMyChart10 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            
        ];

        new Chart("myChart10", {
            type: "pie",
            data: {
                labels: xMyChart10,
                datasets: [{
                    backgroundColor: barColorsMyChart10,
                    data: yMyChart10
                }]
            },
            options: {
                title: {
                    display: true,
                    //   text: "World Wide Wine Production 2018"
                }
            }
        });

// total order placed

const xValues9 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues9 = [55, 49, 44, 24, 15,23,23,23,45,45,12,34];
const barColors9 = ["red", "green","blue","orange","brown","#05FA87","#FA6D05","#05D9FA","#B705FA","#E3C506","#48FA05","#FA0587"];

new Chart("myChart9", {
  type: "bar",
  data: {
    labels: xValues9,
    datasets: [{
      backgroundColor: barColors9,
      data: yValues9
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    //   text: "World Wine Production 2018"
    }
  }
});


// top 10 trending Items

const xMyChart8 = ["Americano", "Cappuccino", "Espresso", "Macchiato", "Mocha", "Latte", "Doppio", "Café au lait", "Cold brew", "Affogato"];
        const yMyChart8 = [20, 1, 34, 5, 5, 10, 3, 4, 12, 22];
        const barColorsMyChart8 = [
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

        new Chart("myChart8", {
            type: "pie",
            data: {
                labels: xMyChart8,
                datasets: [{
                    backgroundColor: barColorsMyChart8,
                    data: yMyChart8
                }]
            },
            options: {
                title: {
                    display: true,
                    //   text: "World Wide Wine Production 2018"
                }
            }
        });

// 7 total earnings

const xValues7 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues7 = [55, 49, 44, 24, 15,23,23,23,45,45,12,34];
const barColors7 = ["red", "green","blue","orange","brown","#05FA87","#FA6D05","#05D9FA","#B705FA","#E3C506","#48FA05","#FA0587"];

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
    legend: {display: false},
    title: {
      display: true,
    //   text: "World Wine Production 2018"
    }
  }
});


 //8 Monthwise new client
 const xValues6 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues6 = [2,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart6", {
  type: "line",
  data: {
    labels: xValues6,
    datasets: [{
      fill: false,
      lineTension:0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "#FA5305",
      data: yValues6
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:45}}],
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



 // 10 most ordered coffee
 const xMyChart4 = ["Americano", "Cappuccino", "Espresso", "Macchiato", "Mocha", "Latte", "Doppio", "Café au lait", "Cold brew", "Affogato"];
        const yMyChart4 = [20, 1, 34, 5, 5, 10, 3, 4, 12, 22];
        const barColorsMyChart4 = [
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

        new Chart("myChart4", {
            type: "pie",
            data: {
                labels: xMyChart4,
                datasets: [{
                    backgroundColor: barColorsMyChart4,
                    data: yMyChart4
                }]
            },
            options: {
                title: {
                    display: true,
                    //   text: "World Wide Wine Production 2018"
                }
            }
        });



   // 11 most ordered juice
   const xMyChart3 = ["mango", "orange", "sugarcane", "nimbu pani", "strawberry", "banana", "Pineapple", "Papaya", "Pineapple", "Grapes"];
        const yMyChart3 = [5, 12, 14, 23, 12, 5, 23, 14, 5, 32];
        const barColorsMyChart3 = [
            "#FF0400",
            "#78FF00",
            "#FF6800",
            "#00FFB9",
            "#00CDFF",
            "#0051FF",
            "#8B00FF",
            "#FF00E0",
            "#FF0059",
            "#1C7E0C"
        ];

        new Chart("myChart3", {
            type: "pie",
            data: {
                labels: xMyChart3,
                datasets: [{
                    backgroundColor: barColorsMyChart3,
                    data: yMyChart3
                }]
            },
            options: {
                title: {
                    display: true,
                    //   text: "World Wide Wine Production 2018"
                }
            }
        });




// 12
        // most ordered drinks chartJs
        const xValues = ["coca cola", "maaza", "sprite", "slice", "pepsi", "fruti", "fanta", "thumbs up", "dew", "campa cola"];
        const yValues = [10, 10, 20, 5, 5, 10, 10, 10, 10, 10];
        const barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145",
            "#FF2D00",
            "#F300FF",
            "#6400FF",
            "#3AFF00",
            "#00E8FF"
        ];

        new Chart("myChart2", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
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