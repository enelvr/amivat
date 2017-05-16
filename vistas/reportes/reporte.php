<!DOCTYPE html>
<html lang="es">
    <head>
        <title>APLICACION WEB PARA EL MANTENIMIENTO E INVENTARIO DE LAS AREAS TECNOLOGICAS EN LA ZONA EDUCATIVA Y SUS PLANTELES</title>
        <meta charset="utf-8">
    <script type="text/javascript" src="js/tcal.js"></script> 
  <link rel="stylesheet" href="css/tablas2.css">
    </head>
    <body>
<form id="imprimir" method="POST" action="reporte.php"><BR>

	Desde <input class="tcal" type="text" name="fecha" size="15px" required> 
	Hasta <input class="tcal" type="text" name="dfecha" size="15px" required>
	<input type="hidden" name="consulta" value="consulta"/>
        <input type="submit" id="submit" value="Mostrar">
</form>
<?php if (isset($_POST["consulta"]) and $_POST["consulta"]=="consulta")
{

?><BR>
<div align="center">


<BR>
<table border="0" width="850px">
<tr>
</tr>
                    <tr>
			<th width="225px">Fechas de Visitas</th>
                  	 <th width="625px">PLANTELES VISITADOS</th>
                   
		
                    </tr>



<?php
require_once 'class/vplantel.class.php';
 $vplantel = Vplantel::buscarPorFechas($_POST['fecha'],$_POST['dfecha'],1);
if($vplantel)
{?>
 <?php foreach($vplantel as $item):
 $countepla =count($item['fecha'])+$countepla;
echo "<tr><td align=center>";
$fch=$item['fecha'];
$fcha=date("d-m-Y",strtotime($fch));
echo $fcha;
echo "</td>";
echo "<td align=center>";
$infoplantel=$item['tipoplantel_id'];
require_once 'class/plantel.class.php';
$plantel = Plantel::buscarPorI($infoplantel);

echo $plantel->getNombreplantel();
echo "</td></tr>";
endforeach;
 }
else{

echo "<p>0</p>";
}?>
</table><br>
<table border="0" width="850px">


                    <tr>
                        <th width="150px">PLANTELES REGISTRADO</th><!--Estado-->
                       <th width="150px">CPU OPERATIVOS</th>
			<th width="150px">IMPRESORAS OPERATIVAS</th>
			<th width="150px">MONITORES OPERATIVOS</th>
		
                    </tr>
   
<tr>
<td align="center">
<?php
require_once 'class/plantel.class.php';

 $plantel = Plantel::buscarPorFechas($_POST['fecha'],$_POST['dfecha']);
if($plantel)
{?>
 <?php foreach($plantel as $item):
 $countplan =count($item['codest'])+$countplan;
endforeach;
echo $countplan;
 }
else{

echo "<p>no hay registro</p>";
}


 ?>
</td>
<td align="center"><?php
require_once 'class/requipo.class.php';

 $requipo = Requipo::buscarPorFechas($_POST['fecha'],$_POST['dfecha']);
$countequ="0";
foreach($requipo as $item):
$n=$item['estatus_id'];
if($n=="1"){
 $countequ =count($item['fecha'])+$countequ;
}
endforeach;
echo $countequ;
?></td>
<td align="center">
<?php
require_once 'class/rimpresora.class.php';

 $rimpresora = Rimpresora::buscarPorFechas($_POST['fecha'],$_POST['dfecha']);
$countimpre="0";
foreach($rimpresora as $item):
$in=$item['estatus_id'];
if($in=="1"){
 $countimpre =count($item['fecha'])+$countimpre;
}
endforeach;
echo $countimpre;
 ?>

</td>
<td align="center">
<?php
require_once 'class/rmonitor.class.php';
$countmoni="0";
 $rmonitor = Rmonitor::buscarPorFechas($_POST['fecha'],$_POST['dfecha']);

foreach($rmonitor as $item):
$im=$item['estatus_id'];
if($im=="1"){
 $countmoni =count($item['fecha'])+$countmoni;
}
endforeach;
echo $countmoni;
?>

</td>
</tr>
</table>
<table border="0" width="850px">
<tr>
</tr>
                    <tr>
			
                  	 <th width="150px">VISITAS A PLANTELES</th>
                       <th width="150px">CPU INOPERATIVOS</th>
			<th width="150px">IMPRESORAS INOPERATIVAS</th>
			<th width="150px">MONITORES INOPERATIVOS</th>
		
                    </tr>

<tr>
<td align="center"><?php echo $countepla;?></td>
<td align="center">
<?php
 $requipo = Requipo::buscarPorFechass($_POST['fecha'],$_POST['dfecha'],1);
$counteque ="0";
foreach($requipo as $item):
$eq=$item['estatus_id'];
if($eq!="1"){
 $counteque =count($item['fecha'])+$counteque;
}
endforeach;
echo $counteque;
?>
</td>
<td align="center">
<?php
 $rimpresora = Rimpresora::buscarPorFechass($_POST['fecha'],$_POST['dfecha'],1);
$countimprei="0";
foreach($rimpresora as $item):
$mi=$item['estatus_id'];
if($mi!="1"){
 $countimprei =count($item['fecha'])+$countimprei;
}
endforeach;
echo $countimprei;
?>

</td>
<td align="center">
<?php


 $rmonitor = Rmonitor::buscarPorFechass($_POST['fecha'],$_POST['dfecha'],1);
$countmonim="0";
foreach($rmonitor as $item):
$mo=$item['estatus_id'];
if($mo!="1"){
 $countmonim =count($item['fecha'])+$countmonim;
}
endforeach;
echo $countmonim;
?>

</td>
</tr>
</table>
<?php }?>
<div align="center">
<form id="form1" name="form1" method="post" action=""><br><br>
<label>
<input type="button" name="imprimir" id="imprimir" value="Imprimir" onClick="window.print();" />
</label>
</form>


</div>
</body>
</html>
