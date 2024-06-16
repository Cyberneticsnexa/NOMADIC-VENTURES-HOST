<div class="card card-default color-palette-box">
    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title">Primary Info</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xm-12">
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>Hotel Name</b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b> <span class="ml-3">{{ $hotel_details['hotel_data']->hotel_name }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>Rate </b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b>
                                    @for ($i = 0; $i < $hotel_details['hotel_data']->rate; $i++)
                                        <span class="ml-3"><i class="fa-solid fa-star" style="color: gold"></i></span>
                                    @endfor
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>Mobile No One</b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b> <span class="ml-3">{{ $hotel_details['hotel_data']->phone_one }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>Mobile No Two</b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b> <span class="ml-3">{{ $hotel_details['hotel_data']->phone_two }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>City</b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b> <span class="ml-3">{{ $hotel_details['hotel_data']->HotelCityDetails->CityName->city }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <h5><b>Address</b></h5>
                            </div>
                            <div class="col-8">
                                <h5><b>:</b> <span class="ml-3">{{ $hotel_details['hotel_data']->address }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title">Rooms Info</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($hotel_details['room_data'] as $categoryId => $rooms)
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <h5><b>Category</b></h5>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <h5> <span class="ml-3">{{ $rooms[0]->CategoryDetails->room_category }}</span></h5>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <h5><b>Types</b></h5>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <h5>
                                <ul>
                                    @foreach ($rooms as $room)
                                        <li class="ml-3">{{ $room->RoomTypeDetails->room_type }}</li>
                                    @endforeach
                                </ul>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
