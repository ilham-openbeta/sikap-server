<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<?php echo link_tag('assets/css/bootstrap.css'); ?>
</head>

<body>

	<section class="container">
		<div class="col-md-6 col-md-offset-3" style="margin-top:50px;border:2px solid grey;padding:20px;background-color:#073C64;color:white">
			<h2>LOGIN</h2>
			<hr>
			<?php echo form_open('login', 'class="form-horizontal"'); ?>
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label">Username :</label>
				<div class="col-sm-7">
					<input type="text" name="username" id="username" placeholder="Username" class="form-control">
					<?php echo form_error('username'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password :</label>
				<div class="col-sm-7">
					<input type="password" name="password" id="password" placeholder="Password" class="form-control">
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-7 col-sm-offset-4">
					<?php echo $pesan; ?>
					<input type="submit" value="Login" class="btn btn-default" style="background-color: lightslategrey;color: white;">
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</section>

	<script src="<?php echo base_url('assets/js/jquery-2.2.0.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>

</html>
