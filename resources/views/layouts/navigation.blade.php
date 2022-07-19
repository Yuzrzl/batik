<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('produk.daftar_produk') }}" class="nav-link">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        {{ __('Produk') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pesanan" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>
                        {{ __('Pesanan') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan-transaksi" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        {{ __('Transaksi') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan-retur" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        {{ __('Retur') }}
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->