<?php
    session_start();
    $id_user = $_SESSION["Id_user"];
    include_once("connect.php");
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $divisa = $_POST["divisa"];
    $monto_ini = $_POST["monto_ini"];
    $insert = "INSERT INTO fionadb.cuentas
    (nombre, descripcion, Divisa, monto_inicial, id_user)
    VALUES('$nombre', '$descripcion', '$divisa', $monto_ini, '$id_user');    
    ";
    $save = mysqli_query($conn, $insert);
    if(!$save){ 
        echo 400;
    } else {
        echo 200;
    }
    mysqli_close($conn);
?>