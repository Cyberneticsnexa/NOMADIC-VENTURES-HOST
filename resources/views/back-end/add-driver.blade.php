<div class="card">
    <div class="card-body">
        <div class="card card-primary">
            <form action="/create-driver" method="post" id="create-driver-form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="full_name">Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="nic_no">NIC No</label>
                                <input type="text" class="form-control" id="nic_no" name="nic_no"
                                    placeholder="NIC">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label>Date of Birth</label>
                               <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                    placeholder="Contact No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="licence_no">Driving Licence No</label>
                                <input type="text" class="form-control" id="licence_no" name="licence_no"
                                    placeholder="Driving Licence No">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="row">
                                <div class="col-sm-6 col-xm-12">
                                    <label for="licence_front">Licence Front</label>
                                </div>
                                <div class="col-md-12 div-12 image_input">
                                    <input type="file" accept="image/*" id="licence_front" name="licence_front">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="row">
                                <div class="col-sm-6 col-xm-12">
                                    <label for="licence_back">Licence Back</label>
                                </div>
                                <div class="col-md-12 div-12 image_input">
                                    <input type="file" accept="image/*" id="licence_back" name="licence_back">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary float-right" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="profile-change-modal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product-title">Profile Image Upload
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/upload-member-profile-image" method="POST" id="profile-change-from"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="img_file">choose image</label>
                        <input type="file" class="form-control" accept="image/*" name="file" id="img_file"
                            style="padding-bottom: 36px;" required>
                    </div>
                    <div class="img-container cropper-custom">
                        <img id="canvas-image" src="">
                    </div>
                    <div id="result-row">

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="imageCrop()">Crop</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
