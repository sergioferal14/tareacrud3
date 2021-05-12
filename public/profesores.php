<?php

require "../vendor/autoload.php";
use Clases\Profesores;

$losProfesores=new Profesores();
$datos=$losProfesores->read();
$losProfesores=null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>    <title>Profesores</title>
</head>
<body style="background-color:cadetblue">
<?php
    require 'resources/navbar.php';
?>
    <h3 class="text-center mt-3">Gestion Profesores</h3>

    <div class="container mt-3">
    <a href="crearProfesor.php" class="btn btn-success my-3">Añadir profesor</a>
        <table class=" table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($fila=$datos->fetch(PDO::FETCH_OBJ)){
                    echo <<<TEXTO
                    <tr>
                    <th scope="row">{$fila->nom_prof}</th>
                    <td>{$fila->sueldo}</td>
                    <td>{$fila->fecha_prof}</td>
                    <td>@{$fila->dep}</td>
                    <td>
                    <form action="borrarProfesor.php" method='POST' class='form-inline'>
                    <input type="hidden" name="codigo" value="{$fila->id}"/>
                    <a href="editarProf.php?id={$fila->id}" class="btn btn-warning mr-3">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form> 
                    </td>
                    </tr>
                    TEXTO;
                }
                ?>
                
            </tbody>
        </table>
    </div>

</body>
</html>
