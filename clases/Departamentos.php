<?php
namespace Clases;
use PDO;
use PDOException;
class Departamentos extends Conexion{
    private $id;
    private $nom_dep;
    public function __construct(){
        parent::__construct();
    }
    
    //-------------CRUD-----------

    public function create(){
        $c="insert into departamentos(nom_dep) value(:n)";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n'=>$this->nom_dep,
            ]);
        } catch (PDOException $ex) {
            die("Error al añadir el departamento:" . $ex->getMessage());
        }
        return $stmt;

    }

    public function read(){
        $c="select * from departamentos";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al recuperar los datos de departamentos: ".$ex->getMessage());
        }
        return $stmt;
    }
    
    public function update(){
        $u="update departamentos set nom_dep=:n where id=:i";
        $stmt=parent::$conexion->prepare($u);
          try{
              $stmt->execute([
                  ':i'=>$this->id,
                  ':n'=>$this->nom_dep
              ]);
          }catch(PDOException $ex){
              die("error al editar el departamento: ".$ex->getMessage());
          }
    }

    public function delete(){

        $c = "delete from departamentos where id=:i";
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

    public function devolverDepartamento(){
        $con = "select * from departamentos where id=:i"; 
        $stmt = parent::$conexion->prepare($con);
        try {
            $stmt->execute([':i'=>$this->id]);
        } catch (PDOException $ex) {
            die("Error al devolver el departamento: " . $ex->getMessage());
        }
        return ($stmt->fetch(PDO::FETCH_OBJ));
    }

    //setters--------------
    

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

    /**
     * Set the value of nom_dep
     *
     * @return  self
     */ 
    public function setNom_dep($nom_dep)
    {
        $this->nom_dep = $nom_dep;

        return $this;
    }
}
