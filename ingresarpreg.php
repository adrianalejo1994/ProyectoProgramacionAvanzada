<?php 
session_start();
?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>Futuro Imperfecto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="single is-preload" style="background-color:#c4d2e7;">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" style="background-color:#789dca;">
						<h1><a>Futuro Imperfecto Answers</a></h1>

						<nav class="links">
							<ul class="subtitulos">
								<li><a href="inicio.php">Inicio</a></li>
							</ul>
						</nav>
					</header>


				<!-- Main -->
					<div id="main" style="background-color:#c4d2e7;">

						<!-- Post -->
							<article >
								<header>
									<div class="title" >
										<h2><a href="#">Ingresa tu pregunta</a></h2>
										<p>Estos campos son necesarios para ingresar tu pregunta</p>
									</div>
                                    <form action="" method="post">
                                        <table>
                                        <tr>
                                            <td>Pregunta N°:</td>
                                            <td><input type="int" value="" name="IDPREGUNTA" required/><td>
                                        </tr>
                                        <tr>
                                            <TD>Usuario:</td>
                                            <TD><input type="text" value="" name="IDUSUARIO" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Categoria:</td>
                                            <td><input type="int" value="" name="IDCATEGORIA" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Titulo:</td>
                                            <td><input type="text" value="" name="TITULO" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Descripción de Pregunta:</td>
                                            <td><input type="text" value="" name="DESCRIPCIONPREGUNTA" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Estado</td>
                                            <td><select name="estado" id="estado" required>
                                                <option value="1">Tiene Respuesta</option>
                                                <option value="0">No tiene Respuesta</option>
                                                </select><td>
                                        </tr>
                                        <tr>
                                            <td>Fecha Creación de Pregunta:</td>
                                            <td><input type="date" value="" name="FECHACREACIONPREGUNTA" required/><td>
                                        </tr>
                                        
                                        </table>
                                        <input type="submit" value="Ingresar">
                                        </form>
								</header>
								</footer>
							</article>
					</div>

				<!-- Footer -->
					<section id="footer" class="final"  > 
						<p class="copyright" style="color:white"><font size="3">&copy; Arroyo - Arteaga - Guanuche - López </a>.  -- "Proyecto Final" -- </a>.</font></p>
					</section>

			</div>

	</body>
</html>

<?php
include("functions.php");

if ( ! empty( $_POST ) ) {

      $IDPREGUNTA = $_POST['IDPREGUNTA'];
      $IDUSUARIO = $_POST['IDUSUARIO'];
      $IDCATEGORIA = $_POST['IDCATEGORIA'];
      $TITULO = $_POST['TITULO'];
      $DESCRIPCIONPREGUNTA = $_POST['DESCRIPCIONPREGUNTA'];
      $estado = $_POST['estado'];
      $FECHACREACIONPREGUNTA = $_POST['FECHACREACIONPREGUNTA'];

Conectar();
      $sql = "INSERT INTO `pregunta` VALUES ('".$IDPREGUNTA."', '".$IDUSUARIO ."', '".$IDCATEGORIA."', '".$TITULO."', '".$DESCRIPCION."', '".$estado."', '".$FECHACREACIONPREGUNTA."')";
      $res = $conn->query($sql); 
Desconectar();
}
?>