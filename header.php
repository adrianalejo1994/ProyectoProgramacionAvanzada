
<html>
	<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>

	<div id="wrap">
	<header>
		<div class="inner relative">
			<a ></a>
			<h1 class="sub-menu"><a href="inicio.php">TELL ME HOW</a></h1>
			<nav id="navigation">
				<ul id="main-menu">
					
					
					
					<?php
					
					include("functions.php");

					Conectar();
					$auxiliar=0;

					if(isset( $_SESSION['usuarioactivo'] ) ) {
						$user= $_SESSION['usuarioactivo'];
						$sql="SELECT PUNTAJE FROM punto WHERE IDUSUARIO = '$user'";
						$idpre = $conn->query($sql);
						foreach ($idpre as $fila)
						{
							$auxiliar=$fila['PUNTAJE'];
						}
					Desconectar(); 

					echo("<li><a href=\"perfilusuario.php\">".$_SESSION['usuarioactivo']."</a></li>");

						echo("
						

						
						<li><a href=\"\">Puntos : ".$auxiliar."</a></li>

						<li>
						<a href=\"\">Menu ▽</a>
						<ul class=\"sub-menu\">
							<li><a href=\"repositoriorpreg.php\"> Mis Preguntas</a></li>
							<li><a href=\"repositorioresp.php\"> Mis Respuestas</a></li>
							<li><a href=\"logout.php\"> Salir</a></li>
					
						</ul>
					</li>

						
					");
						
					}else{

						echo("
						<li><a href=\"registro.php\" class=\"links\">Registrarse</a></li>
						<li><a href=\"login.php\" class=\"links\">Iniciar Sesión</a></li>
						");


					}
					?>


					
				</ul>
			
			</nav>
			<div class="clear"></div>
		</div>
	</header>	
</div>

</html>






<style type="text/css">
a {
	color: #789DCA;
	text-decoration: none;
	padding: 0.5px;}

a:hover {
	color: #789DCA;
}
ol, ul {
	list-style: none;
	padding:0px;
	margin:0px;
}
#wrap {
	margin: 0 auto;
}

.inner {
	margin: 0 auto;
	max-width: 1000px;
	padding: 0 0px;
}

.relative {
	position: relative;
	width: 1500px;
}

.right {
	float: right;
}

.left {
	float: left;
}

/* HEADER */
#wrap > header {
	background-color: #789DCA;
	padding-bottom: 25px;
	
}
.logo {
	display: inline-block;
	font-size: 0;
	padding-top:15px;
	left: 200px;

}
#navigation {
	position: absolute;
	right: -380px;
	bottom: 0px;
}

#menu-toggle {
	display: none;
	float: right;
	
}

/* HEADER > MENU */
#main-menu {
	float: right;
	font-size: 0;
	margin: 1px 0;
}

#main-menu > li {
	display: inline-block;
	margin-left: 30px;
	padding: 0px 0;
}

#main-menu > li.parent {
	background-size: 7px 7px;
	background-repeat: no-repeat;
	background-position: right center;
}

#main-menu > li.parent > a {
	
	padding-left: 14px;
}

#main-menu > li > a {
	color: #eee;
	font-size: 20px;
	line-height: 1px;
	padding: 30px 0;
	text-decoration:none;
}

#main-menu > li:hover > a,
#main-menu > li.current-menu-item > a {
	
	color: #23dbdb;
	
}

/* HEADER > MENU > DROPDOWN */
#main-menu li {
	position: relative;
	right: 25px;
	
	
}

ul.sub-menu { /* level 2 */
	display: none;
	left: 0px;
	top: 38px;
	padding-top: 10px;
	position: absolute;
	width: 150px;
	z-index: 9999;


}

ul.sub-menu ul.sub-menu { /* level 3+ */
	margin-top: -1px;
	padding-top: 0;
	left: 149px;
	top: 0px;
}

ul.sub-menu > li > a {
	background-color: #333;
	border: 1px solid #444;
	border-top: none;
	color: white;
	display: block;
	font-size: 20px;
	line-height: 15px;
	padding: 10px 10px;
}

ul.sub-menu > li > a:hover {
	background-color: #2a2a2a; 
	color: #789DCA;
}

ul.sub-menu > li:first-child {
	border-top: 3px solid #23dbdb;
	
}

ul.sub-menu ul.sub-menu > li:first-child {
	
	border-top: 1px solid #444;
}

ul.sub-menu > li:last-child > a {
	
	border-radius: 0 0 2px 2px;
}

ul.sub-menu > li > a.parent {
	background-color: coral;

	background-image: url(../images/arrow.png);
	background-size: 5px 9px;
	background-repeat: no-repeat;
	background-position: 95% center;
}

#main-menu li:hover > ul.sub-menu {
	display: block; /* show the submenu */
}

</style>
