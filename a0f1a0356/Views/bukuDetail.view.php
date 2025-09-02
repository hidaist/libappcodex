<?php
error_reporting(error_level: 5); 
include __DIR__ .'/../session.php';
?>
<?php include_once "../librari/inc.koneksi.php";
if (! $_GET['kddetail']=="") {
    $sqlDetailBuku  = "SELECT * FROM tb_lib_buku, tb_lib_rak_buku Where tb_lib_buku.kd_rak=tb_lib_rak_buku.kd_rak  AND kd_buku='".$_GET['kddetail']."'";
//       echo"$sql";
    $qryDetBuku  = mysqli_query($koneksi, $sqlDetailBuku) or die ("Gagal sql");
    $dataArray = mysqli_fetch_array($qryDetBuku);
    
            $kdBuku = $dataArray['kd_buku'];
            $isbn = $dataArray['isbn'];
            $judul = $dataArray['judul_buku'];
            $penulis  = $dataArray['penulis'];
            $penerbit  = $dataArray['penerbit'];
            $tahun  = $dataArray['tahun_terbit'];
            $stok = $dataArray['stok'];
            $filegambar = $dataArray['filegambar'];
            $keterangan = $dataArray['keterangan_buku'];
            $rakBuku = $dataArray['nm_rak'];
    
}
 ?>
<html>
<head> 
<style>
    .fit-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
    }
</style>
<link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">

</head>

<body> <center>
<div class="col-md-6" align="center">
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                <a href="../image/<?php echo (!empty($dataArray['filegambar']) && file_exists("../image/" . $dataArray['filegambar'])) ? $dataArray['filegambar'] : 'no_pic.png'; ?>" data-lightbox="example-set" data-title="<?php echo $judul; echo'<br>';echo $keterangan;?>"> 
                                <img class="rounded-circle mx-auto d-block fit-image zoom-image"  src="../image/<?php echo (!empty($dataArray['filegambar']) && file_exists("../image/" . $dataArray['filegambar'])) ? $dataArray['filegambar'] : 'no_pic.png'; ?>" alt="Card image cap"> </a>
                                    <h5 class="text-sm-center mt-2 mb-1" title="Judul Buku"><?php echo $judul ; ?></h5>
                                    <div class="fa fa-book text-sm-center" title="Penulis"> <?php echo $penulis ; ?></div><br>
                                    <font class="text-sm-center mt-2 mb-1" title="Penerbit"><?php echo $penerbit ; ?></font>
                                    <br>
                                    <div class="fa fa-key text-sm-center" title="Kode ISBN"> <?php echo $isbn ; ?></div>
                                  
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h4 class="card-title mb-3 fa fa-map text-sm-center" title="Lokasi Rak/Lemari"> <b> <?php echo $rakBuku; ?> </b></h4>
                                        <div class="typo-articles">
                                        <?php echo nl2br(htmlspecialchars($keterangan)); ?>
                                        </div>
                                        <div class="typo-articles">
                                            Stok : <?php echo $stok;  ?> 
                                        </div>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn btn-success fa fa-book " title="Edit Data Buku" href="?page=forms&forms=bukuForm&kdedit=<?php echo $dataArray['kd_buku']; ?>"> Edit Data Buku</a></strong>
                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Back" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                        </div>
                    </div>
                    </center>
                    <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
                    <script>
                    lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                    })
</script>
</body>
</html>