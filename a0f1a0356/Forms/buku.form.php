<?php 
// cek session
error_reporting(0);
include __DIR__ .'/../session.php';
?>
<?php
// Display selected user data based on id
// Getting id from url
include_once __DIR__ ."/../../librari/inc.conection.php";


if (!empty($_GET['kdedit'])) {
        $sqlBukufm  = "SELECT *
        FROM tb_lib_buku
        JOIN tb_lib_rak_buku on tb_lib_buku.kd_rak = tb_lib_rak_buku.kd_rak
        WHERE tb_lib_buku.kd_buku='".$_GET['kdedit']."'";
 //       echo"$sql";
        $qryBukufm  = mysqli_query($koneksi, $sqlBukufm) or die ("Gagal sql");
        $dataBukufm = mysqli_fetch_array($qryBukufm);
        
                $kdBuku     = $dataBukufm['kd_buku'];
                $isbn       = $dataBukufm['isbn'];
                $judulBuku  = $dataBukufm['judul_buku'];
                $penulis    = $dataBukufm['penulis'];
                $penerbit   = $dataBukufm['penerbit'];
                $thTerbit   = $dataBukufm['tahun_terbit'];
                $stok       = $dataBukufm['stok'];
                $kdRak      = $dataBukufm['kd_rak'];
                $ketBuku    = $dataBukufm['keterangan_buku'];
                $filegambar = $dataBukufm['filegambar'];
                $hargaBuku  = $dataBukufm['harga_buku'];
                $sumber     = $dataBukufm['sumber'];
                
        
}
$kdBuku         = ($kdBuku  != "") ? $kdBuku : 'KBP-' . uniqid();
$isbn           = ($isbn  != "") ? $isbn : "";
$judulBuku      = ($judulBuku  != "") ? $judulBuku : "";
$penulis        = ($penulis  != "") ? $penulis : "";
$penerbit       = ($penerbit  != "") ? $penerbit : "";
$thTerbit       = ($thTerbit  != "") ? $thTerbit : "";
$stok           = ($stok  != "") ? $stok : "";
$kdRak          = ($kdRak  != "") ? $kdRak : "";
$ketBuku        = ($ketBuku  != "") ? $ketBuku : "";
$filegambar     = ($filegambar  != "") ? $filegambar : "";
$hargaBuku      = ($hargaBuku  != "") ? $hargaBuku : "";
$sumber         = ($sumber  != "") ? $sumber : "";
$button         = (!empty($_GET['kdedit'])) ? "update" : "submit";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Barang Inventaris</title>

</head>

<body>

<div class="content mt-3 table-responsive">
	<div class="animated fadeIn">
    <div class="">
        
                
                         <!-- ------------------------------ -->   
                        
                         <form action="?page=control&control=bukuControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Data Buku</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Buku</label>
                                                <input id="cc-kode" 
                                                name="kdBuku"
                                                value="<?php echo $kdBuku; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">No ISBN</label>
                                                    <input 
                                                    id="cc-name"
                                                    value="<?php echo $isbn; ?>" 
                                                    name="isbn" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Judul Buku</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $judulBuku; ?>"
                                                    name="judulBuku" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Penulis</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $penulis; ?>"
                                                    name="penulis" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Penerbit</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $penerbit; ?>"
                                                    name="penerbit" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tahun Terbit</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $thTerbit; ?>"
                                                    name="thTerbit" 
                                                    type="number" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Stok</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $stok; ?>"
                                                    name="stok" 
                                                    type="number" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Rak/Lemari</label>
                                                <select required name="cmbRak" data-placeholder="" class="standardSelect" tabindex="1" required>
                                                <option value="">Pilih Rak/Lemari</option>
                                              <?php
                                                            $sql = "SELECT * FROM tb_lib_rak_buku ORDER BY kd_rak";
                                                            $qry = @mysqli_query($koneksi, $sql) or die ("Gagal query");
                                                            while ($data =mysqli_fetch_array($qry)) {
                                                                if ($data['kd_rak']==$kdRak){
                                                                    $cek="selected";
                                                                }
                                                                else {$cek="";}

                                                                    echo "<option value='$data[kd_rak]' $cek>$data[nm_rak]</option>";
                                                            }
                                                            ?> 
                                            </select>
                                            </div>
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Keterangan</label>
                                                    <textarea id="cc-textarea" 
                                                        name="keterangan" 
                                                        class="form-control" required><?php echo $ketBuku; ?></textarea>
                                                </div>

                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Cover Buku</label>
                                                <input 
                                                    name="NamaFile" 
                                                    type="file"
                                                    id="captureInput"
                                                    class="dropify form-control-file form-control height-auto" 
                                                    data-max-file-size="1M"
                                                    data-errormessage-value-missing="Upload Foto"
                                                    accept=".jpg"
                                                    capture
                                                > <?php if (!empty($filegambar)): ?>
                                                <input type="hidden" name="filegambar_lama" value="<?php echo $filegambar; ?>">
                                                
                                            <?php endif; ?>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Harga Buku</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="hargaBuku"
                                                    value="<?php echo $hargaBuku; ?>" 
                                                    type="number" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Sumber</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="sumber"
                                                    value="<?php echo $sumber; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" >
                                                   
                                                </div>
                                                
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <?php echo $button; ?>
                                                        
                                                    </button>
                                                </div>
     
     </form>
                        
                         <!--  update
                           <p class="mt-2">Gambar saat ini: <?php //echo $filegambar; ?> <br> 
                          <img src="image/<?php //echo $filegambar; ?>" style="max-width: 200px;" alt="Gambar saat ini"></p>
                        -->
                        
                    
        </div>
     
	</div>
    
</div>

</body>
</html>
