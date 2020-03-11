<?php
    require_once "initialize.php";
    if (isset($_GET['id'])){
        $listing = Listing::find_by_id($_GET['id']);
    }else{
        redirect_to('index.php');
    }


    if (isset($_POST['submit'])){
        $mail = new VerifyEmail();
        $mail->setStreamTimeoutWait(20);
        $mail->Debug= FALSE;
        $mail->setEmailFrom(EMAIL);
        $email = $_POST['review']['email'];


        if(!$mail->check($email)){
            $session->message("The email you entered does not exist. Try again.", "error");
            redirect_to('listings-single.php?id='. $_GET['id']);
        }else{

            if (Review::checkDuplicateUser($listing->id, $_POST['review']['email']) > 0){
                $session->message("You can not review the same listing more than once.", "error");
                redirect_to('listings-single.php?id='. $_GET['id']);

            }

            $args = $_POST['review'];
            $args['listing_id'] = $_GET['id'];
            $args['posted_at'] = date("d/m/Y");

            $review = new Review($args);
            if($review->save()){
                $session->message("you have successfully rated this listing", "success");
                redirect_to('listings-single.php?id='. $_GET['id']);
            }else{
                $session->message("Something went wrong. Try again.", "error");
                redirect_to('listings-single.php?id='. $_GET['id']);
            }
        }

    }

?>


<?php
    require_once "header.php";
?>

    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <h1 style="color: white; font-weight: bolder;">Business Details</h1>



                </div>
            </div>
        </div>
    </div>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?= $session->display_session_message();?>
                </div>
            </div>
        <div class="row">
          <aside>
          
            <div class="signup">
              <div  class="d-block d-md-flex listing vertical" >
              <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white; height: 460px;">
               
                   
                 
               
                  <img src="images/72.JPG" style="width: 250px;" alt="Image" class="img-fluid mb-3">
                 
               
                 <div class="product-information"> <h4 style="font-weight: bolder;">Contact Info</h4><!--/product-information--> <br><i class="fa fa-location-arrow"> <?= $listing->city?></i>,     <?= $listing->country?><br>
                     <?php if (count($listing->phoneNumbers()) > 0 ){
//                       print_r($listing->phoneNumbers());
                       foreach ( $listing->phoneNumbers() as $number){
//                           print_r($number);
                           ?>

                           <a href="tell:<?= $number->number?>"><i class="fa fa-phone" style="padding-top: 4px;"> <?= $number->number?> </i></a> <br>
                           <?php
                       }
                   }else{
                       echo "<a href=\"#\"><i class=\"fa fa-phone\" style=\"padding-top: 4px;\"> there is no phone number</i></a> <br>";
                   }
                   ?>
                     <div class="grand_social">
             <ul class="social-icons">
                 <li>
                     <a target="_blank" href="https://<?= $listing->facebook?>">
                         <i class="fa fa-facebook"></i>
                     </a>
                 </li>
                     <li>
                         <a target="_blank" href="https://<?= $listing->twitter?>">
                             <i class="fa fa-twitter"> </i>
                         </a>
                     </li>
                 <li>
                     <a target="_blank" href="">
                         <i class="fa fa-google-plus">              </i>
                     </a>
                 </li>
                     <li >
                         <a  target="_blank" href="#">
                             <i class="fa fa-pinterest">            </i>
                         </a>
                     </li>
                 <li>
                     <a target="_blank" href="https://<?= $listing->linkedin?>">
                         <i class="fa fa-linkedin">              </i>
                     </a>
                 </li>
                     <li>
                         <a target="_blank" href="#">
                             <i class="fa fa-dribbble">             </i>
                         </a>
                     </li>
             </ul>
             
             
             
             </div></div>
             
               </div>
             
            </div>
          </div>

          </aside>
         
          <section1>
            
          <div id="ratnav" style="z-index: 1; " class="signup">
              <div  class="d-block d-md-flex listing vertical">
                <div  style="margin-left: 15px; background-color: white;">
                  
                  
                  <a style="float: right; margin-right: 50px; margin-top: 25px;" href="#" class="bookmark"><span style="color: red;" class="icon-heart"></span></a>
                  <h3 contenteditable="true" style="padding-top: 25px;"><a href="listings-single.html"><?= $listing->company_name?></a></h3>
                  
                  <p style="padding-bottom: 5px;" class="mb-0">
                    <span class="fa <?= ($listing->rating()>=1)? 'fa-star' : 'fa-star-o' ?>"></span>
                    <span class="fa <?= ($listing->rating()>=2)? 'fa-star' : 'fa-star-o' ?>"></span>
                    <span class="fa <?= ($listing->rating()>=3)? 'fa-star' : 'fa-star-o' ?>"></span>
                    <span class="fa <?= ($listing->rating()>=4)? 'fa-star' : 'fa-star-o' ?>"></span>
                    <span class="fa <?= ($listing->rating()>=5)? 'fa-star' : 'fa-star-o' ?>"></span>


                    <span class="review">(<?=$listing->rating()   ?> Rating)</span>
                  </p>
                  
                     <ul  class="topside" >
                    
                    
                      <li><a href="#"><span class="fa fa-map-marker"></span> Get Direction</a></li> 
                      <li><a href="#"><span class="fa fa-phone" ></span> Call now</a></li> 
                      <li><a href="#"><span class="fa fa-envelope" ></span> Sent-email</a></li> 
                      <li>  <a href="#"><span class="fa fa-share" ></span>Share</a></li> 
                      <li>  <a href="#" data-target="#mymodel" data-toggle="modal"><span class="fa fa-comments" ></span>Leave a review</a></li> 
                      </ul>

   
                 
                </div>
                </div>
                
            </div>
          <div  class="modal" style="z-index: 2000;" id="mymodel">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h3>Insert Review</h3>
                  <button type="button" class="close" data-dismiss="modal">&times</button>
                  </div>
                   
                  <div class="modal-body">
                    <form action="listings-single.php?id=<?=$_GET['id']?>" method="post">
                      
                  
                          <div class="form-group">
                          
                           <label>Name:</label><input type="text" name="review[name]" class="form-control">
                          </div>
                        <div class="form-group">

                        <label>Email:</label><input type="text" name="review[email]" class="form-control">
                        </div>
                        <div class="form-group">

                        <div style=" padding-top: 15px;">
                              <label>Comment:</label>
                                <textarea style="width: 465px;" placeholder="comment" name="review[comment]"></textarea>
                          </div>
                        </div>
                        <div class="form-group">

                        <label>Rating:</label>
                            <br>
                            <br>
                                <div class="rating">
                                    <input type="radio" name="review[rating]" value="5" id="star1"><label for="star1"></label>
                                    <input type="radio" name="review[rating]" value="4" id="star2"><label for="star2"></label>
                                    <input type="radio" name="review[rating]" value="3" id="star3"><label for="star3"></label>
                                    <input type="radio" name="review[rating]" value="2" id="star4"><label for="star4"></label>
                                    <input type="radio" name="review[rating]" value="1" id="star5"><label for="star5"></label>
                                </div>

                        </div>
                        <div class="form-group">
                           <button   style="width: 150px; height: 30px; background-color: #53b1f0; border-radius: 3px;" type="submit" name="submit">Submit Review</button>
                        </div>
                    </form>

                  </div>


                  </div>

              </div>
           </div>

            <div class="d-block d-md-flex listing vertical">
            <div  style="margin-left: 15px; background-color: white;">
              <h4 ><span class="fa fa-bars"></span> Business Detail </h4>
              <p style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                  <?= $listing->company_description?>
              </p>


            </div>
            </div>
            <div class="row">
              
              <div class="col-lg-12">
              <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.5317151991608!2d38.73566861383485!3d9.015163593530454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85df461a3f2d%3A0x6637f10e1ad21e01!2sSoliana%20Commercial%20Center!5e0!3m2!1sen!2set!4v1582872908762!5m2!1sen!2set" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></p>
            </div>
          
            </div>

            <h4 style="text-align: center" >DES Products</h4>
                  
              <div  class="row">
             
                  
                   
          
                  <div  class="col-lg-12" style="z-index: -1;" >
                    <div  class="d-block d-md-flex listing vertical">
                    <div class="slide-one-item home-slider owl-carousel">
                      <div><img style="height: 400px;" src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                    </div>
                    </div>
                   
                  </div>
                  
              </div>
              <div class="col-lg-41" >
                <div  class="d-block d-md-flex listing vertical" >
                <div class="">
                  <h4 style=" padding-left: 11px; "> Product &amp; Services  </h4>
                  <ul>
                      <?php foreach ($listing->products() as $product) {?>

                     <li>-<?= $product->title?></li>
                      <?php } ?>
                      <?php foreach ($listing->services() as $service) {?>

                          <li>-<?= $service->title?></li>
                      <?php } ?>

                </ul>
                </div>
              </div>
            </div>
              <?php if (!empty($listing->reviews())){?>
<?php foreach ($listing->reviews() as $review) {?>

              <div class="d-block d-md-flex listing vertical">
                <div class="row">  
            
                  <div class="col-md-5 ml-2" >
                    <p><?= $review->name ?></p>
                    <p>
                    <span class="review"><?= $review->email?> </span></p>
                  </div>
                  <div class="col-md-6" >

                      <p class="mb-0">
                          <span class="fa <?= ($review->rating >=1)? 'fa-star' : 'fa-star-o' ?>"></span>
                          <span class="fa <?= ($review->rating>=2)? 'fa-star' : 'fa-star-o' ?>"></span>
                          <span class="fa <?= ($review->rating>=3)? 'fa-star' : 'fa-star-o' ?>"></span>
                          <span class="fa <?= ($review->rating>=4)? 'fa-star' : 'fa-star-o' ?>"></span>
                          <span class="fa <?= ($review->rating>=5)? 'fa-star' : 'fa-star-o' ?>"></span>


                      <span class="review pull-right"><?= $review->posted_at?></span>
                    </p>
                                
                      <p><?= $review->comment ?></p>


                  
                </div>
              </div>
                </div>
<?php } } else {?>
            <p>NO REVIEWS YET!!!!!</p>
                <?php }?>
           
            
          </section1>
          
          <section>
            
            <div class="d-block d-md-flex listing vertical">
        
             <?php include_once "directories.php"?>
            
            </div>
          
    
          </section>

      </div>
     
        <div style="margin-bottom: 50px;" class="container">
          
          
          <div class="row">
            <div class="col-12">
              <h3 class="h3 mb-3 text-black">Related Listings</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-12  block-13">
              <div class="owl-carousel nonloop-block-13">
                
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                    <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
              
                
            </div>
  
  
          </div>
        </div>
      </div>
  
      </div>
      
     <?php require_once "footer.php";