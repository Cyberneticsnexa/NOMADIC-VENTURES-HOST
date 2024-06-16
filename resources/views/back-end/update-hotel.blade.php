<div class="card">
    <div class="card-body">
        <form action="/update-hotel/{{$hotel_details['hotel_data']->id}}" method="post" id="update-hotel-form" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">Primary Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group">
                                <label for="hotel_name">Hotel Name</label>
                                <input type="text" class="form-control" id="hotel_name" value="{{$hotel_details['hotel_data']->hotel_name}}"
                                    placeholder="Full Name" name="hotel_name">
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="22">
                                <label for="rate">Rate</label>
                                <select class="form-control select2 " name="rate" style="width: 100%;"
                                    data-select2-id="22" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1" {{$hotel_details['hotel_data']->rate == 1  ? 'selected' : ''}}>One Star</option>
                                    <option value="2" {{$hotel_details['hotel_data']->rate == 2  ? 'selected' : ''}}>Two Star</option>
                                    <option value="3" {{$hotel_details['hotel_data']->rate == 3  ? 'selected' : ''}}>Three Star</option>
                                    <option value="4" {{$hotel_details['hotel_data']->rate == 4  ? 'selected' : ''}}>Four Star</option>
                                    <option value="5" {{$hotel_details['hotel_data']->rate == 5  ? 'selected' : ''}}>Five Star</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group">
                                <label for="phone_one">Mobile Number One</label>
                                <input type="number" class="form-control" placeholder="Mobile Number" id="phone_one"
                                    value="{{$hotel_details['hotel_data']->phone_one}}" min="0" name="phone_one">
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group">
                                <label for="phone_two">Mobile Number Two</label>
                                <input type="number" class="form-control" placeholder="Mobile Number" id="phone_two"
                                    value="{{$hotel_details['hotel_data']->phone_two}}" min="0" name="phone_two">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="address" name="address" id="address" class="form-control" rows="3" placeholder="Address"
                                    data-listener-added_df30a99f="true">{{$hotel_details['hotel_data']->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="2">
                                <label for="city">City</label>
                                <select class="form-control select2 " name="city" style="width: 100%;"
                                    data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($hotel_city as $item)
                                        <option value="{{ $item->id }}" {{$hotel_details['hotel_data']->HotelCityDetails->CityName->id == $item->id  ? 'selected' : ''}}>{{ $item->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Status</label>
                                <select class="form-control select2 " name="is_active" style="width: 100%;" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1" {{ $hotel_details['hotel_data']->is_active == 1 ? 'selected' : '' }}>Active</option>ෆ
                                    <option value="0" {{ $hotel_details['hotel_data']->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title">Rooms Info</div>
                        </div>
                        <div class="col-md-1">
                            <div class="float-right">
                                <span class="btn btn-warning btn-xs" onclick="addRoomInfo()" id="add_room-info-button"><i
                                        class="fa fa-plus"></i></span>
                                <span class="btn btn-warning btn-xs ml-1" id="remove_room-info"
                                    onclick="removeRoomInfo()"><i class="fa fa-minus"></i></span>
                            </div>
                        </div>
                        <input hidden type="number" value="0" id="room-info-attempt">
                    </div>
                </div>
                <div class="card-body" id="additional-room-info">

                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Submit" class="btn btn-primary float-right">
            </div>
        </form>
    </div>
</div>
<script>
    var room_info = <?php echo json_encode($hotel_details['room_data']); ?>;
    var room_category = <?php echo json_encode($room_category); ?>;
    var room_type = <?php echo json_encode($room_type); ?>;
</script>
