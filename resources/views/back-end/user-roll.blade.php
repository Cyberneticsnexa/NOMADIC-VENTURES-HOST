<div class="card">
    <div class="card-body">
        <div class="card card-default">
            <div class="card-body">
                <table id="user_roll_table" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>User Roll</th>
                            <th>Status</th>
                            @if (isPermissions('edit-user-roll'))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_roll as $item)
                            <tr>
                                <!-- <td>{{ $item->id }}</td> -->
                                <td>{{ $item->title }}</td>
                                @if ($item->is_active == 0)
                                    <td><span class="badge badge-danger">Inactive</span></td>
                                @else
                                    <td><span class="badge badge-success">Active</span></td>
                                @endif
                                @if (isPermissions('edit-user-roll'))
                                    <td>
                                        <a href="/edit-user-roll/{{ $item->id }}"><i class="far fa-edit"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (isPermissions('create-user-roll'))
            <div class="card card-primary mt-3">
                <div class="card-header">
                    <h5 class="m-1">Create User Roll</h5>
                </div>
                <form action="/create-user-roll" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="user_roll">User Roll</label>
                            <input type="text" class="form-control" id="user_roll" name="user_roll"
                                placeholder="User Roll">
                        </div>
                    </div>
            </div>
            <div class="card card-info mt-3">
                <div class="card-header">
                    <h5 class="m-1">Permission</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" id="user-role">
                            <thead class="table-light">
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Modules</th>
                                    <th>Select All</th>
                                    <th>Specific Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (getAllPermissions() as $key => $item)
                                    @if (Auth::user()->user_roll == 1)
                                        <tr>
                                            <!-- <th scope="row">{{ $key + 1 }}</th> -->
                                            <td>{{ $item['group'] }}</td>
                                            <td> <input type="checkbox" value="" onclick="selectAll(this)">
                                                <label>
                                                    Select All
                                                </label>
                                            </td>
                                            <td class="check-all">
                                                @foreach ($item['data'] as $data)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="permission[]" value="{{ $data['permission'] }}"
                                                            @if ($data['permission'] == 'dashboard') checked disabled @endif>
                                                        <label class="form-check-label">
                                                            {{ $data['title'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @elseif($item['is_dev_tool'] == false)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $item['group'] }}</td>
                                            <td> <input type="checkbox" value="" onclick="selectAll(this)">
                                                <label>
                                                    Select All
                                                </label>
                                            </td>
                                            <td class="cheack-all">
                                                @foreach ($item['data'] as $data)
                                                    <input class="form-check-input" type="checkbox" name="permission[]"
                                                        value="{{ $data['permission'] }}"
                                                        @if ($data['permission'] == 'dashboard') checked disabled @endif>
                                                    <label>
                                                        {{ $data['title'] }}
                                                    </label>
                                                    <br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
                </form>
            </div>
        @endif
    </div>
</div>
