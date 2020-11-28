<?php //include("functions.php"); 
session_start();


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>TELL ME HOW</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" /> <!-- directorio para usar css-->
	</head>
	<body class="is-preload" style="background-color:#c4d2e7;">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<?php
				include("header.php"); 
				?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>Descubrir</h2>
										<p>ultimas preguntas</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2020-11-20"><?php $t=time(); echo(date("Y-m-d",$t)) ?></time> <!-- Programar la fecha desde el servidor para que sea automatica XD -->
									</div>
								</header>

								<footer>

								</footer>
							</article>



						<!-- Preguntas -->
						<?php 
						include_once("paleatorias.php"); //se cargan las preguntas aleatorias 
						?>


						<!-- Pagination -->
							<ul class="actions pagination">
								<li><a href="" class="disabled button large previous">Anterior Pagina</a></li>
								<li><a href="#" class="button large next">Siguiente Pagina</a></li>
							</ul>

					</div>



					

				<!-- Sidebar izquierdo -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" ><img src="images/pensando.png" alt="" class="logo"/></a> <!-- agregar la clase logo si se quiere redimencionar--->
								<header>
									<h2>DIME COMO</h2>
									<p>Un lugar para responder preguntas frecuentes</p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
									<header>
										<h2>Todas las Categorias</h2>
									</header>
								</div>
							</section>

						<!-- Categorias -->
			
							<?php 
							include("fcategorias.php"); 
							?> 
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>Acerca de la pagina</h2>
								<p>Es un sitio web de preguntas y respuestas impulsado por una comunidad, que permite a sus usuarios tanto formular preguntas como responderlas. Para hacerlo, el usuario tiene que tener una cuenta en el sitio.</p>
								<ul class="actions">
									<li><a href="#" class="button">Leer mas</a></li>
								</ul>
							</section>

						
					</section>
					
			</div>
			<!-- Footer -->
			<?php
				include("footer.php"); 
			?>

	</body>
</html>