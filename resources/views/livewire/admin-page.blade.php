<div>
    @if(request()->routeIS('admin-dashboard'))
        @include('admin-tabs.dashboard')
    @endif

    @if(request()->routeIS('admin-room'))
        @include('admin-tabs.room-management')
    @endif

    @if(request()->routeIS('admin-student'))
        @include('admin-tabs.student-management')
    @endif

    @if(request()->routeIS('admin-maintenance'))
        @include('admin-tabs.maintenance-management')
    @endif

    @if(request()->routeIS('admin-bill'))
        @include('admin-tabs.bill-management')
    @endif

    @if(request()->routeIS('admin-inventory'))
        @include('admin-tabs.inventory-item')
    @endif
</div>

@script
<script>
    $('#modal_addEditItem').on('hidden.bs.modal', function (e) {
        $wire.dispatch('reset-form');
    });

    //Hide modal when successfully updated student or added
    $wire.on('close-add-edit-delete-modal', () => {
        $('#modal_addEditItem').modal('hide');
        $('#modal_deleteItem').modal('hide');
    });
</script>
@endscript
