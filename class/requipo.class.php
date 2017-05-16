<?php
 require_once 'conexion.php';
 class Requipo {
    private $id;
    private $estatus_id;
    private $tipoplantel_id;
    private $fecha;
    const TABLA = 'requipo';
    public function getId() {
       return $this->id;
    }
    public function getEstatus_id() {
       return $this->estatus_id;
    }
	public function getTipoplantel_id() {
       return $this->tipoplantel_id;
    }
    public function getfecha() {
       return $this->fecha;
    }
    public function setEstatus_id($estatus_id) {
       $this->estatus_id = $estatus_id;
    }
	public function setTipoplantel_id($tipoplantel_id) {
       $this->tipoplantel_id = $tipoplantel_id;
    }
    public function setfecha($fecha) {
       $this->fecha = $fecha;
    }
    public function __construct($estatus_id, $tipoplantel_id, $descipcion, $id=null) {
       $this->estatus_id = $estatus_id;
	$this->tipoplantel_id = $tipoplantel_id;
       $this->fecha = $descipcion;
       $this->id = $id;
    }
    public function guardar(){
       $conexion = new Conexion();
       if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET estatus_id = :estatus_id, tipoplantel_id = :tipoplantel_id, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':estatus_id', $this->estatus_id);
	    $consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (estatus_id, tipoplantel_id, fecha) VALUES(:estatus_id, :tipoplantel_id, :fecha)');
          $consulta->bindParam(':estatus_id', $this->estatus_id);
	   $consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
    public static function buscarPorId($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT estatus_id, tipoplantel_id, fecha FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['estatus_id'], $registro['tipoplantel_id'], $registro['fecha'], $id);
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
public static function buscarPorFechass($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and tipoplantel_id !=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorFechasenel($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and tipoplantel_id=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorFechassenel($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and tipoplantel_id=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
    public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, estatus_id, tipoplantel_id, fecha FROM ' . self::TABLA . ' ORDER BY estatus_id');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
 }
?>
