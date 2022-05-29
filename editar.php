<?php
    include_once('Conexion/conexion.php');


    if(!isset($_GET['NumeroAgente'])){
        header('location: index.php?mensaje=error');
        exit();
    }

    $NumeroAgente=$_GET['NumeroAgente'];

    $sen= $bd->prepare("select * from agente where NumeroAgente = ?;");
    $sen->execute([$NumeroAgente]);
    
    $ag=$sen->fetch(PDO::FETCH_OBJ);

    #Soluciona el error de la variable que no esta definidad
    if($_POST){
        $Estatus=$_POST['Estatus'];

        switch ($Estatus) {
            case 1: $Estatus="No seleccionado";
                break;
            case 2: $Estatus="Activo";
                break;
            case 3: $Estatus="Inactivo";
        }
    }
    
  

?>




<!doctype html>
<html lang="es">
  <head>
    <title>Crud php y mysql</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  </head>
  <body>
      
    <div class="container-fluid bg-primary ">
        <div class="row">
            <div class="col-md">
                <header class="py-2">
                    <h3 class="text-center">Crud php y mysql</h3>

                </header>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="card">
                    <div class="card-header text-center">
                        Editar Datos de los Agentes
                    </div>
                    <form class="p-1" method="POST" action="editarPro.php">
                        <div class="mb-1">
                            <!-- <label  class="form-label">Numero de Agente:</label> -->
                            <input type="text" class="form-control" name="NumeroAgente" required value="<?php  echo $ag->NumeroAgente?>" hidden>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Nombre" required value="<?php  echo $ag->Nombre?>">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Primer Apellido:</label>
                            <input type="text" class="form-control" name="PrimerApellido" required value="<?php  echo $ag->PrimerApellido?>">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Segundo Apellido:</label>
                            <input type="text" class="form-control" name="SegundoApellido" required value="<?php  echo $ag->SegundoApellido?>">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Departamento/Área:</label>
                            <input type="text" class="form-control" name="Departamento" required value="<?php  echo $ag->Departamento?>">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Puesto:</label>
                            <input type="text" class="form-control" name="Puesto" required value="<?php  echo $ag->Puesto?>">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Estatus:</label>
                            <select class="form-select form-select-sm" name="Estatus" required>
                                <option value="1">No seleccionado</option>
                                <option value="2">Activo</option>
                                <option value="3">Inactivo</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label  class="form-label">Fecha de nacimeinto:</label>
                            <input type="date" class="form-control" name="FechaNacimiento" required value="<?php  echo $ag->FechaNacimiento?>">
                        </div>
                        <div class="d-grid md-2">
                            <input type="hidden" name="NumeroAgente" value="<?php  echo $ag->NumeroAgente?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>