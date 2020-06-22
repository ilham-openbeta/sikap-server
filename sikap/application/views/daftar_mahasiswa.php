<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Dosen</title>
	<?php echo link_tag('assets/css/style.css'); ?>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/image/favicon.png') ?>">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style type="text/css">
table, td, tr, th {
	border: 1px solid black;
}
th {
	padding : 3px;
}
td {
	padding : 6px;
}
</style>
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

				<table width="95%">
					<caption>
						<font><strong>------------Daftar Mahasiswa--------------</strong></font>
					</caption>
					<tr style="background-color: Royalblue;">
						<th>
							<font color="white"> <strong>No</strong></font>
						</th>
						<th width="150px">
							<font color="white"> <strong>Mahasiswa</strong></font>
						</th>
						<th width="240px">
							<font color="white"> <strong>Keterangan</strong></font>
						</th>
						<th>
							<font color="white"> <strong>Perusahaan</strong></font>
						</th>
					</tr>
					<?php foreach ($list as $val): ?>
						<tr>
							<td><?php echo $val['id'] ?></td>
							<td>- <?php echo $val['mahasiswa'] ?></td>
							<td>Jurusan : <?php echo $val['jurusan'] ?>
							<br />Tanggal Mulai : <?php echo $val['tanggal_mulai'] ?>
							<br />Tanggal Selesai : <?php echo $val['tanggal_selesai'] ?>
							<br />Status : <?php echo $val['status'] ?>
							<br />Persentase Pelaksanaan KP :
							<?php
							if($val['status'] == 'Terdaftar'): echo '10%';
							elseif($val['status'] == 'Diajukan'): echo '25%';
							elseif($val['status'] == 'Terkirim'): echo '40%';
							elseif($val['status'] == 'Diterima'): echo '60%';
							elseif($val['status'] == 'Kerja Praktek'): echo '80%';
							elseif($val['status'] == 'Laporan'): echo '90%';
							elseif($val['status'] == 'Selesai'): echo '100%';
						  endif;
							?>
						</td>
							<td><?php echo $val['perusahaan'] ?>
							<br />	<?php echo $val['alamat'] ?>
							<br />	<?php echo $val['kontak'] ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>


		</section>

		<footer>
			&copy; 2017 SISTEM INFORMASI KP
		</footer>
	</div>
</body>

</html>
