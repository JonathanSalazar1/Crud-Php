<?php
include_once "Conexion/conexion.php";

$sen=$bd -> query("select * from agente");
$agente=$sen->fetchAll(PDO::FETCH_OBJ);


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


        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=="Error"){

        ?>
        <script>
            alert("Ocurrio un error");
        </script>
        <?php
            }
        ?>

        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=="Regsitrado"){

        ?>
        <script>
            alert("Se ha registardo correctamente");
        </script>
        <?php
            }
        ?>    

        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=="Cambios hechos"){

        ?>
        <script>
            alert("Se han guardado los cambios correctamente");
        </script>
        <?php
            }
        ?>

        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=="Agente Borrado"){

        ?>
        <script>
            alert("Se han elimidado el registro de un agente");
        </script>
        <?php
            }
        ?>


    <div class="container mt-8">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Listas de Agentes
                    </div>
                    <div class="p-6">
                       <table class="table align-middle">
                           <thead>
                               <tr>
                                   <th scope="col" class="text-center">Numero de Agente</th>
                                   <th scope="col"class="text-center">Nombre</th>
                                   <th scope="col"class="text-center">Primer Apellido</th>
                                   <th scope="col"class="text-center">Segundo Apellido</th>
                                   <th scope="col"class="text-center">Departamento/Área</th>
                                   <th scope="col"class="text-center">Puesto</th>
                                   <th scope="col" class="text-center">Estatus</th>
                                   <th scope="col" class="text-center">Fecha de Nacimiento</th>
                                   <th colspan="2" class="text-center">Opciones</th>
                               </tr>
                           </thead>
                           <tbody>
                                <?php
                                 foreach($agente as $agentes){
                                
                                ?>
                               <tr>
                                   <td scope="row" class="text-center"><?php  echo $agentes->NumeroAgente ?></td>
                                   <td class="text-center"><?php  echo $agentes->Nombre ?></td>
                                   <td class="text-center"><?php  echo $agentes->PrimerApellido ?></td>
                                   <td class="text-center"><?php  echo $agentes->SegundoApellido ?></td>
                                   <td class="text-center"><?php  echo $agentes->Departamento ?></td>
                                   <td class="text-center"><?php  echo $agentes->Puesto ?></td>
                                   <td class="text-center"><?php  echo $agentes->Estatus ?></td>
                                   <td class="text-center"><?php  echo $agentes->FechaNacimiento ?></td>
                                   <td class="text-center"><a class="text-success"href="editar.php?NumeroAgente=<?php  echo $agentes->NumeroAgente ?>"><i class="bi bi-pencil-square"></i></a></td>
                                   <td class="text-center"><a onclick="return confirm('Estas seguro de borrar?');" class="text-danger"href="eliminar.php?NumeroAgente=<?php echo $agentes->NumeroAgente?>"><i class="bi bi-trash3-fill"></i></a></td>
                               </tr>
                                <?php
                                 }
                                ?>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        Registrar Agentes
                    </div>
                    <form class="p-1" method="POST" action="registrar.php">
                        <div class="mb-1">
                            <label  class="form-label">Numero de Agente:</label>
                            <input type="text" class="form-control" name="NumeroAgente" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Nombre" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Primer Apellido:</label>
                            <input type="text" class="form-control" name="PrimerApellido" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Segundo Apellido:</label>
                            <input type="text" class="form-control" name="SegundoApellido" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Departamento/Área:</label>
                            <input type="text" class="form-control" name="Departamento" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Puesto:</label>
                            <input type="text" class="form-control" name="Puesto" required>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Estatus:</label>
                            <select class="form-select form-select-sm" name="Estatus" required>
                                <option value="1">No seleccionado</option>
                                <option value="2">Activo</option>
                                <option value="3">Inactivo</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Fecha de nacimeinto:</label>
                            <input type="date" class="form-control" name="FechaNacimiento" required>
                        </div>
                        <div class="d-grid md-2">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>