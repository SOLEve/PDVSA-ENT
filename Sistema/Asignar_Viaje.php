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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:650px;width:915px;height:16px;z-index:33;text-align:left;">
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
	
    <div class="container">
		<div class="content">
            <ul class="ca-menu">
				<li>
                    <a href="index_administrador.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:50px;width:460px;height:550px;z-index:40;overflow:auto">
		<form  method="post"  action="#" class="form-horizontal" >
			
			<div class="control-group" style="position:absolute;left:0px;top:0px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span3">
					<?php
						$consulta="SELECT Conductor_ID_Conductor FROM viajes WHERE v1_placal_chuto='' AND Conductor_ID_Conductor!='0' GROUP BY Conductor_ID_Conductor";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[Conductor_ID_Conductor]\">$row[Conductor_ID_Conductor]</option>";
						}
					?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:250px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>
			
			<div class="control-group" style="position:absolute;left:0px;top:50px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_pla" class="span3">
					<?php
						$consulta="SELECT placal_chuto FROM chuto";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[placal_chuto]\">$row[placal_chuto]</option>";
						}
					?>	
				</select>
			</div>
			
			
			<div class='control-group'>
				<table class='table table-striped'style="position:absolute;top:100px;width:100%;">
							<caption>
								<h4>Lista de Viajes sin chuto asignado</h4>
							</caption>
							<thead>
								<tr>
									<th style='text-align: center;'>Fecha</th>
									<th style='text-align: center;'>Hora</th>
									<th style='text-align: center;'>Conductor</th>
									<th style='text-align: center;'>Num Despacho</th>
								</tr>
  							</thead>
  						<tbody>
						<?php
							if(isset($_POST['b_consultar']))
							{
								$consulta="SELECT fecha_viaje,Hora_Salida,Conductor_ID_Conductor,Num_Despacho FROM viajes WHERE Conductor_ID_Conductor='".$_POST["sel_ced"]."'";
								$res=consultar($consulta);
								
								while($fila=mysql_fetch_array($res))
								{echo"
									<tr>
										<td style=\"text-align: center;\" >$fila[0] 	</td>
										<td style=\"text-align: center;\" >$fila[1]	</td>
										<td style=\"text-align: center;\" >$fila[2]	</td>
										<td style=\"text-align: center;\" >$fila[3]	</td>
									</tr>	";		
								}	
							}	

							if(isset($_POST['b_modificar']))
							{
								$cedula=$_POST["sel_ced"];
								$placa=$_POST["sel_pla"];
								
								$insertar="UPDATE viajes SET v1_placal_chuto='$placa' WHERE Conductor_ID_Conductor='$cedula'";
								actualizar_bd($insertar);
							}
						?>
						
						</tbody>
				</table>
			</div>
			<button type="submit" name="b_modificar" style="position:absolute;left:250px;top:50px;width:96px;height:25px;z-index:23;" class="btn-danger">Asignar</button>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>