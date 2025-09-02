<?php
error_reporting(error_level: 5); 
    // include database connection file
    include __DIR__ .'/../session.php';
    include __DIR__.'/../../librari/inc.conection.php';
    // ---------------------SImpan data button submit.
    if(isset($_POST['submit'])) {
        $kdBuku     = mysqli_real_escape_string($koneksi, $_POST['kdBuku']);
        $isbn       = mysqli_real_escape_string($koneksi, $_POST['isbn']);
        $judulBuku  = mysqli_real_escape_string($koneksi, $_POST['judulBuku']);
        $penulis    = mysqli_real_escape_string($koneksi, $_POST['penulis']);
        $penerbit   = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
        $thTerbit   = mysqli_real_escape_string($koneksi, $_POST['thTerbit']);
        $stok       = mysqli_real_escape_string($koneksi, $_POST['stok']);
        $cmbRak     = mysqli_real_escape_string($koneksi, $_POST['cmbRak']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        $hargaBuku  = mysqli_real_escape_string($koneksi, $_POST['hargaBuku']);
        $sumber     = mysqli_real_escape_string($koneksi, $_POST['sumber']);
       
          
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "/../../image/";
         
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
        //var_dump($_POST);

        
        // Insert  data into table
         $add = mysqli_query($koneksi, " INSERT INTO  tb_lib_buku  SET
                            kd_buku       	          = '$kdBuku',
                            isbn            	      = '$isbn',
                            judul_buku        	      = '$judulBuku',
                            penulis        	          = '$penulis',
                            penerbit           	      = '$penerbit',
                            tahun_terbit              = '$thTerbit',
                            stok                      = '$stok',
                            kd_rak                    = '$cmbRak',
                            keterangan_buku           = '$keterangan',
                            filegambar                = '$nama_gambar',
                            harga_buku                = '$hargaBuku',
                            sumber                    = '$sumber'
                            ");
                           
                         //   $folder = __DIR__ . "/image/"; // ubah directory
                          //  $upload_image = $_FILES['NamaFile']['name'];
                          //  $filesave = $folder . $upload_image;
                          //  move_uploaded_file($_FILES['NamaFile']['tmp_name'], $filesave);
                            
                          //  $unique_name = uniqid(); // Get uniq
                          //  $resize_image = $folder . "resize_" . $unique_name . ".jpg";

		//echo $add;
        if ($add) {
            echo "<font color='red'> Berhasil di Update. </font>";
             echo "<script>
            document.location = '?page=views&views=bukuView&blok1=true';
            </script>";
        exit();
        } 
      }
      
      //------------------ Update Data button update

      if(isset($_POST['update'])) {
        $kdBuku     = mysqli_real_escape_string($koneksi, $_POST['kdBuku']);
        $isbn       = mysqli_real_escape_string($koneksi, $_POST['isbn']);
        $judulBuku  = mysqli_real_escape_string($koneksi, $_POST['judulBuku']);
        $penulis    = mysqli_real_escape_string($koneksi, $_POST['penulis']);
        $penerbit   = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
        $thTerbit   = mysqli_real_escape_string($koneksi, $_POST['thTerbit']);
        $stok       = mysqli_real_escape_string($koneksi, $_POST['stok']);
        $cmbRak     = mysqli_real_escape_string($koneksi, $_POST['cmbRak']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        $hargaBuku  = mysqli_real_escape_string($koneksi, $_POST['hargaBuku']);
        $sumber     = mysqli_real_escape_string($koneksi, $_POST['sumber']);
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "../../../image/";
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
         $update = mysqli_query($koneksi, " UPDATE  tb_lib_buku  SET
                            
                            isbn            	      = '$isbn',
                            judul_buku        	      = '$judulBuku',
                            penulis        	          = '$penulis',
                            penerbit           	      = '$penerbit',
                            tahun_terbit              = '$thTerbit',
                            stok                      = '$stok',
                            kd_rak                    = '$cmbRak',
                            keterangan_buku           = '$keterangan',
                            filegambar                = '$nama_gambar',
                            harga_buku                = '$hargaBuku',
                            sumber                    = '$sumber'
                            WHERE
                            kd_buku       	          = '$kdBuku'
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
          echo"<script>document.location = '?page=views&views=bukuView&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }

      //----------------Delete data 
      if (!empty($_GET['kdhapus'])) {
        
        // Ambil nama file gambar yang akan dihapus
        $sql = "SELECT filegambar FROM tb_lib_buku WHERE kd_buku='".$_GET['kdhapus']."'";
        $qry = mysqli_query($koneksi, $sql) or die("Gagal sql");
        $data = mysqli_fetch_array($qry);
        $filegambar = $data['filegambar'];
        
        // Hapus file gambar jika ada
        if (!empty($filegambar)) {
            $path = __DIR__ . "../../../image/" . $filegambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Hapus data dari tabel
        $sql = "DELETE FROM tb_lib_buku WHERE kd_buku='".$_GET['kdhapus']."'";
        mysqli_query($koneksi, $sql) or die("Gagal query hapus".mysqli_error($koneksi));
        
        echo"<script>document.location='?page=views&views=bukuView&blok1=false';</script>";
    } else {
        exit;
    }
      ?>