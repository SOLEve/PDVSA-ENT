<?php 
	session_start(); 
	include("Librerias.php");
	$consulta="SELECT placal_chuto FROM chuto ";
	$res=consultar($consulta);
	while($row=mysql_fetch_array($res))
	{
		$placa=$row[placal_chuto];
		mkdir("fotos_chutos/".$row[placal_chuto]);
		$destino = "fotos_chutos/".$row[placal_chuto]."/no_image.jpg";
		$ruta="fotos_chutos/no_image.jpg";
		copy($ruta,$destino);
		mysql_query("UPDATE chuto SET foto_chuto='$destino' WHERE placal_chuto='$placa'");
	}													
?>
				
