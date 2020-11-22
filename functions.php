<?php
$PathImg = "http://localhost/web/crud/Imagenes"; //para usar el pat de imagenes cuando se deba... 


function Conectar()
{
    global $conn; 
    $usuario = "root";
    $clave = "";
    $conn = new PDO('mysql:host=localhost;dbname=proyectofinal',$usuario,$clave);
}

function Desconectar()
{
    global $conn;
    $conn = null;
}
?>


