@include('includes.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/menu/tambah" class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus"></i> Tambah Menu </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nasi Goreng Ayam</td>
                                        <td>15.000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mi Goreng Ayam</td>
                                        <td>15.000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Es Teh</td>
                                        <td>5.000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Es Jeruk</td>
                                        <td>7.000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Baso Cuanki Bandung</td>
                                        <td>20.000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.footer')
