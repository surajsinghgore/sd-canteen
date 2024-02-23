<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/realtimeorder.css?v=5">

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
            <?php $pathNavigationParentPath = "/sd-canteen/admin/Allorders.php";
            $pathNavigationParent = "Orders";
            $pathNavigationChild = "All Orders";
            require('../components/PathNavigation.php'); ?>




            <div class="orders">
                <h1>Filter Records</h1>
                <h5>Total Orders : <span>23</span></h5>
                <div class="searchBar1">
                    <select name="time" id="time">
                        <option value="all">All Records</option>
                        <option value="token">Search Using Client Token</option>
                        <option value="clinetname">Search Using Client Name</option>
                        <option value="clinetemail">Search Using Client Email Address</option>
                        <option value="clinetphone">Search Using Client Phone Number</option>
                        <option value="fulldate">Search Using Full Date</option>
                        <option value="fulltime">Search Using Full Time</option>
                        <option value="paymentmethod">Search Using Payment Method</option>
                        <option value="productname">Search Using Product Name</option>
                        <option value="productcategory">Search Using Product Category</option>
                        <option value="orderstatus">Search Using Order Status</option>
                        <option value="totalamount">Search Using Total Amount</option>
                    </select>
                    <input type="search" placeholder="search" />
                </div>


                <div class="tables_section">



                    <div>

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

                    <!-- <h6>No Orders Found</h6> -->

                </div>

            </div>



        </div>
</body>

</html>