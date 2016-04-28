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

	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAUnJY3ChJhF0YgyTSDJuVfBTqu-zEVMNfNVaqfAe9FKyfKhfBExSs9LrIQ7GOuBeSnaddg05sRmEBxQ"type="text/javascript">
	</script>

<script type="text/javascript">
function load() {
		var lat = ""
		var lon = ""

		function cogeDatos() {
		if(location.search){
		Recibido=location.search.substring(1).split("&");
		lat=Recibido[0].split("=")[1]
		lon=Recibido[1].split("=")[1]
		}
		}
		cogeDatos()
		lat=parseFloat  (lat)
		lon=parseFloat  (lon)
		
		
	if (GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map"));	
		map.setCenter(new GLatLng(lat,lon),15);
		map.addControl(new GMapTypeControl());
		map.addControl(new GSmallZoomControl());
		map.setMapType(G_NORMAL_MAP);
		map.addControl(new GLargeMapControl());
		

		var punto = new GLatLng(lat,lon);
		var marker =  new GMarker(punto);

        map.addOverlay(marker);
				
		var muralla1 = new GLatLng(10.487052,-66.560848);
		var muralla2 = new GLatLng(10.487348,-66.552265);
		var muralla3 = new GLatLng(10.492327,-66.551406);
		var muralla4 = new GLatLng(10.494859,-66.557071);
		var muralla5 = new GLatLng(10.492074,-66.560848);
		var muralla6 = new GLatLng(10.489753,-66.561491);
		
		var polygon = new GPolygon([muralla1, muralla2, muralla3, muralla4, muralla5, muralla6, muralla1], "#e14444", 5, 0.7, "#e14444", 0.4);		
		map.addOverlay(polygon);
		
		var muralla1 = new GLatLng(10.272695,-66.53183);
		var muralla2 = new GLatLng(10.206137,-66.300488);
		var muralla3 = new GLatLng(10.176739,-66.269245);
		var muralla4 = new GLatLng(10.143284,-66.181355);
		var muralla5 = new GLatLng(10.03681,-66.156635);
		var muralla6 = new GLatLng(9.961411,-66.185474);
		var muralla7 = new GLatLng(9.983052,-66.253109);
		var muralla8 = new GLatLng(9.96716,-66.307354);
		var muralla9 = new GLatLng(10.003001,-66.43301);
		var muralla10 = new GLatLng(9.956339,-66.601925);
		var muralla11 = new GLatLng(10.134497,-66.706982);
		var muralla12 = new GLatLng(10.182146,-66.662006);
		var muralla13 = new GLatLng(10.179781,-66.641064);
		var muralla14 = new GLatLng(10.20884,-66.593685);
		var muralla15 = new GLatLng(10.267965,-66.568966);
		
		var polygon = new GPolygon([muralla1, muralla2, muralla3, muralla4, muralla5, muralla6, muralla7,muralla8,muralla9,muralla10,muralla11,muralla12,muralla13,muralla14,muralla15,muralla1], "#e14444", 5, 0.7, "#e14444", 0.4);		
		map.addOverlay(polygon);

		

	}
}

window.onload=load
//]]>
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
		<form  method="post"  action="#" class="form-horizontal" >
					<div id="map" style="width: 1200px; height: 550px"></div>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>