<?php

//include __DIR__. "../../cek_login.php";
//include "../../session_admin.php";

?>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$file = isset($_GET['forms']) ? $_GET['forms'] : '';

switch ($file) {
    case 'userForm':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/user.form.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'rakBukuForm':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/rakBuku.form.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'bukuForm':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/buku.form.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBarangForms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pinjamBarang.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pengembalianBukuForm':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pengembalianBuku.form.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

}
?>
