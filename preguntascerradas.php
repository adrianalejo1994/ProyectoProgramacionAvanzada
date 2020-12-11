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
                                
$fechaservidor=date('d-m-Y H:i:s');
 $menosCincoDias = date ('Y-m-d', strtotime ('- 5 day', strtotime($fechaservidor)));                        
$sql = "SELECT *  FROM pregunta WHERE FECHACREACIONPREGUNTA <= '$menosCincoDias'";
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
                            <table>
                            <tr class="CabeceraTR">
                                 <td><b>IDPREGUNTA</b></td>
                                 <td><b>IDUSUARIO</b></td>
                                 <td><b>IDCATEGORIA</b></td>
                                 <td><b>TITULO</b></td>
                                 <td><b>DESCRIPCIONPREGUNTA</b></td>
 
                                 <td><b>FECHACREACIONPREGUNTA</b></td>

                            </tr>
                                              
                          <?php
                                $nombreusuario=($_SESSION["usuarioactivo"]);
                                while($row=mysqli_fetch_array($res)){
                                if( $row["IDUSUARIO"] == $nombreusuario){
                                
                            
                            ?>
                           
                          <tr>
                            <td><?php echo($row["IDPREGUNTA"]); ?></td>                           
                            <td><?php echo($row["IDUSUARIO"]); ?></td>
                            <td><?php echo($row["IDCATEGORIA"]); ?></td>
                            <td><?php echo($row["TITULO"]); ?></td>
                            <td><?php echo($row["DESCRIPCIONPREGUNTA"]); ?></td>
                            <td><?php echo($row["FECHACREACIONPREGUNTA"]);?></td>
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