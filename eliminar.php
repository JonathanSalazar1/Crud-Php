<?php

    include_once'Conexion/conexion.php';    

    if(!isset($_GET['NumeroAgente'])){
        header("location: index.php?mensaje=Error");
        exit();
    }

    $NumeroAgente=$_GET['NumeroAgente'];

    $sen=$bd->prepare("DELETE FROM agente WHERE NumeroAgente=?; ");
    $res=$sen->execute([$NumeroAgente]);
    

    if ($res==TRUE) {
        header('Location: index.php?mensaje=Agente Borrado');
    } else {
        header("location: index.php?mensaje=Error");
    }
    

?>