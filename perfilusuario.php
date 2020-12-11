<?php 
include("functionscopy.php");
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
                                
$sql = "SELECT *FROM USUARIO";
//echo $sql;
$res=mysqli_query($conn,$sql);
//$res = $conn->query($sql); 
ConectarCat();
session_start();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>TELL ME HOW</title>
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
	<a href="inicio.php" ><img src="images/regreso.png" class="imag5" width="70" height="60"/></a>

		<!-- Wrapper -->
			<div id="wrapper" class="mini-post">

			


				<!-- Main -->
					<div id="mini-post">

						<!-- Post -->
							<article class="box">
								<header>
									<div class="mini-post">
										<h2><a href="#">PERFIL DE USUARIO</a></h2>
										<p>Datos del Usuario</p>
										
									</div>
									
                                    <div class="meta">
                                    <!-- Programar la hora automatica con el servidor y la imagen con el nombre del nick name -->
										<a href="#" class="author"><span class="name"><?php echo $_SESSION['usuarioactivo']; ?></span><img src="images/avatar.jpg" alt="" /></a>
									</div>
                                           
                                        
									<?php
										//session_start();

										if ( isset( $_SESSION['usuarioactivo'] ) ) {
											
										} else {
											header("Location: login.php");
										}
										//commit probar 6
										// el macho digo yo-.....
									?>


									<?php
									if($_SESSION["usuarioactivo"]) {
									?>
									
									<?php
									}else echo "<h1>Please login first .</h1>";
									?>
                            </article>
                            <table>
                            
                                              
                          <?php
                                $nombreusuario=($_SESSION["usuarioactivo"]);
                                while($row=mysqli_fetch_array($res)){
                                if( $row["IDUSUARIO"] == $nombreusuario){
                                
                           
                            ?>
                           
                          <tr>
						  <tr>
                                            <td>IDUSUARIO</td>
                                            <td><?php echo($row["IDUSUARIO"]); ?><td>
                            </tr>
						                          
						  <tr>
								<td>NOMBRE</td>
						  		<td><?php echo($row["NOMBRE"]); ?></td>
						  </tr>
						  <tr>
						  		<td>APELLIDO</td>
						 		 <td><?php echo($row["APELLIDO"]); ?></td>
						  </tr>
						  <tr>
						  		<td>FECHA DE NACIMIENTO</td>
						  		<td><?php echo($row["FECHANACIMIENTO"]); ?></td>
						  </tr>
						  <tr>
						  		<td>CLAVE</td>
						  		<td><?php echo($row["CLAVE"]); ?></td>
						  </tr>
						  <tr>
						  		<td>SEXO</td>
						  		<td><?php echo($row["SEXO"]); ?></td>
						  </tr>
						  <tr>
						 		 <td>EMAIL</td>
						  		<td><?php echo($row["EMAIL"]); ?></td>
						  </tr>
						  <tr>
						  		<td>FOTO</td>
								  <td><?php 
								  $foto = $fila["FOTO"];
								  echo '<img width="150" height="150" src="data:image/jpg;base64,'.base64_encode($foto).'">'; 
								  ?></td>

						  </tr>
                            
							<td> <a href="Editarusuario.php?id=<?php echo $row["IDUSUARIO"]?>&ideditar=3">Editar</a></td>
							
                            <td>   
                            <td>
                                        
                            </tr>
                            
                        <?php
                        }
                    }
                        ?>
                     </table>
			</div>				
	</body>
	<!-- Footer -->
	<?php
	include("footer.php"); 
	?>
</html> 