<?php 
include "/libchart/classes/libchart.php";
error_reporting(0);
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:600px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	
	<div id="wb_Form1" style="position:absolute;left:50px;top:50px;width:900px;height:500px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" class="form-horizontal" >

			<div id="wb_Text3" style="position:absolute;left:200px;top:45px;width:550px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Reporte Tiempo Recorrido de los Veh&iacute;culos
					</strong>
				</span>
			</div>

			<div id="wb_Line4" style="position:absolute;left:200px;top:70px;width:449px;height:0px;z-index:41;">
			<img src="images/img0015.png" id="Line4" alt=""></div>

			<?php

				$chart = new PieChart();
				$dataSet = new XYDataSet();
				$dataSet->addPoint(new Point("Viajes Que Aprox llegaron (".$_GET[id1].")", $_GET[id1]));
				$dataSet->addPoint(new Point("Viajes Que Aprox No han llegado (".$_GET[id2].")", $_GET[id2]));
				$chart->setDataSet($dataSet);
				$chart->setTitle("Grafica de Viajes Despachados");
				$chart->render("generated/demo3.png");
				
			?>
				<img alt="Pie chart"  src="generated/demo3.png" style="position:absolute;left:200px;top:150px;border: 1px solid gray;"/>

				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>