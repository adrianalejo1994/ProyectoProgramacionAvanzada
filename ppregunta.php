<?php 
include("functionshe.php");
session_start();
Conectarhe();
$idpregunta=$_GET{"var"}; //obtencion del nombre de categoria
//echo$idpregunta;
$sql = "SELECT *  FROM pregunta WHERE IDPREGUNTA ='".$idpregunta."'"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);

foreach ($idpre as $fila) {
    $pregunta = $fila["TITULO"]; //almacena las ids de las preguntas
    $descri = $fila["DESCRIPCIONPREGUNTA"];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>TELL ME HOW</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" /> <!-- directorio para usar css-->
	</head>

	<header>
	<?php 
		include("header.php"); 
		?>
	</header>

	<body class="is-preload" style="background-color:#c4d2e7;">

		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post"  style="border-radius:10px">
								<header>
									<div class="title" >
										<h2><?php echo$pregunta ?></h2>
										<p><?php echo$descri ?></p>
									</div>
									<div class="meta">
										<time class="published" datetime="2020-11-20"><?php $t=time(); echo(date("Y-m-d",$t)) ?></time> <!-- Programar la fecha desde el servidor para que sea automatica XD -->
									</div>
								</header>

							</article>

						<!-- Preguntas -->
										<?php
										$pregunta;
										

										//for($i=0;$i<5;$i++)
										//{
										?>
										<div class="post">
										<time class="published" datetime="2020-11-20"><?php 
										//echo("Respuesta ".($i+1));

										?>
										<article>
										<?php include("respuesta.php")
										//require("mostrarlogs.php");?>	 
										</article>
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
						<section>			
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
			</div>
			<!-- Footer -->

			<?php
			include("footer.php"); 
			?>

	</body>
</html>







<?php 
        Desconectar();
?>