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
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-users"></i>
                        <span class="menu-text">Customers</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('customer.create') }}" class="bheader">New Customer</a></li>
                            <li><a href="{{ route('customer.index') }}" class="bheader">All Customer</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-activity"></i>
                        <span class="menu-text">Medicine</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('medicine.create') }}" class="bheader">New Medicine</a></li>
                            <li><a href="{{ route('medicine.index') }}" class="bheader">All Medicine</a></li>
                            <li><a href="{{ route('stock.index') }}" class="bheader">Medicine Stock</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-activity"></i>
                        <span class="menu-text">Order</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('order.create') }}" class="bheader">New Order</a></li>
                            <li><a href="{{ route('order.index') }}" class="bheader">Order List</a></li>
                        </ul>
                    </div>
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
