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
                                        
                                        <?php
                                          }
                                        }
                                        ?>
                                        </table>
                                        <input type="submit" value="Modificar">
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
include("functionscopy.php");



      $nombre = $_POST["nombre"];
      $nickname = $_POST["nickname"];
      $clave = $_POST["clave"];
      $foto = $_POST["foto"];

ConectarCat();   
      $sql = "UPDATE USUARIO SET nombre='".$nombre."',nickname='".$nickname."',clave='".$clave."',foto='".$foto."'";
      echo $sql;
      $res = $conn->query($sql); 
     // $sql2 = "INSERT INTO `punto` VALUES ( NULL, '$nickname', 20, NULL)";
     // $res2 = $conn->query($sql2); 
DesconectarCat();

?>
<script type="text/javascript"> alert("Se ha modificado exitosamente");