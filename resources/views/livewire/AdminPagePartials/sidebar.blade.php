<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-2">
        <a href="index.html" class="app-brand-link app-brand-text fw-bolder menu-text demo text-wrap">
            Dormitory <br> Management
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Main</span></li>

        <!-- Dashboard -->
        <li class="menu-item @if (request()->routeIS('admin-dashboard')) active @endif">
            <a href="{{ route('admin-dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Management</span>
        </li>

        <li class="menu-item @if (request()->routeIS('admin-account')) active @endif">
            <a href="{{ route('admin-account') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n="Basic">Account Management</div>
            </a>
        </li>

        <li class="menu-item @if (request()->routeIS('admin-student')) active @endif">
            <a href="{{ route('admin-student') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-detail'></i>
                <div data-i18n="Basic">Student Management</div>
            </a>
        </li>

        <li class="menu-item @if (request()->routeIS('admin-room')) active @endif">
            <a href="{{ route('admin-room') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Basic">Room Management</div>
            </a>
        </li>

        <li class="menu-item @if (request()->routeIS('admin-inventory')) active @endif">
            <a href="{{ route('admin-inventory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-box"></i>
                <div data-i18n="Basic">Inventory Item</div>
            </a>
        </li>

        <li class="menu-item @if (request()->routeIS('admin-bill')) active @endif">
            <a href="{{ route('admin-bill') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-wallet' ></i>
                <div data-i18n="Basic">Bill Management</div>
            </a>
        </li>
    </ul>
</aside>