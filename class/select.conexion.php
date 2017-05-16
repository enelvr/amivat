<?php
function conectar()
{
	mysql_connect("localhost", "root", "19415101");
	mysql_select_db("awminvatzep");
}

function desconectar()
{
	mysql_close();
}
?>
