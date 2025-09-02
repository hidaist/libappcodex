<!DOCTYPE html>

<html>
<head>
    


</head>


<body class="bg-dark">

<div class="noclas">
		<div class="login-form" id="form-messages">
		<div class="mu-contact-content">
							<form action="validate.php#mu-contact" method="post">
							<div class="" > 
								<div class="form-group">                
										<input type="text" class="form-control" placeholder="UserName" id="name"  name="username" required>
									</div>  
								<div class="form-group">                
										<input type="password" class="form-control" placeholder="Password" id="name" name="password" required>
									</div>  
									<button type="submit" class="mu-send-msg-btn"><span>SUBMIT</span></button> 
                    </form>
		</div>
	</div>
                            <?php
		if(@$_GET['code'] == 1) {
		?>
		<div class="alert alert-danger">
			Username or Password Wrong !!!
		</div>
		<?php
		}
		if(@$_GET['code'] == 2) {
		?>
		<div class="alert alert-success">
			Anda Telah Keluar (Logout)
		</div>
		<?php
		}
		if(@$_GET['code'] == 3) {
		?>
		<div class="alert alert-danger">
			Username Tidak Ditemukan !!!
		</div>
		<?php
		}
		if(@$_GET['code'] == 4) {
			?>
			<div class="alert alert-danger">
				Terlalu banyak percobaan login, tunggu beberapa saat lagi !!!
			</div>
			<?php
			}
			if(@$_GET['code'] == 5) {
				?>
				<div class="alert alert-danger">
					ANDA HARUS LOGIN TERLEBIH DAHULU !!!
				</div>
				<?php
				}	
		?>
                           
    
						</div>
					</div>
			  </div>
			</div>
</div>
		<!-- welcome modal start -->
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	</body>
</html>
