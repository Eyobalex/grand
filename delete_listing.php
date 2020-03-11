<?php

require_once "initialize.php";

$authController->require_login();


if (!isset($_GET['id'])){
    redirect_to('account.php');
}else{
    $listing = Listing::find_by_id($_GET['id']);


    if ($listing->delete()){
        $photo = $listing->logo();
        if ($photo){
            $photo->destroy();
            $photo->delete();
        }
        $session->message("You have successfully deleted this listing.", "success");
        redirect_to("account.php");
    }else{
        $session->message("Something went wrong. Try again.", "error");
        redirect_to("account.php");
    }
}