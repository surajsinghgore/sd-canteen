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
                <div class="icon error"><i class="fa-solid fa-circle-exclamation"></i></div>
                <!-- <div class="icon warn"><i class="fa-solid fa-triangle-exclamation"></i></div> -->
                <!-- <div class="icon success"><i class="fa-solid fa-circle-check" ></i></div> -->
                <div class="message">Wow so easy !</div>
            </div>
            <div class="closeBtn"><i class="fa-solid fa-xmark"></i></div>
            <div class="progressBar">
                <div class="error" id="progress">
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
    </script>
</body>

</html>