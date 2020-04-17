<?php
    session_start();
    $id_user = $_SESSION["Id_user"];
    include_once("connect.php");
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $grupo = $_POST["grupo"];
    $categoria = $_POST["categoria"];
    if ($categoria == 0){
        $insert = "INSERT INTO fionadb.categorias
        (categoria, sub_categoria, descripcion, grupo, id_user)
        SELECT '$nombre', `AUTO_INCREMENT` AS sub, '$descripcion', '$grupo', '$id_user'
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'fionadb'
        AND   TABLE_NAME   = 'categorias';";
    } else {
        $insert = "INSERT INTO fionadb.categorias
        (categoria, sub_categoria, descripcion, grupo, id_user)
        VALUES('$nombre', '$categoria', '$descripcion', '$grupo', '$id_user');
        ";
    }
    $save = mysqli_query($conn, $insert);
    if(!$save){ 
        echo 400;
    } else {
        echo 200;
    }
    mysqli_close($conn);
?>