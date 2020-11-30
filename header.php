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
						

						<ul class=\"subtitulos\">
						<a href=\"ingresarpreg.php\"  value=\"Preguntar +\"><li>Preguntar</li></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						</ul>

							<!-- Barra de busqueda -->
							
							<form  action=\"#\" method=\"post\">
							<input  type=\"search\" placeholder=\"\" >
							<input  type=\"submit\" value=\"Buscar\"/>
							</form>
							
						
							<ul class=\"subtitulos\">




							<a href=\"repositoriorpreg.php\" class=\"links\">Repositorio de Preguntas</a>
							<a href=\"repositorioresp.php\" class=\"links\">Repositorio de Respuestas</a>
							<a href=\"perfilusuario.php\" class=\"links\">".$_SESSION['usuarioactivo']."</a>
							
							<a href=\"logout.php\" class=\"links\">Salir</a>

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


							<a href=\"registro.php\" class=\"links\">Registrarse</a>
							<a href=\"login.php\" class=\"links\">Iniciar Sesión</a>



");
}
										
							?>
							</ul>
						</nav>
                    </header>
 