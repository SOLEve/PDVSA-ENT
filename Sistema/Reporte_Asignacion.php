<?php 
session_start(); error_reporting(0);
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
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="demos.css">
	
	<script src="jquery-1.5.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>

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
						  <div class="control-group">
                              <table class="table" style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:0px;top:80px;width: 100%; height: 15">
  							<caption>
  							<h4>Reporte de Conductores</h4>
  							</caption>
  							<thead>
    							<tr>
      								<th style="text-align: center;" border="1">Cedula</th>
      								<th style="text-align: center;" border="1">Nombre</th>
      								<th style="text-align: center;" border="1">Apellido</th>
									<th style="text-align: center;" border="1">Chuto Asignado</th>
									<th style="text-align: center;" border="1">Condición</th>
    							</tr>
  							</thead>
						<tbody>
						<?php

									echo "<a style=\"position:absolute;left:50px;top:20px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar5.php\" class=\"btn-success\">Exportar Excel</a>";
										
										
										$consulta = "SELECT id_conductor,nombre,apellido,chuto_placal_chuto
													FROM ch_cd
													INNER JOIN conductor
													WHERE conductor_id_conductor=id_conductor
													ORDER BY chuto_placal_chuto";
										
										$res=consultar($consulta);
										while($row=mysql_fetch_array($res))
										{
												$consulta1="SELECT condicion_chuto_id_condicion FROM chuto WHERE placal_chuto='$row[chuto_placal_chuto]'";
												$res1=consultar($consulta1);
												$fila=mysql_fetch_array($res1);
												$condicion=$fila[condicion_chuto_id_condicion];
											
											if($condicion==1){	
											echo " <tr>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[id_conductor] 	</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[nombre] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[apellido] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[chuto_placal_chuto] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">Solo		</td>
												</tr>";
												}
											
											if($condicion==2){	
											echo " <tr>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[id_conductor] 	</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[nombre] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[apellido] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[chuto_placal_chuto] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">Dupla		</td>
												</tr>";
												}
										 }

						?>
				</tbody>
			</table>
		</div>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>