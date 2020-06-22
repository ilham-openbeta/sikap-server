<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Status</title>
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
				<table style="width: 100%;">
					<tr>
						<td width="200px"><b>Nama Mahasiswa</b></td>
						<td width="10px">:</td>
						<td><?php echo $status['mahasiswa'] ?></td>
					</tr>
					<tr>
						<td><b>Nama Perusahaan</b></td>
						<td>:</td>
						<td>
							<?php echo $status['nama'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Alamat Perusahaan</b></td>
						<td>:</td>
						<td>
							<?php echo $status['alamat'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Kontak Perusahaan</b></td>
						<td>:</td>
						<td>
							<?php echo $status['kontak'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Mulai</b></td>
						<td>:</td>
						<td>
							<?php echo $status['tanggal_mulai'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Selesai</b></td>
						<td>:</td>
						<td>
							<?php echo $status['tanggal_selesai'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Status</b></td>
						<td>:</td>
						<td>
							<?php echo $status['status'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Dosen Pembimbing</b></td>
						<td>:</td>
						<td>
							<?php echo $status['dosen'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Terakhir diupdate</b></td>
						<td>:</td>
						<td>
							<?php echo $status['tanggal_diubah'] ?>
						</td>
					</tr>
					<tr>
						<td><b>Persentase Pelaksanaan KP</b></td>
						<td>:</td>
						<td>
							<?php
							if($status['status'] == 'Terdaftar'): echo '10%';
							elseif($status['status'] == 'Diajukan'): echo '25%';
							elseif($status['status'] == 'Terkirim'): echo '40%';
							elseif($status['status'] == 'Diterima'): echo '60%';
							elseif($status['status'] == 'Kerja Praktek'): echo '80%';
							elseif($status['status'] == 'Laporan'): echo '90%';
							elseif($status['status'] == 'Selesai'): echo '100%';
						  endif;
							?>
						</td>
					</tr>
				</table>
			</hgroup>
			<br>
			<br>

		</section>

		<footer>
			&copy; 2017 SISTEM INFORMASI KP
		</footer>
	</div>
</body>

</html>
