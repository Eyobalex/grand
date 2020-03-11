<?php
require_once "initialize.php";

//pagination
if (!isset($_GET['sort']) && !isset($_POST['search'])){

    $current_page = $_GET['page'] ?? 1;
    $per_page = 2;
    $total_count = Listing::count_all();

    $pagination = new Pagination($per_page, $current_page, $total_count );

    $listings = Listing::paginate($pagination->offset(), $per_page);

}
$a = "A";


//sort
if (isset($_GET['sort'])){
    $sort = $_GET['sort'];
    if( Listing::sort([ 'company_name' => $sort]) ) {
        $listings = Listing::sort([ 'company_name' => $sort]);
    }else{
        $listings = [];
    }
}


//search
if (isset($_POST['search'])){ //if search button is pressed
    $search_query = ( $_POST['search_query'] !== "" ) ? $_POST['search_query'] :   "#"; //check weather there is a search input /company name....
    $location = ( $_POST['location'] !== "") ? $_POST['location'] : "#"; //check weather there is location input
    if (! $listings = Listing::search([ //if the search result returns listings set the results to listings array
        'company_name' => $search_query,
       'city' => $location
    ])){
        $listings = []; // if not set listings array empty.
    }
}




?>

<?php

require_once "iheader.php"
?>

    <div class="site-section " style="background-color: white;">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <?= $session->display_session_message();?>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-md-9 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Add your business to Grand Business in 3 easy steps</h2>
                    <p class="color-black-opacity-5">See The Steps</p>
                </div>
            </div>
            <div class="row mb-1 align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <i class="fa fa-user" style=" margin-left: 100px; font-size: 100px;"></i>
                        <h2 class="font-size-regular">1. Claim Your Listing Account</h2>

                        <p>If you have an existing account login to have access to the listing area or claim your FREE listing account. If your business has multiple location or if you have multiple business you can able to add them using one account.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <i class="fa fa-list" style=" margin-left: 100px; font-size: 100px "></i>
                        <h2 class="font-size-regular">2. Complete your listing Profile</h2>

                        <p>Adding comprehensive information about your business helps you tell the best story about your business. You can add your business detail, photos of your product & services, services offered and list the various ways customers can reach your business.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <i class="fa fa-desktop" style="margin-left: 100px;  font-size: 100px;"></i>
                        <h2 class="font-size-regular">3. Publicize Your Listing</h2>
                        <p>Your business listing, products and services will reach thousands of potential business owners and individuals’ who visited our business directory. Your business listing will remain found in our website and throughout the glob instantly.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <img src="images/mek.jpg" style="width: 1400px; height: 100px; padding-top: 0;" alt="Image" class="img-fluid rounded">
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " >
                    <div class="jumbotron">


                       <?php require_once "directories.php"?>



                    </div>
                </div>
                <!-- Page Content  -->

                <div class="col-lg-7">
                    <div class=" text-center">
                        <h2 style="font-weight: bolder;" id="anchor">Featured Listings</h2>
                        <ul id="menu">
                            <li class="fea_key"><a href="index.php?sort=A">A</a></li>
                            <?php for( $i=0; $i < 25; $i++) {
                                $link = ++$a;
                                ?>
                                <li class="fea_key"><a href="index.php?sort=<?= $link?>"><?= $link?></a></li>
                            <?php } ?>

                        </ul>
                    </div>

                    <?php
                    if (isset($listings) && count($listings) > 0) {
                        foreach ($listings as $listing){?>
                    <div class="pt-3 pb-3" style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white" >

                        <img src="<?=$listing->logo() ?  $listing->logo()->image_path() : 'images/logo.png'?>" class="img-thumbnail rounded-circle " style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">



                        <div class="text p-4" >
                            <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php?id=<?= $listing->id?>"><?= $listing->company_name?></a></h3>
                            <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> <?= isset($listing->category()->category) ? $listing->category()->category : ''?></a></span>
                            <br/>
                            <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" ><?= substr($listing->company_description, 0, 250) ?></p>
                            <br/>
                            <div style="font-size: medium; " class="row" >
                                <div class="fa fa-location-arrow "style="margin-right: 15px"> <?= substr($listing->city,0,10) . ", " . substr($listing->country, 0, 10) ?></div> <div class="fa fa-phone" style="margin-right: 15px"><?= isset($listing->phoneNumbers()[0]->number)? $listing->phoneNumbers()[0]->number : ''?></div> <div class="fa fa-globe"><a href="https://<?= $listing->website?>">Visit website</a></div>
                            </div>
                        </div>

                    </div>

                    <br/>
    <?php
                    }
        }else{
                ?>
                        Noting to see here
                        <?php

            }

                    if (isset($pagination)){
                        echo $pagination->page_links('index.php');
                    }

      ?>
                </div>
                <div class="col-lg-2">
                    <div id="content">

                        <img src="images/ads2.jpg" alt="Image" class="img-fluid" style= "padding-bottom: 5px; border-style: groove; border-radius: 3px; height: 600px; ">
                        <img src="images/ads2.jpg" alt="Image" class="img-fluid" style="padding-bottom: 5px; border-style: groove; border-radius: 3px; height: 600px; ">
                        <img src="images/ads2.jpg" alt="Image" class="img-fluid" style=" padding-bottom: 5px; border-style: groove; border-radius: 3px; height: 600px; ">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once "footer.php";