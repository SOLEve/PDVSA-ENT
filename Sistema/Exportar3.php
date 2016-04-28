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
header("content-disposition: attachment;filename=Reporte_CICENT_Mantenimiento_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table border="1">
  							<caption>
  							<h4>Lista de Chutos a Mantenimiento</h4>
  							</caption>
  							<thead>
    							<tr>
      								<th>Placa Chuto</th>
      								<th>Unidad</th>
									<th>Km Recorrido</th>
									<th>Estatus</th>
    							</tr>
  							</thead>
  							<tbody>
							
<?php

$consulta="SELECT km_recorridos,placal_chuto,unidad FROM chuto ORDER BY km_recorridos DESC";
$res=consultar($consulta);
while($row=mysql_fetch_array($res))
{

	if($row[km_recorridos] >= 5000)
	{
		echo " <tr>
		 <td bgcolor=\"fd5b3b\"> $row[placal_chuto]</td>
		 <td bgcolor=\"fd5b3b\"> $row[unidad]</td>
		 <td bgcolor=\"fd5b3b\"> $row[km_recorridos]</td>
		 ";
		echo "	<td bgcolor=\"fd5b3b\">Mantenimiento preventivo</td> ";
	}

	if($row[km_recorridos] >= 4500 && $row[km_recorridos] < 5000)
	{
		echo " <tr>
		 <td bgcolor=\"6dc4ec\"> $row[placal_chuto]</td>
		 <td bgcolor=\"6dc4ec\"> $row[unidad]</td>
		 <td bgcolor=\"6dc4ec\"> $row[km_recorridos]</td>
		 ";
		echo "	<td bgcolor=\"6dc4ec\">Proxima a Mantenimiento preventivo</td> ";
	}

	if($row[km_recorridos] < 4500 )
	{
		echo " <tr>
		 <td > $row[placal_chuto]</td>
		 <td > $row[unidad]</td>
		 <td > $row[km_recorridos]</td>
		 ";
		echo "	<td >Ninguno</td> ";
	}

echo "
 </tr>";
}		
?>
</tbody>
</table>

</body>
</html>
