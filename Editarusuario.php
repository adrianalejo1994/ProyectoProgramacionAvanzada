<?php 
include("functionscopy.php");
ConectarCat();
$conn = mysqli_connect('localhost', 'root', '');  
if (! $conn) {  
die("Connection failed" . mysqli_connect_error());  
}  
else {  
mysqli_select_db($conn, 'proyectofinal');  
}  

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT IDUSUARIO,NOMBRE, CLAVE, FOTO FROM USUARIO";
//echo $sql;
$res=mysqli_query($conn,$sql);


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
                                    <form action="" method="POST">
                                        <table>
                                        <?php
                                          $nombreusuario=($_SESSION["usuarioactivo"]);
                                          while($row=mysqli_fetch_array($res)){
                                          if( $row["IDUSUARIO"] == $nombreusuario){
                                          
                                     
                                      ?>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><input type="text"  name="nombre" value="<?php echo($row["NOMBRE"]);?>" ><td>
                                        </tr>
                                        <tr>
                                            <td>Nickname</td>
                                            <td><input type="text"  name="nickname" value="<?php echo ($row["IDUSUARIO"])?>" ><td>
                                        </tr>
                                        <tr>
                                            <td>Clave</td>
                                            <td><input type="text" name="clave"value="<?php echo($row["CLAVE"]);?>" ><td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td><input type="file"  name="foto" value=" <?php echo($row["FOTO"]);?>"required/><td>
                                        </tr>
                                        <tr>
                                
                                          <td><input class="btn-success" type="submit" name="actualizar" value="Actualizar" /></td>
                                        </tr>
                                        
                                        <?php
                                          }
                                        }
                                        ?>
                                        </table>
                                       
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
<?PHP
if(isset($_POST['sw']) == 1){ //si se ha presionado el boton "Actualizar" 
 
	//cadena con la orden de actualizacion a la tabla "users" con los valores de los inputs enviados por POST
    $query2 = "UPDATE USUARIO SET NOMBRE='".$_POST['nombre']."', IDUSUARIO='".$_POST['nickname']."', CLAVE='".$_POST['clave']."', FOTO='".$_POST['foto']."' WHERE IDUSUARIO=".$_POST['IDUSUARIO'];
    echo($squery2);
	if(mysqli_query($conn, $query2)){ //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito
		header('Location: perfilusuario.php'); //redireccion a index.php
	}else{ //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}
?>