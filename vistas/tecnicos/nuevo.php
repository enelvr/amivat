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
            <a class="btn" href="#" id="b_user_list">Nuevo Tecnico</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<!-- Insertamos Datos de Registro plantel -->
<?php if (isset($_POST["insertar"]) and $_POST["insertar"]=="insertar")
{?>
<?php
	require_once '../../class/tecnico.class.php';
	$cedula=$_POST['cedula'];	
	$nombre=$_POST['nombre'];
	$ncargo=$_POST['ncargo'];
	$fcargo=$_POST['fcargo'];
	$titulo=$_POST['titulo'];
	$tipo_contrato_id=$_POST['tipo_contrato_id'];
	$cobra=$_POST['cobra'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
$tecnico = Tecnico::buscarPorTodosss($cedula);
if($tecnico){
  echo "<div class=error>EL TECNICO YA EXISTE EN EL REGISTRO</div>";
 }else{
  $tecnico = new Tecnico ($cedula, $nombre, $ncargo, $fcargo, $titulo, $tipo_contrato_id, $cobra, $telefono, $correo);
	$tecnico->guardar();
echo "<div class=exito>TECNICO REGISTRADO CORRECTAMENTE</div>";
}
?>
<?php }?>
<!-- fin del Insertar -->
<!-- Datos de Registro plantel -->

<form method="POST" action="nuevo.php" onsubmit="return validar()">
<table>
<tr>
	<td>
		CEDULA:
	</td>
	<td>
		<input type="hidden" name="id">
		<input type="text" name="cedula" size="15px" required>
	</td>
	<td>
		NOMBRES:
	</td>
	<td>
	<input type="text" name="nombre" onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
</tr>
<tr>
	<td>
		C. NOMINAL:
	</td>
	<td>
			<input type="text" name="ncargo" onKeyUp="this.value=this.value.toUpperCase();" size="15px" required>
	</td>
	<td>
		C. FUNCIONAL:
	</td>
	<td>
		
			<input type="text" name="fcargo"  onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
</tr>

<tr>
	<td>
		TITULO:
	</td>
	<td>
		<input type="text" name="titulo"  onKeyUp="this.value=this.value.toUpperCase();" size="15px" required>
	</td>
	<td>
		COBRA EN:
	</td>
	<td>
		<input type="text" name="cobra"onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
</tr>
<tr>
	<td>
		TELEFONO:
	</td>
	<td>
		<input type="text" name="telefono"  onKeyUp="this.value=this.value.toUpperCase();" size="15px" required>
	</td>
	<td>
		CORREO:
	</td>
	<td>
		<input type="text" name="correo"  onKeyUp="this.value=this.value.toUpperCase();" size="18px" required>
	</td>
</tr>
<tr>
	<td>
		TIPO DE CONTRATO:
	</td>
	<td>
<?php
 require_once '../../class/tipocontrato.class.php';
 $tipocontrato = Tipocontrato::recuperarTodos();
?>
<select id="tipocontrato" name="tipo_contrato_id">
 <?php foreach($tipocontrato as $item): ?>
<option value ="<?php echo $item['id']?>"><?php echo $item['descripcion']?></option>
<?php endforeach; ?>
</select>
	</td>
	<td>
		<input type="hidden" name="insertar" value="insertar"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
	</td>
</tr>
</table>
</form>
<!-- Fin de Datos de Registro plantel -->

</div>

</body>
</html>

