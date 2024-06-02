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
                    <h1>Daftar User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar User</li>
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
                            <div class="col-2">
                                        <button type="button" class="btn btn-block btn-primary">Tambah User</button>  
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>john@example.com</td>
                                        <td>john</td>
                                        <td>Kasir</td>
                                        <td>
                                            <a href="#" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fitria Alfiana</td>
                                        <td>falfiana57@gmail.com</td>
                                        <td>fitria</td>
                                        <td>Admin</td>
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
