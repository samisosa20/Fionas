<?php
    session_start();
    include("connect.php");
    $user = $_POST["user"];
    $passwd = $_POST["passwd"];
    $consult = "SELECT * FROM fionadb.users WHERE email=BINARY'$user' and password=BINARY'$passwd'";
    $eject = mysqli_query($conn, $consult);
    if(empty(mysqli_fetch_array($eject))){ 
        echo 400;
    } else {
        echo 200;
        mysqli_data_seek($eject, 0);
        $result = mysqli_fetch_array($eject);
        $name = $result["name"];
        $last_name = $result["last_name"];
        $id_user = $result["id_user"];
        $_SESSION["user"]=$user;
        $_SESSION["Id_user"]=$id_user;
        $_SESSION["name"]=$name;
        $_SESSION["last_name"]=$last_name;
    }
    mysqli_close($conn);
?>