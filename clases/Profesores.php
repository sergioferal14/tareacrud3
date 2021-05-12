<?php
namespace Clases;
use PDO;
use PDOException;
use Exception;
class Profesores extends Conexion{
    private $id;
    private $nom_prof;
    private $sueldo;
    private $fecha_prof;
    private $dep;
    public function __construct(){
        parent::__construct();
    }
    
    //-------------CRUD-----------

    public function create(){
        $c="insert into profesores(nom_prof,sueldo,fecha_prof,dep) value(:n,:s,:f,:d )";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n'=>$this->nom_prof,
                ':s'=>$this->sueldo,
                ':f'=>$this->fecha_prof,
                ':d'=>$this->dep
            ]);
        } catch (PDOException $ex) {
            die("Error al añadir el profesor:" . $ex->getMessage());
        }
        return $stmt;

    }

    public function read(){
        $c="select * from profesores";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al recuperar todos los datos: ".$ex->getMessage());
        }
        return $stmt;
    }
    
    public function update(){
        var_dump($_POST['sueldo']);
        $u="update profesores set nom_prof=:n, sueldo=:s, fecha_prof=:f, dep=:d  where id=:i";
        $stmt=parent::$conexion->prepare($u);
          try{
              $stmt->execute([
                  
                  ':n'=>$this->nom_prof,
                  ':s'=>$this->sueldo,
                  ':f'=>$this->fecha_prof,
                  ':d'=>$this->dep,
                  ':i'=>$this->id

              ]);
          }catch(PDOException $ex){
              die("error al editar el profesor: ".$ex->getMessage());
          }
    }

    public function delete(){

        $c = "delete from profesores where id=:i";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el profesor:" . $ex->getMessage());
        }
        return $stmt;

    }

    public function devolverProfesor(){
        $con = "select * from profesores where id=:i"; 
        $stmt = parent::$conexion->prepare($con);
        try {
            $stmt->execute([':i'=>$this->id]);
        } catch (PDOException $ex) {
            die("Error al devolver el profesor: " . $ex->getMessage());
        }
        return ($stmt->fetch(PDO::FETCH_OBJ));
    }

    //setters--------------
    
    
    

    /**
     * Set the value of nom_prof
     *
     * @return  self
     */ 
    public function setNom_prof($nom_prof)
    {
        $this->nom_prof = $nom_prof;

        return $this;
    }

    /**
     * Set the value of sueldo
     *
     * @return  self
     */ 
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Set the value of fecha_prof
     *
     * @return  self
     */ 
    public function setFecha_prof($fecha_prof)
    {
        $this->fecha_prof = $fecha_prof;

        return $this;
    }

    /**
     * Set the value of dep
     *
     * @return  self
     */ 
    public function setDep($dep)
    {
        $this->dep = $dep;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
