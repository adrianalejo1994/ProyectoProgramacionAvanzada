<!DOCTYPE HTML>
<html>

<head>
	<title>Futuro Imperfecto</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<?php
			$categoria=$_GET['var'];
			?>
			<h1><a>TELL ME HOW</a></h1>
			<nav class="links">
				<ul>
					<li><a href="inicio.php">Inicio</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<!-- Preguntas -->
		<div id="main">
		<article class="post">
			<header>
				<div class="title">
					<h2><?php echo $categoria; ?></h2>
					<p>ultimas preguntas</p>
				</div>
				<div class="meta">
					<time class="published" datetime="2020-11-20"><?php $t = time();
						echo (date("Y-m-d", $t)) ?></time> <!-- Programar la fecha desde el servidor para que sea automatica XD -->
				</div>
			</header>
			<?php
			//include("fpreguntas.php");
			
			?>
			</time>


			<!-- Pie -->				
			<footer>
			<ul class="actions pagination">
				<li><a href="" class="disabled button large previous">Anterior Pagina</a></li>
				<li><a href="#" class="button large next">Siguiente Pagina</a></li>
			</ul>
			</footer>
			</article>
		</div>		

		<!-- Slidebar -->
		<section id="sidebar">
		<section>
			<div class="mini-posts">
				<header>
					<h2>Categorías</h2>
				</header>
			</div>
		</section>
		<section>
			<?php 
				include("fcategorias.php"); 
			?> 
			</section>

			<!-- Footer -->
			<section id="footer">
			<p class="copyright">&copy; Arroyo - Arteaga - Guanuche - López </a>. -- "Proyecto Final" -- </a>.</p>
			</section>
		</section>
	</div>
</body>
</html>
