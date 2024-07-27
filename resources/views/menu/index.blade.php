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
                            <a href="/menu/tambah" class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#menuModal"> <i class="fas fa-plus"></i> Tambah Menu </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="menu-list">
                                    {{-- Menu data from ajax --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {{-- Modal Create --}}
                    <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="menuForm">
                                        <div class="form-group">
                                            <label for="menu-name">Nama Menu</label>
                                            <input type="text" class="form-control" id="menu-name" placeholder="Masukkan Nama Menu">
                                        </div>
                                        <div class="form-group">
                                            <label for="menu-price">Harga</label>
                                            <input type="number" class="form-control" id="menu-price" placeholder="Masukkan Harga">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveMenu">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Menu -->
                    <div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editMenuForm">
                                        <input type="hidden" id="edit-menu-id">
                                        <div class="form-group">
                                            <label for="edit-menu-name">Menu</label>
                                            <input type="text" class="form-control" id="edit-menu-name" placeholder="Masukkan Nama Menu">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit-menu-price">Harga</label>
                                            <input type="number" class="form-control" id="edit-menu-price" placeholder="Masukkan Harga" min="0" step="1">
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateMenu">Update Menu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</div>


@include('includes.footer')

<script>
    $(document).ready(function() {
        // Fungsi untuk memuat daftar menu
        function loadMenus() {
            $.ajax({
                url: "{{ route('menu.index') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    var html = '';
                    data.forEach(function(menu) {
                        html += `
                            <tr>
                                <td>${menu.id}</td>
                                <td>${menu.menu}</td>
                                <td>${menu.harga}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editMenu(${menu.id})">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteMenu(${menu.id})">Hapus</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#menu-list').html(html);
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                }
            });
        }

        // Panggil fungsi untuk memuat menu saat halaman siap
        loadMenus();

        //Input Menu
        $('#saveMenu').on('click', function() {
            var menuName = $('#menu-name').val();
            var menuPrice = parseInt($('#menu-price').val(), 10);

            $.ajax({
                url: "{{ route('menu.tambah') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    menu: menuName,
                    harga: menuPrice
                },
                success: function(response) {
                    console.log(response);
                    loadMenus();
                    alert(response.success);
                    $('#menuModal').modal('hide');
                    $('#menuForm')[0].reset();
                },
                error: function(response) {
                    console.log(response);
                    alert('Error: ' + response.responseJSON.message);
                }
            });
        });

        // Fungsi untuk mengisi modal edit dengan data menu
        window.editMenu = function(id) {
            $.ajax({
                url: `/menu/${id}`,
                method: 'GET',
                success: function(data) {
                    $('#edit-menu-id').val(data.id);
                    $('#edit-menu-name').val(data.menu);
                    $('#edit-menu-price').val(data.harga);
                    $('#editMenuModal').modal('show');
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                }
            });
        }


        // Fungsi untuk memperbarui data menu
        $('#updateMenu').on('click', function() {
            var id = $('#edit-menu-id').val();
            var menuName = $('#edit-menu-name').val();
            var menuPrice = $('#edit-menu-price').val();

            $.ajax({
                url: `/menu/${id}`,
                method: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    menu: menuName,
                    harga: menuPrice
                },
                success: function(response) {
                    $('#editMenuModal').modal('hide');
                    loadMenus();
                    alert(response.success);
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                }
            });
        });

        // Fungsi untuk menghapus data menu
        window.deleteMenu = function(id) {
            if (confirm('Apakah Anda yakin ingin menghapus menu ini?')) {
                $.ajax({
                    url: `/menus/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        loadMenus(); // Memuat ulang menu setelah penghapusan
                        alert(response.success);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            }
        }
    });
</script>
