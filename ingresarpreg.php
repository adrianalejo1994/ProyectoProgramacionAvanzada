<?php 
include("functionscopy.php");
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
ConectarCat();
    $k=1;
    $sql = "SELECT COUNT(*) FROM categoria"; //Conteo Categorias
    $resc = $conn->query($sql);
    $resc->execute(); 
    $number_of_rows = $resc->fetchColumn(); //Numero de Categorias

    for ($i = 1; $i <= $number_of_rows; $i++) {
 
        $sql = "SELECT NAMECATEGORIA FROM categoria WHERE IDCATEGORIA = $i";
        $res = $conn->query($sql);
        foreach ($res as $fila) {
            $categoria[$k] = $fila["NAMECATEGORIA"];
            $k++;
        }
    }

?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>Futuro Imperfecto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
    </head>
    
	<!-- Header -->
    <?php
				include("header.php"); 
	?>


	<body class="single is-preload" style="background-color:#c4d2e7;">
	<a href="inicio.php"><img src="images/regreso.png" class="imag5" width="70" height="60"/></a>

		<!-- Wrapper -->
			<div id="wrapper">

			


				<!-- Main -->
					<div id="mini-post" style="background-color:#c4d2e7;">

						<!-- Post -->
							<article class="mini-post" >
								<header>
									<div class="box" >
										<h2><a href="#">Ingresa tu pregunta</a></h2>
										<p>Estos campos son necesarios para ingresar tu pregunta</p>
									</div>
                                    <form action="" method="post">
                                        <table>
                                        <tr>
                                            <TD>Usuario:</td>
                                            <TD><?php echo $_SESSION["usuarioactivo"]; ?><td>
                                        </tr>
                                        <tr>

                                            <td>Categoria</td>
                                            <td><select name="IDCATEGORIA" id="categoria" required>
                                            <?php  
                                            for($i=1;$i<=$number_of_rows;$i++)
                                            {
                                            echo"<option value=\"$i\" >$categoria[$i]</option>";     //la $i es la id de la categoria                
                                            }        
                                            ?>
                                            </select><td>
                                        </tr>
                                        <tr>
                                            <td>Pregunta:</td>
                                            <td><input type="text" value="" name="TITULO" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Detalles de la pregunta:</td>
                                            <td><input type="text" value="" name="DESCRIPCIONPREGUNTA" required/><td>
                                        </tr>
                                        <tr>
                                            <?php /* <td>Estado</td>
                                            <td><select name="estado" id="estado" required>
                                                <option value="1">Tiene Respuesta</option>
                                                <option value="0">No tiene Respuesta</option>
                                                </select><td>*/ ?>
                                        </tr>

                                        
                                        </table>
                                        <input type="submit" value="Ingresar">
                                        </form>
								</header>
								</footer>
							</article>
					</div>

				

			</div>

    </body>
	<?php
	include("footer.php"); 
	?>
</html>

<?php
ConectarCat();
$NombreUsuario=$_SESSION["usuarioactivo"];
if ( ! empty( $_POST ) ) {


      $IDUSUARIO = $NombreUsuario;
      $IDCATEGORIA = $_POST['IDCATEGORIA'];
      $TITULO = $_POST['TITULO'];
      $DESCRIPCIONPREGUNTA = $_POST['DESCRIPCIONPREGUNTA'];
      
      //control puntaje minimo
      $sql3 = "SELECT `PUNTAJE` FROM `punto` WHERE IDUSUARIO='$IDUSUARIO'";
      $res3 = $conn->query($sql3); 
        foreach ($res3 as $fila) {
            $puntaje = $fila["PUNTAJE"]; //almacena el puntaje
        }

    if($puntaje>=10)
    {
      $sql = "INSERT INTO `pregunta` VALUES ( null,'".$IDUSUARIO ."', '".$IDCATEGORIA."', '".$TITULO."', '".$DESCRIPCIONPREGUNTA."', '0', now())";
      echo $sql;

      $sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE-10 WHERE IDUSUARIO='$IDUSUARIO'"; //selecciona la id de la pregunta perteneciente a la categoria
      $idpre2 = $conn->query($sql2);
      $res = $conn->query($sql); 
      echo("<script type=\"text/javascript\"> alert(\"Se ha ingresado la pregunta exitosamente\");
      window.location.href='inicio.php';
      </script>");
    }
      
    else
    {echo("<script type=\"text/javascript\"> alert(\"No tienes el puntaje suficiente para realizar preguntas\");
      window.location.href='inicio.php';
      </script>");
    } 
}

DesconectarCat();
?>
