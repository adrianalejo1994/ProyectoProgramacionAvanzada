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
	$idusuario = $fila["IDUSUARIO"];
	$fecha = $fila["FECHACREACIONPREGUNTA"];
	$IDCATEGORIA = $fila["IDCATEGORIA"];
}


$sql = "SELECT *  FROM CATEGORIA WHERE IDCATEGORIA =".$IDCATEGORIA; //selecciona la id de la pregunta perteneciente a la categoria
$idCAT = $conn->query($sql);
foreach ($idCAT as $fila) {
	$idcatego = $fila["NAMECATEGORIA"];
}


//////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$idusuario'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto2 = $fila["FOTO"];
}

////////////////////////////////////

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
	<a href="inicio.php"><img src="images/regreso.png" class="imag4" width="70" height="60"/></a>

		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post"  style="border-radius:10px">
									<div class="title" >
										<h2><?php echo$pregunta ?></h2>
										<p><?php echo$descri ?></p>
										<time class="published" datetime="2020-11-20"><?php echo($fecha) ?></time>
									<h2><?php echo$idusuario ?></h2>
									</div>
									<div class="title" >
									<?php echo(' <img class="imag3" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto2).'">'); ?>
									</div>
								

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