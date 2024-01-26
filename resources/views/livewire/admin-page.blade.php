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
</div>
