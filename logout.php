<?php
session_start();
unset($_SESSION["usuarioactivo"]);
header("Location:login.php");
?>