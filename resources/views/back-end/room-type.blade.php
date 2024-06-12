<div class="card card-default color-palette-box">
    @if (isPermissions('create-room-type'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-room-type">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="room-type-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Short code</th>
                    <th>Status</th>
                    @if (isPermissions('edit-room-type'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($room_type as $item)
                    <tr>
                        <td>{{ $item->room_type }}</td>
                        <td>{{ $item->short_code }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-room-type'))
                            <td>
                                <a data-roomtype = "{{ json_encode($item) }}" onclick = "editRoomType(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-room-type" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Room Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-room-type" method="post" id="create-room-type-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_room_type">Room Type</label>
                                <input type="text" class="form-control" id="add_room_type" name="add_room_type"
                                    placeholder="Room Type">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_room_type">Short Code</label>
                                <input type="text" class="form-control" id="add_short_code" name="add_short_code"
                                    placeholder="Short Code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="create_room_type_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-room-type" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Room Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-room-type" method="post" id="edit-room-type-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_room_type">Room Type</label>
                                <input type="text" class="form-control" id="edit_room_type" name="edit_room_type"
                                    placeholder="Room Type">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_room_type">Short Code</label>
                                <input type="text" class="form-control" id="edit_short_code" name="edit_short_code"
                                    placeholder="Short Code">
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
                    <button type="submit" id="update_room_type_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
