<?php
require_once 'conexion.php';
class Monitor {
	private $id;
	private $plantel_id;
	private $tecnico_id;
	private $tipomonitor_id;
	private $serial;
	private $marca;
	private $pulgadas;
	private $ubicacion_id;
	private $soporte;
	private $estatus_id;
	private $fecha;
	const TABLA ='monitor';
	public function getId() {
		return $this->id;
	}
	public function getPlantel_id() {
		return $this->plantel_id;
	}
	public function getTecnico_id() {
		return $this->tecnico_id;
	}
	public function getTipomonitor_id() {
		return $this->tipomonitor_id;
	}
	public function getSerial() {
		return $this->serial;
	}
	public function getMarca() {
		return $this->marca;
	}
	public function getPulgadas() {
		return $this->pulgadas;
	}
	public function getUbicacion_id() {
		return $this->ubicacion_id;
	}
	public function getSoporte() {
		return $this->soporte;
	}
	public function getEstatus_id() {
		return $this->estatus_id;
	}
	public function getFecha() {
		return $this->fecha;
	}
	
	public function setPlantel_id ($plantel_id) {
		$this->plantel_id = $plantel_id;
	}
	public function setTecnico_id ($tecnico_id) {
		$this->tecnico_id = $tecnico_id;
	}
	public function setTipomonitor_id ($tipomonitor_id) {
		$this->tipomonitor_id = $tipomonitor_id;
	}
	public function setSerial ($serial) {
		$this->serial = $serial;
	}
	public function setMarca ($marca) {
		$this->marca = $marca;
	}
	public function setPulgadas ($pulgadas) {
		$this->pulgadas = $pulgadas;
	}
	public function setUbicacion_id ($ubicacion_id) {
		$this->ubicacion_id = $ubicacion_id;
	}
	public function setSoporte ($soporte) {
		$this->soporte = $soporte;
	}
	public function setEstatus_id ($estatus_id) {
		$this->estatus_id = $estatus_id;
	}
	public function setFecha ($fecha) {
		$this->fecha = $fecha;
	}
	
	public function __construct ($plantel_id, $tecnico_id, $tipomonitor_id, $serial, $marca, $pulgadas, $ubicacion_id, $soporte, $estatus_id, $fecha, $id=null) {
		
		$this->plantel_id = $plantel_id;
		$this->tecnico_id = $tecnico_id;
		$this->tipomonitor_id = $tipomonitor_id;
		$this->serial = $serial;
		$this->marca = $marca;
		$this->pulgadas = $pulgadas;
		$this->ubicacion_id = $ubicacion_id;
		$this->soporte = $soporte;
		$this->estatus_id = $estatus_id;
		$this->fecha= $fecha;
		$this->id = $id;
	}
	public function guardar() {
		$conexion = new Conexion();
		if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' Set plantel_id = :plantel_id, tecnico_id = :tecnico_id, tipomonitor_id = :tipomonitor_id, serial = :serial, marca = :marca, pulgadas = :pulgadas, ubicacion_id = :ubicacion_id, soporte = :soporte, estatus_id = :estatus_id, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':tecnico_id', $this->tecnico_id);
$consulta->bindParam(':tipomonitor_id', $this->tipomonitor_id);
$consulta->bindParam(':serial', $this->serial);
$consulta->bindParam(':marca', $this->marca);
$consulta->bindParam(':pulgadas', $this->pulgadas);
$consulta->bindParam(':ubicacion_id', $this->ubicacion_id);
$consulta->bindParam(':soporte', $this->soporte);
$consulta->bindParam(':estatus_id', $this->estatus_id);
$consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (plantel_id, tecnico_id, tipomonitor_id, serial, marca, pulgadas, ubicacion_id, soporte, estatus_id, fecha) VALUES(:plantel_id, :tecnico_id, :tipomonitor_id, :serial, :marca, :pulgadas, :ubicacion_id, :soporte, :estatus_id, :fecha)');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':tecnico_id', $this->tecnico_id);
	$consulta->bindParam(':tipomonitor_id', $this->tipomonitor_id);
	$consulta->bindParam(':serial', $this->serial);
	$consulta->bindParam(':marca', $this->marca);
	$consulta->bindParam(':pulgadas', $this->pulgadas);
	$consulta->bindParam(':ubicacion_id', $this->ubicacion_id);
	$consulta->bindParam(':soporte', $this->soporte);
	$consulta->bindParam(':estatus_id', $this->estatus_id);
	$consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
     	public static function buscarPorTodos($plantel_id, $ubicacion_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where plantel_id=:plantel_id AND ubicacion_id=:ubicacion_id');
	$consulta->bindParam(':plantel_id', $plantel_id);
	$consulta->bindParam(':ubicacion_id', $ubicacion_id);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
       }
public static function buscarPorTodosss($serial){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where serial=:serial');
	$consulta->bindParam(':serial', $serial);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }

  public static function contarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT serial FROM ' . self::TABLA . ' ORDER BY id');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }

public static function buscarTodos($serial){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where serial=:serial');
	$consulta->bindParam(':serial', $serial);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorI($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, plantel_id, tecnico_id, tipomonitor_id, serial, marca, pulgadas, ubicacion_id, soporte, estatus_id, fecha FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $registro['tecnico_id'], $registro['tipomonitor_id'], $registro['serial'], $registro['marca'], $registro['pulgadas'], $registro['ubicacion_id'], $registro['soporte'], $registro['estatus_id'], $registro['fecha'], $registro['id'], $id);
       }else{
          return false;
       }}

}
?>
