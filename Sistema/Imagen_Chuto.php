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
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<title>Sistema de Reportes para GTRMax</title>

</style>
</head>
<body>

<form  method="post"  action="#" class="form-horizontal">

<?php
		mysql_connect("localhost","root");
		mysql_select_db("ent");  
		$re=mysql_query("select foto_chuto from chuto WHERE placal_chuto='$_GET[id]'");
			while($f=mysql_fetch_array($re))
			{
			echo"
			<img src=\"".$f[foto_chuto]."\" id=\"Image5\" style=\"width:760px;height:1000px;\">";
			}
							
?>
</form>
</body>
</html>