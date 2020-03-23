<?php
session_start();
$id_user = $_SESSION["Id_user"];
include_once("../conexions/connect.php");
$insert = "SELECT * FROM fionadb.cuentas WHERE id_user='$id_user'";
$ejecutar =mysqli_query( $conn,$insert);
$select = $_GET["act"];
while ($lista = mysqli_fetch_array($ejecutar)){
    $id = $lista["id"];
    $nombre = $lista ["nombre"];
    if ($select == $id){
        echo "<option value='$id' selected>$nombre</option>";
    } else {
        echo "<option value='$id'>$nombre</option>";
    }
}
mysqli_close($conn);
?>