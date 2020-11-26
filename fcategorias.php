<?php
include("functions.php");
Conectar();

    $sql = "SELECT COUNT(*) FROM categoria"; //Conteo Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias

    for ($i = 1; $i <= $number_of_rows; $i++) {
 
        $sql = "SELECT * FROM categoria WHERE IDCATEGORIA ='" . ($i) . "'";
        $res = $conn->query($sql);
        foreach ($res as $fila) {
            $categoria = $fila["NAMECATEGORIA"];
        }


       echo("<section>
            <ul class=\"posts\">
                <li>
                    <article>
                        <header>
                        <h3><a href=\"pcategoria.php?var=$categoria\">".($categoria)."</a></h3>
                        </header>
                        <a href=\"pcategoria.php?var=$categoria\" class=\"image\"><img src=\"images/pic08.jpg\" alt=\"\" /></a>
                        <form action=\"pcategoria.php\" method=\"get\">
                        
                        </article>
                </li>
            </ul>");
    }
    Desconectar();

?>


</form>