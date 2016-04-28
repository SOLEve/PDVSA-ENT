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
	<script src="jquery-1.5.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="demos.css">
	
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
										<h4>Reporte de Viajes</h4>
										</caption>
										<thead>
											<tr>
												<th style="text-align: center;">Fecha</th>
												<th style="text-align: center;">Cantidad de Viajes</th>
												<th style="text-align: center;">Cantidad de Alarmas</th>
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

						echo "<a style=\"position:absolute;left:100px;top:0px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar6.php?fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Exportar Excel</a>";

						
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
									<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" ><a target= \"_blank\" href=\"Reporte_fecha_Cli.php?id=$row[fecha_viaje]\">$row[fecha_viaje] 		</a></td>
									<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" >$row[cant1] 			</td>
									<td style=\"text-align: center;border-width: 1px;border: solid; border-color: #000000;\" ><a target= \"_blank\" href=\"Ver_grafica3.php?fecha=$row[fecha_viaje]\">$alarmas 		</a></td>
									</tr>";
								
								
							}
					}
			?>
					</tbody>
				</table>
			</div>
		</div>	
		</form>
	</div>
	
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