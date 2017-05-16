
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
            <a class="btn" href="#" id="b_user_list">Datos Laboratorio</a>
         </div>
      </div>
   </div>
<div class="rounded" id="div_datos_generales">
<?php if (isset($_POST["actualizado"]) and $_POST["actualizado"]=="actualizado")
{?>
<?php
	 require_once '../../class/laboratorio.class.php';
$id=$_POST['id'];
	$plantel_id=$_POST['plantel'];
$fecha=$_POST['fecha'];
$equipon=$_POST['equipon'];
$equipoope=$_POST['equipoope'];
$equipoino=$_POST['equipoino'];
$internet=$_POST['internet'];
$mesasexistente=$_POST['mesasexistente'];
$mesasbuena=$_POST['mesasbuena'];
$mesasmala=$_POST['mesasmala'];
$mesasnec=$_POST['mesasnec'];
$nsillas=$_POST['nsillas'];
$sillasbuen=$_POST['sillasbuen'];
$sillasmalas=$_POST['sillasmalas'];
$sillasnecesarias=$_POST['sillasnecesarias'];
$electricidadbuena=$_POST['electricidadbuena'];
$electricidadrep=$_POST['electricidadrep'];
$airesbuenos=$_POST['airesbuenos'];
$airesrep=$_POST['airesrep'];
$iluminacionbuena=$_POST['iluminacionbuena'];
$iluminacionrep=$_POST['iluminacionrep'];
$filtraciones=$_POST['filtraciones'];

$laboratorio = new Laboratorio ($plantel_id, $equipon, $equipoope, $equipoino, $internet, $mesasexistente, $mesasbuena, $mesasmala, $mesasnec, $nsillas, $sillasbuen, $sillasmalas, $sillasnecesarias, $electricidadbuena, $electricidadrep, $airesbuenos, $airesrep, $iluminacionbuena, $iluminacionrep, $filtraciones, $fecha, $id);
$laboratorio->guardar();
echo "<div class=exito>DATOS LABORATORIO ACTUALIZADO CORRECTAMENTE</div>";
 }

?>
<?php
require_once '../../class/laboratorio.class.php';
$laboratorio = Laboratorio::buscarPorI($_POST['id']);
if($laboratorio)
{
?>
<form method="POST" action="actualizar.php">

<table>
<tr>
	<td>
		NUMERO DE EQUIPOS:
	</td>
	<td>
<?php
	$dia=date("d");
	
	$mes=date("m");
	
       $annio=date("Y");
	
$valor=$annio."-".$mes."-".$dia;
?>
<input type="hidden" id="id" name="id" value="<?php echo $laboratorio->getId(); ?>"> 
<input type="hidden" id="fecha" name="fecha" value="<?php echo $valor; ?>"> 	
<input type="hidden" id="plantel" name="plantel" value="<?php echo $laboratorio->getPlantel_id(); ?>"><input type="number" min="1" max="20" id="equipon" name="equipon" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getEquipon(); ?>">
	</td>
	<td>
		EQUIPOS OPERATIVOS:
	</td>
	<td>
		<input class="equipoope" type="number" min="0" max="20" id="equipoope" name="equipoope" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getEquipoope(); ?>">
	</td>
</tr>
<tr>
	<td>
		EQUIPOS INOPERATIVOS:
	</td>
	<td>
		<input class="equipoino" type="number" min="0" max="20" id="equipoino" name="equipoino" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getEquipoino(); ?>"></td>
	<td>
		CUENTA CON INTERNET:
	</td>
	<td>
<?php $inter=$laboratorio->getInternet(); ?>
		<select id="internet" name="internet">
<?php if ($inter == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($inter == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
<?php if ($inter == "REHABILITAR" ) {echo ' <option selected value="REHABILITAR">RH</option>';}else {echo '  <option  value="REHABILITAR">RH</option>';}?>
</select>
	</td>
</tr>
<tr>
	<td>
	MESAS EXISTENTE:
	</td>
	<td>
	<input class="mesasexistente" type="number" min="0" max="20" id="mesasexistente" name="mesasexistente" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getMesasexistente(); ?>">
	</td>
	<td>
	MESAS OPERATIVAS
	</td>
	<td>
	<input class="mesasbuena" type="number" min="0" max="20" id="mesasbuena" name="mesasbuena" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getMesasbuena(); ?>">
	</td>
</tr>
<tr>
	<td>
	MESAS INOPERATIVAS:
	</td>

	<td>
		<input class="mesasmala" type="number" min="0" max="20" id="mesasmala" name="mesasmala" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getMesasmala(); ?>">
	</td>
	<td>
	MESAS NECESARIAS:
	</td>
	<td><input class="mesasnec" type="number" id="mesasnec" name="mesasnec" min="0" max="20" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getMesasnec(); ?>">
	</td>
</tr>
<tr>
	<td>
	SILLAS EXISTENTE:
	</td>
	<td>
	<input class="nsillas" type="number" min="0" max="20" id="nsillas" name="nsillas" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getNsillas(); ?>">
	</td>
	<td>
	SILLAS OPERATIVAS:
	</td>
	<td>
	<input class="sillasbuen" type="number" min="0" max="20" id="sillasbuen" name="sillasbuen" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getSillasbuen(); ?>">
	</td>
</tr>
<tr>
	<td>
	SILLAS INOPERATIVAS:
	</td>
	<td>
	<input class="sillasmalas" type="number" min="0" max="20" id="sillasmalas" name="sillasmalas" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getSillasmalas(); ?>">
	</td>
	<td>
	SILLAS NECESARIAS:
	</td>
	<td>
	<input class="sillasnecesarias" type="number" min="0" max="20" id="sillasnecesarias" name="sillasnecesarias" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getSillasnecesarias(); ?>">
	</td>
</tr>
<tr>
	<td>
	ELECTRICIDAD:
	</td>
	<td>
	<?php $elecb=$laboratorio->getElectricidadbuena(); ?>
	<select id="electricidadbuena" name="electricidadbuena">
<?php if ($elecb == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($elecb == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
</select>
	</td>
	<td>
	ELECTRICIDAD REP:
	</td>
	<td>
<?php $elecm=$laboratorio->getElectricidadrep(); ?>
	<select id="electricidadrep" name="electricidadrep">
<?php if ($elecm == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($elecm == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
</select>
	</td>
</tr>
<tr>
	<td>
	ILUMINACION:
	</td>
	<td>
<?php $ilum=$laboratorio->getIluminacionbuena(); ?>
	<select id="iluminacionbuena" name="iluminacionbuena">
<?php if ($ilum == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($ilum == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
</select>
	</td>
	<td>
	ILUMINACION REP:
	</td>
	<td>
	<?php $ilumm=$laboratorio->getIluminacionrep(); ?>
	<select id="iluminacionrep" name="iluminacionrep">
<?php if ($ilumm == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($ilumm == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
</select>
	</td>
</tr>
<tr>
	<td>
	AIRES EXISTENTE:
	</td>
	<td>
	<input class="airesbuenos" type="number" min="0" max="6" id="airesbuenos" name="airesbuenos" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getAiresbuenos(); ?>">
	</td>
	<td>
	AIRES INOPERATIVOS:
	</td>
	<td>
	<input class="airesrep" type="number" min="0" max="6" id="airesrep" name="airesrep" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $laboratorio->getAiresrep(); ?>">
	</td>
</tr>
<tr>
<td>
FILTRACIONES:
</td>
<td>
<?php $filtra=$laboratorio->getFiltraciones(); ?>
<select id="filtraciones" name="filtraciones">
<?php if ($filtra == "SI" ) {echo '  <option  selected value="SI">SI</option>';} else {echo '  <option   value="SI">SI</option>';}?>
   <?php if ($filtra == "NO" ) {echo ' <option selected value="NO">NO</option>';}else {echo '  <option  value="NO">NO</option>';}?>
</select>
</td>
</tr>
<tr>

	<td>
		<input type="hidden" name="actualizado" value="actualizado"/>
		<input class="submit" type="submit" onClick="validaForm()" value="Guardar">
	</td>
</tr>

</table>
</form>
<?php } ?>
</div>

</body>
</html>


