<?php
require_once 'functionscopy.php';

$accion;
$usuario;

function EditarMascota($id) {
   // global $path_mascotas;
    $idusuario = $_POST['IDUSUARIO'];
    $nombre = $_POST['NOMBRE'];
    $clave = $_POST['CLAVE'];
    $foto = $_FILES['FOTO'];
    
    $fotoActual = $_POST['fotoActual'];
    $nombreFoto = explode(".",$foto['name']);
    $ext = $nombreFoto[sizeof($nombreFoto) - 1];
    $nombreFotoActual = explode(".",$fotoActual);
    $nuevaFoto = true;
    $fotoNombreArchivo = $nombreFotoActual[0] . "." . $ext;
    $pathFotoActual = $path_mascotas.$fotoActual;
    $pathFotoFinal = $path_mascotas.$fotoNombreArchivo;

    if($foto['size'] == 0) {
        $fotoNombreArchivo = $fotoActual;
        $nuevaFoto = false;
    }

    try {
        global $conn;
        conectar();
        $sql = "UPDATE usuario SET 
                IDUSUARIO=\"$idusuario\", 
                NOMBRE=\"$nombre\", 
                CLAVE=\"$clave\",
                MASFOTO=\"$fotoNombreArchivo\" 
                WHERE IDUSUARIO=$id";
        
        if($nuevaFoto) {
            unlink($pathFotoActual);
            move_uploaded_file($foto["tmp_name"], $pathFotoFinal);
        }
        $cursor = $conexion->query($sql);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(). '<br>';
    }
    header('location:perfilusuario.php?pagina='.$pagina); 
}
?>