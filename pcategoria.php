<!DOCTYPE HTML>
<!-- Se muestran las preguntas por categoria -->
<html>
<?php 
$categoria=$_GET['var'];

?>
<head>
	<title>Futuro Imperfecto</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload" style="background-color:#c4d2e7;">
	<div id="wrapper">

		<!-- Header -->
		<?php
		include("header.php"); 
		?>


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
<<<<<<< HEAD
			//Ingreso a la pagina donde se programan las preguntas
			require_once("fpreguntas.php");
=======
			include("fpreguntas.php");
			
>>>>>>> Darling
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
<<<<<<< HEAD
				require_once("fcategorias.php"); 

=======
				//include("fcategorias.php"); 
>>>>>>> Darling
			?> 
		</div>

			<!-- Footer -->
		<?php
		include("header.php"); 
		?>

</body>
</html>
