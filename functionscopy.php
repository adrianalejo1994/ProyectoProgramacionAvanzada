<?php
$PathImg = "http://localhost/web/crud/Imagenes"; //para usar el pat de imagenes cuando se deba... 


function ConectarCat()
{
    global $conn; 
    $usuario = "root";
    $clave = "";
    $conn = new PDO('mysql:host=localhost;dbname=proyectofinal',$usuario,$clave);
}

function DesconectarCat()
{
    global $conn;
    $conn = null;
}

function buscarUsuario($id) {
    global $conn;
    ConectarCat();
            $sql = 'SELECT * 
                        FROM USUARIO 
                        WHERE IDUSUARIO='.$id;
      $cursor = $conn->query($sql)->fetch();

    DesconectarCat();

    return $cursor;
}
?>


