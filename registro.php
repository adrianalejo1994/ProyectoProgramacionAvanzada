

<!DOCTYPE HTML>
<html>
	<head>
		<title>Futuro Imperfecto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>



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
										<h2><a href="#">Registro</a></h2>
										<p>Llena los campos para tu registro</p>
									</div>
                                    <form action="" method="post">
                                        <table>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><input type="text" value="" name="nombre" required/><td>
                                        </tr>
                                        <tr>
                                            <TD>Apellido(s)</td>
                                            <TD><input type="text" value="" name="apellido" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Fecha Nacimiento</td>
                                            <td><input type="date" value="" name="fechanacimiento" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Nickname</td>
                                            <td><input type="text" value="" name="nickname" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Clave</td>
                                            <td><input type="password" value="" name="clave" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Sexo</td>
                                            <td><select name="sexo" id="sexo" required>
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Fermenino</option>
                                                </select><td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" value="" name="email" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td><input type="file" value="" name="foto" required/><td>
                                        </tr>
                                        </table>
                                        <input type="submit" value="Registrarse">
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
include("functions.php");

if ( ! empty( $_POST ) ) {

      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fechanacimiento = $_POST['fechanacimiento'];
      $nickname = $_POST['nickname'];
      $clave = $_POST['clave'];
      $sexo = $_POST['sexo'];
      $email = $_POST['email'];
      $foto = $_POST['foto'];



      $patron_texto = '/\b[[:alpha:]]/';//inicia con una letra
      $patron_texto2 = '/[\'\/~`\!@#\$%\^&\*\(\)+=\{\}\[\]\|;:"\<\>,\?\\\]]/';//caracteres especiales
      $patron_texto3 = '/\s/';//espacios en blanco


     $letra = preg_match($patron_texto, $nickname);
     $especiales = preg_match($patron_texto2, $nickname);
     $espacios = preg_match($patron_texto3, $nickname);


      if( $letra=="1" && $especiales=="0" && $espacios=="0"){

        
        Conectar();
        $nickbase="";
        $sql = "SELECT * FROM `usuario` WHERE `IDUSUARIO`='".$nickname."'";
        $res = $conn->query($sql);
        foreach($res as $fila)
        {
            $nickbase = $fila["IDUSUARIO"];
        }
        Desconectar();

      
      if ($nickbase=="") {
    
        Conectar();
        $sql = "INSERT INTO `usuario` VALUES ('".$nickname."', '".$nombre."', '".$apellido."', '".$fechanacimiento."', '".$clave."', '".$sexo."', '".$email."','".$foto."')";
        $res = $conn->query($sql); 
        Desconectar();
        }else{
echo("

<script>
window.alert(\"mensaje\")
</script>
");
        }
                    
        }else{
                        $aErrores = "El nombre sólo puede contener letras y espacios";
            }



}
?>


