<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-bold">СИБУР</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <br>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Поиск" >
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item">
                        <a href="{{route('admin.category.index')}}" class="nav-link">

                            <p>
                                Категории/Подкатегории
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{route('admin.country.index')}}" class="nav-link">

                        <p>
                            Страны
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.city.index')}}" class="nav-link">
                        <p>
                            Города
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.currency.index')}}" class="nav-link">
                        <p>
                            Валюты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.language.index')}}" class="nav-link">
                        <p>
                            Языки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.annex.type.index')}}" class="nav-link">
                        <p>
                            Типы приложений
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

