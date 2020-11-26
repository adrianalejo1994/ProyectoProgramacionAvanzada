<?php include("functions.php"); 

	  ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>TELL ME HOW</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" /> <!-- directorio para usar css-->
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a>TELL ME HOW</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#">Inicio</a></li>
								<li><a href="#">Creditos</a></li>
							</ul>
						</nav>

							<!-- Barra de busqueda -->
							
							<div class="links">
										<form class="flexsearch--form" action="#" method="post">
												<input class="flexsearch--input" type="search" placeholder="Buscar en respuestas">
												<input class="links" type="submit" value="&#10140;"/>
										</form>
							</div>
											
						<nav >
							<ul>
								<a href="login.php" class="links">Ingresar</a>
								<a href="registro.php" class="links">Registrarse</a>
							</ul>
						</nav>
					</header>					

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
										$pregunta;
										

										for($i=0;$i<20;$i++)
										{
										?>
										<div class="post">
										<time class="published" datetime="2020-11-20"><?php 
										echo("Pregunta ".($i+1));
										
										?></div><?php
										}
										?>
									</time> 





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

										
								for($i=0;$i<5;$i++){
									$categoria;	

									Conectar();
									$sql = "SELECT * FROM categoria WHERE IDCATEGORIA ='".($i+1)."'";
									$res = $conn->query($sql);
									foreach($res as $fila)
									{
										$categoria = $fila["NAMECATEGORIA"];
							  
									}
									Desconectar();

							?>
								<section>
									<ul class="posts">
										<li>
											<article>
												<header>
													<h3><a href="single.html">
												<?php		
												echo($categoria); 
												?>
												</a></h3>
											</header>
											<a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
								<?php
								}
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

						<!-- Footer -->
							<section id="footer">
								<p class="copyright">&copy; Arroyo - Arteaga - Guanuche - López </a>.  -- "Proyecto Final" -- </a>.</p>
							</section>

					</section>

			</div>
	
	</body>
</html>