<?php
require_once 'conexion.php';
class Historialequipo {
	private $id;
	private $equipo_id;
	private $tecnico_id_old;
	private $serial_old;
	private $marca_old;
	private $sistema_old;
	private $disco_old;
	private $memoria_old;
	private $procesador_old;
	private $soporte_old;
	private $estatus_id_old;
	private $ubicacion_id_old;
	private $fecha_old;
	private $tecnico_id_new;
	private $serial_new;
	private $marca_new;
	private $sistema_new;
	private $disco_new;
	private $memoria_new;
	private $procesador_new;
	private $soporte_new;
	private $estatus_id_new;
	private $ubicacion_id_new;
	private $fecha_new;
	const TABLA ='historial_equipo';
	public function getId() {
		return $this->id;
	}
	public function getEquipo_id() {
		return $this->equipo_id;
	}
	
	public function getTecnico_id_old() {
		return $this->tecnico_id_old;
	}
	public function getSerial_old() {
		return $this->serial_old;
	}
	public function getMarca_old() {
		return $this->marca_old;
	}
	public function getSistema_old() {
		return $this->sistema_old;
	}
	public function getDisco_old() {
		return $this->disco_old;
	}
	public function getMemoria_old() {
		return $this->memoria_old;
	}
	public function getProcesador_old() {
		return $this->procesador_old;
	}
	public function getSoporte_old() {
		return $this->soporte_old;
	}
	public function getNsillas() {
		return $this->estatus_id_old;
	}
	public function getUbicacion_id_old() {
		return $this->ubicacion_id_old;
	}
	public function getFecha_old() {
		return $this->fecha_old;
	}
	public function getTecnico_id_new() {
		return $this->tecnico_id_new;
	}
	public function getSerial_new() {
		return $this->serial_new;
	}
	public function getMarca_new() {
		return $this->marca_new;
	}
	public function getSistema_new() {
		return $this->sistema_new;
	}
	public function getDisco_new() {
		return $this->disco_new;
	}
	public function getMemoria_new() {
		return $this->memoria_new;
	}
	public function getProcesador_new() {
		return $this->procesador_new;
	}
	public function getSoporte_new() {
		return $this->soporte_new;
	}
	public function getEstatus_id_new() {
		return $this->estatus_id_new;
	}
	public function getUbicacion_id_new() {
		return $this->ubicacion_id_new;
	}
	public function getFecha_new() {
		return $this->fecha_new;
	}
	public function setEquipo_id ($equipo_id) {
		$this->equipo_id = $equipo_id;
	}
public function setTecnico_id_old ($tecnico_id_old) {
		$this->tecnico_id_old = $tecnico_id_old;
	}
public function setSerial_old ($serial_old) {
		$this->serial_old = $serial_old;
	}
public function setMarca_old ($marca_old) {
		$this->marca_old = $marca_old;
	}
public function setSistema_old ($sistema_old) {
		$this->sistema_old = $sistema_old;
	}
public function setDisco_old ($disco_old) {
		$this->disco_old = $disco_old;
	}
public function setMemoria_old ($memoria_old) {
		$this->memoria_old = $memoria_old;
	}
public function setProcesador_old ($procesador_old) {
		$this->procesador_old = $procesador_old;
	}
public function setSoporte_old ($soporte_old) {
		$this->soporte_old = $soporte_old;
	}
public function setNsillas ($estatus_id_old) {
		$this->estatus_id_old = $estatus_id_old;
	}
public function setUbicacion_id_old ($ubicacion_id_old) {
		$this->ubicacion_id_old = $ubicacion_id_old;
	}
public function setFecha_old ($fecha_old) {
		$this->fecha_old = $fecha_old;
	}
public function setTecnico_id_new ($tecnico_id_new) {
		$this->tecnico_id_new = $tecnico_id_new;
	}
public function setSerial_new ($serial_new) {
		$this->serial_new = $serial_new;
	}
public function setMarca_new ($marca_new) {
		$this->marca_new = $marca_new;
	}
public function setSistema_new ($sistema_new) {
		$this->sistema_new = $sistema_new;
	}
public function setDisco_new ($disco_new) {
		$this->disco_new = $disco_new;
	}
public function setMemoria_new ($memoria_new) {
		$this->memoria_new = $memoria_new;
	}
public function setProcesador_new ($procesador_new) {
		$this->procesador_new = $procesador_new;
	}
public function setSoporte_new ($soporte_new) {
		$this->soporte_new = $soporte_new;
	}
public function setEstatus_id_new ($estatus_id_new) {
		$this->estatus_id_new = $estatus_id_new;
	}
	public function setUbicacion_id_new ($ubicacion_id_new) {
		$this->ubicacion_id_new = $ubicacion_id_new;
	}
public function setFecha_new ($fecha_new) {
		$this->fecha_new = $fecha_new;
	}
public function __construct ($equipo_id, $tecnico_id_old, $serial_old, $marca_old, $sistema_old, $disco_old, $memoria_old, $procesador_old, $soporte_old, $estatus_id_old, $ubicacion_id_old, $fecha_old, $tecnico_id_new, $serial_new, $marca_new, $sistema_new, $disco_new, $memoria_new, $procesador_new, $soporte_new, $estatus_id_new, $ubicacion_id_new, $fecha_new, $id=null) {
		$this->equipo_id = $equipo_id;
		$this->tecnico_id_old = $tecnico_id_old;
		$this->serial_old = $serial_old;
		$this->marca_old = $marca_old;
		$this->sistema_old = $sistema_old;
		$this->disco_old = $disco_old;
		$this->memoria_old = $memoria_old;
		$this->procesador_old = $procesador_old;
		$this->soporte_old = $soporte_old;
		$this->estatus_id_old = $estatus_id_old;
		$this->ubicacion_id_old = $ubicacion_id_old;
		$this->fecha_old = $fecha_old;
		$this->tecnico_id_new = $tecnico_id_new;
		$this->serial_new = $serial_new;
		$this->marca_new = $marca_new;
		$this->sistema_new = $sistema_new;
		$this->disco_new = $disco_new;
		$this->memoria_new = $memoria_new;
		$this->procesador_new = $procesador_new;
		$this->soporte_new = $soporte_new;
		$this->estatus_id_new = $estatus_id_new;
		$this->ubicacion_id_new = $ubicacion_id_new;
		$this->fecha_new = $fecha_new;
		$this->id = $id;

	}
public static function buscarPorI($equipo_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, equipo_id, tecnico_id_old, serial_old, marca_old, sistema_old, disco_old, memoria_old, procesador_old, soporte_old, estatus_id_old, ubicacion_id_old, fecha_old, tecnico_id_new, serial_new, marca_new, sistema_new, disco_new, memoria_new, procesador_new, soporte_new, estatus_id_new, ubicacion_id_new, fecha_new FROM ' . self::TABLA . ' WHERE equipo_id = :equipo_id');
       $consulta->bindParam(':equipo_id', $equipo_id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['equipo_id'], $registro['tecnico_id_old'], $registro['serial_old'], $registro['marca_old'], $registro['sistema_old'], $registro['disco_old'], $registro['memoria_old'], $registro['procesador_old'], $registro['soporte_old'], $registro['estatus_id_old'], $registro['ubicacion_id_old'], $registro['fecha_old'], $registro['tecnico_id_new'], $registro['serial_new'], $registro['marca_new'], $registro['sistema_new'], $registro['disco_new'], $registro['memoria_new'], $registro['procesador_new'], $registro['soporte_new'], $registro['estatus_id_new'], $registro['ubicacion_id_new'], $registro['fecha_new'], $registro['id'], $equipo_id);
       }else{
          return false;
       }
    }
}
