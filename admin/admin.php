<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="../styles/admin/admin.css?v=3">
<link rel="stylesheet" href="../styles/admin/analysis.css?v=6">

        <!-- ajax added -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                    <select name="year" id="selectedYear" onclick="yearChange()">

                     <!-- year fetch -->
                        
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
                </div>


                <!-- Monthwise Website Visits -->
                <div class="charjs">
                    <h4>
                        Monthwise Website Visits 
                        <span id="monthwisetotal">Total: 23</span>
                    </h4>
                    <div class="chart">

                    <canvas id="myChart11"></canvas>

                    </div>
                </div>
                <!--  Browser Used To Access Sd Website -->
                <div class="charjs">
                    <h4>
                        Browser Used To Access Sd Website In<p id="year1">2024</p>
                        <span id="browserused">Total: 0</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart10"></canvas>

                    </div>
                </div>

                <!--Total Orders Place  -->
                <div class="charjs">
                    <h4>
                        Total Orders Placed In <p id="year2">2024</p>
                        <span id="totalOrder">Total : 23</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart9"></canvas>
                       
                    </div>
                </div>
                <!-- {/* top 10 trending */} -->
                <div class="charjs">
                    <h4>
                        Top 10 Trending Items Of All Times <span id="trendingItem">Top 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart8"></canvas>

                    </div>
                </div>

                <!--Total Earning   -->
                <div class="charjs">
                    <h4>
                        Total Earning In <p id="year3">2024</p>
                        <span id="totalEarning">Total ₹: 2322</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart7"></canvas>

                    </div>
                </div>

                <!--  Monthwise New Clients Register -->
                <div class="charjs">
                    <h4>
                        Monthwise New Clients Register In  <p id="year4"></p>
                        <span id="monthwiseclientId">Total: 23</span>
                    </h4>
                    <div class="chart">
                    <canvas id="myChart6"></canvas>
                    </div>
                </div>

            <!-- trending items -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Food In <p id="year5">2024</p> <span id="trendingFood">Top: 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart5"></canvas>
                    </div>
                </div>

                <!-- Top 10 Most Ordered Coffee   -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Coffee In 23 <p id="year6">0</p>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart4"></canvas>
                    </div>
                </div>

                <!-- Top 10 Most Ordered Juice In 23 -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Juice In <p id="year7">0</p><span>Top 10</span>
                    </h4>
                    <div class="chartPie">
                    <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <!--  Top 10 Most Ordered Drink -->
                <div class="charjs">
                    <h4>
                        Top 10 Most Ordered Drink In <p id="year8">2024</p> <span>Top 10</span>
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



let selectedYear=document.getElementById('selectedYear').value;
        // load analysis data
        $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/adminPageAnalysis.php", 
                data: {
                   year:selectedYear
               
                },
           
                success: function(res) {

                 
                    let data=JSON.parse(res);

                 




// monthwise website visits
const xValues11 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues11 = data.monthwisevisit;
// sum total
let sum =  data.monthwisevisit.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('monthwisetotal').innerText="Total: "+sum;

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


const xMyChart10 = ["chrome", "firefox", "safari", "opera","edge","ie", "other"];
        const yMyChart10 = data.browserUse;
        // year select
        document.getElementById('year1').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.browserUse.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('browserused').innerText="Total: "+sum;


        const barColorsMyChart10 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            '#ff33cc',
            '#00ffff'
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
const yValues9 = data.totalOrders;
const barColors9 = ["red", "green","blue","orange","brown","#05FA87","#FA6D05","#05D9FA","#B705FA","#E3C506","#48FA05","#FA0587"];
// year select
document.getElementById('year2').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.totalOrders.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('totalOrder').innerText="Total: "+sum;


// top trending items of all times
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

const xMyChart8 = data.trendingItemName;
        const yMyChart8 = data.trendingItemData;



  
        // sum total
 sum =  data.trendingItemData.reduce((accumulator, currentValue) => parseInt(accumulator) + parseInt(currentValue), 0);
document.getElementById('trendingItem').innerText="Total: "+sum;

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
const yValues7 = data.totalEarning;


// year select
document.getElementById('year3').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.totalEarning.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('totalEarning').innerText="Total: "+sum;


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
const yValues6 = data.monthwiseclient;

// year select
document.getElementById('year4').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.monthwiseclient.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('monthwiseclientId').innerText="Total: "+sum;



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
// food items
const xMyChart5 = data.topFoodName;
        const yMyChart5 = data.topFoodData;
// year select
document.getElementById('year5').innerText=document.getElementById('selectedYear').value;


        
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


        document.getElementById('year6').innerText=document.getElementById('selectedYear').value;
        document.getElementById('year7').innerText=document.getElementById('selectedYear').value;
        document.getElementById('year8').innerText=document.getElementById('selectedYear').value;

 // 10 most ordered coffee
 const xMyChart4 = data.topCoffeeName;
        const yMyChart4 = data.topCoffeeData;
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
   const xMyChart3 =data.topJuiceName;
        const yMyChart3 = data.topJuiceData;
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
        const xValues = data.topDrinkName;
        const yValues = data.topDrinkData;
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

     

    
                }})



                function yearChange(){


                  
                  
let selectedYear1=document.getElementById('selectedYear').value;
        // load analysis data
        $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/adminPageAnalysis.php", 
                data: {
                   year:selectedYear1
               
                },
           
                success: function(res) {
                 
                    let data=JSON.parse(res);

                 




// monthwise website visits
const xValues11 = ['january','february','march','april','may','june','july','august','september','october','november','december'];
const yValues11 = data.monthwisevisit;
// sum total
let sum =  data.monthwisevisit.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('monthwisetotal').innerText="Total: "+sum;

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


const xMyChart10 = ["chrome", "firefox", "safari", "opera","edge","ie", "other"];
        const yMyChart10 = data.browserUse;
        // year select
        document.getElementById('year1').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.browserUse.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('browserused').innerText="Total: "+sum;


        const barColorsMyChart10 = [
            "#378A29",
            "#29718A",
            "#0F29AC",
            "#AC350F",
            "#0FACA0",
            '#ff33cc',
            '#00ffff'
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
const yValues9 = data.totalOrders;
const barColors9 = ["red", "green","blue","orange","brown","#05FA87","#FA6D05","#05D9FA","#B705FA","#E3C506","#48FA05","#FA0587"];
// year select
document.getElementById('year2').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.totalOrders.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('totalOrder').innerText="Total: "+sum;


// top trending items of all times
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

const xMyChart8 = data.trendingItemName;
        const yMyChart8 = data.trendingItemData;



  
        // sum total
 sum =  data.trendingItemData.reduce((accumulator, currentValue) => parseInt(accumulator) + parseInt(currentValue), 0);
document.getElementById('trendingItem').innerText="Total: "+sum;

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
const yValues7 = data.totalEarning;


// year select
document.getElementById('year3').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.totalEarning.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('totalEarning').innerText="Total: "+sum;


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
const yValues6 = data.monthwiseclient;

// year select
document.getElementById('year4').innerText=document.getElementById('selectedYear').value;
        // sum total
 sum =  data.monthwiseclient.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
document.getElementById('monthwiseclientId').innerText="Total: "+sum;



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
// food items
const xMyChart5 = data.topFoodName;
        const yMyChart5 = data.topFoodData;
// year select
document.getElementById('year5').innerText=document.getElementById('selectedYear').value;


        
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


        document.getElementById('year6').innerText=document.getElementById('selectedYear').value;
        document.getElementById('year7').innerText=document.getElementById('selectedYear').value;
        document.getElementById('year8').innerText=document.getElementById('selectedYear').value;

 // 10 most ordered coffee
 const xMyChart4 = data.topCoffeeName;
        const yMyChart4 = data.topCoffeeData;
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
   const xMyChart3 =data.topJuiceName;
        const yMyChart3 = data.topJuiceData;
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
        const xValues = data.topDrinkName;
        const yValues = data.topDrinkData;
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

     

    
                }})
                }
    </script>







</body>

</html>