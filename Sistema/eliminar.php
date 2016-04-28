<?php

include("Librerias.php");


$x=$_POST[casilla];


foreach ($x as $value)
{
	$consulta="SELECT num_mant FROM chuto WHERE placal_chuto= '$value'";
	$res=consultar($consulta);
	$fila=mysql_fetch_array($res);
	$num_mant=$fila[num_mant];
	$num_mant=$num_mant+1;
							
	$act="UPDATE chuto SET km_recorridos='0',num_mant='$num_mant' WHERE placal_chuto= '$value'";
	actualizar_bd($act);

}
header('Location: Mantenimiento.php');
?>

