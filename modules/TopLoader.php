<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/toploader.css?v=1">

</head>

<body>


    <div class="topLoader" id="topLoader" ">
   
      <div class=" topLoaderPercentage" id="topLoaderPercentage"></div>
    </div>
    <script>
        let percentage = 0;
        const interval = setInterval(() => {

            document.getElementById('topLoaderPercentage').style.width = percentage + "%";
            document.getElementById('topLoaderPercentage').style.height = "100%";
            percentage += 4;


            if (percentage > 107) {
                clearInterval(interval);
                document.getElementById('topLoader').style.display = "none";
            }

        }, 40)
    </script>
</body>

</html>