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
            <a class="btn" href="#" id="b_user_list">Datos De La Impresora</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<?php if (isset($_POST["actualizado"]) and $_POST["actualizado"]=="actualizado")
{?>
<?php
	 require_once '../../class/impresora.class.php';
	$id=$_POST['id'];
	$plantel_id=$_POST['plantel_id'];
	$fecha=$_POST['fecha'];
	$tecnico_id=$_POST['tecnico_id'];
	$tipoimpresora_id=$_POST['tipoimpresora_id'];
	$serial=$_POST['serial'];
	$marca=$_POST['marca'];
	$modelo=$_POST['modelo'];
	$ubicacion_id=$_POST['ubicacion_id'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus_id']; 
 $impresora = new Impresora ($plantel_id, $tecnico_id, $tipoimpresora_id, $serial, $marca, $modelo, $ubicacion_id, $soporte, $estatus_id, $fecha, $id);
$impresora->guardar();

 require_once '../../class/rimpresora.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_POST['tipoplantel_id'];
$rimpresora = new Rimpresora ($estatus_id, $tipoplantel_id, $valor);
$rimpresora->guardar();
echo "<div class=exito>DATOS DEL MONITOR ACTUALIZADO CORRECTAMENTE</div>";
 }

?>

<?php
require_once '../../class/impresora.class.php';
$impresora = Impresora::buscarPorI($_GET['id']);
if($impresora)
{
?>
<form method="POST" action="actualizar.php">

<input type="hidden" id="fecha" name="fecha" value="<?php echo $impresora->getFecha(); ?>"> 
<input type="hidden" name="id" value="<?php echo $impresora->getId(); ?>">
<input type="hidden" name="plantel_id" value="<?php echo $impresora->getPlantel_id(); ?>">

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>

<?php $imp=$impresora->getPlantel_id(); ?>
<?php
 require_once '../../class/plantel.class.php';
 $plantel = Plantel::buscarPorI($imp);

?>
<input type="hidden" id="tipoplantel_id" name="tipoplantel_id" value="<?php echo $plantel->getTipoplantel_id(); ?>">

	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<?php $e=$impresora->getUbicacion_id(); ?>
<select id="ubicacion" name="ubicacion_id">
 <?php foreach($ubicacion as $item): ?>
<?php if($e==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
?>
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
<?php $tecn=$impresora->getTecnico_id(); ?>
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
	<input type="text" id="serial" name="serial" value="<?php echo $impresora->getSerial(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15">
	</td>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text"  id="marca" name="marca" value="<?php echo $impresora->getMarca(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="17px">
	</td>
	</tr>
	<tr>
	<td>
	MODELO:
	</td>
	<td>
	<input class="campo" type="text" id="modelo" name="modelo" value="<?php echo $impresora->getModelo(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15">
	</td>
	<td>
	TIPO IMPRESORA:
	</td>
	<td>
	<?php
 require_once '../../class/tipoimpresora.class.php';
 $tipoimpresora = Tipoimpresora::recuperarTodos();
?>
<?php $tipo=$impresora->getTipoimpresora_id(); ?>
<select id="tipoimpresora_id" name="tipoimpresora_id" >
 <?php foreach($tipoimpresora as $item): ?>
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
<?php $est=$impresora->getEstatus_id(); ?>
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
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"><?php echo $impresora->getSoporte(); ?></textarea>
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


