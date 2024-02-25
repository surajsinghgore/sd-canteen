<!-- toggle event on btn toggle -->
<?php require("../api/controlorderstatus.php"); ?>


<!-- get toggle status for btn  -->

<?php
// require database connection
require('../middleware/ConnectToDatabase.php');
$resultGet = mysqli_query($connection, "SELECT * FROM orderonoffstatus where id='1'");
$rows = mysqli_num_rows($resultGet);
$data = mysqli_fetch_assoc($resultGet);
$orderStatusFromDB = $data['status'];
$inputStatus = $orderStatusFromDB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin/AdminTopHeader.css?v=1">
    <script>
        // prevent reload post request
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    </script>
</head>

<body>

    <?php

    if (isset($toast_status)) {

        if ($toast_status == 'true') {
            require('../components/Toast.php');
        }
    }

    ?>
    <div class="topHeader">



        <div class="heading_section">
            <i class="Icons"><i class="fa-solid fa-crosshairs"></i></i>


            <h1><?php echo $AdminTopHeaderTitle; ?></h1>
        </div>


        <div class="profile_section">
            <h1>order controller: </h1>
            <label class="switch">
                <form action="<?= ($_SERVER['PHP_SELF']) ?>" method="post">
                    <button name="on_off_click">
                        <?php if ($orderStatusFromDB == "true") {
                            echo " <input type='checkbox' name='orderStatus' checked  >";
                        } else { {
                                echo " <input type='checkbox'  name='orderStatus'  >";
                            }
                        } ?>

                        <span class="slider round"></span>
                    </button>
                </form>
            </label>
        </div>

    </div>

</body>

</html>