<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/image/favicon.png') ?>">
		<style type="text/css">
			header, section, footer, aside, nav, article, figure, figcaption {
				display: block;}
			body {
				color: #666666;
				background-color: #f9f8f6;
				background-image: url(<?php echo base_url('assets/image/Bg1.png') ?>);
				background-position: center;
				font-family: Georgia, Times, serif;
				line-height: 1.4em;
				margin: 0px;}
			.wrapper {
				width: 960px;
				height: 800px;
				margin: 30px auto 20px auto;
				border: 8px solid #ffffff;
				background-image: url(<?php echo base_url('assets/image/backk.png') ?>);}
			header {
				height: 160px;
				width: 960px;
				background-image: url(<?php echo base_url('assets/image/headd2.png') ?>);}
			section.courses {
				display: block;
				float: left;
				width: 100%;}
			hgroup {
				margin-top: 200px;
				padding: 100px 10px 10px 180px;
		}
			figure {
				float: left;
				width: 200px;
				height: 100px;
				padding: 10px 30px 10px 20px;
				margin: 10px;
				border: 1px solid #eeeeee;}

			aside {
				width: 230px;
				float: right;
				height: 300;
				margin: 10px;
				padding: 0px;}
			aside section a {
				display: block;
				padding: 50px;
				border-bottom: 1px solid #eeeeee;}
			aside section a:hover {
				color: #000000;
				background-color: #efefef;}
			a {
				color: #000000;
				text-decoration: none;}
				h1, h2, h3 {
					font-weight: normal;}
				h2 {
					margin: 150px 0px 50px 0px;

					padding: 0px 0px 100px 0px;}
				h3 {
					margin: 300px 0px 10px 0px;
					color: #000000;}
					hgroup {
						margin : -250px -200px;
					  padding: -100px 100px 200px 0px;}
				aside h2 {
					padding: 0px 0px 30px 0px;
					color: #4169E1;}

			footer {
				font-size: 80%;
				padding: 7px 0px 60px 10px;}
		</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php echo link_tag('assets/css/radmin.css'); ?>
		<?php echo link_tag('assets/css/radmin-responsive.css'); ?>
		<?php echo link_tag('assets/css/bootstrap.css'); ?>
		<?php echo link_tag('assets/css/bootstrap-responsive.css'); ?>
		<?php echo link_tag('assets/css/icon-style.css'); ?>
		<script src="<?php echo base_url('assets/js/jquery-2.2.0.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.cloneposition.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/theme.js') ?>"></script>

	</head>
	<body>
		<div class="wrapper">
			<header>
			</header>

			<section class="courses">
        				<div class="login-wrapper" style="width:400px;margin:0px auto;margin-top:50px">
        					<div class="login-inner">
        						<h3 class="sign-in">Sign in</h3>
        						<small class="muted">Please sign in using your registered account details</small>
        						<div class="squiggly-border"></div>
        						<div class="login-inner">
        							<?php echo form_open(base_url(), 'class="form-horizontal"'); ?>
        								<div class="input-prepend">
        									<span class="add-on"> <i class="radmin-icon radmin-user"></i>
        									</span>
        									<input name="username" class="input-large" id="input-username" size="16" type="text" placeholder="Username" /></div>
        								<br />
        								<br />
        								<div class="input-prepend">
        									<span class="add-on"> <i class="radmin-icon radmin-locked"></i>
        									</span>
        									<input name="password" class="input-large" id="input-password" size="16" type="password" placeholder="Password" /></div>
        								<div class="form-actions">
													<input type="submit" class="btn btn-large btn-inverse pull-right" id="login" value="Login" />
        								</div>
        							<?php echo form_close(); ?>
        						</div>
        					</div>
        				</div>
			</section>

		</div>
	</body>
</html>
