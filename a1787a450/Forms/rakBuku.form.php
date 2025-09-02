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
        $sqlRak  = "SELECT kd_rak,nm_rak,detail_rak FROM tb_lib_rak_buku Where kd_rak='".$_GET['kdedit']."'";
 //       echo"$sql";
        $qryRak  = mysqli_query($koneksi, $sqlRak) or die ("Gagal sql");
        $dataRak = mysqli_fetch_array($qryRak);
        
                $kdRak           = $dataRak['kd_rak'];
                $nmRak           = $dataRak['nm_rak'];
				        $detRak          = $dataRak['detail_rak'];
        
}
//buat variable untuk edit form
$kdRak      = ($kdRak  != "") ? $kdRak : 'KRB-' . uniqid();
$nmRak      = ($nmRak  != "") ? $nmRak : "";
$detRak     = ($detRak != "") ? $detRak : "";
$button     = (!empty($_GET['kdedit'])) ? "update" : "submit";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Rak Buku</title>
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
    <div class="">
        
        
                 <!-- ------------------------------ -->   
     <form action="?page=control&control=rakBukuControl" method="post" class="form-group">
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Data Rak Buku</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Rak Buku</label>
                                                <input id="cc-kode" 
                                                name="kdRak"
                                                value="<?php echo $kdRak; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Rak Buku</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="nmRak"
                                                    value="<?php echo $nmRak;?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Detail Rak Buku</label>
                                                    <textarea id="cc-textarea" 
                                                    name="detailRak" 
                                                    class="form-control" required><?php echo $detRak;?></textarea>
                                                    
                                                </div>
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <?php echo $button; ?>
                                                        
                                                    </button>
                                                </div>
     </form>
                    
        </div>
	</div>
   
</div>

</body>
<script>
  var textarea = document.getElementById('cc-textarea');

  textarea.addEventListener('blur', function() {
    if (textarea.value.trim() === '') {
      textarea.setCustomValidity('Textarea tidak boleh kosong.');
    } else {
      textarea.setCustomValidity('');
    }
  });
</script>
</html>
