<?php 
include("functions.php");
session_start();


Conectar();

$sql = "SELECT NOMBRE, APELLIDO, FOTO FROM USUARIO WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila){
$nombre = $fila["NOMBRE"];
$apellido = $fila["APELLIDO"];
$foto = $fila["FOTO"];
}
Desconectar();



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
				<?php
				include("header.php"); 
				?>


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
                                            <td>Foto</td>
                                            <td> <input name="userfile"  type="file" ><td>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                        </tr>
                                    </table>
<<<<<<< Updated upstream
									<input type="submit" value="Editar">
=======
                                    <input type="submit" value="Editar">
>>>>>>> Stashed changes
									<td><a href="CambioContraseña.php" class="boton_1">Cambiar de Contraseña</a></td>
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
$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
$nombre_archivo.trim(" ");
$imagen = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));



//carga de datos ingresados
        Conectar();
        $sql = "UPDATE USUARIO SET `FOTO`='".$imagen."'";
        $res = $conn->query($sql);
        Desconectar();

}
?>
