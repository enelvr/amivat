<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from monitor",$cn);
?>

 <script type="text/javascript" language="javascript" src="js/jslistadomonitor.js"></script>
<h3>LISTADO DE MONITORES</h3>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_monitor">
                <thead>
                    <tr>
                        <th>ID</th><!--Estado-->
                        <th>SERIAL</th>
			<th>MARCA</th>
			<th>PULGADAS</th>
			
			<th>OPCIONES</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>  <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
			<th></th>
			
                    </tr>
                </tfoot>


                  <tbody>
                    <?php	
     
                   while($reg=  mysql_fetch_array($listado))
                   {
                               echo '<tr>';
                               echo '<td >'.mb_convert_encoding($reg['id'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['serial'], "iso-8859-1").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['marca'], "UTF-8").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['pulgadas'], "UTF-8").'</td>';
			


       echo '<td>
<a href="vistas/monitor/detalles.php?id='.$reg['id'].'" class="icono_txt mostrar"onclick="$(this).modal({width:650, height:330}).open(); return false;">Detalles</a>
<a href="vistas/monitor/actualizar.php?id='.$reg['id'].'" class="icono_txt editar" onclick="$(this).modal({width:650, height:330}).open(); return false;"

>editar</a></td>';
                     		                     
       echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/ventana.min.js"></script>
