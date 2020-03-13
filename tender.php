<?php
require_once "initialize.php";
$tenders = Tender::find_all();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style1.css" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/stickybits.min.js"></script>
    <title>Ethiopia Business Directory, Online Ethiopia Business Advertising, Free Ethiopia business Directory, Ethiopian Local Business Listing</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/css/all.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="fonts/flaticon-3/flaticon.css">
    <link rel="stylesheet" href="fonts/flatIcon-master/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 " role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0"><img src="images/logo.png" style="width: 150PX;"></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="listings.html">Business Listing</a></li>
                <li><a href="about.html">About</a></li>
                <li class="mr-5"><a href="contact.html">Contact</a></li>
                

                <li class="ml-xl-3 login"><a href="login.html"><span class="border-left pl-xl-4"></span>Log In</a></li>

                <li><a href="register.html" class="cta"><span class="bg-primary text-white rounded">Register</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>
 
    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >
   
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <h1 style="color: white; font-weight: bolder;">Tenders</h1>
           

            
          </div>
        </div>
      </div>
    </div> 

    <div class="site-section">
      <div class="container">
        <div class="row">
    <div class="col-lg-3 " >
      <div class="jumbotron">
      
        
            <h2 style="font-weight: bolder;">Directories</h2>
          
        
       
            <nav id="sidebar">
        
          <ul class="nav nav-pills  nav-sidefeatures">
            <div class="col-lg-41">
          <li>
            <a  href="catlists.html"><span class="fa fa-fire" ></span> Agriculture</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-picture-o" ></span> Amusement Parks</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-bars"></span> Appartments</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cut" ></span> Architecture</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-money" ></span>Banking and Finance</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-music" ></span> Bars</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-book" ></span> Books & Mags</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-glass" ></span>Clubs</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-road" ></span> Commercial Places</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-desktop"></span> Computer and Internet</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-exclamation-triangle" ></span> Construction</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-book" ></span> Education</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-music" ></span>  Entertaiment</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-camera" ></span> Fashion</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-plus-square" ></span> Health & Medical</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-hospital-o" ></span> Hospitals</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-bars" ></span>   Hotels</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-heart-o" ></span> Jewellary</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-home" ></span> Lounges</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-gittip" ></span> Massage Therapy</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-medkit" ></span> Medical Spas</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-home" ></span> Musium</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-umbrella" ></span>Parks</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-leaf" ></span> Parks & Playgrounds</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-map-marker"></span> Places</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-circle-o" ></span> Playgrounds</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-print" ></span> Printing and publishing</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-building-o" ></span> RealEstates</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-home" ></span> Residential Plcaces</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-glass" ></span> Resturants</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-shopping-cart" ></span> Retail Stores</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-shopping-cart"></span> Shoppings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-flag" ></span> Sport Clubs</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-phone" ></span> Telecommunications</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-plane"></span> Travel and Tourism</a>
          </li>
        </div>
        </ul>
        
            </nav>
          
          
        
    </div>
    </div>
        <!-- Page Content  -->
        
        <div class="col-lg-9">

            <?php
            foreach ($tenders as $tender){
                $company = $tender->company();
                ?>
          <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            <div class="row">
              <div class="col-lg-3.5">
              <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 200px; height: 230px; float: left; ">
            </div>  
            
            
            <div class="text p-4" >
              <h3 class="h5 text-black"> <a href="tender-single.php?id=<?=$tender->id?>"><?= $company->company_name?></a> <li id="spacerev" ><i id="review" style="background-color: rgb(69, 236, 111); font-weight: bolder; font-style: normal; color: white;border-radius: 5px; " >Open</i> </li> </h3>
              <i  id="review"  style="padding-bottom: 3px; border-color: darkblue; background-color: rgb(246, 246, 246); font-weight: bolder; font-style: normal; color: rgb(71, 71, 71);border-radius: 5px; " ><?= $company->category()->category?></i> </li>
            
             <ul style="font-family: Arial, Helvetica, sans-serif; font-size: small; padding-top: 10px;">
               <li><span style=" padding-right: 2px; color: red;" class="fa fa-calendar" ></span> Ref no:-<?= $tender->ref_no?></li>
               <li><span style="padding-right: 2px; color: red;" class="fa fa-calendar" ></span>Published on:-<?=$tender->published_on?><i style="color: rgb(24, 148, 24); font-weight: bolder;"> (1 hour ago)</i></li>
               <li><span style="padding-right: 2px; color: red;" class="fa fa-calendar" ></span>Notice Type:-<?=$tender->notice_type?></li>
               <li><span style="padding-right: 2px; color: red;" class="fa fa-calendar" ></span>bid document price:-<?= $tender->price?></li>
              </ul>
           
              <div style="font-size: medium; " class="row" >
              <div class="fa fa-location-arrow "style="margin-right: 15px"> <?= $company->city . ", " . $company->country?> </div> <div class="fa fa-calendar" style=" margin-right: 15px">Posted on:- <i style="font-weight: bolder; color:red;" >1 hour ago</i></div> <div class="fa fa-clock">Remaing time:-<i style="color: red; font-weight: bolder;"> 5 days & 7 Hours</i> </div>
              </div> 
            </div>
         
          </div>
          </div>
          <br/>

            <?php } ?>

          </div>
          </div>
          
        
          

  
      <div class="col-12 mt-5 text-center">
        <div class="custom-pagination">
          <span>1</span>
          <a href="#">2</a>
          <a href="#">3</a>
          <span class="more-page">...</span>
          <a href="#">10</a>
        </div>
      </div>
        </div>
        </div>
      
        </div>
      </div>
    
    </div>

    </div>
    
  

    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <h2 class="footer-heading mb-4">About</h2>
                <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
              </div>
              
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Navigations</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Business Listing</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
              All rights reserved |&copy; 2015 GRAND BUSINESS ONLINE BUSINESS DIRECTORY.   
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/rangeslider.min.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>