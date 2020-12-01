<?php
include("functionshe.php");
Conectarhe();
$auxiliar=0;

if(isset( $_SESSION['usuarioactivo'] ) ) {
	$user= $_SESSION['usuarioactivo'];
	$sql="SELECT PUNTAJE FROM punto WHERE IDUSUARIO = '$user'";
	$idpre = $conn->query($sql);
	foreach ($idpre as $fila)
	{
		$auxiliar=$fila['PUNTAJE'];
	} 
	echo("


<header id=\"header\"  style=\"background-color:#789dca;\" >
						<h1 style=\"color:white\" ><a href=\"inicio.php\">TELL ME HOW</a></h1>
						<nav class=\"links\">
							<ul class=\"subtitulos\">
								<li><a href=\"inicio.php\">Inicio</a></li>
								<li><a href=\"#\">Creditos</a></li>
							</ul>
						</nav>				
				<!-- boton preguntar  agregar link-->

						<ul class=\"subtitulos\">
						<a href=\"ingresarpreg.php\"  value=\"Preguntar +\"><li>Preguntar</li></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						</ul>

							<!-- Barra de busqueda -->
							
							<form  action=\"#\" method=\"post\">
							<input  type=\"search\" placeholder=\"\" >
							<input  type=\"submit\" value=\"Buscar\"/>
							</form>
	
							<ul class=\"subtitulos\">
");
}
else
{
	echo("


<header id=\"header\"  style=\"background-color:#789dca;\" >
						<h1 style=\"color:white\" ><a href=\"inicio.php\">TELL ME HOW</a></h1>
						<nav class=\"links\">
							<ul class=\"subtitulos\">
								<li><a href=\"inicio.php\">Inicio</a></li>
								<li><a href=\"#\">Creditos</a></li>
							</ul>
						</nav>
						
				<!-- boton preguntar  agregar link-->

						<ul class=\"subtitulos\">
						</ul>

							<!-- Barra de busqueda -->
							
							<form  action=\"#\" method=\"post\">
							<input  type=\"search\" placeholder=\"\" >
							<input  type=\"submit\" value=\"Buscar\"/>
							</form>
							
						
							<ul class=\"subtitulos\">
");
}
										if ( isset( $_SESSION['usuarioactivo'] ) ) {
											$user= $_SESSION['usuarioactivo'];
											$sql1="SELECT PUNTAJE FROM punto WHERE IDUSUARIO = '$user'";
											$idpre = $conn->query($sql1);
											foreach ($idpre as $fila)
											{
												$auxiliar=$fila["PUNTAJE"];
											} 

											echo("<a href=\"perfilusuario.php\" class=\"links\">Perfil de Usuario</a>
											<a href=\"repositoriorpreg.php\" class=\"links\">Repositorio de Preguntas</a>
											<a href=\"repositorioresp.php\" class=\"links\">Repositorio de Respuestas</a>
											<a href=\"\" class=\"links\">".$user."</a>
											Puntos: ".$auxiliar."
											<a href=\"logout.php\" class=\"links\">Salir</a>");
	

										} else {
											echo("<a href=\"registro.php\" class=\"links\">Registrarse</a>
											<a href=\"login.php\" class=\"links\">Iniciar Sesión</a>");
										}
									
							?>
							</ul>
						</nav>
                    </header>
 <?php
 Desconectarche();
 ?>