<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<?php echo link_tag('assets/css/bootstrap.css'); ?>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>

<body>

	<div class="col-md-6 col-md-offset-3" style="margin-top:50px;border:2px solid grey;padding:20px;color:black">
		<div class="col-md-2">
			<img src="<?php echo base_url('assets/image/ugm2.png') ?>" width="100%" />
		</div>
		<div class="col-md-9 col-md-offset-1" style="margin-top:5px;padding:10px;border:2px solid lightslategrey">
			<?php echo form_open(base_url(), 'class="form-inline"'); ?>
			<div class="form-group">
				<input type="text" name="username" id="username" placeholder="Username" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" placeholder="Password" class="form-control">
			</div>
			<input type="submit" value="Login" class="btn btn-default">
			<?php echo form_close(); ?>
		</div>
		<div class="" style="text-align:center;font-size:35px">
			<br><br> Sistem Informasi KP
		</div>
		<img src="<?php echo base_url('assets/image/balairung1.jpg') ?>" width="100%" />

		<div style="text-align:center">
			<br> Departemen Teknik Elektro dan Informatika
			<br> Sekolah Vokasi Universitas Gadjah Mada
			<br> Jl.Yacaranda Sekip Unit IV,Yogyakarta.55281
			<br> tedi.sv@ugm.ac.id | Telp.(0274)6491302,56111 | Fax(0274)542908
			<br><br>
			<p>&#169; UNIVERSITAS GADJAH MADA</p>
		</div>

		<script src="<?php echo base_url('assets/js/jquery-2.2.0.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>

</html>
