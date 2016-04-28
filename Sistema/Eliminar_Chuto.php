<?php 
session_start(); 
	error_reporting(0);
	include("Librerias.php");
	error_reporting(0);
	
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:930px;width:915px;height:16px;z-index:33;text-align:left;">
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
                    <a href="Crear_Chuto.php">
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
                    <a href="#">
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
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<?php
				if(isset($_POST['b_consultar']))
				{
					$consulta="SELECT placal_chuto,serial_carroceria,serial_motor,modelo,marca_chuto_id_marca,condicion_chuto_id_condicion,flota_id_flota FROM chuto WHERE placal_chuto='".$_POST["sel_ced"]."'";
					$res=consultar($consulta);
					$fila=mysql_fetch_array($res);
					$_POST["inputPlaca"] =$fila[placal_chuto];
					$_POST["inputSerialC"] =$fila[serial_carroceria];
					$_POST["inputSerialM"] =$fila[serial_motor];
					$_POST["inputModelo"] =$fila[modelo];
					$_POST["inputMarca"] =$fila[marca_chuto_id_marca];
					$_POST["inputcondicion"] =$fila[condicion_chuto_id_condicion];
					$_POST["inputFlota"] =$fila[flota_id_flota];
				}
						
				if(isset($_POST["b_eliminar"]))
				{
					$eliminar="DELETE FROM chuto WHERE placal_chuto='".$_POST["inputPlaca"]."'";
					if (!actualizar_bd($eliminar))
					{
    					echo "<div class=\"alert alert-error\">";
  						echo "Error el chuto no se ha podido eliminar!";
						echo "</div>";
					}
					else
					{
						echo "<div class=\"alert alert-success\">";
  						echo "El chuto ha sido Eliminado exitosamente!";
						echo "</div>";
					}
				}
			
			?>
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Datos del Chuto a Eliminar
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span2">
					<?php
						$consulta="SELECT placal_chuto FROM chuto ORDER BY placal_chuto";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[placal_chuto]\">$row[placal_chuto]</option>";
						}
					?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:140px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>

			<div id="wb_Text4"  style="position:absolute;left:0px;top:80px;width:190px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Seleccione Placa
					</strong>
				</span>
			</div>

			<input readonly  type="text" name="inputPlaca" style="position:absolute;left:215px;top:115px;width:198px;height:18px;line-height:18px;z-index:1;" value="<?php echo $_POST["inputPlaca"];?>">
			<div id="wb_Text4"  style="position:absolute;left:20px;top:115px;width:59px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Placa
					</strong>
				</span>
			</div>

			<input readonly type="text" name="inputSerialC" style="position:absolute;left:215px;top:150px;width:198px;height:18px;line-height:18px;z-index:4;" value="<?php echo $_POST["inputSerialC"];?>">
			<div id="wb_Text5" style="position:absolute;left:30px;top:150px;width:150px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Serial Carroceria
					</strong>
				</span>
			</div>

			<input readonly type="text"  name="inputSerialM" style="position:absolute;left:215px;top:185px;width:198px;height:18px;line-height:18px;z-index:6;" value="<?php echo $_POST["inputSerialM"];?>">
			<div id="wb_Text6" style="position:absolute;left:30px;top:185px;width:150px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Serial Motor
					</strong>
				</span>
			</div>

			<input readonly type="text"  name="inputModelo" style="position:absolute;left:215px;top:220px;width:198px;height:18px;line-height:18px;z-index:7;"  value="<?php echo $_POST["inputModelo"];?>">
			<div id="wb_Text7" style="position:absolute;left:30px;top:220px;width:69px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Modelo
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:255px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputMarca"];?>">
				<select name="inputMarca" class="span2">
					<?php
						$consulta="SELECT id_marca,nombre_marca FROM marca_chuto WHERE id_marca='$_POST[inputMarca]'";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_marca]\">$row[nombre_marca]</option>";
						}
					?>																		
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:30px;top:255px;width:116px;height:19px;z-index:16;text-align:left;" >
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Marca
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:290px;width:153px;height:20px;z-index:23;" value="<?php echo $_POST["inputcondicion"];?>">
				<select name="inputcondicion" class="span2">
					<?php
						$consulta="SELECT id_condicion,nombre_cond FROM condicion_chuto WHERE id_condicion='$_POST[inputcondicion]'";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_condicion]\">$row[nombre_cond]</option>";
						}
					?>
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:30px;top:290px;width:116px;height:19px;z-index:16;text-align:left;" >
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Condici&oacute;n
					</strong>
				</span>
			</div>

			<div  class="control-group" style="position:absolute;left:215px;top:325px;width:153px;height:20px;z-index:23;" >
				<select name="inputFlota" class="span2">
					<?php
						$consulta="SELECT id_flota,nombre_flota FROM flota WHERE id_flota=$_POST[inputFlota]";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option selected >$row[nombre_flota]</option>";
						}
					?>
				</select>
			</div>
			
			<div id="wb_Text14" style="position:absolute;left:30px;top:325px;width:116px;height:19px;z-index:16;text-align:left;" >
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Flota
					</strong>
				</span>
			</div>
			
			<?php
				mysql_connect("localhost","root");
				mysql_select_db("ent");  
				$re=mysql_query("select foto_chuto from chuto WHERE placal_chuto='$_POST[inputPlaca]'");
				while($f=mysql_fetch_array($re))
				{
					echo"
						<div id=\"wb_Image5\" style=\"position:absolute;left:175px;top:360px;width:100px;height:150px;z-index:42;\">
						<a href=\"Imagen_Chuto.php?id=$_POST[inputPlaca]\" target= \"_blank\">
						<img class=\"img-polaroid\" src=\"".$f[foto_chuto]."\" id=\"Image5\"  border=\"0\" style=\"width:100px;height:150px;\"></a></div>
						";
				}
			?>
			<button type="submit" name="b_eliminar" style="position:absolute;left:166px;top:520px;width:96px;height:25px;z-index:23;" class="btn-danger">Eliminar</button>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>