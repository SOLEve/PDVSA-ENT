 <?php
session_start(); 
	include("Librerias.php");

error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
date_default_timezone_set('America/Caracas');
$fecha_actual = localtime(time(),1);
$anyo_actual = $fecha_actual['tm_year'] + 1900;
$mes_actual = $fecha_actual['tm_mon'] + 1;
$dia_actual = $fecha_actual['tm_mday'];
$hora_actual = $fecha_actual['tm_hour'];
$minuto_actual = $fecha_actual['tm_min'];
header("content-disposition: attachment;filename=Reporte_CICENT_Asignacion_Chuto_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>

<body>
<table class="table table-striped " style="text-align: center;font-family:'Arial';font-size:12px;position:absolute;left:20px;top:80px;width: 100%; height: 15">
  							<caption>
  							<h4>Reporte de Conductores</h4>
  							</caption>
  							<thead>
    							<tr>
      								<th style="text-align: center;border-width: 1px;border: solid; border-color: #000000;">Cedula</th>
      								<th style="text-align: center;border-width: 1px;border: solid; border-color: #000000;">Nombre</th>
      								<th style="text-align: center;border-width: 1px;border: solid; border-color: #000000;">Apellido</th>
									<th style="text-align: center;border-width: 1px;border: solid; border-color: #000000;">Chuto Asignado</th>
									<th style="text-align: center;border-width: 1px;border: solid; border-color: #000000;">Condición</th>
    							</tr>
  							</thead>
<tbody>
<?php
				$consulta = "SELECT id_conductor,nombre,apellido,chuto_placal_chuto
							FROM ch_cd
							INNER JOIN conductor
							WHERE conductor_id_conductor=id_conductor
							ORDER BY conductor_id_conductor";
				
				$res=consultar($consulta);
				while($row=mysql_fetch_array($res))
				{
												$consulta1="SELECT condicion_chuto_id_condicion FROM chuto WHERE placal_chuto='$row[chuto_placal_chuto]'";
												$res1=consultar($consulta1);
												$fila=mysql_fetch_array($res1);
												$condicion=$fila[condicion_chuto_id_condicion];
											
											if($condicion==1){	
											echo " <tr>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[id_conductor] 	</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[nombre] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[apellido] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">$row[chuto_placal_chuto] 		</td>
												<td bgcolor=\"f9f88e\" style=\"text-align: center;\">Solo		</td>
												</tr>";
												}
											
											if($condicion==2){	
											echo " <tr>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[id_conductor] 	</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[nombre] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[apellido] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">$row[chuto_placal_chuto] 		</td>
												<td bgcolor=\"6dc4ec\" style=\"text-align: center;\">Dupla		</td>
												</tr>";
												}
				}

?>
</tbody>
</table>


</body>
</html>
