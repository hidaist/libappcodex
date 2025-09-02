<?php 
// cek session
error_reporting(0);
include __DIR__ .'/../session.php';
?>
<?php
include_once __DIR__ ."/../../librari/inc.conection.php";
if (! $_GET['kdpinjam']=="") {
    $sql  = "SELECT 
    tb_lib_users.nama,
    tb_lib_peminjaman.kd_pinjam,
    tb_lib_peminjaman.date_pinjam,
    tb_lib_buku.judul_buku
        FROM tb_lib_users
        JOIN tb_lib_peminjaman ON tb_lib_users.kd_user = tb_lib_peminjaman.kd_user
        JOIN tb_lib_buku ON tb_lib_buku.kd_buku = tb_lib_peminjaman.kd_buku
        LEFT JOIN tb_lib_pengembalian ON tb_lib_pengembalian.kd_pinjam = tb_lib_peminjaman.kd_pinjam
        WHERE tb_lib_peminjaman.kd_pinjam='".$_GET['kdpinjam']."' 
        AND  tb_lib_pengembalian.kd_pinjam IS NULL ;
        ";
//       echo"$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
    $data = mysqli_fetch_array($qry);
    
            $kdbuku     = $data['kd_buku'];
            $kdpinjam   = $data['kd_pinjam'];
            $nama       = $data['nama'];
            $namabuku       = $data['judul_buku'];
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">


<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

<link rel="stylesheet" href="assets/css/style.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>


<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="?page=control&control=PengembalianBukuControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Pengembalian Barang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Pengembalian Buku</label>
                                                <input id="cc-kode" 
                                                name="kdkembali"
                                                value="<?php echo 'KPB-' . uniqid(); ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Peminjaman Buku</label>
                                                <input id="cc-kode" 
                                                name="kdpinjam"
                                                value="<?php echo $kdpinjam; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Buku</label>
                                                <input id="cc-kode" 
                                                name="kdBuku"
                                                value="<?php echo $namabuku; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Peminjam</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nama; ?>"
                                                    name="" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" readonly>
                                                   
                                                </div>
                                              
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tanggal Pengembalian</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="datekembali" 
                                                    value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d"); ?>"
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <!--
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Barang Sudah Kembali</label><br>
                                                    <label class="switch switch-text switch-success switch-pill input-lg" require>   
                                                        <input type="checkbox" class="switch-input" name="checkkembali" value="1" checked="true" required>
                                                        <span data-on="Yes" data-off="No" class="switch-label"></span> 
                                                        <span class="switch-handle"></span>
                                                    </label> 

                                                </div>
                                               
                                                <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">File Gambar</label>
                                                        <input 
                                                            name="NamaFile" 
                                                            type="file"
                                                            id="captureInput"
                                                            class="dropify form-control-file form-control height-auto" 
                                                            data-max-file-size="1M"
                                                            data-errormessage-value-missing="Upload Foto"
                                                            accept="image/*"
                                                            capture
                                                        >
                                                    </div> -->
                                                    
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     
     </form>
	</div>
   
</div>

</body>
</html>
