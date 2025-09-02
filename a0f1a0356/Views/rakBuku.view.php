<!DOCTYPE html>
<html>
<head>
    <title>Data Rak Buku</title>
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
<?php
error_reporting(error_level: 5); 
include __DIR__ .'/../session.php';
include __DIR__.'/../../librari/inc.conection.php';

// ambil data langsung
$sqlRak = "SELECT kd_rak,nm_rak,detail_rak
        FROM tb_lib_rak_buku
        ORDER BY kd_rak DESC";
$resultRak = mysqli_query($koneksi, $sqlRak);
?>


<div style="overflow-x:auto">
    <center><h3 class="text-dark font-weight-normal">Data Rak Buku/Lemari Buku </h3></center> 
        

                <div class="md-col-5">
                    <button type="button" class="btn-sm btn-success fa fa-building " data-toggle="modal" data-target="#largeModal">
                            Tambah Rak Buku
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
                                
                                    <?php  include __DIR__ . '../../forms/rakBuku.form.php'; ?>
                            
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><br><br><br>

<table id="table_users" class="display responsive">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>id Rak</th>
            <th>Nama Rak</th>
            <th>Detail Rak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($resultRak)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['kd_rak']; ?></td>
            <td><?= $row['nm_rak']; ?></td>
            <td><?= $row['detail_rak']; ?></td>
            <td>
                
                <a class="fa fa-edit" href="?page=forms&forms=rakBukuForm&kdedit=<?= $row['kd_rak'] ?>">Edit |</a> 
                <a class="fa fa-trash" href="?page=control&control=rakBukuControl&kdhapus=<?= $row['kd_rak'] ?>" onclick="return confirm('Beneran Mau di Hapus?')">Delete |</a>
                <a class="fa fa-info-circle" href="?page=views&views=detailRakBukuView&kddetail=<?= $row['kd_rak'] ?>&nmRak=<?php echo $row['nm_rak'] ?>">Detail</a> 
            </td>
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
