<?php 
session_start();
include("functionsco.php");
isset($_POST['comments']);
{
    $respuesta=$_POST['comments'];
}
echo$respuesta;
$idpregunta=$_POST['ocultoID'];
$DESCRIPCIONRESPUESTA="";
$aux=$_POST['comments'];
Conectarco();
$t=time();
$IDPREGUNTA=$idpregunta;
$IDUSUARIO=$_SESSION['usuarioactivo'];
$DESCRIPCIONRESPUESTA=$respuesta; 
            isset($_POST['comments']);
            {
                $respuesta=$_POST['comments'];
            }
            echo$respuesta;
echo$aux;

$FECHACREACIONRESPUESTA = date("Y-m-d",$t);
if($DESCRIPCIONRESPUESTA!=" ")
{
$sql = "INSERT INTO respuesta VALUES ( null,'".$IDPREGUNTA ."', '".$IDUSUARIO."', '".$DESCRIPCIONRESPUESTA."','1', now())"; //selecciona la id de la pregunta perteneciente a la categoria
}
$idpre = $conn->query($sql);

//fin de verificacion de respuestas
$respuesta="";
Desconectarco();
header("Location: ppregunta.php?var=$idpregunta"); 

?>