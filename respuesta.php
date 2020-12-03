<?php 
include("functionsco.php");
Conectarco();
$idpregunta=$_GET['var']; //obtencion del nombre de categoria
//echo$idpregunta;
$k=0;
$k2=0;
$sql = "SELECT COUNT(*) FROM respuesta WHERE IDPREGUNTA = $idpregunta"; //Conteo Categorias
$cont = $conn->query($sql);
$cont->execute(); 
$number_of_rows = $cont->fetchColumn(); //Numero de Categorias

$sql = "SELECT IDUSUARIO, DESCRIPCIONRESPUESTA,FECHACREACIONRESPUESTA1, IDRESPUESTA, ESTADORESPUESTA FROM respuesta WHERE respuesta.IDPREGUNTA = $idpregunta"; //separa las categorias
$res = $conn->query($sql);

foreach ($res as $fila) {
    $usu[$k] = $fila["IDUSUARIO"]; //almacena la respuesta
    $resp[$k] = $fila["DESCRIPCIONRESPUESTA"]; //alamacena el usuario 
    $fecha[$k] = $fila["FECHACREACIONRESPUESTA1"]; //almacena la fecha
    $idresp[$k] = $fila["IDRESPUESTA"]; //almacena la id de respuesta
    $votos[$k] = $fila["ESTADORESPUESTA"];  //almacena la id de respuesta
    $k++;
}	


$sql3 = "SELECT MAX(ESTADORESPUESTA) Votos FROM respuesta WHERE IDPREGUNTA = $idpregunta"; //separa las categorias
$vots = $conn->query($sql3);
foreach ($vots as $fila) {
$canvotos=$fila["Votos"];
}	
//SELECT MAX(ESTADORESPUESTA) Votos FROM respuesta WHERE IDPREGUNTA = 5
//sumar 8ptos


if($number_of_rows>0) //verificacion de la existenca de respuestas
{
$sql4 = "SELECT IDUSUARIO, DESCRIPCIONRESPUESTA,FECHACREACIONRESPUESTA1, IDRESPUESTA, IDPREGUNTA, ESTADORESPUESTA FROM respuesta WHERE ESTADORESPUESTA = $canvotos && IDPREGUNTA = $idpregunta"; //separa las categorias
$infovots = $conn->query($sql4);
foreach ($infovots as $fila) {
    $usuv = $fila["IDUSUARIO"]; //almacena la respuesta
    $respv= $fila["DESCRIPCIONRESPUESTA"]; //alamacena el usuario 
    $fechav = $fila["FECHACREACIONRESPUESTA1"]; //almacena la fecha
    $idrespv = $fila["IDRESPUESTA"]; //almacena la id de respuesta
    $votosv = $fila["ESTADORESPUESTA"];  //almacena la id de respuesta
    $k2++;
}	



    

if(isset( $_SESSION['usuarioactivo'] ) ){ //si esta iniciado sesion 
    if($canvotos>0){
        if($usuv!=$_SESSION['usuarioactivo'] ){ //No puede votarse aasi mismo como mvp
        
        
//////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$usuv'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto1 = $fila["FOTO"];
}

////////////////////////////////////

    echo("
    
            <div class=\"post\" style=\"border-radius:10px\">

            ");


            echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');

            echo("
            <h1>Mejor Puntuado</h1>
            <h1>$usuv</h1>

            <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$respv 
            </br>    
            </br>   
            <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fechav</br>
            Votos: $votosv</h4>    
            <input id=\"prodId2\" name=\"idresp\" value=".$idrespv." type=\"hidden\">   
            <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
            <input type=\"submit\" name=\"idpreg1\" value=\"Votar\">
            </form>
        </div>

    ");
        }
        else{




            echo("
            <div class=\"post\" style=\"border-radius:10px\">
            <h1>Mejor Puntuado</h1>
            <h1>$usuv</h1>
                <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$respv 
                </br>    
                </br>   
                <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fechav</br>
                Votos: $votosv</h4>    
                <input id=\"prodId2\" name=\"idresp\" value=".$idrespv." type=\"hidden\">   
                <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
                </form>
            </div>
    
        "); 
        }
        
    }
    for($i=0; $i<$number_of_rows;$i++)
    {
    if( $_SESSION['usuarioactivo'] == $usu[$i] ){

        
//////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$usu[$i]'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto1 = $fila["FOTO"];
}

////////////////////////////////////

    echo("
    
            <div class=\"post\" style=\"border-radius:10px\">

            ");


            echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');

            echo("

            <h1>$usu[$i]</h1>
                <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$resp[$i]

                
    
                </br>    
                </br>   
                <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fecha[$i] </br>
                Votos: $votos[$i]</h4>    
                <input id=\"prodId2\" name=\"idresp\" value=".$idresp[$i]." type=\"hidden\">   
                <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
                <input id=\"prodId2\" name=\"idusu\" value=".$usuv[$i]." type=\"hidden\">   
                
                </form>
            </div>

    ");






    }  
    else{
//////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$usu[$i]'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto1 = $fila["FOTO"];
}

////////////////////////////////////



        echo("
        <div class=\"post\" style=\"border-radius:10px\">
        ");
        echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');

        echo("
        <h1>$usu[$i]</h1>
            <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$resp[$i] 
            </br>    
            </br>   
            <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fecha[$i] </br>
            Votos: $votos[$i]</h4>    
            <input id=\"prodId2\" name=\"idresp\" value=".$idresp[$i]." type=\"hidden\">   
            <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
            <input id=\"prodId2\" name=\"idusu\" value=".$usuv[$i]." type=\"hidden\">  
            <input type=\"submit\" name=\"idpreg1\" value=\"Votar\">
             </form>
        </div>
    ");
    }
}

?>









<h2>Responde:</h2>
<div style="border-radius:10px" id="container">	
	<div style="border-radius:10px" id="demo"></div>
        <div class="post" style="border-radius:10px">




        <?php


//////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila)
{
$foto1 = $fila["FOTO"];
}

////////////////////////////////////



echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');



?>
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
    if($canvotos>0){



        //////////////////////////////////sacar foto

        $sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$usuv'";
        $res = $conn->query($sql);
        foreach($res as $fila)
        {
            $foto1 = $fila["FOTO"];
        }
        
        ////////////////////////////////////
        
            echo("
            
                    <div class=\"post\" style=\"border-radius:10px\">
        
                    ");
        
        
                    echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');
        
                    echo("
        
                    <h1>$usuv</h1>

            <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$respv 
            </br>    
            </br>   
            <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fechav</br>
            Votos: $votosv</h4>    
            <input id=\"prodId2\" name=\"idresp\" value=".$idrespv." type=\"hidden\">   
            <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
            </form>
        </div>

    ");
    }
    for($i=0; $i<$number_of_rows;$i++)
    {
    //////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '$usu[$i]'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto1 = $fila["FOTO"];
}

////////////////////////////////////

    echo("
    
            <div class=\"post\" style=\"border-radius:10px\">

            ");


            echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');

            echo("

            <h1>$usu[$i]</h1>
                <form name=\"form\" action=\"puente2.php\" id=\"form\" method=\"POST\">$resp[$i] 
                </br>    
                </br>   
                <form class=\"mini-post\" name=\"form\"  id=\"form\" method=\"POST\"><h4>Fecha de publicacion: $fecha[$i] </br>
                Votos: $votos[$i]</h4>    
                <input id=\"prodId2\" name=\"idresp\" value=".$idresp[$i]." type=\"hidden\">   
                <input id=\"prodId\" name=\"idpreg\" value=".$idpregunta." type=\"hidden\">
                </form>
            </div>

    ");
    }  
    
    
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

                    <?php


                    //////////////////////////////////sacar foto

$sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= '".$_SESSION['usuarioactivo']."'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $foto1 = $fila["FOTO"];
}

////////////////////////////////////

    echo("
    
            <div class=\"post\" style=\"border-radius:10px\">

            ");


            echo(' <img class="imag2" width="50" height="50" src="data:image/jpg;base64,'.base64_encode($foto1).'">');



            ?>



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


Desconectarco();
?>