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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1330px;width:915px;height:16px;z-index:33;text-align:left;">
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
                        <a href="#">
                            <span class="ca-icon">&#43;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Agregar Cliente</h2>
                                <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Modificar_Cliente.php">
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
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:950px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Ingrese Datos del Nuevo Cliente
					</strong>
				</span>
			</div>

			<input type="text" name="inputCodigo" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
			<div id="wb_Text4" style="position:absolute;left:5px;top:80px;width:80px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Codigo *
					</strong>
				</span>
			</div>


			<input type="text" name="inputNombre" style="position:absolute;left:215px;top:120px;width:198px;height:18px;line-height:18px;z-index:4;">
			<div id="wb_Text5" style="position:absolute;left:5px;top:120px;width:69px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Nombre
					</strong>
				</span>
			</div>

			<input type="text"  name="inputRif" style="position:absolute;left:215px;top:160px;width:198px;height:18px;line-height:18px;z-index:6;"  value="">
			<div id="wb_Text6" style="position:absolute;left:5px;top:160px;width:69px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						RIF
					</strong>
				</span>
			</div>

			<input type="text"  name="inputRazon" style="position:absolute;left:215px;top:200px;width:198px;height:18px;line-height:18px;z-index:7;"  value="">
			<div id="wb_Text7" style="position:absolute;left:5px;top:200px;width:150px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Razón Social
					</strong>
				</span>
			</div>

			<input type="text" name="inputDireccion" style="position:absolute;left:215px;top:240px;width:198px;height:18px;line-height:18px;z-index:9;"  value="">
			<div id="wb_Text8" style="position:absolute;left:5px;top:240px;width:63px;height:19px;z-index:10;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Dirección
					</strong>
				</span>
			</div>

			<input type="text"  name="inputTelefono" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:280px;width:198px;height:18px;line-height:18px;z-index:11;"  value="">
			<div id="wb_Text9" style="position:absolute;left:5px;top:280px;width:48px;height:19px;z-index:19;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Teléfono
					</strong>
				</span>
			</div>

			<input type="text" name="inputDistancia" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:320px;width:198px;height:18px;line-height:18px;z-index:13;"  value="">
			<div id="wb_Text12" style="position:absolute;left:5px;top:320px;width:220px;height:19px;z-index:14;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Distancia Ida y Vuelta (Km)
					</strong>
				</span>
			</div>

			<input type="date" name="inputTiempo" style="position:absolute;left:215px;top:360px;width:198px;height:18px;line-height:18px;z-index:13;"  value="">
			<div id="wb_Text12" style="position:absolute;left:5px;top:360px;width:220px;height:19px;z-index:14;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Tiempo Ida y Vuelta (Hrs)
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:400px;width:129px;height:18px;line-height:18px;z-index:12;">
				<select name="inputTipo" class="span3">
					<option selected value="0">Seleccione Tipo de Cliente...</option>
						<?php
							$consulta="SELECT id_tipo,nombre_tipo FROM tipo_cliente ORDER BY nombre_tipo";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_tipo]\">$row[nombre_tipo]</option>";
							}
						?>	
				</select>
			</div>
			
			<div id="wb_Text13" style="position:absolute;left:5px;top:400px;width:120px;height:19px;z-index:15;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Tipo Cliente *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:450px;width:153px;height:20px;z-index:23;">
				<select name="inputMayorista" class="span3">
					<option selected value="0">Seleccione Mayorista...</option>
						<?php
							$consulta="SELECT id_mayorista,nombre_may FROM mayorista ORDER BY nombre_may";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_mayorista]\">$row[nombre_may]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:450px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Mayorista *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:500px;width:153px;height:20px;z-index:23;">
				<select name="inputEstado" class="span3">
					<option selected value="0">Seleccione Estado...</option>
						<?php
							$consulta="SELECT id_edo,nombre_edo FROM estado ORDER BY nombre_edo";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_edo]\">$row[nombre_edo]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:500px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Estado *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:550px;width:153px;height:20px;z-index:23;">
				<select name="inputMcpio" class="span3">
					<option selected value="0">Seleccione Municipio...</option>
						<?php
							$consulta="SELECT id_mcpio,nombre_mcpio FROM municipio ORDER BY nombre_mcpio";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_mcpio]\">$row[nombre_mcpio]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:550px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Municipio *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:600px;width:153px;height:20px;z-index:23;">
				<select name="inputCiudad" class="span3">
					<option selected value="0">Seleccione Ciudad...</option>
						<?php
							$consulta="SELECT id_ciudad,nombre_ciudad FROM ciudad ORDER BY nombre_ciudad";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_ciudad]\">$row[nombre_ciudad]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:600px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Ciudad *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:650px;width:153px;height:20px;z-index:23;">
				<select name="inputDtto" class="span3">
					<option selected value="0">Seleccione Distrito...</option>
						<?php
							$consulta="SELECT id_dtto,nombre_dtto FROM distrito ORDER BY nombre_dtto";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_dtto]\">$row[nombre_dtto]</option>";
							}
						?>	
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:5px;top:650px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Distrito *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:700px;width:153px;height:20px;z-index:23;">
				<select name="inputSede" class="span3">
					<option selected value="0">Seleccione Sede...</option>
						<?php
							$consulta="SELECT id_sede,nombre_sede FROM sede ORDER BY nombre_sede";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_sede]\">$row[nombre_sede]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:700px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Sede *
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:750px;width:153px;height:20px;z-index:23;">
				<select name="inputZona" class="span3">
					<option selected value="0">Seleccione Zona Comercial...</option>
						<?php
							$consulta="SELECT id_zona,nombre_zona FROM zona_com ORDER BY nombre_zona";
							$res=consultar($consulta);
							while($row=mysql_fetch_array($res))
							{
								echo "<option value=\"$row[id_zona]\">$row[nombre_zona]</option>";
							}
						?>	
				</select>
			</div>
			<div id="wb_Text14" style="position:absolute;left:5px;top:750px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Zona Comercial *
					</strong>
				</span>
			</div>

			<div id="wb_Text14" style="position:absolute;left:5px;top:820px;width:200px;height:19px;z-index:16;text-align:left;">
			<span style="color:#FF0000;font-family:Arial;font-size:17px;">
					<strong>
						(*) Campos Oligatorios
					</strong>
				</span>
			</div>
			
			<button type="submit" name="b_agregar" style="position:absolute;left:166px;top:850px;width:96px;height:25px;z-index:23;" class="btn-danger">Agregar</button>
				<?php
					if(isset($_POST["b_agregar"]))
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
						$insertar="INSERT 
									INTO cliente
									(id_cli,nombre_cli,rif_cli,razon_social_cli,direccion_cli,telefono_cli,distancia_cli,tiempo_cli,mayorista_id_mayorista,distrito_id_dtto,estado_id_edo,ciudad_id_ciudad,sede_id_sede,tipo_cliente_id_tipo,zona_com_id_zona,municipio_id_mcpio)
									VALUES('$cod','$nom','$rif','$raz','$dir','$tel','$dis','$tie','$may','$dto','$edo','$ciu','$sed','$tip','$zon','$mun')";
						if (!actualizar_bd($insertar)) 
						{
    						echo "<div class=\"alert alert-error\">";
  							echo "Error el Cliente no se ha podido crear!";
							echo "</div>";
						}
						else
						{
							echo "<div class=\"alert alert-success\">";
  							echo "El Cliente ".$cod." ha sido creado exitosamente!";
							echo "</div>";
						}
					}
				?>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript">
   
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
</script>
</body>
</html>