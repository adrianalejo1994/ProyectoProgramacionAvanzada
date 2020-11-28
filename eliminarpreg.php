<?php
include("functionscopy.php");
session_start();

EliminarProducto($_GET['IDPREGUNTA']);

function EliminarProducto($IDPREGUNTA){
    $sql="DELETE  FROM PREGUNTA WHERE IDPREGUNTA='".$IDPREGUNTA."'";
    mysqli_query($sql);
}
?>
<script type="text/javascript">
    alert("La pregunta se ha eliminado");
    window.location.href= 'perfilusuario.php';
</script>