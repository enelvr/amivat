<table border="0" width="850px">    
<tr><br>
<B>DATOS DEL JEFE(A) DE LA DIVISION</B>
</tr>
   <tr>
<th>JEFE DE LA DIVISION</th>
<th>FIRMA Y SELLO</th>
<th>C&Eacute;DULA.</th>
<th>TELEFONO</th>
<th>CORREO ELECTRONICO</th>
        </tr>
 <tr>
	    <td><?php echo $director->getNombre(); ?></td>
<td></td>
 <td><?php echo $director->getCedula(); ?></td>
 <td><?php echo $director->getTlf(); ?></td>
            <td><?php echo $director->getCorreo(); ?></td>
        </tr>
</table>

