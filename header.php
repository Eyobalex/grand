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
    <?php if (isset($page) && $page == "acc") {?>
        <link rel="stylesheet" href="css/acc.css">
    <?php } ?>
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>


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
            <h1 class="mb-0 site-logo"><a href="index.php" class="text-white mb-0"><img src="images/logo.png" style="width: 150PX;"></a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="listings.php">Business Listing</a></li>
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