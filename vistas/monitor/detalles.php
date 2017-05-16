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

<?php
require_once '../../class/monitor.class.php';
$monitor = Monitor::buscarPorI($_GET['id']);
if($monitor)
{
?>
<table>
<tr>
	<td>
	<b>FECHA:</b>
<hr>
	</td>
	<td>
	<?php echo $monitor->getFecha(); ?>
<hr>	
	</td>
	<td>
	<b>PLANTEL/DIVISION:</b>
<hr>
	</td>
	<td>
<?php 

$b=$monitor->getPlantel_id();
require_once '../../class/plantel.class.php';
$plantel = Plantel::buscarPorIde($b);
echo $plantel->getNombreplantel();
?>
<hr>
	</td>
</tr>
<tr>
<td>
	<b>SERIAL:</b>
<hr>	
</td>
	<td>
	<?php echo $monitor->getSerial(); ?>
<hr>
	</td>
	<td>
	<b>TECNICO:</b>
<hr>	</td>
	<td>
	<?php 

$b=$monitor->getTecnico_id();
require_once '../../class/tecnico.class.php';
$tecnico = Tecnico::buscarPorId($b);
echo $tecnico->getNombre();
?>
<hr>	</td>
	
</tr>
<tr>
	<td>
	<b>MARCA:</b>
<hr>
	</td>
	<td>
	<?php echo $monitor->getMarca(); ?>
<hr>
	</td>
	<td>
	<b>PULGADAS:</b>
<hr>
	</td>
	<td>
	<?php echo $monitor->getPulgadas(); ?>
<hr>
	</td>
</tr>

<tr>
	<td>
	<b>UBICACION:</b>
<hr>
	</td>
	<td>
	<?php 

$b=$monitor->getUbicacion_id();
require_once '../../class/ubicacion.class.php';
$ubicacion = Ubicacion::buscarPorId($b);
echo $ubicacion->getDescripcion();
?>
<hr>
	</td>
<td>
	<b>ESTATUS:</b>
<hr>
	</td>
	<td>
<?php 
$b=$monitor->getEstatus_id();
require_once '../../class/estatus.class.php';
$estatus = Estatus::buscarPorId($b);
echo $estatus->getDescripcion();
?>
<hr>
	</td>
</tr>
<tr>
	
	<td>


	</td>
	<td>
	

	</td>
<td>
	<b>SOPORTE:</b>
<hr>
	</td>
<td><?php echo $monitor->getSoporte(); ?><hr></td>
</tr>

</table>

<?php } ?>

</div>
</body>
</html>
