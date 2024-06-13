<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="menu-title">BARANG</li><!-- /.menu-title -->
                <li>
                    <a href="{{ route('products.index')}}"> <i class="menu-icon fa fa-bars"></i>Lihat Barang </a>
                </li>
                <li>
                    <a href="{{ route('products.create')}}"> <i class="menu-icon fa fa-bars"></i>Tambah Barang </a>
                </li>
                
                <li class="menu-title">TRANSAKSI</li>
                <li>
                    <a href="{{ route('transactions.index')}}"> <i class="menu-icon fa fa-list"></i>Lihat transaksi </a>
                </li>
             

        </div><!-- /.navbar-collapse -->
    </nav>
</aside>