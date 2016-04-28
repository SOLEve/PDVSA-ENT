<?php 
	session_start(); 
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
	</script>

	
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1100px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:100px;top:520px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:100px;top:400px;width:139px;height:32px;z-index:37;text-align:left;">
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
	
    <div class="container"style="position:absolute;left:-100px;">
		<div class="content">
            <ul class="ca-menu">
				<li>
                    <a href="index_administrador.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel Principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:950px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
			<p style="position:absolute;left:20px;top:30px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Fecha Inicio</strong></span><input name="inputFecha1" type="text" id="datepicker1"></p> 
			<p style="position:absolute;left:370px;top:30px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Fecha Fin</strong></span><input   name="inputFecha2" type="text" id="datepicker2"></p>
			<button type="submit" name="b_consultar" class="btn-danger">Consultar</button>

			 <div class="control-group">
                <table class="table " style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15">
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
							if(isset($_POST['b_consultar']))
							{
								$fecha1=$_POST["inputFecha1"];
								$fecha2=$_POST["inputFecha2"];
								
								$fecha3=$_POST["inputFecha1"];
								$fecha4=$_POST["inputFecha2"];
									
								if($fecha1>$fecha2)
								{
									$fecha1=$_POST["inputFecha2"];
									$fecha2=$_POST["inputFecha1"];
									$fecha3=$_POST["inputFecha2"];
									$fecha4=$_POST["inputFecha1"];
								}

								echo "<a style=\"position:absolute;left:100px;top:0px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar4.php?fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Exportar Excel</a>";

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
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >
													<a target= \"_blank\" href=\"Reporte_Cond_Cli.php?fecha1=$fecha1&fecha2=$fecha2&id=$row[id_conductor]\">
														$row[id_conductor] 		
													</a>
												</td>
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[nombre] 			</td>
												<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[apellido]			</td>";
												
											$alarmas=$fila1[0]+$fila4[0];
											if($alarmas>0)
											{
												echo"<td bgcolor=\"fd5b3b\" style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >
														<a target= \"_blank\" href=\"Ver_Alarma.php?id=$row[id_conductor]&fecha1=$fecha1&fecha2=$fecha2\">
															$alarmas
														</a>
													</td>";
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
							}
						?>
  					</tbody>
				</table>
			</div>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-1.5.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>

		<script> 
			$(function() {
				$( "#datepicker1" ).datepicker();
			});
		</script> 
		
		<script> 
			$(function() {
				$( "#datepicker2" ).datepicker();
			});
		</script> 
</body>
</html>