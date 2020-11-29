<?php 
include("functionsco.php");
Conectarco();
$idpregunta=$_GET['var']; //obtencion del nombre de categoria
//echo$idpregunta;


foreach ($idpre as $fila) {
    $pregunta = $fila["TITULO"]; //almacena las ids de las preguntas
    $descri = $fila["DESCRIPCIONPREGUNTA"];
}

if(isset( $_SESSION['usuarioactivo'] ) ){
?>

<div style="border-radius:10px" id="container">	
	<div style="border-radius:10px" id="demo"></div>
        <div class="post" style="border-radius:10px">
        <h1><?php echo$_SESSION['usuarioactivo']?></h1>
			<form name="form"  id="form" method="POST">
					<textarea style="border-radius:10px" name="comments" placeholder="Insertar tu respuesta aqui..." id="comment" style="width:635px; height:100px;"></textarea></br></br>
				<button type="submit"  name="respuesta" id="submit" class="button" style="outline: none;border:none;">Responder</button></br>
			</form>
        </div>
    </div>
</div>
<?php 
}
else{
?>
<div style="border-radius:10px" id="container">	
	<div style="border-radius:10px" id="demo"></div>

    </div>
</div>
<?php 
}

if (isset($_POST['comments'])) {
    $respuesta=$_POST['comments'];
 }
 else{
    $respuesta=null;
 }
$t=time();
$IDPREGUNTA=$_GET['var'];
$IDUSUARIO=$_SESSION['usuarioactivo'];
$DESCRIPCIONRESPUESTA=$respuesta;
$FECHACREACIONRESPUESTA = date("Y-m-d",$t);
$sql = "INSERT INTO respuesta VALUES ( null,'".$IDPREGUNTA ."', '".$IDUSUARIO."', '".$DESCRIPCIONRESPUESTA."','1', '".$FECHACREACIONRESPUESTA."')"; //selecciona la id de la pregunta perteneciente a la categoria
$idpre = $conn->query($sql);


Desconectarco();
?>