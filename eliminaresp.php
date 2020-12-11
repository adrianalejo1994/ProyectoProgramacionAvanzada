<?php
session_start();

if ( isset( $_SESSION['usuarioactivo'] ) ) {	
	
} else {
	echo("
	<script>
	window.alert(\"DEBE INICIAR SESIÓN\")
	</script>
	");
	echo("
    <script> 
    <!--
    window.location.replace('login.php'); 
    //-->
    </script>
    ");
}



include("functionscopy.php");
$conn = mysqli_connect('localhost', 'root', '');  
if (! $conn) {  
die("Connection failed" . mysqli_connect_error());  
}  
else {  
mysqli_select_db($conn, 'proyectofinal');  
}  

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 
extract($_GET);

if(@$idborrar==3){
 
    $sql="DELETE FROM RESPUESTA WHERE IDRESPUESTA=$IDRESPUESTA";
    echo $sql;
    $res=mysqli_query($conn, $sql);
     
}
?>

<script type="text/javascript">
alert("Se ha eliminado exitosamente");
window.location.href='repositorioresp.php';
</script>