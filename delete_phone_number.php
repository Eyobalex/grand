<?php
require_once "initialize.php";

if (isset($_GET['id']) && isset($_GET['listing_id']) ){

    $phone = PhoneNumber::find_by_id($_GET['id']);
    if ($phone->delete()){
        $session->message("You have successfully deleted the phone number", "success");
        redirect_to("detailed_listing.php?id=".$_GET['listing_id']);
    }else{
        $session->message("Something went wrong while deleting the phone number", "error");
        redirect_to("detailed_listing.php?id=".$_GET['listing_id']);
    }

}else{
    redirect_to("account.php");
}