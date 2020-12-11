<?php 
session_start();

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
                                
$sql = "SELECT PREGUNTA.IDPREGUNTA, CATEGORIA.NAMECATEGORIA, PREGUNTA.IDUSUARIO, PREGUNTA.TITULO, PREGUNTA.DESCRIPCIONPREGUNTA, PREGUNTA.ESTADO, PREGUNTA.FECHACREACIONPREGUNTA FROM PREGUNTA INNER JOIN CATEGORIA ON PREGUNTA.IDCATEGORIA = CATEGORIA.IDCATEGORIA";
//echo $sql;
$res=mysqli_query($conn,$sql);
//$res = $conn->query($sql); 
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
										<h2><a href="#">Repositorio de Preguntas</a></h2>
										<p>Todas tus preguntas</p>
										
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
                            <table class="post">
                            <tr class="CabeceraTR">
                                 <td><b>USUARIO</b></td>
                                 <td><b>CATEGORIA</b></td>
                                 <td><b>PREGUNTA</b></td>
                                 <td><b>DESCRIPCION</b></td>
								 <td><b>FECHA</b></td>
								 <td><b></b></td>
                                 <td><b></b></td>
                            </tr>
                                              
                          <?php
                                $nombreusuario=($_SESSION["usuarioactivo"]);
                                while($row=mysqli_fetch_array($res)){
                                if( $row["IDUSUARIO"] == $nombreusuario){
                                
                           
                            ?>
                           
                          <tr>
                          
                            <td><?php echo($row["IDUSUARIO"]); ?></td>
                            <td><?php echo($row["NAMECATEGORIA"]); ?></td>
                            <td><?php echo($row["TITULO"]); ?></td>
                            <td><?php echo($row["DESCRIPCIONPREGUNTA"]); ?></td>
                            <td><?php echo($row["FECHACREACIONPREGUNTA"]);?></td>
                            <td> <a   href="eliminarpreg.php?IDPREGUNTA=<?php echo $row['IDPREGUNTA'];?>&idborrar=2"><img src="images/delete.ico" width="15"height="15" />Eliminar Pregunta</a></td>
							<td> <a href='Editarpreg.php?no=<?php echo $row['IDPREGUNTA'];?>' <button type='button' class='btn btn-success'><img src="images/mod.ico" width="15"height="15" />Modificar Pregunta</button> </a></td>
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