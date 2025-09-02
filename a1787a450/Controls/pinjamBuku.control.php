<?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kdpinjam   = mysqli_real_escape_string($koneksi, $_POST['kdpinjam']);
        $cmbBuku    = mysqli_real_escape_string($koneksi, $_POST['cmbBuku']);
        $cmbPinjam  = mysqli_real_escape_string($koneksi, $_POST['cmbPinjam']);
        $datepinjam = mysqli_real_escape_string($koneksi, $_POST['datepinjam']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        
        //explode
        //list($kduser,$namauser)= explode(",", $namapinjam);
       //$kduser = mysqli_real_escape_string($koneksi, $kduser);
       //$namauser = mysqli_real_escape_string($koneksi, $namauser);
        
        // Insert  data into table
         $add = mysqli_query($koneksi, " INSERT INTO  tb_lib_peminjaman  SET
                            kd_pinjam       	      = '$kdpinjam',
                            kd_buku        	          = '$cmbBuku',
                            kd_user        	          = '$cmbPinjam',
                            date_pinjam        	      = '$datepinjam',
                            keterangan_pinjam  	      = '$keterangan'
                            ");
                           
                         
        if ($add) {
           
             echo "<script>
            document.location = '?page=views&views=pinjamBukuView&blok1=true';
            </script>";
        exit(); 
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }


        //----------------Delete data 
        if (!empty($_GET['kdhapus'])) {
            
            // Hapus data dari tabel
            $sql = "DELETE FROM tb_lib_peminjaman WHERE kd_pinjam='".$_GET['kdhapus']."'";
            mysqli_query($koneksi, $sql) or die("Gagal query hapus".mysqli_error($koneksi));
            
            echo"<script>document.location='?page=views&views=pinjamBukuView&blok1=false';</script>";
        } else {
            exit;
        }
      ?>