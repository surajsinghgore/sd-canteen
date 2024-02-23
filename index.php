<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="./styles/style.css?v=2">
<link rel="stylesheet" href="./styles/client/Home.css?v=2">

<body >
<!-- header -->
<?php require('./components/Header.php');?>





 <!-- Banner Swiper -->
 <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <!-- order food -->
      <div class="swiper-slide">  
        <div class="div1">
            <div class="imgs-section">
              <img
                src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/1_awcnfk.jpg"
                alt="img1"
              
              />
            </div>
            <div class="details">
              <h1 id="hh1">
                You can &#39;t make everyone happy. You &#39;re not pizza
              </h1>

              <button>
                <Link href="/FoodItem"> Order Food Now</Link>
              </button>
            </div>
          </div></div>

          <!-- coffee -->
      <div class="swiper-slide">
        
      <div class="div1">
            <div class="imgs-section">
              <img
                src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014251/c1_emtkwo.jpg"
                alt="img3"
               
              />
            </div>
            <div class="details">
              <h1 id="hh1">
                I don &#39;t drink coffee to wake up. I wake up to drink coffee.
              </h1>
              <button>
                <Link href="/CoffeeItem">Order Coffee Now</Link>
              </button>
            </div>
          </div>
      </div>


<!-- juice -->
      <div class="swiper-slide">
      <div class="div1">
            <div class="imgs-section">
              <img
                src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014245/j1_rgqtri.jpg"
                alt="img1"
              
              />
            </div>
            <div class="details">
              <h1 id="hh1">
                Breakfast isn &#39;t complete without quality juice.
              </h1>
              <button>
                <Link href="/JuiceItem">Order Juice Now</Link>
              </button>
            </div>
          </div>

      </div>



<!-- food -->
      <div class="swiper-slide">
      <div class="div1">
            <div class="imgs-section">
              <Image
                src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014249/2_gksqma.jpg"
                alt="img1"
              
              />
            </div>
            <div class="details">
              <h1 id="hh1">
                After a good dinner one can forgive anybody, even one &#39;s own
                relatives.
              </h1>
              <button>Order Food Now</button>
            </div>
          </div>

      </div>



      <div class="swiper-slide">

      <div class="div1">
            <div class="imgs-section">
              <img
                src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014243/d1_fplyr9.jpg"
                alt="img5"
               
              />
            </div>
            <div class="details">
              <h1 id="hh1">
                Since I had my first sip of coke, life was never the same again.
              </h1>
              <button>
                <Link href="/DrinkItem">Order Drink Now</Link>
              </button>
            </div>
          </div>

      </div>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>



<!-- we accept payments -->

      <div class="payment">
        <div class="icons">
          <div class="imgPayment">
            <img
              src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014246/p2_g5k0gk.svg"
              alt="accept"
           
            />
          </div>
        </div>
        <div class="titles">We Accept Online Payment</div>
        <div class="accept">
          <div class="img">
            <img
              src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014245/p1_pvhtmu.png"
              alt="accept"
              layout='fill'
        
            />
          </div>
        </div>
      </div>



<!-- bottom swiper -->
  <!-- Swiper -->
  <div class="bottomSwiper">
  <div class="swiper mySwiper1">
    <div class="swiper-wrapper">
        <!-- photo 1 -->
      <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/1_gwamyw.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>
      <!-- photo 2 -->
      <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/2_ws3au4.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>

        <!-- photo 3-->
        <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/3_vmdw99.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>


        <!-- photo 4 -->
        <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/4_v3h2fj.webp"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>


        <!-- photo 5 -->
        <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/5_wwh9i7.png"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>



        <!-- photo 6 -->
        <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/6_weopcm.webp"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>


       <!-- photo 7 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014807/7_vul7ru.webp"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>


       <!-- photo 8 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/8_rydkxc.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>


       <!-- photo 9 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/9_nqr95e.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>

       <!-- photo 10 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/10_aopxta.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>

       <!-- photo 11 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/11_ufuqlf.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>

       <!-- photo 12 -->
       <div class="swiper-slide">
      <div class="BottomInner">
              <div class="imageBottom">
                <img
                  src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/12_wlbp1e.jpg"
                  alt="img1"
                  
                />
              </div>
            </div>

      </div>
    </div>
    
  </div>
  </div>









  <!-- footer -->
<?php require('./components/Footer.php');?>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });


    // bottom swiper

    var swiper = new Swiper(".mySwiper1", {
      slidesPerView: 3,
      spaceBetween: -582,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });
  </script>
</body>
</html>