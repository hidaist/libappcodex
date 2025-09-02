<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$file = isset($_GET['control']) ? $_GET['control'] : '';

switch ($file) {
    case 'userControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/user.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'rakBukuControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/rakBuku.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'bukuControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/buku.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBukuControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pinjamBuku.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'PengembalianBukuControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pengembalianBuku.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
}
?>
