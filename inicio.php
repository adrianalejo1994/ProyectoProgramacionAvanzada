<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" /> <!-- directorio para usar css-->
	</head>
	<header>
	<?php 
		include("header.php"); 
		?>
	</header>
	<body  style="background-color:#c4d2e7;">


	

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article  style="border-radius:10px" class="post">
								<header>
									<div class="title">
										<h2>Descubrir</h2>
										<p>ultimas preguntas</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2020-11-20"><?php $t=time(); echo(date("Y-m-d",$t)) ?></time> <!-- Programar la fecha desde el servidor para que sea automatica XD -->
									</div>
								</header>
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
								<header>
									<h2>DIME COMO</h2>



									<p>Un lugar para responder preguntas frecuentes</p>

									<td><h1><a href="preguntones.php">Más Preguntones</a></h1></td>

									<p><h3>Todas las Categorias</h3>
									
									&nbsp
									</p>
									<?php 
							include("fcategorias.php"); 
							?> 
								</header>
								
						
						<!-- About 
							<section class="blurb">
								<h2>Acerca de la pagina</h2>
								<p>Es un sitio web de preguntas y respuestas impulsado por una comunidad, que permite a sus usuarios tanto formular preguntas como responderlas. Para hacerlo, el usuario tiene que tener una cuenta en el sitio.</p>
								<ul class="actions">
									<li><a href="#" class="button">Leer mas</a></li>
								</ul>
							</section>-->

						
					</section>
					
			</div>
			<!-- Footer -->
			<?php
				include("footer.php"); 
			?>

	</body>
</html>