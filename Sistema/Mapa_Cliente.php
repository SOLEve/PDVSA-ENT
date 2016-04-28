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
	<link rel="stylesheet" href="css/estiloGeneral.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all" />

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
	
	<div id="wb_Form1" style="position:absolute;left:30px;top:50px;width:1300px;height:750px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<div id="wrapper">
		<div id="mapa"></div>
		<div id="controles" style="position:absolute; left:05px; top:30px; width:300px; height:26px; z-index:12;">
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="aeropuertos" value="Aeropuerto" class="control" checked="checked"/>Aeropuertos</label><br />
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="estaciones" value="Estacion de servicio" class="control" checked="checked"/> Estaciones de<br> servicio</label><br />
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="puerto" value="puerto" class="control" checked="checked"/> Puertos</label><br />
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="industriales" value="industriales" class="control" checked="checked"/>Industriales</label><br />
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="distribuidores" value="distribuidores" class="control" checked="checked"/>Distribuidores</label><br />
			<label style="color:#000000;font-family:'News Cycle', Georgia, serif;font-size:20px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;"><input type="checkbox" name="termoelectrica" value="termoelectrica" class="control" checked="checked"/>Termoelectrica </label><br />
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript">
			
		(function() {
			var venezuela = new google.maps.LatLng(10.4337504,-66.74269044);
			var opciones = {
				zoom : 10,
				center: venezuela,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var div = document.getElementById('mapa');				
			var map = new google.maps.Map(div, opciones);
			var marcadores = [],
				visibles = ['Aeropuerto','Estacion de servicio','puerto','industriales','distribuidores','termoelectrica'];
			
			var insertar_marcador = function (data){
				$.each(data, function(i, obj){
					var marcador = new google.maps.Marker({
						title: obj.name,
						position : new google.maps.LatLng(obj.lat,obj.lng),
						map : map,
						tipo : obj.type ,
						icon : obj.icon,
						//pagina : obj.pagina,
					});
					/*google.maps.event.addListener(marcador, 'click', function() {
							
							window.open(marcador.pagina);
						  });*/
					marcadores.push(marcador);
				});			
			};
			
			var ocultar_marcadores = function(){
				for (var i = 0, length = marcadores.length; i < length; i++){
					marcadores[i].setVisible(visibles.indexOf(marcadores[i].tipo) !== -1);
				}
			};
			
			$.getJSON('json/aeropuertos.json',insertar_marcador);
			$.getJSON('json/estaciones.json',insertar_marcador);
			$.getJSON('json/puerto.json',insertar_marcador);
			$.getJSON('json/industriales.json',insertar_marcador);
			$.getJSON('json/distribuidores.json',insertar_marcador);
			$.getJSON('json/termoelectrica.json',insertar_marcador);
			
			$('input.control').on('change',function(e){
				var $this = $(this),
					valor = $this.val();
			
				if ($this.is(':checked')){
					// Si está marcado tendremos que añadirla a nuestra lista de visibles
					visibles.push(valor);
				}
				else {
					// Nos tocará borrarlo
					visibles.splice(visibles.indexOf(valor), 1);
				}
				ocultar_marcadores();
			});
		})();
	</script>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>