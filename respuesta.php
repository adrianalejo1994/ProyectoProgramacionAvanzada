<?php 
include("functionsco.php");
Conectarco();

$idpregunta=$_GET['var']; //obtencion del nombre de categoria
//echo$idpregunta;
$k=0;
$sql = "SELECT COUNT(*) FROM respuesta WHERE IDPREGUNTA = $idpregunta"; //Conteo Categorias
$cont = $conn->query($sql);
$cont->execute(); 
$number_of_rows = $cont->fetchColumn(); //Numero de Categorias

$sql = "SELECT IDUSUARIO, DESCRIPCIONRESPUESTA,FECHACREACIONRESPUESTA1, IDRESPUESTA FROM respuesta WHERE respuesta.IDPREGUNTA = $idpregunta"; //separa las categorias
$res = $conn->query($sql);

foreach ($res as $fila) {
    $usu[$k] = $fila["IDUSUARIO"]; //almacena la respuesta
    $resp[$k] = $fila["DESCRIPCIONRESPUESTA"]; //alamacena el usuario 
    $fecha[$k] = $fila["FECHACREACIONRESPUESTA1"]; //almacena la fecha
    $idresp[$k] = $fila["IDRESPUESTA"]; //almacena la id de respuesta
    $k++;
}	

Desconectarco();



if($number_of_rows>0) //verificacion de la existenca de respuestas
{

    for($i=0; $i<$number_of_rows;$i++)
    {
    echo("
            <div class=\"post\" style=\"border-radius:10px\">
            <h1>$usu[$i]</h1>
                <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$resp[$i]       
                </form>
                <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\">$fecha[$i]    
                <input id=\"prodId2\" name=\"idresp\" value=".$idresp[$i]." type=\"hidden\">   
                <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">  
                <input type=\"submit\" name=\"idpreg1\" value=\"Votar\">
                </form>

                </form>
            </div>

    ");

    }

if(isset( $_SESSION['usuarioactivo'] ) ){ //si esta iniciado sesion 
    
?>

<h2>Responde:</h2>
<div style="border-radius:10px" id="container">	
	<div style="border-radius:10px" id="demo"></div>
        <div class="post" style="border-radius:10px">
        <h1><?php echo$_SESSION['usuarioactivo']?></h1>
			<form name="form" action="puente.php?<?php echo$idpregunta; ?>" id="form" method="post">
					<textarea required style="border-radius:10px" name="comments" placeholder="Insertar tu respuesta aqui..." id="comment" style="width:635px; height:100px;"> </textarea></br></br>
                    <input type="hidden" id="oculto" name="ocultoID" value="<?php echo$idpregunta ?>">
                    <button name="respuesta" id="submit" class="button" style="outline: none;border:none;">Responder</button></br>
                
            </form>
        </div>
    </div>
</div>
<?php 
}

else{ //si no esta iniciado sesion 
    echo(
        "<div style=\"border-radius:10px\" id=\"container\"><h1>Registrate o Inicia Sesión para poder responder</h1>
         <a class=\"button\" href=\"registro.php\">Registrarse</a>	
         <a class=\"button\" href=\"login.php\">Iniciar Sesión</a>	
        <div style=\"border-radius:10px\" id=\"demo\"></div>
        </div>
        </div>"    
        );

}
}

else
{

    if(isset( $_SESSION['usuarioactivo'] ) ){ //si esta iniciado sesion 
        {
           ?>
           <h2>Se el primero en responder</h2>
            <div style="border-radius:10px" id="container">	
                <div style="border-radius:10px" id="demo"></div>
                    <div class="post" style="border-radius:10px">
                    <h1><?php echo$_SESSION['usuarioactivo']?></h1>
                        <form name="form" action="puente.php?<?php echo$idpregunta; ?>" id="form" method="post">
                                <textarea required style="border-radius:10px" name="comments" placeholder="Insertar tu respuesta aqui..." id="comment" style="width:635px; height:100px;"> </textarea></br></br>
                                <input type="hidden" id="oculto" name="ocultoID" value="<?php echo$idpregunta ?>">
                                <button name="respuesta" id="submit" class="button" style="outline: none;border:none;">Responder</button></br>
                            
                        </form>
                    </div>
                </div>
            </div>
           <?php
        }
    }
    else
    echo(
        "<div style=\"border-radius:10px\" id=\"container\"><h1>Registrate o Inicia Sesión para poder responder</h1>
         <a class=\"button\" href=\"registro.php\">Registrarse</a>	
         <a class=\"button\" href=\"login.php\">Iniciar Sesión</a>	
        <div style=\"border-radius:10px\" id=\"demo\"></div>
        </div>
        </div>"
    
        );
}
?>