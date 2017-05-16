<?php
 require_once 'conexion.php';
 class Vplantel {
    private $id;
    private $tipoplantel_id;
    private $fecha;
    const TABLA = 'vplantel';
    public function getId() {
       return $this->id;
    }
    public function getTipoplantel_id() {
       return $this->tipoplantel_id;
    }
    public function getfecha() {
       return $this->fecha;
    }
    public function setTipoplantel_id($tipoplantel_id) {
       $this->tipoplantel_id = $tipoplantel_id;
    }
    public function setfecha($fecha) {
       $this->fecha = $fecha;
    }
    public function __construct($tipoplantel_id, $descipcion, $id=null) {
       $this->tipoplantel_id = $tipoplantel_id;
       $this->fecha = $descipcion;
       $this->id = $id;
    }
    public function guardar(){
       $conexion = new Conexion();
       if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET tipoplantel_id = :tipoplantel_id, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (tipoplantel_id, fecha) VALUES(:tipoplantel_id, :fecha)');
          $consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
    public static function buscarPorId($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT tipoplantel_id, fecha FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['tipoplantel_id'], $registro['fecha'], $id);
       }else{
          return false;
       }
    }
public static function buscarPorFechas($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and tipoplantel_id !=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorFechasENEL($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and tipoplantel_id=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorTodoss($tipoplantel_id, $fecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where tipoplantel_id=:tipoplantel_id and fecha=:fecha');
$consulta->bindParam(':tipoplantel_id', $tipoplantel_id);
	$consulta->bindParam(':fecha', $fecha);
	
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
    public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, tipoplantel_id, fecha FROM ' . self::TABLA . ' ORDER BY tipoplantel_id');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
 }
?>
