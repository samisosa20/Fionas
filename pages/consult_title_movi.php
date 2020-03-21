<?php
session_start();
$id_user = $_SESSION["Id_user"];
include_once("../conexions/connect.php");
$id=$_GET["id"];
$action=$_GET["action"];
$insert = "SELECT * FROM fionadb.cuentas WHERE id_user='$id_user' and id=$id";
$ejecutar =mysqli_query( $conn,$insert);
$lista = mysqli_fetch_array($ejecutar);
$nombre = $lista["nombre"];
$descripcion =  $lista["descripcion"];
if ($action == 1) {
    echo "Movimientos de $nombre";
} else {
    echo $descripcion;
}
mysqli_close($conn);
?>