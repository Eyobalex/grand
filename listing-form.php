<?php
require_once "initialize.php";
$authController->require_login();
$user = $session->get_logged_in_user();
if (isset($_GET['id'])){
    $listing = Listing::find_by_id($_GET['id']);
}


//add listing
if (isset($_POST['add-listings'])){

    $args = $_POST['listing'];
    $new_listing = new Listing($args);
    $new_listing->owner_id = $user->id;
    $result = $new_listing->save();

    if (isset($_POST['phone'])){
        $args =[];
        $args['number'] = $_POST['phone'];
        $args['company_id'] = $new_listing->id ?? 0;
        $phone = new PhoneNumber($args);

        if (!$phone->save()){
            $session->message("sth went wrong". implode('|' , $args), "error");
            redirect_to("account.php");
        }
    }

    if ($result !== false){
        if (isset($_FILES['logo'])){
            $logo = new Photo();
            $logo->posted_by = $user->id;
            $logo->posted_for = 'company_logo';
            $logo->company_id = $new_listing->id;
            $_FILES['logo']['name'] = logoImgName($_POST['listing']['company_name'], $_FILES['logo']['name']);
            $logo->attach_files($_FILES['logo']);

            if ($logo->save()){
                $session->message("You have successfully added a new listing", 'success');
                redirect_to('account.php');
            }else{
                $session->message("You haven't successfully uploaded a logo for your listing. Try again", 'error');
                redirect_to('account.php');
            }
        }
    }else{
        $session->message("You haven't successfully added a new listing. Try again", 'error');
        redirect_to('account.php');
    }


}

if (isset($_POST['edit-listings'])){

//    if (isset($_POST['phone'])){
//        $args =[];
//        $args['number'] = $_POST['phone'];
//        $args['company_id'] = $listing->id ?? 0;
//        $phone = new PhoneNumber($args);
//
//        if (!$phone->save()){
//            $session->message("sth went wrong". implode('|' , $args), "error");
//            redirect_to("account.php");
//        }
//    }
    $phoneNumber = array_shift($listing->phoneNumbers());
    $phoneNumber->number = $_POST['phone'];
    $phoneNumber->save();
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0){
        $old_logo = $listing->logo();
        if ($old_logo){
            $old_logo->destroy();
            $old_logo->delete();
        }

        $new_logo = new Photo();
        $new_logo->posted_by = $user->id;
        $new_logo->posted_for = 'company_logo';
        $new_logo->company_id = $listing->id;
        $_FILES['logo']['name'] = logoImgName($_POST['listing']['company_name'], $_FILES['logo']['name']);
        $new_logo->attach_files($_FILES['logo']);

        if ($new_logo->save()){ //if the logo is updated
            $listing->merge_attributes($_POST['listing']);
            $result = $listing->save();

            if ($result !== false){
                $session->message("You have successfully updated this listing.", "success");
                redirect_to("account.php");
            }else{
                $session->message("You have failed to updated this listing.", "error");
                redirect_to("account.php");
            }
        }else{// if it doesnt
            $session->message("You have failed to updated the logo of this listing.", "error");
            redirect_to("account.php");
        }

//        echo "files";
//        print_r($_FILES['logo']);

    }else{ // if logo is not uploaded then update other attributes of the listing
        $listing->merge_attributes($_POST['listing']);
        $result = $listing->save();

        if ($result !== false){
            $session->message("You have successfully updated this listing.", "success");
            redirect_to("account.php");
        }else {
            $session->message("You have failed to updated this listing." , "error");
            redirect_to("account.php");
        }

//        echo "nooo";
    }
}



?>


<?php require_once "header.php"?>
    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >
   
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            <h1 style="color: white; font-weight: bolder;"><?= isset($listing) ? 'Edit Listing' : 'Add Listing' ?></h1>
            
            
           

            
          </div>
        </div>
      </div>
    </div>
    <div class="container">

    <form method="post" class="mt-3 mb-3" action="" enctype="multipart/form-data">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2><?= isset($listing) ? 'Edit Listing' : 'Add Listing' ?></h2>
                        </div>


                        <div class="modal-body">

                     <div class="col-lg-12">
                         <div class="row">
                        <div class="col-lg-6 col-md-3">

                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <input  id="company_name" type="text" value="<?= isset($listing) ?$listing->company_name : ''?>" name="listing[company_name]" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3">
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <br/>
                                <select  name="listing[category_id]" id="category_id">
                                    <?php foreach (Category::find_all() as $category) {?>
                                        <option value="<?= $category->id ?>" <?= (isset($listing) && $category->id === $listing->category()->id) ? 'selected' : '' ?>><?= $category->category ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-3">
                            <div class="form-group">
                                <label for="company_description">Description:</label>
                                <textarea name="listing[company_description]"  id="company_description" class="form-control" cols="30" rows="10"><?= isset($listing) ?$listing->company_description : ''?></textarea>
                            </div>
                                    </div>
                            <div class="col-lg-12">
                         <div class="row">
                        <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input id="facebook" type="text" value="<?= isset($listing) ?$listing->facebook : ''?>" name="listing[facebook]" class="form-control">
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input id="twitter" type="text" value="<?= isset($listing) ?$listing->twitter : ''?>" name="listing[twitter]" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="linkedin">Linkedin:</label>
                                <input id="linkedin" type="text" value="<?= isset($listing) ?$listing->linkedin : ''?>" name="listing[linkedin]" class="form-control">
                            </div>
                     </div>
                                    </div>
                                    </div>
                         <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="youtube">Youtube:</label>
                                <input id="youtube" type="text" value="<?= isset($listing) ?$listing->youtube : ''?>" name="listing[youtube]" class="form-control">
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="map">Map:</label>
                                <input id="map" type="text" value="<?= isset($listing) ?$listing->map : ''?>" name="listing[map]" class="form-control">
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input id="country" type="text" value="<?= isset($listing) ?$listing->country : ''?>" name="listing[country]" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input id="city" type="text" value="<?= isset($listing) ?$listing->city : ''?>" name="listing[city]" class="form-control">
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="subcity">Sub City:</label>
                                <input id="subcity" type="text" value="<?= isset($listing) ?$listing->subcity : ''?>" name="listing[subcity]" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="fax">Fax:</label>
                                <input id="fax" type="text" value="<?= isset($listing) ?$listing->fax : ''?>" name="listing[fax]" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="po_box">PO Box:</label>
                                <input id="po_box" type="text" value="<?= isset($listing) ?$listing->po_box : ''?>" name="listing[po_box]" class="form-control">
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="website">Website:</label>
                                <input id="website" type="text" value="<?= isset($listing) ?$listing->website : ''?>" name="listing[website]" class="form-control">
                            </div>
                      </div>

                             <div class="col-lg-4 col-md-3">
                                 <div class="form-group">
                                     <label for="logo">Company Logo:</label>
                                     <input type="file" id="logo"  name="logo" class="form-control">
                                 </div>


                             </div>
                        </div>
                                    </div>
                                    </div>

                        <div class="modal-footer">
                            <button type="submit" name="<?= isset($listing) ? 'edit-listings' : 'add-listings' ?>" class="btn btn-primary"><?= isset($listing) ? 'Edit Listing' : 'Add Listing' ?> </button>
                        </div>


                    </div>

                </form>

                                    </div>

    <?php require_once "footer.php";