<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Dosen</title>
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
						<a href="">Daftar Mahasiswa KP</a>
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
		<div class="col-md-10 col-md-offset-1" style="margin-top:20px;border:2px solid grey;border-radius:10px;padding:20px">
			Halaman Dosen ?
			<hr>cxxx]>>>>>>>>>>>>>>
		</div>
	</section>

	<script src="<?php echo base_url('assets/js/jquery-2.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
</body>

</html>
