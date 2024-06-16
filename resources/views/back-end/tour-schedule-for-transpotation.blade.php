<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="tour-schedule-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Tour Number</th>
                    <th>Guest Name</th>
                    <th>Country</th>
                    <th>Nationality</th>
                    <th>No of Packs</th>
                    <th>Date</th>
                    <th>Guide</th>
                    <th>Vehical</th>
                    <th>Driver</th>
                    <th>Special Requirement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tour_schedule->tourScheduleDetails as $item)
                    <tr>
                        <td>{{ $tour_schedule->tour_number }}</td>
                        <td>{{ $tour_schedule->guest_name }}</td>
                        <td>{{ $tour_schedule->CountryDetails->country_name }}</td>
                        <td>{{ $tour_schedule->CountryDetails->nationality }}</td>
                        <td>{{ $tour_schedule->no_of_visiter }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            @if ($item->guide == null)
                                <span class="badge badge-secondary">Not Assign</span>
                            @else
                                {{ $item->GuideDetails->full_name }}
                            @endif
                        </td>
                        <td>
                            @if ($item->vehical == null)
                                <span class="badge badge-secondary">Not Assign</span>
                            @else
                                {{ $item->VehicalDetails->vehical_model }} - {{ $item->VehicalDetails->vehical_no }}
                            @endif
                        </td>
                        <td>
                            @if ($item->driver == null)
                                <span class="badge badge-secondary">Not Assign</span>
                            @else
                                {{ $item->DriverDetails->full_name }}
                            @endif
                        </td>
                        <td>
                            @if ($item->special_requirement == null)
                                <span class="badge badge-secondary">Not Assign</span>
                            @else
                                {!! $item->special_requirement !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="register-agent-details" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agent Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/register-agent" method="post" id="register-agent-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_name">Name</label>
                                <input type="text" class="form-control" id="add_name" name="add_name"
                                    placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_email">Email</label>
                                <input type="email" class="form-control" id="add_email" name="add_email"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_contact_no">Contact No</label>
                                <input type="text" class="form-control" id="add_contact_no" name="add_contact_no"
                                    placeholder="Contact No">
                                <small id="phoneError" class="text-danger"></small>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-agent" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-agent-register" method="post" id="edit-agent-register-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_name">Name</label>
                                <input type="text" class="form-control" id="edit_name" name="edit_name"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_email">Email</label>
                                <input type="text" class="form-control" id="edit_email" name="edit_email"
                                    placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_contact_no">Contact No</label>
                                <input type="text" class="form-control" id="edit_contact_no"
                                    name="edit_contact_no" placeholder="Contact No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" data-select2-id="3">
                                <label for="">Status</label>
                                <select class="form-control select2 " name="is_active" style="width: 100%;"
                                    data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
