<?php
function list_year(){
    include_once('../conexions/connect.php'); 
    // Check connection
    if ( mysqli_connect_errno() ) {
        echo "Error: Ups! Hubo problemas con la conexión.  Favor de intentar nuevamente.";
    } else {
        $id_user = $_GET['idu'];
        $strsql = "SELECT year, FORMAT(SUM(if(grupo = 4, valor, 0)),2) AS ingreso, 
        FORMAT(SUM(if(grupo = 1 or grupo = 2, valor, 0)),2) AS egreso 
        FROM fionadb.presupuesto p 
        JOIN fionadb.categorias c ON (p.categoria = c.id and p.id_user = c.id_user)
        WHERE p.id_user='$id_user' GROUP BY year ORDER BY year ASC";
        $rs = mysqli_query($conn, $strsql);
        $total_rows = $rs->num_rows;
        if ($total_rows > 0 ) {
            while ($row = $rs->fetch_object()){
                $data[] = $row;
            }
            echo(json_encode($data));
        }
    }
};

function ahorrado(){
    include_once('../conexions/connect.php'); 
    // Check connection
    if ( mysqli_connect_errno() ) {
        echo "Error: Ups! Hubo problemas con la conexión.  Favor de intentar nuevamente.";
    } else {
        $id_user = $_GET['idu'];
        $divi =  $_GET['divi'];
        $strsql = "SELECT FORMAT(IF(SUM(valor) IS NULL, 0, SUM(valor)) + monto_inicial, 2) AS cantidad 
        FROM fionadb.cuentas AS a LEFT JOIN fionadb.movimientos AS b
        ON(a.id_user = b.id_user and b.cuenta = a.id) WHERE a.id_user='$id_user' and a.divisa='$divi'
        and cuenta_ahorro = 1";
        $rs = mysqli_query($conn, $strsql);
        $total_rows = $rs->num_rows;
        if ($total_rows > 0 ) {
            while ($row = $rs->fetch_object()){
                $data[] = $row;
            }
            echo(json_encode($data));
        }
    }
};

function new_user(){
    include_once('../conexions/connect.php'); 
    // Check connection
    if ( mysqli_connect_errno() ) {
        echo "Error: Ups! Hubo problemas con la conexión.  Favor de intentar nuevamente.";
    } else {
        $id_user = $_GET['idu'];
        $strsql = "SELECT * FROM info_user WHERE id_user='$id_user'";
        $rs = mysqli_query($conn, $strsql);
        $total_rows = $rs->num_rows;
        if ($total_rows > 0 ) {
            while ($row = $rs->fetch_object()){
                $data[] = $row;
            }
            echo(json_encode($data));
        }
    }
};
$action = $_GET['action'];
switch($action) {
    case 1: 
        list_year();
        break;
    case 2:
        list_account();
        break;
    case 3:
        movimientos();
        break;
    case 4:
        consolidado();
        break;
    case 5:
        consolidado_card();
        break;
    case 6:
        ahorrado();
        break;
    case 7:
        new_user();
        break;
}
?>
