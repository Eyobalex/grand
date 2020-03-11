<?php
require_once "initialize.php";

if (isset($_POST['reset'])){

    $email = $_POST['email'];
    $user = User::find_by_email($email);
    $result = $user->patch_update([
        'password_reset_code' => md5($email . $user->first_name),
        'password' => ''
    ]);
    if ($result !== false) {
        $session->message("We have sent a password recovery email to your email account.  ", "success");
        $authController->send_password_reset_email($user);
        redirect_to('login.php');
    }
}

?>

<?php require_once "header.php" ?>



    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Reset Password</h1>
                            <p class="mb-0">Password Reset Page</p>
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

                    <form action="" method="post" class="p-5 bg-white">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Reset Password" name="reset" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


<?php require_once "footer.php"; ?>