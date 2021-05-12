<?php
session_start();
if(isset($_POST['codigo'])){
    header("Location:profesores.php");
}

require "../vendor/autoload.php";
use Clases\Profesores;
$profesor=new Profesores();
$profesor->setId($_POST['codigo']);
$profesor->delete();
$profesor=null;
$_SESSION["mensaje"]="Profesor borrado correctamente";
header("Location:profesores.php");
