
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/admin/admin.css">
<link rel="stylesheet" href="./styles/client/filterwithcategory.css?v=7">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Category";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin">




    



  
    
        </div>


        <div class="category">

        <?php 

$resCount=0;
$getCategory=$_GET['category'];
require('./middleware/ConnectToDatabase.php');
// try to fetch food item
$sql_query = "select * from fooditems where category like '$getCategory' and active='on'";
$res_food_item_count = mysqli_query($connection, $sql_query);

$FoodItemsCount = mysqli_num_rows($res_food_item_count);

// means data gets
 if ($FoodItemsCount > 0) {
$resCount=1;
    
?>
    <div class="banner">
      <div class="BannerImage">
      <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014250/bannerInside_scybz9.png"  alt="banner inside"/>
      </div>
      <h1><?php if(isset($getCategory)){echo  $getCategory;}?></h1>
      <div class="divs">
     <a href="/sd-canteen" >Home </a>- Items - <?php if(isset($getCategory)){echo  $getCategory;}?>
      </div>
</div>



<div class="Its">
<div class="Items" >


<div>


<?php
    while ($data = mysqli_fetch_array($res_food_item_count)) { ?>


<div class="item" >
<div class="card">
<div class="FoodImage">
<img src="<?php 
    $modifiedString = substr($data['imagepath'], 1);
    echo $modifiedString;?>" alt="food name" layout="fill"/>
</div>
<div class="data">
<h1><?php echo $data['foodname'];?></h1>
<h6>QTY: 1</h6>
<h4>Category : <?php echo $data['category'];?></h4>
<a href=""><button>Click To Order</button></a>
</div>
</div>
</div>
<?php
    }
}


// coffee data gets
// try to fetch food item
$sql_query = "select * from coffeeitems where category like '$getCategory' and active='on'";
$res_food_item_count = mysqli_query($connection, $sql_query);

$FoodItemsCount = mysqli_num_rows($res_food_item_count);
if ($FoodItemsCount > 0){
$resCount=1;
    
    ?>
        <div class="banner">
          <div class="BannerImage">
          <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014250/bannerInside_scybz9.png"  alt="banner inside"/>
          </div>
          <h1><?php if(isset($getCategory)){echo  $getCategory;}?></h1>
          <div class="divs">
         <a href="/sd-canteen" >Home </a>- Items - <?php if(isset($getCategory)){echo  $getCategory;}?>
          </div>
    </div>
    
    
    
    <div class="Its">
    <div class="Items" >
    
    
    <div>
    
    
    <?php
        while ($data = mysqli_fetch_array($res_food_item_count)) { ?>
    
    
    <div class="item" >
    <div class="card">
    <div class="FoodImage">
    <img src="<?php 
        $modifiedString = substr($data['imagepath'], 1);
        echo $modifiedString;?>" alt="coffee name" layout="fill"/>
    </div>
    <div class="data">
    <h1><?php echo $data['coffeename'];?></h1>
    <h6>QTY: 1</h6>
    <h4>Category : <?php echo $data['category'];?></h4>
    <a href=""><button>Click To Order</button></a>
    </div>
    </div>
    </div>
    <?php
        }
    }



    // drinks data gets

    $sql_query = "select * from drinkitems where category like '$getCategory' and active='on'";
$res_food_item_count = mysqli_query($connection, $sql_query);

$FoodItemsCount = mysqli_num_rows($res_food_item_count);
if ($FoodItemsCount > 0){
$resCount=1;
    
    ?>
        <div class="banner">
          <div class="BannerImage">
          <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014250/bannerInside_scybz9.png"  alt="banner inside"/>
          </div>
          <h1><?php if(isset($getCategory)){echo  $getCategory;}?></h1>
          <div class="divs">
         <a href="/sd-canteen" >Home </a>- Items - <?php if(isset($getCategory)){echo  $getCategory;}?>
          </div>
    </div>
    
    
    
    <div class="Its">
    <div class="Items" >
    
    
    <div>
    
    
    <?php
        while ($data = mysqli_fetch_array($res_food_item_count)) { ?>
    
    
    <div class="item" >
    <div class="card">
    <div class="FoodImage">
    <img src="<?php 
        $modifiedString = substr($data['imagepath'], 1);
        echo $modifiedString;?>" alt="Drink name" layout="fill"/>
    </div>
    <div class="data">
    <h1><?php echo $data['drinkname'];?></h1>
    <h6>QTY: 1</h6>
    <h4>Category : <?php echo $data['category'];?></h4>
    <a href=""><button>Click To Order</button></a>
    </div>
    </div>
    </div>
    <?php
        }
    }



    // juice data gets

    $sql_query = "select * from juiceitems where category like '$getCategory' and active='on'";
    $res_food_item_count = mysqli_query($connection, $sql_query);
    
    $FoodItemsCount = mysqli_num_rows($res_food_item_count);
    if ($FoodItemsCount > 0){
$resCount=1;
        
        ?>
            <div class="banner">
              <div class="BannerImage">
              <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014250/bannerInside_scybz9.png"  alt="banner inside"/>
              </div>
              <h1><?php if(isset($getCategory)){echo  $getCategory;}?></h1>
              <div class="divs">
             <a href="/sd-canteen" >Home </a>- Items - <?php if(isset($getCategory)){echo  $getCategory;}?>
              </div>
        </div>
        
        
        
        <div class="Its">
        <div class="Items" >
        
        
        <div>
        
        
        <?php
            while ($data = mysqli_fetch_array($res_food_item_count)) { ?>
        
        
        <div class="item" >
        <div class="card">
        <div class="FoodImage">
        <img src="<?php 
            $modifiedString = substr($data['imagepath'], 1);
            echo $modifiedString;?>" alt="Juice name" layout="fill"/>
        </div>
        <div class="data">
        <h1><?php echo $data['juicename'];?></h1>
        <h6>QTY: 1</h6>
        <h4>Category : <?php echo $data['category'];?></h4>
        <a href=""><button>Click To Order</button></a>
        </div>
        </div>
        </div>
        <?php
            }
        }



if($resCount==0){
echo "<h3 style='margin-top:290px;margin-bottom:290px;text-align:center'>No Items Find With This Category</h3>";
}
?>


  




<!-- food item category -->




</div>

<!--  -->











</div>

</div>





</div>

    <!-- footer -->
    <?php


   
    require('./components/Footer.php'); 
   
    ?>

   
</body>

</html>