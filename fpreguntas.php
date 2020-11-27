<?php
include("functions.php");
Conectar();
    $categoria=$_GET['var'];
    $ncategoria=$_GET['id'];
    $sql = "SELECT COUNT(*) FROM pregunta WHERE pregunta.IDCATEGORIA = $ncategoria"; //Conteo Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias
   
    $sql = "SELECT pregunta.TITULO FROM pregunta JOIN categoria WHERE pregunta.IDCATEGORIA = $ncategoria";
    $res = $conn->query($sql);

    $k=0;
    foreach ($res as $fila) {
        $preguntas[$k] = $fila["TITULO"];
        $k++;
    }
    for ($i = 1; $i <= $number_of_rows; $i++) {
        // echo$categoria;
        $sql = "SELECT pregunta.IDPREGUNTA FROM pregunta JOIN categoria WHERE pregunta.IDCATEGORIA = $ncategoria";
        $idpre = $conn->query($sql);

        $k2=0;
        foreach ($idpre as $fila) {
            $idpregunta[$k2] = $fila["IDPREGUNTA"];
            $k2++;
        }
        
        echo$idpregunta[$i];
        echo("<section>
        <ul class=\"posts\">
            <li>
                <article>
                    <header>
                    <h3><a href=\"pcategoria.php?var=$idpregunta[$i]\">".($preguntas[$i])."</a></h3>
                    </header>
                    <a href=\"pcategoria.php?var=$idpregunta[$i]\" class=\"image\"><img src=\"images/pic08.jpg\" alt=\"\" /></a>
                    <form action=\"pcategoria.php\" method=\"get\">                  
                    </article>
            </li>
        </ul>");
    }
    Desconectar();
    
?>

