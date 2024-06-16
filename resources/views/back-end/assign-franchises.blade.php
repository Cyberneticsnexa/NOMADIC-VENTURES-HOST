<div class="card">
    <div class="card-header">
        <h4>{{ $tour_schedule->tour_number }}</h4>
    </div>
    <div class="card-body">
        <div class="card card-primary">
            <form action="/update-tour-franchise/{{ $tour_schedule->id }}" method="post" id="create-tour-form"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="mt-2">Guide</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="1">
                                        <label for="guide">Guiding Language</label>
                                        <select class="form-control select2 " style="width: 100%;"
                                            data-select2-id="1" aria-hidden="true" onchange="getGuide(this)">
                                            <option value="">No Select</option>
                                            @foreach ($guide_language as $item)
                                                <option value="{{ $item->id }}">{{ $item->language }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="2">
                                        <label for="guide">Guide</label>
                                        <select class="form-control select2" name="guide" style="width: 100%;" data-select2-id="2" aria-hidden="true">
                                            <option value="">No Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="mt-2">Vehical</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="3">
                                        <label for="vehical">Vehical Type</label>
                                        <select class="form-control select2 " style="width: 100%;"
                                            data-select2-id="3" aria-hidden="true" onchange="getVehical(this)">
                                            <option value="">No Select</option>
                                            @foreach ($vehical_type as $item)
                                                <option value="{{ $item->id }}">{{ $item->vehical_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="4">
                                        <label for="vehical">Vehical</label>
                                        <select class="form-control select2 " name="vehical" style="width: 100%;"
                                            data-select2-id="4" aria-hidden="true">
                                            <option value="">No Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="mt-2">Driver</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="5">
                                        <label for="driver">Driver</label>
                                        <select class="form-control select2 " name="driver" style="width: 100%;"
                                            data-select2-id="5" aria-hidden="true">
                                            <option value="">No Select</option>
                                            @foreach ($driver as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $tour_schedule->driver == $item->id ? 'selected' : '' }}>
                                                    {{ $item->short_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="mt-2">Hotel</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="6">
                                        <label for="hotel">City</label>
                                        <select class="form-control select2 " onchange="getHotels(this)" style="width: 100%;"
                                            data-select2-id="6" aria-hidden="true">
                                            <option value="">No Select</option>
                                            @foreach ($hotel_city as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->city }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group" data-select2-id="7">
                                        <label for="hotel">Hotel</label>
                                        <select class="form-control select2 " onchange="getRooms(this)" name="hotel" style="width: 100%;"
                                            data-select2-id="7" aria-hidden="true">
                                            <option value="">No Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
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
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="mt-2">Special Note</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-xm-12">
                                    <label for="special_requirement">Special Requirement</label>
                                    <textarea id="summernote" style="display: none;" name="special_requirement">
                                        {{-- {{ $tour_schedule->special_requirement }} --}}
                                    </textarea>
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
<script>
     var basis = <?php echo json_encode($basis); ?>;
</script>
