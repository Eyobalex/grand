<?php
require_once "initialize.php";
$user = null;

if ($user = $session->get_logged_in_user()){

}

?>

<?php require_once "header.php"?>
  
    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >
   
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <h1 style="color: white; font-weight: bolder;">About Us</h1>
           

            
          </div>
        </div>
      </div>
    </div> 



    <div class="site-section"  data-aos="fade">
      <div class="container">
        
      
    

        <div class="row mb-5 mt-5">
          <div class="col-md-4 text-left border-primary">
            <h2 class="font-weight-light text-primary pb-3">Our Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="images/img_2.JPG" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Abel</h3>
            <p class="caption mb-3 text-primary">Founder</p>
            <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="images/img_2.JPG" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Eyob</h3>
            <p class="caption mb-3 text-primary">Founder</p>
            <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="images/img_2.JPG" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Daniel</h3>
            <p class="caption mb-3 text-primary">Lead Developer</p>
            <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="images/img_2.JPG" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Abel</h3>
            <p class="caption mb-3 text-primary">ProjectManager</p>
            <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
          </div>
        </div>

      </div>
    </div>






<?php require_once "footer.php"?>
