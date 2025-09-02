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
        ORDER BY kd_user DESC";
$result = mysqli_query($koneksi, $sql);
?>


<div style="overflow-x:auto">
    <center><h3 class="text-dark font-weight-normal">Data User </h3></center> 
        

                <div class="md-col-5">
                    <button type="button" class="btn-sm btn-success fa fa-user-plus " data-toggle="modal" data-target="#largeModal">
                            Tambah User
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
                                
                                    <?php include __DIR__ . '../../forms/user.form.php'; ?>
                            
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
            <th>id user</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Level</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['tempat_lahir']; echo ", "; echo date('d-m-Y', strtotime($row['tgl'])); ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><a href="../gambarimageadm/<?php echo $row['foto'];?>" data-lightbox="example-set" data-title="<?php echo $row['nama']; echo'<br>';echo $row['username'];?>"> <img class="fit-image zoom-image"  width="50px" src="../gambarimageadm/<?php echo $row['foto'];?>" alt="Card image cap"> </a></td>
            <td><?= $row['level']; ?></td>
            <td><?= $row['status']; ?></td>
            <td>
                
                <a class="fa fa-edit" href="?page=forms&forms=userForm&kdedit=<?= $row['kd_user'] ?>"> Edit</a> 
                <a class="fa fa-trash" href="?page=control&control=userControl&kdhapus=<?= $row['kd_user'] ?>" onclick="return confirm('Beneran Mau di Hapus?')"> Delete</a>
                <a class="fa fa-key" href="?page=forms&forms=userForm&kdreset=<?= $row['kd_user'] ?>"> Reset</a>
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
