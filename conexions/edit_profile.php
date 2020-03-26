<?php
    session_start();
    $id_user = $_SESSION["Id_user"];
    include_once("connect.php");
    $name = $_POST["name"];
    $lastname = $_POST["last_name"];
    $pass = $_POST["passw"];
    $hash = Password::hash($pass);
    if ($pass != ""){
        $update = "UPDATE fionadb.users
        SET name='$name', last_name='$lastname', password='$hash'
        WHERE id_user='$id_user';";
    } else{
        $update = "UPDATE fionadb.users
        SET name='$name', last_name='$lastname'
        WHERE id_user='$id_user';";
    }
    $save = mysqli_query($conn, $update);
    if(!$save){ 
        echo 400;
    } else {
        echo 200;
        $_SESSION["name"] = $name;
        $_SESSION["last_name"] = $lastname;
    }
    mysqli_close($conn);
?>