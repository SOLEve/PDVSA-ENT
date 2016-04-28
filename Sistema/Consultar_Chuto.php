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

	$cant_reg = 9; 
	$num_pag = $_GET["pagina"];
	if (!$num_pag) 
	{ 
		$comienzo = 0; 
		$num_pag = 1; 
	}else 
	{ 
		$comienzo = ($num_pag - 1) * $cant_reg; 
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
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:20px;top:180px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:20px;top:50px;width:139px;height:32px;z-index:37;text-align:left;">
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
                    <a href="#">
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
	
	<div id="wb_Form1" style="position:absolute;left:25px;top:350px;width:1300px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
				<div class="control-group">
					<label class="control-label" for="inputCedula" >Placa Chuto</label>
						<div class="controls">
							<input type="text" name="input_usu" id="input_usu" value="Ingrese Placa del Chuto" value="*" onClick="this.value='';">
				      	    <button type="submit" name="b_consultar" class="btn-danger">Consultar</button>
                        </div>
				</div>
			
				<div class="control-group">
                    <table class="table table-striped" style="width: 100%; height: 15;text-align: center;">
  						<caption>
  							<h4>Lista de Chutos Registrados</h4>
  						</caption>
  						<thead>
    						<tr>
      							<th>Placa</th>
      							<th>Serial Carroceria</th>
      							<th>Serial Motor</th>
								<th>Modelo</th>
								<th>Marca</th>
								<th>Condici&oacute;n</th>
								<th>Flota</th>
								<th>Unidad</th>
								<th>Ubicaci&oacute;n</th>
								<th>Estatus</th>
    						</tr>
  						</thead>
  						<tbody>
							<?php
								if(isset($_POST['b_consultar']))
								{
									$num_pag=0;
								}
								if(isset($_POST['b_consultar'])|| $_GET["pagina"]>0)
								{
								
									$consulta="SELECT
									placal_chuto,
									serial_carroceria,
									serial_motor,
									modelo,
									nombre_marca,
									nombre_cond,
									nombre_flota,
									unidad,
									nombre_ubicacion,
									nombre_estatus
									FROM chuto 
									INNER JOIN marca_chuto
									INNER JOIN condicion_chuto
									INNER JOIN flota
									INNER JOIN ubicacion
									INNER JOIN estatus
									WHERE placal_chuto LIKE '%".$_POST["input_usu"]."%' 
									AND marca_chuto_id_marca = id_marca	
									AND condicion_chuto_id_condicion = id_condicion	
									AND flota_id_flota=id_flota
									AND ubicacion_id_ubicacion=id_ubicacion
									AND estatus_id_estatus=id_estatus
									ORDER BY placal_chuto";
															
									if($_POST['input_usu']=="todos")
									{
										$_GET[input]="todos";
									}
									
									if($_GET[input]=="todos")
									{
										$resultado = "SELECT *,COUNT(*) AS cant FROM chuto ";
										$consulta = "SELECT
										placal_chuto,
										serial_carroceria,
										serial_motor,
										modelo,
										nombre_marca,
										nombre_cond,
										nombre_flota,
										unidad,
										nombre_ubicacion,
										nombre_estatus
										FROM chuto 
										INNER JOIN marca_chuto
										INNER JOIN condicion_chuto
										INNER JOIN flota
										INNER JOIN ubicacion
										INNER JOIN estatus
										WHERE marca_chuto_id_marca = id_marca
										AND condicion_chuto_id_condicion = id_condicion	
										AND flota_id_flota=id_flota
										AND ubicacion_id_ubicacion=id_ubicacion
										AND estatus_id_estatus=id_estatus
										ORDER BY placal_chuto 
										LIMIT $comienzo, $cant_reg";
										$input1="todos";
									}

									if($_POST['input_usu']==null && $_GET[input]!="todos")
									{
										$resultado = "SELECT *,COUNT(*) AS cant FROM chuto WHERE placal_chuto LIKE '%".$_GET["input"]."%'";
										$consulta = "SELECT 
										placal_chuto,
										serial_carroceria,
										serial_motor,
										modelo,
										nombre_marca,
										nombre_cond,
										nombre_flota,
										unidad,
										nombre_ubicacion,
										nombre_estatus
										FROM chuto 
										INNER JOIN marca_chuto
										INNER JOIN condicion_chuto
										INNER JOIN flota
										INNER JOIN ubicacion
										INNER JOIN estatus
										WHERE placal_chuto LIKE '%".$_GET["input"]."%'
										AND marca_chuto_id_marca = id_marca	
										AND condicion_chuto_id_condicion = id_condicion	
										AND flota_id_flota=id_flota
										AND ubicacion_id_ubicacion=id_ubicacion
										AND estatus_id_estatus=id_estatus				
										ORDER BY placal_chuto 
										LIMIT $comienzo, $cant_reg";
										$input1=$_GET[input];
									}				
										
									if($_POST['input_usu']!=null && $_POST['input_usu']!="todos")
									{
										$resultado = "SELECT *,COUNT(*) AS cant FROM chuto WHERE placal_chuto LIKE '%".$_POST["input_usu"]."%'";
										$consulta = "
										SELECT 
										placal_chuto,
										serial_carroceria,
										serial_motor,
										modelo,
										nombre_marca,
										nombre_cond,
										nombre_flota,
										unidad,
										nombre_ubicacion,
										nombre_estatus
										FROM chuto 
										INNER JOIN marca_chuto
										INNER JOIN condicion_chuto
										INNER JOIN flota
										INNER JOIN ubicacion
										INNER JOIN estatus
										WHERE (placal_chuto LIKE '%".$_POST["input_usu"]."%' OR  serial_carroceria LIKE '%".$_POST["input_usu"]."%')
										AND marca_chuto_id_marca = id_marca
										AND condicion_chuto_id_condicion = id_condicion	
										AND flota_id_flota=id_flota
										AND ubicacion_id_ubicacion=id_ubicacion
										AND estatus_id_estatus=id_estatus
										ORDER BY placal_chuto 
										LIMIT $comienzo, $cant_reg";
										$input1=$_POST["input_usu"];
									}	
									
										
									$res1=consultar($resultado);
									$fila=mysql_fetch_array($res1);
									$total_registros = $fila[cant];	
									$total_paginas = ceil($total_registros / $cant_reg);
									$res=consultar($consulta);
									while($row=mysql_fetch_array($res))
									{
										echo " <tr>
										<td name='id' align='right'> <a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\">$row[placal_chuto]</a> </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[serial_carroceria] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[serial_motor] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[modelo] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[nombre_marca] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[nombre_cond] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[nombre_flota] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[unidad] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[nombre_ubicacion] </td>
										<td><a  href=\"Modificar_Chuto.php?id=$row[placal_chuto]\"> $row[nombre_estatus] </td>
										</tr>";
									}
								}
							?>
						</tbody>
					</table>
				</div>
				
			<?php 
				echo "
				<div class=\"pagination pagination-large\" align=\"center\">
				<ul>";		
				
				if(($num_pag - 1) > 0)
				{ 
					echo "
					<li>
					<a href='Consultar_Chuto.php?pagina=".($num_pag-1)."&input=".$_POST["input_usu"]."&input=$input1'>< Anterior</a>
					</li>"; 
				}
	
				for ($i=1; $i<=$total_paginas; $i++) 
				{					
					if ($num_pag == $i) 
					{ 
						echo "<li class='disabled'><a>Pagina ".$num_pag."</a></li>";  								
					}				
				} 
				
				if(($num_pag + 1)<=$total_paginas) 
				{
					echo "
					<li>
					<a href='Consultar_Chuto.php?pagina=".($num_pag+1)."&input=$input1'>Siguiente ></a>
					</li>";
				}
					
				echo"
				</ul>
				</div>";
			?>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>