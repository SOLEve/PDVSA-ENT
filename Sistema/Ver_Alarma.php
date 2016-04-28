<?php 
session_start(); error_reporting(0);
	include("Librerias.php");
	
	if(isset($_SESSION["conex"]))
	{
		if($_SESSION["conex"]==0)
		{
		echo '<script language="JavaScript" type="text/javascript">
				document.location= "index.php";
				</script>';
		}	
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Reportes para GTRMax</title>
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jscookmenu.min.js"></script>
	<script type="text/javascript" src="./ThemeVista/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style6.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="demos.css">
	
	<script src="jquery-1.5.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>

	<style type="text/css">
		#wb_Form1
		{
		   background-color: #FFFFFF;
		   border: 4px #000000 none;
		}
	</style>
</head>
	<body>

		<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
			Sistema de Reportes Sala CICENT
		</div>
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:600px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<div id="wb_Form1" style="position:absolute;left:50px;top:50px;width:1250px;height:550px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
						  <div class="control-group">
                              <table class="table table-striped" style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15">
  							<caption>
  							<h4>Reporte de Conductores / Clientes</h4>
  							</caption>
  							<thead>
    							<tr>
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Hora</th>
									<th style="text-align: center;">Ubicacion</th>
									<th style="text-align: center;"></th>
    							</tr>
  							</thead>
  							<tbody>
							<?php

								$fecha1= $_GET["fecha1"];
								$fecha2= $_GET["fecha2"];
								$fecha3= $_GET["fecha1"];
								$fecha4= $_GET["fecha2"];

								list($year, $month, $day) = explode("-", $fecha3);
								$fecha3 = mktime(0, 0, 0, $month, $day, $year);
								list($year, $month, $day) = explode("-", $fecha4);
								$fecha4 = mktime(0, 0, 0, $month, $day, $year);
								$totalDays = (($fecha4 - $fecha3)/(60 * 60 * 24))+1;
										
								echo"<p style=\"position:absolute;left:20px;top:10px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Fecha Inicio:$fecha1 <br> Fecha Fin:$fecha2 <br> Numero de Días:$totalDays  </strong></span>";
															
												
								$consulta = "SELECT fecha_viaje,hora_alarma,ubicacion,latitud,longitud FROM viajes2 WHERE CH_CD_Conductor_ID_Conductor = '".$_GET["id"]."' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha_viaje ";
								$res=consultar($consulta);
								while($row=mysql_fetch_array($res))
								{
								echo " <tr>
									<td style=\"text-align: center;\" >$row[fecha_viaje] 		</td>
									<td style=\"text-align: center;\" >$row[hora_alarma] 		</td>
									<td style=\"text-align: center;\" >$row[ubicacion]  		</td>
									<td  style=\"text-align: center;\" >
										<a target= \"_blank\" href=\"Ver_Alarma_Mapa.php?lat=$row[latitud]&lon=$row[longitud]\">
											Ver Alarma en el Mapa...			
										</a>
									</td>
									</tr>";
								}
								
								$consulta = "SELECT fecha_viaje,hora_alarma,ubicacion,latitud,longitud  FROM viajes3 WHERE V_ID_Conductor = '".$_GET["id"]."' AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha_viaje ";
								$res=consultar($consulta);
								while($row=mysql_fetch_array($res))
								{
								echo " <tr>
									<td style=\"text-align: center;\" >$row[fecha_viaje] 		</td>
									<td style=\"text-align: center;\" >$row[hora_alarma] 		</td>
									<td style=\"text-align: center;\" >$row[ubicacion]  		</td>
									<td  style=\"text-align: center;\" >
										<a target= \"_blank\" href=\"Ver_Alarma_Mapa.php?lat=$row[latitud]&lon=$row[longitud]\">
											Ver Alarma en el Mapa...			
										</a>
									</td>
									</tr>";
								}
							?>
  							</tbody>
						</table>
						</div>
						


		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>