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
                                
$sql = "SELECT * FROM PUNTO ORDER BY PUNTAJE DESC";
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
			<div id="wrapper" class="mini-post">

				
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="">
								<header>
									<div class="">
										<h2><a href="#">LOS MAS PREGUNTONES</a></h2>
										
									</div>
                            </article>
                            <table>
                            <tr class="CabeceraTR">
                                 <td><b>USUARIO</b></td>
								 <td><b>PUNTAJE</b></td>

                            </tr>
                                              
                          <?php
                                while($row=mysqli_fetch_array($res)){
                                
                            
                            ?>
                           
                          <tr>                    
                            <td><?php echo($row["IDUSUARIO"]); ?></td>
							<td><?php echo($row["PUNTAJE"]); ?></td>

                            <td>   
                            <td>
                                        
                            </tr>
                            
                        <?php
                        
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