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
    <a href="{{route('categories.import-file')}}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Import New Categories</span>
    </a>
    <a href="{{route('categories.export')}}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Export All Categories</span>
    </a>
</div>
