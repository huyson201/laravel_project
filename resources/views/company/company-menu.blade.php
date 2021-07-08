<a href="#submenu4" data-toggle="collapse" aria-expanded="false"
    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-start align-items-center">
        <span class="fa fa-building fa-fw mr-3"></span>
        <span class="menu-collapsed">Companies</span>
        <span class="submenu-icon ml-auto"></span>
    </div>
</a>
<!-- Submenu content -->
<div id='submenu4' class="collapse sidebar-submenu">
    <a href="{{ route('company.list') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">List of all companies</span>
    </a>
    <a href="{{ route('company.create') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Add new</span>
    </a>
</div>
