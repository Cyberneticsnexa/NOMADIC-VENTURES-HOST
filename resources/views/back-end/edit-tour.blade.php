<div class="card">
    <div class="card-body">
        <div class="card card-primary">
            <form action="/update-tour/{{ $tour->id }}" method="post" id="edit-tour-form"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" class="form-control" value="{{ $tour->guest_name }}"
                                    id="guest_name" name="guest_name" placeholder="Guest Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="country">Country</label>
                                <select class="form-control select2 " name="country" style="width: 100%;"
                                    data-select2-id="1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($country as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $tour->country == $item->id ? 'selected' : '' }}>
                                            {{ $item->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="no_of_visiter">No of Packs</label>
                                <input type="number" class="form-control" id="no_of_visiter" min="1"
                                    value="{{ $tour->no_of_visiter }}" name="no_of_visiter" placeholder="No of Packs">
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="3">
                                <label for="agent">Agent</label>
                                <select class="form-control select2 " name="agent" style="width: 100%;"
                                    data-select2-id="3" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($agent as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $tour->agent == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="arrivel_date">Arrival Date</label>
                                <input type="date" class="form-control" id="arrivel_date" name="arrivel_date" onchange="setDepartureDate(this)"
                                    value="{{ $tour->arrivel_date }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xm-12">
                            <div class="form-group">
                                <label for="departure_date">Departure Date</label>
                                <input type="date" class="form-control" id="departure_date" name="departure_date"
                                    value="{{ $tour->departure_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary float-right" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
@php
    $arrival_date = \Carbon\Carbon::parse($tour->arrival_date);
    $departure_date = \Carbon\Carbon::parse($tour->departure_date);
    $day_difference = $departure_date->diffInDays($arrival_date);
@endphp
<script>
    var day_difference = {{ $day_difference }};
</script>
