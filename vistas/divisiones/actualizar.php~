<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title></title>
   <link rel="stylesheet" type="text/css" href="../../css/base.css" />
  <script type="text/javascript" src="../../js/select_dependientes.js"></script>
<script type="text/javascript" src="../../js/tcal.js"></script>
   <script  type="text/javascript">
function validar_formulario(){

valor = document.form.tlfplantel.value;
if( !(/^\d{11}$/.test(valor)) ) {
alert("TELEFONO INCORRECTO");
document.form.tlfplantel.focus();
return 0;
}

if (document.form.nombreplantel.value.length==0){
alert("EL CAMPO PLANTEL ESTA VACIO")
document.form.nombreplantel.focus()
return 0;
}
if (document.form.fecha.value.length==0){
alert("EL CAMPO FECHA ESTA VACIO")
document.form.fecha.focus()
return 0;
}

document.form.submit();
}
</script>
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
            <a class="btn" href="#" id="b_user_list">Actualizar Datos del Plantel</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<!-- Actualizar Datos del plantel -->
<?php if (isset($_POST["actualizar"]) and $_POST["actualizar"]=="actualizar")
{?>
<?php
	 require_once '../../class/plantel.class.php';
	$id=$_POST['id'];
	$nombreplantel=$_POST['nombreplantel'];	
	$dea="SIN CODIGO";
	$municipio_id="1";
	$parroquia_id="8";
	$localidad="MATURIN";
	$direccion="ZONA EDUCATIVA";
	$codest="SIN CODIGO";
	$tlfplantel=$_POST['tlfplantel'];
	$fecha=$_POST['fecha'];
	$tipoplantel_id="1";

 $plantel = new Plantel ($nombreplantel, $dea, $municipio_id, $parroquia_id, $localidad, $direccion, $codest, $tlfplantel, $fecha, $tipoplantel_id, $id);
$plantel->guardar();
echo "<div class=exito>PLANTEL ACTUALIZADO CORRECTAMENTE</div>";
}
?>
<!-- fin de actualizar-->
<!-- Datos de Registro plantel -->
<?php $datos=$_GET['id']; ?>

<?php
require_once '../../class/plantel.class.php';
$plantel = Plantel::buscarPorI($datos);
if($plantel)
{ 
?>

<form method="POST" action="actualizar.php" name="form">
<table>
<tr>
	<td>
		FECHA:
	</td>
	<td>
		<input type="hidden" name="id" value="<?php echo $plantel->getId(); ?>">
		<input class="tcal" type="date" name="fecha" value="<?php echo $plantel->getFecha(); ?>" size="15px">
		
	</td>
	<td>
		DIVISION:
	</td>
	<td>
		<input type="text" id="nombreplantel" name="nombreplantel" value="<?php echo $plantel->getNombreplantel(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15px">
	</td>
	
</tr>

<tr>
	<td>
		TLF. PLANTEL:
	</td>
	<td>
		<input class="inputNormal" type="text" id="tlfplantel" value="<?php echo $plantel->getTlfplantel(); ?>" name="tlfplantel" onKeyUp="this.value=this.value.toUpperCase();" size="18px">
	</td>
	<td>
		<input type="hidden" name="actualizar" value="actualizar"/>
		<input class="submit" type="button" onclick="validar_formulario()" value="Actualizar">
	</td>
</tr>
</table>
</form>
<!-- Fin de Datos de Registro plantel -->
<?php } ?>
</div>

</body>
</html>
