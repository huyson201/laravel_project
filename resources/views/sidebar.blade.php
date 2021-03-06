<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false"
                class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu1' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Reports</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Tables</span>
                </a>
            </div>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false"
                class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Users</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="{{route('user.list')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of all users</span>
                </a>
                <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Add new</span>
                </a>
            </div>

            <a href="#submenu3" data-toggle="collapse" aria-expanded="false"
                class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-users fa-fw mr-3"></span>
                    <span class="menu-collapsed">Trainers</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu3' class="collapse sidebar-submenu">
                <a href="{{ route('trainer.list') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of all trainers</span>
                </a>
                <a href="{{ route('trainer.create') }}"
                    class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Add new</span>
                </a>
            </div>
            <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                   <span class="fa fa-building fa-fw mr-3"></span> 
                    <span class="menu-collapsed">Companies</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu4' class="collapse sidebar-submenu">
                <a href="{{route('company.list')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List</span>
                </a>
                <a href="{{route('company.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Add new</span>
                </a>
            </div>
            <!--Here  -->
            <a href="#submenu5" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                   <span class="fa fa-shield fa-fw mr-3"></span> 
                    <span class="menu-collapsed">Categories</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu5' class="collapse sidebar-submenu">
                <a href="{{route('categories.list')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List categories</span>
                </a>
                <a href="{{route('categories.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Add new</span>
                </a>
            </div>
            <!--  -->
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-question fa-fw mr-3"></span>
                    <span class="menu-collapsed">Help</span>
                </div>
            </a>
            <a href="#top" data-toggle="sidebar-colapse"
                class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    @yield('main')
</div><!-- body-row END -->
