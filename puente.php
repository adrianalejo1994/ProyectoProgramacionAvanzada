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
$primres=$_POST['Primares'];
echo$primres;
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
$sql = "INSERT INTO respuesta VALUES ( null,'".$IDPREGUNTA ."', '".$IDUSUARIO."', '".$DESCRIPCIONRESPUESTA."','0', now())"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);
$sql2 = "UPDATE punto SET PUNTAJE= PUNTAJE+2 WHERE IDUSUARIO='$IDUSUARIO'"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre2 = $conn->query($sql2);
}

if($primres=="pr")
{
    $sql3 = "UPDATE punto SET PUNTAJE= PUNTAJE+1 WHERE IDUSUARIO='$IDUSUARIO'"; //selecciona la id de la pregunta perteneciente a la categoria
    $idpre3 = $conn->query($sql3);
}
//fin de verificacion de respuestas
$respuesta="";
Desconectarco();
header("Location: ppregunta.php?var=$idpregunta"); 

?>