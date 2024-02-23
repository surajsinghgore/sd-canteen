<!-- handle admin logout -->
<?php require('../api/AdminLogout.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        // prevent reload post request
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    </script>

</head>

<body>
    <?php
    // verify admin login
    require('../middleware/VerifyAdminLogin.php');
    require('../modules/TopLoader.php');


    ?>
    <div class="leftPanel">
        <div class="logo_img">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png" layout="fill" alt="logo " />
        </div>


        <!-- sub links -->
        <div class="menu_Links">

            <!-- home dashboard-->
            <li onclick="enableDashboard()">
                <div class="styles" id="ActiveDashboard">
                    <div class="icon">
                        <i class="fa-solid fa-box"></i>
                    </div>

                    <span class="title">Dashboard</span>

                    <div class="arrows">

                        <div class="top" id="dashboardArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="dashboardSubMenu">
                    <li><a href="/sd-canteen/admin/admin.php">Home Dashboard</a></li>
                    <li><a href="/sd-canteen/admin/managecomments.php">Manage Comments</a></li>
                    <li><a href="/sd-canteen">Main Website</a></li>


                </ul>

            </li>

            <!-- food menu -->

            <li onclick="enableFoodMenu()">
                <div class="styles" id="ActiveFood">
                    <div class="icon">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>

                    <span class="title">Foods</span>

                    <div class="arrows">

                        <div class="top" id="foodArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="foodSubMenu">
                    <li><a href="/sd-canteen/admin/addfooditem.php">Add Food</a></li>
                    <li><a href="/sd-canteen/admin/updatefooditem.php">Update Food</a></li>
                    <li><a href="/sd-canteen/admin/deletefooditem.php">Delete Food</a></li>
                    <li><a href="/sd-canteen/admin/viewfoodItem.php">View Food</a></li>
                    <li><a href="/sd-canteen/admin/managefoodcategory.php">Manage Food Categories</a></li>


                </ul>

            </li>

            <!-- coffee menu -->
            <li onclick="enableCoffeeMenu()">
                <div class="styles" id="ActiveCoffee">
                    <div class="icon">
                        <i class="fa-solid fa-mug-hot"></i>
                    </div>

                    <span class="title">Coffee</span>

                    <div class="arrows">

                        <div class="top" id="coffeeArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="coffeeSubMenu">
                    <li><a href="/sd-canteen/admin/addcoffeeitem.php">Add Coffee</a></li>
                    <li><a href="/sd-canteen/admin/updatecoffeeitem.php">Update Coffee</a></li>
                    <li><a href="/sd-canteen/admin/deletecoffeeitem.php">Delete Coffee</a></li>
                    <li><a href="/sd-canteen/admin/viewcoffeeItem.php">View Coffee</a></li>
                    <li><a href="/sd-canteen/admin/managecoffeecategory.php">Manage Coffee Categories</a></li>


                </ul>

            </li>

            <!-- drink menu -->
            <li onclick="enableDrinkMenu()">
                <div class="styles" id="ActiveDrink">
                    <div class="icon">
                        <i class="fa-solid fa-martini-glass"></i>
                    </div>

                    <span class="title">Drinks</span>

                    <div class="arrows">

                        <div class="top" id="drinkArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="drinkSubMenu">
                    <li><a href="/sd-canteen/admin/adddrinkitem.php">Add Drink</a></li>
                    <li><a href="/sd-canteen/admin/updatedrinkitem.php">Update Drink</a></li>
                    <li><a href="/sd-canteen/admin/deletedrinkitem.php">Delete Drink</a></li>
                    <li><a href="/sd-canteen/admin/viewdrinkItem.php">View Drink</a></li>
                    <li><a href="/sd-canteen/admin/managedrinkcategory.php">Manage Drink Categories</a></li>


                </ul>

            </li>
            <!-- juice menu -->
            <li onclick="enableJuiceMenu()">
                <div class="styles" id="ActiveJuice">
                    <div class="icon">
                        <i class="fa-solid fa-wine-glass"></i>
                    </div>

                    <span class="title">Juices</span>

                    <div class="arrows">

                        <div class="top" id="juiceArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="juiceSubMenu">
                    <li><a href="/sd-canteen/admin/addjuiceitem.php">Add Juice</a></li>
                    <li><a href="/sd-canteen/admin/updatejuiceitem.php">Update Juice</a></li>
                    <li><a href="/sd-canteen/admin/deletejuiceitem.php">Delete Juice</a></li>
                    <li><a href="/sd-canteen/admin/viewjuiceItem.php">View Juice</a></li>
                    <li><a href="/sd-canteen/admin/managejuicecategory.php">Manage Juice Categories</a></li>


                </ul>

            </li>

            <!-- orders -->
            <li onclick="enableOrderMenu()">
                <div class="styles" id="ActiveOrder">
                    <div class="icon">
                        <i class="fa-regular fa-rectangle-list"></i>
                    </div>

                    <span class="title">Orders</span>

                    <div class="arrows">

                        <div class="top" id="orderArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="orderSubMenu">
                    <li><a href="/sd-canteen/admin/realtimeorder.php">Realtime orders</a></li>
                    <li><a href="/sd-canteen/admin/Allorders.php">All Orders</a></li>
                    <li><a href="/sd-canteen/admin/analysisorders.php">Analysis Orders</a></li>



                </ul>

            </li>
            <!-- payments -->
            <li onclick="enablePaymentMenu()">
                <div class="styles" id="ActivePayment">
                    <div class="icon">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>

                    <span class="title">Payments</span>

                    <div class="arrows">

                        <div class="top" id="paymentArrowIcon"> <i class="fa-solid fa-chevron-right"></i></div>

                    </div>
                </div>

                <ul id="paymentSubMenu">
                    <li><a href="/sd-canteen/admin/allpayment.php">All Payments</a></li>
                    <li><a href="/sd-canteen/admin/searchpayment.php">Search Transactions</a></li>
                    <li><a href="/sd-canteen/admin/analysispayment.php">Analysis Transactions</a></li>



                </ul>

            </li>

            <!-- logout -->
            <li>
                <div class="styles" id="ActivePayment">
                    <form method="post" action="" autocomplete="off"">
                    <button name=" logout_click">
                        <div class=" icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>

                        <span class="title">Logout</span>

                        </button>
                    </form>
                </div>


            </li>
        </div>
    </div>




    <!-- javascript -->
    <script>
        // dashboard menu
        const enableDashboard = () => {
            if (document.getElementById('dashboardSubMenu').style.display == "block") {
                document.getElementById('dashboardSubMenu').style.display = "none";
                document.getElementById('dashboardArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveDashboard').style.background = "none";

            } else {
                document.getElementById('ActiveDashboard').style.backgroundColor = "white";

                document.getElementById('dashboardSubMenu').style.display = "block";
                document.getElementById('dashboardArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }



        }


        // food menu

        const enableFoodMenu = () => {
            if (document.getElementById('foodSubMenu').style.display == "block") {
                document.getElementById('foodSubMenu').style.display = "none";
                document.getElementById('foodArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveFood').style.background = "none";

            } else {
                document.getElementById('ActiveFood').style.backgroundColor = "white";

                document.getElementById('foodSubMenu').style.display = "block";
                document.getElementById('foodArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
        // coffee menu

        const enableCoffeeMenu = () => {
            if (document.getElementById('coffeeSubMenu').style.display == "block") {
                document.getElementById('coffeeSubMenu').style.display = "none";
                document.getElementById('coffeeArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveCoffee').style.background = "none";

            } else {
                document.getElementById('ActiveCoffee').style.backgroundColor = "white";

                document.getElementById('coffeeSubMenu').style.display = "block";
                document.getElementById('coffeeArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
        // drink menu

        const enableDrinkMenu = () => {
            if (document.getElementById('drinkSubMenu').style.display == "block") {
                document.getElementById('drinkSubMenu').style.display = "none";
                document.getElementById('drinkArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveDrink').style.background = "none";

            } else {
                document.getElementById('ActiveDrink').style.backgroundColor = "white";

                document.getElementById('drinkSubMenu').style.display = "block";
                document.getElementById('drinkArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
        // juice menu
        const enableJuiceMenu = () => {
            if (document.getElementById('juiceSubMenu').style.display == "block") {
                document.getElementById('juiceSubMenu').style.display = "none";
                document.getElementById('juiceArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveJuice').style.background = "none";

            } else {
                document.getElementById('ActiveJuice').style.backgroundColor = "white";

                document.getElementById('juiceSubMenu').style.display = "block";
                document.getElementById('juiceArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
        // orders menu

        const enableOrderMenu = () => {
            if (document.getElementById('orderSubMenu').style.display == "block") {
                document.getElementById('orderSubMenu').style.display = "none";
                document.getElementById('orderArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActiveOrder').style.background = "none";

            } else {
                document.getElementById('ActiveOrder').style.backgroundColor = "white";

                document.getElementById('orderSubMenu').style.display = "block";
                document.getElementById('orderArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
        // payment menu
        const enablePaymentMenu = () => {
            if (document.getElementById('paymentSubMenu').style.display == "block") {
                document.getElementById('paymentSubMenu').style.display = "none";
                document.getElementById('paymentArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-right'></i>";
                document.getElementById('ActivePayment').style.background = "none";

            } else {
                document.getElementById('ActivePayment').style.backgroundColor = "white";

                document.getElementById('paymentSubMenu').style.display = "block";
                document.getElementById('paymentArrowIcon').innerHTML = "<i class='fa-solid fa-chevron-down'></i>";
            }


        }
    </script>
</body>

</html>