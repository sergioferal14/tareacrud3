<!DOCTYPE html>
<html lang="es">
<?php

if(!isset($_GET['id'])){
    header("Location:departamentos.php");
    die();
}
$id=$_GET['id'];
session_start();
require "../vendor/autoload.php";
use Clases\Departamentos;
 
    function mostrarError($m){
        global $id;
        $_SESSION['error']=$m;
        header("Location:{$_SERVER["PHP_SELF"]}?id=$id");
        die();
    }


$nuevoDepartamento=new Departamentos();
$nuevoDepartamento->setId($id);
$datos=$nuevoDepartamento->devolverDepartamento();


    
    

    if(isset($_POST['update'])){
       $nom_dep=trim($_POST['nom_dep']);
       if( strlen($nom_dep)==0){
            mostrarError("Rellene el campo!!!");
       }
       $nuevoDepartamento=new Departamentos();
       $nuevoDepartamento->setId($id);
       $nuevoDepartamento->setNom_dep($nom_dep);
       $nuevoDepartamento->update();
       $_SESSION['mensaje']="Departamento actualizado correctamente";
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
    <title>Editar Departamento</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Editar Departamento</h3>

    <div class="container mt-3">
        <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id" ?>" method="POST">
            <div class="mb-3">
                <label for="nom_prof" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nom_dep" name="nom_dep" value="<?php echo $datos->nom_dep ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4"value="update"  name="update">Actualizar</button>
            <a href="departamentos.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php } ?>
</html>
