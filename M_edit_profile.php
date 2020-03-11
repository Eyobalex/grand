
<div class="modal" id="editProfileModel">
    <div class="modal-dialog">
        <form method="post" action=""enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Profile</h3>
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input id="firstName" type="text" value="<?=$user->first_name?>" name="user[first_name]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input id="lastName" type="text" value="<?=$user->last_name?>" name="user[last_name]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" type="email" value="<?=$user->user_mail?>" name="user[user_mail]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input id="phoneNumber" type="text" value="<?=$user->phone_number?>" name="user[phone_number]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="profilePicture">Profile Picture:</label>
                        <input type="file" id="profilePicture"  name="profilePicture" class="form-control">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="update-profile" class="btn btn-primary">Save changes</button>
                </div>


            </div>
        </form>
    </div>
</div>