<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-bold">СИЛОВЫЕ МАШИНЫ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <br>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Поиск">
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
                    <a href="{{route('profile.show')}}" class="nav-link">
                        <p>
                            Моя компания (редактирование основной информации)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('status.index')}}" class="nav-link">
                        <p>
                            Классификация (статусы, категории, приложения)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('procedure.index')}}" class="nav-link">
                        <p>
                            Процедуры
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('shipment.index')}}" class="nav-link">
                        <p>
                            Мои поставки
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

