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
                           
$sql = "SELECT IDRESPUESTA, IDPREGUNTA, IDUSUARIO, DESCRIPCIONRESPUESTA, ESTADORESPUESTA, FECHACREACIONRESPUESTA1 FROM RESPUESTA";
//echo $sql;
$res=mysqli_query($conn,$sql);
$res = $conn->query($sql); 
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
										<h2><a href="#">Repositorio de Respuestas</a></h2>
										<p>Todas tus Respuestas</p>
										
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
                            <tr class="CabeceraTR">
                                 <td><b>IDRESPUESTA</b></td>
                                 <td><b>IDPREGUNTA</b></td>
                                 <td><b>IDUSUARIO</b></td>
                                 <td><b>DESCRIPCIONRESPUESTA</b></td>
                                 <td><b>ESTADORESPUESTA</b></td>
                                 <td><b>FECHACREACIONRESPUESTA1</b></td>
                                 <td><b>Eliminar</b></td>
								 <td><b>Editar</b></td>
                            </tr>
                                              
                          <?php
                                $nombreusuario=($_SESSION["usuarioactivo"]);
                                while($row=mysqli_fetch_array($res)){
                                if( $row["IDUSUARIO"] == $nombreusuario){
                                
                           
                            ?>
                           
                          <tr>
                            <td><?php echo($row["IDRESPUESTA"]); ?></td>                           
                            <td><?php echo($row["IDPREGUNTA"]); ?></td>
                            <td><?php echo($row["IDUSUARIO"]); ?></td>
                            <td><?php echo($row["DESCRIPCIONRESPUESTA"]); ?></td>
                            <td><?php echo($row["ESTADORESPUESTA"]); ?></td>
                            <td><?php echo($row["FECHACREACIONRESPUESTA1"]); ?></td>
                            
                            <td> <a href="eliminaresp.php?IDRESPUESTA=<?php echo $row["IDRESPUESTA"]?>&idborrar=3">Eliminar</a></td>
							<td> <a href='Editarresp.php?no=<?php echo $row['IDRESPUESTA'];?>' <button type='button' class='btn btn-success'>Modificar</button> </a></td>
                            <td>   
                            <td>
                                        
                            </tr>
                            
                        <?php
                        }
                    }
                        ?>
                     </table>
			</div>
            
				<!-- Footer -->
					<section id="footer" class="final" >
								<p class="copyright" style="color:white">&copy; Arroyo - Arteaga - Guanuche - López </a>.  -- "Proyecto Final" -- </a>.</p>
					</section>

	</body>
</html> 