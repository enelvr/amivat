<?php
require_once 'conexion.php';
class Plantel {
	private $id;
	private $nombreplantel;
	private $dea;
	private $municipio_id;
	private $parroquia_id;
	private $localidad;
	private $direccion;
	private $codest;
	private $tlfplantel;
	private $fecha;
	private $tipoplantel_id;
	const TABLA ='plantel';
	public function getId() {
		return $this->id;
	}
	public function getNombreplantel() {
		return $this->nombreplantel;
	}
	public function getDea() {
		return $this->dea;
	}
	public function getMunicipio_id() {
		return $this->municipio_id;
	}
	public function getParroquia_id() {
		return $this->parroquia_id;
	}
	public function getLocalidad() {
		return $this->localidad;
	}
	public function getDireccion() {
		return $this->direccion;
	}
	public function getCodest() {
		return $this->codest;
	}
	public function getTlfplantel() {
		return $this->tlfplantel;
	}
	public function getFecha() {
		return $this->fecha;
	}

	public function getTipoplantel_id() {
		return $this->tipoplantel_id;
	}
	public function setNombreplantel ($nombreplantel) {
		$this->nombreplantel = $nombreplantel;
	}
	public function setDea ($dea) {
		$this->dea = $dea;
	}
	public function setMunicipio_id ($municipio_id) {
		$this->municipio_id = $municipio_id;
	}
	public function setParroquia_id ($parroquia_id) {
		$this->parroquia_id = $parroquia_id;
	}
	public function setLocalidad ($localidad) {
		$this->localidad = $localidad;
	}
	public function setDireccion ($direccion) {
		$this->direccion = $direccion;
	}
	public function setCodest ($codest) {
		$this->codest = $codest;
	}
	public function setTlfplantel ($tlfplantel) {
		$this->tlfplantel = $tlfplantel;
	}
	public function setFecha ($fecha) {
		$this->fecha = $fecha;
	}

	public function setTipoplantel_id ($tipoplantel_id) {
		$this->tipoplantel_id = $tipoplantel_id;
	}
	public function __construct ($nombreplantel, $dea, $municipio_id, $parroquia_id, $localidad, $direccion, $codest, $tlfplantel, $fecha, $tipoplantel_id, $id=null) {
		
		$this->nombreplantel = $nombreplantel;
		$this->dea = $dea;
		$this->municipio_id = $municipio_id;
		$this->parroquia_id = $parroquia_id;
		$this->localidad = $localidad;
		$this->direccion = $direccion;
		$this->codest = $codest;
		$this->tlfplantel = $tlfplantel;
		$this->fecha = $fecha;
		$this->tipoplantel_id = $tipoplantel_id;
		$this->id = $id;
	}
	public function guardar() {
		$conexion = new Conexion();
		if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' Set nombreplantel = :nombreplantel, dea = :dea, municipio_id = :municipio_id, parroquia_id = :parroquia_id, localidad = :localidad, direccion = :direccion, codest = :codest, tlfplantel = :tlfplantel, fecha = :fecha, tipoplantel_id = :tipoplantel_id WHERE id = :id');
          $consulta->bindParam(':nombreplantel', $this->nombreplantel);
	$consulta->bindParam(':dea', $this->dea);
$consulta->bindParam(':municipio_id', $this->municipio_id);
$consulta->bindParam(':parroquia_id', $this->parroquia_id);
$consulta->bindParam(':localidad', $this->localidad);
$consulta->bindParam(':direccion', $this->direccion);
$consulta->bindParam(':codest', $this->codest);
$consulta->bindParam(':tlfplantel', $this->tlfplantel);
$consulta->bindParam(':fecha', $this->fecha);
$consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombreplantel, dea, municipio_id, parroquia_id, localidad, direccion, codest, tlfplantel, fecha, tipoplantel_id) VALUES(:nombreplantel, :dea, :municipio_id, :parroquia_id, :localidad, :direccion, :codest, :tlfplantel, :fecha, :tipoplantel_id)');
          $consulta->bindParam(':nombreplantel', $this->nombreplantel);
	$consulta->bindParam(':dea', $this->dea);
	$consulta->bindParam(':municipio_id', $this->municipio_id);
	$consulta->bindParam(':parroquia_id', $this->parroquia_id);
	$consulta->bindParam(':localidad', $this->localidad);
	$consulta->bindParam(':direccion', $this->direccion);
	$consulta->bindParam(':codest', $this->codest);
	$consulta->bindParam(':tlfplantel', $this->tlfplantel);
	$consulta->bindParam(':fecha', $this->fecha);
	$consulta->bindParam(':tipoplantel_id', $this->tipoplantel_id);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
	public static function buscarPorId($nombreplantel){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, nombreplantel, dea, municipio_id, parroquia_id, localidad, direccion, codest, tlfplantel, fecha, tipoplantel_id FROM ' . self::TABLA . ' WHERE nombreplantel = :nombreplantel');
       $consulta->bindParam(':nombreplantel', $nombreplantel);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['nombreplantel'], $registro['dea'], $registro['municipio_id'], $registro['parroquia_id'], $registro['localidad'], $registro['direccion'], $registro['codest'], $registro['tlfplantel'], $registro['fecha'], $registro['tipoplantel_id'], $registro['id'], $nombreplantel);
       }else{
          return false;
       }
    }
public static function buscarPorI($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, nombreplantel, dea, municipio_id, parroquia_id, localidad, direccion, codest, tlfplantel, fecha, tipoplantel_id FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['nombreplantel'], $registro['dea'], $registro['municipio_id'], $registro['parroquia_id'], $registro['localidad'], $registro['direccion'], $registro['codest'], $registro['tlfplantel'], $registro['fecha'],  $registro['tipoplantel_id'], $registro['id'], $id);
       }else{
          return false;
       }
    }
	public static function buscarPorTodos($nombreplantel, $tipoplantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where nombreplantel=:nombreplantel AND tipoplantel_id=:tipoplantel_id');
	$consulta->bindParam(':nombreplantel', $nombreplantel);
	$consulta->bindParam(':tipoplantel_id', $tipoplantel_id);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
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
public static function buscarPorTodoss($dea){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where dea=:dea');
	$consulta->bindParam(':dea', $dea);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorTodosss($nombreplantel){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where nombreplantel=:nombreplantel');
	$consulta->bindParam(':nombreplantel', $nombreplantel);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorDivisiones($id, $tipoplantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where id=:id AND tipoplantel_id=:tipoplantel_id');
	$consulta->bindParam(':id', $id);
	$consulta->bindParam(':tipoplantel_id', $tipoplantel_id);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
 public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, nombreplantel, dea, municipio_id, parroquia_id, localidad, direccion, codest, tlfplantel, fecha, tipoplantel_id FROM ' . self::TABLA . ' ORDER BY id');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
   public static function buscarPorIde($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT nombreplantel FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['nombreplantel'], $id);
       }else{
          return false;
       }
    }
}
?>
