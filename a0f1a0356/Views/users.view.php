<!DOCTYPE html>
<html>
<head>
    <title>Data Users</title>
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
        FROM tb_lib_users
        WHERE kd_user = '".$_SESSION['kd_user']."'
        ORDER BY kd_user DESC";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($result);
$nama = $row['nama'];
?>


<div class="col-md-4">
                        <div class="card">
                            <div class="card-header"> <center> 
                                <strong class="card-title mb-3">Profile </strong> </center>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="../gambarimageadm/<?php
                                            // Periksa apakah 'file_gambar' ada
                                            if (!$_SESSION['foto']) {
                                                // Jika 'file_gambar' kosong, tampilkan gambarkosong.png
                                                echo "gambarkosong.png";
                                            } else {
                                                // Periksa apakah file gambar yang dimaksud ada di folder
                                                $file_path = '../gambarimageadm/' . $_SESSION['foto']; // sesuaikan path foldernya
                                                if (file_exists($file_path)) {
                                                    echo $_SESSION['foto'];
                                                } else {
                                                    // Jika file tidak ditemukan, tampilkan gambarkosong.png
                                                    echo "gambarkosong.png";
                                                }
                                            }
                                            ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row['nama'] ?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-briefcase"></i> ID : <?php echo $_SESSION['id'] ?></div>
                                    <div class="location text-sm-center"><i class="fa fa-user"></i> Username : <?php echo $_SESSION['username'] ?></div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="?page=forms&forms=userForm&kdreset=<?= $_SESSION['kd_user'] ?>"><i class="fa fa-key pr-1"> Reset Password</i></a>
                                    <a href="?page=forms&forms=userForm&kdedit=<?= $_SESSION['kd_user'] ?>"><i class="fa fa-user pr-1"> Edit Profil</i></a>
                                </div>
                            </div>
                        </div>
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
