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
                    <th>Amended</th>
                    <th>Status</th>
                    {{-- <th>Confirmation Voucher</th> --}}
                    @if (isPermissions('change-tour-action') || isPermissions('view-tour-schedule-for-tour-manager') || isPermissions('edit-tour') || isPermissions('cancel-tour'))
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
    var is_permission_change_action = <?php echo isPermissions('change-tour-action') ? 'true' : 'false'; ?>;
    var is_permission_view_tour_schedule = <?php echo isPermissions('view-tour-schedule-for-tour-manager') ? 'true' : 'false'; ?>;
    var is_permission_edit = <?php echo isPermissions('edit-tour') ? 'true' : 'false'; ?>;
    var is_permission_cancel = <?php echo isPermissions('cancel-tour') ? 'true' : 'false'; ?>;
</script>
