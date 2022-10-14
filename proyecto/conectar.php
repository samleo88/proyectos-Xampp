<?php
$host="localhost";
$user="root";
$pw="1234";
$db="prestaciones";

mysql_connect("localhost", "root", "1234") OR DIE("error al conectarse con la tabla");
@mysql_query("SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
mysql_select_db("prestaciones")OR DIE("No ha sido posible conectar a la Base de Datos");
?>
