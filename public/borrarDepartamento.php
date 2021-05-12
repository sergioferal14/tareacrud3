<?php
session_start();
if(isset($_POST['codigo'])){
    header("Location:departamentos.php");
}

require "../vendor/autoload.php";
use Clases\Departamentos;
$profesor=new Departamentos();
$profesor->setId($_POST['codigo']);
$profesor->delete();
$profesor=null;
$_SESSION["mensaje"]="Departamento borrado correctamente";
header("Location:departamentos.php");
