<?php 
include("functionshe.php");
session_start();
if ( isset( $_SESSION['usuarioactivo'] ) ) {	
	
} else {
	echo("
	<script>
	window.alert(\"DEBE INICIAR SESIÓN\")
	</script>
	");
	echo("
    <script> 
    <!--
    window.location.replace('login.php'); 
    //-->
    </script>
    ");
}

Conectarhe();

$sql ="SELECT PREGUNTA.IDPREGUNTA, PREGUNTA.IDUSUARIO, CATEGORIA.NAMECATEGORIA, PREGUNTA.TITULO, PREGUNTA.DESCRIPCIONPREGUNTA, PREGUNTA.ESTADO, PREGUNTA.FECHACREACIONPREGUNTA FROM PREGUNTA INNER JOIN CATEGORIA ON PREGUNTA.IDCATEGORIA=CATEGORIA.IDCATEGORIA WHERE PREGUNTA.IDPREGUNTA=".$_GET['no']."";
//echo ($sql);
$res = $conn->query($sql);
foreach($res as $row){
$idpregunta = $row["IDPREGUNTA"];
$idusuario = $row["IDUSUARIO"];
$idcategoria = $row["NAMECATEGORIA"];
$TITULO = $row["TITULO"];
$descripcionpreg = $row["DESCRIPCIONPREGUNTA"];
$estado = $row["ESTADO"];
$fechaPregunta = $row["FECHACREACIONPREGUNTA"];
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
										<h2><a href="#">Actualizar PREGUNTA</a></h2>
										<p>Corregir cualquier equivocacion de la pregunta</p>
									</div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                        <tr>
                                            <td>IDUSUARIO:</td>
                                            <td><?php echo $idusuario; ?></td>
						  		
                                        </tr>
                                        <tr>
                                        <td>IDCATEGORIA:</td>
                                            <td><?php echo $idcategoria; ?></td>
						  		
                                        </tr>
                                        <td>TITULO:</td>
                                        <td><input type="text"  value="<?php echo $TITULO; ?>" name="titulo" required/><td>
                                            
						  		
                                        </tr>
                                        <tr>
                                            <td>DESCRIPCION DE PREGUNTA</td>
                                            <td> <textarea name="descripcionpreg" rows="10" cols="40"><?php echo $descripcionpreg; ?></textarea></td>
                                        </tr>
                                      
                                          <tr>
                                            <td>Fecha Modificaciónn:</td>
                                            <td><?php echo $fechaPregunta; ?></td>
						  		
                                        </tr>
                                    </table>
                                    
                                     <input type="submit" value="Actualizar">
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
$titulopreg=$_POST['titulo'];
$descripcionpreg=$_POST['descripcionpreg'];


//carga de datos ingresados
        Conectar();
        $sql = "UPDATE PREGUNTA SET `DESCRIPCIONPREGUNTA`='".$descripcionpreg."',`TITULO`='".$titulopreg."' WHERE IDPREGUNTA='".$_GET['no']."'";
        $res = $conn->query($sql);
        Desconectar();

        echo("<script>
        window.alert(\"ACTUALIZADO CORRECTAMENTE\")
        </script>
        ");

        echo("
            <script> 
            <!--
            window.location.replace('repositoriorpreg.php'); 
            //-->
            </script>
            ");


}
?>