<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk 		= $this->Konfigurasi_model->nav_produk();
?>
<div class="wrap_header">
	<!-- Logo -->
	<a href="<?php echo base_url() ?>" class="logo">
		<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
		ISSHO MERCH
	</a>

	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<!-- HOME -->
				<li>
					<a href="<?php echo base_url() ?>">Beranda</a>
				</li>

				<!-- MENU PRODUK -->
				<li>
					<a href="<?php echo base_url('produk'); ?>">Produk</a>
					<ul class="sub_menu">
						<?php foreach($nav_produk as $nav_produk) { ?>
							<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>"><?php echo $nav_produk->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	
	<!-- Header Icon -->
	<div class="header-icons">
		<?php if($this->session->userdata('email')) { ?>
			<a href="<?php echo base_url('dasbor') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				<?php echo 
				$this->session->userdata('nama_pelanggan'); ?>
			</a>
			
		<?php }else{ ?>
			<a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

		<?php } ?>

		<span class="linedivide1"></span>

		<div class="header-wrapicon2">
			<?php
			// Check data belanja
			$keranjang = $this->cart->contents();
			?>
			<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">
					<?php
					// Jika tidak ada data
					if(empty($keranjang)) { ?>
						<li class="header-cart-item">
							<p class="alert alert-succes">Keranjang Belanja Kosong</p>
						</li>
					<?php
					// Jika ada
					}else{
						// Total belanja
						$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
						// Tampil data belanja
						foreach($keranjang as $keranjang) {
							$id_produk = $keranjang['id'];
							// Ambil data produk
							$produknya = $this->Produk_model->detail($id_produk);
					?>
					<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
						</div>

						<div class="header-cart-item-txt">
							<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
								<?php echo $keranjang['name'] ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?> : Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.') ?>
							</span>
						</div>
					</li>
					<?php 
					}
				} 
				?>
				</ul>

				<div class="header-cart-total">
					Total : <?php if(!empty($keranjang)) { echo $total_belanja; } ?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</header>