<?php
require_once 'conexion.php';
class Equipo {
	private $id;
	private $plantel_id;
	private $tecnico_id;
	private $serial;
	private $marca;
	private $sistema;
	private $disco;
	private $memoria;
	private $procesador;
	private $soporte;
	private $estatus_id;
	private $ubicacion_id;
	private $fecha;
	const TABLA ='equipo';
	public function getId() {
		return $this->id;
	}
	public function getPlantel_id() {
		return $this->plantel_id;
	}
	
	public function getTecnico_id() {
		return $this->tecnico_id;
	}
	public function getSerial() {
		return $this->serial;
	}
	public function getMarca() {
		return $this->marca;
	}
	public function getSistema() {
		return $this->sistema;
	}
	public function getDisco() {
		return $this->disco;
	}
	public function getMemoria() {
		return $this->memoria;
	}
	public function getProcesador() {
		return $this->procesador;
	}
	public function getSoporte() {
		return $this->soporte;
	}
	public function getEstatus_id() {
		return $this->estatus_id;
	}
	public function getUbicacion_id() {
		return $this->ubicacion_id;
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
	public function setTecnico_id ($tecnico_id) {
		$this->tecnico_id = $tecnico_id;
	}
public function setSerial ($serial) {
		$this->serial = $serial;
	}
public function setMarca ($marca) {
		$this->marca = $marca;
	}
public function setSistema ($sistema) {
		$this->sistema = $sistema;
	}
public function setDisco ($disco) {
		$this->disco = $disco;
	}
public function setMemoria ($memoria) {
		$this->memoria = $memoria;
	}
public function setProcesador ($procesador) {
		$this->procesador = $procesador;
	}
public function setSoporte ($soporte) {
		$this->soporte = $soporte;
	}
public function setEstatus_id ($estatus_id) {
		$this->estatus_id = $estatus_id;
	}
	public function setUbicacion_id ($ubicacion_id) {
		$this->ubicacion_id = $ubicacion_id;
	}
	public function setFecha ($fecha) {
		$this->fecha = $fecha;
	}
	public function __construct ($plantel_id, $tecnico_id, $serial, $marca, $sistema, $disco, $memoria, $procesador, $soporte, $estatus_id, $ubicacion_id, $fecha, $id) {
		$this->plantel_id = $plantel_id;
		$this->tecnico_id = $tecnico_id;
		$this->serial = $serial;
		$this->marca = $marca;
		$this->sistema = $sistema;
		$this->disco = $disco;
		$this->memoria = $memoria;
		$this->procesador = $procesador;
		$this->soporte = $soporte;
		$this->estatus_id = $estatus_id;
		$this->ubicacion_id = $ubicacion_id;
		$this->fecha= $fecha;
		$this->id = $id;
	}
	public function actualiza() {
		$conexion = new Conexion();
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' Set plantel_id = :plantel_id, tecnico_id = :tecnico_id, serial = :serial, marca = :marca, sistema = :sistema, disco = :disco, memoria = :memoria, procesador = :procesador, soporte = :soporte, estatus_id = :estatus_id, ubicacion_id = :ubicacion_id, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	  $consulta->bindParam(':tecnico_id', $this->tecnico_id);
$consulta->bindParam(':serial', $this->serial);
$consulta->bindParam(':marca', $this->marca);
$consulta->bindParam(':sistema', $this->sistema);
$consulta->bindParam(':disco', $this->disco);
$consulta->bindParam(':memoria', $this->memoria);
$consulta->bindParam(':procesador', $this->procesador);
$consulta->bindParam(':soporte', $this->soporte);
$consulta->bindParam(':estatus_id', $this->estatus_id);
$consulta->bindParam(':ubicacion_id', $this->ubicacion_id);
$consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }

 public function guardar() {
$conexion = new Conexion();
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (plantel_id, tecnico_id, serial, marca, sistema, disco, memoria, procesador, soporte, estatus_id, ubicacion_id, fecha) VALUES(:plantel_id, :tecnico_id, :serial, :marca, :sistema, :disco, :memoria, :procesador, :soporte, :estatus_id, :ubicacion_id, :fecha)');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	  $consulta->bindParam(':tecnico_id', $this->tecnico_id);
$consulta->bindParam(':serial', $this->serial);
$consulta->bindParam(':marca', $this->marca);
$consulta->bindParam(':sistema', $this->sistema);
$consulta->bindParam(':disco', $this->disco);
$consulta->bindParam(':memoria', $this->memoria);
$consulta->bindParam(':procesador', $this->procesador);
$consulta->bindParam(':soporte', $this->soporte);
$consulta->bindParam(':estatus_id', $this->estatus_id);
$consulta->bindParam(':ubicacion_id', $this->ubicacion_id);
$consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       
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
    /*   
 public static function buscarPorI($plantel_id, $laboratorio_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where plantel_id=:plantel_id AND laboratorio_id=:laboratorio_id');
	$consulta->bindParam(':plantel_id', $plantel_id);
	$consulta->bindParam(':laboratorio_id', $laboratorio_id);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
*/
/*
public static function buscarPorI($plantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, plantel_id, tecnico_id, serial, marca, sistema, disco, memoria, procesador, soporte, estatus_id  FROM ' . self::TABLA . ' WHERE plantel_id = :plantel_id');
       $consulta->bindParam(':plantel_id', $plantel_id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $registro['tecnico_id'], $registro['serial'], $registro['marca'], $registro['sistema'], $registro['disco'], $registro['memoria'], $registro['procesador'], $registro['soporte'], $registro['estatus_id'], $registro['id'], $plantel_id);
       }else{
          return false;
       }
    }*/

public static function buscarPorTodosss($serial){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where serial=:serial');
	$consulta->bindParam(':serial', $serial);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorFechas($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and estatus_id=1');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
public static function buscarPorFechass($fecha,$dfecha){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' where fecha BETWEEN :fecha and :dfecha and estatus_id=2');
	$consulta->bindParam(':fecha', $fecha);
	$consulta->bindParam(':dfecha', $dfecha);
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
       $consulta = $conexion->prepare('SELECT id, plantel_id, tecnico_id, serial, marca, sistema, disco, memoria, procesador, soporte, estatus_id, ubicacion_id, fecha FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $registro['tecnico_id'], $registro['serial'], $registro['marca'], $registro['sistema'], $registro['disco'], $registro['memoria'], $registro['procesador'], $registro['soporte'], $registro['estatus_id'], $registro['ubicacion_id'], $registro['fecha'], $registro['id'], $id);
       }else{
          return false;
       }}
}
?>
