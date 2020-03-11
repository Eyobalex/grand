<?php

require_once "initialize.php";

$authController->require_login();

if (isset($_GET['id'])){
    $listing = Listing::find_by_id($_GET['id']);
}else{
    redirect_to("account.php");
}

if (isset($_GET['service_id'])){
    $service = Service::find_by_id($_GET['service_id']);


    if (isset($_POST['edit-service' ])){

        $service->title = $_POST['service']['title'];
        $service->description = $_POST['service']['description'];
        $service->metadata = $_POST['service']['title'];
        $service->meta_description = $_POST['service']['meta_description'];

        if ($service->save()){
            $session->message("you have successfully updated this service", "success");
            redirect_to("account.php");
        }else{
            $session->message("updating this service failed. try again", "error");
            redirect_to("account.php");
        }
    }


}


if (isset($_POST['add-service'])){
    $args = $_POST['service'];
    $args['metadata'] = $args['title'];
    $args['meta_description'] = $args['description'];
    $new_service = new Service($args);
    $new_service->company_id = $listing->id;
    if ($new_service->save()){

//        print_r($new_service);
        $session->message("you have successfully added a new service", "success");
        redirect_to("account.php");
    }else{
//        print_r($new_service);

        $session->message("adding a new service failed. try again", "error");
        redirect_to("account.php");
    }
}

?>
<?php require_once "header.php"?>
<div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">

                <h1 style="color: white; font-weight: bolder;"><?= isset($service) ? 'Edit Service' : 'Add Service' ?></h1>

            </div>
        </div>
    </div>
</div>


    <div class="container mt-4 mb-4">
        <h2 class="centered">            <?= isset($service) ? 'Edit Service' : 'Add Service' ?>
        </h2>
        <div class="row">
            <div class="col-md-1"></div>
    <form action="" method="post" enctype="multipart/form-data" class="col-md-8">
        <div class="form-group">
            <label for="exampleInputEmail1">Service Name</label>
            <input type="text" name="service[title]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="service[description]" class="form-control" id="exampleInputPassword1" > </textarea>
        </div>

        <button type="submit" name="<?= isset($service) ? 'edit-service' : 'add-service'?>" class="btn btn-primary"><?= isset($service) ? 'Edit Service' : 'Add Service'?></button>
    </form>
</div>
    </div>

<?php require_once "footer.php";?>