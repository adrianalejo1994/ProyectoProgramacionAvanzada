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
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro</a></h2>
										<p>Llena los campos para tu registro</p>
									</div>
                                    <form action="" method="post">
                                        <table>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><input type="text" value="" name="nombre" required/><td>
                                        </tr>
                                        <tr>
                                            <TD>Apellido(s)</td>
                                            <TD><input type="text" value="" name="apellido" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Fecha Nacimiento</td>
                                            <td><input type="date" value="" name="fechanacimiento" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Nickname</td>
                                            <td><input type="text" value="" name="nickname" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Clave</td>
                                            <td><input type="password" value="" name="clave" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Sexo</td>
                                            <td><select name="sexo" id="sexo" required>
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Fermenino</option>
                                                </select><td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" value="" name="email" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td><input type="file" value="" name="foto" required/><td>
                                        </tr>
                                        </table>
                                        <input type="submit" value="Registrarse">
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

      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fechanacimiento = $_POST['fechanacimiento'];
      $nickname = $_POST['nickname'];
      $clave = $_POST['clave'];
      $sexo = $_POST['sexo'];
      $email = $_POST['email'];
      $foto = $_POST['foto'];

Conectar();
      $sql = "INSERT INTO `usuario` VALUES ('".$nickname."', '".$nombre."', '".$apellido."', '".$fechanacimiento."', '".$clave."', '".$sexo."', '".$email."','".$foto."')";
      $res = $conn->query($sql); 
Desconectar();
}
?>