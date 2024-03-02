<!-- add category api -->
<?php require('../api/AddCoffeeCategory.php'); ?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=14">
<link rel="stylesheet" href="../styles/admin/payment.css?v=2">

<!-- ajax added -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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





            <div class="AllPayments">
                <!-- filter box -->
                <div class="filterBox">
                    <li>
                        <input type="text" placeholder="Search By TXN TOKEN" id="TXNID" onkeyup="searchByTXNID()" />
                    </li>

                    <li>
                        <input type="text" placeholder="Search By TXN AMOUNT" id="totalAmount" onkeyup="searchByTotalAmount()" />
                    </li>

                    <li>
                        <input type="text" placeholder="Search By Customer Name" id="customerName" onkeyup="searchByCustomerName()" />
                    </li>
                    <li>
                        <input type="text" placeholder="Search By Order Token" id="tokenId" onkeyup="searchByTokenId()" />
                    </li>


                </div>



                <div class="datasPayment">
                    <h2>
                        Total Records Found: <span id="totalRecords"> 23</span>
                    </h2>

                    <div class="cards" id="cards">




                    </div>
                </div>
            </div>








        </div>

    </div>




    <script>
        // token id
        function searchByTokenId() {
            let tokenId = document.getElementById('tokenId').value.toUpperCase();
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/searchPayment.php", //your page
                data: {
                    tokenId: tokenId,

                },
                // return data
                success: function(res) {
                   
                    document.getElementById('cards').innerHTML = res; document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
                }

            })
        }


        // search by customer name

        function searchByCustomerName() {
            let input = document.getElementById('customerName').value.toLowerCase();
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/searchPayment.php", //your page
                data: {
                    customerName: input,

                },
                // return data
                success: function(res) {
                   
                    document.getElementById('cards').innerHTML = res;
                    document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
                }

            })
        }


        // search by searchByTotalAmount

        function searchByTotalAmount() {
            let input = document.getElementById('totalAmount').value;
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/searchPayment.php", //your page
                data: {
                    totalAmount: input,

                },
                // return data
                success: function(res) {
                 
                    document.getElementById('cards').innerHTML = res;
                    document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
                }

            })
        }





        // search by txn token

        function searchByTXNID() {
            let input = document.getElementById('TXNID').value;
            $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/searchPayment.php", //your page
                data: {
                    TXNID: input,

                },
                // return data
                success: function(res) {
                  
                    document.getElementById('cards').innerHTML = res;
                    document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
                }

            })
        }


        document.getElementById('totalRecords').innerText = document.getElementsByClassName('card').length;
    </script>
</body>

</html>