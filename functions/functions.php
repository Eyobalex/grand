<?php

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function logoImgName($listingName, $filename){
    $ext =  explode('.', $filename)[1];
    $ln = str_replace(' ', '_', $listingName);
    $fln = str_replace('.', '', $ln);
    return $fln."_logo.".$ext;
}
function proImgName($email, $filename){
    $ext =  explode('.', $filename)[1];
    $ln = str_replace(' ', '_', $email);
    $fln = str_replace('.', '', $ln);
    return $fln."_pp.".$ext;
}

function productImgName($companyName, $productName, $filename){
    $ext =  explode('.', $filename)[1];
    $ln = str_replace(' ', '_', $productName);
    $ln2 = str_replace(' ', '_', $companyName);
    $fln = str_replace('.', '', $ln);
    $fln2 = str_replace('.', '', $ln2);
    return $fln2."_".$fln."_pi.".$ext;
}

function sth($listing_id, $email ){
    $sql = "select count(*) from review where listing_id='{$listing_id}' and email='{$email}'";

}