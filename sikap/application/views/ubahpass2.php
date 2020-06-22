<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Ubah Password</title>
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
				<?php echo form_open('ubah-pass'); ?>
				<div style="align:center;border: 4px;background-color:#4169E1;width:300px;padding:20px;margin:0px auto;padding-bottom:50px">
					<b><font color="white" size="5"> Ubah Password </font></b>
					<hr><font color="white">
					Password Lama 			:<input type="password" name="passlama" size="50" placeholder="Password Lama"><br><br>
					Password Baru 			:<input type="password" name="passbaru1" size="50" placeholder="Password Baru"><br><br>
					Verifikasi Password :<input type="password" name="passbaru2" size="50" placeholder="Verifikasi Password"><br>
					<br></font>
					<?php echo $pesan ?>
					<?php echo validation_errors(); ?>
					<input value="Kirim" style="font-size:16px;background-color: 4985D0; height: 40px; width: 70px;" type="submit"><br><br>
				</div>
				<?php echo form_close(); ?>
			</hgroup>
		</section>

		<footer>
			&copy; 2017 SISTEM INFORMASI KP
		</footer>
	</div>
</body>

</html>
