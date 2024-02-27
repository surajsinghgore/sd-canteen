
<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">



<body>

    <div class="admin">

<?php
     $SixDigitOtp = sprintf("%06d", mt_rand(1, 999999));
echo var_dump($SixDigitOtp);
?>





    </div>
</body>

</html>