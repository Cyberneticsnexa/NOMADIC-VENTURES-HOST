<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="vehical-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NIC No</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Driving Licence No</th>
                    <th>Licence Front</th>
                    <th>Licence Back</th>
                    <th>Status</th>
                    @if (isPermissions('edit-driver'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($driver as $item)
                    <tr>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->nic_no }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->licence_no }}</td>
                        <td>
                            <a target="_blank" href="{{getUploadImage( $item->LicenceImages->front_image_name, 'licence/front' )}}"><img style="width: 40px;" src="{{getUploadImage( $item->LicenceImages->front_image_name, 'licence/front' )}}" alt=""></a>
                        </td>
                        <td>
                            <a target="_blank" href="{{getUploadImage( $item->LicenceImages->back_image_name, 'licence/back' )}}"><img style="width: 40px;" src="{{getUploadImage( $item->LicenceImages->back_image_name, 'licence/back' )}}" alt=""></a>
                        </td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('edit-driver'))
                            <td>
                                <a target="blank" href="/edit-driver/{{$item->id}}"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
