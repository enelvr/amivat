<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from plantel where tipoplantel_id=1",$cn);
?>

 <script type="text/javascript" language="javascript" src="js/jslistadodivisiones.js"></script>

<div class="nnuevo">
<a href="divisionesnuevo.php" class="icono_txt agregar">Nuevo</a>
</div>
<h3>LISTADO DE DIVISIONES</h3>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_divisiones">
                <thead>
                    <tr>
                        <th>ID</th><!--Estado-->
                        <th>DIVISIONES</th>
			<th>TELEFONO</th>
			<th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>  <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>


                  <tbody>
                    <?php
require_once("../libs/usuario.php");
					$tipouser=new Login();
					$row=$tipouser->autenticar();	
     
                   while($reg=  mysql_fetch_array($listado))
                   {
                               echo '<tr>';
                               echo '<td >'.mb_convert_encoding($reg['id'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['nombreplantel'], "iso-8859-1").'</td>';
				 echo '<td>'.mb_convert_encoding($reg['tlfplantel'], "UTF-8").'</td>';


       echo '<td><a href="vistas/jdivision/nuevo.php?id='.$reg['id'].'" class="icono_txt mostrar"onclick="$(this).modal({width:650, height:330}).open(); return false;">Jefe</a><a href="vistas/divisiones/actualizar.php?id='.$reg['id'].'" class="icono_txt editar" onclick="$(this).modal({width:650, height:330}).open(); return false;"

>editar</a>
<a href="vistas/equipo/nuevo.php?id='.$reg['id'].'&d='.$reg['tipoplantel_id'].'" class="icono_txt equipo"onclick="$(this).modal({width:650, height:330}).open(); return false;">Equipo</a>
<a href="plandiv.php?id='.$reg['id'].'&ofi=2" class="icono_txt planilla">Planilla</a>
</td>';
                     		                     
       echo '</tr>';
                 
                        }
                    ?>
                <tbody>
            </table>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/ventana.min.js"></script>
