
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title></title>
   <link rel="stylesheet" type="text/css" href="../../css/base.css" />
  <script type="text/javascript" src="../../js/select_dependientes.js"></script>
</head>
<body>
   <div class="header">
      <div class="header_box">
         <div id="header_folders">
       
         </div>
         <div id="header_logo">
            <a id="fs_logo" href="index.php"></a>
         </div>
         <div id="header_user">
<?php if($_GET['id']=="")
{
$_GET['id']=$_POST['valor'];
}

?>
            <a class="btn" href="nuevo.php?id=<?php echo $_GET['id']; ?>&t=cpu&d=<?php echo $_GET['d']; ?>" id="b_user_list">CPU</a>
	    <a class="btn" href="nuevo.php?id=<?php echo $_GET['id']; ?>&t=monitor&d=<?php echo $_GET['d']; ?>" id="b_user_list">MONITOR</a>
	    <a class="btn" href="nuevo.php?id=<?php echo $_GET['id']; ?>&t=impresora&d=<?php echo $_GET['d']; ?>" id="b_user_list">IMPRESORA</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<?php if (isset($_POST["equipo"]) and $_POST["equipo"]=="equipo")
{?>
<?php
	 require_once '../../class/equipo.class.php';
	$plantel_id=$_POST['plantel'];
	$tecnico_id=$_POST['tecnico'];
	$serial=$_POST['serial'];
	$marca=$_POST['marca'];
	$sistema=$_POST['sistema'];
	$disco=$_POST['disco'];
	$memoria=$_POST['memoria'];
	$procesador=$_POST['procesador'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus'];
	$ubicacion_id=$_POST['ubicacion'];
	$fecha=$_POST['fecha'];
	$equipo = Equipo::buscarPorTodosss($serial);
	if($equipo){
  echo "<div class=error>EL EQUIPO YA EXISTE EN EL REGISTRO</div>";
 }else{
	$equipo = new Equipo ($plantel_id, $tecnico_id, $serial, $marca, $sistema, $disco, $memoria, $procesador, $soporte, $estatus_id, $ubicacion_id, $fecha);
	$equipo->guardar();
 require_once '../../class/requipo.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_GET['d'];
$requipo = new Requipo ($estatus_id, $tipoplantel_id, $valor);
$requipo->guardar();	
echo "<div class=exito>EQUIPO CPU REGISTRADO CORRECTAMENTE</div>";
}
 }?>

<?php if (isset($_GET["t"]) and $_GET["t"]=="cpu")
{?>
agregamos cpu 
<form method="POST" action="nuevo.php" onsubmit="return validar()">
<input type="hidden" id="valor" name="valor" value="<?php echo $_GET['id']; ?>">
<input type="hidden" id="plantel" name="plantel" value="<?php echo $_GET['id']; ?>">
<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>
	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<select id="ubicacion" name="ubicacion">
 <?php foreach($ubicacion as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	<td>
	TECNICO:
	</td>
	<td>
	<?php
 require_once '../../class/tecnico.class.php';
 $tecnico = Tecnico::recuperarTodos();
?>
<select id="tecnico" name="tecnico">
 <?php foreach($tecnico as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['nombre']?></option>
<?php endforeach; ?>
</select>
	</td>
</tr>
	<tr>
	<td>
	SERIAL:
	</td>
	<td>
	<input type="text" id="serial" name="serial" onKeyUp="this.value=this.value.toUpperCase();" size="15" required>
	</td>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text"  id="marca" name="marca" onKeyUp="this.value=this.value.toUpperCase();" size="17px" required>
	</td>
	</tr>
	<tr>
	<td>
	SISTEMA:
	</td>
	<td>
	<input class="sistema" type="text"  id="sistema" name="sistema" onKeyUp="this.value=this.value.toUpperCase();" size="15px" required>
	</td>
	<td>
	DISCO DURO:
	</td>
	<td>
	<input class="disco" type="text" id="disco" name="disco" size="17" required>
	</td>
	</tr>
	<tr>
	<td>
	MEMORIA:
	</td>
	<td>
	<input class="memoria" type="text" id="memoria" name="memoria" size="15" required>
	</td>
	<td>
	PROCESADOR:
	</td>
	<td>
	<input class="procesador" type="text" id="procesador" name="procesador" size="17" required>
	</td>
	</tr>
	<tr>
	<td>
	ESTATUS:
	</td>
	<td>
	<?php
 require_once '../../class/estatus.class.php';
 $estatus = Estatus::recuperarTodos();
?>
<select id="estatus" name="estatus">
 <?php foreach($estatus as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>

	</td>
	<td>
	SOPORTE:
	</td>
	<td>
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
	</td>
	
	</tr>
<tr>
<td>

<input type="hidden" name="equipo" value="equipo"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
</td>
</tr>
</table>
</form>
<?php
}?>
<?php if (isset($_POST["monitor"]) and $_POST["monitor"]=="monitor")
{?>
<?php
	 require_once '../../class/monitor.class.php';
	$plantel_id=$_POST['plantel'];
	$tecnico_id=$_POST['tecnico'];
	$tipomonitor_id=$_POST['tipomonitor'];
	$serial=$_POST['serial'];
	$marca=$_POST['marca'];
	$pulgadas=$_POST['pulgadas'];
	$ubicacion_id=$_POST['ubicacion'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus'];
        $fecha=$_POST['fecha'];
$monitor = Monitor::buscarPorTodosss($serial);
if($monitor){
  echo "<div class=error>EL MONITOR YA EXISTE EN EL REGISTRO</div>";
 }else{
	$monitor = new Monitor ($plantel_id, $tecnico_id, $tipomonitor_id, $serial, $marca, $pulgadas, $ubicacion_id, $soporte, $estatus_id, $fecha);
	$monitor->guardar();
 require_once '../../class/rmonitor.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_GET['d'];
$rmonitor = new Rmonitor ($estatus_id, $tipoplantel_id, $valor);
$rmonitor->guardar();	
echo "<div class=exito>EQUIPO MONITOR REGISTRADO CORRECTAMENTE</div>";
  }}?>

<?php if (isset($_GET["t"]) and $_GET["t"]=="monitor")
{?>
agregamos monitor 
<form method="POST" action="nuevo.php" onsubmit="return validar()">
<input type="hidden" id="valor" name="valor" value="<?php echo $_GET['id']; ?>">
<input type="hidden" id="plantel" name="plantel" value="<?php echo $_GET['id']; ?>">
<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>
	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<select id="ubicacion" name="ubicacion">
 <?php foreach($ubicacion as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	<td>
	TECNICO:
	</td>
	<td>
	<?php
 require_once '../../class/tecnico.class.php';
 $tecnico = Tecnico::recuperarTodos();
?>
<select id="tecnico" name="tecnico">
 <?php foreach($tecnico as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['nombre']?></option>
<?php endforeach; ?>
</select>
	</td>
</tr>
	<tr>
	<td>
	SERIAL:
	</td>
	<td>
	<input type="text" id="serial" name="serial" onKeyUp="this.value=this.value.toUpperCase();" size="15" required>
	</td>
	<td>
	TIPO MONITOR:
	</td>
	<td>
	<?php
 require_once '../../class/tipomonitor.class.php';
 $tipomonitor = Tipomonitor::recuperarTodos();
?>
<select id="tipomonitor" name="tipomonitor">
 <?php foreach($tipomonitor as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	</tr>
	<tr>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text" id="marca" name="marca" onKeyUp="this.value=this.value.toUpperCase()"  size="15px" required>
	</td>
	<td>
	PULGADAS:
	</td>
	<td>
	<input class="inputNormal" type="text" id="pulgadas" name="pulgadas" onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
	</tr>
	<tr>
	<td>
	ESTATUS:
	</td>
	<td>
	<?php
 require_once '../../class/estatus.class.php';
 $estatus = Estatus::recuperarTodos();
?>
<select id="estatus" name="estatus">
 <?php foreach($estatus as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>

	</td>
	<td>
	SOPORTE:
	</td>
	<td>
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
	</td>
	
	</tr>
<tr>
<td>

<input type="hidden" name="monitor" value="monitor"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
</td>
</tr>
</table>
</form>
<?php
}?>
<?php if (isset($_POST["impresora"]) and $_POST["impresora"]=="impresora")
{?>
<?php
	 require_once '../../class/impresora.class.php';
	$plantel_id=$_POST['plantel'];
	$tecnico_id=$_POST['tecnico'];
	$tipoimpresora_id=$_POST['tipoimpresora'];
	$serial=$_POST['serial'];
	$marca=$_POST['marca'];
	$modelo=$_POST['modelo'];
	$ubicacion_id=$_POST['ubicacion'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus'];
        $fecha=$_POST['fecha'];
	$impresora = Impresora::buscarPorTodosss($serial);
if($impresora){
  echo "<div class=error>LA IMPRESORA YA EXISTE EN EL REGISTRO</div>";
 }else{

	$impresora = new Impresora ($plantel_id, $tecnico_id, $tipoimpresora_id, $serial, $marca, $modelo, $ubicacion_id, $soporte, $estatus_id, $fecha);
	$impresora->guardar();
 require_once '../../class/rimpresora.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_GET['d'];
$rimpresora = new Rimpresora ($estatus_id, $tipoplantel_id, $valor);
$rimpresora->guardar();	
echo "<div class=exito>EQUIPO IMPRESORA REGISTRADO CORRECTAMENTE</div>";
} }?>
<?php if (isset($_GET["t"]) and $_GET["t"]=="impresora")
{?>
agregamos impresora 
<form method="POST" action="nuevo.php" onsubmit="return validar()">
<input type="hidden" id="valor" name="valor" value="<?php echo $_GET['id']; ?>">
<input type="hidden" id="plantel" name="plantel" value="<?php echo $_GET['id']; ?>">
<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>
	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<select id="ubicacion" name="ubicacion">
 <?php foreach($ubicacion as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	<td>
	TECNICO:
	</td>
	<td>
	<?php
 require_once '../../class/tecnico.class.php';
 $tecnico = Tecnico::recuperarTodos();
?>
<select id="tecnico" name="tecnico">
 <?php foreach($tecnico as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['nombre']?></option>
<?php endforeach; ?>
</select>
	</td>
</tr>
	<tr>
	<td>
	SERIAL:
	</td>
	<td>
	<input type="text" id="serial" name="serial" onKeyUp="this.value=this.value.toUpperCase();" size="15" required>
	</td>
	<td>
	TIPO IMPRESORA:
	</td>
	<td>
	<?php
 require_once '../../class/tipoimpresora.class.php';
 $tipoimpresora = Tipoimpresora::recuperarTodos();
?>
<select id="tipoimpresora" name="tipoimpresora">
 <?php foreach($tipoimpresora as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	</tr>
	<tr>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text" id="marca" name="marca" onKeyUp="this.value=this.value.toUpperCase()"  size="15px" required>
	</td>
	<td>
	MODELO:
	</td>
	<td>
	<input class="inputNormal" type="text" id="modelo" name="modelo" onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
	</tr>
	<tr>
	<td>
	ESTATUS:
	</td>
	<td>
	<?php
 require_once '../../class/estatus.class.php';
 $estatus = Estatus::recuperarTodos();
?>
<select id="estatus" name="estatus">
 <?php foreach($estatus as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>

	</td>
	<td>
	SOPORTE:
	</td>
	<td>
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
	</td>
	
	</tr>
<tr>
<td>

<input type="hidden" name="impresora" value="impresora"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
</td>
</tr>
</table>
</form>
<?php
}?>

<div class="alerta">
RECUERDE QUE PARA AGREGAR UN EQUIPO DEBES SELECIONAR UNA OPCION EN EL MENU DE ARRIBA
</div>

</div>

</body>
</html>

