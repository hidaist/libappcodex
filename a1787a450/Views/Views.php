<?php
//include __DIR__. "../../../cek_login.php";
//include "../session_admin.php";

$file = isset($_GET['views']) ? $_GET['views'] : '';

switch ($file) {
    case 'usersView':
                        $file_path = __DIR__ . "/users.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

    case 'rakBukuView':
                        $file_path = __DIR__ . "/rakBuku.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'bukuView':
                        $file_path = __DIR__ . "/buku.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBukuView':
                        $file_path = __DIR__ . "/pinjamBuku.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'laporanKembaliBukuView':
                        $file_path = __DIR__ . "/laporanpengembalianBuku.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'ProsesKembaliBukuView':
                        $file_path = __DIR__ . "/pengembalianProsesBuku.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'grafikPeminjamanBuku':
                        $file_path = __DIR__ . "/graphPeminjamanBuku.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'grafikBestBookView':
                        $file_path = __DIR__ . "/graphBestReadBook.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'bukuDetailView':
                        $file_path = __DIR__ . "/bukuDetail.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailRakBukuView':
                        $file_path = __DIR__ . "/rakBukuDetail.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case '':
                        $file_path = __DIR__ . "/opening.view.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailBarangRusakRinganViews':
                        $file_path = __DIR__ . "/barangRusakRinganDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailBarangRusakBeratViews':
                        $file_path = __DIR__ . "/barangRusakBeratDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

}
?>
