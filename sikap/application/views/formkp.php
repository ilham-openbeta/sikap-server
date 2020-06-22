<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>FORM</title>
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
				<?php echo form_open_multipart('pengajuan'); ?>
				<div style="align:center;border: 4px;background-color:#4169E1;width:600px;padding:20px;margin:0px auto;padding-bottom:30px">
					<b><font color="white" size="5"> Form Pendaftaran Kerja Praktek </font></b><br /><br />
					<span style="color:white;font-size:14px;">Harap lengkapi form di bawah ini dengan benar karena form hanya dapat disubmit sekali dan tidak dapat diubah.
						Jika ada masalah, hubungi bagian akademik.</span>
					<hr>
					<p>
						<font color="white"> <strong>NIM Mahasiswa *</strong></font>
					</p>
					<font color="white"> <?php echo $nim ?> ,
					<input type="text" name="nim2" size="20" placeholder="NIM Mahasiswa 2"> ,
					<input type="text" name="nim3" size="20" placeholder="NIM Mahasiswa 3"><br></font>
					<br>
					<p>
						<font color="white"> <strong>Data Perusahaan</strong></font>
					</p>
					<input type="text" name="perusahaan" size="46" placeholder="Nama Perusahaan"><br><br>
					<input type="text" name="alamat" size="56" placeholder="Alamat Perusahaan"><br><br>
					<input type="text" Name="kontak" size="46" placeholder="Kontak Perusahaan"><br>
					<br><p><b> <font color="white"> <strong>Tanggal Mulai</strong></font></b></p>
					<select name="tgl1">
      <option value="1">-Tanggal-</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      </select>
					<select name="bln1">
      <option value="1">-Bulan-</option>
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
      <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
      </select>
					<select name="thn1">
      <option value="2016">-Tahun-</option>
      <option value="2016">2016</option>
	  <option value="2017">2017</option>
	  <option value="2018">2018</option>
      </select><br>
					<br><p><b> <font color="white"> <strong>Tanggal Selesai </strong></font></b></p>
					<select name="tgl2">
			<option value="1">-Tanggal-</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			<option value="32">32</option>
			</select>
					<select name="bln2">
			<option value="1">-Bulan-</option>
			<option value="1">Januari</option>
			<option value="2">Februari</option>
			<option value="3">Maret</option>
			<option value="4">April</option>
			<option value="5">Mei</option>
			<option value="6">Juni</option>
			<option value="7">Juli</option>
			<option value="8">Agustus</option>
			<option value="9">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
			</select>
					<select name="thn2">
			<option value="2016">-Tahun-</option>
      <option value="2016">2016</option>
	  <option value="2017">2017</option>
	  <option value="2018">2018</option>
			</select>
					<br><br><p><b> <font color="white"> Lampiran Proposal <span style="font-size:12px">(File PDF ukuran < 1MB) </span>:
					<br><input name="lampiran" type="file" accept=".pdf"/></font></b></p>
					<br>
					<?php echo $pesan ?>
					<?php echo validation_errors(); ?>
					<input value="Kirim" style="font-size:16px;background-color: 4985D0; height: 40px; width: 70px;" type="submit"><br>
					<hr />
					<span style="color:white;font-size:13px">* Jika hanya 1 mahasiswa maka tidak perlu mengisi NIM 2 dan 3, jika ada 2 atau 3 mahasiswa dalam satu kelompok KP maka silahkan isi kotak NIM sesuai dengan jumlah mahasiswanya.</span>
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
