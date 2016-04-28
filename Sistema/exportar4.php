 <?php
	session_start(); 
		include("Librerias.php");

	function cambiarfecha_mysql($fecha)
	{    list($dia,$mes,$ano)=explode("/",$fecha);
		$fecha="$ano-$mes-$dia";
		return $fecha;
	}
	error_reporting(E_ALL ^ E_NOTICE);
	require_once 'excel_reader2.php';

	header("Content-Type: application/vnd.ms-excel");

	header("Expires: 0");

	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	date_default_timezone_set('America/Caracas');
	$fecha_actual = localtime(time(),1);
	$anyo_actual = $fecha_actual['tm_year'] + 1900;
	$mes_actual = $fecha_actual['tm_mon'] + 1;
	$dia_actual = $fecha_actual['tm_mday'];
	$hora_actual = $fecha_actual['tm_hour'];
	$minuto_actual = $fecha_actual['tm_min'];
	header("content-disposition: attachment;filename=Reporte_CICENT_Conductores_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>

<body>

	<table style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:20px;top:80px;width: 100%; height: 15">
  		<caption>
  			<h4>Reporte de Conductores</h4>
  		</caption>
  		<thead>
    		<tr>
      			<th style="text-align: center;">Cedula</th>
      			<th style="text-align: center;">Nombre</th>
      			<th style="text-align: center;">Apellido</th>
				<th style="text-align: center;">Alarmas Velocidad</th>
				<th style="text-align: center;">Cantidad de Viajes</th>
				<th style="text-align: center;">Promedio de Viajes/Días</th>
				<th style="text-align: center;">Km Recorridos</th>
    		</tr>
  		</thead>
  		<tbody>
			<?php
			$fecha1= $_GET["fecha1"];
			$fecha2= $_GET["fecha2"];
			$fecha3= $_GET["fecha1"];
			$fecha4= $_GET["fecha2"];
						
			if($fecha1>$fecha2)
			{
				$fecha1=$_GET["fecha2"];
				$fecha2=$_GET["fecha1"];
											
				$fecha3=$_GET["fecha2"];
				$fecha4=$_GET["fecha1"];
			}

			list($year, $month, $day) = explode("-", $fecha3);
			$fecha3 = mktime(0, 0, 0, $month, $day, $year);
			list($year, $month, $day) = explode("-", $fecha4);
			$fecha4 = mktime(0, 0, 0, $month, $day, $year);
			$totalDays = (($fecha4 - $fecha3)/(60 * 60 * 24))+1;
											
			echo"<p style=\"position:absolute;left:20px;top:80px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
													
			$consulta = "SELECT id_conductor,nombre,apellido
						FROM conductor
						ORDER BY id_conductor";				
			$res=consultar($consulta);
													
			while($row=mysql_fetch_array($res))
			{
				$consulta1 = "SELECT COUNT(*) AS cant1 FROM viajes2 WHERE  CH_CD_Conductor_ID_Conductor='$row[id_conductor]' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res1=consultar1($consulta1);
				$fila1=mysqli_fetch_row($res1);
						
				$consulta2 = "SELECT COUNT(*) AS cant2 FROM viajes WHERE Conductor_ID_Conductor='$row[id_conductor]' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res2=consultar1($consulta2);
				$fila2=mysqli_fetch_row($res2);
														
				$consulta3 = "SELECT SUM(km_cond) as km_total FROM km_cond WHERE conductor_id_conductor='$row[id_conductor]' AND fecha_km BETWEEN '$fecha1' AND '$fecha2'";
				$res3=consultar1($consulta3);
				$fila3=mysqli_fetch_row($res3);
														
				$consulta4 = "SELECT COUNT(*) AS cant1 FROM viajes3 WHERE  V_ID_Conductor='$row[id_conductor]' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res4=consultar1($consulta4);
				$fila4=mysqli_fetch_row($res4);
														
				$promedio = $fila2[0]/$totalDays;		
				$promedio = number_format($promedio, 2, ",", ".");  
														
				if($fila2[0]>0)
				{
					echo " <tr>
							<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[id_conductor]</td>
							<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[nombre] 		</td>
							<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[apellido]	</td>";
															
					$alarmas=$fila1[0]+$fila4[0];
					if($alarmas>0)
					{
						echo"<td bgcolor=\"fd5b3b\" style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$alarmas</td>";
					}
					else
					{
						echo"<td   style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >
								$alarmas
							</td>";
					}
																					
					$km = number_format($fila3[0], 2, ",", "."); 
														
					echo" 	<td   style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\"  >$fila2[0]	</td>
							<td   style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\"  >$promedio		</td>
							<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >	$km</td>							
							</tr>";
				}
												
			}
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
			$consulta = "SELECT id_conductor,nombre,apellido
						FROM conductor
						ORDER BY id_conductor";
			$res=consultar($consulta);
			
			while($row=mysql_fetch_array($res))
			{
				$consulta1 = "SELECT COUNT(*) AS cant1 FROM viajes2 WHERE  CH_CD_Conductor_ID_Conductor='$row[id_conductor]' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res1=consultar1($consulta1);
				$fila1=mysqli_fetch_row($res1);
														
				$consulta2 = "SELECT COUNT(*) AS cant2 FROM viajes WHERE Conductor_ID_Conductor='$row[id_conductor]' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res2=consultar1($consulta2);
				$fila2=mysqli_fetch_row($res2);
														
				if($fila1[0]==0 && $fila2[0]==0)
				{
					echo " <tr>
							<td style=\"text-align: center;\" >$row[id_conductor] 		</td>
							<td style=\"text-align: center;\" >$row[nombre] 			</td>
							<td style=\"text-align: center;\" >$row[apellido]			</td>
							<td style=\"text-align: center;\" >$fila1[0]		 	</td>
							<td style=\"text-align: center;\" >$fila2[0]			</td>
							<td style=\"text-align: center;\" >$fila2[0]			</td>
							<td style=\"text-align: center;\" >	0	</td>
							 </tr>";
				}
														
			}
													
				$consulta3 = "SELECT SUM(distancia_cli) as km_total FROM viajes INNER JOIN cliente WHERE  cliente_id_cli = id_cli AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
				$res3=consultar1($consulta3);
				$fila3=mysqli_fetch_row($res3);
				$promedio = number_format($fila3[0], 2, ",", ".");  
				echo "<br> <br> <h5 style=\"position:absolute;left:700px;top:20px;width:1040px;height:950px;z-index:40;overflow:auto;\">Total de km recorridos ".$promedio." </h5>";
			?>
  							</tbody>
						</table>


</body>
</html>
