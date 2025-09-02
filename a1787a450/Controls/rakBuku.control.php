<?php
    // include database connection file
    include_once __DIR__ ."/../../librari/inc.conection.php";
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kdRak 	        = mysqli_real_escape_string($koneksi, $_POST['kdRak']);
        $nmRak 		    = mysqli_real_escape_string($koneksi, $_POST['nmRak']);
        $detailRak 	    = mysqli_real_escape_string($koneksi, $_POST['detailRak']);
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " INSERT INTO  tb_lib_rak_buku SET
                            kd_rak       	    = '$kdRak',
                            nm_rak        	    = '$nmRak',
                            detail_rak        	= '$detailRak'
                            ");
		echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=rakBukuView&blok1=true';</script>";
      exit();
    		} 
    }
     // Update Form Data Ruang
     if(isset($_POST['update'])) {
        $kdRak 	        = mysqli_real_escape_string($koneksi, $_POST['kdRak']);
        $nmRak 		    = mysqli_real_escape_string($koneksi, $_POST['nmRak']);
        $detailRak 	    = mysqli_real_escape_string($koneksi, $_POST['detailRak']);
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " UPDATE  tb_lib_rak_buku SET
                            nm_rak        	    = '$nmRak',
                            detail_rak        	= '$detailRak'
                            WHERE
                            kd_rak       	    = '$kdRak'
                            ");
		echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=rakBukuView&blok1=true';</script>";
      exit();
    	}
    }
    // Delete Data Ruang 
    if (! $_GET['kdhapus']=="") {
        
        $sql = " DELETE FROM tb_lib_rak_buku
                         WHERE kd_rak ='".$_GET['kdhapus']."'";
        mysqli_query($koneksi, $sql)
                  or die ("Gagal query hapus".mysqli_error($koneksi));
    
                  echo"<script>document.location='?page=views&views=rakBukuView&blok1=false';</script>";
    }
   
    ?>