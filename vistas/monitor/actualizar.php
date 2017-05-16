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
            <a class="btn" href="#" id="b_user_list">Datos Del Monitor</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<?php if (isset($_POST["actualizado"]) and $_POST["actualizado"]=="actualizado")
{?>
<?php
	 require_once '../../class/monitor.class.php';
	$id=$_POST['id'];
	$plantel_id=$_POST['plantel_id'];
	$fecha=$_POST['fecha'];
	$tecnico_id=$_POST['tecnico_id'];
	$tipomonitor_id=$_POST['tipomonitor_id'];
	$serial=$_POST['serial'];
	$marca=$_POST['marca'];
	$pulgadas=$_POST['pulgadas'];
	$ubicacion_id=$_POST['ubicacion_id'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus_id']; 
 $monitor = new Monitor ($plantel_id, $tecnico_id, $tipomonitor_id, $serial, $marca, $pulgadas, $ubicacion_id, $soporte, $estatus_id, $fecha, $id);
$monitor->guardar();

 require_once '../../class/rmonitor.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_POST['tipoplantel_id'];
$rmonitor = new Rmonitor ($estatus_id, $tipoplantel_id, $valor);
$rmonitor->guardar();
echo "<div class=exito>DATOS DEL MONITOR ACTUALIZADO CORRECTAMENTE</div>";
 }

?>

<?php
require_once '../../class/monitor.class.php';
$monitor = Monitor::buscarPorI($_GET['id']);
if($monitor)
{
?>
<form method="POST" action="actualizar.php">

<input type="hidden" id="fecha" name="fecha" value="<?php echo $monitor->getFecha(); ?>"> 
<input type="hidden" name="id" value="<?php echo $monitor->getId(); ?>">
<input type="hidden" name="plantel_id" value="<?php echo $monitor->getPlantel_id(); ?>">

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>
<?php $imm=$monitor->getPlantel_id(); ?>
<?php
 require_once '../../class/plantel.class.php';
 $plantel = Plantel::buscarPorI($imm);

?>
<input type="hidden" id="tipoplantel_id" name="tipoplantel_id" value="<?php echo $plantel->getTipoplantel_id(); ?>">

	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<?php $e=$monitor->getUbicacion_id(); ?>
<select id="ubicacion" name="ubicacion_id">
 <?php foreach($ubicacion as $item): ?>
<?php if($e==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['descripcion'].'</option>';}?>
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
<?php $tecn=$monitor->getTecnico_id(); ?>
<select id="tecnico" name="tecnico_id">
 <?php foreach($tecnico as $item): ?>
<?php if($tecn==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['nombre'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['nombre'].'</option>';}
?>
<?php endforeach; ?>
</select>
	</td>
</tr>
	<tr>
	<td>
	SERIAL:
	</td>
	<td>
	<input type="text" id="serial" name="serial" value="<?php echo $monitor->getSerial(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15">
	</td>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text"  id="marca" name="marca" value="<?php echo $monitor->getMarca(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="17px">
	</td>
	</tr>
	<tr>
	<td>
	PULGADAS:
	</td>
	<td>
	<input class="campo" type="text" id="pulgadas" name="pulgadas" value="<?php echo $monitor->getPulgadas(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15">
	</td>
	<td>
	TIPO MONITOR:
	</td>
	<td>
	<?php
 require_once '../../class/tipomonitor.class.php';
 $tipomonitor = Tipomonitor::recuperarTodos();
?>
<?php $tipo=$monitor->getTipomonitor_id(); ?>
<select id="tipomonitor_id" name="tipomonitor_id" >
 <?php foreach($tipomonitor as $item): ?>
<?php if($tipo==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
?>
<?php endforeach; ?>
</select>
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
<?php $est=$monitor->getEstatus_id(); ?>
<select id="estatus" name="estatus_id">
 <?php foreach($estatus as $item): ?>
<?php if($est==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
?>
<?php endforeach; ?>
</select>

	</td>
	<td>
	SOPORTE:
	</td>
	<td>
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"><?php echo $monitor->getSoporte(); ?></textarea>
	</td>
	
	</tr>

<tr>
<td>
<input type="hidden" name="actualizado" value="actualizado"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Actualizar">
</form>
</td>
</tr>
</table>
<?php } ?>
</div>

</body>
</html>


