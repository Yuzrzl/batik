<!-- Sidebar -->
<div class="sidebar">

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
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        {{ __('Transaksi') }}
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="/laporan-transaksi" class="nav-link">
                            <i class="far fa-cixrcle nav-icon"></i>
                            <p>Daftar Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ctk-trans" class="nav-link">
                            <i class="far fa-cxircle nav-icon"></i>
                            <p>Cetak Transaksi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>
                        {{ __('Pesanan') }}
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="/pesanan" class="nav-link">
                            <i class="far fa-cixrcle nav-icon"></i>
                            <p>Daftar Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ctk-pes" class="nav-link">
                            <i class="far fa-cxircle nav-icon"></i>
                            <p>Cetak Pesanan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/laporan-retur" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        {{ __('Retur') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->