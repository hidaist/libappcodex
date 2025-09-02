<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CODEX-PLUS</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets2/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets2/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets2/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
 
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php include 'librari/inc.conection.php' ;?>
   	
  	<!-- Start Header -->
	<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default mu-navbar">
			  	<div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>

				      <!-- Text Logo -->
				      <a class="navbar-brand" href="index.php"><i class="fa fa-book" aria-hidden="true"></i> CODEX</a>

				      <!-- Image Logo -->
				      <!-- <a class="navbar-brand" href="index.html"><img src="assets2/images/logo.png"></a> -->


				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav mu-menu navbar-right">
					        <li><a href="#">HOME</a></li>
					        <li><a href="#mu-book-overview">OVERVIEW</a></li>
				            <li><a href="#mu-testimonials">READERS</a></li>
				            <li><a href="#mu-contact"S>LOGIN</a></li>
				      	</ul>
				    </div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-hero">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6 col-sm-push-6">
					<div class="mu-hero-right">
						<img src="assets2/images/ebook.png" alt="Ebook img">
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-sm-pull-6">
					<div class="mu-hero-left">
						<h1>Selamat Datang!</h1>
						<p>Terima kasih sudah berkunjung ke halaman ini.
						Nikmati kemudahan membaca dan belajar kapan saja, di mana saja.
						Perpustakaan digital ini menghadirkan ribuan koleksi buku, jurnal, 
						dan eBook pilihan yang bisa diakses secara praktis.</p>
						
					</div>
				</div>	

			</div>
		</div>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">

		<!-- Start Counter -->
		<section id="mu-counter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-counter-area">

							<div class="mu-counter-block">
								<div class="row">

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-files-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?php
											 $sqlJmlbuku = mysqli_query($koneksi," SELECT SUM(stok) AS Jumlah_buku FROM tb_lib_buku;");
											 $dataJmlBuku = mysqli_fetch_array($sqlJmlbuku);
	 
											 echo $dataJmlBuku['Jumlah_buku']; ?>">0</div>
											<h5 class="mu-counter-name">Stok Buku</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?php
											 $sqlpenerbit = mysqli_query($koneksi," SELECT penerbit FROM tb_lib_buku GROUP BY penerbit");
											 $datapenerbit = mysqli_num_rows($sqlpenerbit);
	 
											 echo $datapenerbit; ?>">0</div>
											<h5 class="mu-counter-name">Penerbit</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-users" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?php
                                        $sqlUsersaktif = mysqli_query($koneksi,"SELECT COUNT(kd_user) as jumlahUseraktif FROM tb_lib_users WHERE STATUS='aktif';");
                                        $dataUser = mysqli_fetch_array($sqlUsersaktif);

                                        echo $dataUser['jumlahUseraktif'];
                                    ?>">0</div>
											<h5 class="mu-counter-name">Pengguna Aktif</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-trophy" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?php 
                                    $sqlPeminjamanBuku = mysqli_query($koneksi,"SELECT * FROM tb_lib_buku 
																								GROUP BY kd_buku
                                        								");
                                    $dataPinjamBuku = mysqli_num_rows($sqlPeminjamanBuku);
                                    echo $dataPinjamBuku;
                                ?>">0</div>
											<h5 class="mu-counter-name">Judul Buku</h5>
										</div>
									</div>
									<!-- / Single Counter -->

								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter -->

		<!-- Start Book Overview -->
		<section id="mu-book-overview">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-book-overview-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Book Overview</h2>
								<span class="mu-header-dot"></span>
								<p></p>
							</div>

							<!-- Start Book Overview Content -->
							<div class="mu-book-overview-content">
								<div class="row">
								<?php 
                                    $sqlPeminjamanBuku = mysqli_query($koneksi,"SELECT 
											b.judul_buku,
											b.keterangan_buku,
											b.filegambar,
											b.penerbit,
											b.penulis,
											COUNT(p.kd_buku) AS total_dibaca
										FROM 
											tb_lib_peminjaman p
										INNER JOIN 
											tb_lib_buku b ON p.kd_buku = b.kd_buku
										GROUP BY 
											b.kd_buku, b.judul_buku, b.keterangan_buku
										ORDER BY 
											total_dibaca DESC, b.judul_buku ASC
										LIMIT 8

                                        ");
                                   
									while($dataArraypinjam = mysqli_fetch_array($sqlPeminjamanBuku)) {
										$ArrayPinjam[] = $dataArraypinjam;
									}
                                ?> 
									<!-- Book Overview Single Content -->
									 <?php foreach($ArrayPinjam As $row): ?>
										
									<div class="col-md-3 col-sm-6">
										<div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												
												<img class="user-avatar" src="image/<?php echo (!empty($row['filegambar']) && file_exists("image/" . $row['filegambar'])) ? $row['filegambar'] : 'no_pic.png'; ?>" alt="User Avatar" width="100px">
											
											</span>
											<h4><?php echo $row['judul_buku']; ?></h4>
											<p><?php echo $row['keterangan_buku']; ?></p>
											<p>Penulis:<?php echo $row['penulis']; ?></p>
											<p>Penerbit:<?php echo $row['penerbit']; ?></p>
										</div>
									</div>
									<?php endforeach; ?>
									<!-- / Book Overview Single Content -->

									

								</div>
							</div>
							<!-- End Book Overview Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Book Overview -->

		

		<!-- Start Video Review -->
		<section id="mu-video-review">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-video-review-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Cari Buku</h2>
								<span class="mu-header-dot"></span>
								<?php include 'buku.search.view.php'; ?>
							</div>

							<!-- Start Video Review Content -->
							<div class="mu-video-review-content">
								
							</div>
							<!-- End Video Review Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Video Review -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Author -->

		<!-- Start Pricing -->
		

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing -->

		<!-- Start Testimonials -->
		<section id="mu-testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-testimonials-area">
							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Our Readers</h2>
								<span class="mu-header-dot"></span>
							</div>
							<?php 
                                    $sqlPembaca = mysqli_query($koneksi,"SELECT 
										tb_lib_users.kd_user,
										tb_lib_users.nama,
										tb_lib_users.foto,
										COUNT(tb_lib_peminjaman.kd_buku) AS total_pinjam
									FROM 
										tb_lib_users
									JOIN 
										tb_lib_peminjaman ON tb_lib_users.kd_user = tb_lib_peminjaman.kd_user
									JOIN 
										tb_lib_buku ON tb_lib_peminjaman.kd_buku = tb_lib_buku.kd_buku
									GROUP BY 
										tb_lib_users.kd_user, tb_lib_users.nama
									ORDER BY 
										total_pinjam DESC
									LIMIT 8
                                        ");
                                   
									while($dataArrayBaca = mysqli_fetch_array($sqlPembaca)) {
										$ArrayBaca[] = $dataArrayBaca;
									}
                                ?> 
							<div class="mu-testimonials-block">
								<ul class="mu-testimonial-slide">
									<?php foreach($ArrayBaca as $rowbaca): ?>
									<li>
										<img class="mu-rt-img" src="gambarimageadm/<?php echo $rowbaca['foto'];?>" alt="img">
										<h5 class="mu-rt-name"> <?php echo $rowbaca['nama']; ?></h5>
										<span class="mu-rt-title"> </span>
									</li>
									<?php endforeach; ?>	
								</ul>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonials -->

	
		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Login</h2>
								<span class="mu-header-dot"></span>
							</div>

							<!-- Start Contact Content -->
							<div class="mu-contact-content">

								<div id="form-messages"></div>
								<?php
								include 'login.php'; 
								?>

							</div>
							<!-- End Contact Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact -->

		<!-- Start Google Map -->
		<section id="mu-google-map">
			
		</section>
		<!-- End Google Map -->

	</main>
	
	<!-- End main content -->	
			
			
	<!-- Start footer -->
	<footer id="mu-footer" role="contentinfo">
		<div class="container">
			<div class="mu-footer-area">
				<div class="mu-social-media">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</div>
				<p class="mu-copyright">&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
			</div>
		</div>

	</footer>
	<!-- End footer -->

	
	
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets2/js/bootstrap.min.js"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets2/js/slick.min.js"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="assets2/js/counter.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets2/js/app.js"></script>
   
 
	
    <!-- Custom js -->
	<script type="text/javascript" src="assets2/js/custom.js"></script>
	
    
  </body>
</html>