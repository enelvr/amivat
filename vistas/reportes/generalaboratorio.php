<table border="0" width="850px">    
<tr><br>
<B>DATOS LABORATORIOS DEL PLANTEL</B>

</tr>
   <tr>
<th>N. EQUIPOS</th>
<th>OPERATIVOS</th>
<th>INOPERATIVOS</th>
<th>INTERNET</th>
<th>FILTRACIONES</th>
        </tr>
 <tr>
	    <td><?php echo $laboratorio->getEquipon(); ?></td>
<td><?php echo $laboratorio->getEquipoope(); ?></td>
 <td><?php echo $laboratorio->getEquipoino(); ?></td>
            <td><?php echo $laboratorio->getInternet(); ?></td>
 <td><?php echo $laboratorio->getFiltraciones(); ?></td>
        </tr>
</table>
<table border="0" width="850px">    
<tr><br>
<B>DATOS DE MUEBLES DEL LABORATORIO DEL PLANTEL</B>

</tr>
   <tr>
<th>MESAS EXISTENTE</th>
<th>MESAS OPERATIVAS</th>
<th>MESAS INOPERATIVAS</th>
<th>MESAS NECESARIAS</th>
<th>SILLAS EXISTENTE</th>
<th>SILLAS OPERATIVAS</th>
<th>SILLAS INOPERATIVAS</th>
<th>SILLAS NECESARIAS</th>
<th>AIRES</th>
<th>AIRES POR REPARAR</th>
        </tr>
 <tr>
	    <td><?php echo $laboratorio->getMesasexistente(); ?></td>
<td><?php echo $laboratorio->getMesasbuena(); ?></td>
 <td><?php echo $laboratorio->getMesasmala(); ?></td>
            <td><?php echo $laboratorio->getMesasnec(); ?></td>
 <td><?php echo $laboratorio->getNsillas(); ?></td>
<td><?php echo $laboratorio->getSillasbuen(); ?></td>
 <td><?php echo $laboratorio->getSillasmalas(); ?></td>
            <td><?php echo $laboratorio->getSillasnecesarias(); ?></td>
<td><?php echo $laboratorio->getAiresbuenos(); ?></td>
            <td><?php echo $laboratorio->getAiresrep(); ?></td>
        </tr>
</table>
<table border="0" width="850px">    
<tr><br>
<B>DATOS DE ELECTRICIDAD E ILUMINACION DEL LABORATORIO</B>

</tr>
   <tr>
<th>CUENTA CON ELECTRICIDAD</th>
<th>REQUIERE REPARAR CABLEADO ELECTRICO</th>
<th>CUENTA CON ILUMINACI&Oacute;N</th>
<th>REQUIERE SUSTITUCION DE LUCES O LAMPARAS</th>
        </tr>
 <tr>
	    <td><?php echo $laboratorio->getElectricidadbuena(); ?></td>
<td><?php echo $laboratorio->getElectricidadrep(); ?></td>
 <td><?php echo $laboratorio->getIluminacionbuena(); ?></td>
            <td><?php echo $laboratorio->getIluminacionrep(); ?></td>
        </tr>
</table>
