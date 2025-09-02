<?php 
// cek session
error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
?>
<?php
// Display selected user data based on id
// Getting id from url
include_once __DIR__ ."/../../librari/inc.conection.php";
$sqlPinjamBuku = mysqli_query($koneksi, "SELECT tb_lib_peminjaman.kd_pinjam, tb_lib_peminjaman.date_pinjam,
                                                        tb_lib_users.nama,tb_lib_users.kd_user,
                                                        tb_lib_buku.judul_buku
                                                        FROM tb_lib_peminjaman
                                                        JOIN tb_lib_users on tb_lib_peminjaman.kd_user = tb_lib_users.kd_user
                                                        JOIN tb_lib_buku on tb_lib_peminjaman.kd_buku = tb_lib_buku.kd_buku
 ");



 ?>
 
 <html>
 <head>
    <title>Data Peminjam Buku</title>
    <link rel="stylesheet" href="../vendors/ajaxDataTable/jquery.dataTables.min.css">
    <script src="../vendors/ajaxDataTable/jquery-3.7.1.min.js"></script>
    <script src="../vendors/ajaxDataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../vendors/ajaxDataTable/scroller.dataTables.min.css" />
    <script src="../assets/vendors/ajaxDataTable/dataTables.scroller.min.js"></script>

    <!-- DataTables Buttons -->
    <link rel="stylesheet" href="../vendors/ajaxDataTable/buttons.dataTables.min.css">
    <script src="../vendors/ajaxDataTable/dataTables.buttons.min.js"></script>

    <!-- Export: PDF, Excel, Print -->
    <script src="../vendors/ajaxDataTable/jszip.min.js"></script>
    <script src="../vendors/ajaxDataTable/pdfmake.min.js"></script>
    <script src="../vendors/ajaxDataTable/vfs_fonts.js"></script>
    <script src="../vendors/ajaxDataTable/buttons.html5.min.js"></script>
    <script src="../vendors/ajaxDataTable/buttons.print.min.js"></script>
    <link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
    <script src="vendors/scripts/core.js"></script> 
        <script src="vendors/scripts/core.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
        <script src="vendors/jquery/src/jquery.js"></script>
        <script src="vendors/bootstrap/dist/bootstrap.js"></script>
    
    <style>
    .dataTables_wrapper { overflow-x: auto; }
    table.dataTable { width: 100% !important; }
    table.dataTable td { white-space: normal !important; word-break: break-word; }
</style>
</head>

<body>
               
<div class="content mt-3">
            <div class="animated">
                <div class="row">
                <button type="button" class="btn-sm btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                Tambah Data Pinjam Buku
                        </button>
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document"> 
                        <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body  table-responsive">
                                        
                                    <?php include_once "forms/pinjamBuku.form.php"; ?>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-12  animated fadeIn">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title">  Data Peminjam Buku&nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body  table-responsive">
                            <table id="table_users" class="display responsive">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Id Anggota</th>
            <th>Nama</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($sqlPinjamBuku)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['kd_user']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['judul_buku']; ?></td>
            <td><?= date('d-m-Y', strtotime($row['date_pinjam'])); ?></td>
            
                
                <!-- <a class="fa fa-edit" href="?page=forms&forms=rakBukuForm&kdedit=<?= $row['kd_pinjam'] ?>">Edit</a> -->
               <!--  <a class="fa fa-trash" href="?page=control&control=pinjamBukuControl&kdhapus=<?= $row['kd_pinjam'] ?>" onclick="return confirm('Beneran Mau di Hapus?')">Delete</a> -->
            
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>

<script>
$('#table_users').DataTable({
    scrollX: true,
    scrollY: 400,
    scrollCollapse: true,
    scroller: true,
    deferRender: true,
    responsive: true,
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});
</script>
<script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
                    <script>
                    lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                    })
</script>
</body>
</html>
