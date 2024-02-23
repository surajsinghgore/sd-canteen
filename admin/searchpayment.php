<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/payment.css?v=1">

<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Search Payments";
</script>

<body>

    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle = "Search Payments";
            require('../components/AdminTopHeader.php'); ?>
            <!-- path navigation -->
            <?php $pathNavigationParentPath = "/sd-canteen/admin/searchpayment.php";
            $pathNavigationParent = "Payments ";
            $pathNavigationChild = "Search Payments";
            require('../components/PathNavigation.php'); ?>






            <div class="AllPayments">
               <!-- filter box -->
               <div class="filterBox">
<li>
<input type="text" placeholder="Search By TXNID" />
</li>

<li>
<input type="text" placeholder="Search By TXN AMOUNT" />
</li>

<li>
<input type="text" placeholder="Search By Customer Name" />
</li>
<li>
<input type="text" placeholder="Search By Order Token"/>
</li>


</div>



                <div class="datasPayment">
                    <h2>
                    Total Records Found:<span> 23</span>
                    </h2>

                    <div class="cards">

                        <div class="card">
                            <div class="topSection">
                                <div class="left">
                                    <h6>Payment Details</h6>
                                    <p>suraj singh</p>
                                </div>

                                <div class="right">
                                    <li class="button">
                                        <div class="complete">Complete</div>
                                    </li>
                                </div>

                                <!-- text TXN_FAILURE -->
                                <!--        
                            <div class="right">
                              <li class="button">
                                <div class="reject">Failed</div>
                              </li>
                            </div> -->


                                <!-- initiated -->
                                <!-- <div class="right">
                           
                              <li class="button">
                                <div class="initiate">
                                  Initiated
                                </div>
                              </li>
                            </div> -->


                                <!-- pending -->
                                <!-- <div class="right">
                              <li class="button">
                                <div class="pending">Pending</div>
                              </li> -->
                            </div>


                        

                        <div class="mainData">
                            <h5>Payment Info</h5>
                            <div class="all">
                                <li>
                                    <div class="heading">Email ID</div>
                                    <div class="desc">surajthakurrs45@gmail.com</div>
                                </li>

                                <li>
                                    <div class="heading">Mobile</div>
                                    <div class="desc">8769847567</div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Token
                                    </div>
                                    <div class="desc1">
                                        XH3kid
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Date
                                    </div>
                                    <div class="desc">
                                        29/09/2023
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Payment Time
                                    </div>
                                    <div class="desc">
                                        9-44 AM
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Status
                                    </div>
                                    <div class="desc">
                                        Pending
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Order Amount
                                    </div>
                                    <div class="desc">
                                        230
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Amount
                                    </div>
                                    <div class="desc">
                                        30.0
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        transaction Currency
                                    </div>
                                    <div class="desc">
                                        INR
                                    </div>
                                </li>
                            </div>
                            <h4>Bank Info</h4>
                            <div class="all">
                                <li>
                                    <div class="heading">Bank Name</div>
                                    <div class="desc">
                                        HDFC BANK
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Bank Transaction ID
                                    </div>
                                    <div class="desc">
                                        17520438122
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Gateway Name
                                    </div>
                                    <div class="desc">
                                        HDFC
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Mode
                                    </div>
                                    <div class="desc">
                                        NB
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Full Date
                                    </div>
                                    <div class="desc">
                                        2024-01-25 09:44:46.0
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Payment Status
                                    </div>
                                    <div class="desc">
                                        TXN_SUCCESS
                                    </div>
                                </li>
                            </div>

                        </div>
                    </div>


                    <div class="card">
                            <div class="topSection">
                                <div class="left">
                                    <h6>Payment Details</h6>
                                    <p>suraj singh</p>
                                </div>

                                <div class="right">
                                    <li class="button">
                                        <div class="complete">Complete</div>
                                    </li>
                                </div>

                                <!-- text TXN_FAILURE -->
                                <!--        
                            <div class="right">
                              <li class="button">
                                <div class="reject">Failed</div>
                              </li>
                            </div> -->


                                <!-- initiated -->
                                <!-- <div class="right">
                           
                              <li class="button">
                                <div class="initiate">
                                  Initiated
                                </div>
                              </li>
                            </div> -->


                                <!-- pending -->
                                <!-- <div class="right">
                              <li class="button">
                                <div class="pending">Pending</div>
                              </li> -->
                            </div>


                        

                        <div class="mainData">
                            <h5>Payment Info</h5>
                            <div class="all">
                                <li>
                                    <div class="heading">Email ID</div>
                                    <div class="desc">surajthakurrs45@gmail.com</div>
                                </li>

                                <li>
                                    <div class="heading">Mobile</div>
                                    <div class="desc">8769847567</div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Token
                                    </div>
                                    <div class="desc1">
                                        XH3kid
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Date
                                    </div>
                                    <div class="desc">
                                        29/09/2023
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Payment Time
                                    </div>
                                    <div class="desc">
                                        9-44 AM
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Order Status
                                    </div>
                                    <div class="desc">
                                        Pending
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Order Amount
                                    </div>
                                    <div class="desc">
                                        230
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Amount
                                    </div>
                                    <div class="desc">
                                        30.0
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        transaction Currency
                                    </div>
                                    <div class="desc">
                                        INR
                                    </div>
                                </li>
                            </div>
                            <h4>Bank Info</h4>
                            <div class="all">
                                <li>
                                    <div class="heading">Bank Name</div>
                                    <div class="desc">
                                        HDFC BANK
                                    </div>
                                </li>

                                <li>
                                    <div class="heading">
                                        Bank Transaction ID
                                    </div>
                                    <div class="desc">
                                        17520438122
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Gateway Name
                                    </div>
                                    <div class="desc">
                                        HDFC
                                    </div>
                                </li>
                            </div>
                            <div class="all">
                                <li>
                                    <div class="heading">
                                        Payment Mode
                                    </div>
                                    <div class="desc">
                                        NB
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Transaction Full Date
                                    </div>
                                    <div class="desc">
                                        2024-01-25 09:44:46.0
                                    </div>
                                </li>
                                <li>
                                    <div class="heading">
                                        Payment Status
                                    </div>
                                    <div class="desc">
                                        TXN_SUCCESS
                                    </div>
                                </li>
                            </div>

                        </div>
                    </div>
                    <!-- <h1>No Data Found</h1> -->

                </div>
            </div>
        </div>








    </div>

    </div>
</body>

</html>