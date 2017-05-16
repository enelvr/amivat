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
            <a class="btn" href="#" id="b_user_list">Datos Equipo</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<?php if (isset($_POST["actualizado"]) and $_POST["actualizado"]=="actualizado")
{?>
<?php
	 require_once '../../class/equipo.class.php';
	$id=$_POST['id'];
	$plantel_id=$_POST['plantel_id'];
	$fecha=$_POST['fecha'];
	$tecnico_id=$_POST['tecnico_id'];
	$sistema=$_POST['sistema'];
	$serial=$_POST['serial'];
	$disco=$_POST['disco'];
	$marca=$_POST['marca'];
	$procesador=$_POST['procesador'];
	$memoria=$_POST['memoria'];
	$ubicacion_id=$_POST['ubicacion_id'];
	$soporte=$_POST['soporte'];
	$estatus_id=$_POST['estatus_id']; 
 $equipo = new Equipo ($plantel_id, $tecnico_id, $serial, $marca, $sistema, $disco, $memoria, $procesador, $soporte, $estatus_id, $ubicacion_id, $fecha, $id);
$equipo->actualiza();

 require_once '../../class/requipo.class.php';

	$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
$tipoplantel_id=$_POST['tipoplantel_id'];
$requipo = new Requipo ($estatus_id, $tipoplantel_id, $valor);
$requipo->guardar();
echo "<div class=exito>DATOS DEL EQUIPO ACTUALIZADO CORRECTAMENTE</div>";
 }

?>

<?php
require_once '../../class/equipo.class.php';
$equipo = Equipo::buscarPorI($_GET['id']);
if($equipo)
{
?>
<form method="POST" action="actualizar.php">

<input type="hidden" id="fecha" name="fecha" value="<?php echo $equipo->getFecha(); ?>"> 
<input type="hidden" name="id" value="<?php echo $equipo->getId(); ?>">
<input type="hidden" name="plantel_id" value="<?php echo $equipo->getPlantel_id(); ?>">

<table>
<tr>
	<td>UBICACION:
	</td>
	<td>
<?php $iep=$equipo->getPlantel_id(); ?>
<?php
 require_once '../../class/plantel.class.php';
 $plantel = Plantel::buscarPorI($iep);

?>
<input type="hidden" id="tipoplantel_id" name="tipoplantel_id" value="<?php echo $plantel->getTipoplantel_id(); ?>">



	<?php
 require_once '../../class/ubicacion.class.php';
 $ubicacion = Ubicacion::recuperarTodos();
?>
<?php $e=$equipo->getUbicacion_id(); ?>
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
<?php $tecn=$equipo->getTecnico_id(); ?>
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
	<input type="text" id="serial" name="serial" value="<?php echo $equipo->getSerial(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15">
	</td>
	<td>
	MARCA:
	</td>
	<td>
	<input class="marca" type="text"  id="marca" name="marca" value="<?php echo $equipo->getMarca(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="17px">
	</td>
	</tr>
	<tr>
	<td>
	SISTEMA:
	</td>
	<td>
	<input class="sistema" type="text"  id="sistema" name="sistema" value="<?php echo $equipo->getSistema(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15px">
	</td>
	<td>
	DISCO DURO:
	</td>
	<td>
	<input class="disco" type="text" id="disco" name="disco" value="<?php echo $equipo->getDisco(); ?>" size="17">
	</td>
	</tr>
	<tr>
	<td>
	MEMORIA:
	</td>
	<td>
	<input class="memoria" type="text" id="memoria" name="memoria" value="<?php echo $equipo->getMemoria(); ?>" size="15">
	</td>
	<td>
	PROCESADOR:
	</td>
	<td>
	<input class="procesador" type="text" id="procesador" name="procesador" value="<?php echo $equipo->getProcesador(); ?>" size="17">
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
<?php $est=$equipo->getEstatus_id(); ?>
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
	<textarea class="soporte" name="soporte" maxlength="500" onKeyUp="this.value=this.value.toUpperCase();"><?php echo $equipo->getSoporte(); ?></textarea>
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


