<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from plantel where tipoplantel_id!=1",$cn);

?>

 <script type="text/javascript" language="javascript" src="js/jslistadoplantel.js"></script>

<div class="nnuevo">
<a href="plantelnuevo.php" class="icono_txt agregar">Nuevo</a>
</div><h3>LISTADO DE PLANTELES</h3>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_plantel">
                <thead>
                    <tr>
                        <th>ID</th><!--Estado-->
                        <th>PLANTELES</th>
			<th>CODIGO DEA</th>
			<th>DIRECCION</th>
			
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
                               echo '<td>'.mb_convert_encoding($reg['nombreplantel'], "iso-8859-1").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['dea'], "UTF-8").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['direccion'], "UTF-8").'</td>';
			


       echo '<td>
<a href="vistas/plantel/detalles.php?id='.$reg['id'].'" class="icono_txt mostrar"onclick="$(this).modal({width:650, height:330}).open(); return false;">Detalles</a>
<a href="vistas/director/nuevo.php?id='.$reg['id'].'" class="icono_txt director"onclick="$(this).modal({width:650, height:330}).open(); return false;">Director</a>
<a href="vistas/laboratorio/nuevo.php?id='.$reg['id'].'" class="icono_txt lab"onclick="$(this).modal({width:720, height:480}).open(); return false;">Lab.</a>
<a href="vistas/equipo/nuevo.php?id='.$reg['id'].'&d='.$reg['tipoplantel_id'].'" class="icono_txt equipo"onclick="$(this).modal({width:650, height:330}).open(); return false;">Equipo.</a><a href="vistas/plantel/actualizar.php?id='.$reg['id'].'" class="icono_txt editar" onclick="$(this).modal({width:650, height:330}).open(); return false;"

>editar</a>
<a href="planilla.php?id='.$reg['id'].'&lab=1&ofi=2" class="icono_txt planilla">Planilla</a>

</td>';
                     		                     
       echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/ventana.min.js"></script>
