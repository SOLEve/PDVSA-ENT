<?php 
	session_start(); 
	error_reporting(0);
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
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
	<title>Sistema de Reportes para GTRMax</title>
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;">
	<script type="text/javascript" src="jscookmenu.min.js"></script>
	<script type="text/javascript" src="./ThemeVista/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style6.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />

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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:630px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:200px;top:460px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:202px;top:350px;width:139px;height:32px;z-index:37;text-align:left;">
		<span style="color:#FF0000;font-family:'Bookman Old Style';font-size:27px;">
			<strong>
				Usuario
			</strong>
		</span>
		
		<br>
	
		<h3 style="color:#FFFFFF">
			<?php
				$consulta="SELECT nombre, apellido FROM usuario WHERE Login ='".$_SESSION["login"]."'";
				$res=consultar($consulta);
				while($row=mysql_fetch_array($res))
				{
					echo $row['nombre'];
					echo"<br>";
					echo $row['apellido'];
				}
									 
			?>
		</h3>
		
	</div>
	
	<div id="wb_Form1" style="position:absolute;left:50px;top:50px;width:1200px;height:570px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" class="form-horizontal" >
			<?php				
				$id= $_GET["id"];
				$fecha1= $_GET["fecha1"];
				$fecha2= $_GET["fecha2"];
				$fecha4= $_GET["fecha1"];
				$fecha3= $_GET["fecha2"];
				
				list($year, $month, $day) = explode("-", $fecha3);
				$fecha3 = mktime(0, 0, 0, $month, $day, $year);
				list($year, $month, $day) = explode("-", $fecha4);
				$fecha4 = mktime(0, 0, 0, $month, $day, $year);
				$totalDays = (($fecha4 - $fecha3)/(60 * 60 * 24))+1;
								
				if($id==1)//pedidos conductor
				{
					echo"<div class='control-group'>
					<table class='table' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
						<caption>
							<h4>Reporte de Conductores</h4>
						</caption>
						<thead>
							<tr>
      							<th style='text-align: center;'>Cedula</th>
      							<th style='text-align: center;'>Nombre</th>
      							<th style='text-align: center;'>Apellido</th>
								<th style='text-align: center;'>Cantidad de Viajes</th>
								<th style='text-align: center;'>Km Recorridos</th>
    						</tr>
						</thead>
						<tbody>";
								echo"<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
										
								$consulta = "SELECT id_conductor,nombre,apellido FROM conductor ORDER BY id_conductor";				
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
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >
													<a target= \"_blank\" href=\"Reporte_Cond_Cli.php?fecha1=$fecha1&fecha2=$fecha2&id=$row[id_conductor]\">
														$row[id_conductor] 		
													</a>
												</td>
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[nombre] 			</td>
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[apellido]			</td>";
												
										
																		
											$km = number_format($fila3[0], 2, ",", "."); 
											
											echo" 	<td   style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\"  >$fila2[0]	</td>
													<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >	$km</td>							
													</tr>";
										}
									
								}			
					
  					echo"</tbody>
					</table></div>";
				}
				
				if($id==2)//pedidos clientes 
				{
					echo"<div class='control-group'>
							<table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
								<h4>Reporte de Clientes</h4>
								</caption>
								<thead>
									<tr>
										<th style='text-align: center;'>Codigo</th>
										<th style='text-align: center;'>Nombre Cliente</th>
										<th style='text-align: center;'>Cantidad de Viajes</th>
									</tr>
								</thead>
								<tbody>
								<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
										
								$consulta = "SELECT Cliente_ID_Cli,COUNT( * ) AS cant1
											FROM viajes
											WHERE fecha_viaje
											BETWEEN '$fecha1'
											AND '$fecha2'
											GROUP BY Cliente_ID_Cli
											ORDER BY cant1 DESC";
								$res=consultar($consulta);
										
								while($row=mysql_fetch_array($res))
								{
									$consulta1 = "SELECT nombre_cli	FROM cliente WHERE id_cli='$row[Cliente_ID_Cli]'";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
											
									echo " <tr>
											<td style=\"text-align: center;\" >$row[Cliente_ID_Cli] </td>
											<td style=\"text-align: center;\" >$fila1[nombre_cli] 		</td>
											<td style=\"text-align: center;\" >$row[cant1]		</td>
											</tr>";
								}					
						echo"</tbody>
						</table>
					</div>";
				}
			
				if($id==3)//pedidos chutos
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Chutos</h4>
								</caption>
  							<thead>
    							<tr>
      								<th style='text-align: center;'>Placa</th>
      								<th style='text-align: center;'>Cantidad de Viajes</th>
    							</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT v1_placal_chuto,COUNT(fecha_viaje) AS cant1 
											FROM viajes 
											WHERE fecha_viaje 
											BETWEEN '$fecha1' AND '$fecha2' 
											GROUP BY v1_placal_chuto
											ORDER BY cant1 desc";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{

									echo " <tr>
											<td style=\"text-align: center;\" >$row[0] 	</td>
											<td style=\"text-align: center;\" >$row[1] 		</td>
											 </tr>";
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==4)//pedidos termoelectrica
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Termoelectricas</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Nombre</th>
      							<th style='text-align: center;'>Cantidad de Viajes</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT count( Nombre_Cli ) AS viajes, Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Tipo_Cliente_ID_Tipo = '7'
										AND Cliente_ID_Cli = id_cli
										GROUP BY nombre_cli
										ORDER BY viajes DESC";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >$row[Nombre_Cli] 	</td>
											<td style=\"text-align: center;\" >$row[viajes] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==5)//pedidos diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Diesel</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Combustile</th>
      							<th style='text-align: center;'>Cantidad Despachada</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT SUM(diesel) as total
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >Diesel 	</td>
											<td style=\"text-align: center;\" >$row[total] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}			
			
				if($id==6)//pedidos g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Diesel</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Combustile</th>
      							<th style='text-align: center;'>Cantidad Despachada</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT SUM(g91) as total
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >G-91 	</td>
											<td style=\"text-align: center;\" >$row[total] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==7)//pedidos g95
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Diesel</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Combustile</th>
      							<th style='text-align: center;'>Cantidad Despachada</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT SUM(g95) as total
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >G-95 	</td>
											<td style=\"text-align: center;\" >$row[total] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==8)//pedidos hora
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de pedidos por hora</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
						
							$consulta = "SELECT HOUR( Hora_Salida ) AS hora, count( * ) AS cantidad
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY hora";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{		
								$hora=$row[0];
								if($hora<12){$hora= $hora." am";}
								if($hora==0){$hora= "00";}
								if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
								
								echo " <tr>
										<td style=\"text-align: center;\" >$hora 	</td>
										<td style=\"text-align: center;\" >$row[1] 		</td>
										 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==9)//pedidos dia semana
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de pedidos por dia de la semana</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
						
							$consulta = "SELECT COUNT( Fecha_Viaje ) AS cantidad, DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY dia
										ORDER BY cantidad DESC";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{		
								$dia=$row[1];
								if($dia=='Monday'){$dia='Lunes';}
								if($dia=='Tuesday'){$dia='Martes';}
								if($dia=='Wednesday'){$dia='Miercoles';}
								if($dia=='Thursday'){$dia='Jueves';}
								if($dia=='Friday'){$dia='Viernes';}
								if($dia=='Saturday'){$dia='Sábado';}
								if($dia=='Sunday'){$dia='Domingo';}
								
								echo " <tr>
										<td style=\"text-align: center;\" >$dia 			</td>
										<td style=\"text-align: center;\" >$row[0] 	</td>
										 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==10)//pedidos mes
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de pedidos por mes</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
						
							$consulta = "SELECT COUNT( Fecha_Viaje ) AS cantidad, MONTHNAME(Fecha_Viaje) AS mes
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY mes
										ORDER BY cantidad DESC";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{		
								$mes=$row[1];
								if($mes=='January'){$mes='Enero';}
								if($mes=='February'){$mes='Febrero';}
								if($mes=='March'){$mes='Marzo';}
								if($mes=='April'){$mes='Abril';}
								if($mes=='May'){$mes='Mayo';}
								if($mes=='June'){$mes='Junio';}
								if($mes=='July'){$mes='Julio';}
								if($mes=='August'){$mes='Agosto';}
								if($mes=='September'){$mes='Septiembre';}
								if($mes=='October'){$mes='Octubre';}
								if($mes=='November'){$mes='Noviembre';}
								if($mes=='December'){$mes='Diciembre';}
								
								echo " <tr>
										<td style=\"text-align: center;\" >$mes 			</td>
										<td style=\"text-align: center;\" >$row[cantidad] 	</td>
										 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==11)//pedidos año
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de pedidos por Año</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
						
							$consulta = "SELECT count( Fecha_Viaje ) AS cantidad, YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY anio
										ORDER BY anio DESC";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{	
								
								echo " <tr>
										<td style=\"text-align: center;\" >$row[anio] 			</td>
										<td style=\"text-align: center;\" >$row[cantidad] 	</td>
										 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==12)//pedidos hora conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de pedidos por hora por conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
						
							$consulta = "SELECT Conductor_ID_Conductor
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Conductor_ID_Conductor";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[Conductor_ID_Conductor];
								if($cedula!=0)
								{
									$consulta1="SELECT HOUR( Hora_Salida ) AS hora, count( * ) AS cantidad
												FROM viajes
												WHERE Conductor_ID_Conductor = '$cedula'
												GROUP BY hora";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{										
										$hora=$row1[hora];
										if($hora<12){$hora= $hora." am";}
										if($hora==0){$hora= "00";}
										if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
										
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$hora 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$hora 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
									}
								}
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==13)//pedidos dia semana conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por Conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Conductor_ID_Conductor
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Conductor_ID_Conductor";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[0];
								if($cedula!=0)
								{
									$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE Conductor_ID_Conductor = '$cedula'
										GROUP BY dia
										ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{										
										$dia=$row1[1];
										if($dia=='Monday'){$dia='Lunes';}
										if($dia=='Tuesday'){$dia='Martes';}
										if($dia=='Wednesday'){$dia='Miercoles';}
										if($dia=='Thursday'){$dia='Jueves';}
										if($dia=='Friday'){$dia='Viernes';}
										if($dia=='Saturday'){$dia='Sábado';}
										if($dia=='Sunday'){$dia='Domingo';}
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[0] $row2[1] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[0] $row2[1] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
									}
								
								}							
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==14)//pedidos mes conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por Conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>mes</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Conductor_ID_Conductor
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Conductor_ID_Conductor";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[0];
								
								if($cedula!=0)
								{
									$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, MONTHNAME(Fecha_Viaje) AS mes
												FROM viajes
												WHERE Conductor_ID_Conductor = '$cedula'								
												GROUP BY mes
												ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{										
										$mes=$row1[1];
										if($mes=='January'){$mes='Enero';}
										if($mes=='February'){$mes='Febrero';}
										if($mes=='March'){$mes='Marzo';}
										if($mes=='April'){$mes='Abril';}
										if($mes=='May'){$mes='Mayo';}
										if($mes=='June'){$mes='Junio';}
										if($mes=='July'){$mes='Julio';}
										if($mes=='August'){$mes='Agosto';}
										if($mes=='September'){$mes='Septiembre';}
										if($mes=='October'){$mes='Octubre';}
										if($mes=='November'){$mes='Noviembre';}
										if($mes=='December'){$mes='Diciembre';}
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
									}
								
								}							
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==15)//pedidos año conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por Conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Conductor_ID_Conductor
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Conductor_ID_Conductor";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[Conductor_ID_Conductor];
								
								if($cedula!=0)
								{
									$consulta1="SELECT count( Fecha_Viaje ) AS cantidad, YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE Conductor_ID_Conductor = '$cedula'									
										GROUP BY anio
										ORDER BY anio DESC";
									$res1=consultar($consulta1);
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{										
										
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
									}
								
								}							
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==16)//pedidos termoelectrica conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por termoelectrica por Conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>Termoelectrica</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Conductor_ID_Conductor
										FROM viajes
										JOIN cliente
										WHERE Tipo_Cliente_ID_Tipo = '7'
										AND Cliente_ID_Cli = id_cli
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Conductor_ID_Conductor";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[Conductor_ID_Conductor];
								
								if($cedula!=0)
								{
									$consulta1="SELECT Nombre_Cli,COUNT(Nombre_Cli) as viajes
												FROM viajes	
												JOIN cliente
												WHERE Tipo_Cliente_ID_Tipo = '7'
												AND Cliente_ID_Cli = id_cli											
												AND Conductor_ID_Conductor= '$cedula'
												GROUP BY Nombre_Cli
												ORDER BY viajes DESC";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{							
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[Nombre_Cli]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[viajes] 		</td>
												 </tr>";
										}										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[Nombre_Cli]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[viajes] 		</td>
												 </tr>";
										}
									}								
								}							
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==17)//pedidos cliente conductor
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Cliente por Conductor</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Cedula</th>
								<th style='text-align: center;'>Nombre</th>
								<th style='text-align: center;'>Cliente</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT conductor_id_conductor
												FROM viajes 
												WHERE fecha_viaje 
												BETWEEN '$fecha1' AND '$fecha2' 
												GROUP BY conductor_id_conductor ";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$cedula=$row[0];
								
								if($cedula!=0)
								{
									$consulta1="SELECT cliente_id_cli, COUNT(*) as cantidad,nombre_cli 
												FROM viajes 
												JOIN cliente
												WHERE cliente_id_cli = id_cli
												AND conductor_id_conductor = '$cedula' 
												AND fecha_viaje 
												BETWEEN '$fecha1' AND '$fecha2' 
												GROUP BY cliente_id_cli 
												ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre,apellido
												FROM conductor
												WHERE ID_Conductor = '$cedula'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{		
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[nombre_cli]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$cedula 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre] $row2[apellido] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[nombre_cli]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
									}								
								}							
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
			
				if($id==18)//pedidos hora cliente
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por Cliente</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Cliente</th>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli
												FROM viajes 
												WHERE fecha_viaje 
												BETWEEN '$fecha1' AND '$fecha2' 
												GROUP BY Cliente_ID_Cli ";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];

								$consulta1="SELECT HOUR( Hora_Salida ) AS hora, count( * ) AS cantidad
											FROM viajes
											WHERE 	Cliente_ID_Cli = '$codigo'
											GROUP BY hora
											ORDER BY cantidad DESC";
								$res1=consultar($consulta1);
									
								$consulta2="SELECT nombre_cli
											FROM cliente
											WHERE id_cli = '$codigo'";
								$res2=consultar($consulta2);
								$row2=mysql_fetch_array($res2);
									
								while($row1=mysql_fetch_array($res1))
								{	
									$hora=$row1[hora];
									if($hora<12){$hora= $hora." am";}
									if($hora==0){$hora= "00";}
									if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
										
									if($cont%2==0)
									{
										echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli] 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
												</tr>";
									}	
									
									if($cont%2==1)
									{	
										echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli]	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
												 </tr>";
									}
								}				
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==19)//pedidos dias semana cliente
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por Cliente</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Cliente</th>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY 	Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[Cliente_ID_Cli];
							
								$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE Cliente_ID_Cli = '$codigo'
										GROUP BY dia
										ORDER BY cantidad DESC";
								$res1=consultar($consulta1);
									
								$consulta2="SELECT nombre_cli
											FROM cliente
											WHERE id_cli = '$codigo'";
								$res2=consultar($consulta2);
								$row2=mysql_fetch_array($res2);
									
								while($row1=mysql_fetch_array($res1))
								{										
									$dia=$row1[1];
									if($dia=='Monday'){$dia='Lunes';}
									if($dia=='Tuesday'){$dia='Martes';}
									if($dia=='Wednesday'){$dia='Miercoles';}
									if($dia=='Thursday'){$dia='Jueves';}
									if($dia=='Friday'){$dia='Viernes';}
									if($dia=='Saturday'){$dia='Sábado';}
									if($dia=='Sunday'){$dia='Domingo';}
									if($cont%2==0)
									{
										echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli]</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
											 </tr>";
									}
										
									if($cont%2==1)
									{	
										echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli]  </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
											 </tr>";
									}
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==20)//pedidos mes cliente
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por Cliente</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Cliente</th>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];

									$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, MONTHNAME(Fecha_Viaje) AS mes
												FROM viajes
												WHERE Cliente_ID_Cli = '$codigo'								
												GROUP BY mes
												ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
									$consulta2="SELECT nombre_cli
												FROM cliente
												WHERE id_cli = '$codigo'";
									$res2=consultar($consulta2);
									$row2=mysql_fetch_array($res2);
									
									while($row1=mysql_fetch_array($res1))
									{										
										$mes=$row1[1];
										if($mes=='January'){$mes='Enero';}
										if($mes=='February'){$mes='Febrero';}
										if($mes=='March'){$mes='Marzo';}
										if($mes=='April'){$mes='Abril';}
										if($mes=='May'){$mes='Mayo';}
										if($mes=='June'){$mes='Junio';}
										if($mes=='July'){$mes='Julio';}
										if($mes=='August'){$mes='Agosto';}
										if($mes=='September'){$mes='Septiembre';}
										if($mes=='October'){$mes='Octubre';}
										if($mes=='November'){$mes='Noviembre';}
										if($mes=='December'){$mes='Diciembre';}
										
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
										}
									}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==21)//pedidos año cliente
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por Cliente</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Cliente</th>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];

								$consulta1="SELECT count( Fecha_Viaje ) AS cantidad, YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE Cliente_ID_Cli = '$codigo'									
										GROUP BY anio
										ORDER BY anio DESC";
								$res1=consultar($consulta1);
								
								$consulta2="SELECT nombre_cli
											FROM cliente
											WHERE id_cli = '$codigo'";
								$res2=consultar($consulta2);
								$row2=mysql_fetch_array($res2);
									
								while($row1=mysql_fetch_array($res1))
								{		
									if($cont%2==0)
									{
										echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
									}
										
									if($cont%2==1)
									{	
										echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row2[nombre_cli] </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
												 </tr>";
									}
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==22)//pedidos hora chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT v1_placal_chuto
												FROM viajes 
												WHERE fecha_viaje 
												BETWEEN '$fecha1' AND '$fecha2' 
												GROUP BY v1_placal_chuto ";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$placa=$row[0];

								$consulta1="SELECT HOUR( Hora_Salida ) AS hora, count( * ) AS cantidad
											FROM viajes
											WHERE v1_placal_chuto = '$placa'
											GROUP BY hora
											ORDER BY hora ";
								$res1=consultar($consulta1);
									
								
								while($row1=mysql_fetch_array($res1))
								{	
									$hora=$row1[0];
									if($hora<12){$hora= $hora." am";}
									if($hora==0){$hora= "00";}
									if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
									
									if($placa!='')
									{
										if($cont%2==0)
										{
											echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
													</tr>";
										}	
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
													 </tr>";
										}
									}
								}				
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==23)//pedidos dias semana chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Placa</th>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT v1_placal_chuto
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY v1_placal_chuto";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$placa=$row[0];
							
								$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE v1_placal_chuto = '$placa'
										GROUP BY dia
										ORDER BY cantidad DESC";
								$res1=consultar($consulta1);
									
													
								while($row1=mysql_fetch_array($res1))
								{										
									$dia=$row1[1];
									if($dia=='Monday'){$dia='Lunes';}
									if($dia=='Tuesday'){$dia='Martes';}
									if($dia=='Wednesday'){$dia='Miercoles';}
									if($dia=='Thursday'){$dia='Jueves';}
									if($dia=='Friday'){$dia='Viernes';}
									if($dia=='Saturday'){$dia='Sábado';}
									if($dia=='Sunday'){$dia='Domingo';}
									
									if($placa!='')
									{
										if($cont%2==0)
										{
											echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
											
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
									}
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==24)//pedidos mes chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT v1_placal_chuto
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY v1_placal_chuto";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$placa=$row[0];

									$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, MONTHNAME(Fecha_Viaje) AS mes
												FROM viajes
												WHERE v1_placal_chuto = '$placa'								
												GROUP BY mes
												ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
								
									while($row1=mysql_fetch_array($res1))
									{										
										$mes=$row1[1];
										if($mes=='January'){$mes='Enero';}
										if($mes=='February'){$mes='Febrero';}
										if($mes=='March'){$mes='Marzo';}
										if($mes=='April'){$mes='Abril';}
										if($mes=='May'){$mes='Mayo';}
										if($mes=='June'){$mes='Junio';}
										if($mes=='July'){$mes='Julio';}
										if($mes=='August'){$mes='Agosto';}
										if($mes=='September'){$mes='Septiembre';}
										if($mes=='October'){$mes='Octubre';}
										if($mes=='November'){$mes='Noviembre';}
										if($mes=='December'){$mes='Diciembre';}
										
										if($placa!='')
										{
											if($cont%2==0)
											{
												echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
													 </tr>";
											}
											
											if($cont%2==1)
											{	
												echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
													 </tr>";
											}
										}
									}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==25)//pedidos año chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT v1_placal_chuto
										FROM viajes
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2'										
										GROUP BY v1_placal_chuto";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$placa=$row[0];

								$consulta1="SELECT count( Fecha_Viaje ) AS cantidad, YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE v1_placal_chuto = '$placa'									
										GROUP BY anio
										ORDER BY anio DESC";
								$res1=consultar($consulta1);
									
								while($row1=mysql_fetch_array($res1))
								{	
									if($placa!='')
									{
										if($cont%2==0)
										{
											echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
													 </tr>";
										}
											
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$placa </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[anio]				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 		</td>
													 </tr>";
										}
									}
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==26)//pedidos termoelectrica chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Termoelectrica por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Termoelectrica</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli,Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Cliente_ID_Cli = id_cli
										AND Tipo_Cliente_ID_Tipo = '7'
										AND fecha_viaje
										BETWEEN '$fecha1'
										AND '$fecha2'
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
																
								$cliente=$row[0];
								$nombre=$row[1];								
								$cont=$cont+1;
																	
								$consulta1="SELECT COUNT( Fecha_Viaje ) AS viajes, v1_placal_chuto
											FROM viajes	
											WHERE Cliente_ID_Cli = '$cliente'
											AND fecha_viaje	BETWEEN '$fecha1' AND '$fecha2'";
								$res1=consultar($consulta1);
									
								while($row1=mysql_fetch_array($res1))
								{	

									if($cont%2==0)
									{
										echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[v1_placal_chuto] 		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$nombre	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[viajes] 		</td>
											 </tr>";
									}										
									if($cont%2==1)
									{	
										echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[v1_placal_chuto] 		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$nombre	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[viajes] 		</td>
												</tr>";
									}
										
								}								
						
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==27)//pedidos cliente chuto
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Cliente por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Cliente</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT v1_placal_chuto
										FROM viajes 
										WHERE fecha_viaje 
										BETWEEN '$fecha1' AND '$fecha2' 
										GROUP BY v1_placal_chuto ";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$placa=$row[0];
								
								if($placa!='')
								{
									$consulta1="SELECT cliente_id_cli, COUNT(*) as cantidad,nombre_cli 
												FROM viajes 
												JOIN cliente
												WHERE cliente_id_cli = id_cli
												AND v1_placal_chuto = '$placa' 
												AND fecha_viaje 
												BETWEEN '$fecha1' AND '$fecha2' 
												GROUP BY cliente_id_cli 
												ORDER BY cantidad DESC";
									$res1=consultar($consulta1);
									
							
									while($row1=mysql_fetch_array($res1))
									{		
										if($cont%2==0)
										{
											echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$placa				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[nombre_cli]	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
												 </tr>";
										}										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$placa				</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[nombre_cli]	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[cantidad] 	</td>
												 </tr>";
										}
									}								
								}							
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==28)//pedidos hora termoelectrica
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por Termoelectrica</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Termoelectrica</th>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli,Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Cliente_ID_Cli = id_cli
										AND Tipo_Cliente_ID_Tipo = '7'
										AND fecha_viaje
										BETWEEN '$fecha1'
										AND '$fecha2'
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];
								$nombre=$row[1];

								$consulta1="SELECT HOUR( Hora_Salida ) AS hora, count( * ) AS cantidad
											FROM viajes
											WHERE Cliente_ID_Cli = '$codigo'
											GROUP BY hora
											ORDER BY hora ";
								$res1=consultar($consulta1);
									
								
								while($row1=mysql_fetch_array($res1))
								{	
									$hora=$row1[0];
									if($hora<12){$hora= $hora." am";}
									if($hora==0){$hora= "00";}
									if($hora>12){$hora=$hora-12;$hora= $hora." pm";}

									if($cont%2==0)
										{
											echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[1] 	</td>
													</tr>";
										}	
										
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[1] 	</td>
													 </tr>";
										}									
								}				
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==29)//pedidos dia semana termoeletrica
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por Termoelectrica</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Termoelectrica</th>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli,Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Cliente_ID_Cli = id_cli
										AND Tipo_Cliente_ID_Tipo = '7'
										AND fecha_viaje
										BETWEEN '$fecha1'
										AND '$fecha2'
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];
								$nombre=$row[1];
							
								$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE Cliente_ID_Cli = '$codigo'
										GROUP BY dia
										ORDER BY cantidad DESC";
								$res1=consultar($consulta1);
									
													
								while($row1=mysql_fetch_array($res1))
								{										
									$dia=$row1[1];
									if($dia=='Monday'){$dia='Lunes';}
									if($dia=='Tuesday'){$dia='Martes';}
									if($dia=='Wednesday'){$dia='Miercoles';}
									if($dia=='Thursday'){$dia='Jueves';}
									if($dia=='Friday'){$dia='Viernes';}
									if($dia=='Saturday'){$dia='Sábado';}
									if($dia=='Sunday'){$dia='Domingo';}
									

										if($cont%2==0)
										{
											echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
											
										if($cont%2==1)
										{	
											echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
										}
									
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==30)//pedidos mes termoelectrica
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por Termoelectrica</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Termoelectrica</th>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli,Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Cliente_ID_Cli = id_cli
										AND Tipo_Cliente_ID_Tipo = '7'
										AND fecha_viaje
										BETWEEN '$fecha1'
										AND '$fecha2'
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];
								$nombre=$row[1];

								$consulta1="SELECT COUNT( Fecha_Viaje ) AS cantidad, MONTHNAME(Fecha_Viaje) AS mes
											FROM viajes
											WHERE Cliente_ID_Cli = '$codigo'								
											GROUP BY mes
											ORDER BY cantidad DESC";
								$res1=consultar($consulta1);
									
								while($row1=mysql_fetch_array($res1))
								{										
									$mes=$row1[1];
									if($mes=='January'){$mes='Enero';}
									if($mes=='February'){$mes='Febrero';}
									if($mes=='March'){$mes='Marzo';}
									if($mes=='April'){$mes='Abril';}
									if($mes=='May'){$mes='Mayo';}
									if($mes=='June'){$mes='Junio';}
									if($mes=='July'){$mes='Julio';}
									if($mes=='August'){$mes='Agosto';}
									if($mes=='September'){$mes='Septiembre';}
									if($mes=='October'){$mes='Octubre';}
									if($mes=='November'){$mes='Noviembre';}
									if($mes=='December'){$mes='Diciembre';}
										
									if($cont%2==0)
									{
										echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$nombre</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												 </tr>";
									}
											
									if($cont%2==1)
									{	
										echo "  <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$nombre </td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
												</tr>";
									}										
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==31)//pedidos año termoelectrica
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por Chuto</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Chuto</th>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Pedidos</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT Cliente_ID_Cli,Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE Cliente_ID_Cli = id_cli
										AND Tipo_Cliente_ID_Tipo = '7'
										AND fecha_viaje
										BETWEEN '$fecha1'
										AND '$fecha2'
										GROUP BY Cliente_ID_Cli";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$codigo=$row[0];
								$nombre=$row[1];

								$consulta1="SELECT count( Fecha_Viaje ) AS cantidad, YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE Cliente_ID_Cli = '$codigo'									
										GROUP BY anio
										ORDER BY anio DESC";
								$res1=consultar($consulta1);
									
								while($row1=mysql_fetch_array($res1))
								{	
									if($cont%2==0)
									{
										echo " <tr class='success'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[1]				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
													 </tr>";
									}
											
									if($cont%2==1)
									{	
										echo " <tr class='warning'>
													<td border=\"caefc7\" style=\"text-align: center;\" >$nombre </td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[1]				</td>
													<td border=\"caefc7\" style=\"text-align: center;\" >$row1[0] 		</td>
													 </tr>";
									}
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==32)//pedidos hora diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por Diesel</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>Diesel Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(diesel) as diesel,HOUR( Hora_Salida ) AS hora
										FROM viajes
										WHERE diesel>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY hora";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$hora=$row[1];

								if($hora<12){$hora= $hora." am";}
								if($hora==0){$hora= "00";}
								if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
								
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											</tr>";
								}	
										
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											 </tr>";
								}
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}				
				
				if($id==38)//pedidos hora g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por G-91</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>G-91 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g91) as g91,HOUR( Hora_Salida ) AS hora
										FROM viajes
										WHERE g91>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY hora";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$hora=$row[1];

								if($hora<12){$hora= $hora." am";}
								if($hora==0){$hora= "00";}
								if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
								
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											</tr>";
								}	
										
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora				</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											 </tr>";
								}
							}							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==44)//pedidos hora g95
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Hora por G-95</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Hora</th>
      							<th style='text-align: center;'>G-95 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g95) as g91,HOUR( Hora_Salida ) AS hora
										 FROM viajes
										 WHERE g95>'0'
										 AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										 GROUP BY hora";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$hora=$row[1];

								if($hora<12){$hora= $hora." am";}
								if($hora==0){$hora= "00";}
								if($hora>12){$hora=$hora-12;$hora= $hora." pm";}
								
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora		</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											</tr>";
								}
								
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$hora		</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel	</td>
											 </tr>";
								}
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==33)//pedidos dias diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por Diesel</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad Diesel Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(diesel) as diesel,DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE diesel>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY dia
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$dia=$row[1];
								
								if($dia=='Monday'){$dia='Lunes';}
								if($dia=='Tuesday'){$dia='Martes';}
								if($dia=='Wednesday'){$dia='Miercoles';}
								if($dia=='Thursday'){$dia='Jueves';}
								if($dia=='Friday'){$dia='Viernes';}
								if($dia=='Saturday'){$dia='Sábado';}
								if($dia=='Sunday'){$dia='Domingo';}
									
								if($cont%2==0)
								{
									echo "<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
										<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
										</tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
										<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
										<td border=\"caefc7\" style=\"text-align: center;\" >$diesel 		</td>
										</tr>";
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==39)//pedidos dias g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por G-91</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad G-91 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g91) as diesel,DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE g91>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY dia
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$dia=$row[1];
																	
								$dia=$row[1];
								if($dia=='Monday'){$dia='Lunes';}
								if($dia=='Tuesday'){$dia='Martes';}
								if($dia=='Wednesday'){$dia='Miercoles';}
								if($dia=='Thursday'){$dia='Jueves';}
								if($dia=='Friday'){$dia='Viernes';}
								if($dia=='Saturday'){$dia='Sábado';}
								if($dia=='Sunday'){$dia='Domingo';}
									
								if($cont%2==0)
								{
											echo "<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											</tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel 		</td>
											</tr>";
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==45)//pedidos dias g95
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por dia de la Semana por G-95</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Dia</th>
      							<th style='text-align: center;'>Cantidad G-95 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g95) as diesel,DAYNAME(Fecha_Viaje) AS dia
										FROM viajes
										WHERE g95>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY dia
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$dia=$row[1];
																	
								$dia=$row[1];
								if($dia=='Monday'){$dia='Lunes';}
								if($dia=='Tuesday'){$dia='Martes';}
								if($dia=='Wednesday'){$dia='Miercoles';}
								if($dia=='Thursday'){$dia='Jueves';}
								if($dia=='Friday'){$dia='Viernes';}
								if($dia=='Saturday'){$dia='Sábado';}
								if($dia=='Sunday'){$dia='Domingo';}
									
								if($cont%2==0)
								{
											echo "<td border=\"caefc7\" style=\"text-align: center;\" >$dia</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											</tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$dia 	</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel 		</td>
											</tr>";
								}
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==34)//pedidos mes diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por Diesel</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad de Diesel Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(diesel) as diesel,MONTHNAME(Fecha_Viaje) AS mes
										FROM viajes
										WHERE diesel>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY mes
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$mes=$row[1];

								if($mes=='January'){$mes='Enero';}
								if($mes=='February'){$mes='Febrero';}
								if($mes=='March'){$mes='Marzo';}
								if($mes=='April'){$mes='Abril';}
								if($mes=='May'){$mes='Mayo';}
								if($mes=='June'){$mes='Junio';}
								if($mes=='July'){$mes='Julio';}
								if($mes=='August'){$mes='Agosto';}
								if($mes=='September'){$mes='Septiembre';}
								if($mes=='October'){$mes='Octubre';}
								if($mes=='November'){$mes='Noviembre';}
								if($mes=='December'){$mes='Diciembre';}
										
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo "  <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											</tr>";
								}										
								
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==40)//pedidos mes g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por G-91</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad de G-91 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g91) as diesel,MONTHNAME(Fecha_Viaje) AS mes
										FROM viajes
										WHERE g91>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY mes
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$mes=$row[1];

								if($mes=='January'){$mes='Enero';}
								if($mes=='February'){$mes='Febrero';}
								if($mes=='March'){$mes='Marzo';}
								if($mes=='April'){$mes='Abril';}
								if($mes=='May'){$mes='Mayo';}
								if($mes=='June'){$mes='Junio';}
								if($mes=='July'){$mes='Julio';}
								if($mes=='August'){$mes='Agosto';}
								if($mes=='September'){$mes='Septiembre';}
								if($mes=='October'){$mes='Octubre';}
								if($mes=='November'){$mes='Noviembre';}
								if($mes=='December'){$mes='Diciembre';}
										
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo "  <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											</tr>";
								}										
								
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==46)//pedidos mes g95
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Mes por G-95</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Mes</th>
      							<th style='text-align: center;'>Cantidad de G-95 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g95) as diesel,MONTHNAME(Fecha_Viaje) AS mes
										FROM viajes
										WHERE g95>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY mes
										ORDER BY diesel DESC";
							$res=consultar($consulta);
							$cont=0;
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$mes=$row[1];

								if($mes=='January'){$mes='Enero';}
								if($mes=='February'){$mes='Febrero';}
								if($mes=='March'){$mes='Marzo';}
								if($mes=='April'){$mes='Abril';}
								if($mes=='May'){$mes='Mayo';}
								if($mes=='June'){$mes='Junio';}
								if($mes=='July'){$mes='Julio';}
								if($mes=='August'){$mes='Agosto';}
								if($mes=='September'){$mes='Septiembre';}
								if($mes=='October'){$mes='Octubre';}
								if($mes=='November'){$mes='Noviembre';}
								if($mes=='December'){$mes='Diciembre';}
										
								if($cont%2==0)
								{
									echo " <tr class='success'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo "  <tr class='warning'>
											<td border=\"caefc7\" style=\"text-align: center;\" >$mes 	</td>
											<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											</tr>";
								}										
								
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==35)//pedidos año diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por Diesel</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad Diesel Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(diesel) as diesel,YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE diesel>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY anio
										ORDER BY anio DESC";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$anio=$row[1];
									
								if($cont%2==0)
								{
									echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==41)//pedidos año g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por G-91</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad G-91 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g91) as diesel,YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE g91>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY anio
										ORDER BY anio DESC";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$anio=$row[1];
									
								if($cont%2==0)
								{
									echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==47)//pedidos año g95
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Año por G-95</h4>
								</caption>
  							<thead>
    						<tr>
								<th style='text-align: center;'>Año</th>
      							<th style='text-align: center;'>Cantidad G-95 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";
							
							$consulta = "SELECT SUM(g95) as diesel,YEAR( Fecha_Viaje ) AS anio
										FROM viajes
										WHERE g95>'0'
										AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										GROUP BY anio
										ORDER BY anio DESC";
							$res=consultar($consulta);
							$cont=0;
							
							while($row=mysql_fetch_array($res))
							{	
								$cont=$cont+1;
								$diesel=$row[0];
								$anio=$row[1];
									
								if($cont%2==0)
								{
									echo " <tr class='success'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
											
								if($cont%2==1)
								{	
									echo " <tr class='warning'>
												<td border=\"caefc7\" style=\"text-align: center;\" >$anio		</td>
												<td border=\"caefc7\" style=\"text-align: center;\" >$diesel		</td>
											 </tr>";
								}
														
							}
							
							echo"
							</tbody>
						</table>
					</div>";
				
				}
							
				if($id==36)// pedidos termoelectrica diesel
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por Diesel por Termoelectricas</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Nombre</th>
      							<th style='text-align: center;'>Cantidad de Diesel Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT Sum( diesel ) AS combustible, Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										AND Tipo_Cliente_ID_Tipo = '7'
										AND Cliente_ID_Cli = id_cli
										AND diesel>'0'
										GROUP BY nombre_cli";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >$row[1] 	</td>
											<td style=\"text-align: center;\" >$row[0] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==42)//pedidos termoelectrica g91
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por G-91 por Termoelectricas</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Nombre</th>
      							<th style='text-align: center;'>Cantidad de G-91 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT Sum( g91 ) AS combustible, Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										AND Tipo_Cliente_ID_Tipo = '7'
										AND Cliente_ID_Cli = id_cli
										AND g91>'0'
										GROUP BY nombre_cli";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >$row[1] 	</td>
											<td style=\"text-align: center;\" >$row[0] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==48)//pedidos termoelectrica g5
				{
					echo"<div class='control-group'>
                            <table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
									<h4>Reporte de Pedidos por G-95 por Termoelectricas</h4>
								</caption>
  							<thead>
    						<tr>
      							<th style='text-align: center;'>Nombre</th>
      							<th style='text-align: center;'>Cantidad de G-95 Despachado</th>
    						</tr>
  							</thead>
  							<tbody>";

							$consulta = "SELECT Sum( g95 ) AS combustible, Nombre_Cli
										FROM viajes
										JOIN cliente
										WHERE fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
										AND Tipo_Cliente_ID_Tipo = '7'
										AND Cliente_ID_Cli = id_cli
										AND g95>'0'
										GROUP BY nombre_cli";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{								
									echo " <tr>
											<td style=\"text-align: center;\" >$row[1] 	</td>
											<td style=\"text-align: center;\" >$row[0] 		</td>
											 </tr>";
								
							}
							echo"
							</tbody>
						</table>
					</div>";
				}
				
				if($id==37)//pedidos cliente diesel
				{
					echo"<div class='control-group'>
							<table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
								<h4>Reporte de Clientes por Diesel</h4>
								</caption>
								<thead>
									<tr>
										<th style='text-align: center;'>Codigo</th>
										<th style='text-align: center;'>Nombre Cliente</th>
										<th style='text-align: center;'>Cantidad de Diesel Despachado</th>
									</tr>
								</thead>
								<tbody>
								<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
										
								$consulta = "SELECT Cliente_ID_Cli,SUM( diesel ) AS combustible
											FROM viajes
											WHERE diesel>'0'
											AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
											GROUP BY Cliente_ID_Cli
											ORDER BY combustible DESC";
								$res=consultar($consulta);
										
								while($row=mysql_fetch_array($res))
								{
									$consulta1 = "SELECT nombre_cli	FROM cliente WHERE id_cli='$row[0]'";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
											
									echo " <tr>
											<td style=\"text-align: center;\" >$row[0] </td>
											<td style=\"text-align: center;\" >$fila1[0] 		</td>
											<td style=\"text-align: center;\" >$row[1]		</td>
											</tr>";
								}					
						echo"</tbody>
						</table>
					</div>";
				}
				
				if($id==43)//pedidos cliente g91
				{
					echo"<div class='control-group'>
							<table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
								<h4>Reporte de Clientes por G-91</h4>
								</caption>
								<thead>
									<tr>
										<th style='text-align: center;'>Codigo</th>
										<th style='text-align: center;'>Nombre Cliente</th>
										<th style='text-align: center;'>Cantidad de G-91 Despachado</th>
									</tr>
								</thead>
								<tbody>
								<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
										
								$consulta = "SELECT Cliente_ID_Cli,SUM( g91 ) AS combustible
											FROM viajes
											WHERE g91>'0'
											AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
											GROUP BY Cliente_ID_Cli
											ORDER BY combustible DESC";
								$res=consultar($consulta);
										
								while($row=mysql_fetch_array($res))
								{
									$consulta1 = "SELECT nombre_cli	FROM cliente WHERE id_cli='$row[0]'";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
											
									echo " <tr>
											<td style=\"text-align: center;\" >$row[0] </td>
											<td style=\"text-align: center;\" >$fila1[0] 		</td>
											<td style=\"text-align: center;\" >$row[1]		</td>
											</tr>";
								}					
						echo"</tbody>
						</table>
					</div>";
				}
				
				if($id==49)//pedidos cliente g95
				{
					echo"<div class='control-group'>
							<table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
								<h4>Reporte de Clientes por G-95</h4>
								</caption>
								<thead>
									<tr>
										<th style='text-align: center;'>Codigo</th>
										<th style='text-align: center;'>Nombre Cliente</th>
										<th style='text-align: center;'>Cantidad de G-95 Despachado</th>
									</tr>
								</thead>
								<tbody>
								<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
										
								$consulta = "SELECT Cliente_ID_Cli,SUM( g95 ) AS combustible
											FROM viajes
											WHERE g95>'0'
											AND fecha_viaje BETWEEN '$fecha1' AND '$fecha2'
											GROUP BY Cliente_ID_Cli
											ORDER BY combustible DESC";
								$res=consultar($consulta);
										
								while($row=mysql_fetch_array($res))
								{
									$consulta1 = "SELECT nombre_cli	FROM cliente WHERE id_cli='$row[0]'";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
											
									echo " <tr>
											<td style=\"text-align: center;\" >$row[0] </td>
											<td style=\"text-align: center;\" >$fila1[0] 		</td>
											<td style=\"text-align: center;\" >$row[1]		</td>
											</tr>";
								}					
						echo"</tbody>
						</table>
					</div>";
				}
				
				if($id==50)//reporte mantenimiento chutos
				{
					echo"<div class='control-group'>
							<table class='table table-striped' style='text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15'>
								<caption>
								<h4>Reporte de Mantenimiento</h4>
								</caption>
								<thead>
									<tr>
										<th style='text-align: center;'>Placa</th>
										<th style='text-align: center;'>Fecha</th>
									</tr>
								</thead>
								<tbody>
								<p style=\"position:absolute;left:20px;top:0px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
								
								$placa =$_GET["placa"];
								$consulta = "SELECT Fecha_Mantenimiento , Placal_chuto
											FROM mantenimiento_chutos
											WHERE Fecha_Mantenimiento BETWEEN '$fecha1' AND '$fecha2'
											AND Placal_chuto ='$placa' ";
								$res=consultar($consulta);
										
								while($row=mysql_fetch_array($res))
								{
									echo " <tr>
											<td style=\"text-align: center;\" >$row[1] 	</td>
											<td style=\"text-align: center;\" >$row[0]		</td>
											</tr>";
								}					
						echo"</tbody>
						</table>
					</div>";
				}
				
				
				
				
				
			?>		
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>