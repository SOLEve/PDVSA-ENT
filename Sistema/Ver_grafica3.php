<?php 
	include("Librerias.php");
	error_reporting(0);
	include "/libchart/classes/libchart.php";

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	$fecha1 = $_GET['fecha'];
	
	$consulta="SELECT CH_CD_Conductor_ID_Conductor, COUNT(*) as cant FROM viajes2 WHERE fecha_viaje ='$fecha1' GROUP BY CH_CD_Conductor_ID_Conductor";
	$res=consultar($consulta);
	
	while($row=mysql_fetch_array($res))
	{
		$cedula =$row[0];
		$cant=$row[1];
		
		$consulta1="SELECT nombre,apellido FROM conductor where id_conductor='$cedula'";
		$res1=consultar($consulta1);
		$fila=mysql_fetch_array($res1);
		$nombre =$fila[0]." ".$fila[1];
		
		$consulta2="SELECT COUNT(*) as cant1 FROM viajes3 WHERE fecha_viaje ='$fecha1' AND V_ID_Conductor='$cedula'";
		$res2=consultar($consulta2);
		$fila2=mysql_fetch_array($res2);
		$cant1 =$fila2[0];
		
		$total=$cant+$cant1;
    	$dataSet->addPoint(new Point("".$nombre, $total));
	}
	
	$consulta="SELECT V_ID_Conductor FROM viajes3 WHERE fecha_viaje ='$fecha1' GROUP BY V_ID_Conductor";
	$res=consultar($consulta);
	
	while($row=mysql_fetch_array($res))
	{
		$cedula =$row[0];		
		$consulta1="SELECT CH_CD_Conductor_ID_Conductor FROM viajes2 WHERE fecha_viaje ='$fecha1' AND CH_CD_Conductor_ID_Conductor='$cedula'";
		$numero = mysql_num_rows($consulta1);
		
		if($numero==0)
		{
			$consulta1="SELECT nombre,apellido FROM conductor where id_conductor='$cedula'";
			$res1=consultar($consulta1);
			$fila=mysql_fetch_array($res1);
			$nombre =$fila[0]." ".$fila[1];
			
			$consulta2="SELECT COUNT(*) as cant1 FROM viajes3 WHERE fecha_viaje ='$fecha1' AND V_ID_Conductor='$cedula'";
			$res2=consultar($consulta2);
			$fila2=mysql_fetch_array($res2);
			$cant1 =$fila2[0];

			$dataSet->addPoint(new Point("".$nombre, $cant1));
		}
	}
	
	
	$chart->setDataSet($dataSet);
	$chart->setTitle("Cantidad de Exceso de Velocidades por Conductor");
	$chart->render("generated/demo1.png");
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:650px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<div id="wb_Form1" style="position:absolute;left:50px;top:50px;width:1250px;height:600px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
			
			<div id="wb_Text3" style="position:absolute;left:325px;top:45px;width:450px;height:29px;z-index:0;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:24px;"><strong>Reporte Velocidad de los Veh&iacute;culos</strong></span></div>

			<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
			<img src="images/img0015.png" id="Line4" alt=""></div>

			<img alt="Vertical bars chart" src="generated/demo1.png" style="position:absolute;left:25px;top:100px;width:1200px;border: 1px solid gray;"/>
				
			<?php

				$fecha1 = $_GET["fecha"];
				echo"<table border='1'style='position:absolute;left:180px;top:600px;text-align: center;'>
						<tr>
							<caption>
								<h4>Lista de Alarmas por Conductor</h4>
							</caption>
										<thead>
											<tr>
												<th>C.I Conductor</th>
												<th>Nombre Conductor</th>
												<th>Cantidad Alarmas entre 90 y 99</th>
												<th>Cantidad Alarmas mayores a 100</th>
												<th>Total Alarmas</th>
											</tr>
										</thead>
										<tbody>";
				
				$consulta="SELECT CH_CD_Conductor_ID_Conductor FROM viajes2 WHERE  fecha_viaje = '$fecha1' GROUP BY CH_CD_Conductor_ID_Conductor";
				$res=consultar($consulta);
				$total90=0;
				$total00=0;
				$total=0;
				
				while($row=mysql_fetch_array($res))
				{
					$cedula =$row[0];
				
					$consulta1="SELECT nombre,apellido FROM conductor WHERE id_conductor='$cedula'";
					$res1=consultar($consulta1);
					$fila1=mysql_fetch_array($res1);
					$nombre =$fila1[0]." ".$fila1[1];
				
					$consulta4="SELECT COUNT(*) as cant2 FROM viajes2 WHERE  velocidad >=100 AND CH_CD_Conductor_ID_Conductor='$cedula' and fecha_viaje = '$fecha1'";
					$res2=consultar($consulta4);				
					$fila2=mysql_fetch_array($res2);
					$cant2=$fila2[cant2];
					
					$consulta5="SELECT COUNT(*) as cant1 FROM viajes2 WHERE  velocidad < 100 AND CH_CD_Conductor_ID_Conductor='$cedula' and fecha_viaje = '$fecha1'";
					$res3=consultar($consulta5);				
					$fila3=mysql_fetch_array($res3);
					$cant1=$fila3[cant1];
						
				    if($cedula!=0){
					echo"<tr>";
					echo"<td>".$cedula."</td>";
					echo"<td>".$nombre."</td>";
					echo"<td>".$cant1."</td>";
					echo"<td>".$cant2."</td>";
					echo"<td>".($cant2 + $cant1)."</td>";
					echo "</tr>";
					$total90=$total90+$cant1;
					$total100=$total100+$cant2;
					$total=$total+($cant1+$cant2);
					}
				}
				
				$consulta="SELECT V_ID_Conductor FROM viajes3 WHERE fecha_viaje ='$fecha1' GROUP BY V_ID_Conductor";
				$res=consultar($consulta);
				
				while($row1=mysql_fetch_array($res))
				{
					$cedula1 =$row1[0];		
					
					$consulta1="SELECT CH_CD_Conductor_ID_Conductor FROM viajes2 WHERE fecha_viaje ='$fecha1' AND CH_CD_Conductor_ID_Conductor='$cedula1'";
					$numero = mysql_num_rows($consulta1);
					
					if($numero==0)
					{
						$consulta1="SELECT nombre,apellido FROM conductor where id_conductor='$cedula1'";
						$res1=consultar($consulta1);
						$fila=mysql_fetch_array($res1);
						$nombre =$fila[0]." ".$fila[1];
						
						$consulta2="SELECT COUNT(*) as cant1 FROM viajes3 WHERE  velocidad < 100 AND fecha_viaje ='$fecha1' AND V_ID_Conductor='$cedula1'";
						$res2=consultar($consulta2);
						$fila2=mysql_fetch_array($res2);
						$cant1 =$fila2[0];

						$consulta4="SELECT COUNT(*) as cant2 FROM viajes3 WHERE  velocidad >=100 AND V_ID_Conductor='$cedula1' and fecha_viaje = '$fecha1'";
						$res2=consultar($consulta4);				
						$fila2=mysql_fetch_array($res2);
						$cant2=$fila2[cant2];
						
						echo"<tr>";
						echo"<td>".$cedula1."</td>";
						echo"<td>".$nombre."</td>";
						echo"<td>".$cant1."</td>";
						echo"<td>".$cant2."</td>";
						echo"<td>".($cant2 + $cant1)."</td>";
						echo "</tr>";
						$total90=$total90+$cant1;
						$total100=$total100+$cant2;
						$total=$total+($cant1+$cant2);
					}
				}
				
				echo"<tr>";
				echo"<td bgcolor=\"f9f88e\" ></td>";
				echo"<td bgcolor=\"f9f88e\" >Total</td>";
				echo"<td bgcolor=\"f9f88e\">".$total90."</td>";
				echo"<td bgcolor=\"f9f88e\">".$total100."</td>";
				echo"<td bgcolor=\"f9f88e\">".$total."</td>";
				echo "</tr>";
						
				echo "
			</table>
			</tbody>";

		?>

		</form>	
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>