<?php 


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
                           
$sql = "SELECT RESPUESTA.IDRESPUESTA, RESPUESTA.IDPREGUNTA, PREGUNTA.TITULO, RESPUESTA.IDUSUARIO, RESPUESTA.DESCRIPCIONRESPUESTA, RESPUESTA.ESTADORESPUESTA, RESPUESTA.FECHACREACIONRESPUESTA1 FROM RESPUESTA INNER JOIN PREGUNTA ON RESPUESTA.IDPREGUNTA = PREGUNTA.IDPREGUNTA";
//echo $sql;
$res=mysqli_query($conn,$sql);
$res = $conn->query($sql); 

$sql2 = "SELECT TITULO FROM pregunta";
//echo $sql;
$res2 = mysqli_query($conn,$sql2);
$res2 = $conn->query($sql2); 

ConectarCat();

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
	<!-- Header -->
	<?php
				include("header.php"); 
				?>

</header>

	<body class="single is-preload" style="background-color:#c4d2e7;">
	<a href="inicio.php" ><img src="images/regreso.png" class="imag5" width="70" height="60"/></a>

		<!-- Wrapper -->
			<div id="wrapper">

			


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

										if ( isset( $_SESSION['usuarioactivo'] ) ) {
											
										} else {
											header("Location: login.php");
										}
										
									?>


									<?php
									if($_SESSION["usuarioactivo"]) {
									?>
									
									<?php
									}else echo "<h1>Please login first .</h1>";
									?>
                            </article>
                            <table BORDER class="post" >
                            <tr class="CabeceraTR">
								<td><b>USUARIO</b></td>
                                 <td><b>PREGUNTA</b></td>
                                 <td><b>RESPUESTA</b></td>
                                 <td><b>VOTOS</b></td>
                                 <td><b>FECHA</b></td>
                                 <td><b> &nbsp;</b></td>
								 <td><b>&nbsp;</b></td>
                            </tr>
                                              
                          <?php
                                $nombreusuario=($_SESSION["usuarioactivo"]);
                                while($row=mysqli_fetch_array($res)){
                                if( $row["IDUSUARIO"] == $nombreusuario){
                                
                           
                            ?>                        
                          <tr>
							  
						  	<td><?php echo($row["IDUSUARIO"]); ?></td>             
                            <td><?php echo($row["TITULO"]); ?></td>
                            <td><?php echo($row["DESCRIPCIONRESPUESTA"]); ?></td>
                            <td><?php echo($row["ESTADORESPUESTA"]); ?></td>
                            <td><?php echo($row["FECHACREACIONRESPUESTA1"]); ?></td>
                            
							<?php
							ConectarCat();
							$idpregunta=$row["IDPREGUNTA"];	
														
							$fechaservidor=date('d-m-Y H:i:s');
							$menosCincoDias = date ('Y-m-d', strtotime ('- 5 day', strtotime($fechaservidor))); 
										
							$sql3 = "SELECT FECHACREACIONPREGUNTA  FROM pregunta WHERE IDPREGUNTA = $idpregunta"; 
							$idpre3 = $conn->query($sql3);
							foreach($idpre3 as $fila){
								$fechacomparacion = $fila["FECHACREACIONPREGUNTA"];
							}
							
							if ($menosCincoDias <= $fechacomparacion) {
							?>
                            <td> <a href="eliminaresp.php?IDRESPUESTA=<?php echo $row["IDRESPUESTA"]?>&idborrar=3"><img src="images/delete.ico" width="19"height="19" />Eliminar Respuesta &nbsp;</a></td>
							<td> <a href='Editarresp.php?no=<?php echo $row['IDRESPUESTA'];?>' <button type='button' class='btn btn-success'><img src="images/mod.ico" width="22"height="22" />Modificar Respuesta </button> </a></td>
                            <td>   
                            <td>
                                        
                            </tr>
                            
							<?php
							DesconectarCat();
						}
						else{
							?>
							 <td><b>CERRADA</b></td>
								 <td><b>CERRADA</b></td>
							<?php


						}
						
                        ?>


                        <?php
                        }
                    }
                        ?>
                     </table>
			</div>
            
				<!-- Footer -->
				<?php
	include("footer.php"); 
	?>

	</body>
</html> 