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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:650px;width:915px;height:16px;z-index:33;text-align:left;">
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
	
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:600px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
				<p style="position:absolute;left:20px;top:30px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Fecha Inicio</strong></span><input name="inputFecha1" type="text" id="datepicker1"></p> 
				<p style="position:absolute;left:370px;top:30px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Fecha Fin</strong></span><input   name="inputFecha2" type="text" id="datepicker2"></p>

					<button style="position:absolute;left:10px;top:150px;width:120px;height:50px;" type="submit" name="b_consultar" class="btn-danger">Consultar</button>

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
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=1&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:270px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=2&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / Cliente</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=3&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / Chuto</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:530px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=4&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / Termoeléctrica</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=5&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / Diesel</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=6&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / G-91</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:150px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=7&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-primary\">Pedidos / G-95</a>";
								
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=8&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / hora</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=9&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / Dias semana</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=10&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / Mes</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=11&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / Año</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=4&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / Termoeléctricas</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:10px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=2&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-warning\">Pedidos / Cliente</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=12&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=13&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos /Dias semana/Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=14&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=15&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=16&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Termoeléctrica / Conductor</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:140px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=17&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Cliente / Conductor</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:270px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=18&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / Cliente</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:270px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=19&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias semana / Cliente</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:270px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=20&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / Cliente</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:270px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=21&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / Cliente</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=22&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / Chuto</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=23&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias semana / Chuto</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=24&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / Chuto</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=25&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / Chuto</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=26&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Termoeléc / Chuto</a>";								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:400px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=27&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Cliente / Chuto</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:530px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=28&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / Termoeléctrica</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:530px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=29&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias / Termoeléctrica</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:530px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=30&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / Termoeléctrica</a>";	
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:530px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=31&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / Termoeléctrica</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=32&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / Diesel</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=33&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias / Diesel</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=34&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / Diesel</a>";	
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=35&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / Diesel</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=36&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Termoeléc / Diesel</a>";								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:660px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=37&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Cliente / Diesel</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=38&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / G-91</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=39&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias / G-91</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=40&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / G-91</a>";	
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=41&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / G-91</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=42&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Termoeléc / G-91</a>";								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:790px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=43&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Cliente / G-91</a>";
								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:220px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=44&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / hora / G-95</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:280px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=45&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Dias / G-95</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:340px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=46&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Mes / G-95</a>";	
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:400px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=47&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Año / G-95</a>";
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:460px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=48&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Termoeléc / G-95</a>";								
								echo "<a target='_blank' style=\"font-size:14px;position:absolute;left:920px;top:520px;width:120px;height:50px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Reporte_Pedido.php?id=49&fecha1=$fecha1&fecha2=$fecha2\" class=\"btn-success\">Pedidos / Cliente / G-95</a>";
								
								list($year, $month, $day) = explode("-", $fecha3);
								$fecha3 = mktime(0, 0, 0, $month, $day, $year);
								list($year, $month, $day) = explode("-", $fecha4);
								$fecha4 = mktime(0, 0, 0, $month, $day, $year);
								$totalDays = (($fecha4 - $fecha3)/(60 * 60 * 24))+1;
							
								echo"<p style=\"position:absolute;left:20px;top:80px;font-family:'Bookman Old Style';font-size:12px;\"><span><strong>Numero de Días:$totalDays </strong></span>";
									
								
							}
					?>
  					
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