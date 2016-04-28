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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1350px;width:915px;height:16px;z-index:33;text-align:left;">
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
                    <a href="index_chuto.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel de Chuto</h3>
                            </div>
                        </a>
                </li>
                <li>
                    <a href="#">
                        <span class="ca-icon">&#43;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Agregar Chuto</h2>
                            <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                        </div>
                     </a>
                </li>
                <li>
                    <a href="Modificar_Chuto.php">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Chuto</h2>
                                <h3 class="ca-sub">Actualice un Registro</h3>
                            </div>
                    </a>
                </li>
                <li>
                    <a href="Consultar_Chuto.php">
                        <span class="ca-icon">&#76;</span>
                         <div class="ca-content">
                            <h2 class="ca-main">Consultar Chuto</h2>
                             <h3 class="ca-sub">Consulte un Registro</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="Eliminar_Chuto.php">
                        <span class="ca-icon">&#39;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Eliminar Chuto</h2>
                            <h3 class="ca-sub">Elimina un Registro</h3>
                        </div>
                    </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:950px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" enctype="multipart/form-data">
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Ingrese Datos del Nuevo Chuto
					</strong>
				</span>
			</div>

			<input type="text" placeholder="ejemplo A41AE1C" name="inputPlaca" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
			<div id="wb_Text4"  style="position:absolute;left:85px;top:80px;width:59px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Placa
					</strong>
				</span>
			</div>


			<input type="text" name="inputSerialC" style="position:absolute;left:215px;top:120px;width:198px;height:18px;line-height:18px;z-index:4;">
			<div id="wb_Text5" style="position:absolute;left:65px;top:120px;width:150px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Serial Carroceria
					</strong>
				</span>
			</div>

			<input type="text"  name="inputSerialM" style="position:absolute;left:215px;top:160px;width:198px;height:18px;line-height:18px;z-index:6;"  value="">
			<div id="wb_Text6" style="position:absolute;left:65px;top:160px;width:150px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Serial Motor
					</strong>
				</span>
			</div>

			<input type="text" placeholder="ejemplo 2010"name="inputModelo" style="position:absolute;left:215px;top:200px;width:198px;height:18px;line-height:18px;z-index:7;"  value="">
			<div id="wb_Text7" style="position:absolute;left:85px;top:200px;width:69px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Modelo
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:240px;width:129px;height:18px;line-height:18px;z-index:12;">
				<select name="inputMarca" class="span2">
					<?php
						$consulta="SELECT id_marca,nombre_marca FROM marca_chuto ORDER BY nombre_marca";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_marca]\">$row[nombre_marca]</option>";
						}
					?>	
				</select>
			</div>
			
			<div id="wb_Text13" style="position:absolute;left:85px;top:240px;width:33px;height:19px;z-index:15;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Marca
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:280px;width:153px;height:20px;z-index:23;">
				<select name="inputcondicion" class="span2">
					<?php
						$consulta="SELECT id_condicion,nombre_cond FROM condicion_chuto";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_condicion]\">$row[nombre_cond]</option>";
						}
					?>	
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:70px;top:280px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Condici&oacute;n
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:320px;width:153px;height:20px;z-index:23;">
				<select name="inputFlota" class="span2">
					<?php
						$consulta="SELECT id_flota,nombre_flota FROM flota ORDER BY nombre_flota";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_flota]\">$row[nombre_flota]</option>";
						}
					?>	
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:90px;top:320px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Flota
					</strong>
				</span>
			</div>

			<input type="file" name="foto" style="position:absolute;left:215px;top:360px;width:198px;height:30px;line-height:18px;z-index:7;">
			<div id="wb_Text7" style="position:absolute;left:60px;top:360px;width:169px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Anexo Certificado
					</strong>
				</span>
			</div>

			<input type="text" placeholder="ejemplo X-108"name="inputUnidad" style="position:absolute;left:215px;top:400px;width:198px;height:18px;line-height:18px;z-index:7;"  value="">
			<div id="wb_Text7" style="position:absolute;left:85px;top:400px;width:69px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Unidad
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:440px;width:153px;height:20px;z-index:23;">
				<select name="inputUbicacion" class="span2">
					<?php
						$consulta="SELECT id_ubicacion,nombre_ubicacion FROM ubicacion ORDER BY nombre_ubicacion";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_ubicacion]\">$row[nombre_ubicacion]</option>";
						}
					?>	
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:75px;top:440px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Ubicaci&oacute;n
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:480px;width:153px;height:20px;z-index:23;">
				<select name="inputEstatus" class="span2">
					<?php
						$consulta="SELECT id_estatus,nombre_estatus FROM estatus ORDER BY nombre_estatus";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_estatus]\">$row[nombre_estatus]</option>";
						}
					?>	
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:85px;top:480px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Estatus
					</strong>
				</span>
			</div>

			<textarea rows="5" class="input-block-level" type="text" name = "inputObservacion" style="position:absolute;left:215px;top:520px;width:230px;line-height:18px;z-index:7;"></textarea>
			<div id="wb_Text7" style="position:absolute;left:65px;top:520px;width:69px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Observaciones
					</strong>
				</span>
			</div>

			<button type="submit" name="b_agregar" style="position:absolute;left:166px;top:920px;width:96px;height:25px;z-index:23;" class="btn-danger">Registrar</button>
			
			<?php
				if(isset($_POST["b_agregar"]))
				{
					$placa			=$_POST["inputPlaca"];
					$serialc		=$_POST["inputSerialC"];
					$serialm		=$_POST["inputSerialM"];
					$modelo			=$_POST["inputModelo"];									
					$observacion	=$_POST["inputObservacion"];
					$marca			=$_POST["inputMarca"];
					$condicion		=$_POST["inputcondicion"];
					$flota			=$_POST["inputFlota"];
					$unidad			=$_POST["inputUnidad"];
					$ubicacion		=$_POST["inputUbicacion"];
					$estatus		=$_POST["inputEstatus"];
					$insertar="INSERT INTO chuto
							(placal_chuto,serial_carroceria,serial_motor,modelo,observaciones,marca_chuto_id_marca,condicion_chuto_id_condicion,
							flota_id_flota,unidad,ubicacion_id_ubicacion,estatus_id_estatus)
							VALUES('$placa','$serialc','$serialm','$modelo','$observacion','$marca','$condicion','$flota','$unidad','$ubicacion','$estatus')";

					if (!actualizar_bd($insertar)) 
					{
						echo "<div class=\"alert alert-error\">";
						echo "Error el Chuto no se ha podido crear!";
						echo "</div>";
					}
					else
					{
						echo "<div class=\"alert alert-success\">";
						mkdir("fotos_chutos/".$_POST["inputPlaca"]);
						$nombrefoto=$_FILES['foto']['name'];
						$ruta=$_FILES['foto']['tmp_name'];
						$consulta="SELECT placal_chuto FROM chuto WHERE placal_chuto='$_POST[inputPlaca]'";
						$res=consultar($consulta);
						$fila=mysql_fetch_array($res); 
						$destino = "fotos_chutos/"."$fila[placal_chuto]/".$nombrefoto;
						copy($ruta,$destino);
						mysql_query("update chuto set foto_chuto='$destino' WHERE placal_chuto='$_POST[inputPlaca]'");
						echo "El Chuto  ha sido creado exitosamente!";
						echo "</div>";
					}
					
						mysql_connect("localhost","root");
						mysql_select_db("ent");  
						$re=mysql_query("select foto_chuto from chuto WHERE placal_chuto='".(isset($_POST["inputPlaca"])? $_POST["inputPlaca"]:"")."'");
						while($f=mysql_fetch_array($re))
						{
							echo"<div id=\"wb_Image5\" style=\"position:absolute;left:100px;top:640px;width:250px;height:250px;z-index:18;\">
								<a href=\"Imagen_Chuto.php?id=".(isset($_POST["inputPlaca"])? $_POST["inputPlaca"]:"")."\" target= \"_blank\"><img class=\"img-polaroid\" src=\"".$f[0]."\" id=\"Image5\"  border=\"0\" style=\"width:250px;height:250px;\"></a></div>
								";
						}
				}

			?>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>