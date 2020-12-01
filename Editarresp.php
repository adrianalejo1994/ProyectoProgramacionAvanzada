<?php 
include("functions.php");
session_start();


Conectar();

$sql ="SELECT IDRESPUESTA, IDPREGUNTA, IDUSUARIO, DESCRIPCIONRESPUESTA, ESTADORESPUESTA, FECHACREACIONRESPUESTA1 FROM RESPUESTA WHERE IDRESPUESTA='".$_GET['no']."'";
//echo ($sql);
$res = $conn->query($sql);
foreach($res as $row){
$idrespuesta = $row["IDRESPUESTA"];
$idpregunta = $row["IDPREGUNTA"];
$idusuario = $row["IDUSUARIO"];
$descripcion = $row["DESCRIPCIONRESPUESTA"];
$estado = $row["ESTADORESPUESTA"];
$fecha = $row["FECHACREACIONRESPUESTA1"];
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
										<h2><a href="#">Actualizar Respuesta</a></h2>
										<p>Modificar cualquier equivocacion de la RESPUESTA</p>
									</div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <table>
                                      <tr>
                                            <td>IDRESPUESTA:</td>
                                            <td><?php echo $idrespuesta; ?></td>
						  		
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>IDPREGUNTA:</td>
                                            <td><?php echo $idpregunta; ?></td>
						  		
                                        </tr>
                                        <tr>
                                        <td>IDUSUARIO:</td>
                                            <td><?php echo $idusuario; ?></td>
						  		
                                        </tr>
                                        <tr>
                                            <td>DESCRIPCION DE RESPUESTA</td>
                                            <td> <textarea name="descripcion" rows="10" cols="40"><?php echo $descripcion; ?></textarea></td>
                                            
                                        </tr>
                                        
                                          
                                        <tr>
                                            <td>ESTADO RESPUESTA:</td>
                                            <td><?php echo $estado; ?></td>
						  		
                                        </tr>
                                    </table>
                                    <input type="submit" value="Editar">
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
$descripcion=$_POST['descripcion'];


//carga de datos ingresados
        Conectar();
        $sql = "UPDATE RESPUESTA SET `DESCRIPCIONRESPUESTA`='".$descripcion."' WHERE IDRESPUESTA='".$_GET['no']."'";
        $res = $conn->query($sql);
        Desconectar();

}
?>
