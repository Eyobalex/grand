        <div class="modal" id="addListingModel">
            <div class="modal-dialog">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add Listing</h3>
                            <button type="button" class="close" data-dismiss="modal">&times</button>
                        </div>

                        <div class="modal-body">


                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <input id="company_name" type="text" value="" name="listing[company_name]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company_description">Description:</label>
                                <textarea name="listing[company_description]"  id="company_description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="listing[category_id]" id="category_id">
                                    <option value="0">Select a category</option>
                                    <?php foreach (Category::find_all() as $category) {?>
                                        <option value="<?= $category->id ?>" ><?= $category->category ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input id="facebook" type="text" value="" name="listing[facebook]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input id="twitter" type="text" value="" name="listing[twitter]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin:</label>
                                <input id="linkedin" type="text" value="" name="listing[linkedin]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube:</label>
                                <input id="youtube" type="text" value="" name="listing[youtube]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="map">Map:</label>
                                <input id="map" type="text" value="" name="listing[map]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input id="country" type="text" value="" name="listing[country]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input id="city" type="text" value="" name="listing[city]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="subcity">Sub City:</label>
                                <input id="subcity" type="text" value="" name="listing[subcity]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fax">Fax:</label>
                                <input id="fax" type="text" value="" name="listing[fax]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="po_box">PO Box:</label>
                                <input id="po_box" type="text" value="" name="listing[po_box]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="website">Website:</label>
                                <input id="website" type="text" value="" name="listing[website]" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="address_line_1">Address Line 1:</label>
                                <input id="address_line_1" type="text" value="" name="listing[address_line_1]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address_line_2">Address Line 2:</label>
                                <input id="address_line_2" type="text" value="" name="listing[address_line_2]" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="profilePicture">Company Logo:</label>
                                <input type="file" id="logo"  name="logo" class="form-control">
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="add-listings" class="btn btn-primary">Add Listing </button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
