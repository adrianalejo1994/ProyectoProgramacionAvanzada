<?php 
session_start();
include("functionsco.php");
isset($_POST['idresp']);
{
    $respuesta=$_POST['idresp'];
}
isset($_POST['idpreg']);
{
    $pregunta=$_POST['idpreg'];
}
isset($_POST['idusu']);
{
    $user=$_POST['idusu'];
}
Conectarco();


$sql3 = "SELECT MAX(ESTADORESPUESTA) Votos FROM respuesta WHERE IDPREGUNTA = $pregunta"; //separa las categorias
$vots = $conn->query($sql3);
foreach ($vots as $fila) {
$canvotos=$fila["Votos"];
}	
$sql4 = "SELECT IDUSUARIO, IDRESPUESTA FROM respuesta WHERE ESTADORESPUESTA = $canvotos"; //separa las categorias
$ptos = $conn->query($sql4);
foreach ($ptos as $fila) {
$idmvp=$fila["IDUSUARIO"];
$resp=$fila["IDRESPUESTA"];
}

if($respuesta==$resp){
$sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE+8 WHERE IDUSUARIO='$idmvp'";
$res2 = $conn->query($sql2); 
}

$IDUSUARIO=$_SESSION['usuarioactivo'];
echo$respuesta;
$sql = "UPDATE respuesta SET ESTADORESPUESTA=ESTADORESPUESTA+1 WHERE IDRESPUESTA=$respuesta"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);
//fin de verificacion de respuestas

Desconectarco();
header("Location: ppregunta.php?var=$pregunta"); 

?>