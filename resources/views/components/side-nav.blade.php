<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>

                @if (auth()->user()->can('manage-hotels'))
                    <li class="{{ request()->routeIs('admin.rooms*') ? 'active' : '' }}">
                        <a href="#hotels">
                            <i class="simple-icon-home"></i> Rooms
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-users'))
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-settings'))
                    <li class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            @if (auth()->user()->can('manage-hotels'))
                <ul class="list-unstyled" data-link="hotels" id="hotels">
                    <li>
                        <a href="{{ route('admin.rooms.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View all</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rooms.create') }}">
                            <i class="simple-icon-plus"></i>
                            <span class="d-inline-block">Add New</span>
                        </a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</div>
