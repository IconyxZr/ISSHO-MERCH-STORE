<?php
// Load data konfigurasi website
$site 				= $this->Konfigurasi_model->listing();
$nav_produk_footer	= $this->Konfigurasi_model->nav_produk();
?>
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
				</h4>

				<div>
					<div class="flex-m p-t-30">
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori Produk
				</h4>

				<ul>
					<?php foreach($nav_produk_footer as $nav_produk_footer) { ?>
					<li class="p-b-9">
						<a href="<?php echo base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>" class="s-text7">
							<?php echo $nav_produk_footer->nama_kategori ?>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					<br>
					KONTAK KAMI
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="https://goo.gl/maps/GeTDZDqjBpBi23qUA">
						<?php echo nl2br($site->alamat) ?>
					</li>

					<li class="p-b-20">
						<a href="https://mail.google.com/mail/u/0/#drafts?compose=DmwnWslwxHNHtpwLcskFfjWFmSMzPxgMbpDkqQwglbPmTtwzfRHfJzdZRHjfCVHdcrCFhXzGFGPQ">
						<i class="fa fa-envelope"> <?php echo $site->email ?></i> 
						</a>
					</li>

					<li class="p-b-9">
						<a href="https://api.whatsapp.com/send?phone=6285646675326">
						<i class="fa fa-phone"> <?php echo $site->telepon ?></i>
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					<br>
					SOSIAL MEDIA
				</h4>

				<ul>
					<li class="p-b-9">
					<a href="<?php echo $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="https://www.instagram.com/issho.merch/" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2020 by <a href="<?php echo base_url() ?>">ISSHOMERCH</a> All rights reserved. 
			</div>
		</div>
	</footer>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/js/main.js"></script>
</body>
</html>
