<!DOCTYPE HTML>
<!-- Se muestran las preguntas por categoria -->
<html>
<?php 
$categoria=$_GET['var'];
session_start();

?>
<head>
	<title>Futuro Imperfecto</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>


	<header>
	<?php 
		include("header.php"); 
	?>
	</header>




<body class="is-preload" style="background-color:#c4d2e7;">
<a href="inicio.php" ><img src="images/regreso.png" class="imag4" width="70" height="60"/></a>

	<div id="wrapper">



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
			//Ingreso a la pagina donde se programan las preguntas
			require_once("fpreguntas.php");
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
				require_once("fcategorias.php"); 

			?> 
		</div>

			<!-- Footer -->
		<?php
		include("footer.php"); 
		?>

</body>
</html>
