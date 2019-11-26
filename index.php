<?php include_once "includes/ingreso.php";
      include_once "includes/crud.php";
      session_start();
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="CMStudio" />
	<link rel="shortcut icon" href="favicon.ico" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="loginAssets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="loginAssets/css/style.css" type="text/css" />
	<link rel="stylesheet" href="loginAssets/css/dark.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>CBTis 117 </title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: white center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container-fluid vertical-middle divcenter clearfix">

						<div class="center">
							<a href="index.html"><img src="loginAssets/images/cbtis.png" alt="Logo"></a>
						</div>

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
									<h3>Panel de Administraci&oacute;n</h3>

									<div class="col_full">
										<label for="login-form-username">Usuario:</label>
										<input type="text" id="login-form-username" name="usuario" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="usuarioIngreso" name="usuarioIngreso" value="login">login</button>
									</div>

									<?php
							          $ingreso = new Ingreso();
							          $ingreso -> ingresoController();
							        ?>
								</form>


							</div>
						</div>

						<div class="center dark" style="color: blue;"><small>Copyrights &copy; 2019 CBTis 117.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="loginAssets/js/jquery.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="loginAssets/js/functions.js"></script>

</body>
</html>