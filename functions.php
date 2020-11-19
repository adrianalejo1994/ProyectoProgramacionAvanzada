<?php
$PathImg = "http://localhost/web/crud/Imagenes";


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



