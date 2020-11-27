<?php
include("functions.php");
Conectar();
$k2=0;
$k=0;

    $sql = "SELECT COUNT(*) FROM pregunta"; //Conteo preguntas Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias
    //echo$number_of_rows;


    for ($i = 1; $i <= $number_of_rows ; $i++)
    {
        $aleatorio= mt_rand(1,20);
        //echo$aleatorio."<br/>";
        $listanumeros[$i] = $aleatorio;
        
    }
    //echo$aleatorio;
    for ($i = 1; $i <= 20; $i++) {
        // echo$categoria;
        $sql = "SELECT pregunta.IDPREGUNTA FROM pregunta WHERE pregunta.IDPREGUNTA = $listanumeros[$i]"; //selecciona la id de la pregunta perteneciente a la categoria
        $idpre = $conn->query($sql);

        foreach ($idpre as $fila) {
            $idpregunta[$k2] = $fila["IDPREGUNTA"]; //almacena las ids de las preguntas
            $k2++;
        }

        $sql = "SELECT pregunta.TITULO FROM pregunta WHERE pregunta.IDPREGUNTA = $listanumeros[$i] "; //separa las categorias
        $res = $conn->query($sql);
    
        foreach ($res as $fila) {
            $preguntas[$k] = $fila["TITULO"]; //alamacena las preguntas de la categoria
            $k++;
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