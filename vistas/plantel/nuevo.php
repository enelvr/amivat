<!DOCTYPE html>
<html lang="es">
<head>

   <title></title>
   <script  type="text/javascript">
function validar_formulario(){
if (document.form.tipoplantel.selectedIndex==0){
alert("SELECCIONAR UN TIPO DE PLANTEL")
document.form.tipoplantel.focus()
return 0;
}
if (document.form.municipio_id.selectedIndex==0){
alert("SELECCIONAR UN MUNICIPIO")
document.form.municipio_id.focus()
return 0;
}
if (document.form.parroquias.selectedIndex==0){
alert("SELECCIONAR UNA PARROQUIA")
document.form.parroquias.focus()
return 0;
}
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
            <a class="btn" href="#" id="b_user_list">Nuevo Plantel</a><a class="btn" href="inicio.php" id="b_user_list">Listar Plantel</a>
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
	$dea=$_POST['dea'];
	$municipio_id=$_POST['municipio_id'];
	$parroquia_id=$_POST['parroquias'];
	$localidad=$_POST['localidad'];
	$direccion=$_POST['direccion'];
	$codest=$_POST['dea'];
	$tlfplantel=$_POST['tlfplantel'];
	$fecha=$_POST['fecha'];
	$tipoplantel_id=$_POST['tipoplantel'];
 $plantel = Plantel::buscarPorTodoss($dea);
if($plantel){
  echo "<div class=error>EL PLANTEL YA EXISTE EN EL REGISTRO</div>";
 }else{
  $plantel = new Plantel ($nombreplantel, $dea, $municipio_id, $parroquia_id, $localidad, $direccion, $codest, $tlfplantel, $fecha, $tipoplantel_id);
	$plantel->guardar();
echo "
<script type='text/javascript'>
alert('PLANTEL REGISTRADO CORRECTAMENTE');
window.location='inicio.php';
			</script>";
}
?>
<?php }?>
<!-- fin del Insertar -->
<!-- Datos de Registro plantel -->
<?php
function generaMunicipios()
{
	include 'class/select.conexion.php';
	conectar();
	$consulta=mysql_query("SELECT id, descripcion FROM municipio");
	desconectar();

	// Voy imprimiendo el primer select compuesto por los municipios
	echo "<select name='municipio_id' id='municipio' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>ELIGE</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>
 
<form method="POST" name="form" action="plantelnuevo.php">
<table>
<tr>
	<td>
		FECHA:
	</td>
	<td>
		<input class="tcal" type="text" name="fecha" size="15px" required>
	</td>
	<td>
		TIPO PLANTEL:
	</td>
	<td>
		<?php
 require_once 'class/tipoplantel.class.php';
 $tipoplantel = Tipoplantel::recuperarTodos();
?>
<select id="tipoplantel" name="tipoplantel">
 <?php foreach($tipoplantel as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
</tr>
<tr>
	<td>
		MUNICIPIO:
	</td>
	<td>
		<div id="demoIzq"><?php generaMunicipios(); ?></div>
	</td>
	<td>
		PARROQUIA:
	</td>
	<td>
		<select disabled="disabled" name="parroquias" id="parroquias">
			<option value="0">Seleccione...</option>
		</select>
	</td>
</tr>

<tr>
	<td>
		PLANTEL:
	</td>
	<td>
		<input type="text" id="nombreplantel" name="nombreplantel" onKeyUp="this.value=this.value.toUpperCase();" size="17px" required>
	</td>
	<td>
		LOCALIDAD:
	</td>
	<td>
		<input type="text" id="localidad" name="localidad" size="17px" onKeyUp="this.value=this.value.toUpperCase();" required>
	</td>
</tr>
<tr>
	<td>
		DIRECCION:
	</td>
	<td>
		<input class="direccion" type="text" id="direccion" name="direccion" onKeyUp="this.value=this.value.toUpperCase();" size="17px" required>
	</td>
	<td>
		CODIGO DEA:
	</td>
	<td>
		<input class="dea" type="text" id="dea" name="dea" onKeyUp="this.value=this.value.toUpperCase();" size="17px" required>
	</td>
</tr>
<tr>
	<td>
		TLF. PLANTEL:
	</td>
	<td>
		<input class="inputNormal" type="text" id="tlfplantel" name="tlfplantel" onKeyUp="this.value=this.value.toUpperCase();" size="17px" required>
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

