<div class="card card-default color-palette-box">
    @if (isPermissions('create-vehical'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-vehical">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="vehical-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Vehicle No</th>
                    <th>Status</th>
                    @if (isPermissions('edit-vehical'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($vehical as $item)
                    <tr>
                        <td>{{ $item->vehical_model }}</td>
                        <td>{{ $item->VehicalTypeDetails->vehical_type }}</td>
                        <td>{{ $item->vehical_no }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-vehical'))
                            <td>
                                <a data-vehical = "{{ json_encode($item) }}" onclick = "editVehical(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-vehical" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Vehical</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-vehical" method="post" id="create-vehical-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_vehical_model">Vehical Model</label>
                                <input type="text" class="form-control" id="add_vehical_model"
                                    name="add_vehical_model" placeholder="Vehical Model">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_vehical_no">Vehical No</label>
                                <input type="text" class="form-control" id="add_vehical_no" name="add_vehical_no"
                                    placeholder="Vehical No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-select2-id="1">
                        <label for="">Type</label>
                        <select class="form-control select2 " name="vehical_type" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($vehical_type as $item)
                                <option value="{{ $item->id }}">{{ $item->vehical_type }}</option>
                            @endforeach
                        </select>
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

<div class="modal fade" id="edit-vehical" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Vehical</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-vehical" method="post" id="edit-vehical-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_vehical_model">Vehical Model</label>
                                <input type="text" class="form-control" id="edit_vehical_model"
                                    name="edit_vehical_model" placeholder="Vehical Model">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_vehical_no">Vehical No</label>
                                <input type="text" class="form-control" id="edit_vehical_no"
                                    name="edit_vehical_no" placeholder="Vehical No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-select2-id="2">
                        <label for="">Type</label>
                        <select class="form-control select2 " name="edit_vehical_type" style="width: 100%;"
                            data-select2-id="2" tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($vehical_type as $item)
                                <option value="{{ $item->id }}">{{ $item->vehical_type }}</option>
                            @endforeach
                        </select>
                    </div>
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
