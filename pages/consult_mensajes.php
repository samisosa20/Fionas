<?php
    session_start();
    $id_user = $_SESSION["Id_user"];
    include_once("../conexions/connect.php");
    $id = $_GET["id"];
    $insert = "SELECT * FROM fionadb.notification WHERE id_user='$id_user' ORDER BY fecha DESC";
    $ejecutar =mysqli_query( $conn,$insert);
    
    while ($lista = mysqli_fetch_array($ejecutar)){
        $tipo = $lista ["tipo"];
        $titulo = $lista ["titulo"];
        $fecha = $lista ["fecha"];
        $leido = $lista ["leido"];
        $id = $lista ["id"];
        $contenido = $lista ["Contenido"];
        if($tipo == "Nuevo"){
            $color_btn = "btn-success";
            $icon = "<i class='far fa-newspaper'></i>";
        } else if ($tipo == "Mejora"){
            $color_btn = "btn-warning";
            $icon = "<i class='fas fa-wrench'></i>";
        }
        if ($leido == 0){
            $text_class = "font-weight-bold";
        } else {
            $text_class = "";
        }
        echo "<div onclick='show_mensaje($id)'
            class='message-item d-flex align-items-center border-bottom'>
            <button class='$color_btn btn-circle ml-3'>$icon</button>
            <div class='w-75 d-inline-block v-middle pl-2'>
                <h6 class='message-title $text_class mb-0 mt-1'>$titulo</h6>
                <span class='font-12 text-nowrap d-block text-muted'>$tipo</span>
                <span class='font-12 text-nowrap d-block text-muted'>$fecha</span>
            </div>
        </div>";
    }
    mysqli_close($conn);
?>