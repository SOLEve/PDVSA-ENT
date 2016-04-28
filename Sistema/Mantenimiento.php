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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1100px;width:915px;height:16px;z-index:33;text-align:left;">
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
                                <h2 class="ca-main">Atrás</h2>
                                <h3 class="ca-sub">Regrese al Panel Principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div>
    </div>

	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:950px;z-index:40;overflow:auto;">
		<form  method="post"  action="eliminar.php" enctype="multipart/form-data" class="form-horizontal" >

			<div id="wb_Text3" style="position:absolute;left:325px;top:45px;width:450px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Lista de Chutos a Mantenimiento
					</strong>
				</span>
			</div>

			<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
				<img src="images/img0015.png" id="Line4" alt="">
			</div>

			<table class="table" style="width: 100%; height: 15;position:absolute;left:0px;top:150px;text-align: center;">
 				
				<thead>
    				<tr>
      					<th>Placa Chuto</th>
      					<th>Unidad</th>
						<th>Km Recorrido Último Mantenimiento</th>
						<th>Km Recorrido Inicio Sistema</th>
						<th>Estado</th>
    				</tr>
  				</thead>
  				<tbody>
					<?php
					echo "<a style=\"position:absolute;left:10px;top:100px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar3.php\" class=\"btn-success\">Exportar Excel</a>";
					$consulta="SELECT km_recorridos,km_recorridos_h,placal_chuto,unidad FROM chuto ORDER BY km_recorridos DESC";
					$res=consultar($consulta);
					
					while($row=mysql_fetch_array($res))
					{
						if($row[km_recorridos] >= 5000)
						{
							echo " <tr>
							
							 <td bgcolor=\"fd5b3b\"> $row[placal_chuto]</td>
							 <td bgcolor=\"fd5b3b\"> $row[unidad]</td>
							 <td bgcolor=\"fd5b3b\"> $row[km_recorridos]</td>
							 <td bgcolor=\"fd5b3b\"> $row[km_recorridos_h]</td>
							 <td bgcolor=\"fd5b3b\">Mantenimiento preventivo</td> ";
						}

						if($row[km_recorridos] >= 4500 && $row[km_recorridos] < 5000)
						{
							echo " <tr>
							
							 <td bgcolor=\"6dc4ec\"> $row[placal_chuto]</td>
							 <td bgcolor=\"6dc4ec\"> $row[unidad]</td>
							 <td bgcolor=\"6dc4ec\"> $row[km_recorridos]</td>
							 <td bgcolor=\"6dc4ec\"> $row[km_recorridos_h]</td>
							 <td bgcolor=\"6dc4ec\">Proxima a Mantenimiento preventivo</td> ";
						}

						if($row[km_recorridos] < 4500 )
						{
							echo " <tr>
							
							<td > $row[placal_chuto]</td>
							<td > $row[unidad]</td>
							<td > $row[km_recorridos]</td>
							<td> $row[km_recorridos_h]</td>
							<td >Ninguno</td> ";
						}
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			
			<a style="position:absolute;left:150px;top:100px;width:150px;height:25px;z-index:23;text-align: center;color:#FFFFFF;" href="asignar_mant.php" class="btn-danger">Asignar Mantenimiento</a>
			<a target="_blank" style="position:absolute;left:320px;top:100px;width:150px;height:25px;z-index:23;text-align: center;color:#FFFFFF;" href="plan2.php" class="btn-primary">Plan de Mantenimiento</a>
			<a target="_blank" style="position:absolute;left:490px;top:100px;width:150px;height:25px;z-index:23;text-align: center;color:#FFFFFF;" href="plan3.php" class="btn-warning">Mantenimiento Realizados</a>
			
		</form>
	</div>
	<!-- ==============================================
			 JavaScript below! -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>