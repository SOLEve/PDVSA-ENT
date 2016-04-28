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
	$cant_reg = 4; 
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
                        <a href="Modificar_Cliente.php">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Cliente</h2>
                                <h3 class="ca-sub">Actualice Información de un Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
	
	<div id="wb_Form1" style="position:absolute;left:25px;top:350px;width:1300px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<div class="control-group">
				<label class="control-label" for="inputCedula" >Nombre Cliente</label>
					<div class="controls">
						 <input type="text" name="input_usu" id="input_usu" placeholder="Ingrese Nombre del cliente"  onClick="this.value='';">
					    <button type="submit" name="b_consultar" class="btn-danger">Consultar</button>
                    </div>
			</div>
			
			<div class="control-group">
                <table class="table table-striped" style="width: 100%; height: 15">
  					<caption>
  						<h4>Lista de Clientes Registrados</h4>
  					</caption>
  					<thead>
    					<tr>
      						<th>Código</th>
      						<th>Nombre</th>
      						<th>RIF</th>
							<th>Razón Social</th>
							<th>Distancia(Km)</th>
							<th>Tiempo(Hr)</th>
							<th>Mayorista</th>
							<th>Distrito</th>
							<th>Estado</th>
							<th>Ciudad</th>
							<th>Sede</th>
							<th>Tipo</th>
							<th>Zona Comercial</th>
							<th>Municipio</th>
    					</tr>
  					</thead>
  					<tbody>
						<?php
							if(isset($_POST['b_consultar'])|| $_GET["pagina"]>0)
							{
								if($_POST['input_usu']=="todos")
								{
									$_GET[input]="todos";
								}
									
								if($_GET[input]=="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM cliente ";
									$consulta = "SELECT id_cli,nombre_cli,rif_cli,razon_social_cli,direccion_cli,
												telefono_cli,distancia_cli,tiempo_cli,mayorista_id_mayorista,distrito_id_dtto,
												estado_id_edo,ciudad_id_ciudad,sede_id_sede,tipo_cliente_id_tipo,zona_com_id_zona,municipio_id_mcpio,
												nombre_may,nombre_dtto,nombre_edo,nombre_ciudad,nombre_sede,nombre_tipo,nombre_zona,nombre_mcpio
												FROM cliente 
												INNER JOIN mayorista 
												INNER JOIN distrito 
												IINER JOIN estado 
												INNER JOIN ciudad
												INNER JOIN sede 
												INNER JOIN tipo_cliente 
												INNER JOIN zona_com 
												INNER JOIN municipio 
												WHERE id_mayorista=mayorista_id_mayorista
												AND id_dtto=distrito_id_dtto
												AND id_edo=estado_id_edo
												AND id_ciudad=ciudad_id_ciudad
												AND id_sede=sede_id_sede
												AND id_tipo=tipo_cliente_id_tipo
												AND id_zona=zona_com_id_zona
												AND id_mcpio=municipio_id_mcpio
												ORDER BY id_cli 
												LIMIT $comienzo, $cant_reg";
									$input1="todos";
								}

								if($_POST['input_usu']==null && $_GET[input]!="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM cliente WHERE nombre_cli LIKE '%".$_GET["input"]."%'";
									$consulta = "SELECT id_cli,nombre_cli,rif_cli,razon_social_cli,direccion_cli,
												telefono_cli,distancia_cli,tiempo_cli,mayorista_id_mayorista,distrito_id_dtto,
												estado_id_edo,ciudad_id_ciudad,sede_id_sede,tipo_cliente_id_tipo,zona_com_id_zona,municipio_id_mcpio,
												nombre_may,nombre_dtto,nombre_edo,nombre_ciudad,nombre_sede,nombre_tipo,nombre_zona,nombre_mcpio
												FROM cliente 
												INNER JOIN mayorista 
												INNER JOIN distrito 
												IINER JOIN estado 
												INNER JOIN ciudad
												INNER JOIN sede 
												INNER JOIN tipo_cliente 
												INNER JOIN zona_com 
												INNER JOIN municipio 
												WHERE nombre_cli LIKE '%".$_GET["input"]."%' 
												AND id_mayorista=mayorista_id_mayorista
												AND id_dtto=distrito_id_dtto
												AND id_edo=estado_id_edo
												AND id_ciudad=ciudad_id_ciudad
												AND id_sede=sede_id_sede
												AND id_tipo=tipo_cliente_id_tipo
												AND id_zona=zona_com_id_zona
												AND id_mcpio=municipio_id_mcpio
												ORDER BY id_cli 
												LIMIT $comienzo, $cant_reg";
									$input1=$_GET[input];
								}				
										
								if($_POST['input_usu']!=null && $_POST['input_usu']!="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM cliente WHERE nombre_cli LIKE '%".$_POST["input_usu"]."%'";
									$consulta = "SELECT id_cli,nombre_cli,rif_cli,razon_social_cli,direccion_cli,
												telefono_cli,distancia_cli,tiempo_cli,mayorista_id_mayorista,distrito_id_dtto,
												estado_id_edo,ciudad_id_ciudad,sede_id_sede,tipo_cliente_id_tipo,zona_com_id_zona,municipio_id_mcpio,
												nombre_may,nombre_dtto,nombre_edo,nombre_ciudad,nombre_sede,nombre_tipo,nombre_zona,nombre_mcpio
												FROM cliente 
												INNER JOIN mayorista 
												INNER JOIN distrito 
												IINER JOIN estado 
												INNER JOIN ciudad
												INNER JOIN sede 
												INNER JOIN tipo_cliente 
												INNER JOIN zona_com 
												INNER JOIN municipio 
												WHERE nombre_cli LIKE '%".$_POST["input_usu"]."%' 
												AND id_mayorista=mayorista_id_mayorista
												AND id_dtto=distrito_id_dtto
												AND id_edo=estado_id_edo
												AND id_ciudad=ciudad_id_ciudad
												AND id_sede=sede_id_sede
												AND id_tipo=tipo_cliente_id_tipo
												AND id_zona=zona_com_id_zona
												AND id_mcpio=municipio_id_mcpio
												ORDER BY id_cli 
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
											<td name='id' align='right'> <a  href=\"Modificar_Cliente.php?id=$row[id_cli]\">$row[id_cli]</a> </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_cli] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[rif_cli] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[razon_social_cli] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[distancia_cli] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[tiempo_cli] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_may] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_dtto] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_edo] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_ciudad] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_sede] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_tipo] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_zona] </td>
											<td><a  href=\"Modificar_Cliente.php?id=$row[id_cli]\"> $row[nombre_mcpio] </td>
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
								<a href='Consultar_Cliente.php?pagina=".($num_pag-1)."&input=".$_POST["input_usu"]."&input=$input1'>< Anterior</a>
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
								<a href='Consultar_Cliente.php?pagina=".($num_pag+1)."&input=$input1'>Siguiente ></a>
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