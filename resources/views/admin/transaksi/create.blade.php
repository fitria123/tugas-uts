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
                    <h1>Buat Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buat Transaksi</li>
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
                            <a href="/menu/tambah" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Menu </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('transaksi.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="">Daftar Menu</label>
                                        <select class="form-control" id="id_daftar">
                                            @foreach ($daftars as $daftar)
                                                <option value="{{ $daftar->id }}" data-nama="{{ $daftar->menu }}"
                                                    data-harga="{{ $daftar->harga }}" data-id="{{ $daftar->id }}">
                                                    {{ $daftar->menu }} Rp. {{number_format($daftar->harga) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label>
                                            <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah Item</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Quantity</th>
                                                    <th>Harga</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="transaksiItem">

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">Jumlah</th>
                                                    <th class="quantity">0</th>
                                                    <th class="totalHarga">0</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="total_harga" value="0">
                                        <button class="btn btn-success">Simpan Transaksi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var totalHarga = 0;
    var quantity = 0;
    var listItem = [];

    function tambahItem(){
        updateTotalHarga(parseInt($('#id_daftar').find(':selected').data('harga')));
        var item = listItem.filter((el) =>el.id_daftar === $('#id_daftar').find(':selected').data('id'));
        if(item.length>0){
            item[0].quantity += 1
        }else{
            var item = {
                id_daftar: $('#id_daftar').find(':selected').data('id'),
                nama: $('#id_daftar').find(':selected').data('nama'),
                harga: $('#id_daftar').find(':selected').data('harga'),
                quantity: 1,
            }
            listItem.push(item);
        }
        updateQuantity(1);
        updateTable()
    }

    function updateTable(){
        var html = '';
        listItem.map((el, index) => {
            console.log(el);
            var harga = formatRupiah(el.harga.toString());
            var quantity = formatRupiah(el.quantity.toString());
            html += `
            <tr>
                <td>${index + 1}</td>    
                <td>${el.nama}</td>    
                <td>${quantity}</td>    
                <td>${harga}</td>
                <td>
                    <input type="hidden" name="id_daftar[]" value="${el.id_daftar}">
                    <input type="hidden" name="quantity[]" value="${el.quantity}">
                    <button type="button" onclick="deleteItem(${index})" class="btn btn-link">
                        <i class="fas fa-fw fa-trash text-danger"></i>    
                    </button>
                </td>    
            </tr>
            `
        });
        $('.transaksiItem').html(html);
    }

    function deleteItem(index){
        var item = listItem[index]
        if(item.quantity>1){
            listItem[index].quantity -= 1;
            updateTotalHarga(-(item.harga));
            updateQuantity(-1);
        }else{
            listItem.splice(index,1);
            updateTotalHarga(-(item.harga * item.quantity));
            updateQuantity(-(item.quantity));
        }
        updateTable();
    }

    function updateTotalHarga(nom){
        totalHarga += nom;
        $('[name=total_harga]').val(totalHarga)
        $('.totalHarga').html(formatRupiah(totalHarga.toString()));
    }
    
    function updateQuantity(nom){
        quantity += nom;
        $('.quantity').html(formatRupiah(quantity.toString()));
    }
</script>
@include('includes.footer')
