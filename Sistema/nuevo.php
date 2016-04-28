<?php
	include("Librerias.php");	

	/*$resultado=$mysqli->query("SELECT nombre FROM conductor");
	while ($fila = $resultado->fetch_assoc()) 
	{
		echo " id = " . $fila['nombre'] . "<br>";
	}*/
	
	$result = 
	
	$consulta = "SELECT placal_chuto FROM chuto WHERE placal_chuto = '012'";
	$link = conectar1();
	if ($sentencia = mysqli_prepare($link, $consulta)) 
	{

		/* ejecutar la consulta */
		mysqli_stmt_execute($sentencia);

		/* almacenar el resultado */
		mysqli_stmt_store_result($sentencia);

		$número_chutos = mysqli_stmt_num_rows($sentencia);

		/* cerrar la sentencia */
		mysqli_stmt_close($sentencia);
		mysqli_close ( $link );
	}
	
	echo "".$número_chutos;
			

	
?>
