<?php
require_once "initialize.php";
$error = [];
if (isset($_POST['signup'])){
    $user = new User($_POST['user']);
    if($authController->signup($user)){
        $session->message("You have successfully registered. We have sent an email with your password and verification code. You can login after you verify your account.", "success");
        redirect_to('login.php');
    }else{
        $error['signup'] = "Something went wrong with your registration. Make sure you enter a valid email address.";
    }
}
?>


<?php require_once "header.php"?>
    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >
   
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            <h1 style="color: white; font-weight: bolder;">Sign Up</h1>
            
            
           

            
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">

                    <h2 class="mb-5 text-black">Register</h2>
                    <h5 class="text-danger"> <?= isset($error['signup']) ? $error['signup'] : '' ?>  </h5>

                    <form action="" method="post" class="p-5 bg-white">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="firstname">FirstName</label>
                                <input value="<?= isset($user->first_name) ? $user->first_name : ''?>"  type="text" id="firstname" name="user[first_name]" class="form-control <?=(isset($user->errors['first_name'])) ? 'is-invalid' : '' ?>">
                                <?php if (isset($user->errors['first_name']) ){?>
                                    <small class="text-danger"><?= $user->errors['first_name'] ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="lastname">LastName</label>
                                <input value="<?= isset($user->last_name) ? $user->last_name : ''?>"  type="text" id="lastname" name="user[last_name]" class="form-control <?=(isset($user->errors['last_name'])) ? 'is-invalid' : '' ?>">
                                <?php if (isset($user->errors['last_name']) ){?>
                                    <small class="text-danger"><?= $user->errors['last_name'] ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input value="<?= isset($user->user_mail) ? $user->user_mail : ''?>"  type="email" id="email" name="user[user_mail]" class="form-control <?=(isset($user->errors['email'])) ? 'is-invalid' : '' ?>">
                                <?php if (isset($user->errors['email']) ){?>
                                    <small class="text-danger"><?= $user->errors['email'] ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="contact">Phone Number</label>
                                <div class="row">
                                    <img class="col-md-2" src="images/icon.jpg" height="45">
                                    <input value="<?= isset($user->phone_number) ? $user->phone_number : ''?>"  type="text" id="contact" name="user[phone_number]" class="form-control col-md-10 <?=(isset($user->errors['phone_number'])) ? 'is-invalid' : '' ?>">
                                    <?php if (isset($user->errors['phone_number']) ){?>
                                        <small class="text-danger"><?= $user->errors['phone_number'] ?></small>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-12">
                                <p>Have an account? <a href="login.php">Log In</a></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign Up" name="signup" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
<?php require_once "footer.php";