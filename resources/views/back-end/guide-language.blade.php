<div class="card card-default color-palette-box">
    @if (isPermissions('create-guide-language'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-guide-language">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="guide-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Language</th>

                    <th>Status</th>
                    @if (isPermissions('edit-guide-language'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($guide_language as $item)
                    <tr>
                        <td>{{ $item->language }}</td>

                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-guide-language'))
                            <td>
                                <a data-language = "{{ json_encode($item) }}" onclick = "editLanguage(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-guide-language" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Guide Language</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-guide-language" method="post" id="create-guide-language-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_language">Language</label>
                                <input type="text" class="form-control" id="add_language"
                                    name="add_language" placeholder="Language">
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

<div class="modal fade" id="edit-languages" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Language</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-guide-language" method="post" id="edit-guide-language-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_language">Language</label>
                                <input type="text" class="form-control" id="edit_language"
                                    name="edit_language" placeholder="Language">
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
