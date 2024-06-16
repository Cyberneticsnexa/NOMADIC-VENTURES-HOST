<div class="card">
    <div class="card-body">
        <form action="/create-site-settings" method="post" enctype="multipart/form-data" id="site-settings-form">
            <div class="card card-primary mt-3">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="user_roll">Site Name</label>
                        <input type="text" class="form-control" id="site_name" name="site_name"
                            value="{{ $site_settings->site_name }}" placeholder="Site Name">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 col-xm-6">
                            <div class="col-md-12 col-12">
                                <label for="image">Logo</label>
                            </div>
                            <div class="col-md-12 div-12 image_input">
                                <input type="file" class="dropify" id="image" name="image"
                                    data-default-file="{{ getUploadImage($site_settings->logo, 'logo') }}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xm-6">
                            <div class="col-md-12 col-12">
                                <label for="image">Meta Icon</label>
                            </div>
                            <div class="col-md-12 div-12 image_input">
                                <input type="file" class="dropify" id="meta_icon" name="meta_icon"
                                    data-default-file="{{ getUploadImage($site_settings->meta_icon, 'logo') }}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xm-6">
                            <div class="col-md-12 col-12">
                                <label for="image">Login Background Image</label>
                            </div>
                            <div class="col-md-12 div-12 image_input">
                                <input type="file" class="dropify" id="login_bg_image" name="login_bg_image"
                                    data-default-file="{{ getUploadImage($site_settings->login_bg_image, 'logo') }}">
                            </div>
                        </div>

                    </div>
                    <div>
                        <!-- <h1> test</h1> -->
                        <!-- <div id="selectedBanner">

                        </div>
                          <div class="col-md-12 div-12 image_input">
                                <input type="file" id="img" name="image">
                        </div> -->

                        <!-- <h1>test</h1> -->
                    </div>

                    {{-- <div class="row">
                         <div class="col-md-3" id="selectedBanner">
                            <img style="width: 200px;border-radius:8%"  src="{{getUploadImage( $site_settings->logo, 'logo')}}" alt="">
                         </div>
                         <div class="col-md-3" id="selectedBanner">
                            <img style="width: 200px;border-radius:8%"  src="{{getUploadImage( $site_settings->logo, 'logo')}}" alt="">
                         </div>
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
