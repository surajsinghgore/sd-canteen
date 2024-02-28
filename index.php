<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="./styles/style.css?v=11">
<link rel="stylesheet" href="./styles/client/Home.css?v=4">

<body>
    <!-- header -->
    <?php require('./components/Header.php'); ?>





        <!-- Banner Swiper -->
        <div class="swiper mySwiper" id="mySwiper">
            <div class="swiper-wrapper">
                <!-- order food -->
                <div class="swiper-slide">
                    <div class="div1">
                        <div class="imgs-section">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014248/1_awcnfk.jpg" alt="img1" />
                        </div>
                        <div class="details">
                            <h1 id="hh1">
                                You can &#39;t make everyone happy. You &#39;re not pizza
                            </h1>

                            <button>
                                <Link href="/FoodItem"> Order Food Now</Link>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- coffee -->
                <div class="swiper-slide">

                    <div class="div1">
                        <div class="imgs-section">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014251/c1_emtkwo.jpg" alt="img3" />
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
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014245/j1_rgqtri.jpg" alt="img1" />
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
                            <Image src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014249/2_gksqma.jpg" alt="img1" />
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
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014243/d1_fplyr9.jpg" alt="img5" />
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


    <!-- top trending items -->

    <!-- top rated items -->
    <div class="homeCards">
        <h1>Top 5 Trending Food Items</h1>
        
        <!-- 1 -->
        <div class="card">

            <a href="">

                <div>
                    <div class="imgMain">
                        <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
                    </div>

                    <div class="data">
                        <h4>Burger</h4>
                        <p> df f sada dasd wd dasdjbbashdgadag lorem200
                        </p>
                    </div>
                </div>

            </a>

        </div>
<!-- 2 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>

<!-- 3 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>
<!-- 4 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>
<!-- 5 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>

    </div>

    <!-- top rated items -->
    <div class="homeCards">
        <h1> Five Best Rated Foods Items</h1>
        
        <!-- 1 -->
        <div class="card">

            <a href="">

                <div>
                    <div class="imgMain">
                        <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
                    </div>

                    <div class="data">
                        <h4>Burger</h4>
                        <p> df f sada dasd wd dasdjbbashdgadag lorem200
                        </p>
                    </div>
                </div>

            </a>

        </div>
<!-- 2 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>

<!-- 3 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>
<!-- 4 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>
<!-- 5 -->
<div class="card">

<a href="">

    <div>
        <div class="imgMain">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681099430/15f0de6c774e296fa628e50e2dfbc5462023-04-10T04-03-49.384Z-2023-01-07T13-52-46.181Z-36.png.png" alt="trending items" />
        </div>

        <div class="data">
            <h4>Burger</h4>
            <p> df f sada dasd wd dasdjbbashdgadag lorem200
            </p>
        </div>
    </div>

</a>

</div>

    </div>





    <!-- fun facts -->

    <div class="f">
        <h1> FUN FACTS </h1>
    </div>

    <div class="facts">
        <div class="fact">
            <div class="icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 2h2v20H3zm7 4h7v2h-7zm0 4h7v2h-7z"></path>
                    <path d="M19 2H6v20h13c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 18H8V4h11v16z"></path>
                </svg>
            </div>
            <h5>Delicacy Of Items</h5>
            <p>
                23
            </p>
        </div>

        <div class="fact">
            <div class="icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                    <path d="M19 5v14H5V5h14m0-2H5a2 2 0 00-2 2v14a2 2 0 002 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 9c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3zm0-4c-.55 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1zm6 10H6v-1.53c0-2.5 3.97-3.58 6-3.58s6 1.08 6 3.58V18zm-9.69-2h7.38c-.69-.56-2.38-1.12-3.69-1.12s-3.01.56-3.69 1.12z"></path>
                </svg>
            </div>
            <h5>Total Visits </h5>
            <p>23</p>
        </div>

        <div class="fact">
            <div class="icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M9 18H4v-8h5v8zm6 0h-5V6h5v12zm6 0h-5V2h5v16zm1 4H3v-2h19v2z"></path>
                    </g>
                </svg>
            </div>
            <h5>Orders Placed</h5>
            <p>
                16
                
            </p>
        </div>

        <div class="fact">
            <div class="icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                    <circle cx="8.5" cy="10.5" r="1.5"></circle>
                    <circle cx="15.493" cy="10.493" r="1.493"></circle>
                    <path d="M12 18c4 0 5-4 5-4H7s1 4 5 4z"></path>
                </svg>
            </div>
            <h5> Happy clients</h5>
            <p>

                23
            </p>
        </div>
    </div>



    <!-- we accept payments -->

    <div class="payment">
        <div class="icons">
            <div class="imgPayment">
                <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014246/p2_g5k0gk.svg" alt="accept" />
            </div>
        </div>
        <div class="titles">We Accept Online Payment</div>
        <div class="accept">
            <div class="img">
                <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014245/p1_pvhtmu.png" alt="accept" layout='fill' />
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
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/1_gwamyw.jpg" alt="img1" />
                        </div>
                    </div>

                </div>
                <!-- photo 2 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/2_ws3au4.jpg" alt="img1" />
                        </div>
                    </div>

                </div>

                <!-- photo 3-->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/3_vmdw99.jpg" alt="img1" />
                        </div>
                    </div>

                </div>


                <!-- photo 4 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/4_v3h2fj.webp" alt="img1" />
                        </div>
                    </div>

                </div>


                <!-- photo 5 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/5_wwh9i7.png" alt="img1" />
                        </div>
                    </div>

                </div>



                <!-- photo 6 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/6_weopcm.webp" alt="img1" />
                        </div>
                    </div>

                </div>


                <!-- photo 7 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014807/7_vul7ru.webp" alt="img1" />
                        </div>
                    </div>

                </div>


                <!-- photo 8 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/8_rydkxc.jpg" alt="img1" />
                        </div>
                    </div>

                </div>


                <!-- photo 9 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014802/9_nqr95e.jpg" alt="img1" />
                        </div>
                    </div>

                </div>

                <!-- photo 10 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/10_aopxta.jpg" alt="img1" />
                        </div>
                    </div>

                </div>

                <!-- photo 11 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014800/11_ufuqlf.jpg" alt="img1" />
                        </div>
                    </div>

                </div>

                <!-- photo 12 -->
                <div class="swiper-slide">
                    <div class="BottomInner">
                        <div class="imageBottom">
                            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014801/12_wlbp1e.jpg" alt="img1" />
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>









    <!-- footer -->
    <?php require('./components/Footer.php'); ?>


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