<?php
session_start();
$id_user = $_SESSION["Id_user"];
include_once("../conexions/connect.php");
$insert = "SELECT IF(COUNT(id) IS NULL, 0, COUNT(id)) AS cant FROM fionadb.notification WHERE id_user='$id_user'
and leido = 0";
$ejecutar =mysqli_query( $conn,$insert);
$lista = mysqli_fetch_array($ejecutar);
$cant = $lista["cant"];
echo $cant;
mysqli_close($conn);
?>