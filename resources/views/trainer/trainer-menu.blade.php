<a href="#submenu3" data-toggle="collapse" aria-expanded="false"
    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-start align-items-center">
        <span class="fa fa-users fa-fw mr-3"></span>
        <span class="menu-collapsed">Trainers</span>
        <span class="submenu-icon ml-auto"></span>
    </div>
</a>
<!-- Trainer submenu  content -->
<div id='submenu3' class="collapse sidebar-submenu">
    <a href="{{ route('trainer.list') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">List of all trainers</span>
    </a>
    <a href="{{ route('trainer.create') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Add new</span>
    </a>
    <a href="{{ route('trainer.import-view') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Import</span>
    </a>
    <a href="{{ route('trainer.export-view') }}" class="list-group-item list-group-item-action bg-dark text-white">
        <span class="menu-collapsed">Export</span>
    </a>
</div>
