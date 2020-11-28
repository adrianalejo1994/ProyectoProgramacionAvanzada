<?php
include("functionscopy.php");
session_start();

EliminarPregunta($_POST['IDPREGUNTA']);

function EliminarPregunta($IDPREGUNTA){
    $sql="DELETE IDPREGUNTA, IDUSUARIO, IDCATEGORIA,TITULO, DESCRIPCIONPREGUNTA, ESTADO, FECHACREACIONPREGUNTA  FROM PREGUNTA WHERE IDPREGUNTA='".$IDPREGUNTA."'";
    mysqli_query($sql);
}
?>
<script type="text/javascript">
    alert("La pregunta se ha eliminado");
    window.location.href= 'perfilusuario.php';
</script>