<?php 
include("functionshe.php");
session_start();


Conectarhe();

$sql = "SELECT NOMBRE, APELLIDO, EMAIL, FOTO FROM USUARIO WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila){
$nombre = $fila["NOMBRE"];
$apellido = $fila["APELLIDO"];
$email = $fila["EMAIL"];
$foto = $fila["FOTO"];
}
Desconectarche();



?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Futuro Imperfecto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

<header>
<!-- Header -->
<?php
				include("header.php"); 
				?>
</header>


	<body class="single is-preload" style="background-color:#c4d2e7;">

		<!-- Wrapper -->
			<div id="wrapper">

				


				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Actualizar tu Usuario y Contraseña</a></h2>
										<p>Modificar NickName y Clave</p>
									</div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><?php echo $nombre ; ?></td>
						  		
                                        </tr>
                                        <tr>
                                            <TD>Apellido(s)</td>
                                            <td><?php echo $apellido; ?></td>
                                        </tr>
										<tr>
                                            <td>Email:</td>
											
                                            <td> <input type="text" name="email"  required placeholder="ejemplo@um.es" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" ></td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td> <input name="userfile" required type="file" ><td>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                        </tr>
                                    </table>
									<input type="submit" value="Actualizar">
										<div>
										<a href="CambioContraseña.php" class="button">Cambiar de Contraseña</a>
										</div>
                                        </form>
								</header>
								</footer>
							</article>
					</div>

				
            </div>
            				<!-- Footer -->
            <?php
			include("footer.php"); 
            ?>
            
	</body>
</html>


<?php

if ( ! empty( $_POST ) ) {


//carga de datos imagen
$email=$_POST['email'];
$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
$nombre_archivo.trim(" ");
$imagen = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email'])) {
	$email = $_GET['email'];
}

//carga de datos ingresados
        Conectar();
        $sql = "UPDATE USUARIO SET `FOTO`='".$imagen."', `EMAIL`='".$email."' WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
        $res = $conn->query($sql);
        Desconectar();

}
?>
