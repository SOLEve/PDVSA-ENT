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
	header("content-disposition: attachment;filename=Reporte_CICENT_Viajes_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>

<body>

	<table style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:20px;top:80px;width: 100%; height: 15">
  		<caption>
  			<h4>Reporte de Viajes</h4>
  		</caption>
  		<thead>
    		<tr>
      		<th style="text-align: center;">Fecha</th>
      		<th style="text-align: center;">Cantidad de Viajes</th>
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
												
												
												$consulta = "SELECT fecha_viaje, 
															COUNT(*) as cant1 
															FROM viajes 
															WHERE fecha_viaje BETWEEN '$fecha1' AND '$fecha2' 
															GROUP BY fecha_viaje";
												
												$res=consultar($consulta);
												while($row=mysql_fetch_array($res))
												{
													$consulta1 = "SELECT COUNT(*) as cant1 
																FROM viajes2 
																WHERE fecha_viaje ='$row[fecha_viaje]'";
													
													$res1=consultar($consulta1);
													$row1=mysql_fetch_array($res1);
													$alarma1=$row1[0];
														
													$consulta1 = "SELECT COUNT(*) as cant1 
																FROM viajes3 
																WHERE fecha_viaje ='$row[fecha_viaje]'";								
													$res1=consultar($consulta1);
													$row1=mysql_fetch_array($res1);
													$alarma2=$row1[0];	
														
													$alarmas=$alarma1+$alarma2;
														echo " <tr>
														<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[fecha_viaje] </td>
														<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[cant1] 		</td>
														<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$alarmas 			</td>
														</tr>";
													
													
												}
					?>
  							</tbody>
						</table>


</body>
</html>
