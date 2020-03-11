
<?php
    require_once "initialize.php";

    print_r($_GET);

    if (!isset($_GET['r']) && $_GET['r'] === ""){
        $session->message("The reset process has failed. Try again before logging in.", "error");
        redirect_to('login.php');
    }


    if (isset($_GET['r'])){
        $password_reset_code = $_GET['r'];
        $user = $authController->validate_reset_code($password_reset_code);

        if (isset($_POST['reset'])){
            $user->user_password = $_POST['user_password'];
            $user->confirm_password = $_POST['confirm_password'];

            $user->reset_password();
            $session->message("You have successfully reset your password.", "success");
            redirect_to('login.php');

        }
    }
    require_once "header.php"
?>



<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Reset Password</h1>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5"  data-aos="fade" >

                <h2 class="mb-5 text-black">Reset Password</h2>


                <form action="forget_password.php?r=<?= $password_reset_code ?>" method="post" class="p-5 bg-white">

<!--                    <div class="row form-group">-->

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="user_password">Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control <?= (isset($user->errors['user_password'])) ? 'is-invalid' : ''?>">
                                <small class="text-danger"><?= (isset($user->errors['user_password'])) ? $user->errors['user_password'] : ''?></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control <?= (isset($user->errors['user_password'])) ? 'is-invalid' : ''?>">
                                <small class="text-danger"><?= (isset($user->errors['user_password'])) ? $user->errors['user_password'] : ''?></small>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Reset Password" name="reset" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

<!--                    </div>-->
                </form>
            </div>

        </div>
    </div>
</div>




<?php
require_once "footer.php";