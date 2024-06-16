<div class="card card-default color-palette-box">
    @if (isPermissions('create-guide'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#register-guide-details">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="guide-register-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Language</th>
                    <th>Status</th>
                    @if (isPermissions('edit-guide'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($guide_register as $item)
                    <tr>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->nic }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>
                            @foreach ($item->GuideLanguage as $value)
                                <ul>
                                    <span>{{ $value->GuideLanguageName->language }}</span>

                                </ul>
                            @endforeach
                        </td>

                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-guide'))
                            <td>
                                <a data-guideReg = "{{ json_encode($item) }}" onclick = "updateGuideReg(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="register-guide-details" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Guide Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-guide" method="post" id="register-guide-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_full_name">Name</label>
                                <input type="text" class="form-control" id="add_full_name" name="add_full_name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_nic">NIC</label>
                                <input type="text" class="form-control" id="add_nic" name="add_nic"
                                    placeholder="NIC">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="add_address">Address</label>
                                <input type="text" class="form-control" id="add_address" name="add_address"
                                    placeholder="Address">
                            </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                                <label for="add_contact_no">Contact No</label>
                                <input type="text" class="form-control" id="add_contact_no"
                                    name="add_contact_no" placeholder="Contact No">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Language</label>
                                <select class="form-control select2 " multiple="multiple" name="add_language[]"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($guide_language as $item)
                                        <option value="{{ $item->id }}">{{ $item->language }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="create_guide_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-gideReg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Guide</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-guide" method="post" id="edit-guide-register-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_full_name">Name</label>
                                <input type="text" class="form-control" id="edit_full_name" name="edit_full_name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_nic">NIC</label>
                                <input type="text" class="form-control" id="edit_nic" name="edit_nic"
                                    placeholder="NIC">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_address">Address</label>
                                <input type="text" class="form-control" id="edit_address" name="edit_address"
                                    placeholder="Address">
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group">
                                <label for="edit_contact_no">Contact No</label>
                                <input type="text" class="form-control" id="edit_contact_no"
                                    name="edit_contact_no" placeholder="Contact No">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_language">Language</label>
                                <select class="form-control select2 edit_form_language_selection " multiple="multiple"
                                    name="edit_language[]" style="width: 100%;" data-select2-id="10" tabindex="-1"
                                    aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($guide_language as $item)
                                        <option value="{{ $item->id }}">{{ $item->language }}</option>
                                    @endforeach
                                </select>
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
                    <button type="submit" id="update_guide_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
