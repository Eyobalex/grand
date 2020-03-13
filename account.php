<?php
require_once "initialize.php";
$errors = [];
$user = null;
$authController->require_login();
$user = $session->get_logged_in_user();
$profile_pic = $user->profilePicture();
$page = 'acc';

//update password
if (isset($_POST['update-password'])){
    $old_password = $_POST['old_password'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];

    $result = $user->change_password($old_password, $user_password, $confirm_password);

    if ($result !== false){
        $session->message("You have successfully updated your password.", "success");
        redirect_to("account.php");
    }else {
        $session->message("The following errors occurred.  <br>     * " . implode('<br>     * ' , $user->errors) , "error");
        redirect_to("account.php");
    }

}
//update profile
if (isset($_POST['update-profile'])) {
    if (!isset($_FILES['profilePicture']) || $_FILES['profilePicture']['error'] != 0) {
        $args = $_POST['user'];
        $result = $user->patch_update($args);

        if ( $result !== false ) {
            $session->message("You have successfully updated your account." , "success");
            redirect_to("account.php");
        } else {
            $session->message("You haven't successfully updated your account. Try again." , "error");
            redirect_to("account.php");
        }
    }

    $pic  = new Photo();
    $pic->posted_by = $user->id;
    $pic->company_id = 0;
    $pic->product_id = 0;
    $pic->posted_for = 'profile_pic';
    $_FILES['profilePicture']['name'] = proImgName($user->user_mail, $_FILES['profilePicture']['name']);
    $pic->attach_files( $_FILES['profilePicture']);

    echo "<pre>";
    print_r($_FILES['profilePicture']);
    print_r($pic);
    echo "</pre>";

    if ($profile_pic){
        if($profile_pic->destroy()){
            $profile_pic->delete();
        }
    }
    if ($pic->save()){
        $args = $_POST['user'];
        $result = $user->patch_update($args);

        if ($result !== false){
            $session->message("You have successfully updated your account.", "success");
            redirect_to("account.php");
        }else{
            $session->message("You haven't successfully updated your account. Try again.", "error");
            redirect_to("account.php");
        }
    }else{
        $session->message("Something went wrong while trying to save your profile picture. Try again <br>" . (!empty($pic->errors)) ? implode("<br>", $pic->errors) : '', "error");
        redirect_to("account.php");
    }


}

?>



<?php
require_once "header.php";
?>
<?php
require_once "M_edit_profile.php";
require_once "M_change_password.php";
?>


    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <h1 style="color: white; font-weight: bolder;">Your Profile</h1>



                </div>
            </div>
        </div>
    </div>

    <div class="container emp-profile">
        <div class="row">
            <div class="col-12">
                <?= $session->display_session_message();?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="profile-img">
                    <img src="<?= $profile_pic ?  $profile_pic->image_path() : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"?>" alt=""/>

                </div>
            </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?= $user->full_name();?>
                        </h5>
                        <h6>
                           <?= $user->user_type?>
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Your listings</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="" data-target="#editProfileModel" data-toggle="modal" class="btn btn-outline-secondary"> Edit Profile</a>
                </div>
            </div>



            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Actions</p>
                        <a href="" data-target="#changePassword" data-toggle="modal">Change your password</a><br/>
                        <a href="" onclick="return confirm('Are you sure you want to delete your account? this action is not reversible!')">Delete your account</a><br/>
                        <a href="listing-form.php" >Add a Listing</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user->full_name();?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user->user_mail;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user->phone_number?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user->user_type?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<!--                            <div class="row">-->
                                <table class="table table-borderless">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">City</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    if (!empty($user->companies())){
                                        $i = 1;
                                        foreach ($user->companies() as $listing ){?>
                                            <tr>
                                                <th scope="row"><?=$i?></th>
                                                <td><?= $listing->company_name ?></td>
                                                <td><?= $listing->category()->category ?></td>
                                                <td><?= $listing->city?></td>
                                                <td>
                                                    <a href="listing-form.php?id=<?=$listing->id?>" title="Edit this listing" ><span class="fa fa-edit"></span></a>
                                                </td>
                                                <td>
                                                    <a href="delete_listing.php?id=<?=$listing->id?>" title="Delete this listing" onclick="return confirm('Are you sure you want to delete this listing? This action is not reversible!')"> <span class="fas fa-trash"></span></a>
                                                </td>
                                                <td>
                                                    <a href="detailed_listing.php?id=<?=$listing->id?>" title="View details" ><span class="fa fa-eye"></span></a>

                                                </td>

                                            </tr>

                                            <div class="modal fade " id="viewProductsModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        ...
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;
                                        }
                                    }?>



                                    </tbody>
                                </table>
<!--                            </div>-->

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>




<?php
require_once "footer.php";