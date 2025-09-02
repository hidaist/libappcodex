<?php 
// cek session
error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
?>
<?php
include_once __DIR__ ."/../../librari/inc.conection.php";
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kdkembali = mysqli_real_escape_string($koneksi, $_POST['kdkembali']);
        $kdpinjam  = mysqli_real_escape_string($koneksi, $_POST['kdpinjam']);
        $kdBuku    = mysqli_real_escape_string($koneksi, $_POST['kdBuku']);
        $datekembali = mysqli_real_escape_string($koneksi, $_POST['datekembali']);
       // $checkkembali = mysqli_real_escape_string($koneksi, $_POST['checkkembali']);
        var_dump($_POST);
        // Insert  data into table
         $add = mysqli_query($koneksi, " INSERT INTO  tb_lib_pengembalian  SET
                            kd_kembali       	      = '$kdkembali',
                            kd_pinjam        	      = '$kdpinjam',
                            kd_buku        	          = '$kdBuku',
                            date_kembali       	      = '$datekembali'
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
            document.location = '?page=views&views=ProsesKembaliBukuView&blok1=true';
            </script>";
        exit();
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }
      ?>