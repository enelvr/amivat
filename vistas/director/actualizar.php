
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
<?php if (isset($_POST["actualizado"]) and $_POST["actualizado"]=="actualizado")
{?>
<?php
	 require_once '../../class/director.class.php';
	$id=$_POST['id'];
	$plantel_id=$_POST['plantel'];	
	$nombre=$_POST['nombre'];
	$cedula=$_POST['cedula'];
	$tlf=$_POST['tlf'];
	$correo=$_POST['correo'];
	$fecha=$_POST['fecha'];
	$director = new Director ($plantel_id, $nombre, $cedula, $tlf, $correo, $fecha, $id);
	$director->actualiza();
echo "<div class=exito>DATOS DIRECTOR ACTUALIZADO CORRECTAMENTE</div>";
 }
else{
?>
<?php
require_once '../../class/director.class.php';

$director = Director::buscarPorI($_POST['id']);
if($director)
{
?>
<form method="POST" action="actualizar.php">

<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 
<input type="hidden" name="id" value="<?php echo $director->getId(); ?>">
<input type="hidden" name="plantel" value="<?php echo $director->getPlantel_id();?>">
<table>
<tr>
	
	<td><b>CEDULA:</b></td>
	<td>
	<input class="inputNormal" type="text" id="cedula" value="<?php echo $director->getCedula(); ?>" name="cedula" size="15">
	</td>
	<td><b>NOMBRE Y APELLIDO:</b></td>
	<td>
	<input class="inputNormal" type="text" id="nombre" value="<?php echo $director->getNombre(); ?>" name="nombre" onKeyUp="this.value=this.value.toUpperCase();">
	</td>
</tr>
<tr>
	<td><b>TELEFONO:</b></td>
	<td>
	<input class="inputNormal" type="text" id="tlf" value="<?php echo $director->getTlf(); ?>" name="tlf" size="15">
	</td>
	<td><b>CORREO:</b></td>
	<td>
	<input class="inputNormal" type="text" id="correo" value="<?php echo $director->getCorreo(); ?>" name="correo" onKeyUp="this.value=this.value.toUpperCase();">
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
<?php }} ?>
</div>

</body>
</html>


