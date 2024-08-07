<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Resto Sederhana</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} | {{ ucfirst(Auth::user()->level) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/user" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Daftar User
                            </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/menu" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Daftar Menu
                            </p>
                        </a>
                      </li>
                    </ul>
                </li>
                @endif



                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-cash-register"></i>
                      <p>
                        Transaksi
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/transaksi/create" class="nav-link">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Tambah Transaksi
                            </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/transaksi" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Daftar Transaksi
                            </p>
                        </a>
                      </li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
                <li class="nav-item ">
                    <a href="#" class="nav-link bg-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
