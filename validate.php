<?php
//error_reporting(E_ALL);

// Koneksi ke database
include "./librari/inc.conection.php";
include "fungsi_injection.php";

$username = antiinjection($_POST['username']);
$password = hash('sha256', $_POST['password']);

// Query untuk mendapatkan record dari username di tabel
$query = mysqli_query($koneksi, "SELECT * FROM tb_lib_users WHERE username ='$username'");
$data = mysqli_fetch_array($query);

date_default_timezone_set('Asia/Jakarta');
$current_time = time();
$lock_time = 60 * 5 ; // 5 menit dalam detik

if ($data) {
    // Periksa apakah pengguna terkunci
    if ($data['attemp'] >= 6) {
        $last_attempt_time = strtotime($data['last_attemp']);
        if (($nilai = $current_time - $last_attempt_time) < $lock_time) {
            // Masih dalam periode terkunci
            header('location:index.php?code=4'); // Code 4: Terlalu banyak percobaan login
            exit;
        } else {
            // Periode terkunci selesai, reset attemp
            $reset_attempt = mysqli_query($koneksi, "UPDATE tb_lib_users SET attemp = 0, last_attemp = NULL WHERE username = '$username'");
            if (!$reset_attempt) {
                die("Gagal mereset percobaan login. Error: " . mysqli_error($koneksi));
            }
        }
    }

    // Verifikasi username dan password
    if ($username == $data['username'] && $password == $data['password']) {
        session_start();
        $_SESSION['kd_user']    = $data['kd_user'];
        $_SESSION['username']   = $data['username'];
        $_SESSION['nama']       = $data['nama'];
        $_SESSION['jk']         = $data['jenis_kelamin'];
        $_SESSION['alamat']     = $data['alamat'];
        $_SESSION['foto']       = $data['foto'];
        $_SESSION['level']      = $data['level']; 
        $_SESSION['status']     = $data['status'];
        $_SESSION['id']         = $data['id'];
      
        // Reset percobaan login setelah berhasil login
        $reset_attempt = mysqli_query($koneksi, "UPDATE tb_lib_users SET attemp = 0, last_attemp = NULL WHERE username = '$username'");
        if (!$reset_attempt) {
            die("Gagal mereset percobaan login. Error: " . mysqli_error($koneksi));
        }

        // Redirect sesuai level
        if ($_SESSION['level'] == 'admin') {
            header('location:a1787a450'); // Halaman admin
        } elseif ($_SESSION['level'] == 'anggota') {
            header('location:a0f1a0356'); // Halaman anggota
        } else {
            header('location:index.php?code=5'); // Level tidak dikenal
        }
        exit;
    } else {
        // Tambahkan percobaan login gagal
        $update_attempt = mysqli_query($koneksi, "UPDATE tb_lib_users SET attemp = attemp + 1, last_attemp = NOW() WHERE username = '$username'");
        if (!$update_attempt) {
            die("Gagal memperbarui percobaan login. Error: " . mysqli_error($koneksi));
        }
        header('location:index.php?code=1'); // Code 1: Login gagal
        exit;
    }
} else {
    // Username tidak ditemukan
    header('location:index.php?code=3'); // Code 3: Username tidak ditemukan
    exit;
}
?>
