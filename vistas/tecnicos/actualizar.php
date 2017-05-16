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
            <a class="btn" href="#" id="b_user_list">Actualizar Datos del Tecnico</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<!-- Actualizar Datos del plantel -->
<?php if (isset($_POST["actualizar"]) and $_POST["actualizar"]=="actualizar")
{?>
<?php
	 require_once '../../class/tecnico.class.php';
	$id=$_POST['id'];
	$cedula=$_POST['cedula'];	
	$nombre=$_POST['nombre'];
	$ncargo=$_POST['ncargo'];
	$fcargo=$_POST['fcargo'];
	$titulo=$_POST['titulo'];
	$tipo_contrato_id=$_POST['tipo_contrato_id'];
	$cobra=$_POST['cobra'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

 $tecnico = new Tecnico ($cedula, $nombre, $ncargo, $fcargo, $titulo, $tipo_contrato_id, $cobra, $telefono, $correo, $id);
$tecnico->guardar();
echo "<div class=exito>DATOS DEL TECNICO ACTUALIZADO CORRECTAMENTE</div>";
}
?>
<!-- fin de actualizar-->
<!-- Datos de Registro plantel -->
<?php $datos=$_GET['id']; ?>

<?php
require_once '../../class/tecnico.class.php';
$tecnico = Tecnico::buscarPorId($datos);
if($tecnico)
{ 
?>

<form method="POST" action="actualizar.php" onsubmit="return validar()">
<table>
<tr>
	<td>
		CEDULA:
	</td>
	<td>
		<input type="hidden" name="id" value="<?php echo $tecnico->getId(); ?>">
		<input type="text" name="cedula" value="<?php echo $tecnico->getCedula(); ?>" size="15px">
	</td>
	<td>
		NOMBRES:
	</td>
	<td>
	<input type="text" name="nombre" value="<?php echo $tecnico->getNombre(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="18px">
	</td>
</tr>
<tr>
	<td>
		C. NOMINAL:
	</td>
	<td>
			<input type="text" name="ncargo" value="<?php echo $tecnico->getNcargo(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15px">
	</td>
	<td>
		C. FUNCIONAL:
	</td>
	<td>
		
			<input type="text" name="fcargo" value="<?php echo $tecnico->getFcargo(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="18px">
	</td>
</tr>

<tr>
	<td>
		TITULO:
	</td>
	<td>
		<input type="text" name="titulo" value="<?php echo $tecnico->getTitulo(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15px">
	</td>
	<td>
		COBRA EN:
	</td>
	<td>
		<input type="text" name="cobra" value="<?php echo $tecnico->getCobra(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="18px">
	</td>
</tr>
<tr>
	<td>
		TELEFONO:
	</td>
	<td>
		<input type="text" name="telefono" value="<?php echo $tecnico->getTelefono(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="15px">
	</td>
	<td>
		CORREO:
	</td>
	<td>
		<input type="text" name="correo" value="<?php echo $tecnico->getCorreo(); ?>" onKeyUp="this.value=this.value.toUpperCase();" size="18px">
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
<?php $tipo=$tecnico->getTipo_contrato_id(); ?>
<select id="tipocontrato" name="tipo_contrato_id">
 <?php foreach($tipocontrato as $item): ?>
<?php if($tipo==$item['id'])
{echo'<option  selected value="'.$item['id'].'">'.$item['descripcion'].'</option>';}
else{echo '<option   value="'.$item['id'].'">'.$item['descripcion'].'</option>';}?>
<?php endforeach; ?>
</select>
	</td>
	<td>
		<input type="hidden" name="actualizar" value="actualizar"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Actualizar">
	</td>
</tr>
</table>
</form>
<!-- Fin de Datos de Registro plantel -->
<?php } ?>
</div>

</body>
</html>
