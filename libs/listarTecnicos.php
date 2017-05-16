<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from tecnico",$cn);
?>

 <script type="text/javascript" language="javascript" src="js/jslistadotecnicos.js"></script>
<div class="nnuevo">
<a href="vistas/tecnicos/nuevo.php" class="icono_txt agregar"onclick="$(this).modal({width:650, height:330}).open(); return false;">Nuevo</a>
</div>
<h3>LISTADO DE TECNICOS</h3>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_tecnicos">
                <thead>
                    <tr>
                        <th>ID</th><!--Estado-->
                        <th>CEDULA</th>
			<th>TITULO PROFESIONAL</th>
			<th>NOMBRE Y APELLIDO</th>
			<th>CARGO FUNCIONAL</th>
			<th>OPCIONES</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>  <th></th>
                        <th></th>
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
                               echo '<td>'.mb_convert_encoding($reg['cedula'], "iso-8859-1").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['titulo'], "UTF-8").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['nombre'], "UTF-8").'</td>';
				echo '<td>'.mb_convert_encoding($reg['fcargo'], "UTF-8").'</td>';
			


       echo '<td>
<a href="vistas/tecnicos/detalles.php?id='.$reg['id'].'" class="icono_txt mostrar"onclick="$(this).modal({width:650, height:330}).open(); return false;">Detalles</a>
<a href="vistas/tecnicos/actualizar.php?id='.$reg['id'].'" class="icono_txt editar" onclick="$(this).modal({width:650, height:330}).open(); return false;"

>editar</a></td>';
                     		                     
       echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/ventana.min.js"></script>
