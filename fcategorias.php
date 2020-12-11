<?php
include("functionscopy.php");
ConectarCat();

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
 
        $sql2 = "SELECT IDCATEGORIA FROM categoria WHERE IDCATEGORIA ='" . ($i) . "'";
        $ncat = $conn->query($sql2);
        foreach ($ncat as $fila) {
            $ncategoria = $fila["IDCATEGORIA"];
        }

       echo("<section>
            <ul  class=\"posts\">
                    <article>
                        <header>
                        
                        <h3><a href=\"pcategoria.php?var=$categoria&id=$ncategoria\">".($categoria)."</a></h3>

                        </header>
                        <p><a href=\"pcategoria.php?var=$categoria&id=$ncategoria\" class=\"image\"><img src=\"images/imagen$ncategoria.png\" alt=\"\" /></a></p>
                        <form action=\"pcategoria.php\" method=\"get\">
                    </article>
            </ul>");

    }
    DesconectarCat();

?>



</form>