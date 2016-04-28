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
			$inputcedula=NULL;
			$inputnombre=NULL;
			$inputapellido=NULL;
			$inputtelefono=NULL;
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
                    <a href="index_Conductor.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel de Usuario</h3>
                            </div>
                        </a>
                </li>
                <li>
                    <a href="Crear_Conductor.php">
                        <span class="ca-icon">&#43;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Agregar Conductor</h2>
                            <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                        </div>
                     </a>
                </li>
                <li>
                    <a href="#">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Conductor</h2>
                                <h3 class="ca-sub">Actualice un Registro</h3>
                            </div>
                    </a>
                </li>
                <li>
                    <a href="Consultar_Conductor.php">
                        <span class="ca-icon">&#76;</span>
                         <div class="ca-content">
                            <h2 class="ca-main">Consultar Conductor</h2>
                             <h3 class="ca-sub">Consulte un Registro</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="Eliminar_Conductor.php">
                        <span class="ca-icon">&#39;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Eliminar Conductor</h2>
                            <h3 class="ca-sub">Elimina un Registro</h3>
                        </div>
                    </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" enctype="multipart/form-data">
			
			
			<?php
				
				if(isset($_POST['b_consultar']))
				{
					$consulta="SELECT id_conductor,nombre,apellido,telefono,foto FROM conductor WHERE id_conductor='".$_POST["sel_ced"]."'";
					$res=consultar1($consulta);
					$fila=mysqli_fetch_row($res);
					$_POST["inputCedula"] =$fila[0];
					$_POST["inputNombre"] =$fila[1];
					$_POST["inputApellido"] =$fila[2];
					$_POST["inputTelefono"] =$fila[3];
					$_POST["foto"] =$fila[4];
					
					mysql_connect("localhost","root");
					mysql_select_db("ent");  
					
					$consulta="select foto from conductor WHERE id_conductor=".$_POST["inputCedula"];
					$res=consultar($consulta);
					while($f=mysql_fetch_array($res))
					{
						echo"<div id=\"wb_Image5\" style=\"position:absolute;left:125px;top:300px;width:200px;height:150px;z-index:42;\">
							<img class=\"img-polaroid\" src=\"".$f[0]."\" id=\"Image5\"  border=\"0\" style=\"width:200px;height:200px;\"></div>";
					}
					
					$inputcedula=$_POST["inputCedula"];
					$inputnombre=$_POST["inputNombre"];
					$inputapellido=$_POST["inputApellido"];
					$inputtelefono=$_POST["inputTelefono"];

				}
						
				if(isset($_POST['b_modificar']))
				{
					
					$ced=$_POST["inputCedula"];
					$nom=$_POST["inputNombre"];
					$ape=$_POST["inputApellido"];
					$tel=$_POST["inputTelefono"];
					$cod1=$_POST["sel_ced"];
					$act="UPDATE conductor SET id_conductor='$ced',nombre='$nom',apellido='$ape',telefono='$tel' WHERE id_conductor='$cod1'";
					if (!actualizar_bd($act)) 
					{
    					echo "<div class=\"alert alert-error\">";
  						echo "Error el Conductor no se ha podido modificar!";
						echo "</div>";
					}
					else
					{
						if($_FILES['foto']['tmp_name']!="")
						{
							$nombrefoto=$_FILES['foto']['name'];
							$ruta=$_FILES['foto']['tmp_name'];
							$consulta="SELECT id_conductor FROM conductor WHERE id_conductor=".$ced;
							$res=consultar1($consulta);
							$fila=mysqli_fetch_row($res); 
														
							if (!file_exists("fotos_conductor/".$ced)) 
							{
								mkdir("fotos_conductor/".$ced);
								$destino = "fotos_conductor/"."$fila[0]/".$nombrefoto;
								copy($ruta,$destino);
								mysql_query("update conductor set foto='$destino' WHERE id_conductor=".$ced);
							}
							else 
							{
								$destino = "fotos_conductor/"."$fila[0]/".$nombrefoto;
								copy($ruta,$destino);
								mysql_query("update conductor set foto='$destino' WHERE id_conductor=".$ced);								
							}
							

						}
						echo "<div class=\"alert alert-success\">";
  						echo "El Conductor ".$ced." ha sido Modificado exitosamente!";
						echo "</div>";
					}
				}
			?>
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Datos del Conductor a Modificar
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span2">
					<?php
						echo"<option selected value=\"$_POST[sel_ced]\">$_POST[sel_ced]</option>";
						
						$consulta="SELECT id_conductor FROM conductor ORDER BY id_conductor";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_conductor]\">$row[id_conductor]</option>";
						}
					?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:140px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>

			<div id="wb_Text4"  style="position:absolute;left:0px;top:80px;width:190px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Seleccione Cedula
					</strong>
				</span>
			</div>

			<input type="text" placeholder="V-00003300" name="inputCedula" style="position:absolute;left:215px;top:115px;width:198px;height:18px;line-height:18px;z-index:1;" value="<?php echo $inputcedula; ?>">
			<div id="wb_Text4"  style="position:absolute;left:20px;top:115px;width:150px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Cedula Conductor
					</strong>
				</span>
			</div>

			<input type="text" name="inputNombre" style="position:absolute;left:215px;top:150px;width:198px;height:18px;line-height:18px;z-index:4;" value="<?php echo $inputnombre;?>">
			<div id="wb_Text5" style="position:absolute;left:25px;top:150px;width:200px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Nombre Conductor
					</strong>
				</span>
			</div>

			<input type="text"  name="inputApellido" style="position:absolute;left:215px;top:185px;width:198px;height:18px;line-height:18px;z-index:6;" value="<?php echo $inputapellido; ?>">
			<div id="wb_Text6" style="position:absolute;left:25px;top:185px;width:200px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Apellido Conductor
					</strong>
				</span>
			</div>

			<input type="text"  name="inputTelefono" style="position:absolute;left:215px;top:220px;width:198px;height:18px;line-height:18px;z-index:7;"  value="<?php echo $inputtelefono; ?>">
			<div id="wb_Text7" style="position:absolute;left:25px;top:220px;width:200px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Telefono Conductor
					</strong>
				</span>
			</div>

			<button type="submit" name="b_modificar" style="position:absolute;left:166px;top:520px;width:96px;height:25px;z-index:23;" class="btn-danger">Modificar</button>

			<input type="file" name="foto" style="position:absolute;left:215px;top:250px;width:198px;height:30px;line-height:18px;z-index:7;" >
			<div id="wb_Text7" style="position:absolute;left:25px;top:250px;width:200px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Foto Conductor
					</strong>
				</span>
			</div>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>