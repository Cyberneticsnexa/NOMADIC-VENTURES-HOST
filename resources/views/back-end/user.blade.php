<div class="card card-default color-palette-box">
    @if(isPermissions('create-user'))
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add-user">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    @endif
    <div class="card-body">
        <table id="user" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Roll</th>
                    <th>Status</th>
                    @if(isPermissions('edit-user'))
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <!-- <td>{{ $item->id }}</td> -->
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->UserRollDetails->title }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if(isPermissions('edit-user'))
                        <td>
                            <a data-user = "{{ json_encode($item) }}" onclick = "editUser(this)"><i
                                    class="far fa-edit"></i></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-user" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-user" method="post" id="create-user-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" data-select2-id="22">
                                <label for="user_roll">User Roll</label>
                                <select class="form-control select2 " name="user_roll" style="width: 100%;"
                                    data-select2-id="22" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($user_roll as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 col-12">
                            <label for="image">Image</label>
                        </div>
                        <div class="col-md-12 div-12 image_input">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="" name="password"
                                    placeholder="Password">
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

<div class="modal fade" id="edit-user" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-user" method="post" id="edit-user-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="edit_email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 col-12">
                            <label for="image">Image</label>
                        </div>
                        <div class="col-md-12 div-12 image_input">
                            <input type="file" id="edit_image" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" data-select2-id="2">
                                <label for="">User Roll</label>
                                <select class="form-control select2 " name="user_roll" id="user_roll" style="width: 100%;"
                                    data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($user_roll as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
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
                    <div class="row d-none" id="password_div">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group password-required">
                                <small>
                                    <p for="password-change" class="col-form-label"><b>Reset Password ?</b></p>
                                </small>
                                <input type="checkbox" name="password-change" id="password-change">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_user_btn" class="btn btn-primary ">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
