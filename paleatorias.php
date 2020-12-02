<?php
Conectar();
$k3=0;
$k2=0;
$k=0;

    $sql = "SELECT COUNT(*) FROM pregunta"; //Conteo preguntas Categorias
    $res = $conn->query($sql);
    $res->execute(); 
    $number_of_rows = $res->fetchColumn(); //Numero de Categorias
    //echo$number_of_rows;

    $sql = "SELECT pregunta.IDPREGUNTA FROM pregunta"; //selecciona la id de la pregunta perteneciente a la categoria
    $idpre = $conn->query($sql);

    foreach ($idpre as $fila) {
        $cant[$k3] = $fila["IDPREGUNTA"]; //almacena las ids de las preguntas
        //echo$idpregunta[$k2]."</br>";
        //echo$cant[$k3]."</br>";
        $k3++;
        
    }
    
    $cant[shuffle($cant)];

    //echo$aux."</br>";
    //echo$number_of_rows."</br>";
    /*for ($i = 0; $i < 20 ; $i++)
    {
        $aleatorio= mt_rand(1,$number_of_rows);
        //echo$aleatorio."<br/>";
        $listanumeros[$i] = $aleatorio;
        //echo$listanumeros[$i]."</br>";
    }*/
    //echo$aleatorio;
    for ($i = 0; $i <20; $i++) {
        // echo$categoria;

        $sql = "SELECT pregunta.TITULO FROM pregunta WHERE pregunta.IDPREGUNTA = $cant[$i] "; //separa las categorias
        $res = $conn->query($sql);
    
        foreach ($res as $fila) {
            $preguntas[$k] = $fila["TITULO"]; //alamacena las preguntas de la categoria
            //echo$preguntas[$k]."</br>";
            $k++;
            
        }
        //echo$i;
        //echo$preguntas[$i];

        echo("<section>
        <div style=\"border-radius:10px\" class=\"post\">
        <ul>
                <article>
                    <header>
                    <h3><a href=\"ppregunta.php?var=$cant[$i]\">".($preguntas[$i])."</a></h3>
                    </header>
                    <form action=\"ppregunta.php\" method=\"get\">                  
                </article>
            </div>
        </ul>");
    }
    Desconectar();
    
?>