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
        $sqlFormuser  = "SELECT * FROM tb_lib_users Where kd_user='".$_GET['kdedit']."'";
 //       echo"$sql";
        $qryFormuser  = mysqli_query($koneksi, $sqlFormuser) or die ("Gagal sql");
        $dataFormuser = mysqli_fetch_array($qryFormuser);
        
                $kdUser           = $dataFormuser['kd_user'];
                $idUser           = $dataFormuser['id'];
                $username         = $dataFormuser['username'];
				$email            = $dataFormuser['email'];
				$nama             = $dataFormuser['nama'];
				$jk               = $dataFormuser['jenis_kelamin'];
				$alamat           = $dataFormuser['alamat'];
				$tempatLahir      = $dataFormuser['tempat_lahir'];
				$tgl              = $dataFormuser['tgl'];
				$foto             = $dataFormuser['foto'];
				$level            = $dataFormuser['level'];
        
}
if (!empty($_GET['kdreset'])) {
    $sqlFormuser  = "SELECT * FROM tb_lib_users Where kd_user='".$_GET['kdreset']."'";
//       echo"$sql";
    $qryFormuser  = mysqli_query($koneksi, $sqlFormuser) or die ("Gagal sql");
    $dataFormuser = mysqli_fetch_array($qryFormuser);
    
            $kdUser           = $dataFormuser['kd_user'];
            $idUser           = $dataFormuser['id'];
            $username         = $dataFormuser['username'];
            $email            = $dataFormuser['email'];
            $nama             = $dataFormuser['nama'];
            $jk               = $dataFormuser['jenis_kelamin'];
            $alamat           = $dataFormuser['alamat'];
            $tempatLahir      = $dataFormuser['tempat_lahir'];
            $tgl              = $dataFormuser['tgl'];
            $foto             = $dataFormuser['foto'];
            $level            = $dataFormuser['level'];
    
}
//buat variable kode adamin
$kdUser         = ($kdUser != "") ? $kdUser : 'IDU-' . uniqid();
$idUser         = ($idUser != "") ? $idUser : "";
$username       = ($username != "") ? $username : "";
$email          = ($email != "") ? $email : "";
$nama           = ($nama != "") ? $nama : "";
$jk             = ($jk != "") ? $jk : "";
$alamat         = ($alamat != "") ? $alamat : "";
$tempatLahir    = ($tempatLahir != "") ? $tempatLahir : "";
$tgl            = ($tgl != "") ? $tgl : "";
$foto           = ($foto != "") ? $foto : "";
$level          = ($level != "") ? $level : "";

//buat variable button
$button     = (!empty($_GET['kdedit'])) ? "update" : "submit";


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
     <form action="?page=control&control=userControl" method="post" class="form-group" enctype="multipart/form-data">
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> FORM USER</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode User</label>
                                                <input id="cc-kode" 
                                                name="kdUser"
                                                value="<?php echo $kdUser; ?>"  
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">ID</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="idUser"
                                                    value="<?php echo $idUser; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">Nama</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="namaUser"
                                                    value="<?php echo $nama; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">User Name</label>
                                                    <input 
                                                    id="username" 
                                                    name="userName"
                                                    value="<?php echo $username; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" 
                                                    required <?php if(!empty($_GET['kdreset'])){echo "readonly";} ?>>
                                                    
                                                   
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">email</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="emailUser"
                                                    value="<?php echo $email; ?>" 
                                                    type="email" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">Jenis Kelamin</label>
                                                    <select required name="cmbJk" data-placeholder="" class="standardSelect" tabindex="1" >
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki" <?php if($jk == 'Laki-laki') echo "selected"; ?> >Laki-laki</option>
                                                    <option value="Perempuan" <?php if($jk == 'Perempuan') echo "selected"; ?> >Perempuan</option>
                                                </select>
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">alamat</label>
                                                    <textarea 
                                                    id="cc-textarea" 
                                                    name="alamatUser" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required><?php echo $alamat; ?></textarea>
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="tempatLahiruser"
                                                    value="<?php echo $tempatLahir; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">Tanggal</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="tglUser"
                                                    value="<?php echo $tgl; ?>" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">foto</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="NamaFile"
                                                    type="file" 
                                                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error"> 
                                                    <?php if (!empty($foto)): ?>
                                                <input type="hidden" name="filegambar_lama" value="<?php echo $foto; ?>">
                                                
                                            <?php endif; ?>
                                                </div>
                                                <div class="form-group" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                <label for="cc-number" class="control-label mb-1">Level</label>
                                                <select required name="cmblevel" data-placeholder="" class="standardSelect" tabindex="1" >
                                                    <option value="">Pilih Level</option>
                                                    <option value="admin" <?php if($level == 'admin') echo "selected"; ?> >Admin</option>
                                                    <option value="anggota" <?php  if ($level == 'anggota') echo "selected"; ?> >Anggota</option>
                                                </select>
                                                </div>
                                                <div class="form-group" <?php if(!empty($_GET['kdreset'])){echo "hidden";} ?>>
                                                <label for="cc-number" class="control-label mb-1">Status</label>
                                                <select required name="cmbstatus" data-placeholder="" class="standardSelect" tabindex="1" >
                                                    <option value="Aktif" <?php if($level == 'Aktif') echo "selected"; ?> >Aktif</option>
                                                    <option value="Tidak" <?php  if ($level == 'Tidak') echo "selected"; ?> >Tidak</option>
                                                </select>
                                                </div>
                                                <div class="form-group has-success" <?php if(!empty($_GET['kdedit'])){echo "hidden";} ?>>
                                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                                    <div class="input-group">
                                                        <input 
                                                            id="cc-name" 
                                                            name="password" 
                                                            type="password" 
                                                            class="form-control fa fa-eye" 
                                                            <?php if(!empty($_GET['kdedit'])){echo "";}else echo "required"; ?>>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="" type="submit" class="btn btn-sm btn-lg btn-success btn-block" name="<?php if(!empty($_GET['kdreset'])){echo "kdreset";}else{echo $button;} ?>">
                                                    <?php if(!empty($_GET['kdreset'])){echo "Reset";}else{echo $button;} ?>
                                                    </button>
                                                </div>
     
     </form>
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
