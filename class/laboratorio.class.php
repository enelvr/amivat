<?php
require_once 'conexion.php';
class Laboratorio {
	private $id;
	private $plantel_id;
	private $equipon;
	private $equipoope;
	private $equipoino;
	private $internet;
	private $mesasexistente;
	private $mesasbuena;
	private $mesasmala;
	private $mesasnec;
	private $nsillas;
	private $sillasbuen;
	private $sillasmalas;
	private $sillasnecesarias;
	private $electricidadbuena;
	private $electricidadrep;
	private $airesbuenos;
	private $airesrep;
	private $iluminacionbuena;
	private $iluminacionrep;
	private $filtraciones;
	private $fecha;
	const TABLA ='laboratorio';
	public function getId() {
		return $this->id;
	}
	public function getPlantel_id() {
		return $this->plantel_id;
	}
	public function getEquipon() {
		return $this->equipon;
	}
	public function getEquipoope() {
		return $this->equipoope;
	}
	public function getEquipoino() {
		return $this->equipoino;
	}
	public function getInternet() {
		return $this->internet;
	}
	public function getMesasexistente() {
		return $this->mesasexistente;
	}
	public function getMesasbuena() {
		return $this->mesasbuena;
	}
	public function getMesasmala() {
		return $this->mesasmala;
	}
	public function getMesasnec() {
		return $this->mesasnec;
	}
	public function getNsillas() {
		return $this->nsillas;
	}
	public function getSillasbuen() {
		return $this->sillasbuen;
	}
	public function getSillasmalas() {
		return $this->sillasmalas;
	}
	public function getSillasnecesarias() {
		return $this->sillasnecesarias;
	}
	public function getElectricidadbuena() {
		return $this->electricidadbuena;
	}
	public function getElectricidadrep() {
		return $this->electricidadrep;
	}
	public function getAiresbuenos() {
		return $this->airesbuenos;
	}
	public function getAiresrep() {
		return $this->airesrep;
	}
	public function getIluminacionbuena() {
		return $this->iluminacionbuena;
	}
	public function getIluminacionrep() {
		return $this->iluminacionrep;
	}
	public function getFiltraciones() {
		return $this->filtraciones;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function setPlantel_id ($plantel_id) {
		$this->plantel_id = $plantel_id;
	}
public function setEquipon ($equipon) {
		$this->equipon = $equipon;
	}
public function setEquipoope ($equipoope) {
		$this->equipoope = $equipoope;
	}
public function setEquipoino ($equipoino) {
		$this->equipoino = $equipoino;
	}
public function setInternet ($internet) {
		$this->internet = $internet;
	}
public function setMesasexistente ($mesasexistente) {
		$this->mesasexistente = $mesasexistente;
	}
public function setMesasbuena ($mesasbuena) {
		$this->mesasbuena = $mesasbuena;
	}
public function setMesasmala ($mesasmala) {
		$this->mesasmala = $mesasmala;
	}
public function setMesasnec ($mesasnec) {
		$this->mesasnec = $mesasnec;
	}
public function setNsillas ($nsillas) {
		$this->nsillas = $nsillas;
	}
public function setSillasbuen ($sillasbuen) {
		$this->sillasbuen = $sillasbuen;
	}
public function setSillasmalas ($sillasmalas) {
		$this->sillasmalas = $sillasmalas;
	}
public function setSillasnecesarias ($sillasnecesarias) {
		$this->sillasnecesarias = $sillasnecesarias;
	}
public function setElectricidadbuena ($electricidadbuena) {
		$this->electricidadbuena = $electricidadbuena;
	}
public function setElectricidadrep ($electricidadrep) {
		$this->electricidadrep = $electricidadrep;
	}
public function setAiresbuenos ($airesbuenos) {
		$this->airesbuenos = $airesbuenos;
	}
public function setAiresrep ($airesrep) {
		$this->airesrep = $airesrep;
	}
public function setIluminacionbuena ($iluminacionbuena) {
		$this->iluminacionbuena = $iluminacionbuena;
	}
public function setIluminacionrep ($iluminacionrep) {
		$this->iluminacionrep = $iluminacionrep;
	}
public function setFiltraciones ($filtraciones) {
		$this->filtraciones = $filtraciones;
	}
public function setFecha ($fecha) {
		$this->fecha = $fecha;
	}
public function __construct ($plantel_id, $equipon, $equipoope, $equipoino, $internet, $mesasexistente, $mesasbuena, $mesasmala, $mesasnec, $nsillas, $sillasbuen, $sillasmalas, $sillasnecesarias, $electricidadbuena, $electricidadrep, $airesbuenos, $airesrep, $iluminacionbuena, $iluminacionrep, $filtraciones, $fecha, $id=null) {
		$this->plantel_id = $plantel_id;
		$this->equipon = $equipon;
		$this->equipoope = $equipoope;
		$this->equipoino = $equipoino;
		$this->internet = $internet;
		$this->mesasexistente = $mesasexistente;
		$this->mesasbuena = $mesasbuena;
		$this->mesasmala = $mesasmala;
		$this->mesasnec = $mesasnec;
		$this->nsillas = $nsillas;
		$this->sillasbuen = $sillasbuen;
		$this->sillasmalas = $sillasmalas;
		$this->sillasnecesarias = $sillasnecesarias;
		$this->electricidadbuena = $electricidadbuena;
		$this->electricidadrep = $electricidadrep;
		$this->airesbuenos = $airesbuenos;
		$this->airesrep = $airesrep;
		$this->iluminacionbuena = $iluminacionbuena;
		$this->iluminacionrep = $iluminacionrep;
		$this->filtraciones = $filtraciones;
		$this->fecha = $fecha;
		$this->id = $id;

	}
public function guardar() {
		$conexion = new Conexion();
		if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' Set plantel_id = :plantel_id, equipon = :equipon, equipoope = :equipoope, equipoino = :equipoino, internet = :internet, mesasexistente = :mesasexistente, mesasbuena = :mesasbuena, mesasmala = :mesasmala, mesasnec = :mesasnec, nsillas = :nsillas, sillasbuen = :sillasbuen, sillasmalas = :sillasmalas, sillasnecesarias = :sillasnecesarias, electricidadbuena = :electricidadbuena, electricidadrep = :electricidadrep, airesbuenos = :airesbuenos, airesrep = :airesrep, iluminacionbuena = :iluminacionbuena, iluminacionrep = :iluminacionrep, filtraciones = :filtraciones, fecha = :fecha WHERE id = :id');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':equipon', $this->equipon);
	$consulta->bindParam(':equipoope', $this->equipoope);
	$consulta->bindParam(':equipoino', $this->equipoino);
	$consulta->bindParam(':internet', $this->internet);
	$consulta->bindParam(':mesasexistente', $this->mesasexistente);
	$consulta->bindParam(':mesasbuena', $this->mesasbuena);
	$consulta->bindParam(':mesasmala', $this->mesasmala);
	$consulta->bindParam(':mesasnec', $this->mesasnec);
	$consulta->bindParam(':nsillas', $this->nsillas);
	$consulta->bindParam(':sillasbuen', $this->sillasbuen);
	$consulta->bindParam(':sillasmalas', $this->sillasmalas);
	$consulta->bindParam(':sillasnecesarias', $this->sillasnecesarias);
	$consulta->bindParam(':electricidadbuena', $this->electricidadbuena);
	$consulta->bindParam(':electricidadrep', $this->electricidadrep);
	$consulta->bindParam(':airesbuenos', $this->airesbuenos);
	$consulta->bindParam(':airesrep', $this->airesrep);
	$consulta->bindParam(':iluminacionbuena', $this->iluminacionbuena);
	$consulta->bindParam(':iluminacionrep', $this->iluminacionrep);
	$consulta->bindParam(':filtraciones', $this->filtraciones);
	$consulta->bindParam(':fecha', $this->fecha);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (plantel_id, equipon, equipoope, equipoino, internet, mesasexistente, mesasbuena, mesasmala, mesasnec, nsillas, sillasbuen, sillasmalas, sillasnecesarias, electricidadbuena, electricidadrep, airesbuenos, airesrep, iluminacionbuena, iluminacionrep, filtraciones, fecha) VALUES(:plantel_id, :equipon, :equipoope, :equipoino, :internet, :mesasexistente, :mesasbuena, :mesasmala, :mesasnec, :nsillas, :sillasbuen, :sillasmalas, :sillasnecesarias, :electricidadbuena, :electricidadrep, :airesbuenos, :airesrep, :iluminacionbuena, :iluminacionrep, :filtraciones, :fecha)');
          $consulta->bindParam(':plantel_id', $this->plantel_id);
	$consulta->bindParam(':equipon', $this->equipon);
	$consulta->bindParam(':equipoope', $this->equipoope);
	$consulta->bindParam(':equipoino', $this->equipoino);
	$consulta->bindParam(':internet', $this->internet);
	$consulta->bindParam(':mesasexistente', $this->mesasexistente);
	$consulta->bindParam(':mesasbuena', $this->mesasbuena);
	$consulta->bindParam(':mesasmala', $this->mesasmala);
	$consulta->bindParam(':mesasnec', $this->mesasnec);
	$consulta->bindParam(':nsillas', $this->nsillas);
	$consulta->bindParam(':sillasbuen', $this->sillasbuen);
	$consulta->bindParam(':sillasmalas', $this->sillasmalas);
	$consulta->bindParam(':sillasnecesarias', $this->sillasnecesarias);
	$consulta->bindParam(':electricidadbuena', $this->electricidadbuena);
	$consulta->bindParam(':electricidadrep', $this->electricidadrep);
	$consulta->bindParam(':airesbuenos', $this->airesbuenos);
	$consulta->bindParam(':airesrep', $this->airesrep);
	$consulta->bindParam(':iluminacionbuena', $this->iluminacionbuena);
	$consulta->bindParam(':iluminacionrep', $this->iluminacionrep);
	$consulta->bindParam(':filtraciones', $this->filtraciones);
	$consulta->bindParam(':fecha', $this->fecha);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
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
public static function buscarPorI($plantel_id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, plantel_id, equipon, equipoope, equipoino, internet, mesasexistente, mesasbuena, mesasmala, mesasnec, nsillas, sillasbuen, sillasmalas, sillasnecesarias, electricidadbuena, electricidadrep, airesbuenos, airesrep, iluminacionbuena, iluminacionrep, filtraciones, fecha FROM ' . self::TABLA . ' WHERE plantel_id = :plantel_id');
       $consulta->bindParam(':plantel_id', $plantel_id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['plantel_id'], $registro['equipon'], $registro['equipoope'], $registro['equipoino'], $registro['internet'], $registro['mesasexistente'], $registro['mesasbuena'], $registro['mesasmala'], $registro['mesasnec'], $registro['nsillas'], $registro['sillasbuen'], $registro['sillasmalas'], $registro['sillasnecesarias'], $registro['electricidadbuena'], $registro['electricidadrep'], $registro['airesbuenos'], $registro['airesrep'], $registro['iluminacionbuena'], $registro['iluminacionrep'], $registro['filtraciones'], $registro['fecha'], $registro['id'], $plantel_id);
       }else{
          return false;
       }
    }
	public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT id, nombreplantel, dea FROM ' . self::TABLA . ' ORDER BY id');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
}

?>
