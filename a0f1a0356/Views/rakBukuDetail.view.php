<?php 
error_reporting(5);
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
//include "../cek_login.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>
<?php
include __DIR__.'/../../librari/inc.conection.php';
if (!$_GET['kddetail']=="") {
    $sqlRak  = "SELECT * FROM tb_lib_buku, tb_lib_rak_buku WHERE tb_lib_buku.kd_rak=tb_lib_rak_buku.kd_rak AND tb_lib_rak_buku.kd_rak='".$_GET['kddetail']."'";
    $resultRak = mysqli_query($koneksi, $sqlRak);
    //echo "$sql";           
    while($arrayRak = mysqli_fetch_array($resultRak)){
        $dataArrayRak[] = $arrayRak;
        $no =1;
    } 
}

?>
    
<html>
<head> 
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
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Data Buku di  <?php echo $_GET['nmRak']; ?> &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            
                            <table id="table_rak" class="display responsive">
                                <thead class="table-primary">
                                    <tr>
                                            <th>No</th>
                                            <th>ISBN</th>
                                            <th>Judul Buku</th>
                                            <th>Cover</th>
                                            <th>Stok</th>
                                            <th>Detail Buku</th>
                                            <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($dataArrayRak as $row):?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['isbn']; ?></td>
                                            <td><?= $row['judul_buku']; ?></td>
                                            <td><a href="../image/<?php echo (!empty($row['filegambar']) && file_exists("../image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>"
                                                data-lightbox="example-set" 
                                                data-title="<?php echo $row['judul_buku']; echo'<br>';echo $row['penulis'];?>"> 
                                                <img class="fit-image zoom-image"  
                                                width="30px" 
                                                src="../image/<?php echo (!empty($row['filegambar']) && file_exists("../image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>" 
                                                alt="Card image cap"> </a></td>
                                                <td><?= $row['stok']; ?></td>
                                            <td><?= $row['keterangan_buku']; ?></td>
                                            <td>
                                                <a class='fa fa-book'  
                                                 title='Detail Data Buku' href='?page=views&views=bukuDetailView&kddetail=<?php echo $row['kd_buku']; ?>'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                >
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <div>
                                </div>
                            </div>
                            <div class="card-footer" align="center" >
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Back" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
</div>


</body>
</html>
<script>
$('#table_rak').DataTable({
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