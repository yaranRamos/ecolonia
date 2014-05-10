<!DOCTYPE HTML>
<html>
	<head>
		<base href="<?php echo base_url(); ?>"/>
		<title>e-colonia</title>
		<link rel="stylesheet" type="text/css" href="css/ecolonia-estilo.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/miJs.js"></script>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div id="logo"></div>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<form action="<?php echo site_url(); ?>" methos="POST">
							<input type="submit" value="SALIR" class="salir">
						</form>
					</div>
				</div>
			</div>
		</header>