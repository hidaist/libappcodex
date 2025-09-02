
<?php 
// cek session
error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
include_once __DIR__ ."/../../librari/inc.conection.php";

// Query untuk mengambil data dari tabel barang, barang_pinjam, dan barang_kembali
$sqlProsesPinjamBuku = mysqli_query($koneksi, " SELECT 
                                                tb_lib_users.nama,
                                                tb_lib_peminjaman.date_pinjam,
                                                tb_lib_peminjaman.kd_pinjam,
                                                tb_lib_peminjaman.keterangan_pinjam,
                                                tb_lib_buku.judul_buku,
                                                tb_lib_buku.kd_buku,
                                                tb_lib_buku.isbn,
                                                DATEDIFF(CURDATE(), tb_lib_peminjaman.date_pinjam) AS lama_pinjam
                                            FROM tb_lib_users
                                            JOIN tb_lib_peminjaman ON tb_lib_users.kd_user = tb_lib_peminjaman.kd_user
                                            JOIN tb_lib_buku ON tb_lib_buku.kd_buku = tb_lib_peminjaman.kd_buku
                                            LEFT JOIN tb_lib_pengembalian ON tb_lib_pengembalian.kd_pinjam = tb_lib_peminjaman.kd_pinjam
                                            WHERE tb_lib_users.kd_user = '".$_SESSION['kd_user']."'
                                            AND tb_lib_pengembalian.kd_pinjam IS NULL;
");
while ($rowData = mysqli_fetch_array($sqlProsesPinjamBuku)) {
       $rowArray[] = $rowData;
}
?>

<!DOCTYPE html>

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

<div class="content mt-3 table-responsive">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" align="center">
                        <strong class="card-title"> Data Peminjaman Buku </strong>
                    </div>
                    <div class="card-title">
                    <table id="table_buku" class="display responsive">
                            <thead class="table-primary">
                                <tr>
                                    <th>no</th>
                                    <th>Kode Pinjam</th>
                                    <th>ISBN</th>
                                    <th>Judul Buku</th>
                                    <th>Nama Peminjam</th>
                                    <th>Tgl Pinjam</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                               foreach ($rowArray as $row) : ;?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kd_pinjam']; ?></td>
                                        <td><?= $row['isbn']; ?></td>
                                        <td><?= $row['judul_buku']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['date_pinjam'])); ?></td>
                                        
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

