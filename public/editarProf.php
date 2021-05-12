<!DOCTYPE html>
<html lang="es">
<?php

if(!isset($_GET['id'])){
    header("Location:profesores.php");
    die();
}
$id=$_GET['id'];
session_start();
require "../vendor/autoload.php";
use Clases\Profesores;
 
    function mostrarError($m){
        global $id;
        $_SESSION['error']=$m;
        header("Location:{$_SERVER["PHP_SELF"]}?id=$id");
        die();
    }


$nuevoProfesor=new Profesores();
$nuevoProfesor->setId($id);
$datos=$nuevoProfesor->devolverProfesor();


    
    

    if(isset($_POST['update'])){

       $nom_prof=trim($_POST['nom_prof']);
       $sueldo=trim($_POST['sueldo']);
       $fecha_prof=trim($_POST['fecha_prof']);
       $dep=trim($_POST['dep']);
       if(strlen($nom_prof)==0 || strlen($sueldo)==0 || strlen($fecha_prof)==0 || strlen($dep)==0){
            mostrarError("Rellene los campos!!!");
       }

       

       $nuevoProfesor=new Profesores();
       $nuevoProfesor->setId($id);
       $nuevoProfesor->setNom_prof($nom_prof);
       $nuevoProfesor->setSueldo($sueldo);
       $nuevoProfesor->setFecha_prof($fecha_prof);
       $nuevoProfesor->setDep($dep);
       $nuevoProfesor->update();
       $_SESSION['mensaje']="Profesor actualizado correctamente";
       header("Location:profesores.php");
       die();

    }else{
    
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Editar Profesor</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Editar Porfesor</h3>

    <div class="container mt-3">
        <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id" ?>" method="POST">
            <div class="mb-3">
                <label for="nom_prof" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nom_prof" value="<?php echo $datos->nom_prof ?>" required>
            </div>
            <div class="mb-3">
                <label for="sueldo" class="form-label">Sueldo</label>
                <input type="number" class="form-control" id="pvp" name="sueldo" value="<?php echo $datos->sueldo ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_prof" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="fecha_prof" placeholder="AAAA-MM-DD" name="fecha_prof" value="<?php echo $datos->fecha_prof ?>" required>
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">Departamento</label>
                <input type="number" class="form-control" id="stock" name="dep" value="<?php echo $datos->dep ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4" name="update">Actualizar</button>
            <a href="profesores.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php } ?>
</html>
