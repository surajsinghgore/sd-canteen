<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/toploader.css?v=4">

</head>

<body>


    <div class="topLoader" id="topLoader" ">
   
      <div class=" topLoaderPercentage" id="topLoaderPercentage"></div>
    </div>
    <script>
        let LoaderPercentage = 0;
        const TopLoaderInterval = setInterval(() => {

            document.getElementById('topLoaderPercentage').style.width = LoaderPercentage + "%";
            document.getElementById('topLoaderPercentage').style.height = "100%";
            LoaderPercentage += 4;


            if (LoaderPercentage > 107) {
                clearInterval(TopLoaderInterval);
                document.getElementById('topLoader').style.display = "none";
            }

        }, 40)
    

    </script>
</body>

</html>