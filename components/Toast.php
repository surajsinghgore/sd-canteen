<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/toast.css?v=1">
    <script src="https://kit.fontawesome.com/7aa46b9c99.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="toast" id="toast">
        <div class="toastParent">

            <div class="messageSection">


                <div class="icon <?php if (isset($error_status)) {
                                        echo $error_status;
                                    } ?>">
                    <?php if ($error_status == "warn") {
                        echo "<i class='fa-solid fa-triangle-exclamation'></i>";
                    } else if ($error_status == "success") {
                        echo "<i class='fa-solid fa-circle-check'></i>";
                    } else if ($error_status == "error") {
                        echo "<i class='fa-solid fa-circle-exclamation'></i>";
                    }
                    ?></div>
                <div class="message"><?php if (isset($error_message)) {
                                            echo $error_message;
                                        } ?></div>
            </div>
            <div class="closeBtn" onclick="closeToast()"><i class="fa-solid fa-xmark"></i></div>
            <div class="progressBar">
                <div class="<?php if (isset($error_status)) {
                                echo $error_status;
                            } ?>" id="progress">
                </div>

            </div>
        </div>
    </div>
    <script>
        let percentage = 100;
        const interval = setInterval(() => {
            document.getElementById('toast').style.animation = "InAnimation  0.3s linear"

            document.getElementById('progress').style.width = percentage + "%";
            percentage -= 2;


            if (percentage < -5) {
                clearInterval(interval);

                document.getElementById('toast').style.transform = "translateX(999px)";
            }

        }, 50)

        function closeToast() {
            document.getElementById('toast').style.transform = "translateX(999px)";
            clearInterval(interval);

        }
    </script>
</body>

</html>