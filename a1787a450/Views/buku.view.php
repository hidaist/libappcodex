<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
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
$sql = "SELECT *
        FROM tb_lib_buku
        JOIN tb_lib_rak_buku on tb_lib_buku.kd_rak = tb_lib_rak_buku.kd_rak
        ORDER BY tb_lib_buku.kd_buku DESC";
$result = mysqli_query($koneksi, $sql);
?>


<div style="overflow-x:auto">
    <center><h3 class="text-dark font-weight-normal">Data Buku </h3></center> 
        

                <div class="md-col-5">
                    <button type="button" class="btn-sm btn-success fa fa-book " data-toggle="modal" data-target="#largeModal">
                            Tambah Buku
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
                                
                                    <?php include __DIR__ . '../../forms/buku.form.php'; ?>
                            
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><br><br><br>

<table id="table_buku" class="display responsive">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th hidden>kode Buku</th>
            <th>isbn</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
            <th>Tempat Rak</th>
            <th>Keterangan</th>
            <th>Sampul</th>
            <th>Harga</th>
            <th>Sumber</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td hidden><?= $row['kd_buku']; ?></td>
            <td><?= $row['isbn']; ?></td>
            <td><?= $row['judul_buku']; ?></td>
            <td><?= $row['penulis']; ?></td>
            <td><?= $row['penerbit']; ?></td>
            <td><?= $row['tahun_terbit']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td><?= $row['nm_rak']; ?></td>
            <td><?= $row['keterangan_buku']; ?></td>
            <td><a href="../image/<?php echo (!empty($row['filegambar']) && file_exists("../image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>"
                        data-lightbox="example-set" 
                        data-title="<?php echo $row['judul_buku']; echo'<br>';echo $row['penulis'];?>"> 
                        <img class="fit-image zoom-image"  
                        width="50px" 
                        src="../image/<?php echo (!empty($row['filegambar']) && file_exists("../image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>" 
                        alt="Card image cap"> </a></td>
            <td><?= $row['harga_buku']; ?></td>
            <td><?= $row['sumber']; ?></td>
            <td>
                
                <a class="fa fa-edit" href="?page=forms&forms=bukuForm&kdedit=<?= $row['kd_buku'] ?>">Edit</a> 
                <a class="fa fa-trash" href="?page=control&control=bukuControl&kdhapus=<?= $row['kd_buku'] ?>" onclick="return confirm('Beneran Mau di Hapus?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>

<script>
$('#table_buku').DataTable({
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
