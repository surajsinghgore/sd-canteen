<!-- manage comments api-->

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require('../modules/HeadTag.php'); ?>
<link rel="stylesheet" href="../styles/admin/admin.css?v=2">
<link rel="stylesheet" href="../styles/admin/managecomments.css?v=2">
<script>
    window.document.title = "SD CANTEEN | MANAGE COMMENTS";
</script>

<body>

    <?php

    if (isset($toast_status)) {

        if ($toast_status == 'true') {
            require('../components/Toast.php');
        }
    }

    ?>
    <div class="admin">


        <!-- left side bar import -->
        <?php require('../components/LeftAdminHeader.php'); ?>

        <!-- right top header -->
        <div class="rightsidebar">
            <?php $AdminTopHeaderTitle="Manage Toxic Comments";require('../components/AdminTopHeader.php'); ?>


            <!-- manage comments -->
            <div class="mainComments">
   <?php 
   
   require('../middleware/ConnectToDatabase.php');

$fetchCommentsRes=mysqli_query($connection,'select*from commentreports');
$CommentCount=mysqli_num_rows($fetchCommentsRes);
if ($CommentCount> 0) {

    while ($Comment = mysqli_fetch_array($fetchCommentsRes)) {
?>
        <div class="section">
        <h3>Number Of Reports : <span> <?php echo $Comment['numberofreport']; ?></span></h3>
          <div class="comment">
         <?php echo $Comment['message']; ?>
          </div>
     
          <div class="options">
          <div class="div1"> <button title="Really Toxic ?" onclick='toxicCommentFunction(" <?php echo $Comment['id']; ?>","<?php echo $Comment['commentId']; ?>")'>Toxic</button>  </div>
          <div class="div2">
        <button  title="Really Not Toxic " onclick='notToxicCommentFunction("<?php echo $Comment['id']; ?>","<?php echo $Comment['commentId']; ?>")'>Not Toxic</button>
          </div>
          </div>
          </div>
   <?php }
}

else{
?>
<h1>No Comments Reported Yet</h1>
<?php }
   ?>
     
           
  

     
 
   


     </div>

        </div>

    </div>

<script>


function toxicCommentFunction(id,commentId){
 
    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/managecomments.php", //your page
                data: {
                    id: id,
                    commentId:commentId,
                    toxic: 'toxic',
               
                },
                // return data
                success: function(res) {
            document.location.reload();
                }})
}



function notToxicCommentFunction(id,commentId){

    $.ajax({
                type: "POST", //type of method
                url: "http://localhost/sd-canteen/api/managecomments.php", //your page
                data: {
                    id: id,
                    commentId:commentId,
                    notoxic: 'notoxic',
               
                },
                // return data
                success: function(res) {
            document.location.reload();
                }})
}


</script>

        <!-- ajax added -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>