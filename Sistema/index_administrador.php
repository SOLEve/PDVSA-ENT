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
<html lang="en">
    <head>
        <title>Sistema de Reportes Sala CICENT</title>
		<meta charset="UTF-8" />
        <meta name="description" content="Sliding Background Image Menu with jQuery" />
        <meta name="keywords" content="jquery, background image, image, menu, navigation, panels" />
		<meta name="author" content="Codrops" />
		<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
					background:#555 url(images/pattern.png) repeat top left;
					color:#000;
					font-family: 'PT Sans Narrow', Arial, sans-serif;
					font-size:12px;
					overflow-y:scroll;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>
    <body>
	
		<div class="container">
		<div class="header" style="color:#FFFFFF;">
				<h1>Sistema de Reportes Sala CICENT</h1>
		</div>
		
		<div style="position:absolute;left:70px;top:100px;width:139px;height:32px;z-index:13;text-align:left;">

		<span style="color:#FF0000;font-size:27px;">
			<strong>
				Usuario
			</strong>
		</span>
				<br>
		<h3 style="color:#FFFFFF;font-size:27px;">
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
		<a href="index.php"><input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute; left:-30px; top:130px; width:123px; height:26px; z-index:12;"></a>
		</div>

			<div class="content">
				<div id="sbi_container" class="sbi_container">
					<div class="sbi_panel" data-bg="images/1.jpg">
						<a href="#" class="sbi_label">Cómputos</a>
						<div class="sbi_content">
							<ul>
								<li><a href="Cargar_Scli.php">Cargar Data Scli</a></li>
								<li><a href="Mantenimiento.php">Mantenimiento Preventivo</a></li>
								<li><a href="Tiempo_Recorrido.php">Tiempo Recorrido</a></li>
								<li><a href="Velocidad_Alta.php">Velocidad Alta</a></li>
								<li><a href="Calcular_Ruta.php">Cálculo de Ruta</a></li>
								<li><a href="Asignar_Viaje.php">Viajes sin Chuto</a></li>
								<li><a href="Asignar_Chuto.php">Asignación Chutos</a></li>								
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/2.jpg">
						<a href="#" class="sbi_label">Reportes</a>
						<div class="sbi_content">
							<ul>
								<li><a href="Reporte_Conductores.php">Conductores</a></li>
								<li><a href="Reportes_Viajes.php">Viajes</a></li>
								<li><a href="Reportes_Chutos.php">Chutos</a></li>
								<li><a href="Reportes_Clientes.php">Clientes</a></li>
								<li><a href="Pedidos.php">Pedidos</a></li>
								<li><a target= "_blank" href="Buscar_Mapa.php">Buscar Coordenadas</a></li>
								<li><a target= "_blank" href="Mapa_Cliente.php">Mapas Cliente</a></li>
								<li><a href="Reporte_Asignacion.php">Asignación</a></li>
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/3.jpg">
						<a href="#" class="sbi_label">Panel de Control</a>
						<div class="sbi_content">
							<ul>
								<li><a href="index_Conductor.php">Conductores</a></li>
								<li><a href="index_chuto.php">Chutos</a></li>
								<li><a href="index_cliente.php">Clientes</a></li>
								<li><a href="index_usuario.php">Usuarios</a></li>
								<li><a href="index_lugar.php">Lugar</a></li>
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/4.jpg">
						<a href="#" class="sbi_label">Sistema</a>
						<div class="sbi_content">
							<ul>
								<li><a href="Mapa_Sistema.php">Mapa del Sistema</a></li>
								<li><a href="Acerca_Sistema.php">Acerca del Sistema</a></li>
								<li><a href="Contacto.php">Contacto</a></li>
								<li><a target= "_blank" href="http://localhost/phpmyadmin/index.php?db=ent&token=c729814b9ccaffed987ddd423c127e22">Phpmyadmin</a></li>
								<li><a target= "_blank" href="http://www.gtrmax.com/app/">GTRMax.com</a></li>
								<li><a href="Archivos_subidos.php">Archivos Subidos al Sistema</a></li>
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/5.jpg">
						<a href="#" class="sbi_label">Documentación</a>
						<div class="sbi_content">
							<ul>
								<li><a href="pdf/Manual de Sistema.pdf" target= \"_blank\">Manual de Sistema</a></li>
								<li><a href="pdf/Manual de Usuario.pdf" target= \"_blank\">Manual de Usuario</a></li>
								<li><a href="pdf/Manual_GtrMax_PDVSA.pdf"target= \"_blank\">Manual GTRMax</a></li>
								<li><a href="pdf/Reporte2.pdf"target= \"_blank\">Descargar Reporte 2 SCLi</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="topbar">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;position:absolute;left:-100px;width:1200px;">
					Sistema de Reportes Sala CICENT de Petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy; 2013 PDVSA. Todos los derechos reservados.
				</span>
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sbi_container').bgImageMenu({
					defaultBg	: 'images/default.png',
					border		: 1,
					type		: {
						mode		: 'seqFade',
						speed		: 250,
						easing		: 'jswing',
						seqfactor	: 100
					}
				});
			});
		</script>
    </body>
		
	<script src="js/bootstrap.min.js"></script>
</html>