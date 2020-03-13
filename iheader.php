<?php

    if (isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];

       $category = Category::find_by_id($cat_id);
        if ($category !== false){

            if (!$listings = $category->companies($cat_id)){
                print_r($listings);
                $listings = [];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ethiopia Business Directory, Online Ethiopia Business Advertising, Free Ethiopia business Directory, Ethiopian Local Business Listing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="fonts/flaticon-3/flaticon.css">
    <link rel="stylesheet" href="fonts/flatIcon-master/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">
    <link rel="stylesheet" href="css/style.css">

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
        <div id="hom" class="row align-items-center">
            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="index.php" class="text-white mb-0"><img src="images/logo.png" style="width: 150PX;"></a></h1>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">

                        <li><a href="about.php">About</a></li>
                        <li class="mr-5"><a href="contact.php">Contact</a></li>
                        <?php if (!$session->is_logged_in()){?>

                            <li class="ml-xl-3 login"><a href="login.php"><span class="border-left pl-xl-4"></span>Log In</a></li>
                            <li><a href="register.php" class="cta"><span class="bg-primary text-white rounded">Register</span></a></li>
                        <?php }else{ ?>
                            <li><a href="account.php" class="cta"><span class="bg-outline-primary text-white rounded">Profile</span></a></li>
                            <li><a href="logout.php" class="cta"><span class="bg-secondary text-white rounded">Logout</span></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
            </div>

        </div>
        <!-- </div> -->

    </header>



    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div style="padding-bottom: 200px;" class="col-md-12">


                    <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
                        <form method="post" action="index.php">
                            <div class="row align-items-center">

                                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-5">
                                    <div class="wrap-icon">
                                        <span class="icon icon-building"></span>
                                        <input type="text" name="search_query" class="form-control rounded" placeholder="Business/Company Name">
                                    </div>

                                </div>
                                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-5">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control rounded" name="location" id="">
                                            <option value="">Place</option>
                                            <option value="afar">Afar</option>
                                            <option value="addis ababa">Addis Ababa</option>
                                            <option value="mekelle">Mekelle</option>
                                            <option value="dire dewa">Dire Dewa</option>
                                            <option value="adama">Adama</option>
                                            <option value="">Others</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                    <input type="submit" class="btn btn-primary btn-block rounded" name="search" value="Search">
                                </div>

                            </div>
                        </form>
                    </div>


                    <div style="margin-right: 80px;" class="row justify-content-center mb-4">
                        <div id="tend" class="col-lg-12 text-center">
                            <a class="fa fa-gavel"  href="tender.php"> Tenders</a>
                            <a class="fa fa-bars"  href="listings.php">  Business Listing</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>