<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i><span
                            class="badge rounded-pill bg-primary float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ Route('service.all') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Service</span>
                    </a>
                </li>

                <li>
                    <a href="{{ Route('payment.configuration') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Payment Configuration</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
