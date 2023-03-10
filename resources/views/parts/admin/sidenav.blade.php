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

                @if (auth()->user()->can('manage-users'))
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-setting'))
                    <li class="{{ request()->routeIs('settings*') ? 'active' : '' }}">
                        <a href="#setting">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">


            {{-- 
            @if (auth()->user()->can('manage-setting'))
                <ul class="list-unstyled" data-link="setting" id="setting">
                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">Common Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings.seo') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">SEO Setting</span>
                        </a>
                    </li>
                </ul>
            @endif --}}

        </div>
    </div>
</div>
