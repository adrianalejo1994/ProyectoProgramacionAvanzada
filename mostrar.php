<?php

include("functions.php");

Conectar();

    $sql = "SELECT FOTO FROM USUARIO WHERE `IDUSUARIO`= 'dar'";
    $res = $conn->query($sql);
    foreach($res as $fila)
    {
        $foto = $fila["FOTO"];
    }
    echo '<img src="data:image/jpg;base64,'.base64_encode($foto).'">';
    Desconectar();
?>