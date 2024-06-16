<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="tour-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Tour Number</th>
                    <th>Guest</th>
                    <th>Country</th>
                    <th>Nationality</th>
                    <th>Agent</th>
                    <th>No of Packs</th>
                    <th>Arrival Date</th>
                    <th>Departure Date</th>
                    <th>Tour Status</th>
                    <th>Assign</th>
                    @if (isPermissions('assign-franchise-from-transport'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script>
    var is_permission = <?php echo isPermissions('assign-franchise-from-transport') ? 'true' : 'false'; ?>;
</script>
