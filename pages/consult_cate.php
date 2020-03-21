<?php
session_start();
$id_user = $_SESSION["Id_user"];
include_once("../conexions/connect.php");
$insert = "SELECT * FROM fionadb.categorias WHERE id_user='$id_user'";
$ejecutar =mysqli_query( $conn,$insert);
echo "<option value='0' selected>Selecciona una opción</option>";
while ($lista = mysqli_fetch_array($ejecutar)){
    $id = $lista["id"];
    $nombre = $lista ["categoria"];
    echo "<option value='$id'>$nombre</option>";
}
mysqli_close($conn);
?>