
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/gallery.css?v=8">
<link rel="stylesheet" href="./styles/style.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



<link rel="stylesheet" href="./styles/admin/admin.css">
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Gallery";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin">



   
  
    



  
    
        </div>

        <div class="gallery">
 <h1>Gallery Page</h1>
 <div class="main" id="GalleryData">









 </div>
 </div>


 <!-- full screen -->


 <div class="full" id="full">
<div class="blur">
</div>
<div class="close1"  title="close" onclick="closeMenu()">
x
</div>

<div class="mainDiv">
  

<div class="swiper mySwiper" id="mySwiper1">
    <div class="swiper-wrapper" id="swiperItemAdd">
      


      
  
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>



      
       



          
   
    </div>


</div>




    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>

const OpenInLargeView=(item)=>{
    document.getElementById('full').style.display="block";
    
}
const closeMenu=()=>{

    document.getElementById('full').style.display="none";
}
  var swiper = new Swiper(".mySwiper", {
   
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>



    <script type="module"> 
// GalleryData

import data from './data/Gallery.js';
data.map((item,index)=>{
document.getElementById('swiperItemAdd').innerHTML+=`<div class="swiper-slide">
      <div class="inner">
           <div class="imageSection">
           <img src="${item.ImagePath}" alt="img" layout="fill"/>
           </div>
          <div class="ps">
          ${item.title}
          </div>
            </div>


      </div>`;

    document.getElementById('GalleryData').innerHTML+=`
    <div class="card" >
 <div class="fulls">
 <div class="cont" title="Full Screen" onclick='OpenInLargeView("${index}")'>
 <svg stroke="currentColor" class="iconsFull" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="Gallery_iconsFull___KmPX" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z" ></path></svg>
</div>
 
 </div>
 <div class="imgs">
 <img src="${item.ImagePath}" alt="img1" layout="fill" priority="true"/>
 </div>
 <div class="data">
 ${item.title}
 </div>
 </div>
    `;

})
       
    </script>

   
</body>

</html>