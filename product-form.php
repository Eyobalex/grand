<?php

require_once "initialize.php";

if (isset($_GET['id'])){
    $listing = Listing::find_by_id($_GET['id']);
}else{
    redirect_to("account.php");
}

if (isset($_GET['product_id'])){
    $product = Product::find_by_id($_GET['product_id']);


    if (isset($_POST['edit-product' ])){

        $product->title = $_POST['product']['title'];
        $product->description = $_POST['product']['description'];
        $product->metadata = $_POST['product']['title'];
        $product->meta_description = $_POST['product']['description'];

        if ($product->save()){
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){

                $oldImages= $product->photo();

                    if ($oldImages){
                        $oldImages->destroy();
                        $oldImages->delete();
                    }

                $productImage = new Photo();
                $productImage->product_id = $product->id;
                $productImage->posted_for = 'product_image';
                $productImage->posted_by = $session->get_logged_in_user()->id;
                $_FILES['image']['name'] = productImgName($listing->company_name,$product->title, $_FILES['image']['name']);
                $productImage->attach_files($_FILES['image']);
                if ($productImage->save()){
                    $session->message("you have successfully updated this product", "success");
                    redirect_to("account.php");
                }else{
                    $session->message("uploading product image failed. try again", "error");
                    redirect_to("account.php");
                }

            }
            $session->message("you have successfully updated this product", "success");
            redirect_to("account.php");
        }else{
            $session->message("updating this product failed. try again", "error");
            redirect_to("account.php");
        }
    }


}


if (isset($_POST['add-product'])){
    $args = $_POST['product'];
    $args['metadata'] = $args['title'];
    $args['meta_description'] = $args['description'];
    $new_product = new Product($args);
    $new_product->company_id = $listing->id;

    if ($new_product->save()){
        $productImage = new Photo();
        $productImage->product_id = $new_product->id;
        $productImage->posted_for = 'product_image';
        $productImage->posted_by = $session->get_logged_in_user()->id;
        $_FILES['image']['name'] = productImgName($listing->company_name,$new_product->title, $_FILES['image']['name']);
        $productImage->attach_files($_FILES['image']);
        if ($productImage->save()){
            $session->message("you have successfully added a new product", "success");
            redirect_to("account.php");
        }else {
            $session->message("uploading product image failed. try again", "error");
            redirect_to("account.php");
        }
    }else{
        $session->message("adding a new product failed. try again", "error");
        redirect_to("account.php");
    }

}

?>
<?php require_once "header.php"?>
<div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">

                <h1 style="color: white; font-weight: bolder;"><?= isset($product) ? 'Edit Product' : 'Add Product' ?></h1>

            </div>
        </div>
    </div>
</div>
    <div class="container mt-4 mb-4">
        <h2 class="centered">            <?= isset($product) ? 'Edit Product' : 'Add Product' ?>
        </h2>
        <div class="row">
            <div class="col-md-1"></div>
    <form action="" method="post" enctype="multipart/form-data" class="col-md-8">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="product[title]" class="form-control" value="<?= isset($product) ? $product->title : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="product[description]" class="form-control"  id="exampleInputPassword1" ><?= isset($product) ? $product->description : '' ?> </textarea>
        </div>

        <button type="submit" name="<?= isset($product) ? 'edit-product' : 'add-product'?>" class="btn btn-primary"><?= isset($product) ? 'Edit Product' : 'Add Product'?></button>
    </form>
</div>
    </div>

<?php require_once "footer.php";?>