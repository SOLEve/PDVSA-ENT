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
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Sistema de Reportes para GTRMax</title>
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
	
<script src="http://maps.google.com/maps?file=api&amp;v=2&oe=ISO-8859-1;&amp;key=ABQIAAAAXfyLOV-DBHsmkpuY-LUUzBRvMuQNe3bCQ9tCDXjXwHZUjgdNBhQG32AJg5mKqo03Q
mq9WX7GTGdmvw" type="text/javascript"></script>

<script type="text/javascript">

var map;
var gdir;
var geocoder = null;
var addressMarker;

function initialize() {
if (GBrowserIsCompatible()) { 
map = new GMap2(document.getElementById("mapa_ruta"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.addControl(new GOverviewMapControl());
map.addControl(new GScaleControl());
gdir = new GDirections(map, document.getElementById("direcciones"));
GEvent.addListener(gdir, "load", onGDirectionsLoad);
GEvent.addListener(gdir, "error", handleErrors);

setDirections("caracas", "Planta de Distribución PDVSA Guatire", "es"); 

}
} 

function setDirections(fromAddress, toAddress, locale) {
gdir.load("from: " + fromAddress + " to: " + toAddress,
{ "locale": locale });
}

function handleErrors(){
if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
alert("Dirección no disponible.\nError code: " + gdir.getStatus().code);
else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: " + gdir.getStatus().code); 
else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code); 
else if (gdir.getStatus().code == G_GEO_BAD_KEY)
alert("The given key is either invalid or does not match the domain for which it was given. \n Error code: " + gdir.getStatus().code);
else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
alert("A directions request could not be successfully parsed.\n Error code: " + gdir.getStatus().code); 
else alert("An unknown error occurred."); 
}

function onGDirectionsLoad(){ 
}

</script>
</head>
	<body onload="initialize();" onunload="GUnload()">

		<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
			Sistema de Reportes Sala CICENT - Calcular Ruta
		</div>
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1400px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	
	<br>

	
    <div class="container" style="position:absolute;left:-100px;">
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
	
	<div id="wb_Form1" style="position:absolute;left:300px;top:100px;width:720px;height:1241px;z-index:40;overflow:auto">
		<form  method="post"  action="#" onsubmit="setDirections(this.from.value, this.to.value, this.locale.value); return false" name="form" >
			<br><br>
			<strong>Origen:</strong> 
			<select type="text"  id="fromAddress" name="from">
				<option value="Planta de Distribución PDVSA Guatire" selected>Planta de Distribución PDVSA Guatire</option>
				<option value="10.248329,-67.917402">Planta de Distribución PDVSA Yagua</option>
				<option value="10.599934,-67.033879">Planta de Distribución PDVSA Catia La Mar</option>
			</select>
			<br><br>
			<strong>Destino:</strong>		
				<select name="to" type="text" id="toAddress" >
					<?php
    					$consulta="SELECT lat,lon,nombre_cli FROM cliente ORDER BY nombre_cli";
						$res=consultar($consulta);
    					while($row=mysql_fetch_array($res))
    					{
							$lat=$row[lat];
							$lon=$row[lon];
    						if($lat!=NULL){echo "<option value=\"$lat,$lon\">$row[nombre_cli]</option>";}
    					}
    				?>	
				</select>

			<br><br>
			<strong>	Idioma: </strong>
				<select id="locale" name="locale">
					<option value="es" selected>Castellano</option>
					<option value="en">English</option>
					<option value="fr">French</option>
					<option value="de">German</option>
					<option value="ja">Japanese</option>
				</select>
			
			<input type="submit"class=\"btn-success\" name="Submit" value="Calcular Ruta" style="width:95px; height:21px; padding-bottom:2px; font-size:10pt; cursor:pointer; margin-left:5px;"/>
	
				
		</form>
		<br>
		
		<div id="mapa_ruta" style="width: 710px; height: 300px; border: 4px solid #FF6600;"></div>
		
		<div class="textoformul2" id="direcciones" style="width: 710px">Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.</div> <br>
		
		<br>
		
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-2363340242556503";
			/* Hucreative Enlaces cuadrado */
			google_ad_slot = "1489376135";
			google_ad_width = 336;
			google_ad_height = 280;
			//-->
			</script>
			
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
			
			<div id="cuerpo" style=" text-align:center; margin-top:20px; padding-top:13px; border-top:1px solid #CCCCCC; "><img src="../imagenes/hu.jpg" width="80" height="15" style="margin-right:10px; ">     <img src="../imagenes/powered_php_80x15_2.png" width="80" height="15" style="margin-right:10px; ">   <img src="../imagenes/green3.gif" width="80" height="15" style="margin-right:10px; "> <a href="http://www.adobe.com/es/products/flashplayer/" target="_blank"><img src="../imagenes/ps8.jpg" width="96" height="15" b
			order="0" style="margin-right:10px; "></a>  <a href="#" target="_blank"><img src="../imagenes/ps5.jpg" width="74" height="15" border="0" style="margin-right:10px; "></a>  <a href="http://www.google.es" target="_blank"><img src="../imagenes/ps6.jpg" width="34" height="15" border="0" style="margin-right:10px; "></a> <a href="http://search.msn.es" target="_blank"><img src="../imagenes/ps7.jpg" width="64" height="15" border="0" style="margin-right:10px; "></a><img src="../imagenes/hu2.jpg" wi
			dth="80" height="15"></div>
			
			<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
			</script>
			
			<script type="text/javascript">
			_uacct = "UA-2749507-6";
			urchinTracker();
			</script>
	</div>

</body>
</html>