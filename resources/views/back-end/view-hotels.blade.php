<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="hotels-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile No One</th>
                    <th>Mobile No Two</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Rate</th>
                    <th>Status</th>
                    @if (isPermissions('edit-hotel'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels_details as $item)
                    <tr>
                        <td>{{ $item->hotel_name }}</td>
                        <td>{{ $item->phone_one }}</td>
                        <td>{{ $item->phone_two }}</td>
                        <td>{{ $item->HotelCityDetails->CityName->city }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            @for ($i = 0; $i < $item->rate; $i++)
                                <span class="ml-3"><i class="fa-solid fa-star" style="color: gold"></i></span>
                            @endfor
                        </td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        <td>
                            <a target="_blank" class="ml-3" href="/view-hotel/{{ $item->id }}"><i
                                    class="far fa-eye"></i></a>
                            @if (isPermissions('edit-hotel'))
                                <a class="ml-3" href="/edit-hotel/{{ $item->id }}"><i class="far fa-edit"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
