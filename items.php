
<!DOCTYPE html>
<html lang="en">
<?php require('./modules/clientHeadTag.php'); ?>



<link rel="stylesheet" href="./styles/client/items.css?v=4">

<link rel="stylesheet" href="./styles/admin/admin.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
    .starRatingBox{
        width:80px;
display: flex;
color: white;
height: 35px;
padding-top: 6px;
justify-content: center;
border-radius:5px;
        background-color: #388e3c;
    }
    
    .checked{
        margin-left: 8%;
        font-size:17px;
        margin-top: 3%;
        color: white;

      }
</style>
<script>
    // prevent reload post request
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
    window.document.title = "SD CANTEEN | Items Page";
</script>

<body>
 





        <!-- header -->
        <?php require('./components/Header.php'); ?>


        <div>
    <div class="admin">



 
    



  
    
        </div>




        <!-- main items -->

        <div class="searchSection">


            <div class="topSection">
            <div class="left">

            <!-- <div class={(data[0].FoodName)?style.mainImage: 
                (  data[0].CoffeeName)?style.mainCoffeeImage: 
                  (data[0].DrinkName)?style.mainDrinkImage:
                  style.mainJuiceImage}> -->
            <div class="mainImage">
          

        
              <img
                src="http://localhost:3000/_next/image?url=http%3A%2F%2Fres.cloudinary.com%2Fdnxv21hr0%2Fimage%2Fupload%2Fv1681098290%2F3cd84286d4906afca65e52adb4bd84ef2023-04-10T03-44-49.259Z-2023-01-07T13-50-00.921Z-32.jpg.jpg&w=3840&q=75"
                alt="items"
               
              />
            </div>    </div>



            <div class="right">
              <h1>
                VEGGIE BURGER
                <span
                  class="activeBtn"
                >
               
                </span>
              </h1>
             
            

              <div class="star">
                <div class="startSection">

                <div class="starRatingBox" >
                    <span>
                    4.1 
                    </span>
                    <span class="fa fa-star checked"></span>
                </div>
               

                  <h5>(2 Customer Review)</h5>
                </div>
              </div>
              <h3>₹ 40</h3>
              <div class="subSection">
                <div class="subHeading">Qty :</div>
                <div class="subData">1</div>
                <div class="subHeading">Category :</div>
                <div class="subData" style="margin-top:2px">burger</div>
              </div>
              <hr />

              <div class="filterItem">
                <h1>Select Size</h1>

                <div class="form">
                  
                      <div class="radioCard">
                        <li>
                          <label>
                            <span>
                              <input
                                type="radio"
                                name="size"
                                
                                
                                value="items"
                          
                              />
                              Large
                            </span>
                          </label>
                        </li>

                       
                      </div>
                 

                      <div class="radioCard">
                        <li>
                          <label>
                            <span>
                              <input
                                type="radio"
                                name="size"
                                
                                
                                value="items"
                          
                              />
                              Large
                            </span>
                          </label>
                        </li>

                       
                      </div>
                </div>
              </div>
              
              
              
              <div class="btnSection">
         <!-- remove cart btn -->
                
                <!-- <button
                  class="btn3"
           
                >
                  Remove From Cart
                </button> -->
     
                <button class="btn1" >
                  Add To Cart
                </button>
            

                <!-- buy now btn -->
              <button class="btn2">
                Buy Now
              </button>
              </div>
            </div>
          </div>
          <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat recusandae cupiditate, iusto quasi sit qui in error, dignissimos quis id ea provident placeat neque ipsam obcaecati? Voluptatum ut fugit fuga quod amet illo. Soluta, doloribus voluptates! Distinctio, ullam, vero sint illo ex expedita accusamus alias quibusdam cupiditate dicta voluptatibus officiis quam soluta? Facere similique expedita totam voluptate at ullam! Quos necessitatibus sed asperiores natus minima, obcaecati vitae nihil delectus amet blanditiis impedit magni atque ratione numquam minus cum nobis exercitationem consequatur dolores quod non totam eius itaque ipsam! Voluptate vitae placeat repellendus exercitationem veritatis quod sapiente eius esse ducimus totam.</div>

          <div class="reviews" id="reviews">
            <div class="heading">Rating & Reviews</div>

            <div class="box">
              <div class="top">
                <div class="avgRate">
                  <h1>


                   5 / 5
                  </h1>
                  <div class="rates">

                  <!-- star -->
                  <div class="starRatingBox" style="margin-bottom:10px;margin-left:8px">
                    <span>
                    4.1 
                    </span>
                    <span class="fa fa-star checked"></span>
                </div>
                    <p>Based On 2 rating</p>
                  </div>
                </div>

                <div class="totalStar">
                  <li>
                    <div class="headings">Quality</div>
                    <div class="progress">
                      <div
                        class="pro"
                        style="width:70%"
                      ></div>
                    </div>
                    <div class="percent">70%</div>
                  </li>
                  <li>
                    <div class="headings">Price</div>
                    <div class="progress">
                      <div
                        class="pro"
                        style="width:60%"
                      ></div>
                    </div>
                    <div class="percent">60%</div>
                  </li>
                  <li>
                    <div class="headings">Service</div>
                    <div class="progress">
                      <div
                        class="pro}
                        style="width:55%"
                      ></div>
                    </div>
                    <div class="percent">55%</div>
                  </li>
                </div>
              </div>
      <!-- filter logic -->
              <div class="filterReview">
                <div class="titles">Reviewed by 2 user</div>
                <div class="filterSection">
                  <div class="sections">
                    <h1>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg> Sort :
                    </h1>
                    <select
                      value="All Reviews"
                      
                    >
                      <option value="all">All Reviews</option>
                      <option value="latest">Latest Order</option>
                      <option value="oldest">Oldest Order</option>
                    </select>
                  </div>

                  <div class="sections">
                    <h1>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> Filter :
                    </h1>
                    <select
                      value="All star"
                  
                    >
                      <option value="all">All Star</option>
                      <option value="5">5 Star</option>
                      <option value="4.5">4.5 Star</option>
                      <option value="4">4 Star</option>
                      <option value="3.5">3.5 Star</option>
                      <option value="3">3 Star</option>
                      <option value="2.5">2.5 Star</option>
                      <option value="2">2 Star</option>
                      <option value="1.5">1.5 Star</option>
                      <option value="1">1 Star</option>
                      <option value="0.5">0.5 Star</option>
                    </select>
                  </div>
                </div>
              </div>

        
              <div class="reviewsSectionField">
                <div class="childs" >
               
                          <div class="reviewSection" >
                            <div class="topSection">
                              <div class="starSection" >
                              <div class="starRatingBox" >
                    <span style="font-size:15px;">
                    4.1 
                    </span>
                    <span class="fa fa-star checked"></span>
                </div>
                                <p></p>
                               
                              </div>
                              <div class="userDetails">
                                <h2>suraj singh</h2>
                              </div>

                              <div class="icons">
                              <svg stroke="currentColor" class="icon" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg>
                                <p>8-2-2024</p>


                                <svg class="icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="SearchBar_icon__og2Jy" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                                <p>9-14 Am</p>
                              </div>
                            </div>

                            <div class="commentStyle">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem debitis quos illum, omnis ipsa rem cum enim dolorum non impedit dicta quibusdam quam quidem ullam assumenda porro quas eaque nobis corrupti iusto velit id aliquid? Ad voluptatibus maiores assumenda necessitatibus officia aliquam libero nulla cupiditate nemo laboriosam adipisci, voluptatem voluptatum?</p>
                            </div>



                            <svg class="reportBtn" stroke="currentColor" fill="currentColor"  title="Report This Comment" stroke-width="0" viewBox="0 0 16 16" class="SearchBar_reportBtn__lu33e" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title>Report This Comment</title><path fill-rule="evenodd" d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H7l-4 4v-4H1a1 1 0 0 1-1-1V2zm1 0h14v9H6.5L4 13.5V11H1V2zm6 6h2v2H7V8zm0-5h2v4H7V3z" ></path></svg>
                            
                      

                      



                
                </div>


           <!-- no comments -->






              </div>
            </div>
          </div>
    


        </div>



    <!-- footer -->
    <?php require('./components/Footer.php'); ?>

   
</body>

</html>





    
  
