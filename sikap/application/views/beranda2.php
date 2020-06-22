<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Beranda</title>
	<?php echo link_tag('assets/css/style.css'); ?>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/image/favicon.png') ?>">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>

<body>
	<div class="wrapper">
		<header>
			<div class="banner">
			</div>
			<nav>
				<ul>
					<a href="<?php echo base_url() ?>">
						<li>Beranda</li>
					</a>
					<a href="<?php echo base_url('daftar-mahasiswa') ?>">
						<li>Daftar Mahasiswa</li>
					</a>
					<a href="<?php echo base_url('ubah-pass') ?>">
						<li>Ubah Password</li>
					</a>
					<a href="<?php echo base_url('logout') ?>">
						<li style="float:right">Logout</li>
					</a>
				</ul>
			</nav>
		</header>

		<section class="courses">
			<hgroup>
				<!-- <img src="<?php echo base_url('assets/image/homey.png') ?>" /> -->
<center><span style="color:blue;font-size:26px;font-family:cursive">Selamat Datang di Sistem Informasi Kerja Praktek </span><br /><br />
<div style="display:block;background-color:#4169e1;width:60%;padding:25px;color:white;border-radius:16px;font-size:16px;font-family:sans-serif;font-weight:bold;text-align:justify">
	Portal ini merupakan portal untuk mengurus segala keperluan Kerja Praktek mahasiswa Sekolah Vokasi Departemen Teknik Elektro dan Informatika Universitas Gadjah Mada.
	<br />Dengan hadirnya portal ini diharapkan dapat mempermudah proses pengajuan Kerja Praktek.
</div> </center>
			</hgroup>
		</section>

		<footer>
			&copy; 2017 SISTEM INFORMASI KP
		</footer>
	</div>
</body>

</html>
