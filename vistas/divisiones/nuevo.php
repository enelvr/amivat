<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title></title>
 <script  type="text/javascript">
function validar_formulario(){

valor = document.form.tlfplantel.value;
if( !(/^\d{11}$/.test(valor)) ) {
alert("TELEFONO INCORRECTO");
document.form.tlfplantel.focus();
return 0;
}

if (document.form.nombreplantel.value.length==0){
alert("EL CAMPO DIVISION ESTA VACIO")
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
            <a class="btn" href="#" id="b_user_list">Nueva Division</a><a class="btn" href="divisiones.php" id="b_user_list">Listar Divisiones</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<!-- Insertamos Datos de Registro plantel -->
<?php if (isset($_POST["insertar"]) and $_POST["insertar"]=="insertar")
{?>
<?php
	 require_once 'class/plantel.class.php';
	$nombreplantel=$_POST['nombreplantel'];
	$fecha=$_POST['fecha'];
	$dea="SIN CODIGO";
	$municipio_id="1";
	$parroquia_id="8";
	$localidad="MATURIN";
	$direccion="ZONA EDUCATIVA";
	$codest="SIN CODIGO";
	$tlfplantel=$_POST['tlfplantel'];
	$tipoplantel_id="1";
$plantel = Plantel::buscarPorTodosss($nombreplantel);
if($plantel){
  echo "<div class=error>LA DIVISION YA EXISTE EN EL REGISTRO</div>";
 }else{


  $plantel = new Plantel ($nombreplantel, $dea, $municipio_id, $parroquia_id, $localidad, $direccion, $codest, $tlfplantel, $fecha, $tipoplantel_id);
	$plantel->guardar();
echo "
<script type='text/javascript'>
alert('DIVISION REGISTRADO CORRECTAMENTE');
window.location='divisiones.php';
			</script>";
}
?>
<?php }?>
<!-- fin del Insertar -->
<!-- Datos de Registro plantel -->
<form method="POST" action="divisionesnuevo.php" name="form">
<table>
<tr>
	<td>
		FECHA:
	</td>
	<td>
		<input class="tcal" type="date" name="fecha" id="fecha" size="15px" required>
	</td>
<td>
		DIVISION:
	</td>
	<td>
		<input type="text" id="nombreplantel" name="nombreplantel" onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
	
</tr>

<tr>
	<td>
		TLF. DIVISION:
	</td>
	<td>
		<input class="inputNormal" type="text" id="tlfplantel" name="tlfplantel" onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
	<td>
		<input type="hidden" name="insertar" value="insertar"/>
		<input class="submit" type="button" onclick="validar_formulario()" value="Guardar"  id="enviar">
	</td>
</tr>
</table>
</form>
<!-- Fin de Datos de Registro plantel -->

</div>

</body>
</html>

