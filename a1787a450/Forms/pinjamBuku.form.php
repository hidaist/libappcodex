<?php 
// cek session
error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
?>
<?php include_once __DIR__ ."/../../librari/inc.conection.php";

// Display selected user data based on id
// Getting id from url


if (!empty($_GET['kd'])) {
        $sqlpinjam  = "SELECT * FROM tb_lib_peminjaman";
 //      echo"$sql";
        $qrypinjam  = mysqli_query($koneksi, $sqlpinjam) or die ("Gagal sql");
        $data = mysqli_fetch_array($qrypinjam);
        
                $kdpinjam = $data['kd_pinjam'];
                $kdbarang = $data['kd_barang'];
                $nmpinjam = $data['nm_peminjam'];
                $date  = $data['date_pinjam'];
                $keterangan  = $data['keterangan_pinjam'];
                
        
}
// Buat Var
$kdpinjam       = ($kdpinjam  != "") ? $kdpinjam : 'PJB-' . uniqid();
$nmpinjam       = ($nmpinjam  != "") ? $nmpinjam : "";
$date           = ($date  != "") ? $date : "";
$keterangan     = ($keterangan  != "") ? $keterangan : "";
$button         = (!empty($_GET['kdubah'])) ? "update" : "submit";
?>
<?php include_once "../librari/inc.koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Peminjaman Buku</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="?page=control&control=pinjamBukuControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Peminjaman Buku</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Pinjam Buku</label>
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
                                                <label for="cc-number" class="control-label mb-1">Judul Buku</label>
                                                <select required name="cmbBuku" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Buku</option>
                                              <?php
                                                            $sqlcmbBuku = "SELECT * FROM tb_lib_buku WHERE stok > 0";
                                                            $qrycmbBuku = @mysqli_query($koneksi, $sqlcmbBuku) or die ("Gagal query");
                                                            while ($datacmbBuku =mysqli_fetch_array($qrycmbBuku)) {
                                                                if ($datacmbBuku['kd_buku']==$kdbuku){
                                                                    $cek="selected";
                                                                }
                                                                else {$cek="";}

                                                                    echo "<option value='$datacmbBuku[kd_buku]' $cek>isbn: $datacmbBuku[isbn],Judul: $datacmbBuku[judul_buku], Stok:$datacmbBuku[stok]</option>";
                                                            }
                                                            ?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Pemninjam</label>
                                                <select required name="cmbPinjam" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Nama</option>
                                              <?php
                                                            $sqlcmbUser = "SELECT * FROM tb_lib_users where status ='aktif'";
                                                            $qrycmbUser = @mysqli_query($koneksi, $sqlcmbUser) or die ("Gagal query");
                                                            while ($datacmbUser =mysqli_fetch_array($qrycmbUser)) {
                                                                if ($datacmbUser['kd_user']==$kdUser){
                                                                    $cek="selected";
                                                                }
                                                                else {$cek="";}

                                                                    echo "<option value='$datacmbUser[kd_user]' $cek>ID:$datacmbUser[id], Nama:$datacmbUser[nama]</option>";
                                                            }
                                                            ?>
                                            </select>
                                            </div>
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tanggal Pinjam</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="datepinjam"
                                                    value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d"); ?>" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Keterangan</label>
                                                    <textarea id="cc-textarea" 
                                                    name="keterangan" 
                                                    class="form-control" required><?php echo $keterangan; ?></textarea>
                                                   
                                                </div>
                                               <!--
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
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <?php echo $button; ?>
                                                        
                                                    </button>
                                                </div>
     </form>
	</div>
    
</div>

</body>
</html>
