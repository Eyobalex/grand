<?php

require_once "initialize.php";

$authController->require_login();

if (isset($_GET['id'])){
    $listing = Listing::find_by_id($_GET['id']);
}else{
    redirect_to("account.php");
}

if (isset($_POST['edit'])){
    $pid = $_GET['pid'];
    $pn = PhoneNumber::find_by_id($pid);
    $pn->number = $_POST['number'];

    if ($pn->save()){
        $session->message("you have successfully updated the phone number.", "success");
        redirect_to("detailed_listing.php?id=".$listing->id);
    }
}

if (isset($_POST['add-phone'])){
    $pn = new PhoneNumber(['number' => $_POST['number'], 'company_id' => $listing->id]);

    if ($pn->save()){
        $session->message("you have successfully added a new phone number.", "success");
        redirect_to("detailed_listing.php?id=".$listing->id);
    }
}

?>
<?php require_once "header.php"?>
<div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">

                <h1 style="color: white; font-weight: bolder;"><?= $listing->company_name ?></h1>

            </div>
        </div>
    </div>
</div>


<div class="container mt-4 mb-4">

    <div class="row">
        <div class="col-12">
            <?= $session->display_session_message();?>
        </div>
    </div>
    <h2 class="centered"><?= $listing->company_name ?>
    </h2>
    <div class="row">
        <div class="col-md-1"></div>

        <table class="table  col-md-10">
            <tbody>
            <tr>
                <th scope="row">Company Name</th>
                <td><?=$listing->company_name ?></td>
            </tr>


            <tr>
                <th scope="row">Logo</th>
                <td>
                    <img src="<?=$listing->logo() ?  $listing->logo()->image_path() : 'images/logo.png'?>" class="img-thumbnail rounded-circle " style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
                </td>
            </tr>

            <tr>
                <th scope="row">Owner</th>
                <td><?=$listing->owner()->full_name() ?></td>
            </tr>

            <tr>
                <th scope="row">Rating</th>
                <td><?=$listing->rating() ?> </td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td><?=$listing->company_description ?></td>
            </tr>

            <tr>
                <th scope="row">Category</th>
                <td><?=$listing->category()->category ?></td>
            </tr>

            <tr>
                <th scope="row">Social Medias</th>
                <td>
                    <table class="table table-borderless col-md-10">
                        <tbody>
                        <tr>
                            <th scope="row">Facebook</th>
                            <td><?=$listing->facebook ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Youtube</th>
                            <td><?=$listing->youtube ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Linkedin</th>
                            <td><?=$listing->linkedin ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Twitter</th>
                            <td><?=$listing->twitter ?></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <th scope="row">Country</th>
                <td><?=$listing->country ?></td>
            </tr>

            <tr>
                <th scope="row">City</th>
                <td><?=$listing->city ?></td>
            </tr>

            <tr>
                <th scope="row">Subcity</th>
                <td><?=$listing->subcity ?></td>
            </tr>

            <tr>
                <th scope="row">Map</th>
                <td><?=$listing->map ?></td>
            </tr>

            <tr>
                <th scope="row">Fax</th>
                <td><?=$listing->fax ?></td>
            </tr>

            <tr>
                <th scope="row">PO Box</th>
                <td><?=$listing->po_box ?></td>
            </tr>


            <tr>
                <th scope="row">Website</th>
                <td><?=$listing->website ?></td>
            </tr>

            <tr>
                <th scope="row">Phone Numbers</th>
                <td>

                    <table class="table table-borderless col-md-10">
                        <tr>
                            <th>Actions</th>
                            <td>
                                <a title="Edit this number"
                                   class="danger"
                                   data-toggle="popover"
                                   data-content="
                                   <form action='detailed_listing.php?id=<?=$listing->id?>' method='post'>
                                        <div class='row m-3 '>
                                            <input type='text' value='' name='number' class='form-control col-md-7' />
                                            <div class='col-md-1'></div>
                                            <input type='submit' name='add-phone' class='btn btn-primary col-md-3' value='Add'/>
                                      </div>
                                   </form>"  >
                                    <span class="fa fa-plus " style="color: #ff5261">Add Phone Number </span>
                                </a>
                            </td>
                        </tr>


                        <tbody>
                        <?php
                            if (!empty($listing->phoneNumbers())){
                                foreach ($listing->phoneNumbers() as $phoneNumber){
                        ?>
                        <tr>
                            <td>
                                <?= $phoneNumber->number ?>
                                <a title="Edit this number"
                                   class="danger"
                                   data-toggle="popover"
                                   data-content="
                                   <form action='detailed_listing.php?id=<?=$listing->id?>&pid=<?=$phoneNumber->id?>' method='post'>
                                        <div class='row m-3 '>
                                            <input type='text' value='<?=$phoneNumber->number?>' name='number' class='form-control col-md-7' />
                                            <div class='col-md-1'></div>
                                            <input type='submit' name='edit' class='btn btn-primary col-md-3' value='edit'/>
                                      </div>
                                   </form>"  >
                                    <span class="fa fa-edit " style="color: #ff5261"></span>
                                </a>
                                <a href="delete_phone_number.php?id=<?=$phoneNumber->id?>&listing_id=<?=$listing->id?>" title="Delete this number"><span class="fas fa-trash"></span> </a>

                            </td>
                        </tr>
                        <?php
                                }
                            } ?>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <th scope="row">Products</th>
                <td>
                    <table class="table  col-md-10">
                            <tbody>
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <a href="product-form.php?id=<?=$listing->id?>" title="Add new product" ><span class="fa fa-plus"></span> Add new Product</a>
                                </td>
                            </tr>
                            </tbody>

                        <?php
                        if (!empty($listing->products())){
                            foreach ($listing->products() as $product){
                                ?>
                        <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td><?= $product->title ?></td>
                                </tr>
                                <th scope="row">Product Image</th>
                                <td>
                                    <img src="<?=$product->photo() ?  $product->photo()->image_path() : 'images/logo.png'?>" class="img-thumbnail " style="margin-right: 12px; margin-left: 12px; width: 180px; height: 180px; float: left; ">
                                </td>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $product->description ?></td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <a href="product-form.php?id=<?=$listing->id?>&product_id=<?= $product->id?>" title="Edit this product" ><span class="fa fa-edit"></span> Edit</a>
                                        <a href="delete-product.php?id=<?=$product->id?>" title="Edit this product" ><span class="fas fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                        </tbody>
                            <?php }} ?>


                    </table>
                </td>
            </tr>

            <tr>
                <th scope="row">Services</th>
                <td>
                    <table class="table  col-md-10">
                        <tbody>
                        <tr>
                            <th>Actions</th>
                            <td>
                                <a href="product-form.php?id=<?=$listing->id?>" title="Add new product" ><span class="fa fa-plus"></span> Add new Product</a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                        if (!empty($listing->services())){
                            foreach ($listing->services() as $service){
                                ?>
                                <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td><?= $service->title ?></td>
                                </tr>

                                <tr>
                                    <th>Description</th>
                                    <td><?= $service->description ?></td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <a href="service-form.php?id=<?=$listing->id?>&product_id=<?= $service->id?>" title="Edit this service" ><span class="fa fa-edit"></span> Edit</a>
                                        <a href="delete-service.php?id=<?=$service->id?>" title="Delete this service" ><span class="fas fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                            <?php }} ?>


                    </table>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

<?php

 require_once "footer.php"

?>
