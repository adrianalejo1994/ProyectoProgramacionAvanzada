<?php

if(isset( $_SESSION['usuarioactivo'] ) ) {
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
						<a href=\"ingresarpreg.php\"  value=\"Preguntar +\">Preguntar</t></a>
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
											
											echo("<a href=\"perfilusuario.php\" class=\"links\">Perfil de Usuario</a>
											<a href=\"\" class=\"links\">".$_SESSION['usuarioactivo']."</a>
											
											<a href=\"logout.php\" class=\"links\">Salir</a>");


										} else {
											echo("<a href=\"registro.php\" class=\"links\">Registrarse</a>
											<a href=\"login.php\" class=\"links\">Iniciar Sesión</a>");
										}
									
							?>
							</ul>
						</nav>
                    </header>
 