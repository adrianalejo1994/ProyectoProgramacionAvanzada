<?php
session_start();
include("functions.php");
Conectar();
    $categoria=$_GET['var']; //obtencion del nombre de categoria
    $ncategoria=$_GET['id']; //obtencion de id de categoria seleccionada
    $sql = "SELECT COUNT(*) FROM pregunta WHERE pregunta.IDCATEGORIA = $ncategoria"; //Conteo preguntas Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias
    //incrementadores para almacenar tanto preguntas como id
    $k=0;
    $k2=0;
    $sql = "SELECT pregunta.TITULO FROM pregunta WHERE pregunta.IDCATEGORIA = $ncategoria "; //separa las categorias
    $res = $conn->query($sql);

<<<<<<< HEAD
    foreach ($res as $fila) {
        $preguntas[$k] = $fila["TITULO"]; //alamacena las preguntas de la categoria
        $k++;
    }
    for ($i = 1; $i <= $number_of_rows; $i++) {
        // echo$categoria;
        $sql = "SELECT pregunta.IDPREGUNTA FROM pregunta WHERE pregunta.IDCATEGORIA = $ncategoria"; //selecciona la id de la pregunta perteneciente a la categoria
        $idpre = $conn->query($sql);
=======
    $sql = "SELECT categoria.NAMECATEGORIA FROM pregunta,categoria WHERE categoria.NAMECATEGORIA ='$categoria'";
    $rescat = $conn->query($sql);
    foreach ($rescat as $fila) {
        $cat = $fila["NAMECATEGORIA"];
    }

    echo$cat;
    echo$categoria;
    for ($i = 1; $i <= $number_of_rows; $i++) {
 
        $sql = "SELECT pregunta.TITULO FROM pregunta JOIN categoria WHERE categoria.NAMECATEGORIA ='".$categoria."'";
        $res = $conn->query($sql);
        foreach ($res as $fila) {
            $preguntas = $fila["TITULO"];
        }
>>>>>>> Darling

        foreach ($idpre as $fila) {
            $idpregunta[$k2] = $fila["IDPREGUNTA"]; //almacena las ids de las preguntas
            $k2++;
        }
        $aux=$i-1;
        //echo$idpregunta[$i];
        //echo$preguntas[$aux];
        
        echo("<section>
        <div class=\"post\">
        <ul>
                <article>
                    <header>
                    <h3><a href=\"ppregunta.php?var=$idpregunta[$aux]\">".($preguntas[$aux])."</a></h3>
                    </header>
                    <form action=\"ppregunta.php\" method=\"get\">                  
                </article>
            </div>
        </ul>");
    }
    Desconectar();
    
?>

