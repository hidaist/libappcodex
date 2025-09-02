<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="vendors/ajaxDataTable/jquery.dataTables.min.css">
    <script src="vendors/ajaxDataTable/jquery-3.7.1.min.js"></script>
    <script src="vendors/ajaxDataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="vendors/ajaxDataTable/scroller.dataTables.min.css" />
    <script src="assets/vendors/ajaxDataTable/dataTables.scroller.min.js"></script>

    <!-- DataTables Buttons -->
    <link rel="stylesheet" href="vendors/ajaxDataTable/buttons.dataTables.min.css">
    <script src="vendors/ajaxDataTable/dataTables.buttons.min.js"></script>

    <!-- Export: PDF, Excel, Print -->
    <script src="vendors/ajaxDataTable/jszip.min.js"></script>
    <script src="vendors/ajaxDataTable/pdfmake.min.js"></script>
    <script src="vendors/ajaxDataTable/vfs_fonts.js"></script>
    <script src="vendors/ajaxDataTable/buttons.html5.min.js"></script>
    <script src="vendors/ajaxDataTable/buttons.print.min.js"></script>
    <link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
    <script src="vendors/scripts/core.js"></script> 
        <script src="vendors/scripts/core.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
        <script src="vendors/jquery/src/jquery.js"></script>
        <script src="vendors/bootstrap/dist/bootstrap.js"></script>
    
        <style>
/* Background area */
#table_buku_wrapper {
  background: #fff;
  border-radius: 15px;
  padding: 20px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  margin-top: 20px;
}

/* Header Table */
#table_buku thead th {
  text-align: center;
  background: linear-gradient(135deg, #007bff, #00c6ff);
  color: white;
  font-weight: bold;
  font-size: 14px;
  padding: 12px;
}

/* Row Hover */
#table_buku tbody tr:hover {
  background-color: #f0f8ff;
  transition: 0.3s;
}

/* Cell */
#table_buku td {
  vertical-align: middle;
  font-size: 14px;
}

/* Thumbnail Image */
#table_buku img {
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

#table_buku img:hover {
  transform: scale(2.5);
  z-index: 1000;
}

/* Responsive wrapper */
.dataTables_wrapper .dataTables_filter input {
  border-radius: 20px;
  padding: 6px 12px;
  border: 1px solid #ddd;
}

.dataTables_wrapper .dataTables_length select {
  border-radius: 10px;
  padding: 4px;
}
</style>

</head>
<body>
<?php
error_reporting(error_level: 5); 
include __DIR__.'librari/inc.conection.php';

// ambil data langsung
$sql = "SELECT *
        FROM tb_lib_buku
        JOIN tb_lib_rak_buku on tb_lib_buku.kd_rak = tb_lib_rak_buku.kd_rak
        ORDER BY tb_lib_buku.kd_buku ASC";
$result = mysqli_query($koneksi, $sql);
?>


<div style="background-color: antiquewhite;" >

<table id="table_buku" class="display responsive" style="background-color: antiquewhite; height: 100%;" >
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th hidden>kode Buku</th>
            <th>isbn</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Stok</th>
            <th>Tempat Rak</th>
            <th>Sampul</th>
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
            <td><?= $row['stok']; ?></td>
            <td><?= $row['nm_rak']; ?></td>
            <td><a href="image/<?php echo (!empty($row['filegambar']) && file_exists("image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>"
                        data-lightbox="example-set" 
                        data-title="<?php echo $row['judul_buku']; echo'<br>';echo $row['penulis'];?>"> 
                        <img class="fit-image zoom-image"  
                        width="50px" 
                        src="image/<?php echo (!empty($row['filegambar']) && file_exists("image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>" 
                        alt="Card image cap"> </a></td>
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
<script>
$(document).ready(function() {
    $('#table_buku').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 20, 50],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari buku...",
            lengthMenu: "Tampilkan _MENU_ buku per halaman",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ buku",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });
});
</script>
