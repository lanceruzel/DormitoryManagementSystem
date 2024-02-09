<div>
    @if(request()->routeIS('admin-dashboard'))
        @livewire('dashboard')
    @endif

    @if(request()->routeIS('admin-room'))
        @include('admin-tabs.room-management')
    @endif

    @if(request()->routeIS('admin-student'))
        @include('admin-tabs.student-management')
    @endif

    @if(request()->routeIS('admin-maintenance'))
        @include('admin-tabs.maintenance-request')
    @endif

    @if(request()->routeIS('admin-bill'))
        @include('admin-tabs.bill-management')
    @endif

    @if(request()->routeIS('admin-inventory'))
        @include('admin-tabs.inventory-item')
    @endif

    @if(request()->routeIS('admin-account'))
        @include('admin-tabs.account-mangement')
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
