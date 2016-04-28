<?php 
include("Librerias.php");
error_reporting(0);
	include "/libchart/classes/libchart.php";

	function cambiarfecha_mysql($fecha)
{    list($dia,$mes,$ano)=explode("/",$fecha);
    $fecha="$ano-$mes-$dia";
    return $fecha;
}

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	$fecha1 = $_GET["fecha"];
	$consulta="SELECT id_conductor, COUNT(*) as cant FROM viajes2 where fecha_viaje = '$fecha1' GROUP BY id_conductor";
	$res=consultar($consulta);
	
	while($row=mysql_fetch_array($res))
	{
		$cedula =$row[id_conductor];
		$cant=$row[cant];
		
		$consulta1="SELECT nombre,apellido FROM conductor where id_conductor='$cedula'";
		$res1=consultar($consulta1);
		$fila=mysql_fetch_array($res1);
		$nombre =$fila[nombre]." ".$fila[apellido];
					
		$dataSet->addPoint(new Point("".$nombre, $cant));
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1100px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
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
			
			<div id="wb_Text3" style="position:absolute;left:325px;top:45px;width:450px;height:29px;z-index:0;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:24px;"><strong>Reporte Velocidad de los Veh&iacute;culos</strong></span></div>

			<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
			<img src="images/img0015.png" id="Line4" alt=""></div>

			<img alt="Vertical bars chart" src="generated/demo1.png" style="position:absolute;left:250px;top:450px;border: 1px solid gray;"/>
				
			<?php
			error_reporting(0);
				$consulta=mysql_query("SELECT id_conductor, COUNT(*) as cant FROM viajes2 GROUP BY id_conductor");			
				$numero = mysql_num_rows($consulta);
				$fecha1 = $_GET["fecha"];
				$consulta="SELECT id_conductor, COUNT(*) as cant1 FROM viajes2 WHERE  fecha_viaje = '$fecha1' GROUP BY id_conductor";
				$res=consultar($consulta);
				
				echo"<table border='1'style='position:absolute;left:180px;top:800px;text-align: center;'>
				<tr>
				<caption>
										<h4>Lista de Alarmas por Conductor</h4>
										</caption>
										<thead>
											<tr>
												<th>C.I Conductor</th>
												<th>Nombre Conductor</th>
												<th>Cantidad Alarmas entre 90 y 100</th>
												<th>Cantidad Alarmas mayores a 100</th>
												<th>Total Alarmas</th>
											</tr>
										</thead>
										<tbody>";
				
					for($i=0;$i<$numero;$i++)
					{
						echo"<tr>";
						for($j=0;$j<1;$j++)
						{
							$fila=mysql_fetch_array($res);
							$cedula =$fila[id_conductor];
							$cant1=$fila[cant1];
							
							$consulta1="SELECT nombre,apellido FROM conductor WHERE id_conductor='$cedula'";
							$res1=consultar($consulta1);
							$fila1=mysql_fetch_array($res1);
							$nombre =$fila1[0]." ".$fila1[1];
							
							$consulta4="SELECT id_conductor, COUNT(*) as cant2 FROM viajes2 WHERE  velocidad >=100 AND id_conductor='$cedula' and fecha_viaje = '$fecha1'";
							$res2=consultar($consulta4);				
							$fila2=mysql_fetch_array($res2);
							$cant2=$fila2[cant2];
							
							$consulta5="SELECT id_conductor, COUNT(*) as cant1 FROM viajes2 WHERE  velocidad < 100 AND id_conductor='$cedula' and fecha_viaje = '$fecha1'";
							$res3=consultar($consulta5);				
							$fila3=mysql_fetch_array($res3);
							$cant1=$fila3[cant1];

							
							echo"<td>".$cedula."</td>";
							echo"<td>".$nombre."</td>";
							echo"<td>".$cant1."</td>";
							echo"<td>".$cant2."</td>";
							echo"<td>".($cant2 + $cant1)."</td>";

						}
						echo "</tr>";
					}
				echo "</tr>
			</table>
			</tbody>";

				$chart = new PieChart();
				$dataSet = new XYDataSet();
				$dataSet->addPoint(new Point("Velocidades menores a 100Km/hr (".$_GET[id1].")", $_GET[id1]));
				$dataSet->addPoint(new Point("Velocidades mayores a 100Km/hr (".$_GET[id2].")", $_GET[id2]));
				$chart->setDataSet($dataSet);
				$chart->setTitle("Grafica de Velocidades de vehiculos");
				$chart->render("generated/demo3.png");
				
			?>
			<img alt="Pie chart"  src="generated/demo3.png" style="position:absolute;left:250px;top:150px;border: 1px solid gray;"/>
		</form>	
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>