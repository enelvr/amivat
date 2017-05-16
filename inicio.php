<?php
require_once("libs/usuario.php");
if (isset($_POST["sisvent"]) and $_POST["sisvent"]=="enel")
{
$login=new Login();
$login->logueo();
exit();
}
?>

<?php
require_once("libs/usuario.php");
if(isset($_SESSION["awminvatzep"]))
{
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>APLICACION WEB PARA EL MANTENIMIENTO E INVENTARIO DE LAS AREAS TECNOLOGICAS EN LA ZONA EDUCATIVA Y SUS PLANTELES</title>
        <meta charset="utf-8">
        <link href="css/ventana.css" type="text/css" rel="stylesheet" />
	 <link href="css/menu.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/plantel.js"></script>
        <link type="text/css" href="css/estilo.css" rel="stylesheet" />
     	<link type="text/css" href="css/sclain.css" rel="stylesheet" />
        <link type="text/css" href="css/tablas.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="js/jquery.datasclain.js"></script>
       
    </head>
    <body>
<div id="contenedor">
<img src="images/barra.png">
    <header id="encabezado">
    </header>
<div class="titulo">
<?php require_once("libs/usuario.php");
					$tipouser=new Login();
					$row=$tipouser->autenticar();	
if($row["tipo_usuario_id"]=="1")
{
include("includes/menu.php");
 }
if($row["tipo_usuario_id"]!="1")
{
echo "
	<script type='text/javascript'>
	alert('Debe loguearse primero para tener acceso');
	window.location='index.php';
	</script>
	";
 }
?>
    <article id="contenido">
    </article>
    <footer>
        Desarrollado por <a target="_blank"href="creditos.php">T.S.U. Enel Villafranca</a> en la División de Informática y Sistemas
    </footer>
</div>
</body>
</html>


<?php
}else{
	echo "
	<script type='text/javascript'>
	alert('Debe loguearse primero para tener acceso');
	window.location='index.php';
	</script>
	";
}
?>
