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

$sql = "SELECT IDPREGUNTA FROM PREGUNTA WHERE IDUSUARIO ='".$idpregunta."'";
$res = $conn->query($sql);
foreach($res as $fila)
{
    $IdPREG = $fila["IDPREGUNTA"];
}





$sql = "INSERT INTO respuesta VALUES ( null,".$IdPREG.", '".$IDUSUARIO."', '".$DESCRIPCIONRESPUESTA."','0', now())"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);
$sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE+2 WHERE IDUSUARIO='$IDUSUARIO'"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre2 = $conn->query($sql2);
}
//fin de verificacion de respuestas
$respuesta="";
Desconectarco();
header("Location: ppregunta.php?var=$idpregunta"); 

?>