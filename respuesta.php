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

$sql = "SELECT IDUSUARIO, DESCRIPCIONRESPUESTA,FECHACREACIONRESPUESTA1 FROM respuesta WHERE respuesta.IDPREGUNTA = $idpregunta"; //separa las categorias
$res = $conn->query($sql);

foreach ($res as $fila) {
    $usu[$k] = $fila["IDUSUARIO"]; //almacena la respuesta
    $resp[$k] = $fila["DESCRIPCIONRESPUESTA"]; //alamacena el usuario 
    $fecha[$k] = $fila["FECHACREACIONRESPUESTA1"]; //almacena la fecha
    $k++;
}


                                               
                                     
                                      /////////////////////////////7
//Para jalar la foto y el nick que es el id
$k2=0;
$nombreusuario=($_SESSION["usuarioactivo"]);
$sql2 = "SELECT IDUSUARIO,FOTO FROM USUARIO WHERE `IDUSUARIO`='$nombreusuario'"; //para mostrar la imagen
$res2 = $conn->query($sql2);


foreach($res2 as $fila2)
{
    $nick[$k2] = $fila2["IDUSUARIO"];      
    $foto = $fila2["FOTO"];
    $k2++;
}

Desconectarco();



if($number_of_rows>0) //verificacion de la existenca de respuestas
{
    //echo '<img width="100" src="data:image/jpg;base64,'.base64_encode( $foto[$i] ).'"/>';
    
    for($i=0; $i<$number_of_rows;$i++)
    {
        echo '<img src="data:image/jpeg;base64,'.base64_encode($foto).'" style="width: 100px; height:100px;">'; //////
    
        
        echo("
            <div class=\"post\" style=\"border-radius:10px\">
            <h1>$usu[$i]</h1> 
            <a>$nick[$i]</span>
 
                <form name=\"form\"  id=\"form\" method=\"POST\">$resp[$i]       
                </form>
                <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\">$fecha[$i]       
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