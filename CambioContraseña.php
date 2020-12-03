<?php 
include("functionshe.php");
session_start();


Conectarhe();

$sql = "SELECT NOMBRE, APELLIDO, CLAVE FROM USUARIO WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila){
$nombre = $fila["NOMBRE"];
$apellido = $fila["APELLIDO"];
$clave = $fila["CLAVE"];
$mensajerror="Hola";
}
Desconectarche();


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Futuro Imperfecto</title>
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
										<h2><a href="#">Cambio de Contraseña</a></h2>
										<p>Modificar Contraseña</p>
									</div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><?php echo $nombre ; ?></td>
						  		
                                        </tr>
                                        <tr>
                                            <td>Apellido(s)</td>
                                            <td><?php echo $apellido; ?></td>
                                        </tr>
										<tr>
                                            <td>Contraseña Actual</td>
											<td><input type="password"  name="txtClaveAc" placeholder="Contraseña actual"required /></td>
											
                                        </tr>
										<tr>
                                            <TD><p>Tu Contraseña debe contener mayusculas,Minusculas y números para ser segura:<p></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Ingresa tu Nueva Contraseña:</td>
											<td><input class="newPass" type="password" name="txtClaveNueva" placeholder=" Nueva Contraseña" minlength="3" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"required/>
											
                                             </td>
											 </tr>
											 <tr>
                                            <td>Confirmar Contraseña:</td>
											<td><input class="newPass" type="password"   name="txtClaveConfirma" placeholder="Confirmar Contraseña" minlength="3" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"required/></td>
   
                                        </tr>
										<tr>
										<td><input type="submit"  value="Cambiar Contraseña"></td>
										<td></td>
										</tr>
										<tr>
										<td>
										<?php	
												if (! empty($_POST)) {
													if ($_POST['txtClaveAc'] ==$clave) {
													
														if ($_POST['txtClaveNueva'] == $_POST['txtClaveConfirma']) {
															$clave=$_POST['txtClaveConfirma'];
															Conectar();
															$sql = "UPDATE USUARIO SET `CLAVE`='".$clave."'WHERE IDUSUARIO='".$_SESSION['usuarioactivo']."'";
															$res = $conn->query($sql);
															Desconectar();
														} else {
															echo'No coincide la Nueva Contraseña';
														}
													}else{
													 echo'Compruebe que la contraseña Actual sea la correcta';
													}
												}
												?>
										</td>
										</tr>
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
