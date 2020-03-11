<?php
    require_once "initialize.php";
    if (isset($_GET['i'])){
        //get the validation code from the email
        $verification_code = $_GET['i'];
//        verify the user
        $user =  $authController->verify_email($verification_code);
        //if a user is returned/ verified
        if ($user !== false){
            //perform patch update => set email_verification_code '' and status to active
            $result = $user->patch_update([
                "email_verification_code" => "",
                "status" => "active"
            ]);
            if ($result === true){
                // account is activated and updated
                $session->message("You have successfully activated your account. ", "success");
                redirect_to('login.php');
            }else{
                //account is activated but failed to be saved to the database;
                //repeat action
                $authController->send_email_verification($user);
                $session->message("You haven't successfully activated your account. We have sent another verification email. ", "error");
                redirect_to('login.php');
            }

        }else{
            $session->message("We could not find a user with the verification code. We have sent another verification email.", "error");
            //validate_user() didn't return a user that has the validation code
            redirect_to('login.php');
        }
    }else{
        redirect_to('login.php');
    }