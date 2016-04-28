 <?php
	session_start(); 
	include("Librerias.php");

	function cambiarfecha_mysql($fecha)
	{   
		list($dia,$mes,$ano)=explode("/",$fecha);
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
	header("content-disposition: attachment;filename=Reporte_CICENT_Chutos_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>

	<body>
		<div class="control-group">
            <table class="table" border="1" style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15">
  				<caption>
  					<h4>Reporte de Chutos</h4>
  				</caption>
  				<thead>
					<tr>
      					<th style="text-align: center;">Placa</th>
      					<th style="text-align: center;">Cantidad de Alarmas</th>
      					<th style="text-align: center;">Cantidad de Viajes</th>
						<th style="text-align: center;">Cantidad de Mantenimientos</th>
    				</tr>
  				</thead>
  				<tbody>
						<?php
								$fecha1=$_GET["fecha1"];
								$fecha2=$_GET["fecha2"];
								
								$fecha3=$_GET["fecha1"];
								$fecha4=$_GET["fecha2"];
								
								if($fecha1>$fecha2)
								{
									$fecha1=$_POST["inputFecha2"];
									$fecha2=$_GET["fecha2"];
													
									$fecha3=$_GET["fecha2"];
									$fecha4=$_GET["fecha1"];
								}		
								
								$consulta = "SELECT v1_placal_chuto,COUNT(*) AS cant1 
											FROM viajes 
											WHERE fecha_viaje 
											BETWEEN '$fecha1' AND '$fecha2' 
											GROUP BY v1_placal_chuto";
								$res=consultar($consulta);
								$cont=0;
								while($row=mysql_fetch_array($res))
								{
									if($cont>0)
									{
										
										$consulta2 = "SELECT COUNT(*) AS alarmas 
													 FROM viajes2 WHERE CH_CD_Chuto_Placal_Chuto='$row[v1_placal_chuto]'  
													 AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'";
										$res2=consultar($consulta2);
										$fila2=mysql_fetch_array($res2);
											
										$consulta3 = "SELECT num_mant FROM chuto WHERE placal_chuto='$row[v1_placal_chuto]'";
										$res3=consultar($consulta3);
										$fila3=mysql_fetch_array($res3);
											
										echo " <tr>
												<td style=\"text-align: center;\" >$row[v1_placal_chuto] 	</td>
												<td style=\"text-align: center;\" >$row[cant1] 		</td>
												<td style=\"text-align: center;\" >$fila2[alarmas]		</td>
												<td style=\"text-align: center;\" >$fila3[num_mant]		</td>
											 </tr>";
									}
									$cont=$cont+1;
								}
						?>
				</tbody>
			</table>
		</div>
	</body>
</html>
