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
    <link rel="stylesheet" type="text/css" href="css/style6.css" />
	
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />

	<script language="javascript" type="text/javascript"> 
		var posicionCampo=1;
		function agregarUsuario()
		{ 
			nuevaFila = document.getElementById("tablaUsuarios").insertRow(-1);
			nuevaFila.id=posicionCampo;  
			nuevaCelda=nuevaFila.insertCell(-1); 
			nuevaCelda.innerHTML="<td><input type='text' size='15' name='nombre["+posicionCampo+"]' ></td>"; 
			nuevaCelda=nuevaFila.insertCell(-1); nuevaCelda.innerHTML="<td><input type='button' value='Eliminar' onclick='eliminarUsuario(this)'></td>"; 
			posicionCampo++; 
		}

		function eliminarUsuario(obj)
		{ 
			var oTr = obj; 
			while(oTr.nodeName.toLowerCase()!='tr')
			{ 
				oTr=oTr.parentNode; 
			} 
			var root = oTr.parentNode; root.removeChild(oTr); 
		}
	</script>
	
	<style type="text/css">
		#wb_Form1
		{
		   background-color: #FFFFFF;
		   border: 4px #000000 none;
		}
	</style>
	
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script src="http://maps.google.com/maps?file=api&v=2&api;key=ABCDEF"type="text/javascript"></script>
	
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
	
	<div id="wb_Form1" style="position:absolute;left:50px;top:50px;width:1200px;height:570px;z-index:40;">
		<form  method="post"  action="#"enctype="multipart/form-data" style="overflow:auto" class="form-horizontal">
		<table id="tablaUsuarios">
			<tr'> 
				<td width="175">Ubicación</td> 
				<td width="100">Acción</td> <td align="right"> 
				<input type="button" onClick="agregarUsuario()" value="A&ntilde;adir Ubicación" > </td>
			</tr> 
		</table>
		<button type="submit" name="b_agregar" >Buscar en el Mapa</button>
		<?php
			if(isset($_POST["b_agregar"]))
			{
				$var=0;
				for($i = 0; $i <= count($_POST['nombre']); $i++) 
				{
					$variable[$i] = $_POST['nombre'][$i];
					$var++;
				}
				
					echo "<script type='text/javascript'>
					  google.load('visualization', '1',
						  {'packages': ['table', 'map', 'corechart']});
					  google.setOnLoadCallback(initialize);

					  function initialize() {
						// The URL here is the URL of the spreadsheet.
						// This is where the data is.
						var query = new google.visualization.Query(
							'https://spreadsheets.google.com/pub?key=pCQbetd-CptF0r8qmCOlZGg');
							
						query.send(draw);
					  }

					  function draw(response) {
						if (response.isError()) {
						  alert('Error in query');
						}

						var ticketsData = response.getDataTable();
						var chart = new google.visualization.ColumnChart(
							document.getElementById('chart_div'));
						chart.draw(ticketsData, {'isStacked': true, 'legend': 'bottom',
							'vAxis': {'title': 'Number of tickets'}});

						var geoData = new google.visualization.DataTable();
						geoData.addColumn('string', 'Posicion');
						geoData.addColumn('string', 'Velocidad');
						
						geoData.addRows("; echo $var; echo");";
						
						for($j = 0; $j <= count($_POST['nombre']); $j++) 
						{
							echo "geoData.setCell(";echo $j; echo", 0, '";echo $variable[$j];  echo"');";
						}
					
						echo"var geoView = new google.visualization.DataView(geoData);
						geoView.setColumns([0, 1]);

						var table =
							new google.visualization.Table(document.getElementById('table_div'));
						table.draw(geoData, {showRowNumber: false});

						var map =
							new google.visualization.Map(document.getElementById('map_div'));
						map.draw(geoView, {showTip: true});

						google.visualization.events.addListener(table, 'select',
							function() {
							  map.setSelection(table.getSelection());
							});
						google.visualization.events.addListener(map, 'select',
							function() {
							  table.setSelection(map.getSelection());
							});
					  }
					</script>
					
				
					";				
			}	
		?>
		</form>
		
		

			<table align='center'>
				<tr valign='top'>
					<td ></td>
					<td >
						<div id='table_div'></div>
					</td>
				</tr>
					<tr>
						<td colSpan=2>
							<div id='chart_div' style='align: center; width: 1px; height:1px;'></div>
						</td>
				</tr>
			</table>
<div id='map_div' ></div>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>