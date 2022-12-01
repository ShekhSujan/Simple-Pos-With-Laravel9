<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset("assets/images/logo/{$allSetting->id}-logo.{$allSetting->logo}") }}" alt="" />
        </a>
    </div>
    <style>
        .aheader {
            padding: 0px 35px 0px 15px !important;
        }

        .bheader {
            padding: 5px 35px 5px 42px !important;
        }

        .page-wrapper .sidebar-wrapper .sidebar-menu .sidebar-dropdown>a:after {
            top: 10px !important;
        }
    </style>
    <div class="sidebar-content">
        <div class="sidebar-menu NavScroll">
            <ul>
                <li class="sidebar">
                    <a href="#" class="aheader">
                        <i class="icon-check-circle"></i>
                        <span class="menu-text">Create</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="#" class="aheader">
                        <i class="icon-layout"></i>
                        <span class="menu-text">List</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="{{route('setting')}}" class="aheader">
                        <i class="icon-settings1"></i>
                        <span class="menu-text">Settings</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="{{url('/clear-log')}}" class="aheader">
                        <i class="icon-alert-triangle"></i>
                        <span class="menu-text">Cache Clear</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
