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
function cambiarfecha_mysql($fecha)
{
    list($dia,$mes,$ano)=explode("/",$fecha);
    $fecha="$ano-$mes-$dia";
    return $fecha;
}
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';

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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:900px;width:915px;height:16px;z-index:33;text-align:left;">
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
	
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:735px;z-index:40;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
				<strong>
<pre style="font-family:'Arial';font-size:15px;">             
			<pre style="font-family:'Arial';font-size:20px;text-align:center;">  Acerca del Sistema</pre>
			
			El desarrollo del Sistema atiende la necesidad que tiene la sala CICENT en querer tener una herramienta a su disposición que realice los cálculos necesarios en cuanto a cantidad de viajes ,exceso y/o disminución  de velocidad de los vehículos que transportan combustible, kilómetros recorridos por cada unidad para realizar el mantenimiento preventivo de la flota; por otra parte la asignación mensual de los conductores a cada uno de los vehículos que se hace de forma manual en plantilla de Excel se propone que el sistema tenga un módulo que sirva de ayuda para la asignación de conductores a los vehículos de transporte.<br>
Para ello el sistema que se propone a desarrollar va estar integrada a la sala CICENT capacitado para suplir las necesidades de la sala, por medio de interfaces gráficas que para el usuario sean usables y accesibles, obteniendo información del sistema de Gestión de Flota GTRMax.<br>
La propuesta del desarrollo del sistema está en los aportes prácticos que permitirá: <br>
1)	Llevar el registro de los clientes que la ENT posee.<br>
2)	Tener un mejor control de la información de los conductores.<br>
3)	Gestionar de manera más eficiente la información de cada uno de los vehículos que transportan combustible.<br>
4)	Asignar a cada uno de los conductores su vehículo correspondiente al mes.<br>
5)	Llevar el control de la cantidad de viajes que debe realizar cada conductor.<br>
6)	Realizar los cálculos necesarios en cuanto a kilometraje recorrido por cada vehículo para efectuar el mantenimiento preventivo de la flota.<br>
7)	Ejecutar  los cómputos fundamentales a lo que se refiere excesos y/o disminución de velocidad de los conductores y sus respectivos vehículos asignados.<br>
8)	Cargar la información que arroja el GTRMax que se encentra  en formato xls.<br>
9)	Realizar los reportes semanales en cuanto a número de conductores incurrieron en exceso y/o disminución de velocidad, número de viajes de cada conductor y vehículos que necesitan ir a mantenimiento preventivo.<br>
10)	Exportar la información en formato xls o pdf para que el usuario la tenga siempre a su disposición.
</pre>
				</strong>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>