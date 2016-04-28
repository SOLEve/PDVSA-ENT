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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:550px;width:915px;height:16px;z-index:33;text-align:left;">
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
                    <a href="Mantenimiento.php">
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

			
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:500px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
			
			<div id="wb_Text3" style="position:absolute;left:325px;top:45px;width:450px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Cantidad de Viajes de Conductores
					</strong>
				</span>
			</div>
			
			<p style="position:absolute;left:20px;top:90px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Fecha de Mantenimiento</strong></span><input name="inputFecha1" type="text" id="datepicker1"></p> 
				<button type="submit" name="b_consultar" class="btn-danger" style="position:absolute;left:500px;top:100px;">Asignar Mantenimiento</button>

					<?php
							if(isset($_POST['b_consultar']))
							{
								$fecha=$_POST["inputFecha1"];
								$placa=$_POST["sel_ced"];
								
								$consulta="SELECT sum(distancia_cli) as suma  FROM viajes JOIN cliente WHERE fecha_viaje >='$fecha' 
								AND v1_placal_chuto='$placa' AND Cliente_ID_Cli=id_cli";
								$res=consultar($consulta);
							    $row=mysql_fetch_array($res);
								$distancia=$row[0];
								$distancia = number_format($distancia, 2, '.', '');

								$act="UPDATE chuto SET km_recorridos = '$distancia'	WHERE placal_chuto = '$placa'";
								actualizar_bd1($act);
								
								$insertar="INSERT INTO Mantenimiento_chutos (Fecha_Mantenimiento,Placal_chuto ) VALUES ('$fecha','$placa')";
								if (!actualizar_bd($insertar)) 
								{
									echo "<div class=\"alert alert-error\">";
									echo "Error! Este chuto ya tiene este mantenimiento asignado!";
									echo "</div>";
								}else
									{
										echo "<div class=\"alert alert-success\">";
										echo "Exito! El Mantenimiento se ha agregado al chuto";
										echo "</div>";
									}
							}	
					?>

			<p style="position:absolute;left:30px;top:130px;font-family:'Bookman Old Style';font-size:12px;"><span><strong>Placa de Chuto</strong></span></p>
			<div class="control-group" style="position:absolute;left:180px;top:130px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span3">
					<?php
						$consulta="SELECT placal_chuto,unidad FROM chuto ORDER BY km_recorridos DESC";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[placal_chuto]\">$row[placal_chuto]</option>";
						}
					?>		
				</select>
			</div>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script src="jquery-1.5.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>

	<script> 
			$(function() {
				$( "#datepicker1" ).datepicker();
			});
	</script> 		
</body>
</html>