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

$pagina = 0;
if (isset($_GET['pagina']))
    if ($_GET['pagina'] > 0)
        $pagina = $_GET['pagina'];

$redireccion = 'perfilusuario.php';
if(isset($_SERVER['HTTP_REFERER'])) {
    $redireccion = $_SERVER['HTTP_REFERER'];
} else if (isset($_GET['pagina'])) {
    $redireccion = 'perfilusuario.php?pagina='.$pagina;
}

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $existe = false;
        $usuario= buscarUsuario($id);
        echo($usuario);
        if ($usuario) {
            $existe = true;
            $idusuario = $usuario['IDUSUARIO'];
            $nombre = $usuario['NOMBRE'];
            $clave = $usuario['CLAVE'];
            $foto = $usuario['FOTO'];
        }
    } catch (PDOException $e) {
        echo 'Error! '.$e->getMessage().'<br>';
    }
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
                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <table>
                                        <?php
                                          $nombreusuario=($_SESSION["usuarioactivo"]);
                                          while($row=mysqli_fetch_array($res)){
                                          if( $row["IDUSUARIO"] == $nombreusuario){
                                          
                                     
                                      ?>
                                         <p align="center">IDUSUARIO: </p>
                                                    <input type="text" name="idusuario" value="<?php echo $idusuario ?>"> 
                                                    <p align="centerS">NOMBRE: </p>
                                                    <input type="text" name="nombre" value="<?php echo $row["NOMBRE"] ?>"> <br><br>
                                                    <p align="center">CLAVE: </p>
                                                    <input type="text" name="clave" value="<?php echo $row["CLAVE"] ?>"> <br><br>
                                                    <p align="center">Foto: </p>
                                                    <div style="text-align:center;">
                                                    <img width="150" src="<?php echo $row["FOTO"]; ?>"> <br>
                                                    
                                                    <input type="file" name="foto"> <br><br>
                                                    </select> <br><br>
                                                    
                                                    <input type="hidden" name="accion" value="EditarMascota">
                                                    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                                                    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                                                    <input type="hidden" name="clave" value="<?php echo $clave; ?>">
                                                    <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                                                    <input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
                                                    </div>
                                                    <input type="submit" value="Editar Usuario"></br>
                                                    <button><a href="<?php echo $redireccion; ?>">Regresar</a></button>
                                        
                                        <?php
                                          }
                                        }
                                        ?>
                                        </table>
                                        <input type="hidden" name="accion" value="Editar Usuario">
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