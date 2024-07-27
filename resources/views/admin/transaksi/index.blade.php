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
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
                            <a href="/transaksi/create" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Transaksi </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Item</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal</th>
                                            <th>Operator</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no_transaksi = 1?>
                                        @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td>{{$no_transaksi}}</td>
                                                <td>{{$transaksi->transaksi_code}}</td>
                                                <td>
                                                    <ol>
                                                        @foreach ($transaksi->items as $item)
                                                            <li>{{$item->nama}} ({{ $item->quantity }})</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td>Rp. {{ number_format($transaksi->total_harga)}}</td>
                                                <td>{{ $transaksi->created_at->toDayDateTimeString() }}</td>
                                                <td>{{ $transaksi->operator ? $transaksi->operator->name : 'N/A' }}</td>
                                                <td>
                                                    <form action="{{route('transaksi.destroy',$transaksi->id)}}" class="d-inline" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-sm btn-link">
                                                            <i class="fas fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $no_transaksi++?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
