<?php
 require_once 'conexion.php';
 class Municipio {
    private $id;
    private $descripcion;
    const TABLA = 'municipio';
    public function getId() {
       return $this->id;
    }
    public function getDescripcion() {
       return $this->descripcion;
    }
   
    public function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
    }
   
    public function __construct($descripcion, $id=null) {
       $this->descripcion = $descripcion;
       $this->id = $id;
    }
    public function guardar(){
       $conexion = new Conexion();
       if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET descripcion = :descripcion WHERE id = :id');
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (descripcion) VALUES(:descripcion)');
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
    public static function buscarPorId($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT descripcion FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['descripcion'], $id);
       }else{
          return false;
       }
    }
    public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, descripcion FROM ' . self::TABLA . ' ORDER BY descripcion');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
 }
?>
