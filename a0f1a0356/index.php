<?php 
include '../a0f1a0356/session.php';
include '../librari/inc.conection.php';
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CODEX-PLUS (library)</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    
    <link rel="stylesheet" href="../vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    
    
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('search-input');
                    const itemsToSearch = document.querySelectorAll('.searchable-item');

                    searchInput.addEventListener('input', function() {
                        const searchText = searchInput.value.toLowerCase();

                        itemsToSearch.forEach(function(item) {
                            const textContent = item.textContent.toLowerCase();
                            if (textContent.includes(searchText)) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });
            </script>
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo1.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href=""><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Users</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="?page=views&views=usersView">Users</a></li> 
                            <!-- <li><i class="fa fa-id-badge"></i><a href="?page=views&views=usersviews">Petugas/Pegawai</a></li> -->
                            
                        </ul>
                    </li>
                    <h3 class="menu-title">Data Buku</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Buku</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-book"></i><a href="?page=views&views=bukuView">Buku</a></li>
                     </ul>
                    </li>
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Grafik</a>
                        <ul class="sub-menu children dropdown-menu">
                           <!-- <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="?page=views&views=grafikPeminjamanBuku">Peminjaman</a></li> -->
                            <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="?page=views&views=grafikBestBookView">Best Read</a></li>
                            
                        </ul>
                    </li>
                    <!-- <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-book"></i><a href="?page=laporanbarangbulan">Pengeluaran Bulanan </a></li> 
                            <li><i class="menu-icon fa fa-book"></i><a href="?page=laporanbarangtahun">Tahunan </a></li>
                            
                        </ul>
                    </li> -->

                    <h3 class="menu-title">Peminjaman Buku</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Peminjam Buku </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="?page=views&views=ProsesKembaliBukuView">Peminjaman Buku </a></li>
                            <li><i class="fa fa-gears"></i><a href="?page=views&views=laporanKembaliBukuView">Laporan Peminjaman </a></li>
                        </ul>
                    </li>
                    <!-- 
                    <h3 class="menu-title">Data Table</h3>/.menu-title
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="">Data Table</a></li>
                            <li><i class="fa fa-table"></i><a href="">Data Table</a></li>
                        </ul>
                    </li>
                     -->
                </ul>
                   
            </div><!-- /.navbar-collapse -->
        </nav>
        <?php include_once "spcont.php"; ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel ">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
            
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search" id="search-input">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                        <!--
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>
                        -->
                        
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../gambarimageadm/<?php echo $_SESSION['foto'] ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="?page=views&views=usersView"><i class="fa fa-user"></i> My Profile</a>
                            <!--
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            -->
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    

                </div>
            </div>
                
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="content mt-3">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
             

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
             

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
             </div> -->
             
            <!--/.col-->
            <?php
            if (isset($_GET['blok1']) && $_GET['blok1'] == 'true') {
                echo '<div class="col-sm-12" id="blok1">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">saving was successful</span> You successfully read this important alert message.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
            }
            if (isset($_GET['blok1']) && $_GET['blok1'] == 'false') {
                echo '<div class="col-sm-12">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-danger">delete was successful</span> You successfully read this important alert message.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
            }
            ?>
            <div class="col-lg-12 col-md-6 searchable-item">
                <div class="card bg-flat-color-1 text-light">
                    <i class="media-body"></i>
                            <span class="media-body" align="center"> &nbsp; Selamat Datang di Digital Lib </span>
                <!--/media body Panggil untuk membuka File PHP dari bukafile.php chookie di kirim dari link ahref-->
                    <div class="col-lg-12 card"> <span class="text-dark" > <?php include  "opendir.php"; ?> </span>
                    </div>   
                </div>
            </div>
            
            
            <div class="col-xl-3 col-lg-6 searchable-item">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=ProsesKembaliBukuView'>
                            <div class="stat-icon dib"><i class="ti-book bg-flat-color-5  float-left text-light"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Pinjam Buku</div>
                                <div class="stat-digit">
                                    <?php 
                                        $sqlJmlbuku = mysqli_query($koneksi," SELECT 
                                                tb_lib_users.nama,
                                                tb_lib_peminjaman.date_pinjam,
                                                tb_lib_peminjaman.kd_pinjam,
                                                tb_lib_peminjaman.keterangan_pinjam,
                                                tb_lib_buku.judul_buku,
                                                tb_lib_buku.kd_buku,
                                                tb_lib_buku.isbn,
                                                DATEDIFF(CURDATE(), tb_lib_peminjaman.date_pinjam) AS lama_pinjam
                                            FROM tb_lib_users
                                            JOIN tb_lib_peminjaman ON tb_lib_users.kd_user = tb_lib_peminjaman.kd_user
                                            JOIN tb_lib_buku ON tb_lib_buku.kd_buku = tb_lib_peminjaman.kd_buku
                                            LEFT JOIN tb_lib_pengembalian ON tb_lib_pengembalian.kd_pinjam = tb_lib_peminjaman.kd_pinjam
                                            WHERE tb_lib_users.kd_user = '".$_SESSION['kd_user']."'
											AND tb_lib_pengembalian.kd_pinjam IS NULL");
                                            $dataJmlBuku = mysqli_num_rows($sqlJmlbuku);

                                        echo $dataJmlBuku;
                                    ?> 
                                    </div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=usersView'>
                            <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Id Anggota</div>
                                <div class="stat-digit">
                                    <?php

                                        echo $_SESSION['id'];
                                    ?>
                                   
                                </div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href=''>
                            <div class="stat-icon dib"><i class="ti-book bg-danger text-light"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Peminjaman Buku</div>
                                <div class="stat-digit"> 
                                <?php 
                                    $sqlPeminjamanBuku = mysqli_query($koneksi,"SELECT 
                                                tb_lib_users.nama,
                                                tb_lib_peminjaman.date_pinjam,
                                                tb_lib_peminjaman.kd_pinjam,
                                                tb_lib_peminjaman.keterangan_pinjam,
                                                tb_lib_buku.judul_buku,
                                                tb_lib_buku.kd_buku,
                                                tb_lib_buku.isbn,
                                                DATEDIFF(CURDATE(), tb_lib_peminjaman.date_pinjam) AS lama_pinjam
                                            FROM tb_lib_users
                                            JOIN tb_lib_peminjaman ON tb_lib_users.kd_user = tb_lib_peminjaman.kd_user
                                            JOIN tb_lib_buku ON tb_lib_buku.kd_buku = tb_lib_peminjaman.kd_buku
                                            LEFT JOIN tb_lib_pengembalian ON tb_lib_pengembalian.kd_pinjam = tb_lib_peminjaman.kd_pinjam
                                            WHERE tb_lib_pengembalian.kd_pinjam IS NULL limit 100 ");

                                            $dataPeminjamanBuku = mysqli_num_rows($sqlPeminjamanBuku);   

                                            echo $dataPeminjamanBuku;
                                ?> 
                                </div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href=''>
                            <div class="stat-icon dib"><i class="fa fa-moon-o bg-warning  float-left text-light"></i></div>
                            <div class="stat-content dib">
                            <?php 
                                    $sqlPeminjamanBuku = mysqli_query($koneksi,"SELECT
                                            tb_lib_buku.judul_buku,
                                            COUNT(tb_lib_buku.kd_buku) AS jumlah_pinjaman
                                        FROM
                                            tb_lib_peminjaman
                                        INNER JOIN
                                            tb_lib_buku ON tb_lib_peminjaman.kd_buku = tb_lib_buku.kd_buku
                                        GROUP BY
                                            tb_lib_buku.judul_buku LIMIT 3
                                        ");
                                    $dataPinjamBuku = mysqli_fetch_array($sqlPeminjamanBuku);
                                    
                                ?>
                                <div class="stat-text"> Popular Book <?php echo $dataPinjamBuku['judul_buku']; ?></div>
                                <div class="stat-digit">
                                <?php echo $dataPinjamBuku['jumlah_pinjaman'];
                                     ?>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
            </div>

            <div class="card col-lg-6">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4"><a href='?page=views&views=rakBukuView'>
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="h4 mb-0"> 
                        <?php 
                            $sqlRakBuku     =mysqli_query($koneksi,"SELECT * FROM tb_lib_rak_buku GROUP BY kd_rak");
                            $dataRakBuku    =mysqli_num_rows($sqlRakBuku);
                            echo $dataRakBuku;
                        ?>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Jumlah Rak/Almari Buku</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;">  </div>
                </div>
            </div>
            <div class="card col-lg-6">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="h4 mb-0">
                    <?php 
                        // Set timezone untuk Jakarta
                        date_default_timezone_set('Asia/Jakarta');
                        
                        // Mendapatkan tanggal dan jam sekarang
                        $tanggal_sekarang = date('d-m-Y');
                        $jam_sekarang = date('H:i:s');
                        $hari_sekarang = date('l'); // Nama hari dalam bahasa Inggris
                        
                        // Array untuk konversi nama hari ke bahasa Indonesia
                        $hari_indonesia = array(
                            'Sunday' => 'Minggu',
                            'Monday' => 'Senin', 
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu'
                        );
                        
                        $hari_indonesia_sekarang = $hari_indonesia[$hari_sekarang];
                        
                        // Menampilkan tanggal dan jam
                        echo  $hari_indonesia_sekarang . ", " . $tanggal_sekarang ;
                        echo "||" . $jam_sekarang;
                    ?>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Date</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 100%; height: 5px;"></div>
                </div>
            </div>

            <!-- Side Bawah Informasi table -->
           

             <!-- .content -->
        
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/init-scripts/chart-js/chartjs-init.js"></script> 
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/chosen/chosen.jquery.min.js"></script>
    
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial' 
            });
        })(jQuery);
    </script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
     <!--  Chart js -->
    
    <!-- pagination -->

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables dengan paging
        $('#myTable1').DataTable({
            paging: true, // Aktifkan paging
            lengthMenu: [5, 10, 25, 50], // Tampilkan opsi jumlah data per halaman
            pageLength: 5 // Atur jumlah data per halaman menjadi 5
        });
        $('#myTable2').DataTable({
            paging: true, // Aktifkan paging
            lengthMenu: [5, 10, 25, 50], // Tampilkan opsi jumlah data per halaman
            pageLength: 5 // Atur jumlah data per halaman menjadi 5
        });
    });
</script>
    
     
       

</body>

</html>
