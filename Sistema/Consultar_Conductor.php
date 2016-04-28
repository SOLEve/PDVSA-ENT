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

	
	$cant_reg = 8; 
	$num_pag = (isset($_GET['pagina'])? $_GET['pagina']:""); 
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
                    <a href="Modificar_Conductor.php">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Conductor</h2>
                                <h3 class="ca-sub">Actualice un Registro</h3>
                            </div>
                    </a>
                </li>
                <li>
                    <a href="#">
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
	
	<div id="wb_Form1" style="position:absolute;left:450px;top:350px;width:710px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<div class="control-group">
				<label class="control-label" for="inputCedula" >Cedula Conductor</label>
					<div class="controls">
						<input type="text" name="input_usu" id="input_usu" value="Ingrese Cedula del Conductor" value="*" onClick="this.value='';">
						<button type="submit" name="b_consultar" class="btn-danger">Consultar</button>
					 </div>
			</div>
			
			<div class="control-group">
				<table class="table table-striped" style="width: 100%; height: 15">
					<caption>
						<h4>Lista de Conductores Registrados</h4>
					</caption>
					<thead>
						<tr>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							if(isset($_POST['b_consultar'])|| (isset($_GET['pagina'])? $_GET['pagina']:"")>0)
							{
								$consulta="SELECT id_conductor,nombre,apellido,telefono FROM conductor WHERE id_conductor LIKE '%".(isset($_POST["input_usu"])? $_POST["input_usu"]:"")."%' ORDER BY id_conductor";
								$res=consultar($consulta);
								
								if((isset($_POST["input_usu"])? $_POST["input_usu"]:"")=="todos")
								{
									$_GET[input]="todos";
								}
							
								if((isset($_GET['input'])? $_GET['input']:"")=="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM conductor ";
									$consulta = "SELECT id_conductor,nombre,apellido,telefono FROM conductor ORDER BY id_conductor LIMIT $comienzo, $cant_reg";
									$input1="todos";
								}

								if((isset($_POST["input_usu"])? $_POST["input_usu"]:"")==null && (isset($_GET['input'])? $_GET['input']:"")!="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM conductor WHERE id_conductor LIKE '%".(isset($_GET['input'])? $_GET['input']:"")."%'";
									$consulta = "SELECT id_conductor,nombre,apellido,telefono FROM conductor WHERE id_conductor LIKE '%".(isset($_GET['input'])? $_GET['input']:"")."%' ORDER BY id_conductor LIMIT $comienzo, $cant_reg";
									$input1=(isset($_GET['input'])? $_GET['input']:"");
								}				
								
								if((isset($_POST["input_usu"])? $_POST["input_usu"]:"")!=null && (isset($_POST["input_usu"])? $_POST["input_usu"]:"")!="todos")
								{
									$resultado = "SELECT *,COUNT(*) AS cant FROM conductor WHERE id_conductor LIKE '%".(isset($_POST["input_usu"])? $_POST["input_usu"]:"")."%'";
									$consulta = "SELECT id_conductor,nombre,apellido,telefono FROM conductor WHERE id_conductor LIKE '%".(isset($_POST["input_usu"])? $_POST["input_usu"]:"")."%' ORDER BY id_conductor LIMIT $comienzo, $cant_reg";
									$input1=(isset($_POST["input_usu"])? $_POST["input_usu"]:"");
								}	
												
								$res1=consultar1($resultado);
								$fila=mysqli_fetch_row($res1);
								$total_registros = $fila[0];	
								$total_paginas = ceil($total_registros / $cant_reg);
								$res=consultar($consulta);
								while($row=mysql_fetch_array($res))
								{
									echo " <tr>
										<td name='id' align='right'> <a  href=\"Modificar_Conductor.php?id=$row[id_conductor]\">$row[id_conductor]</a> </td>
										<td><a  href=\"Modificar_Conductor.php?id=$row[id_conductor]\"> $row[nombre] </td>
										<td><a  href=\"Modificar_Conductor.php?id=$row[id_conductor]\"> $row[apellido] </td>
										<td><a  href=\"Modificar_Conductor.php?id=$row[id_conductor]\"> $row[telefono] </td>
										</tr>";
								}
							}
										?>
					</tbody>
				</table>
			</div>
			
			<?php 
				echo "<div class=\"pagination pagination-large\" align=\"center\">
					  <ul>";		
							
				if(($num_pag - 1) > 0)
				{ 
					echo "<li>
						<a href='Consultar_Conductor.php?pagina=".($num_pag-1)."&input=".(isset($_POST["input_usu"])? $_POST["input_usu"]:"")."&input=$input1'>< Anterior</a>
						</li>"; 
				}
				
				for ($i=1; $i<=(isset($total_paginas)? $total_paginas:""); $i++) 
				{					
					if ($num_pag == $i) 
					{ 
						echo "<li class='disabled'><a>Pagina ".$num_pag."</a></li>";  								
					}				
				} 
							
				if(($num_pag + 1)<=(isset($total_paginas)? $total_paginas:"")) 
				{
					echo "
					<li>
					<a href='Consultar_Conductor.php?pagina=".($num_pag+1)."&input=$input1'>Siguiente ></a>
					</li>";
				}
								
				echo"</ul>
					</div>";
			?>
				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>