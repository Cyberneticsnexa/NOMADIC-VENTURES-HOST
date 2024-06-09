<div class="card card-default color-palette-box">
    @if (isPermissions('add-country-code'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-country">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="country-code-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Country Code</th>
                    <th>Nationality</th>
                    <th>Status</th>
                    @if (isPermissions('edit-country-code'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($country_code as $item)
                    <tr>
                        <td>{{ $item->country_name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->nationality }}</td>

                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-country-code'))
                            <td>
                                <a data-country = "{{ json_encode($item) }}" onclick = "editCountry(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add-country" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Country Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-country" method="post" id="create-country-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_country_name">Country Name</label>
                                <input type="text" class="form-control" id="add_country_name"
                                    name="add_country_name" placeholder="Country Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_country_code">Country Code</label>
                                <input type="text" class="form-control" id="add_country_code" name="add_country_code"
                                    placeholder="Country Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_nationality">Nationality</label>
                                <input type="text" class="form-control" id="add_nationality" name="add_nationality"
                                    placeholder="Nationality">
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
                <h4 class="modal-title">Update Country Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-country" method="post" id="edit-country-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_country_name">Country Name</label>
                                <input type="text" class="form-control" id="edit_country_name"
                                    name="edit_country_name" placeholder="Country Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_country_code">Country Code</label>
                                <input type="text" class="form-control" id="edit_country_code"
                                    name="edit_country_code" placeholder="Country Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_nationality">Nationality</label>
                                <input type="text" class="form-control" id="edit_nationality" name="edit_nationality"
                                    placeholder="Nationality">
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
