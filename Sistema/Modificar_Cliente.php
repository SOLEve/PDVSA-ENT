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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1560px;width:915px;height:16px;z-index:33;text-align:left;">
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
                        <a href="index_cliente.php">
                            <span class="ca-icon">F</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Atrás</h2>
                                <h3 class="ca-sub">Regrese al Panel Cliente</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Crear_Cliente.php">
                            <span class="ca-icon">&#43;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Agregar Cliente</h2>
                                <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Cliente</h2>
                                <h3 class="ca-sub">Actualice Información de un Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Consultar_Cliente.php">
                            <span class="ca-icon">&#76;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Consultar Cliente</h2>
                                <h3 class="ca-sub">Realice una Búsqueda de un Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Eliminar_Cliente.php">
                            <span class="ca-icon">&#39;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Eliminar Cliente</h2>
                                <h3 class="ca-sub">Elimina un Registro</h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!-- content -->
        </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:1180px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<?php
				if(isset($_POST['b_consultar']))
				{
					$consulta="
						SELECT id_cli,nombre_cli,rif_cli,razon_social_cli,direccion_cli,telefono_cli,distancia_cli,tiempo_cli,
						mayorista_id_mayorista,distrito_id_dtto,estado_id_edo,ciudad_id_ciudad,sede_id_sede,tipo_cliente_id_tipo,zona_com_id_zona,municipio_id_mcpio,
						lat,lon
						FROM cliente 
						WHERE id_cli='".$_POST["sel_ced"]."'";
										
					$res=consultar($consulta);
					$fila=mysql_fetch_array($res);
					$_POST["inputCodigo"] =$fila[id_cli];
					$_POST["inputNombre"] =$fila[nombre_cli];
					$_POST["inputRif"] =$fila[rif_cli];
					$_POST["inputRazon"] =$fila[razon_social_cli];
					$_POST["inputDireccion"] =$fila[direccion_cli];
					$_POST["inputTelefono"] =$fila[telefono_cli];
					$_POST["inputDistancia"] =$fila[distancia_cli];
					$_POST["inputTiempo"] =$fila[tiempo_cli];
					$_POST["inputMayorista"] =$fila[mayorista_id_mayorista];
					$_POST["inputDtto"] =$fila[distrito_id_dtto];
					$_POST["inputEstado"] =$fila[estado_id_edo];
					$_POST["inputCiudad"] =$fila[ciudad_id_ciudad];
					$_POST["inputSede"] =$fila[sede_id_sede];
					$_POST["inputTipo"] =$fila[tipo_cliente_id_tipo];
					$_POST["inputZona"] =$fila[zona_com_id_zona];
					$_POST["inputMcpio"] =$fila[municipio_id_mcpio];
						
					echo"<iframe 
						class=\"img-polaroid\"
						style=\"position:absolute;left:05px;top:800px;\"
						width=\"440\" 
						height=\"350\" 
						frameborder=\"0\" 
						scrolling=\"no\" 
						marginheight=\"0\" 
						marginwidth=\"0\" 
						src=\"http://maps.google.com/maps?f=q&amp;
						source=s_q&amp;
						hl=es&amp;
						geocode=&amp;
						q=$fila[lat],$fila[lon]&amp;
						aq=&amp;
						sll=9.416548,-71.477051&amp;
						sspn=5.698653,10.755615&amp;
						ie=UTF8&amp;t=m&amp;z=14&amp;
						ll=$fila[lat],$fila[lon]&amp;
						output=embed\">
						</iframe>";
				}
									
				if(isset($_POST['b_modificar']))
				{
					$cod=$_POST["inputCodigo"];
					$nom=$_POST["inputNombre"];
					$rif=$_POST["inputRif"];
					$raz=$_POST["inputRazon"];
					$dir=$_POST["inputDireccion"];
					$tel=$_POST["inputTelefono"];
					$dis=$_POST["inputDistancia"];
					$tie=$_POST["inputTiempo"];
					$may=$_POST["inputMayorista"];
					$dto=$_POST["inputDtto"];
					$edo=$_POST["inputEstado"];
					$ciu=$_POST["inputCiudad"];
					$sed=$_POST["inputSede"];
					$tip=$_POST["inputTipo"];
					$zon=$_POST["inputZona"];
					$mun=$_POST["inputMcpio"];
					$cod1=$_POST["sel_ced"];
					$act=" 
						UPDATE cliente SET				
						id_cli='$cod',
						nombre_cli='$nom',
						rif_cli='$rif',
						razon_social_cli='$raz',
						direccion_cli='$dir',
						telefono_cli='$tel',
						distancia_cli='$dis',
						tiempo_cli='$tie',
						mayorista_id_mayorista='$may',
						distrito_id_dtto='$dto',
						estado_id_edo='$edo',
						ciudad_id_ciudad='$ciu',
						sede_id_sede='$sed',
						tipo_cliente_id_tipo='$tip',
						zona_com_id_zona='$zon',
						municipio_id_mcpio='$mun'
						WHERE id_cli='$cod1'";							
										
					if (!actualizar_bd($act)) 
					{
						echo "<div class=\"alert alert-error\">";
						echo "Error el cliente no se ha podido modificar!";
						echo "</div>";
					}
					else
					{
						echo "<div class=\"alert alert-success\">";
						echo "El cliente ".$cod." ha sido Modificado exitosamente!";
						echo "</div>";
					}
				}
			?>
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Datos del Cliente a Modificar
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span2">
					<?php
						$consulta="SELECT id_cli FROM cliente ORDER BY id_cli";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_cli]\">$row[id_cli]</option>";
						}
					?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:140px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>
			
			<div id="wb_Text4"  style="position:absolute;left:0px;top:80px;width:190px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Seleccione Código
					</strong>
				</span>
			</div>

			<input type="text" name="inputCodigo" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:120px;width:198px;height:18px;line-height:18px;z-index:1;"value="<?php echo $_POST["inputCodigo"];?>">
			<div id="wb_Text4" style="position:absolute;left:5px;top:120px;width:80px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Código
					</strong>
				</span>
			</div>


			<input type="text" name="inputNombre" style="position:absolute;left:215px;top:160px;width:198px;height:18px;line-height:18px;z-index:4;" value="<?php echo $_POST["inputNombre"];?>">
			<div id="wb_Text5" style="position:absolute;left:15px;top:160px;width:69px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Nombre
					</strong>
				</span>
			</div>

			<input type="text"  name="inputRif" style="position:absolute;left:215px;top:200px;width:198px;height:18px;line-height:18px;z-index:6;"  value="<?php echo $_POST["inputRif"];?>">
			<div id="wb_Text6" style="position:absolute;left:15px;top:200px;width:69px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						RIF
					</strong>
				</span>
			</div>

			<input type="text"  name="inputRazon" style="position:absolute;left:215px;top:240px;width:198px;height:18px;line-height:18px;z-index:7;"  value="<?php echo $_POST["inputRazon"];?>">
			<div id="wb_Text7" style="position:absolute;left:15px;top:240px;width:150px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Razón Social
					</strong>
				</span>
			</div>

			<input type="text" name="inputDireccion" style="position:absolute;left:215px;top:280px;width:198px;height:18px;line-height:18px;z-index:9;"  value="<?php echo $_POST["inputDireccion"];?>">
			<div id="wb_Text8" style="position:absolute;left:15px;top:280px;width:63px;height:19px;z-index:10;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Dirección
					</strong>
				</span>
			</div>

			<input type="text"  name="inputTelefono" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:320px;width:198px;height:18px;line-height:18px;z-index:11;"  value="<?php echo $_POST["inputTelefono"];?>">
			<div id="wb_Text9" style="position:absolute;left:15px;top:320px;width:48px;height:19px;z-index:19;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Teléfono
					</strong>
				</span>
			</div>

			<input type="text" name="inputDistancia" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:360px;width:198px;height:18px;line-height:18px;z-index:13;"  value="<?php echo $_POST["inputDistancia"];?>">
			<div id="wb_Text12" style="position:absolute;left:5px;top:360px;width:220px;height:19px;z-index:14;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Distancia Ida y Vuelta (Km)
					</strong>
				</span>
			</div>

			<input type="text" name="inputTiempo" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:400px;width:198px;height:18px;line-height:18px;z-index:13;"  value="<?php echo $_POST["inputTiempo"];?>">
			<div id="wb_Text12" style="position:absolute;left:5px;top:400px;width:220px;height:19px;z-index:14;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Tiempo Ida y Vuelta (Hrs)
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:440px;width:129px;height:18px;line-height:18px;z-index:12;" value="<?php echo $_POST["inputTiempo"];?>">
				<select name="inputTipo" class="span3">
					<option selected value="0">Seleccione Tipo de Cliente...</option>
						<?php
							$consulta="SELECT id_tipo,nombre_tipo FROM tipo_cliente ORDER BY nombre_tipo";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_tipo]\">$row[nombre_tipo]</option>";
							}
							$consulta="SELECT id_tipo,nombre_tipo FROM tipo_cliente WHERE id_tipo='$_POST[inputTipo].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_tipo]\">$row[nombre_tipo]</option>";
							} 
						?>	
				</select>
			</div>
			
			<div id="wb_Text13" style="position:absolute;left:15px;top:440px;width:120px;height:19px;z-index:15;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Tipo Cliente
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:480px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputMayorista"];?>">
				<select name="inputMayorista" class="span3">
					<option selected value="0">Seleccione Mayorista...</option>
						<?php
							$consulta="SELECT id_mayorista,nombre_may FROM mayorista ORDER BY nombre_may";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_mayorista]\">$row[nombre_may]</option>";
							}
							$consulta="SELECT id_mayorista,nombre_may FROM mayorista WHERE id_mayorista='$_POST[inputMayorista].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
							echo"<option selected value=\"$row[id_mayorista]\">$row[nombre_may]</option>";
							} 
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:480px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Mayorista
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:520px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputEstado"];?>">
				<select name="inputEstado" class="span3">
					<option selected value="0">Seleccione Estado...</option>
						<?php
							$consulta="SELECT id_edo,nombre_edo FROM estado ORDER BY nombre_edo";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_edo]\">$row[nombre_edo]</option>";
							}
							$consulta="SELECT id_edo,nombre_edo FROM estado WHERE id_edo='$_POST[inputEstado].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_edo]\">$row[nombre_edo]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:520px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Estado
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:560px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputMcpio"];?>">
				<select name="inputMcpio" class="span3">
					<option selected value="0">Seleccione Municipio...</option>
						<?php
							$consulta="SELECT id_mcpio,nombre_mcpio FROM municipio ORDER BY nombre_mcpio";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_mcpio]\">$row[nombre_mcpio]</option>";
							}
							$consulta="SELECT id_mcpio,nombre_mcpio FROM municipio WHERE id_mcpio='$_POST[inputMcpio].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_mcpio]\">$row[nombre_mcpio]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:560px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Municipio
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:600px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputCiudad"];?>">
				<select name="inputCiudad" class="span3">
					<option selected value="0">Seleccione Ciudad...</option>
						<?php
							$consulta="SELECT id_ciudad,nombre_ciudad FROM ciudad ORDER BY nombre_ciudad";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_ciudad]\">$row[nombre_ciudad]</option>";
							}
							$consulta="SELECT id_ciudad,nombre_ciudad FROM ciudad WHERE id_ciudad='$_POST[inputCiudad].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_ciudad]\">$row[nombre_ciudad]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:600px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Ciudad
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:640px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputDtto"];?>">
				<select name="inputDtto" class="span3">
					<option selected value="0">Seleccione Distrito...</option>
						<?php
							$consulta="SELECT id_dtto,nombre_dtto FROM distrito ORDER BY nombre_dtto";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_dtto]\">$row[nombre_dtto]</option>";
							}
							$consulta="SELECT id_dtto,nombre_dtto FROM distrito WHERE id_dtto='$_POST[inputDtto].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_dtto]\">$row[nombre_dtto]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:640px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Distrito
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:680px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputSede"];?>">
				<select name="inputSede" class="span3">
					<option selected value="0">Seleccione Sede...</option>
						<?php
							$consulta="SELECT id_sede,nombre_sede FROM sede ORDER BY nombre_sede";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_sede]\">$row[nombre_sede]</option>";
							}
							$consulta="SELECT id_sede,nombre_sede FROM sede WHERE id_sede='$_POST[inputSede].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_sede]\">$row[nombre_sede]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:680px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Sede
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:720px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputZona"];?>">
				<select name="inputZona" class="span3">
					<option selected value="0">Seleccione Zona Comercial...</option>
						<?php
							$consulta="SELECT id_zona,nombre_zona FROM zona_com ORDER BY nombre_zona";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_zona]\">$row[nombre_zona]</option>";
							}
							$consulta="SELECT id_zona,nombre_zona FROM zona_com WHERE id_zona='$_POST[inputZona].'";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo"<option selected value=\"$row[id_zona]\">$row[nombre_zona]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:15px;top:720px;width:150px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Zona Comercial
					</strong>
				</span>
			</div>

			<button type="submit" name="b_modificar" style="position:absolute;left:166px;top:760px;width:96px;height:25px;z-index:23;" class="btn-danger">Modificar</button>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>