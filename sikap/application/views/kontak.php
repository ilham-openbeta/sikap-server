<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Kontak</title>
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
					<a href="<?php echo base_url('profil') ?>">
						<li>Profil</li>
					</a>
					<a href="<?php echo base_url('pengajuan') ?>">
						<li>Pengajuan</li>
					</a>
					<a href="<?php echo base_url('alur') ?>">
						<li>Alur Pendaftaran</li>
					</a>
					<a href="<?php echo base_url('kontak') ?>">
						<li>Kontak</li>
					</a>
					<a href="<?php echo base_url('ubah-password') ?>">
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
				<h3><strong>HUBUNGI KAMI</strong></h3>
				<strong>DEPARTEMEN TEKNIK ELEKTRO DAN INFORMATIKA</strong><br/>
				<strong>SEKOLAH VOKASI UNIVERSITAS GADJAH MADA</strong>
				<br/><br/> Jl. Yacaranda, Sekip Unit IV, Yogyakarta. 55281
				<br/> tedi.sv@ugm.ac.id | Telp. (0274) 6491302, 56111 | Fax (0274) 542908<br/>
				<h5>LINK</h5>
				<ul>
					<li><a href="" target="_blank">Website Departemen Teknik Elektro SV UGM</a></li>
				</ul>
			</hgroup>

		</section>

		<footer>
			&copy; 2017 SISTEM INFORMASI KP
		</footer>
	</div>
</body>

</html>
