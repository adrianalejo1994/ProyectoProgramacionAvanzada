<?php
session_start();

if ( isset( $_SESSION['usuarioactivo'] ) ) {
    
} else {
    header("Location: login.php");
}

//commit probar 6
// el macho digo yo-.....
=======
//prueba Alejandro

?>



<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
if($_SESSION["usuarioactivo"]) {
?>
Welcome <?php echo $_SESSION["usuarioactivo"]; ?>. Bienvenido <a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>
</body>
</html>
