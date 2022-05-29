<?php

include_once('Conexion/conexion.php');

$NumeroAgente=$_POST["NumeroAgente"];
$Nombre=$_POST["Nombre"];
$PrimerApellido=$_POST["PrimerApellido"];
$SegundoApellido=$_POST["SegundoApellido"];
$Departamento=$_POST["Departamento"];
$Puesto=$_POST["Puesto"];
$Estatus=$_POST["Estatus"];
$FechaNacimiento=$_POST["FechaNacimiento"];
switch ($Estatus) {
    case 1: $Estatus="No seleccionado";
        break;
    case 2: $Estatus="Activo";
        break;
    case 3: $Estatus="Inactivo";
}


if( empty($_POST["oculto"]) || empty($_POST["NumeroAgente"]) || empty($_POST["Nombre"]) || empty($_POST["PrimerApellido"]) || empty($_POST["SegundoApellido"])|| empty($_POST["Departamento"]) || empty($_POST["Puesto"]) || empty($Estatus) || empty($_POST["FechaNacimiento"])){
    
    header('Location: index.php?mensaje=falta datos');
    exit();

}

$sen = $bd -> prepare("INSERT INTO agente(NumeroAgente,Nombre,PrimerApellido,SegundoApellido,Departamento,Puesto,Estatus,FechaNacimiento) VALUES (?,?,?,?,?,?,?,?);");
$res=$sen->execute([$NumeroAgente,$Nombre,$PrimerApellido,$SegundoApellido,$Departamento,$Puesto,$Estatus,$FechaNacimiento]);

if($res == true){
    header('Location: index.php?mensaje=Regsitrado');
   
}else{
    header('Location: index.php?mensaje=Error');
    exit();
}

?>