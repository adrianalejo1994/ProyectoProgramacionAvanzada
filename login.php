<html>
  <body>
    <form action="" method="post">
    <input type="text" name="IDUSUARIO" placeholder="Enter your IDUSUARIO" required>
    <input type="password" name="CLAVE" placeholder="Enter your CLAVE" required>
    <input type="submit" value="Submit">
    </form>
  </body>
</html>

<?php
include("functions.php");
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['IDUSUARIO'] ) && isset( $_POST['CLAVE'] ) ) {
      Conectar();
      $nombre = $_POST['IDUSUARIO'];
      $sql = "SELECT * FROM Usuario WHERE IDUSUARIO ='".$nombre."'";
      $res = $conn->query($sql);
      foreach($res as $fila)
      {
          $pass = $fila["CLAVE"];
          if (  $_POST['CLAVE']==$pass && $_POST['IDUSUARIO']==$nombre  ) {
            $_SESSION['usuarioactivo'] = $nombre;
            Desconectar();
            header('Location: principal.php');
          }
      }
    echo "acceso incorrecto";
    Desconectar();
    }
}
?>