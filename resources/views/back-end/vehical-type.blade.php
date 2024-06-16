<div class="card card-default color-palette-box">
    @if(isPermissions('create-vehical-type'))
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add-vehical-type">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    @endif
    <div class="card-body">
        <table id="vehical-type-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Status</th>
                    @if(isPermissions('edit-vehical-type'))
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($vehical_type as $item)
                    <tr>
                        <td>{{ $item->vehical_type }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if(isPermissions('edit-vehical-type'))
                        <td>
                            <a data-vehicaltype = "{{ json_encode($item) }}" onclick = "editVehicalType(this)"><i
                                    class="far fa-edit"></i></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-vehical-type" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Vehicle Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-vehical-type" method="post" id="create-vehical-type-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_vehical_type">Vehicle Type</label>
                                <input type="text" class="form-control" id="add_vehical_type" name="add_vehical_type"
                                    placeholder="Vehicle Type">
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

<div class="modal fade" id="edit-vehical-type" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Vehicle Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-vehical-type" method="post" id="edit-vehical-type-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_vehical_type">Vehicle Type</label>
                                <input type="text" class="form-control" id="edit_vehical_type" name="edit_vehical_type"
                                    placeholder="Vehicle Type">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-select2-id="1">
                        <label for="">Status</label>
                        <select class="form-control select2 " name="is_active" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
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
