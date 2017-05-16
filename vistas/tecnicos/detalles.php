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
            <a class="btn" href="#" id="b_user_list">Datos del Tecnico</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">

<!-- Datos de Registro plantel -->
<?php $datos=$_GET['id']; ?>

<?php
require_once '../../class/tecnico.class.php';
$tecnico = Tecnico::buscarPorId($datos);
if($tecnico)
{ 
?>

<table>
<tr>
	<td>
		<b>CEDULA:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getCedula(); ?>
<hr>
	</td>
	<td>
		<b>NOMBRE Y APELLIDO:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getNombre(); ?>
<hr>
	</td>
</tr>
<tr>
	<td>
		<b>CARGO NOMINAL:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getNcargo(); ?>
<hr>
	</td>
	<td>
		<b>CARGO FUNCIONAL:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getFcargo(); ?>
<hr>
	</td>
</tr>
<tr>
	<td>
		<b>TITULO PROFESIONAR:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getTitulo(); ?>
<hr>
	</td>
	<td>
		<b>COBRA EN:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getCobra(); ?>
<hr>
	</td>
	
</tr>
<tr>
	<td>
		<b>TELEFONO:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getTelefono(); ?>
<hr>
	</td>
	<td>
		<b>CORREO:</b>
<hr>
	</td>
	<td>
<?php echo $tecnico->getCorreo(); ?>
<hr>
	</td>
</tr>
<tr>
	<td>
		<b>TIPO DE CONTRATO:</b>
<hr>
	</td>
	<td>
<?php 
$b=$tecnico->getTipo_contrato_id();
require_once '../../class/tipocontrato.class.php';
$tipocontrato = Tipocontrato::buscarPorId($b);
echo $tipocontrato->getDescripcion();
?>
<hr>
	</td>

</tr>
</table>

<!-- Fin de Datos de Registro plantel -->
<?php } ?>
</div>

</body>
</html>
