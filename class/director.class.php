<?php
require_once 'conexion.php';
class Director {
	private $id;
	private $plantel_id;
	private $nombre;
	private $cedula;
	private $tlf;
	private $correo;
	private $fecha;
	const TABLA ='director';
	public function getID() {
		return $this->id;
	}
	public function getPlantel_id() {
		return $this->plantel_id;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function getCedula() {
		return $this->cedula;
	}
	public function getTlf() {
		return $this->tlf;
	}
	public function getCorreo() {
		return $this->correo;
	}
	public function getFecha() {
		return $this->fecha;
	}
public function setId ($id) {
		$this->id = $id;
	}
	public function setPlantel_id ($plantel_id) {
		$this->plantel_id = $plantel_id;
	}
	public function setNombre ($nombre) {
		$this->nombre = $nombre;
	}
	public function setCedula ($cedula) {
		$this->cedula = $cedula;
	}
	public function setTlf ($tlf) {
		$this->tlf = $tlf;
	}
	public function setCorreo ($correo) {
		$this->correo = $correo;
	}
	public function setFecha ($fecha) {
		$this->fecha = $fecha;
	}
	public function __construct ($plantel_id, $nombre, $cedula, $tlf, $correo, $fecha, $id) {
		$this->plantel_id = $plantel_id;
		$this->nombre = $nombre;
		$this->cedula = $cedula;
		$this->tlf = $tlf;
		$this->correo= $correo;
		$this->fecha= $fecha;
		$this->id = $id;
	}
	public function actualiza() {
		$conexion = new Conexion();
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' Set plantel_id = :plantel_id, nombre = :nombre, cedula = :cedula, tlf = :tlf, correo = :correo, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':nombre', $this->nombre);
$consulta->bindParam(':cedula', $this->cedula);
$consulta->bindParam(':tlf', $this->tlf);
$consulta->bindParam(':correo', $this->correo);
$consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
}
      public function guardar() {
$conexion = new Conexion();
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (plantel_id, nombre, cedula, tlf, correo, fecha) VALUES(:plantel_id, :nombre, :cedula, :tlf, :correo, :fecha)');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':nombre', $this->nombre);
	$consulta->bindParam(':cedula', $this->cedula);
	$consulta->bindParam(':tlf', $this->tlf);
	$consulta->bindParam(':correo', $this->correo);
	$consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
     
       $conexion = null;
    }
public static function buscarPorTodosss($cedula){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where cedula=:cedula');
	$consulta->bindParam(':cedula', $cedula);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorI($plantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, plantel_id, nombre, cedula, tlf, correo, fecha FROM ' . self::TABLA . ' WHERE plantel_id = :plantel_id');
       $consulta->bindParam(':plantel_id', $plantel_id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $registro['nombre'], $registro['cedula'], $registro['tlf'], $registro['correo'], $registro['fecha'], $registro['id'], $plantel_id);
       }else{
          return false;
       }
    }
public static function buscarPorId($plantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT plantel_id FROM ' . self::TABLA . ' WHERE plantel_id = :plantel_id');
       $consulta->bindParam(':plantel_id', $plantel_id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $plantel_id);
       }else{
          return false;
       }
    }
	
}
?>
