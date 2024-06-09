<div class="card card-default color-palette-box">
    @if (isPermissions('create-basis'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-basis">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="basis-code-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Short Code</th>
                    <th>Status</th>
                    @if (isPermissions('edit-country-code'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($basis as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->code }}</td>

                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-country-code'))
                            <td>
                                <a data-basis = "{{ json_encode($item) }}" onclick = "editBasis(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add-basis" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Basis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-basis" method="post" id="create-basis-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_basis_title">Title</label>
                                <input type="text" class="form-control" id="add_basis_title"
                                    name="add_basis_title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_basis_code">Code</label>
                                <input type="text" class="form-control" id="add_basis_code" name="add_basis_code"
                                    placeholder="Code">
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

<div class="modal fade" id="edit-country" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Basis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-basis" method="post" id="edit-basis-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id" id="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_basis_title">Title</label>
                                <input type="text" class="form-control" id="edit_basis_title"
                                    name="edit_basis_title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_basis_code">Code</label>
                                <input type="text" class="form-control" id="edit_basis_code"
                                    name="edit_basis_code" placeholder="Code">
                            </div>
                        </div>
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
