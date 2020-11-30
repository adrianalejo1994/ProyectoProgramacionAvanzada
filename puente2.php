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

Conectarco();
$IDUSUARIO=$_SESSION['usuarioactivo'];
echo$respuesta;
$sql = "UPDATE respuesta SET ESTADORESPUESTA=ESTADORESPUESTA+1 WHERE IDRESPUESTA=$respuesta"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);
//fin de verificacion de respuestas

Desconectarco();
header("Location: ppregunta.php?var=$pregunta"); 

?>