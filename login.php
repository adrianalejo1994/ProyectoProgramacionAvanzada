<!DOCTYPE HTML>
<html>
	<head>
		<title>TELL ME HOW</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="single is-preload" style="background-color:#c4d2e7;">

<div id="wrapper">

				<!-- Header -->
					<header id="header" style="background-color:#789dca;" >
						<h1  ><a>Futuro Imperfecto Answers</a></h1>

						<nav class="links">
							<ul class="subtitulos">
								<li ><a href="inicio.php">Inicio</a></li>
							</ul>
						</nav>
					</header>


                <div class="login">
                  <div class="form">
                    <link rel ="stylesheet" href ="assets/css/CSS.css" />

                    <h2>Bienvenido</h2>
                    <form action="" method="post">

                    <input type="text" name="IDUSUARIO" placeholder="Usuario" required>
                    <input type="password" name="CLAVE" placeholder="Contraseña" required>
                    <input type="submit" value="Ingresar" class="submit">
                  </div>
                </div>




                
               <!-- Footer -->
                <section id="footer" class="final" >
                      <p class="copyright" style="color:white">&copy; Arroyo - Arteaga - Guanuche - López </a>.  -- "Proyecto Final" -- </a>.</p>
                </section>

            </div>
	</body>
</html>

<?php
include("functions.php");
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['IDUSUARIO'] ) && isset( $_POST['CLAVE'] ) ) {
      Conectar();
      $nombre = $_POST['IDUSUARIO'];
      $sql = "SELECT * FROM Usuario WHERE IDUSUARIO ='".$nombre."'";
      $res = $conn->query($sql);
      foreach($res as $fila)
      {
          $pass = $fila["CLAVE"];
          if (  $_POST['CLAVE']==$pass && $_POST['IDUSUARIO']==$nombre  ) {
            $_SESSION['usuarioactivo'] = $nombre;
            Desconectar();
            header('Location: principal.php');
          }
      }
    echo "acceso incorrecto";
    Desconectar();
    }
}
?>