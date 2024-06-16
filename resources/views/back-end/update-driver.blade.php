<div class="card">
    <div class="card-body">
        <div class="card card-primary">
            <form action="/update-driver/{{$driver_details->id}}" method="post" id="update-driver-form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" value="{{$driver_details->full_name}}" id="full_name" name="full_name"
                                    placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="nic_no">NIC No</label>
                                <input type="text" class="form-control" value="{{$driver_details->nic_no}}"  id="nic_no" name="nic_no"
                                    placeholder="NIC">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" value="{{ date('m/d/Y', strtotime($driver_details->date_of_birth)) }}" class="form-control datetimepicker-input" id="date_of_birth" name="date_of_birth" data-target="#reservationdate" data-listener-added_669b169d="true">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" value="{{$driver_details->contact_no}}"  id="contact_no" name="contact_no"
                                    placeholder="Contact No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="licence_no">Driving Licence No</label>
                                <input type="text" class="form-control" value="{{$driver_details->licence_no}}"  id="licence_no" name="licence_no"
                                    placeholder="Driving Licence No">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Status</label>
                                <select class="form-control select2 " name="is_active" style="width: 100%;" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1" {{ $driver_details->is_active == 1 ? 'selected' : '' }}>Active</option>ෆ
                                    <option value="0" {{ $driver_details->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-xm-6">
                            <div class="row">
                                <div class="col-sm-6 col-xm-12">
                                    <label for="licence_front">Licence Front</label>
                                </div>
                                <div class="col-md-12 div-12 image_input">
                                    <input type="file" id="licence_front" accept="image/*" name="licence_front">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xm-6 mt-3">
                            <div class="col-md-12" id="selectedBanner">
                                <img style="width: 150px;border-radius:8%"  src="{{getUploadImage( $driver_details->LicenceImages->front_image_name, 'licence/front')}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-3 col-xm-6">
                            <div class="row">
                                <div class="col-sm-6 col-xm-12">
                                    <label for="licence_back">Licence Back</label>
                                </div>
                                <div class="col-md-12 div-12 image_input">
                                    <input type="file" accept="image/*" id="licence_back" name="licence_back">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xm-6 mt-3">
                            <div class="col-md-12" id="selectedBanner">
                                <img style="width: 150px;border-radius:8%"  src="{{getUploadImage( $driver_details->LicenceImages->back_image_name, 'licence/back')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{$driver_details->address}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" id="update_driver_btn" class="btn btn-primary float-right" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
