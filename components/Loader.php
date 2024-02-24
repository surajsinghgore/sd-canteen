<!DOCTYPE html>
<html lang="en">
<!-- global css added -->
<link rel="stylesheet" href="./styles/style.css?v=2">
<body>



    <div class="loader_Container" id="loader_container">

        <div class="loader">
            <img src="./images/loader.gif" alt="loader" class="image" />
        </div>

    </div>

<script>


    setTimeout(()=>{

        document.getElementById('loader_container').style.display="none";
    },1000);
</script>

</body>

</html>