<?php
require_once "initialize.php";
if (isset($_GET['id'])){
    $product = Product::find_by_id($_GET['id']);

    $productImage= $product->photo();

    $productImage->destroy();
    $productImage->delete();

    if ($product->delete()){
        $session->message("you have successfully deleted this product." , "success");
        redirect_to("account.php");
    }else{
        $session->message("something went wrong while deleted this product." , "error");
        redirect_to("account.php");
    }
}else{
    redirect_to("account.php");
}
