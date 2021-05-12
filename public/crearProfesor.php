<!DOCTYPE html>
<html lang="es">
<?php
use Clases\Profesores; 
    session_start();
    require "../vendor/autoload.php";
    function mostrarError($m){
        $_SESSION['error']=$m;
        header("Location:crearProfesor.php");
    }
    if(isset($_POST['crear'])){
       $nombre=trim($_POST['nom_prof']);
       $sueldo=trim($_POST['sueldo']);
       $fecha_prof=trim($_POST['fecha_prof']);
       $departamento=trim($_POST['dep']);
       if(strlen($nombre)==0 || strlen($sueldo)==0 || strlen($fecha_prof)==0 || strlen($dep)==0){
            mostrarError("Rellene los campos!!!");
       }
       $nuevoProfesor=new Profesores();
       $nuevoProfesor->setNom_prof($nombre);
       $nuevoProfesor->setSueldo($sueldo);
       $nuevoProfesor->setFecha_prof($fecha_prof);
       $nuevoProfesor->setDep($departamento);

       $nuevoProfesor->create();
       $_SESSION['mensaje']="Profesor añadido correctamente";
       $nuevoProfesor=null;
       header("Location:profesores.php");


    }else{

    
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Añadir Profesor</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Nuevo Porfesor</h3>

    <div class="container mt-3">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="nom_prof" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nom_prof" required>
            </div>
            <div class="mb-3">
                <label for="sueldo" class="form-label">Sueldo</label>
                <input type="number" class="form-control" id="pvp" name="sueldo" required>
            </div>
            <div class="mb-3">
                <label for="fecha_prof" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="fecha_prof" placeholder="AAAA-MM-DD" name="fecha_prof" required>
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">Departamento</label>
                <input type="number" class="form-control" id="stock" name="dep" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4" name="crear">Crear</button>
            <a href="profesores.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php } ?>
</html>
