<table border="0" width="850px">
<tr><br>
<B>EQUIPOS DE COMPUTO DEL LABORATORIO</B>

</tr>
<tr>
<th>TECNICO</th>
<th>ESTATUS</th>
<th>SERIAL</th>
<th>MARCA</th>
<th>SISTEMA</th>
<th>DISCO</th>
<th>MEMORIA</th>
<th>PROCESADOR</th>
<th>SOPORTE</th>
        </tr>
 
 <?php foreach($equipo as $item): ?>
<tr>
<td>

<?php
$busqueda=$item['tecnico_id'];
require_once 'class/tecnico.class.php';
$tecnico = Tecnico::buscarPorId($busqueda);
echo $tecnico->getNombre();
?>
</td>
<td><?php
$busqueda=$item['estatus_id'];
require_once 'class/estatus.class.php';
$estatus = Estatus::buscarPorId($busqueda);
echo $estatus->getDescripcion();
?></td>
<td><?php echo $item['serial']?></td>
<td><?php echo $item['marca']?></td>
<td><?php echo $item['sistema']?></td>
<td><?php echo $item['disco']?></td>
<td><?php echo $item['memoria']?></td>
<td><?php echo $item['procesador']?></td>
<td><?php echo $item['soporte']?></td>
</tr>
 <?php endforeach; ?>

</table>
