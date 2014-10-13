<!DOCTYPE HTML>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>"/>
		<title>e-colonia</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/ecolonia-estilo.css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="logo"></div>
					</div>
				</div>
			</div>
		</header>
		<?php $this->load->view($contenido);?>
		<footer>
			<section class="footer">
				<div class="container">
					<article>
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<p>
									@Copyright 2013 ecolonia.org. Derechos reservados.
								</p>
							</div>
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 facebook">
								<a href="http://www.googel.com" target="_blank">
									<img src="media/redes/f.png">
								</a>
							</div>
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 twitter">
								<a href="http://www.googel.com" target="_blank">
									<img src="media/redes/t.png">
								</a>
							</div>
						</div>
					</article>
				</div>
			</section>
		</footer>
	</body>
</html>