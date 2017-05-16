<?php
require_once '../../class/vplantel.class.php';
$dia=date("d");
	$mes=date("m");
       $annio=date("Y");
	
$fecha=$annio."-".$mes."-".$dia;?>
<?php if (isset($_POST["visita"]) and $_POST["visita"]=="visita")
{?>
<?php

$tipoplantel_id=$_POST['tipo'];
$vplantel = new Vplantel ($tipoplantel_id, $fecha);
$vplantel->guardar();
}?>

<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title></title>
   <link rel="stylesheet" type="text/css" href="../../css/base.css" />
  <script type="text/javascript" src="../../js/select_dependientes.js"></script>
<style media="print" type="text/css">
#imprimir {
visibility:hidden
}
</style>
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
            <a class="btn" href="#" id="b_user_list">Datos del Plantel</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">

<!-- Datos de Registro plantel -->
<?php $datos=$_GET['id']; ?>

<?php
require_once '../../class/plantel.class.php';
$plantel = Plantel::buscarPorI($datos);
if($plantel)
{ 
?>

<table>
<tr>
	<td>
		<b>FECHA:</b>
<hr>
	</td>
	<td>
<?php echo $plantel->getFecha(); ?>
<hr>
	</td>
	<td>
		<b>TIPO PLANTEL:</b>
<hr>
	</td>
	<td>
<?php
$b=$plantel->getTipoplantel_id();
require_once '../../class/tipoplantel.class.php';
$tipoplantel = Tipoplantel::buscarPorId($b);
echo $tipoplantel->getDescripcion();
?>
<hr>
	</td>
</tr>

<tr>
	<td>
		<b>MUNICIPIO:</b>
<hr>
	</td>
	<td>
	<?php
$b=$plantel->getMunicipio_id();
require_once '../../class/municipio.class.php';
$municipio = Municipio::buscarPorId($b);
echo $municipio->getDescripcion();
?>
<hr>
	</td>
	<td>
		<b>PARROQUIA:</b>
<hr>
	</td>
	<td>
	<?php
$b=$plantel->getParroquia_id();
require_once '../../class/parroquia.class.php';
$parroquia = Parroquia::buscarPorId($b);
echo $parroquia->getDescripcion();
?>
<hr>	
	</td>
</tr>

<tr>
	<td>
		<b>PLANTEL:</b>
<hr>
	</td>
	<td>
	<?php echo $plantel->getNombreplantel(); ?>
<hr>
	</td>
	<td>
		<b>LOCALIDAD:</b>
<hr>
	</td>
	<td>
		<?php echo $plantel->getLocalidad(); ?>
<hr>
	</td>
</tr>
<tr>
	<td>
		<b>DIRECCION:</b>
<hr>
	</td>
	<td>
		<?php echo $plantel->getDireccion(); ?>
<hr>
	</td>
	<td>
		<b>CODIGO DEA:</b>
<hr>
	</td>
	<td>
		<?php echo $plantel->getDea(); ?>
<hr>
	</td>
</tr>
<tr>
	<td>
		<b>TLF. PLANTEL:</b>
<hr>
	</td>
	<td>
		<?php echo $plantel->getTlfplantel(); ?>
<hr>
	</td>
	<td>
<?php
require_once '../../class/vplantel.class.php';
$dias=date("d");
	$mess=date("m");
       $annios=date("Y");
	
$v=$annios."-".$mess."-".$dias;
$d=$plantel->getId();
$vplantel = Vplantel::buscarPorTodoss($d, $v);
if($vplantel){
echo "<div id='imprimir' class=info>VISITADO</div></td><td>";
echo '<form id="form1" name="form1" method="post" action="">
<input class="submit" type="submit" name="imprimir" id="imprimir" value="Imprimir" onClick="window.print();" />
</form>';
}
else{
?>

<form method="POST" action="detalles.php?id=<?php echo $datos;?>">
<input type="hidden" name="tipo" value="<?php echo $plantel->getId();?>"/>
<input type="hidden" name="visita" value="visita"/>
<input class="submit" type="submit" onClick="validaForm()" value="Visitado" id="imprimir">
</form></td><td>
<form id="form1" name="form1" method="post" action="">
<input class="submit" type="submit" name="imprimir" id="imprimir" value="Imprimir" onClick="window.print();" />
</form>
<?php }?>
</td>
</tr>
</table>

<!-- Fin de Datos de Registro plantel -->
<?php } ?>
</div>

</body>
</html>
