<?php

require('../middleware/ConnectToDatabase.php');

if (isset($_REQUEST['searchBarInput'])) {
    require('../middleware/ConnectToDatabase.php');

    $searchInput=$_REQUEST['searchBarInput'];
    // 



// food query
    $query1="select*from fooditems where foodname like '%$searchInput%' and active='on'";
    $res1=mysqli_query($connection,$query1);
$row1=mysqli_num_rows($res1);

//    coffee
$query2="select*from coffeeitems where coffeename like '%$searchInput%' and active='on'";
$res2=mysqli_query($connection,$query2);
$row2=mysqli_num_rows($res2);
//    drink
$query3="select*from drinkitems where drinkname like '%$searchInput%' and active='on'";
$res3=mysqli_query($connection,$query3);
$row3=mysqli_num_rows($res3);

// juice
$query4="select*from juiceitems where juicename like '%$searchInput%' and active='on'";
$res4=mysqli_query($connection,$query4);
$row4=mysqli_num_rows($res4);


// food data fetch
while ($FoodData = mysqli_fetch_array($res1)) { ?>

<a href="/sd-canteen/items.php?item=<?php echo $FoodData['foodname'];?>"><li><i class="fa-solid fa-magnifying-glass fixed" ></i><?php echo $FoodData['foodname'];?></li></a>


<?php
}



    // fetch coffee data
    while ($FoodData = mysqli_fetch_array($res2)) { ?>

        <a href="/sd-canteen/items.php?item=<?php echo $FoodData['coffeename'];?>"><li><i class="fa-solid fa-magnifying-glass fixed" ></i><?php echo $FoodData['coffeename'];?></li></a>
        
        
        <?php
        }

    // fetch drink data



    while ($FoodData = mysqli_fetch_array($res3)) { ?>

        <a href="/sd-canteen/items.php?item=<?php echo $FoodData['drinkname'];?>"><li><i class="fa-solid fa-magnifying-glass fixed" ></i><?php echo $FoodData['drinkname'];?></li></a>
        
        
        <?php
        }
    // fetch juice data



    while ($FoodData = mysqli_fetch_array($res4)) { ?>

        <a href="/sd-canteen/items.php?item=<?php echo $FoodData['juicename'];?>"><li><i class="fa-solid fa-magnifying-glass fixed" ></i><?php echo $FoodData['juicename'];?></li></a>
        
        
        <?php
        }

            }
        

  
   



?>