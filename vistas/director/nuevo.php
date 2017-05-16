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
            <a class="btn" href="#" id="b_user_list">Datos Director</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<!-- Insertamos Datos de Registro plantel -->
<?php if (isset($_POST["insertar"]) and $_POST["insertar"]=="insertar")
{?>
<?php
	 require_once '../../class/director.class.php';
	$plantel_id=$_POST['plantel'];	
	$nombre=$_POST['nombre'];
	$cedula=$_POST['cedula'];
	$tlf=$_POST['tlf'];
	$correo=$_POST['correo'];
	$fecha=$_POST['fecha'];

$director = Director::buscarPorTodosss($cedula);
if($director){
  echo "<div class=error>EL DIRECTOR YA EXISTE EN EL REGISTRO</div>";
 }else{

	$director = new Director ($plantel_id, $nombre, $cedula, $tlf, $correo, $fecha);
$director->guardar();	
echo "<div class=exito>DIRECTOR REGISTRADO CORRECTAMENTE</div>";
 }}?>
<!-- fin del Insertar -->
<!-- Mostramos Registro de Director -->
<?php
require_once '../../class/director.class.php';
$director = Director::buscarPorI($_GET['id']);
if($director)
{
?>
<table>
<tr>
	<td><b>NOMBRE Y APELLIDO:</b><hr></td>
	<td>
	<?php echo $director->getNombre(); ?>
<hr>
	</td>
	<td><b>CEDULA:</b><hr></td>
	<td>
	<?php echo $director->getCedula(); ?>
<hr>
	</td>
</tr>
<tr>
	<td><b>TELEFONO:</b><hr></td>
	<td>
	<?php echo $director->getTlf(); ?>
<hr>
	</td>
	<td><b>CORREO:</b><hr></td>
	<td>
	<?php echo $director->getCorreo(); ?>
<hr>
	</td>
</tr>
<tr>
<td>
<form method="POST" action="actualizar.php" onsubmit="return validar()">
<input type="hidden" name="id" value="<?php echo $director->getPlantel_id();?>">
<input type="hidden" name="actualizar" value="actualizar"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Actualizar">
</form>
</td>
</tr>
</table>
<?php 
}
elseif($_GET['id']!=null) {
?>
<!--fin - Mostramos Registro de Director -->

<form method="POST" action="nuevo.php" onsubmit="return validar()">
<table>
<tr>
	<td>
		CEDULA:
	</td>
	<td>
<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<?php $datos=$_GET['id']; ?>
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 	
<input type="hidden" id="plantel" name="plantel" value="<?php echo $datos; ?>">
		<input class="inputNormal" type="text" id="cedula" name="cedula" size="15" >
	</td>
	<td>
		NOMBRES:
	</td>
	<td>
		<input class="inputNormal" type="text" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase();" required>
	</td>
</tr>
<tr>
	<td>
		TELEFONO:
	</td>
	<td>
		<input class="tlf" type="text" id="tlf" name="tlf" size="15" required>
	</td>
	<td>
		CORREO:
	</td>
	<td>
		<input class="inputNormal" type="email" id="correo" name="correo" onKeyUp="this.value=this.value.toUpperCase();" required>
	</td>
</tr>

<tr>

	<td>
		<input type="hidden" name="insertar" value="insertar"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
	</td>
</tr>
</table>
</form>
<!-- Fin de Datos de Registro plantel -->
<?php } ?>
</div>

</body>
</html>

