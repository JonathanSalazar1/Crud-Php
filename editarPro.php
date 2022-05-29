<?php
    include_once 'Conexion/conexion.php';

    print_r($_POST);
    if(!isset($_POST['NumeroAgente'])){
        header('location: index.php?mensaje=Error');
    }

    $NumeroAgente=$_POST['NumeroAgente'];

    $Nombre=$_POST['Nombre'];

    $PrimerApellido=$_POST['PrimerApellido'];

    $SegundoApellido=$_POST['SegundoApellido'];

    $Departamento=$_POST['Departamento'];

    $Puesto=$_POST['Puesto'];

    $Estatus=$_POST['Estatus'];

    $FechaNacimiento=$_POST['FechaNacimiento'];


    $Estatus=$_POST['Estatus'];
    switch ($Estatus) {
        case 1: $Estatus="No seleccionado";
            break;
        case 2: $Estatus="Activo";
            break;
        case 3: $Estatus="Inactivo";
    }

    
    $sen = $bd->prepare("UPDATE agente SET Nombre=?, PrimerApellido=?, SegundoApellido=?, Departamento=?, Puesto=?, Estatus=?, FechaNacimiento=? WHERE NumeroAgente=?");

    $res=$sen->execute([$Nombre,$PrimerApellido,$SegundoApellido,$Departamento,$Puesto,$Estatus,$FechaNacimiento,$NumeroAgente]);

    if ($res==TRUE) {
        header("location: index.php?mensaje=Cambios hechos");
    } else {
        header('location: index.php?mensaje=Error');
        exit();
    }
    

?>