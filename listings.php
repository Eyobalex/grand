<?php
require_once "initialize.php";
$user = null;

?>
<?php require_once "header.php"?>
    <div class="overlay  "  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >
   
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
              <form method="post">
                <div class="row align-items-center">
                  
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-5">
                    <div class="wrap-icon">
                      <span class="icon icon-building"></span>
                      <input type="text" class="form-control rounded" placeholder="Business/Company Name">
                    </div>
                    
                  </div>
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-5">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control rounded" name="" id="">
                        <option value="">Place</option>
                        <option value="">Afar</option>
                        <option value="">Addis Ababa</option>
                        <option value="">Mekelle</option>
                        <option value="">Dire Dewa</option>
                        <option value="">Adama</option>
                        <option value="">Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                  </div>
                  
                </div>
              </form>
            </div>
           

            
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
            <a  href="catlists.php"><span class="fa fa-fire" ></span> Agriculture</a>
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
          <div class=" text-center">
         <h2 style="font-weight: bolder;" >All Lists</h2> 
          
        </div>
          
          <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
              <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
              
            
            
            <div class="text p-4" >
              <h3 class="h5 text-black"><a href="listings-single.php">DES General Trading PLC</a></h3>
              <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
              <br/>
              <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
              <br/>
              <div style="font-size: medium; " class="row" >
              <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
              </div> 
            </div>
         
          </div>
        
          <br/>
        
          <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
            <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
            
          
          
          <div class="text p-4" >
            <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
            <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
            <br/>
            <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
            <br/>
            <div style="font-size: medium; " class="row" >
            <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
            </div> 
          </div>
       
        </div>
      
        <br/>
        <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
          <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
          
        
        
        <div class="text p-4" >
          <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
          <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
          <br/>
          <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
          <br/>
          <div style="font-size: medium; " class="row" >
          <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
          </div> 
        </div>
     
      </div>
    
      <br/>
      <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
        <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
        
      
      
      <div class="text p-4" >
        <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
        <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
        <br/>
        <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
        <br/>
        <div style="font-size: medium; " class="row" >
        <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
        </div> 
      </div>
   
    </div>
  
    <br/>
    <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
      <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
      
    
    
    <div class="text p-4" >
      <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
      <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
      <br/>
      <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
      <br/>
      <div style="font-size: medium; " class="row" >
      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
      </div> 
    </div>
 
  </div>

  <br/>
  <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
    
  
  
  <div class="text p-4" >
    <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
    <br/>
    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
    <br/>
    <div style="font-size: medium; " class="row" >
    <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
    </div> 
  </div>

</div>

  <br/>
  <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
    
  
  
  <div class="text p-4" >
    <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
    <br/>
    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
    <br/>
    <div style="font-size: medium; " class="row" >
    <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
    </div> 
  </div>

</div>

  <br/>
  <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white;">
            
    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
    
  
  
  <div class="text p-4" >
    <h3 class="h5 text-black"><a href="#">DES General Trading PLC</a></h3>
    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
    <br/>
    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company is manufacturer of melamine, steel wool, and aluminum utensils in Ethiopia. We also import plastic, household materials, electronic mate.......</p>
    <br/>
    <div style="font-size: medium; " class="row" >
    <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <div class="fa fa-globe"><a href="#">Visit website</a></div>
    </div> 
  </div>

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
    
  
<?php require_once "footer.php";