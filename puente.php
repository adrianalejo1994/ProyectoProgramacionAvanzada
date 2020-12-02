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


$sql3 = "SELECT MAX(ESTADORESPUESTA) Votos FROM respuesta WHERE IDPREGUNTA = $idpregunta"; //separa las categorias
$vots = $conn->query($sql3);
foreach ($vots as $fila) {
$canvotos=$fila["Votos"];
}	
$sql4 = "SELECT IDUSUARIO FROM respuesta WHERE ESTADORESPUESTA = $canvotos"; //separa las categorias
$ptos = $conn->query($sql4);
foreach ($ptos as $fila) {
$idmvp=$fila["IDUSUARIO"];
}	
$sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE+8 WHERE IDUSUARIO='$idmvp'";
$res2 = $conn->query($sql2); 

$FECHACREACIONRESPUESTA = date("Y-m-d",$t);
if($DESCRIPCIONRESPUESTA!=" ")
{
$sql = "INSERT INTO respuesta VALUES ( null,'".$IDPREGUNTA ."', '".$IDUSUARIO."', '".$DESCRIPCIONRESPUESTA."','0', now())"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);
$sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE+2 WHERE IDUSUARIO='$IDUSUARIO'"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre2 = $conn->query($sql2);
}
//fin de verificacion de respuestas
$respuesta="";
Desconectarco();
header("Location: ppregunta.php?var=$idpregunta"); 

?>