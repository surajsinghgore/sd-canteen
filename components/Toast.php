<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/toast.css">
</head>

<body>
    <div class="<?php echo "alert $status alert-dismissible fade show"; ?>" role="alert" id="toast">
        <strong><?php echo "$title"; ?></strong> <?php echo "$message"; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="progress mt-2 mb-2">
            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo "100"; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress"></div>
        </div>
    </div>

    <script>
        let percentage = 100;
        const interval = setInterval(() => {
            console.log(percentage)
            document.getElementById('progress').style.width = percentage + "%";
            percentage -= 2;
            if (percentage < -20) {
                document.getElementById('toast').style.display = "none";
                clearInterval(interval);
            }
        }, 50)
    </script>
</body>

</html>