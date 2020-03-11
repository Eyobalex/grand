<?php
require_once "initialize.php";
if (isset($_GET['id'])){
    $service = Service::find_by_id($_GET['id']);

    if ($service->delete()){
        $session->message("you have successfully deleted this service." , "success");
        redirect_to("account.php");
    }else{
        $session->message("something went wrong while deleted this service." , "error");
        redirect_to("account.php");
    }
}else{
    redirect_to("account.php");
}
