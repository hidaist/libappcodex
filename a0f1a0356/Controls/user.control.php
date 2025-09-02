<?php
    // include database connection file
    include_once __DIR__ .'/../../librari/inc.conection.php'; 
    // Add Data Submit ke database
    if(isset($_POST['submit'])) {
        $kdUser 	        = mysqli_real_escape_string($koneksi, $_POST['kdUser']);
        $idUser 	        = mysqli_real_escape_string($koneksi, $_POST['idUser']);
        $namaUser 	        = mysqli_real_escape_string($koneksi, $_POST['namaUser']);
        $userName 	        = mysqli_real_escape_string($koneksi, $_POST['userName']);
        $emailUser 	        = mysqli_real_escape_string($koneksi, $_POST['emailUser']);
        $cmbJk 	            = mysqli_real_escape_string($koneksi, $_POST['cmbJk']);
        $alamatUser 	    = mysqli_real_escape_string($koneksi, $_POST['alamatUser']);
        $tempatLahiruser    = mysqli_real_escape_string($koneksi, $_POST['tempatLahiruser']);
        $tglUser 	        = mysqli_real_escape_string($koneksi, $_POST['tglUser']);
        $cmblevel 	        = mysqli_real_escape_string($koneksi, $_POST['cmblevel']);
        $cmbstatus 	        = mysqli_real_escape_string($koneksi, $_POST['cmbstatus']);
        $password 	        = mysqli_real_escape_string($koneksi, $_POST['password']);
        
        $hashedPassword = hash('sha256', $password);



        $gambar = $_FILES['NamaFile']['tmp_name'];

        // Tentukan path penyimpanan gambar
        $folder = __DIR__ . "/../../gambarimageadm/";
        
        // Generate nama file unik
        $unique_name = uniqid();
        $nama_gambar = $unique_name . ".jpg"; // Ubah ekstensi sesuai format gambar yang diunggah
        
        // Simpan file gambar di path yang ditentukan
        $filesave = $folder . $nama_gambar;
        move_uploaded_file($gambar, $filesave);
       
       $file_size = filesize($filesave);
       
        // Periksa ukuran file dan konversi jika diperlukan
       if ($file_size > 1000000) {
           // Mengkonversi gambar ke 700 KB
           $quality =30.0; // Kualitas gambar (0.0 - 100.0)
           $resized_file = $filesave; // Gunakan nama file asli jika tidak ingin mengubah nama
   
           // Mengubah ukuran gambar sesuai dengan batas maksimum 700 KB
           list($width, $height) = getimagesize($filesave);
           $aspect_ratio = $width / $height;
           $new_width = sqrt(700000 * $aspect_ratio);
           $new_height = $new_width / $aspect_ratio;
   
           // Buat gambar baru dengan ukuran yang diubah
           $img = imagecreatefromjpeg($filesave);
           $resized_img = imagecreatetruecolor($new_width, $new_height);
           imagecopyresampled($resized_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
           imagejpeg($resized_img, $resized_file, $quality);
           imagedestroy($img);
           imagedestroy($resized_img);
       }


        // Insert user data into table
        $add = mysqli_query($koneksi, " INSERT INTO  tb_lib_users SET
                                kd_user          = '$kdUser',
                                id               = '$idUser',
                                nama             = '$namaUser',
                                username         = '$userName',
                                email            = '$emailUser',
                                password         = '$hashedPassword',
                                jenis_kelamin    = '$cmbJk',
                                alamat           = '$alamatUser',
                                tempat_lahir     = '$tempatLahiruser',
                                tgl              = '$tglUser',
                                foto             = '$nama_gambar',
                                level            = '$cmblevel',
                                status           = '$cmbstatus'
                            ");
		//echo $add;
        if ($add) {
          //echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=usersView&blok1=true';</script>";
     
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }


// Update data ke database
if(isset($_POST['update'])) {
        $kdUser 	        = mysqli_real_escape_string($koneksi, $_POST['kdUser']);
        $idUser 	        = mysqli_real_escape_string($koneksi, $_POST['idUser']);
        $namaUser 	        = mysqli_real_escape_string($koneksi, $_POST['namaUser']);
        $userName 	        = mysqli_real_escape_string($koneksi, $_POST['userName']);
        $emailUser 	        = mysqli_real_escape_string($koneksi, $_POST['emailUser']);
        $cmbJk 	            = mysqli_real_escape_string($koneksi, $_POST['cmbJk']);
        $alamatUser 	    = mysqli_real_escape_string($koneksi, $_POST['alamatUser']);
        $tempatLahiruser    = mysqli_real_escape_string($koneksi, $_POST['tempatLahiruser']);
        $tglUser 	        = mysqli_real_escape_string($koneksi, $_POST['tglUser']);
        $cmblevel 	        = mysqli_real_escape_string($koneksi, $_POST['cmblevel']);
        $cmbstatus 	        = mysqli_real_escape_string($koneksi, $_POST['cmbstatus']);
        $password 	        = mysqli_real_escape_string($koneksi, $_POST['password']);
    
     // Ambil data gambar yang diunggah
     $gambar = $_FILES['NamaFile']['tmp_name'];

     // Tentukan path penyimpanan gambar
        $folder = __DIR__ . "/../../gambarimageadm/";
      if(!empty($gambar)) {
        // Generate nama file unik
        $unique_name = uniqid();
        $nama_gambar = $unique_name . ".jpg"; // Ubah ekstensi sesuai format gambar yang diunggah

        // Simpan file gambar di path yang ditentukan
        $filesave = $folder . $nama_gambar;
        move_uploaded_file($gambar, $filesave);

        // Periksa ukuran file dan konversi jika diperlukan
        $file_size = filesize($filesave);
        if ($file_size > 1000000) {
            // Mengkonversi gambar ke 700 KB
            $quality = 40; // Kualitas gambar (0 - 100)

            // Mengubah ukuran gambar sesuai dengan batas maksimum 1 MB
            list($width, $height) = getimagesize($filesave);
            $aspect_ratio = $width / $height;
            $new_width = sqrt(1000000 * $aspect_ratio);
            $new_height = $new_width / $aspect_ratio;

            // Buat gambar baru dengan ukuran yang diubah
            $img = imagecreatefromjpeg($filesave);
            $resized_img = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($resized_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($resized_img, $filesave, $quality);
            imagedestroy($img);
            imagedestroy($resized_img);
        }
    } else {
        $nama_gambar = $_POST['filegambar_lama'];
    }
            
    // Insert user data into table
     $update = mysqli_query($koneksi, " UPDATE  tb_lib_users  SET
                        
                               
                                id               = '$idUser',
                                nama             = '$namaUser',
                                username         = '$userName',
                                email            = '$emailUser',
                                jenis_kelamin    = '$cmbJk',
                                alamat           = '$alamatUser',
                                tempat_lahir     = '$tempatLahiruser',
                                tgl              = '$tglUser',
                                foto             = '$nama_gambar',
                                level            = '$cmblevel',
                                status           = '$cmbstatus'
                        WHERE
                                 kd_user          = '$kdUser'
                        ");
                       
                     //   $folder = __DIR__ . "/image/"; // ubah directory
                      //  $upload_image = $_FILES['NamaFile']['name'];
                      //  $filesave = $folder . $upload_image;
                      //  move_uploaded_file($_FILES['NamaFile']['tmp_name'], $filesave);
                        
                      //  $unique_name = uniqid(); // Get uniq
                      //  $resize_image = $folder . "resize_" . $unique_name . ".jpg";

    //echo $add;
    if ($update) {
      echo "<font color='red'> Berhasil di Update. </font>" ;
      echo"<script>document.location='?page=views&views=usersView&blok1=true';</script>";
 
        } 
}



// Reset password
if(isset($_POST['kdreset'])) {
    $kdUser 	        = mysqli_real_escape_string($koneksi, $_POST['kdUser']);
    $password 	        = mysqli_real_escape_string($koneksi, $_POST['password']);
    $hashedPassword = hash('sha256', $password);    
// Insert user data into table
 $update = mysqli_query($koneksi, " UPDATE  tb_lib_users  SET
                    
                           password         = '$hashedPassword'
                    WHERE
                             kd_user          = '$kdUser'
                    ");
                   

//echo $add;
if ($update) {
  echo "<font color='red'> Berhasil di Update. </font>" ;
  echo"<script>document.location='?page=views&views=usersView&blok1=true';</script>";

    } 
}



 //----------------Delete data ---------------
 if (!empty($_GET['kdhapus'])) {
  
    
    // Ambil nama file gambar yang akan dihapus
    $sql = "SELECT foto FROM tb_lib_users WHERE kd_user='".$_GET['kdhapus']."'";
    $qry = mysqli_query($koneksi, $sql) or die("Gagal sql");
    $data = mysqli_fetch_array($qry);
    $filegambar = $data['foto'];
    
    // Hapus file gambar jika ada
    if (!empty($filegambar)) {
        $path = __DIR__ . "../../../gambarimageadm/" . $filegambar;
        if (file_exists($path)) {
            unlink($path);
        }
    }
    
    // Hapus data dari tabel
    $sql = "DELETE FROM tb_lib_users WHERE kd_user='".$_GET['kdhapus']."'";
    mysqli_query($koneksi, $sql) or die("Gagal query hapus".mysqli_error($koneksi));
    
    echo "<font color='red'> Berhasil di hapus. </font>" ;
    echo"<script>document.location='?page=views&views=usersView&blok1=false';</script>";

} 



    ?>