

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
	<a href="inicio.php" ><img src="images/regreso.png" class="imag5" width="70" height="60"/></a>

		<!-- Wrapper -->
			<div id="wrapper">
				
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro</a></h2>
										<p>Llena los campos para tu registro</p>
									</div>

                                    <form action="registro.php" method="post" enctype="multipart/form-data">
                                        <table>
                                        <tr>
                                            <td>Nombre(s)</td>
                                            <td><input type="text" value="" name="nombre" maxlength=50 required/><td>
                                        </tr>
                                        <tr>
                                            <TD>Apellido(s)</td>
                                            <TD><input type="text" value="" name="apellido" maxlength=50 required/><td>
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
                                            <td><input type="password" value="" name="clave" maxlength=60 required/><td>
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
                                            <td><input type="email" value="" name="email" maxlength=255 pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required/><td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td> <input name="userfile"  type="file" required><td>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
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
            </div>
	</body>
</html>




<?php


if ( ! empty( $_POST ) ) {

//carga de datos ingresados
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $nickname = $_POST['nickname'];
        $clave = $_POST['clave'];
        $sexo = $_POST['sexo'];
        $email = $_POST['email'];


//carga de datos imagen
        $nombre_archivo = $_FILES['userfile']['name'];
        $tipo_archivo = $_FILES['userfile']['type'];
        $tamano_archivo = $_FILES['userfile']['size'];
        $nombre_archivo.trim(" ");
        $imagen = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));




/*expresiones regualres nombre y apellido
$patron_texto = "[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]\s";//inicia con una letra
$letra = preg_match($patron_texto, $nombre);
$especiales = preg_match($patron_texto, $apellido);
if( $letra!="1" || $especiales!="1"){
    echo("
    <script>
    window.alert(\"ERROR: El Nombre o Apellido no es valido\")
    </script>
    ");
    exit();
}*/

//expresiones regualres
        $patron_texto = '/\b[[:alpha:]]/';//inicia con una letra
        $patron_texto2 = '/[!@¡¢£¤¥¦§¨©ª«¬®¯°±²³´µ¶¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿ]/';//caracteres especiales
        $patron_texto3 = '/\s/';//espacios en blanco
        $letra = preg_match($patron_texto, $nickname);
        $especiales = preg_match($patron_texto2, $nickname);
        $espacios = preg_match($patron_texto3, $nickname);

        if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email'])) {
            $email = $_GET['email'];
        }
//comprobacion nick no tenga caracteres invalidos
        if( $letra!="1" || $especiales!="0" || $espacios!="0"){
        echo("
        <script>
        window.alert(\"ERROR: El Nickname no es valido\")
        </script>
        ");
        exit();
        }
        else{
//comprobacion si usuario ya existe en la base
        Conectar();
        $nickbase="";
        $sql = "SELECT * FROM `usuario` WHERE `IDUSUARIO`='".$nickname."'";
        $res = $conn->query($sql);
        foreach($res as $fila){
        $nickbase = $fila["IDUSUARIO"];
        }
        Desconectar();
            if ($nickbase==$nickname) {
             echo("
            <script>
            window.alert(\"ERROR: El Nickname ya existe\")
            </script>
            ");
            exit();
            }
        }



//comprobacion mail existente
        $emailencontrado="";
        Conectar();
        $sql = "SELECT * FROM `USUARIO` WHERE `EMAIL`='".$email."'";
        $res = $conn->query($sql);
        foreach($res as $fila)
        {
            $emailencontrado = $fila["EMAIL"];
        }
        Desconectar();
        if ($emailencontrado == $email) {
        echo("<script>
        window.alert(\"ERROR: Email ya Registrado\")
        </script>
        ");
        exit(); 
        }


//comprobacion  imagen
        if( $tipo_archivo != "image/jpeg" && $tamano_archivo<"100000"){
        echo("
        <script>
        window.alert(\"ERROR: El archivo no cumple con los requisitos\")
        </script>
        ");
        exit(); 
        }
    


 //Datos de Ingreso Correctos   
    Conectar();
    $sql = "INSERT INTO `usuario` VALUES ('".$nickname."', '".$nombre."', '".$apellido."', '".$fechanacimiento."', '".$clave."', '".$sexo."', '".$email."','".$imagen."')";
    $res = $conn->query($sql); 
    $sql2 = "INSERT INTO `punto` VALUES ( NULL, '$nickname', 20, NULL)";
    $res2 = $conn->query($sql2); 
    Desconectar();
   
    echo("<script>
    window.alert(\"USUARIO CREADO CORRECTAMENTE\")
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
?>
