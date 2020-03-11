<?php
require_once "initialize.php";
$error = [];
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $authController->log_in($email, $password);
    if ($user !== false){
        $session->message("Welcome back ". $user->first_name, "success");

        $authController->redirect_by_role($user);
    }else{
        $error['login'] = "Email / password does not match.";
    }
}
?>
<?php require_once "header.php"?>

    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


            <h1 style="color: white; font-weight: bolder;">Login</h1>




          </div>
        </div>
      </div>
    </div>


    <div class="container">

    </div>


    <div class="site-section bg-light">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <?= $session->display_session_message();?>
                </div>
            </div>
            </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade" >

                    <h2 class="mb-5 text-black">Log In</h2>

                    <h5 class="text-danger"> <?= isset($error['login']) ? $error['login'] : '' ?>  </h5>

                    <form action="" method="post" class="p-5 bg-white">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Password</label>
                                <input type="password" name="password" id="subject" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <p>No account yet? <a href="register.php">Register</a></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <p>Forget your password? <a href="reset_password.php">Reset here.</a></p>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign In" name="login" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


<?php require_once "footer.php"?>