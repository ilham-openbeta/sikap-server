<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Mahasiswa</title>
	<?php echo link_tag('assets/css/bootstrap.css'); ?>
</head>

<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
				<a class="navbar-brand" href=<?php echo base_url(); ?>>Sistem Informasi</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li>
						<a href="">Profilku</a>
					</li>
					<li>
						<a href="">Daftar KP</a>
					</li>
					<li>
						<a href="">Status</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href=<?php echo base_url('logout'); ?>>Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="container">
		<?php echo form_open('mahasiswa/daftar_kp', 'class="form-horizontal"'); ?>
			<div class="form-group">
				<label for="nim1" class="col-sm-4 control-label">NIM Mahasiswa 1 :</label>
				<div class="col-sm-7">
					<input type="text" name="nim1" id="nim1" placeholder="NIM Mahasiswa 1" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="nim2" class="col-sm-4 control-label">NIM Mahasiswa 2 :</label>
				<div class="col-sm-7">
					<input type="text" name="nim2" id="nim2" placeholder="NIM Mahasiswa 2" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="nim3" class="col-sm-4 control-label">NIM Mahasiswa 3 :</label>
				<div class="col-sm-7">
					<input type="text" name="nim3" id="nim3" placeholder="NIM Mahasiswa 3" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="perusahaan" class="col-sm-4 control-label">Nama Perusahaan :</label>
				<div class="col-sm-7">
					<input type="text" name="perusahaan" id="perusahaan" placeholder="Nama Perusahaan" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-sm-4 control-label">Alamat Perusahaan :</label>
				<div class="col-sm-7">
					<input type="text" name="alamat" id="alamat" placeholder="Alamat Perusahaan" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="tgl_mulai" class="col-sm-4 control-label">Tanggal Mulai :</label>
				<div class="col-sm-7">
					<input type="text" name="tgl_mulai" id="tgl_mulai" placeholder="contoh : 1999-12-31" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="tgl_selesai" class="col-sm-4 control-label">Tanggal Selesai :</label>
				<div class="col-sm-7">
					<input type="text" name="tgl_selesai" id="tgl_selesai" placeholder="contoh : 1999-12-31" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="lampiran" class="col-sm-4 control-label">Lampiran :</label>
				<div class="col-sm-7">
					<input type="file" name="lampiran" id="lampiran">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-7 col-sm-offset-4">
					<input type="submit" value="Submit" class="btn btn-default" style="background-color: lightslategrey;color: white;">
				</div>
			</div>
		<?php echo form_close(); ?>
	</section>

	<script src="<?php echo base_url('assets/js/jquery-2.2.0.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>

</html>
