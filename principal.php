

<!DOCTYPE HTML>
<html>
	<head>
		<title>Future Imperfecto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="single is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a>Futuro Imperfecto Answers</a></h1>
						<nav class="links">
							<ul>
								<li><a href="inicio.php">Inicio</a></li>
							</ul>
							
						</nav>
						<nav >
							<ul>
								<a href="logout.php" class="links">SALIR</a>
							</ul>
						</nav>
					</header>


				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Pregunta</a></h2>
										<p>Por favor realiza una pregunta</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time> <!-- Programar la hora automatica con el servidor y la imagen con el nombre del nick name -->
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>

									<?php
										session_start();

										if ( isset( $_SESSION['usuarioactivo'] ) ) {
											
										} else {
											header("Location: login.php");
										}
										//commit probar 6
										// el macho digo yo-.....
									?>


									<?php
									if($_SESSION["usuarioactivo"]) {
									?>
									Welcome <?php echo $_SESSION["usuarioactivo"]; ?>. Bienvenido <a href="logout.php" tite="Logout">Logout.
									<?php
									}else echo "<h1>Please login first .</h1>";
									?>



								</header>
								<span class="image featured"><img src="images/pregunta.jpg" alt="" /></span>
								</footer>
							</article>
					</div>

				<!-- Footer -->
					<section id="footer">
						<p class="copyright">&copy; Arroyo - Arteaga - Guanuche - López </a>.  -- "Proyecto Final" -- </a>.</p>
					</section>

			</div>

	</body>
</html>