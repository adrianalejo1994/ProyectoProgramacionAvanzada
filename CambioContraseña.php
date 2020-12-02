<?php 
include("functions.php");
session_start();


Conectar();

$sql = "SELECT NOMBRE, APELLIDO, CLAVE FROM USUARIO WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila){
$nombre = $fila["NOMBRE"];
$apellido = $fila["APELLIDO"];
$clave = $fila["CLAVE"];
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
										<h2><a href="#">Cambio de Contraseña</a></h2>
										<p>Modificar Contraseña</p>
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
                                            <td>Clave Actual</td>
											<td><?php echo $clave; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ingresa tu Nueva Clave:</td>
											<td><input type="password"  value="<?php echo $clave; ?>" name="CLAVE" required/>
											


                                             </td>
                                        </tr>
                                    </table>
											<input  type="submit" value="Editar" >
										
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
//$nombre_archivo = $_FILES['userfile']['name'];
//$tipo_archivo = $_FILES['userfile']['type'];
//$tamano_archivo = $_FILES['userfile']['size'];
//$nombre_archivo.trim(" ");
//$imagen = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));

$clave=$_POST['CLAVE'];
if (isset($_GET['CLAVE']) && (strlen($_GET['CLAVE']) == 6)) {
    $clave = $_GET['CLAVE'];
}

//carga de datos ingresados
        Conectar();
		$sql = "UPDATE USUARIO SET `CLAVE`='".$clave."'WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
		echo($sql);
        $res = $conn->query($sql);
        Desconectar();

}
?>