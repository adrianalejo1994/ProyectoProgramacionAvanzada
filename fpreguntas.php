<?php
include("functions.php");
Conectar();
    $categoria=$_GET['var'];
    $sql = "SELECT COUNT(*) FROM pregunta"; //Conteo Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias

    for ($i = 1; $i <= $number_of_rows; $i++) {
 
        $sql = "SELECT pregunta.TITULO FROM pregunta,categoria WHERE categoria.NAMECATEGORIA ='$categoria'";
        $res = $conn->query($sql);
        foreach ($res as $fila) {
            $preguntas = $fila["TITULO"];
        }


       echo("<section>
            <ul class=\"posts\">
                <li>
                    <article>
                        <header>
                        <h3><a href=\"pcategoria.php?var=$preguntas\">".($preguntas)."</a></h3>
                        </header>
                        <a href=\"pcategoria.php?var=$preguntas\" class=\"image\"><img src=\"images/pic08.jpg\" alt=\"\" /></a>
                        <form action=\"pcategoria.php\" method=\"get\">                  
                        </article>
                </li>
            </ul>");
    }
    Desconectar();

?>

