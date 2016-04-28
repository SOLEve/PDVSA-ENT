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
	<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 11">
<link rel=File-List href="mapasistema_archivos/filelist.xml">
<link rel=Edit-Time-Data href="mapasistema_archivos/editdata.mso">
<link rel=OLE-Object-Data href="mapasistema_archivos/oledata.mso">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>TEMPORAL</o:Author>
  <o:LastAuthor>TEMPORAL</o:LastAuthor>
  <o:Created>2013-05-30T19:45:53Z</o:Created>
  <o:LastSaved>2013-05-30T20:30:37Z</o:LastSaved>
  <o:Company>PDVSA</o:Company>
  <o:Version>11.5606</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<style>
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
@page
	{margin:.98in .79in .98in .79in;
	mso-header-margin:0in;
	mso-footer-margin:0in;}
tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl24
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:auto none;}
.xl25
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;}
.xl26
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl27
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl28
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:auto none;}
.xl29
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl30
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl31
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl32
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl33
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl34
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:auto none;}
.xl35
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:auto none;}
.xl36
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl37
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl38
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:auto none;}
.xl39
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:auto none;}
.xl40
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl41
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl42
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl43
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:auto none;}
.xl44
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:auto none;}
.xl45
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl46
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl47
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	background:white;
	mso-pattern:auto none;}
.xl48
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl49
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl50
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl51
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl52
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:#FFFF99;
	mso-pattern:auto none;}
.xl53
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:auto none;}
.xl54
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:auto none;}
.xl55
	{mso-style-parent:style0;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFFF99;
	mso-pattern:auto none;}
-->
</style>
<!--[if gte mso 9]><xml>
 <x:ExcelWorkbook>
  <x:ExcelWorksheets>
   <x:ExcelWorksheet>
    <x:Name>Hoja1</x:Name>
    <x:WorksheetOptions>
     <x:DefaultColWidth>10</x:DefaultColWidth>
     <x:Print>
      <x:ValidPrinterInfo/>
      <x:HorizontalResolution>600</x:HorizontalResolution>
      <x:VerticalResolution>0</x:VerticalResolution>
     </x:Print>
     <x:Selected/>
     <x:Panes>
      <x:Pane>
       <x:Number>3</x:Number>
       <x:ActiveRow>6</x:ActiveRow>
       <x:ActiveCol>10</x:ActiveCol>
      </x:Pane>
     </x:Panes>
     <x:ProtectContents>False</x:ProtectContents>
     <x:ProtectObjects>False</x:ProtectObjects>
     <x:ProtectScenarios>False</x:ProtectScenarios>
    </x:WorksheetOptions>
   </x:ExcelWorksheet>
   <x:ExcelWorksheet>
    <x:Name>Hoja2</x:Name>
    <x:WorksheetOptions>
     <x:DefaultColWidth>10</x:DefaultColWidth>
     <x:ProtectContents>False</x:ProtectContents>
     <x:ProtectObjects>False</x:ProtectObjects>
     <x:ProtectScenarios>False</x:ProtectScenarios>
    </x:WorksheetOptions>
   </x:ExcelWorksheet>
   <x:ExcelWorksheet>
    <x:Name>Hoja3</x:Name>
    <x:WorksheetOptions>
     <x:DefaultColWidth>10</x:DefaultColWidth>
     <x:ProtectContents>False</x:ProtectContents>
     <x:ProtectObjects>False</x:ProtectObjects>
     <x:ProtectScenarios>False</x:ProtectScenarios>
    </x:WorksheetOptions>
   </x:ExcelWorksheet>
  </x:ExcelWorksheets>
  <x:WindowHeight>8700</x:WindowHeight>
  <x:WindowWidth>16395</x:WindowWidth>
  <x:WindowTopX>480</x:WindowTopX>
  <x:WindowTopY>120</x:WindowTopY>
  <x:ProtectStructure>False</x:ProtectStructure>
  <x:ProtectWindows>False</x:ProtectWindows>
 </x:ExcelWorkbook>
</xml><![endif]-->
</head>
	<body link=blue vlink=purple class=xl25>

		<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
			Sistema de Reportes Sala CICENT
		</div>
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1100px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:100px;top:520px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:100px;top:400px;width:139px;height:32px;z-index:37;text-align:left;">
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
	
    <div class="container"style="position:absolute;left:-100px;">
		<div class="content">
            <ul class="ca-menu">
				<li>
                    <a href="index_administrador.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atrás</h2>
                                <h3 class="ca-sub">Regrese al Panel Principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:950px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
			<table x:str border=0 cellpadding=0 cellspacing=0 width=1043 style='border-collapse:
			 collapse;table-layout:fixed;width:780pt'>
			 <col class=xl25 width=155 style='mso-width-source:userset;mso-width-alt:5668;
			 width:116pt'>
			 <col class=xl25 width=23 style='mso-width-source:userset;mso-width-alt:841;
			 width:17pt'>
			 <col class=xl25 width=155 style='mso-width-source:userset;mso-width-alt:5668;
			 width:116pt'>
			 <col class=xl25 width=23 style='mso-width-source:userset;mso-width-alt:841;
			 width:17pt'>
			 <col class=xl25 width=176 style='mso-width-source:userset;mso-width-alt:6436;
			 width:132pt'>
			 <col class=xl25 width=23 style='mso-width-source:userset;mso-width-alt:841;
			 width:17pt'>
			 <col class=xl25 width=155 style='mso-width-source:userset;mso-width-alt:5668;
			 width:116pt'>
			 <col class=xl25 width=23 style='mso-width-source:userset;mso-width-alt:841;
			 width:17pt'>
			 <col class=xl25 width=155 span=248 style='mso-width-source:userset;mso-width-alt:
			 5668;width:116pt'>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl47 width=155 style='height:13.5pt;width:116pt'>&nbsp;</td>
			  <td class=xl47 width=23 style='width:17pt'>&nbsp;</td>
			  <td class=xl47 width=155 style='width:116pt'>&nbsp;</td>
			  <td class=xl47 width=23 style='width:17pt'>&nbsp;</td>
			  <td class=xl47 width=176 style='width:132pt'>&nbsp;</td>
			  <td class=xl47 width=23 style='width:17pt'>&nbsp;</td>
			  <td class=xl47 width=155 style='width:116pt'>&nbsp;</td>
			  <td class=xl47 width=23 style='width:17pt'>&nbsp;</td>
			  <td class=xl47 width=155 style='width:116pt'>&nbsp;</td>
			  <td class=xl25 width=155 style='width:116pt'></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl55 style='height:13.5pt'><a href="index_administrador.php">Inicio</a></td>
			  <td class=xl32>&gt;&gt;</td>
			  <td class=xl32>Cómputos</td>
			  <td class=xl32>&gt;&gt;</td>
			  <td class=xl30><a href="Mantenimiento.php">Mantenimiento Preventivo</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Tiempo_Recorrido.php">Tiempo Recorrido</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Velocidad_Alta.php">Velocidad Alta</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Cantidad_Viajes.php">Cantidad Viajes</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Calcular_Ruta.php">Cálculo Rutas</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Asignar_Chuto.php">Asignación de Chutos</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'>Reportes</td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Reporte_Conductores.php">Conductores</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Reportes_Viajes.php">Viajes</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Reportes_Chutos.php">Chutos</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Reportes_Clientes.php">Clientes</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Reporte_Asignacion.php">Asignación</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'>Panel de Control</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_Conductor.php">Conductores</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Conductor.php">Agregar</a></td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl38 style='border-top:none;border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Conductor.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Conductor.php">Consultar</a></td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Conductor.php">Eliminar</a></td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl37>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_chuto.php">Chutos</a></td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mchuto.php">Chutos</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Chuto.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl38 style='border-top:none;border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Chuto.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Chuto.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Chuto.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl53 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mcondicion.php">Condición</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Condicion.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl40 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Condicion.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Condicion.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Condicion.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mmarca.php">Marca</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Marca.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Marca.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Marca.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Marca.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mflota.php">Flota</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Flota.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Flota.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Flota.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Flota.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mubicacion.php">Ubicación</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Ubicacion.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Ubicacion.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Ubicacion.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Ubicacion.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl26 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_mestatus.php">Estatus</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Estatus.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Estatus.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Estatus.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Estatus.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl53 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl27><a href="index_cliente.php">Clientes</a></td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mcliente.php">Cliente</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Cliente.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl38>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Cliente.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Cliente.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Cliente.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mtipo.php">Tipo Cliente</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Tipo.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Tipo.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Tipo.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Tipo.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl41><a href="index_mzona.php">Zona Comercial</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Zona.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Zona.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Zona.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Zona.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl26 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_mmayorista.php">Mayorista</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Mayorista.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Mayorista.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Mayorista.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Mayorista.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl53 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_usuario.php">Usuarios</a></td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl27><a href="index_Musuario.php">Usuarios</a></td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Usuario.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl43>&nbsp;</td>
			  <td class=xl35>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Usuario.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl44 style='border-left:none'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Usuario.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Usuario.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl46>&nbsp;</td>
			  <td class=xl26 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_Mdpto.php">Departamento</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Dpto.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Dpto.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Dpto.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl31><a href="Eliminar_Dpto.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl39 style='border-left:none'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl41><a href="index_lugar.php">Lugar</a></td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_msede.php">Sede</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl30 style='border-top:none'><a href="Crear_Sede.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl43 style='border-top:none'>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Sede.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Sede.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Sede.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl34>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl48 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_mmunicipio.php">Municipio</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Municipio.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Municipio.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Municipio.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Municipio.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl34>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl48 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_mciudad.php">Ciudad</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Ciudad.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Ciudad.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Ciudad.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Ciudad.php">Eliminar</a></td>
			  <td class=xl50 style='border-left:none'>&nbsp;</td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl34>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl48 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'><a href="index_mdistrito.php">Distrito</a></td>
			  <td class=xl32 style='border-top:none'>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Dtto.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Dtto.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Dtto.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl44>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Dtto.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl27>&nbsp;</td>
			  <td class=xl34>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl26 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl41><a href="index_mestado.php">Estado</a></td>
			  <td class=xl41>&gt;&gt;</td>
			  <td class=xl29><a href="Crear_Estado.php">Agregar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl40 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl34 style='border-left:none'>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl35 style='border-top:none'>&nbsp;</td>
			  <td class=xl29 x:str="Modificar "><a href="Modificar_Estado.php">Modificar</a><span
			  style='mso-spacerun:yes'> </span></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl48 style='border-left:none'>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'>Sistema</td>
			  <td class=xl52>&gt;&gt;</td>
			  <td class=xl30><a href="Mapa_Sistema.php">Mapa del Sistema</a></td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl29><a href="Consultar_Estado.php">Consultar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl33>&nbsp;</td>
			  <td class=xl45>&nbsp;</td>
			  <td colspan=2 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl28>&nbsp;</td>
			  <td class=xl36 style='border-left:none'><a href="Eliminar_Estado.php">Eliminar</a></td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl48>&gt;&gt;</td>
			  <td class=xl42 style='border-top:none'><a href="Acerca_Sistema.php">Acerca del Sistema</a></td>
			  <td colspan=3 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl54 style='border-top:none'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl33>&nbsp;</td>
			  <td class=xl51 style='border-top:none;border-left:none'>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl48>&gt;&gt;</td>
			  <td class=xl31><a href="Contacto.php">Contacto</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl33>&nbsp;</td>
			  <td class=xl45 style='border-top:none'>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl26>&gt;&gt;</td>
			  <td class=xl31>GTRMax.com</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl39 style='height:12.75pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td colspan=7 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl29>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl32 style='border-top:none'>Documentación</td>
			  <td class=xl27>&gt;&gt;</td>
			  <td class=xl42 style='border-top:none'><a href="#">Manual de Sistema</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl25></td>
			  <td class=xl33>&nbsp;</td>
			  <td class=xl49 style='border-left:none'>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl48>&gt;&gt;</td>
			  <td class=xl31><a href="#">Manual de Usuario</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl33>&nbsp;</td>
			  <td class=xl37>&nbsp;</td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl47>&nbsp;</td>
			  <td class=xl26>&gt;&gt;</td>
			  <td class=xl31><a href="#">Manual GTRMax</a></td>
			  <td colspan=4 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl39 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl33 style='border-left:none'>&nbsp;</td>
			  <td class=xl24>&nbsp;</td>
			  <td colspan=6 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=18 style='height:13.5pt'>
			  <td height=18 class=xl50 style='height:13.5pt'>&nbsp;</td>
			  <td class=xl26>&gt;&gt;</td>
			  <td class=xl31><a href="Recuperar.php">Recuperar Contraseña</a></td>
			  <td colspan=6 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 class=xl44 style='height:12.75pt'>&nbsp;</td>
			  <td colspan=8 class=xl47 style='mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 colspan=9 class=xl47 style='height:12.75pt;mso-ignore:colspan'>&nbsp;</td>
			  <td class=xl25></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 colspan=10 class=xl25 style='height:12.75pt;mso-ignore:colspan'></td>
			 </tr>
			 <tr height=17 style='height:12.75pt'>
			  <td height=17 colspan=10 class=xl25 style='height:12.75pt;mso-ignore:colspan'></td>
			 </tr>
			 <![if supportMisalignedColumns]>
			 <tr height=0 style='display:none'>
			  <td width=155 style='width:116pt'></td>
			  <td width=23 style='width:17pt'></td>
			  <td width=155 style='width:116pt'></td>
			  <td width=23 style='width:17pt'></td>
			  <td width=176 style='width:132pt'></td>
			  <td width=23 style='width:17pt'></td>
			  <td width=155 style='width:116pt'></td>
			  <td width=23 style='width:17pt'></td>
			  <td width=155 style='width:116pt'></td>
			  <td width=155 style='width:116pt'></td>
			 </tr>
			 <![endif]>
			</table>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>