<!DOCTYPE html>
<html lang="es">
<?php
use Clases\Departamentos; 
    session_start();
    require "../vendor/autoload.php";
    function mostrarError($m){
        $_SESSION['error']=$m;
        header("Location:crearDepartamento.php");
    }
    if(isset($_POST['crear'])){
       $nom_dep=trim($_POST['nom_dep']);
       if( strlen($nom_dep)==0){
            mostrarError("Rellene el campo nombre!!!");
       }
       $nuevoDepartamento=new Departamentos();
       $nuevoDepartamento->setNom_dep($nom_dep);

       $nuevoDepartamento->create();
       $_SESSION['mensaje']="Departamento añadido correctamente";
       $nuevoDepartamento=null;
       header("Location:departamentos.php");


    }else{

    
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Añadir Departamento</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Nuevo Departamento</h3>

    <div class="container mt-3">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="nom_dep" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nom_dep" name="nom_dep" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4" name="crear">Crear</button>
            <a href="departamentos.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php } ?>
</html>
